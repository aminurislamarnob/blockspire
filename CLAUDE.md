# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## What this is

Blockspire — a WordPress **block theme** (full site editing), being built as a multipurpose theme for **WordPress.org submission**. It lives inside a local WordPress install served by Laravel Herd at `/Users/aiarnob/Herd/fse-theme-dev` (site root is the parent of `wp-content`).

The benchmark is `wp-content/themes/neve-fse` — ThemeIsle's block theme, already accepted on wp.org. Blockspire aims to beat it on templates, parts, style variations and patterns, and decisively on bundle size, accessibility and modern block APIs. The classic `wp-content/themes/neve` is a feature-idea reference only; it is a PHP theme and its architecture is **not** a model for this one.

Design source of truth is the weLabs Figma file (`JKkrAuUfQemwOIXPDfS3Y2`), which contains dedicated `Color Palette` and `Typography` spec frames plus 13 desktop and 5 mobile page designs.

## Architecture

`theme.json` is the single source of truth for the design system. `functions.php`, templates and patterns consume it and never duplicate it.

- **`theme.json`** (schema v3) defines the whole token set: palette, font sizes, spacing sizes, the self-hosted Poppins family (four weights, **WOFF2**, via `fontFace`), custom line-height and font-weight tokens, and `styles` for elements and blocks. Core default palette, gradients, duotone and default spacing/font sizes are disabled — only the theme's own presets appear in the editor.
- **`styles/`** holds JSON partials. A partial **with** `blockTypes` registers a *block style variation*; one **without** registers a *theme style variation*. Core scans this directory recursively (`WP_Theme_JSON_Resolver::recursively_iterate_json`). Block style variations live in `styles/blocks/`.
- **`functions.php`** is deliberately thin: text domain loading, `add_theme_support( 'woocommerce' )`, and pattern category registration. Nothing else. Block themes already get `post-thumbnails`, `responsive-embeds`, `editor-styles`, `html5` and `automatic-feed-links` from core's `_add_default_theme_supports()` — never re-add those.
- **`style.css`** is the theme header only (metadata). Do not put rules there.
- **`tools/`** is dev-only tooling, excluded from the shipped zip.

### Do not write inline CSS in PHP

Block styles are **not** registered with `register_block_style()` and inline CSS strings. That approach hardcodes values outside the token system and cannot respond to style variations. Add a JSON partial in `styles/blocks/` instead.

## Design tokens

Presets are referenced in CSS as `var(--wp--preset--<type>--<slug>)`.

**Colors** — values verified against the Figma `Color Palette` frame by pixel sampling:

| Slug | Value | Figma name |
|---|---|---|
| `primary` | `#2D5BDB` | Primary / Blue |
| `accent` | `#FF9808` | Primary / Orange |
| `text-color` | `#626368` | Grayscale / Gray 01 |
| `gray-02` | `#8D8D8D` | Grayscale / Gray 02 |
| `gray-03` | `#C6C6C6` | Grayscale / Gray 03 |
| `secondary`, `heading-color`, `link-color` | `#111B3A` | Text Color / Black |
| `dark-bg` | `#111111` | Background / Black (footer surface) |
| `main-bg`, `text-white` | `#FFFFFF` | Text Color / White |
| `light-bg` | `#F4F4F4` | (not in Figma spec) |

> The Figma swatches' **typed hex labels disagree with their actual fills** — the blue swatch is labelled `#007CF5` but renders `#2D5BDB`. Always sample the pixel or read the bound variable; never trust the printed label.

**Contrast (run `node tools/contrast.mjs`):** `primary` passes AA on white at 5.78:1. `accent` is **2.15:1 on white and fails even for large text** — only use it on dark surfaces (7.85:1 on `#111B3A`) or as a non-text decorative fill. `gray-02` is large-text/border only (3.32:1); `gray-03` is borders and dividers only (1.71:1).

**Font sizes:** `display`, `small|medium|large-paragraph`, `small|medium|large-title`, `heading-01`…`heading-06`, `button-large`, `button-small`. **Font family:** `poppins`. **Spacing:** numeric slugs matching the px value (`10`, `12`, `16`, `20`, `24`, `30`, `32`, `40`, `48`, `50`, `60`, `70`, `80`, `100`), plus `fluid-inset` (`clamp(24px, 8.5vw, 100px)`) for section side padding that must shrink on phones. Use `fluid-inset` wherever the design shows 100px horizontal padding on a band or section. The style engine only resolves `var:preset|…` shorthand, never `var:custom|…`, so anything a block needs to reference from its attributes has to be a preset.

