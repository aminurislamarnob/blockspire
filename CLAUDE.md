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

Font size, spacing and font-family presets are enumerated in `theme.json`; read them there. Spacing slugs are the literal px value, with one exception: `fluid-inset` (`clamp(24px, 8.5vw, 100px)`) — use it wherever the design shows 100px horizontal padding on a band or section that must shrink on phones. The style engine only resolves `var:preset|…` shorthand, never `var:custom|…`, so anything a block needs to reference from its attributes has to be a preset.

**Decorative backgrounds** (`assets/images/band-decoration.svg`) are drawn in **white at low opacity**, never in a fixed hue, so they lighten whatever colour sits behind them and stay correct in every style variation. Apply them with the Group block's `style.background.backgroundImage` (core support, `cover` by default), not with custom CSS. `band-decoration.svg` carries the CTA band's exact Figma geometry (18px dot grid, the two angled shapes); `dot-grid.svg` is an 18px tile for repeating surfaces such as the footer (`backgroundSize: "18px"`, `backgroundRepeat: "repeat"`).

**Icons that must follow the text colour** (arrows on buttons and links) are block styles with a `css` key (`styles/blocks/button-arrow.json`, `paragraph-arrow-link.json`) that draw a `::after` box filled with `currentColor` through a data-URI `mask`. An `<img>` icon cannot inherit colour, so it would break in dark variations; a masked pseudo-element cannot. Gotchas in core's `css` processing (`WP_Theme_JSON::process_blocks_custom_css`): it splits on `&`, so a prefix like `[dir="rtl"] &` is **not** supported — use `:dir(rtl)` instead; and the button's variation selector already ends in `.wp-block-button__link`, so write `&::after`, never `& .wp-block-button__link::after`. Core also renders each variation instance with a unique `is-style-<slug>--N` class, so the rule is duplicated per block on the page. One more: a selector list with several `&` (`& a, & b {}`) is split into garbage — write **one `&` per rule** and fold alternatives into `:is()`.

### Motion and disclosure

