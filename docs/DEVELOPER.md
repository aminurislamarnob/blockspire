# Blockspire — Developer Guide

Blockspire is a **WordPress block theme** (full site editing) built as a multipurpose theme for
**WordPress.org submission**: business sites, agencies, blogs, portfolios and WooCommerce stores.
There is no build step and no PHP templating — every file in the theme is hand-authored and served
as-is. The design source of truth is the weLabs Figma file; the code source of truth for the design
system is `theme.json`.

The theme's benchmark is `neve-fse` (ThemeIsle's block theme, already on wp.org). Blockspire aims to
beat it on templates, parts, patterns and style variations, and decisively on bundle size,
accessibility and modern block APIs — most visibly by shipping a complete set of **WooCommerce block
templates**, which neve-fse does not.

---

## 1. Quick facts

| | |
|---|---|
| Theme slug / text domain | `blockspire` |
| Version | 1.0.0 |
| Requires | WordPress 6.7+, PHP 7.4+ |
| License | GPL-2.0-or-later |
| Templates | 20 (`templates/*.html`), incl. 7 WooCommerce + 5 custom templates |
| Template parts | 5 (`parts/*.html`) |
| Patterns | 55 (`patterns/*.php`), 12 theme pattern categories |
| Block style variations | 25 (`styles/blocks/*.json`) |
| Theme style variations | 1 (`styles/midnight.json`) |
| Fonts | Poppins, self-hosted WOFF2, 4 weights |
| JavaScript | 3 small vanilla files, all progressive enhancements |
| Runtime dependencies | none (WooCommerce and Mailchimp for WordPress are optional integrations) |

---

## 2. How the theme renders a page

Understanding the chain below explains almost every file in the theme:

```
request
 └─ WordPress template hierarchy picks a file from templates/*.html
     └─ the template references shared regions:  wp:template-part {"slug":"header"}
         └─ parts/header.html
             └─ which is a one-line reference:   wp:pattern {"slug":"blockspire/header"}
                 └─ patterns/header.php          ← the actual markup lives here
```

Three consequences worth internalising:

1. **Templates and parts are static HTML** — they cannot run PHP. Anything that needs
   `get_theme_file_uri()` (image URLs) or translation functions must live in a **pattern**, which is
   a PHP file. That is why `parts/footer.html` is a single `wp:pattern` line pointing at
   `patterns/footer.php`.
2. **The Site Editor can override every file.** When a user saves a template, part or global styles,
   the customised copy is stored in the database (`wp_template`, `wp_template_part`,
   `wp_global_styles` posts) and **wins over the theme file**. Saving a template also *flattens*
   every `wp:pattern` reference into a static copy — after that, editing the pattern file changes
   nothing on that site. During development, check for overrides with
   `wp post list --post_type=wp_template` before trusting a visual result.
3. **A pattern is copied on insert.** When a user inserts a pattern into a page, the markup is
   copied into the post. Later edits to the pattern file do not retro-fit existing content — so
   pattern markup must be right before release.

---

## 3. Directory map

```
blockspire/
├── style.css            Theme header ONLY (metadata + tags). No CSS rules here, ever.
├── theme.json           The entire design system: tokens, element styles, block styles, custom CSS.
├── functions.php        Deliberately thin. Supports, pattern categories, scripts, one Woo filter.
├── readme.txt           wp.org readme: copyright, bundled-asset licences, recommended form markup.
├── screenshot.png       Theme screenshot for the wp.org listing and admin.
├── templates/           Block templates (HTML). Picked by the template hierarchy.
├── parts/               Template parts (HTML). Header/footer/sidebar shells.
├── patterns/            All real markup lives here (PHP, auto-registered by core).
├── styles/              midnight.json = theme style variation (no blockTypes key)
│   └── blocks/          *.json with a blockTypes key = block style variations
├── assets/
│   ├── fonts/           Poppins WOFF2 ×4, loaded via theme.json fontFace (no remote requests)
│   ├── images/          SVG icons, decorative textures, hero photo, logo (+ src/ originals)
│   └── js/              scroll-to-top.js, counter-up.js, carousel.js
├── languages/           blockspire.pot (regenerate with `npm run pot`)
└── tools/               Dev-only: linters, contrast checker, seeders, zip builder. Never shipped.
```

Dev-only files excluded from the shipped zip (see `tools/build-zip.sh`): `tools/`, `docs/`,
`node_modules/`, `vendor/`, `package*.json`, `composer*`, `phpcs.xml.dist`, `CLAUDE.md`,
`README.md`, `assets/images/src/`.

---

## 4. The design system (`theme.json`)