**Decorative backgrounds** (`assets/images/band-decoration.svg`) are drawn in **white at low opacity**, never in a fixed hue, so they lighten whatever colour sits behind them and stay correct in every style variation. Apply them with the Group block's `style.background.backgroundImage` (core support, `cover` by default), not with custom CSS. `band-decoration.svg` carries the CTA band's exact Figma geometry (18px dot grid, the two angled shapes); `dot-grid.svg` is an 18px tile for repeating surfaces such as the footer (`backgroundSize: "18px"`, `backgroundRepeat: "repeat"`).

**Icons that must follow the text colour** (arrows on buttons and links) are block styles with a `css` key (`styles/blocks/button-arrow.json`, `paragraph-arrow-link.json`) that draw a `::after` box filled with `currentColor` through a data-URI `mask`. An `<img>` icon cannot inherit colour, so it would break in dark variations; a masked pseudo-element cannot. Gotchas in core's `css` processing (`WP_Theme_JSON::process_blocks_custom_css`): it splits on `&`, so a prefix like `[dir="rtl"] &` is **not** supported — use `:dir(rtl)` instead; and the button's variation selector already ends in `.wp-block-button__link`, so write `&::after`, never `& .wp-block-button__link::after`. Core also renders each variation instance with a unique `is-style-<slug>--N` class, so the rule is duplicated per block on the page. One more: a selector list with several `&` (`& a, & b {}`) is split into garbage — write **one `&` per rule** and fold alternatives into `:is()`.

### Focus states

**No focus outlines anywhere** — the theme shows keyboard focus through the element's own appearance, never a ring or border. Buttons and links underline their label (`text-decoration` at 2px with a 0.25em offset), and a newsletter field fills with a `currentColor` wash at 26%. Both adapt to any style variation without naming a colour, which a fixed ring cannot do: an outer `currentColor` ring is white on a filled button and vanishes on a white page, while an inset one collides with the field borders around it.

This is still `accessibility-ready`: WCAG 2.4.7 wants a *visible* focus indicator, not specifically an outline. Keep it that way — if you ever weaken these, the tag has to go.

Two traps when writing the rules:

- **`:focus-visible` is not allowed in theme.json** (`VALID_ELEMENT_PSEUDO_SELECTORS` permits only `:link`, `:any-link`, `:visited`, `:hover`, `:focus`, `:active`), so anything under `elements.*:focus` also fires on mouse clicks and sticks there. Focus styling therefore lives in top-level `styles.css`, which does support `:focus-visible`; its plain-class specificity `(0,2,0)` also beats the `:root :where(…)` `(0,1,0)` that theme.json emits, which is what lets the blanket `:focus{outline:none}` win. For the same reason `elements.button` must not restyle `:focus` at all.
- **Form controls do not inherit `color`.** A submit hidden with `color:transparent` makes `currentColor` transparent, and inheriting nothing makes it the UA's black. Hide the label with `font-size:0;line-height:0` and set `color:inherit`. Also scope the input reset as `input:not([type=submit]):focus` — without the `:not()` it silently kills the submit's own focus styling at equal specificity.

**Newsletter forms** come from the Mailchimp for WordPress plugin (Brevo also works) — wp.org themes cannot bundle forms. `patterns/cta.php` and `patterns/footer.php` check `function_exists( 'mc4wp_show_form' )` and render `<!-- wp:mailchimp-for-wp/form /-->` inside a Group carrying the `newsletter-underline` (CTA) or `newsletter-boxed` (footer) block style; otherwise the CTA falls back to a button and the footer omits the slot. The styles target the plugin's `.mc4wp-form-fields > p > input` markup (`display: contents` on the `<p>` makes the inputs flex items) and hide the submit label under a fixed-white arrow `background-image`. MC4WP renders **nothing for logged-out visitors until an API key is set** — locally a dummy key in the `mc4wp` option is enough. The recommended form markup lives in `readme.txt`.

**Template parts cannot run PHP**, so a part that needs `get_theme_file_uri()` (footer background, icons) is a one-line `wp:pattern` reference to a PHP pattern (`parts/footer.html` → `patterns/footer.php`, registered with `Block Types: core/template-part/footer`).

**Root block gap:** `styles.spacing.blockGap` (20px) also separates the header part, `<main>` and footer part when they sit at the template root. Page templates that need edge-to-edge sections wrap everything in one `alignfull` constrained Group with `blockGap: 0` (see `templates/front-page.html`) and let each section own its vertical padding. The wrapper **must** be `align: full`, otherwise it is constrained to `contentSize` and every full-width child collapses to 800px.