**Counting figures** (`styles/blocks/paragraph-counter.json`, `assets/js/counter-up.js`) animate a number up from zero the first time it intersects the viewport. The script bails out entirely without `IntersectionObserver` or under `prefers-reduced-motion`, and it only rewrites the DOM at the moment a figure is about to animate — so an element that is never scrolled to is never left showing a zero, which an up-front rewrite would cause. While counting, the visible number is `aria-hidden` and the finished figure sits beside it in a `.screen-reader-text` span (core's block-library CSS defines that class on the front end), so a screen reader announces the value once instead of reading whatever number the animation is on. `parse()` deliberately only accepts shapes it can rebuild without guessing — plain integer, integer grouped in threes, one decimal separator — and returns `null` for anything else, leaving the author's text untouched. Core keeps the author's `is-style-counter` class alongside the per-instance `is-style-counter--N` it adds, so `.is-style-counter` is a safe selector.

**The work-process steps are a real `<details>` accordion with a CSS-only open/close animation** — no JavaScript at all. `core/details` exposes a `name` attribute, and every step in `patterns/process-split.php` shares `name="blockspire-process"`, which is what makes opening one close the rest, natively. The animation is `::details-content` with `height: 0 → auto`, unlocked by `interpolate-size: allow-keywords` on the details element (it inherits into the pseudo-element) and `transition-behavior: allow-discrete` for `content-visibility`. Browsers without `::details-content` simply snap open, and `styles.css` carries the `prefers-reduced-motion` override — it has to live there because **`css` in a style variation cannot contain a media query**: core's `process_blocks_custom_css` splits the string on `&` and prefixes each fragment, which mangles an `@media` wrapper.

Three things about the block itself: neither `summary` nor `name` is serialised into the block comment (both are sourced from the markup), so the comment is just `<!-- wp:details {"showContent":true,"className":"is-style-step"} -->`; an `<h3>` **inside** `<summary>` round-trips valid, which is worth keeping so the steps stay in the document outline; and that `h3` needs its typography as an inline style, because a rule in the style variation would be `:root :where(…)` (0,1,0) — the same as theme.json's own `elements.h3` — leaving the winner to emission order. `summary` is in both focus rules in `styles.css` for the same reason buttons and links are.

The rule joining one numbered badge to the next is `styles/blocks/group-process-step.json`, an absolutely positioned `::before` on the step row, and the pattern applies it to every step **except the last** — that is what keeps the line from trailing off the bottom, rather than any `:last-child` selector, which would be wrong anyway because the button follows the steps in the same column.

### Seeding demo content

Dev-only and never shipped (`tools/` is excluded from the zip). `node tools/seed-images.mjs` renders five abstract placeholder photographs from the theme palette into `tools/tmp-seed/`; import them with `wp media import`, then `wp eval-file tools/seed-posts.php` creates five categorised posts and attaches them. The seeder matches on slug, so it is safe to re-run; the attachment IDs at the top of it are the only thing to adjust on a different install. Generate images rather than reusing the WooCommerce sample photos — product shots of hoodies read badly as blog featured images when you are reviewing a layout.

### Focus states

**No focus outlines anywhere** — the theme shows keyboard focus through the element's own appearance, never a ring or border. Buttons and links underline their label (`text-decoration` at 2px with a 0.25em offset), and a newsletter field fills with a `currentColor` wash at 26%. Both adapt to any style variation without naming a colour, which a fixed ring cannot do: an outer `currentColor` ring is white on a filled button and vanishes on a white page, while an inset one collides with the field borders around it.

This is still `accessibility-ready`: WCAG 2.4.7 wants a *visible* focus indicator, not specifically an outline. Keep it that way — if you ever weaken these, the tag has to go.

Two traps when writing the rules:

- **`:focus-visible` is not allowed in theme.json** (`VALID_ELEMENT_PSEUDO_SELECTORS` permits only `:link`, `:any-link`, `:visited`, `:hover`, `:focus`, `:active`), so anything under `elements.*:focus` also fires on mouse clicks and sticks there. Focus styling therefore lives in top-level `styles.css`, which does support `:focus-visible`; its plain-class specificity `(0,2,0)` also beats the `:root :where(…)` `(0,1,0)` that theme.json emits, which is what lets the blanket `:focus{outline:none}` win. For the same reason `elements.button` must not restyle `:focus` at all.
- **Form controls do not inherit `color`.** A submit hidden with `color:transparent` makes `currentColor` transparent, and inheriting nothing makes it the UA's black. Hide the label with `font-size:0;line-height:0` and set `color:inherit`. Also scope the input reset as `input:not([type=submit]):focus` — without the `:not()` it silently kills the submit's own focus styling at equal specificity.

**Newsletter forms** come from the Mailchimp for WordPress plugin (Brevo also works) — wp.org themes cannot bundle forms. `patterns/cta.php` and `patterns/footer.php` check `function_exists( 'mc4wp_show_form' )` and render `<!-- wp:mailchimp-for-wp/form /-->` inside a Group carrying the `newsletter-underline` (CTA) or `newsletter-boxed` (footer) block style; otherwise the CTA falls back to a button and the footer omits the slot. The styles target the plugin's `.mc4wp-form-fields > p > input` markup (`display: contents` on the `<p>` makes the inputs flex items) and hide the submit label under a fixed-white arrow `background-image`. MC4WP renders **nothing for logged-out visitors until an API key is set** — locally a dummy key in the `mc4wp` option is enough. The recommended form markup lives in `readme.txt`.

**Template parts cannot run PHP**, so a part that needs `get_theme_file_uri()` (footer background, icons) is a one-line `wp:pattern` reference to a PHP pattern (`parts/footer.html` → `patterns/footer.php`, registered with `Block Types: core/template-part/footer`).

**Hand-written block markup must match core's `save()` byte for byte**, or the editor shows "Block contains unexpected or invalid content" while the front end still looks fine — so the bug is invisible until someone opens the Site Editor. The trap already hit: `core/image` with `aspectRatio` set emits **no `width`/`height` HTML attributes** (the ratio comes from the inline `aspect-ratio`), so adding them invalidates the block. When markup is rejected, don't guess — open the template in the Site Editor and read the console: Gutenberg logs `Block validation: Block validation failed for ...` with the expected and actual HTML side by side, which is the authoritative diff.

> **Validate every template, part and pattern at once, without the Site Editor canvas.** The canvas does not mount in this install (the app shell renders, `edit-site-layout__canvas` never appears, no console error), so the read-the-console technique above is unavailable. It is not needed: `window.wp.blocks` is loaded on `wp-admin/site-editor.php` even when the canvas fails, with every core *and* plugin block type registered client-side. Fetch the content via `wp.apiFetch` from `/wp/v2/templates`, `/wp/v2/template-parts` and `/wp/v2/block-patterns/patterns`, run `wp.blocks.parse()` over each, and walk `innerBlocks` for `isValid === false`. That is the same parser and validator the editor itself uses, so a clean run is authoritative — and it covers the whole theme in one call instead of one template at a time. Patterns must be checked from the REST list, not from the template files: a `wp:pattern` reference parses as an empty `core/pattern` block, so validating templates alone silently skips every pattern body.

**Full-width patterns need `post-content` to carry `align: full`.** A pattern marked `alignfull` cannot escape its containing block, and a plain post-content block inside a constrained `<main>` is itself only `contentSize` wide — so every full-bleed section collapsed to 800px the moment it was inserted into a page. The page templates therefore declare `{"align":"full","layout":{"type":"constrained"}}` on post-content: it spans the main, and its own constrained layout still holds ordinary paragraphs at `contentSize` while `alignwide` and `alignfull` children reach 1170px and full bleed. The sidebar templates deliberately keep the constrained form, because their content sits inside a column.

**A nested constrained group falls back to the *root* `contentSize`, not its parent's.** `layout: {type: constrained, contentSize: 1170px}` on a section wrapper sizes its direct children at 1170px — but a child that is *itself* `type: constrained` with no `contentSize` of its own resolves against `settings.layout.contentSize` (800px) and centres there, so an eyebrow-and-heading group indents while the columns beside it stay at 1170px. Inner grouping wrappers that only exist to set a `blockGap` must be `layout: {type: default}`. This hit `about-split.php` and `stats-inline.php`; it does not affect flex wrappers, which fill their parent.

**A constrained group is still block level.** `layout: {type: constrained, contentSize: 24px}` sizes a group's *children*, not the group, so an icon badge written that way stretches to the full column width on its own — and squashes to an oval when it is a flex item competing with text. Wrap it in a `layout: flex` group to shrink it to its content, and add `dimensions.minWidth` so it cannot be compressed. Both traps hit the pattern tranche; `patterns/services.php` already had the flex wrapper and was the model. Note also that `core/group` supports only `minHeight` and `minWidth` under `dimensions` — an `aspectRatio` there is silently dropped and will fail editor validation if you hand-write the matching inline style.

**A round icon badge must be sized, not padded.** Padding plus `minWidth` alone does not make a circle: the box's natural height is padding + border + the *image figure*, and that figure is taller than the image — an `<img>` is inline, so core's `vertical-align: bottom` leaves the line box's leading above it (a 24px icon renders a 28px figure). Meanwhile `min-width` lets flex shrink the width back down to exactly that value. The five icon badges therefore rendered 56×62 and 48×52 — visibly egg-shaped. Write the badge with **no padding**, equal `dimensions.minWidth` *and* `minHeight`, `layout: {type: flex, justifyContent: center, verticalAlignment: center}`, and `style.typography.lineHeight: "0"` to collapse the figure's leading. The icon then centres exactly and the circle no longer depends on padding arithmetic. Note the flex layout classes (`is-layout-flex`, `is-content-justification-center`) are **not** in the saved markup — the layout support adds them at render time — while `verticalAlignment` produces no class at all and is applied through the generated `wp-container-core-group-is-layout-…` rule.

**`templates/front-page.html` mirrors the Figma `Homepage` frame section for section**, in its order: hero → `feature-strip` (dark promise band) → `about-split` → `stats-inline` → `services` → `process-split` → `team-dark` → `testimonials-rated` → `posts-latest` → `cta`. Each is a `wp:pattern` reference, so the template itself stays a ten-line composition. The Figma file is rate-limited on the Starter MCP plan; when `get_design_context` and `get_screenshot` return "You've reached the Figma MCP tool call limit", read the frame through the browser instead — open the file, click a layer in the Layers panel and press `shift+2` (zoom to selection). Panning the canvas with synthetic wheel or Page Up/Down events does **not** work, so select-then-zoom is the only reliable way to walk a tall frame.

**Root block gap:** `styles.spacing.blockGap` (20px) also separates the header part, `<main>` and footer part when they sit at the template root. Page templates that need edge-to-edge sections wrap everything in one `alignfull` constrained Group with `blockGap: 0` (see `templates/front-page.html`) and let each section own its vertical padding. The wrapper **must** be `align: full`, otherwise it is constrained to `contentSize` and every full-width child collapses to 800px.

**Line heights** live in `settings.custom.lineHeight` as `var(--wp--custom--line-height--<slug>)`. Letter spacing: `settings.custom.letterSpacing.tight` (-0.03em). A `fontSizes` preset **only ever emits `font-size`**; putting `lineHeight` or `fontWeight` in one does nothing (core's `PRESETS_METADATA` declares `'properties' => array( 'font-size' )`). That is why line heights are custom tokens rather than preset properties.

> **Whenever you override a heading's font size, set the matching line height too.** `styles.elements.h1`–`h6` bind a size *and* its line height together. Change only the size on a block — say an `h2` set to `heading-03` — and it keeps the `h2` element's `heading-02` leading, silently pairing a size with the wrong line height. This produced a 63.36px line height where the design called for 64px.

> **A preset font size goes in the block's `fontSize` attribute, never in `style.typography.fontSize`.** Write `"fontSize":"large-title"` (which emits `has-large-title-font-size`), not `"style":{"typography":{"fontSize":"var:preset|font-size|large-title"}}`. The second form renders correctly on the front end — the server-side style engine resolves `var:preset|…` into the inline style — but the **editor's client-side serializer does not**, so the declaration is dropped there and the block silently falls back to the element default from `theme.json`. A services card title set this way rendered 24px on the front end and 60px in the editor, while the sibling `line-height` (a genuine custom value) applied in both. Any preset reference under `style.typography.fontSize` is a bug; grep for `"fontSize":"var:preset` before shipping.

### WooCommerce

`add_theme_support( 'woocommerce' )` in `functions.php` is what makes WooCommerce resolve its block templates against this theme. The theme then overrides **all seven** slugs WooCommerce ships (`archive-product`, `taxonomy-product_attribute`, `product-search-results`, `single-product`, `page-cart`, `page-checkout`, `order-confirmation`), replacing the plugin's `woocommerce/legacy-template` shortcode rendering with real blocks. Only `coming-soon` is left to the plugin. neve-fse ships none of these, which is where a large part of the lead over it comes from.

- **Do not add `taxonomy-product_cat.html`, `taxonomy-product_tag.html` or `taxonomy-product_brand.html`.** All three — plus `taxonomy-product_attribute` — declare `fallback_template = ProductCatalogTemplate::SLUG` (see `src/Blocks/Templates/AbstractTemplateWithFallback.php`), so they already resolve to `archive-product`. `taxonomy-product_attribute` still needs its own file *only* because the plugin ships one, and a plugin file for an exact slug beats the theme's fallback. Everything shared lives in `patterns/product-grid.php`, referenced from each archive template.
- **Checkout and order confirmation use `header-minimal` / `footer-minimal`** rather than WooCommerce's own `checkout-header` part, so the purchase flow stays inside the theme's chrome.
- **`woocommerce/customer-account` appears in the header without being in `patterns/header.php`.** It is a *hooked block* (`blockHooks` in its `block.json`), auto-inserted by core into the header template part. That is correct behaviour — do not try to remove it, and do not add a second account block.
- Product cards, the product meta row and related products are patterns (`product-grid`, `product-meta`, `product-related`) because their prefixes and empty-state copy have to be translatable, which an HTML template cannot do.
- **One card definition, two grids.** `patterns/product-card.php` is the inside of `woocommerce/product-template` — image, title, category, split price/add-to-cart row — and both `product-grid` and `product-related` reference it with `wp:pattern`. A pattern reference resolves inside a product template fine; keep it that way rather than copying the card, or the catalog and the related strip drift apart.
- The catalog layout (`archive-product`, `taxonomy-product_attribute`, `product-search-results`) is a `product-archive-hero` banner over a two column split: `product-filters` in a 280px aside, the toolbar and grid in the rest. The colour filter resolves its `attributeId` through `wc_attribute_taxonomy_id_by_name( 'color' )` and is skipped when the store has no such attribute — never hardcode an attribute ID, they differ per store.

> **WooCommerce's filter blocks have a JS `save()` even though they render in PHP, and the saved markup is load-bearing.** `product-filter-price-slider` and `product-filter-checkbox-list` must be written as an open/close pair around an empty `<div>` carrying **two** classes (`wp-block-woocommerce-…` *and* `wc-block-…`); the `product-filters` wrapper likewise needs `wp-block-woocommerce-product-filters wc-block-product-filters`. Writing any of them self-closing fails editor validation, and WooCommerce's render then reads attributes off markup that is not there — `ProductFilterRemovableChips::render()` warns `Undefined variable $classes` for exactly this reason, because `$classes` is only assigned inside an `if ( $tags->next_tag(...) )`. The active-filters panel (`product-filter-active` with removable chips and a clear button) is left out of the sidebar for that reason.

> **Get exact `save()` markup from the editor instead of guessing it.** On `wp-admin/site-editor.php`, build the tree with `wp.blocks.createBlock( name, attrs, innerBlocks )` and run `wp.blocks.serialize()` on it: the result is byte-exact correct markup for those attributes, straight from the serializer that validation compares against. This is how the filter wrappers above were found, and it beats iterating on validation failures. Pair it with the whole-theme validation sweep described earlier.

> **theme.json cannot outrank WooCommerce's own CSS.** Everything under `styles.blocks.<block>.css` is emitted wrapped in `:root :where(…)`, which is specificity **(0,1,0)** no matter how many classes the inner selector names — `:where()` zeroes them. The same is true of a block *style variation* in `styles/blocks/`, so switching to one does not help. WooCommerce's compatibility CSS routinely sits at (0,2,0) or higher (`.woocommerce span.onsale` (0,2,1), `.woocommerce-cart .wp-block-post-title{max-width:1000px}` (0,2,0), `.woocommerce div.product div.images .flex-control-thumbs` (0,3,2)), so it wins every time. Rules that must beat the plugin belong in top-level `styles.css`, which is emitted **verbatim** — the same escape hatch the focus states use — with enough classes to clear the plugin's selector; four of WooCommerce's own classes gets (0,4,0), which beats (0,3,2). Keep them scoped to a WooCommerce body or block class so they stay inert without the plugin. **Measure before escalating**: read the winning rule out of `document.styleSheets` rather than assuming, since Woo suppresses much of its legacy CSS under `woocommerce-uses-block-theme` — the single-product add-to-cart button already inherits `elements.button` unaided, and only looked wrong because a variable product disables it until options are chosen. Rules that only have to beat *core* defaults (the sale-badge pill on `woocommerce/product-sale-badge`, the 8px image radius, the struck-through price colour) are fine in `styles.blocks` and are then skipped entirely when WooCommerce is inactive, because unregistered blocks get no selector.

> **Prefer a block attribute over a CSS override.** The product tab panels rendered their title at the full `h2` size (60px); the fix is `"hideTabTitle":true` on `woocommerce/product-details`, not a font-size rule. Check the block's `attributes` in the registry before writing CSS.

**Seeding sample products** (dev only, never shipped): `wp plugin install woocommerce --activate`, then run WooCommerce's own CSV importer over `sample-data/sample_products.csv`. Two traps, both silent:

- **Run WP-CLI as a user** (`wp --user=1 …`). `WC_Product_CSV_Importer::parse_categories_field()` opens with `if ( ! current_user_can( 'manage_product_terms' ) ) break;`, and CLI has no current user — so every product imports with the right name, price and images but lands in *Uncategorized*, with no error anywhere.
- **`update_existing` must be `false` on a first import.** With it `true` the importer skips any row whose ID or SKU does not already exist, which on a fresh site is all of them: "imported 0, skipped 25".

Activation also switches on `woocommerce_coming_soon`; turn it off locally. The `no_touch.py` hook blocks `wp plugin install …` when the command also names a path outside the theme (the token `install` is a mutator) — run it from the theme directory with no `--path`, since WP-CLI walks up to find the WordPress root.

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
| Button Large | 16 / 20 | 600 in Figma, **500 shipped** | buttons (500) and navigation links (600) |
| Button Small | 14 / 20 | 700 in Figma, **500 shipped** | the rounded header button |

> **Buttons deliberately ship lighter than the Figma spec.** `elements.button` and `styles/blocks/button-rounded.json` are both `500` by explicit direction, overriding the 600/700 the design binds. Navigation stays at 600 (it shares the Button Large size, not the button element), and `button-chip.json` stays at 400 — the footer contact chips are informational, not calls to action. Don't "correct" these back to the Figma values.

## Conventions

- Text domain `blockspire`; `Domain Path: /languages`. Wrap user-facing strings in translation functions and regenerate with `npm run pot`.
- Requires **WP 6.7+ / PHP 7.4+**. Keep API usage within that floor.
- **Author RTL-safe CSS from the start**: use `margin-inline`, `padding-inline`, `inset-inline`, `text-align: start`. Never physical `left`/`right` properties. Retrofitting is expensive.
- **Accessibility-ready is a commitment**: skip links, visible focus indicators (see **Focus states** — the theme deliberately uses no rings), keyboard-navigable menus, labelled form fields, AA contrast in every style variation.
- No remote requests. wp.org forbids them — fonts and images are always bundled locally.
- Every bundled image needs its source URL and licence recorded in `readme.txt`.
- `useRootPaddingAwareAlignments` and `appearanceTools` are on — prefer theme.json layout settings over hand-written CSS.

## Commands

There is no runtime build — theme files are hand-authored and served directly. All tooling is dev-only and stays out of the zip. The scripts are listed in `package.json`; `npm run check` is the one that gates a commit.

`npm run lint:json` exists because a mistyped `theme.json` key parses fine and then does nothing. It already caught `fontStyles` (correct key: `fontStyle`), `lineHeight`/`fontWeight` on a font-size preset, and `padding-top`-style keys under `styles.spacing.padding` (correct: `top`/`right`/`bottom`/`left`). Run it after every `theme.json` edit.

## Caching while developing

**Set `define( 'WP_DEVELOPMENT_MODE', 'theme' );` in `wp-config.php`.** Without it, newly added or edited patterns will not appear, and you will waste time thinking the pattern is broken when it is only cached.

- **Patterns** are cached in a *site* transient, `wp_theme_files_patterns-<cache_hash>`, keyed by the theme's `Version`. `wp transient delete --all` does **not** clear it (that only removes ordinary transients). Clear it with `wp eval 'wp_get_theme()->delete_pattern_cache();'`, or bump the theme version, or turn on theme development mode, which bypasses the cache entirely.
- **Templates and template parts** are also cached; flush with `wp cache flush` after adding files.
- **Global styles** compiled from `theme.json` are cached too — hard-refresh if a token change doesn't show.
- Site Editor customizations saved by a user live in the database and **override** the theme files — `wp_global_styles` beats `theme.json`, and `wp_template` / `wp_template_part` posts beat `templates/*.html` and `parts/*.html`. A "my change isn't applying" report is usually this, not a syntax error. Check with `wp post list --post_type=wp_template` and `--post_type=wp_template_part`; an empty list means the theme files are live. **Saving a template in the Site Editor flattens every `wp:pattern` reference into a copy**, so once `front-page` is in the database, editing `patterns/hero.php` changes nothing on the site. Reconcile before trusting a visual check.