`theme.json` (schema v3) is the **single source of truth**. Templates, patterns and `functions.php`
consume it and never duplicate a value. Core's default palette, gradients, duotones and default
font/spacing sizes are disabled, so editors only ever see the theme's own presets.
For a key-by-key walkthrough of the entire file, see `docs/THEME-JSON.md`.

Presets are referenced in CSS as `var(--wp--preset--<type>--<slug>)` and in block attributes as
`var:preset|<type>|<slug>`.

### 4.1 Color palette

| Slug | Value | Role and rules |
|---|---|---|
| `primary` | `#2D5BDB` | Brand blue. Buttons, link accents. AA on white (5.78:1). |
| `accent` | `#FF9808` | Orange. **Fails contrast on white (2.15:1)** — only use on dark surfaces (7.85:1 on `secondary`) or as non-text decoration. |
| `secondary` / `heading-color` / `link-color` | `#111B3A` | Near-black text colour. Three slugs, one value, so each role can be re-pointed by a style variation independently. |
| `text-color` | `#626368` | Body copy grey. |
| `gray-02` | `#8D8D8D` | Large text and borders only (3.32:1). |
| `gray-03` | `#C6C6C6` | Borders and dividers only (1.71:1). |
| `dark-bg` | `#111111` | Footer / dark band surface. |
| `main-bg` / `text-white` | `#FFFFFF` | Page background; text on dark surfaces. |
| `light-bg` | `#F4F4F4` | Tinted section background. |

Run `node tools/contrast.mjs` (part of `npm run check`) after any palette change — it recomputes
every pairing and enforces the rules above.

### 4.2 Typography

One family: **Poppins** (`fontFamily` slug `poppins`), self-hosted WOFF2 in Regular/Medium/
SemiBold/Bold, registered through `settings.typography.fontFace` — wp.org forbids remote font
requests.

Font-size presets (larger ones are fluid via `fluid.min`/`max`):

| Slug | Size | Design name / use |
|---|---|---|
| `heading-01` | 94px (fluid ≥40) | Hero display heading |
| `heading-02` | 72px (fluid ≥36) | — |
| `heading-03` | 60px (fluid ≥32) | Section titles |
| `heading-04` | 48px (fluid ≥28) | — |
| `heading-05` | 36px (fluid ≥26) | — |
| `heading-06` | 30px (fluid ≥24) | — |
| `display` | 64px (fluid ≥36) | Oversized marketing headings (CTA band), pair with `letterSpacing.tight` |
| `large-title` | 24px (fluid ≥20) | Card titles |
| `medium-title` | 20px | Section eyebrows, footer headings |
| `small-title` | 16px | Form labels/placeholders |
| `large-paragraph` | 18px | Hero supporting text |
| `medium-paragraph` | 16px | Body copy, inline links |
| `small-paragraph` | 14px | Card body |
| `button-large` | 16px | Buttons and navigation |
| `button-small` | 14px | Rounded header button |

**Line heights are separate custom tokens** (`settings.custom.lineHeight.<slug>`, used as
`var(--wp--custom--line-height--<slug>)`). They cannot live inside the font-size presets: a
`fontSizes` preset only ever emits `font-size` — core ignores any other property placed there.
Weights (`custom.fontWeight.regular|medium|semibold|bold`) and `custom.letterSpacing.tight`
(-0.03em) work the same way.

Two rules that prevent recurring bugs:

- **Whenever you override a heading's font size on a block, set the matching line height too.**
  `styles.elements.h1`–`h6` bind size *and* leading together; changing only the size silently keeps
  the wrong leading.
- **A preset font size goes in the block's `fontSize` attribute**
  (`"fontSize":"large-title"` → `has-large-title-font-size`), **never** in
  `style.typography.fontSize` as `var:preset|…`. The second form renders on the front end but the
  editor's serializer drops it, so the editor shows the wrong size. Before shipping:
  `grep -r '"fontSize":"var:preset' patterns/` must return nothing.

Buttons deliberately ship **lighter than the Figma spec** (500 instead of 600/700) by explicit
direction; navigation stays 600 and the footer contact chips 400. Don't "correct" these.

### 4.3 Spacing

`settings.spacing.spacingSizes` slugs are the literal pixel value: `8, 10, 12, 16, 20, 24, 30, 32,
40, 48, 50, 60, 70, 80, 100` — so `var:preset|spacing|48` is always 48px, no guessing. The one
exception is **`fluid-inset`** = `clamp(24px, 8.5vw, 100px)`: use it wherever the design shows
100px horizontal padding on a band that must shrink on phones.

Anything a block attribute needs to reference must be a **preset** — the style engine resolves
`var:preset|…` shorthand in attributes but never `var:custom|…`.