**Line heights** live in `settings.custom.lineHeight` as `var(--wp--custom--line-height--<slug>)` — `display`, `heading-01`…`heading-06`, `title-large|medium|small`, `paragraph-large|medium|small`, `button-large|small`. Letter spacing: `settings.custom.letterSpacing.tight` (-0.03em). A `fontSizes` preset **only ever emits `font-size`**; putting `lineHeight` or `fontWeight` in one does nothing (core's `PRESETS_METADATA` declares `'properties' => array( 'font-size' )`). That is why line heights are custom tokens rather than preset properties.

> **Whenever you override a heading's font size, set the matching line height too.** `styles.elements.h1`–`h6` bind a size *and* its line height together. Change only the size on a block — say an `h2` set to `heading-03` — and it keeps the `h2` element's `heading-02` leading, silently pairing a size with the wrong line height. This produced a 63.36px line height where the design called for 64px.

### Type styles from the design

Values below are the component styles bound in the Figma page designs, which are authoritative. The standalone Typography spec frame disagrees in places and is **not** reliable — it lists Button/Large as Bold when every real usage binds SemiBold 600, the same way the Color Palette frame's hex labels disagree with its actual fills.

| Style | Size / line height | Weight | Used for |
|---|---|---|---|
| Heading H1 | 94 / 100 | 700 | hero display heading |
| Display | 64 / 64 | 700 | oversized marketing headings (CTA band), with `letter-spacing: tight` |
| Heading H3 | 60 / 64 | 700 | section titles |
| Title Large | 24 / 30 | 700 | card titles |
| Title Medium | 20 / 26 | 700 | section eyebrows, footer headings |
| Title Small | 16 / 26 | **500** | form labels and placeholders |
| Paragraph Large | 18 / 28 | 400 | hero supporting text |
| Paragraph Medium | 16 / 28 | 400 | body, inline links such as "Learn More" |
| Paragraph Small | 14 / 22 | 400 | card body |
| Button Large | 16 / 20 | **600** | buttons and navigation links |
| Button Small | 14 / 20 | 700 | the rounded header button |

## Conventions

- Text domain `blockspire`; `Domain Path: /languages`. Wrap user-facing strings in translation functions and regenerate with `npm run pot`.
- Requires **WP 6.7+ / PHP 7.4+**. Keep API usage within that floor.
- **Author RTL-safe CSS from the start**: use `margin-inline`, `padding-inline`, `inset-inline`, `text-align: start`. Never physical `left`/`right` properties. Retrofitting is expensive.
- **Accessibility-ready is a commitment**: skip links, visible focus rings, keyboard-navigable menus, labelled form fields, AA contrast in every style variation.
- No remote requests. wp.org forbids them — fonts and images are always bundled locally.
- Every bundled image needs its source URL and licence recorded in `readme.txt`.
- `useRootPaddingAwareAlignments` and `appearanceTools` are on — prefer theme.json layout settings over hand-written CSS.

## Commands

There is no runtime build — theme files are hand-authored and served directly. All tooling is dev-only and stays out of the zip.

```
npm run check      # validate theme.json + style partials, then PHPCS
npm run lint:json  # catch settings keys WordPress silently ignores
npm run lint:php   # PHPCS against WordPress standards
npm run fix:php    # phpcbf autofix
npm run pot        # regenerate languages/blockspire.pot
npm run fonts      # convert assets/fonts/*.ttf to WOFF2
npm run images     # assets/images/src/* -> size-capped WebP
npm run zip        # clean submission bundle in build/
node tools/contrast.mjs   # WCAG contrast matrix for the palette
```

`npm run lint:json` exists because a mistyped `theme.json` key parses fine and then does nothing. It already caught `fontStyles` (correct key: `fontStyle`), `lineHeight`/`fontWeight` on a font-size preset, and `padding-top`-style keys under `styles.spacing.padding` (correct: `top`/`right`/`bottom`/`left`). Run it after every `theme.json` edit.

## Caching while developing

**Set `define( 'WP_DEVELOPMENT_MODE', 'theme' );` in `wp-config.php`.** Without it, newly added or edited patterns will not appear, and you will waste time thinking the pattern is broken when it is only cached.

- **Patterns** are cached in a *site* transient, `wp_theme_files_patterns-<cache_hash>`, keyed by the theme's `Version`. `wp transient delete --all` does **not** clear it (that only removes ordinary transients). Clear it with `wp eval 'wp_get_theme()->delete_pattern_cache();'`, or bump the theme version, or turn on theme development mode, which bypasses the cache entirely.
- **Templates and template parts** are also cached; flush with `wp cache flush` after adding files.
- **Global styles** compiled from `theme.json` are cached too — hard-refresh if a token change doesn't show.
- Site Editor customizations saved by a user live in the database (`wp_global_styles`) and **override** `theme.json`. A "my change isn't applying" report is usually this, not a syntax error.