### 4.4 Layout

- `contentSize: 800px` (running text), `wideSize: 1170px` (the design's content column).
- `useRootPaddingAwareAlignments` and `appearanceTools` are on — prefer theme.json layout settings
  over hand-written CSS.
- The root `styles.spacing.blockGap` (20px) also separates header, `<main>` and footer at the
  template root. Templates that need edge-to-edge sections therefore wrap everything in one
  `alignfull` constrained Group with `blockGap: 0` and let each section own its vertical padding
  (see `templates/front-page.html`). The wrapper **must** carry `"align":"full"` or every
  full-width child collapses to 800px.
- **Full-width patterns need `post-content` to carry `align: full`.** Page templates declare
  `{"align":"full","layout":{"type":"constrained"}}` on the post-content block so inserted
  `alignfull` patterns can reach the viewport edge while plain paragraphs stay at `contentSize`.
  The sidebar templates deliberately keep the constrained form (their content sits in a column).

Layout traps documented from experience (all live in `CLAUDE.md` in more detail):

- A **nested** constrained group with no `contentSize` of its own resolves against the *root*
  800px, not its parent's — grouping wrappers that only exist to set a `blockGap` must be
  `layout: {type: default}`.
- A constrained group sizes its **children**, not itself; to shrink-wrap something (an icon badge),
  wrap it in a `layout: flex` group and give it `dimensions.minWidth`.
- A round icon badge is sized, not padded: equal `minWidth` + `minHeight`, flex-centred, and
  `lineHeight: "0"` to collapse the image's line box.

---

## 5. Templates (`templates/`)

All 20 are block markup; the WooCommerce seven make the store fully themed (neve-fse ships none).

| Template | Role |
|---|---|
| `index.html` | Final fallback: post listing with meta, no-results state, pagination. |
| `home.html` | Blog posts page (adds the blog heading pattern). |
| `front-page.html` | The full Figma homepage — see §7.4 for the pattern recipe. |
| `archive.html` | Category/tag/date/author archives. |
| `search.html` | Search results + search form + no-results state. |
| `404.html` | Wraps the `blockspire/404` pattern. |
| `single.html` | Single post: meta row, content, comments. |
| `single-with-sidebar.html` | Custom template: post beside `parts/sidebar.html`. |
| `page.html` | Static page with title and comments. |
| `page-no-title.html` | Custom template: page without the title block (for pages that open with a hero pattern). |
| `page-with-sidebar.html` | Custom template: page beside the sidebar part. |
| `focused.html` | Custom template: minimal chrome (`header-minimal` / `footer-minimal`) for landing-style pages. |
| `blank.html` | Custom template: no chrome at all — post content only. |
| `archive-product.html` | Woo catalog: shop hero, filter sidebar, toolbar + product grid. |
| `taxonomy-product_attribute.html` | Same catalog layout for attribute archives. |
| `product-search-results.html` | Same catalog layout for product search. |
| `single-product.html` | Product page: gallery/summary split, meta, tabs, related products. |
| `page-cart.html` | Cart in full theme chrome. |
| `page-checkout.html` | Checkout in **minimal** chrome (fewer exits from the purchase flow). |
| `order-confirmation.html` | Thank-you page, minimal chrome, using Woo's own heading patterns. |

The five custom templates are registered in `theme.json` → `customTemplates` (that is what makes
them appear in the editor's Template picker, scoped to the right post types).

**Do not add** `taxonomy-product_cat.html` / `taxonomy-product_tag.html` — WooCommerce already
falls those back to `archive-product`. `taxonomy-product_attribute.html` exists only because the
plugin ships its own file for that exact slug, which would otherwise beat the theme's fallback.

**Hand-written markup must match core's `save()` output byte for byte** or the editor shows
"Block contains unexpected or invalid content" (the front end still renders, so the bug hides until
someone opens the Site Editor). When unsure, generate authoritative markup in the browser console
on `site-editor.php`:

```js
wp.blocks.serialize( wp.blocks.createBlock( 'core/image', { aspectRatio: '468/440' } ) )
```

And validate the whole theme in one sweep (same parser the editor uses):

```js
// on wp-admin/site-editor.php — fetch every template/part/pattern via wp.apiFetch
// from /wp/v2/templates, /wp/v2/template-parts, /wp/v2/block-patterns/patterns,
// run wp.blocks.parse() on each and walk innerBlocks for isValid === false.
```

Patterns must be validated from the REST pattern list, not through templates — a `wp:pattern`
reference parses as an *empty* block, so validating templates alone silently skips pattern bodies.

---

## 6. Template parts (`parts/`)

Registered in `theme.json` → `templateParts` with their areas:

| Part | Area | Contents |
|---|---|---|
| `header.html` | header | → `wp:pattern blockspire/header` |
| `header-minimal.html` | header | Inline markup: centred logo only (needs no PHP, so no pattern). |
| `footer.html` | footer | → `wp:pattern blockspire/footer` |
| `footer-minimal.html` | footer | → `wp:pattern blockspire/footer-minimal` |
| `sidebar.html` | uncategorized | → `wp:pattern blockspire/sidebar` |

The one-line `wp:pattern` indirection exists because **parts cannot run PHP** but the header/footer
need `get_theme_file_uri()` (logo, dot-grid background) and translatable strings. A pattern meant to
back a part declares `Block Types: core/template-part/<area>` in its header, which is what offers it
in the part-replacement flow.

The header pattern's navigation block is deliberately **empty** (`wp:navigation` with no `ref`, no
inner blocks): core then falls back to the newest `wp_navigation` post, so the user's menu "just
works". Never add inner blocks to it — that kills the fallback.

---

## 7. Patterns (`patterns/`)

### 7.1 How registration works

Core auto-registers every file in `patterns/` from its header comment — no PHP registration call:

```php
<?php
/**
 * Title: Hero with heading, text and call to action
 * Slug: blockspire/hero
 * Categories: blockspire-hero, featured
 * Description: …shown in the inserter tooltip…
 * Keywords: hero, banner, intro
 * Viewport Width: 1600            ← preview scale in the inserter
 * Block Types: core/template-part/header   ← only on part-backing patterns
 * Inserter: no                    ← only on internal plumbing patterns
 */
?>
```

The PHP in a pattern runs **once at registration**, not per render — so only registration-safe
functions are used: `esc_html__()`, `esc_attr__()`, `esc_url()`, `get_theme_file_uri()`,
`home_url()`, `function_exists()` / `class_exists()` guards. Never query-dependent functions.

The 12 `blockspire-*` categories are registered in `functions.php` on `init`; several patterns also
carry core categories (`featured`, `call-to-action`, `header`, `footer`) so they surface in core's
own groupings.

### 7.2 Authoring conventions

- Every visible string wrapped in a translation function with the `blockspire` domain, always
  escaped (`esc_html__` for text, `esc_attr__` inside attributes, `esc_url` for URLs).
- Colors, sizes and spacing always by **preset slug**, never raw values — that is what lets style
  variations restyle every pattern.
- Realistic placeholder copy, action-specific button labels, sequential heading levels, and the
  theme's own body copy (never the Figma file's lorem text).
- Images ship in `assets/images/` and are referenced with
  `esc_url( get_theme_file_uri( 'assets/images/…' ) )`; decorative ones get empty `alt`.
- RTL-safe from the start: logical properties only (`margin-inline`, `inset-inline`,
  `text-align: start`) — never `left`/`right`.
- Conditional integrations are guarded: `class_exists( 'WooCommerce' )` around the header icons,
  `function_exists( 'mc4wp_show_form' )` around newsletter forms — each with a sensible fallback.

### 7.3 Pattern catalog

**Site chrome** (back the template parts, `Block Types: core/template-part/*`):

| Pattern | What it is |
|---|---|
| `header` | Logo, empty navigation (DB fallback), Woo account + mini-cart icons (guarded), rounded "Start A Project" CTA. The `blockspire-header-cta` class is the hook the mobile drawer CSS uses to pin the button. |
| `footer` | Dark footer on the dot-grid texture: logo + social row, "Let's work together" with contact chips, two link columns, newsletter slot (MC4WP) / credit line. |
| `footer-minimal` | One quiet credit row for checkout/focused pages. |
| `sidebar` | Search + recent posts + categories for the sidebar templates. |

**Hero** (`blockspire-hero`): `hero` (display heading + supporting image collage — the theme's one
absolutely-positioned composition, see `styles/blocks/group-hero-collage.json`), `hero-centered`
(short centred variant with two buttons).

**Features & process** (`blockspire-features`): `feature-strip` (dark promise band under the hero),
`features` (icon feature grid), `feature-highlight` (single wide tinted card),
`feature-checklist` (checklist beside media), `values` (three statements over rules),
`stats` (dark stats band), `stats-inline` (stats row between hairlines — figures use the
`is-style-counter` count-up animation), `process` (numbered steps), `process-split`
(steps as a native Details accordion beside an image — pure CSS animation, a shared
`name="blockspire-process"` makes opening one step close the rest), `media-text`.

**Services** (`blockspire-services`): `services` (bordered icon cards grid),
`services-alternating` (full alternating rows).

**Pages / about** (`blockspire-pages`): `about-split`, `about-statement`, `section-intro-split`,
`content-two-columns`, `page-header` (rounded dark inner-page banner), `portfolio-grid`,
`callout`, `quote`.

**Testimonials** (`blockspire-testimonials`): `testimonials` (three bordered cards),
`testimonials-rated` (the scroll-snap carousel — CSS-only scrolling, JS only adds page dots;
marker class `blockspire-carousel`).

**Team** (`blockspire-team`): `team` (four columns), `team-dark` (eight cards on a dark band).

**Pricing / FAQ**: `pricing` (three plans, middle emphasised), `faq` (Details-block accordion,
zero JS), `faq-two-column`.

**CTA & newsletter** (`blockspire-cta`): `cta` (the big band: display heading + MC4WP form or
button fallback + `band-decoration.svg` texture), `cta-banner` (compact strip), `newsletter`
(standalone sign-up band).

**Contact** (`blockspire-contact`): `contact-details`, `contact-panel`, `social-follow`
(core Social Icons — no bundled brand images).

**Blog** (`blockspire-blog`): `blog-featured`, `posts-grid`, `posts-latest`,
`posts-two-column` — all Query Loop compositions with empty states.

**Internal plumbing** (`Inserter: no` — referenced by templates, hidden from the inserter):
`404`, `blog-heading`, `comments`, `no-results`, `post-meta`, `search-form`, and the WooCommerce
set: `product-archive-hero`, `product-card`, `product-filters`, `product-grid`, `product-meta`,
`product-related`. These are patterns (not template markup) because their strings must be
translatable and several need `get_theme_file_uri()`.

**One card, two grids:** `product-card` is the inside of `woocommerce/product-template`, and both
`product-grid` and `product-related` reference it with `wp:pattern` — a pattern reference resolves
fine inside a product template. Keep the indirection; copying the card would let the catalog and
the related strip drift apart.

### 7.4 The homepage recipe

`templates/front-page.html` is a ten-line composition mirroring the Figma `Homepage` frame in
order — each line a `wp:pattern` reference:

```
hero → feature-strip → about-split → stats-inline → services → process-split
     → team-dark → testimonials-rated → posts-latest → cta
```

This is also the pattern-quality bar: any new section pattern should be able to slot into a
composition like this with nothing but a `wp:pattern` line.

---

## 8. Styles: variations and block styles (`styles/`)

Core scans `styles/` recursively. The rule that sorts the two kinds: a JSON partial **with** a
`blockTypes` key registers a *block style variation* (an `is-style-<slug>` class offered in the
block's Styles panel); one **without** registers a *theme style variation* (a whole-site restyle in
Styles → Browse styles).

### 8.1 Theme style variations

- `midnight.json` — currently the only one. wp.org expects several for the `style-variations` tag;
  more are planned before submission. A variation only needs to override the tokens it changes
  (palette + a few element styles); because every pattern uses preset slugs, the whole theme
  follows automatically. Note: once a user picks a variation it is stored in the DB, so editing the
  JSON afterwards won't move existing sites.

### 8.2 Block style variations (25)

| Block | Styles |
|---|---|
| `core/button` | `arrow` (label + currentColor arrow), `outline-arrow`, `chip` (footer contact chips), `rounded` (header CTA) |
| `core/paragraph` | `arrow-link` (inline "Learn more" arrow), `counter` (count-up figure), `rating` (five stars) |
| `core/group` | `arrow-lead`, `catalog-toolbar`, `hero-collage`, `hero-grid`, `newsletter-boxed`, `newsletter-underline`, `process-step` (numbered-badge connector line), `product-card-actions`, `product-meta` |
| `core/details` | `step` (the accordion step) |
| `core/navigation` | `bulleted` (footer link lists) |
| `core/navigation-link` | `hover-primary` |
| `core/read-more` | `arrow` |
| `core/post-terms` | `chip` |
| `core/column` | `product-gallery-surface` |
| `woocommerce/breadcrumbs` | `caps`, `caps-center` |
| `woocommerce/product-collection` | `product-cards` |

Most carry a `css` key. Constraints of core's `css` processing
(`WP_Theme_JSON::process_blocks_custom_css`) that every partial must respect:

- The string is split on the ampersand and each fragment prefixed with the variation selector — so
  **one ampersand per rule**, fold selector alternatives into `:is()`, never prefix with
  `[dir="rtl"]` (use `:dir(rtl)` instead), and **no media queries** (they get mangled;
  media-scoped rules live in top-level `styles.css` instead — the reduced-motion overrides are
  there for exactly this reason).
- The button variation selector already ends in `.wp-block-button__link`, so target `::after` on
  the ampersand directly, never a descendant `.wp-block-button__link::after`.
- Icons that must follow text colour (button/link arrows) are `::after` boxes filled with
  `currentColor` through a data-URI `mask` — an `img` element cannot inherit colour and would
  break in dark variations.

**Never** register a block style from PHP with `register_block_style()` + an inline CSS string:
that hardcodes values outside the token system and cannot respond to style variations. Always a
JSON partial in `styles/blocks/`.

---

## 9. CSS architecture — where a rule is allowed to live

Three layers, in order of preference:

1. **`theme.json` presets, element styles and `styles.blocks`** — the default home. Everything here
   (and in style-variation partials) is emitted wrapped in `:root :where(…)`, which is specificity
   **(0,1,0)** regardless of how many classes the selector names.
2. **`styles/blocks/*.json` variations** — for opt-in looks. Same (0,1,0) emission.
3. **Top-level `styles.css` inside `theme.json`** — the escape hatch, emitted **verbatim**. This is
   the only place for anything that must beat (0,1,0): `:focus-visible` rules (not allowed in
   theme.json), the mobile drawer (needs `:has()` and must out-rank core's overlay CSS), the
   carousel and scroll-to-top UI, media queries, and WooCommerce overrides (Woo's compatibility CSS
   sits at (0,2,0)–(0,3,2); stack enough classes to clear it and keep each rule scoped to a Woo
   class so it is inert without the plugin). The theme's only two `!important`s live here — the
   mini-cart badge colours, which Woo writes as inline styles.

Rules of engagement: **measure before escalating** (read the winning rule out of
`document.styleSheets` rather than assuming), and **prefer a block attribute over CSS** — e.g. the
product tabs' oversized title was fixed with `"hideTabTitle":true`, not a font-size rule.

### Focus states (accessibility-ready commitment)

**No focus outlines anywhere.** Keyboard focus is shown through the element's own appearance:
buttons and links underline their label (2px, 0.25em offset), newsletter fields fill with a 26%
`currentColor` wash. Both adapt to any style variation without naming a colour — a fixed ring
cannot. WCAG 2.4.7 requires a *visible* indicator, not an outline; if these rules are ever
weakened, the `accessibility-ready` tag has to go. Implementation details that matter:
`:focus-visible` lives in `styles.css` (theme.json only allows `:focus`, which would stick after
mouse clicks); form controls don't inherit `color`, so the hidden submit label uses
`font-size:0;line-height:0` + `color:inherit`; and the input reset is scoped
`input:not([type=submit]):focus`.

### Mobile navigation drawer

Styled entirely in `styles.css`: drawer links are equal 48px rows (`padding-block:14px` on the
link, `gap:0` on the containers — the selector must include
`.wp-block-navigation__responsive-container-content` to match core's (0,4,0) padding reset), and
the header CTA is pinned to the drawer bottom by
`html:has(.wp-block-navigation__responsive-container.is-menu-open) .blockspire-header-cta`
(fixed, full-width, above core's z-index 100000; the drawer carries 104px bottom padding so a long
menu scrolls clear). It is the *same DOM element* as the header button — nothing duplicated, the
DB menu fallback untouched. Known trade-off: core's focus trap makes the pinned button
pointer-only while the overlay is open (it stays keyboard-reachable in the header). Don't move the
button into the navigation block to "fix" this — inner blocks kill the `wp_navigation` fallback.

---

## 10. JavaScript (`assets/js/`)

Three small vanilla files. All are deferred, all are **enhancements only** — nothing is missing or
broken if a script never runs, and every animation honours `prefers-reduced-motion`.

| Script | Loads | Does |
|---|---|---|
| `scroll-to-top.js` | Every page (its button is printed on every page from `wp_footer`) | Shows/animates the back-to-top control. |
| `counter-up.js` | Only when an `is-style-counter` paragraph renders | Counts a figure up from zero on first viewport intersection. Only rewrites the DOM at animation time (never leaves an unseen zero); hides the moving number from screen readers behind a `.screen-reader-text` final value; `parse()` only accepts number shapes it can rebuild and leaves anything else untouched. |
| `carousel.js` | Only when a `blockspire-carousel` group renders | Adds page dots to the testimonial strip. The strip itself is a CSS scroll-snap carousel and fully usable without JS. Dots are real buttons (the keyboard interface); paging is derived from card `offsetLeft` deltas, with a hand-driven rAF glide (scripted smooth `scrollTo` is unreliable, and mandatory snap containers coerce `scrollLeft` writes). |

**The conditional-loading mechanism** is the part to preserve: both scripts are *registered* on
`wp_enqueue_scripts` and *enqueued* from `blockspire_enqueue_block_scripts()`, a
`render_block_core/group` / `render_block_core/paragraph` filter watching for the marker classes.
Watching the renderer is the only reliable trigger — `has_block()` reads post content and misses
blocks arriving from templates, and a Site Editor save flattens pattern references so a
pattern-side enqueue stops firing. The mid-render enqueue works because block templates render
**before** `wp_head()`.

---

## 11. `functions.php` reference

Deliberately thin — theme.json cannot do these six things, and nothing else belongs here:

| Hook | Function | Purpose |
|---|---|---|
| `after_setup_theme` | `blockspire_setup` | Text domain + `add_theme_support( 'woocommerce' )`. Core already gives block themes `post-thumbnails`, `responsive-embeds`, `editor-styles`, `html5`, `automatic-feed-links` — never re-add those. |
| `init` | `blockspire_register_pattern_categories` | The 12 `blockspire-*` inserter categories. |
| `wp_enqueue_scripts` | `blockspire_enqueue_scripts` | Enqueues scroll-to-top; registers counter + carousel. |
| `render_block_core/group`, `render_block_core/paragraph` | `blockspire_enqueue_block_scripts` | Marker-class watcher (§10). |
| `hooked_block_types` (prio 20) | `blockspire_unhook_customer_account` | Stops Woo injecting a duplicate account icon after the navigation (the header places it explicitly; Woo dedupes its mini-cart but not the account icon). |
| `wp_footer` | `blockspire_render_scroll_to_top` | Prints the back-to-top button (here, not in a part, so it survives user-customised templates). |

---

## 12. WooCommerce integration

Everything is optional — with the plugin inactive, the guards in `patterns/header.php` skip the
icons, the Woo templates are simply never resolved, and Woo-scoped CSS matches nothing.

- `add_theme_support( 'woocommerce' )` is what makes Woo resolve its block templates against the
  theme. The theme overrides **all seven** slugs Woo ships (§5), replacing the plugin's
  legacy-shortcode rendering with real blocks. Only `coming-soon` is left to the plugin.
- The catalog layout is `product-archive-hero` over a two-column split: `product-filters` in a
  280px aside, toolbar + `product-grid` in the rest. The colour filter resolves its attribute ID
  via `wc_attribute_taxonomy_id_by_name( 'color' )` and is skipped when absent — attribute IDs
  differ per store, never hardcode one.
- **Filter-block markup is load-bearing:** `product-filter-price-slider`,
  `product-filter-checkbox-list` and the `product-filters` wrapper must be written as open/close
  pairs around a `div` carrying both the `wp-block-woocommerce-…` and `wc-block-…` classes.
  Self-closing forms fail editor validation and break the PHP render. When in doubt, generate the
  markup with `wp.blocks.createBlock` + `serialize` (§5).
- Checkout and order confirmation use the theme's own minimal header/footer, not Woo's
  `checkout-header` part, keeping the purchase flow in theme chrome.
- CSS strategy against Woo's plugin styles: §9. Prefer block attributes (e.g. `hideTabTitle`) over
  CSS overrides.
- Dev-only product seeding: WooCommerce's CSV importer over its sample data, run as
  `wp --user=1 …` (the importer silently drops categories with no current user) and
  `update_existing=false` on a first import. Activation turns on `woocommerce_coming_soon`;
  switch it off locally.

---

## 13. Newsletter forms

wp.org themes cannot bundle form handling, so newsletter slots integrate with the **Mailchimp for
WordPress** plugin (Brevo works too). `patterns/cta.php`, `patterns/footer.php` and
`patterns/newsletter.php` guard on `function_exists( 'mc4wp_show_form' )` and render the
`mailchimp-for-wp/form` block inside a Group carrying `is-style-newsletter-underline` (CTA)
or `is-style-newsletter-boxed` (footer); without the plugin the CTA falls back to a button and the
footer omits the slot. The styles target the plugin's `.mc4wp-form-fields > p > input` markup
(`display: contents` on the `p` turns the inputs into flex items). Recommended form markup for
users is documented in `readme.txt`. Note: MC4WP renders nothing for logged-out visitors until an
API key is saved — locally a dummy key in the `mc4wp` option suffices for styling work.

---

## 14. Assets

- **Fonts:** Poppins WOFF2 ×4 via `settings.typography.fontFace`. `npm run fonts` converts new TTFs.
- **Images:** every bundled image needs its source URL and licence recorded in `readme.txt` —
  this is a hard wp.org requirement. `assets/images/src/` keeps pre-conversion originals
  (excluded from the zip); `npm run images` converts to WebP.
- **Decorative textures** are drawn in white at low opacity (never a fixed hue) so they lighten
  whatever surface sits behind them and stay correct in every style variation:
  `band-decoration.svg` (the CTA band's exact Figma geometry) and `dot-grid.svg` (a 30px tile —
  2px dots at 8% white — for repeating surfaces like the footer, applied via the Group block's
  `style.background.backgroundImage` with `backgroundSize: "30px"`, `backgroundRepeat: "repeat"`).
- **Icon SVGs** (`icon-*.svg`) are referenced from patterns as images; icons that must follow
  the text colour are instead block-style pseudo-elements (§8.2).
- **No remote requests anywhere** — wp.org forbids them.

---

## 15. Development workflow

### Local setup

Served by Laravel Herd at `http://fse-theme-dev.test` (site root two levels above the theme). Put
this in `wp-config.php` or lose hours to caching:

```php
define( 'WP_DEVELOPMENT_MODE', 'theme' );
```

Without it: patterns are cached in a site transient keyed by theme version (`wp transient delete
--all` does **not** clear it — use `wp eval 'wp_get_theme()->delete_pattern_cache();'`), templates
and parts need `wp cache flush`, and compiled global styles need a hard refresh.

### Commands

| Command | Does |
|---|---|
| `npm run check` | **The commit gate**: `lint:json` + `contrast` + `lint:php`. |
| `npm run lint:json` | Validates `theme.json` + all `styles/` partials against known-key rules — a mistyped key parses fine and silently does nothing (it has caught `fontStyles`, `lineHeight` on a font-size preset, `padding-top`-style keys). Run after every theme.json edit. |
| `npm run contrast` | Recomputes palette contrast pairings (§4.1). |
| `npm run lint:php` / `fix:php` | phpcs (WordPress-CS) via composer. |
| `npm run pot` | Regenerates `languages/blockspire.pot`. Run after any string change. |
| `npm run fonts` / `images` | Asset conversion (dev-only). |
| `npm run zip` | Builds the clean wp.org zip into `build/` with leak checks (§16). |

### Demo content (dev-only)

`node tools/seed-images.mjs` renders abstract placeholder photos from the theme palette; import
with `wp media import`, then `wp eval-file tools/seed-posts.php` creates five categorised posts
(slug-matched, safe to re-run — only the attachment IDs at its top vary per install). The header
menu is seeded by updating the newest `wp_navigation` post. Generate images rather than reusing
WooCommerce's sample photos — product shots read badly as blog featured images.

### Debugging checklist for "my change isn't showing"

1. DB override? `wp post list --post_type=wp_template` / `wp_template_part` — empty means theme
   files are live. Remember a Site Editor save flattens pattern references.
2. Pattern cache / global-styles cache (see above).
3. Block invalid? Run the whole-theme validation sweep (§5) — the front end can look fine while
   the editor rejects the markup.

---

## 16. Building and submitting to WordPress.org

`npm run zip` stages the theme with rsync, excluding all dev files (see the list in §3), zips it as
`build/blockspire-<version>.zip`, and prints sanity checks — required files present
(`style.css`, `theme.json`, `readme.txt`, `screenshot.png`) and forbidden files absent.

Pre-submission checklist:

- [ ] `npm run check` green; `npm run pot` fresh.
- [ ] Whole-theme block validation sweep clean (§5).
- [ ] **Replace `assets/images/logo-light.webp`** — the current file is a third-party brand mark
      (Pluginize Lab) and must not ship. Same review for every demo image; each needs a
      source + licence line in `readme.txt`.
- [ ] More theme style variations (only `midnight` exists; the `style-variations` tag expects a
      real set).
- [ ] `screenshot.png` at 1200×900 showing the actual theme.
- [ ] Run the **Theme Check** plugin and clear every flag; test with `WP_DEBUG` on.
- [ ] Verify with WooCommerce and MC4WP both active and both inactive (guards, fallbacks,
      Woo-scoped CSS inert).
- [ ] Keyboard-walk the whole front page and the drawer; verify AA contrast in every style
      variation (`accessibility-ready` is reviewed by hand).
- [ ] Fresh-install test: unzip the built zip into a clean WP, activate, confirm templates,
      patterns and menus resolve with no dev tooling present.
- [ ] `readme.txt`: changelog entry, copyright section complete, recommended newsletter form
      markup present.

Review resources: the Theme Handbook required checklist
(https://make.wordpress.org/themes/handbook/review/required/) and the accessibility-ready
requirements (https://make.wordpress.org/themes/handbook/review/accessibility/).

---

*This document is dev-only (`docs/` is excluded from the shipped zip). The deeper "why" behind many
of these decisions — including every editor-validation and CSS-specificity trap hit during
development — is recorded in `CLAUDE.md` at the theme root.*
