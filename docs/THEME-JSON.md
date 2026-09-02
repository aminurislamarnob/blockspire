# `theme.json`, block by block

This walkthrough follows the file **top to bottom in its exact order** and explains what every
block of it does, why it is set the way it is, and what CSS WordPress generates from it. Read it
with `theme.json` open beside you. The companion overview is `docs/DEVELOPER.md`; the deeper
war-story notes are in `CLAUDE.md`.

## How to read the file at all

`theme.json` has two personalities, and every key belongs to one of them:

- **`settings`** — what the *editor UI* offers: which controls appear, and which presets
  (colors, sizes, spacing) fill their pickers. Settings mostly don't style anything by
  themselves; they define the vocabulary.
- **`styles`** — what the *front end and editor canvas* look like by default: the actual CSS
  WordPress writes for the body, elements and blocks, expressed with the vocabulary from
  `settings`.

Plus two registration lists at the bottom (`templateParts`, `customTemplates`) that have nothing
to do with styling.

WordPress compiles the whole thing into one inline stylesheet (`global-styles-inline-css`).
The translation rules you'll see referenced throughout:

| You write | WordPress emits |
|---|---|
| a palette entry with slug `primary` | `--wp--preset--color--primary` + `.has-primary-color`, `.has-primary-background-color` classes |
| a font size with slug `large-title` | `--wp--preset--font-size--large-title` + `.has-large-title-font-size` |
| a spacing size with slug `48` | `--wp--preset--spacing--48` |
| anything under `settings.custom` | `--wp--custom--…` (camelCase keys become kebab-case: `lineHeight` → `line-height`) |
| anything under `styles` (except `styles.css`) | rules wrapped in `:root :where(…)` — always specificity **(0,1,0)**, so users and plugins can override easily |
| `styles.css` | **verbatim**, untouched — the theme's one escape hatch |

---

## Top of the file

```json
"$schema": "https://schemas.wp.org/trunk/theme.json",
"version": 3
```

- **`$schema`** exists purely for the editor you type in: IDEs use it for autocomplete and
  red-squiggle validation. `trunk` tracks the newest schema; it never affects the site.
  (Belt and braces: `npm run lint:json` validates against the keys that actually *work* at our
  WP 6.7 floor, because a key the schema accepts can still be silently ignored by older core.)
- **`version: 3`** selects the theme.json format generation (v3 landed in WP 6.6; the theme
  requires 6.7+). The headline v3 change: `defaultFontSizes` / `defaultSpacingSizes` exist and
  the theme's own presets no longer need `theme-` prefixed slugs.

---

## `settings`

### `appearanceTools: true`

One umbrella switch that opts into a bundle of opinionated editor controls — border, link color,
min-height, sticky position, block gap, margin/padding, line-height, background images — without
listing them individually. Several of those are *also* listed explicitly further down
(`border`, `position`, `dimensions`, parts of `spacing`): the duplication is deliberate
self-documentation, and it pins each control on even if the umbrella's contents shift in a
future WP release.

### `useRootPaddingAwareAlignments: true`

Changes *where* the root padding (defined later in `styles.spacing.padding`) is applied. Instead
of padding the `body` — which would stop `alignfull` sections from ever reaching the viewport
edge — the inline padding becomes gutter variables applied to constrained containers
(`.has-global-padding`), and `alignfull` children pull back out with negative margins. Result:
full-bleed bands truly touch the screen edge, while ordinary content keeps its 20px gutter on
phones. This switch and the root padding values are a matched pair; don't change one without the
other.

### `layout`

```json
"contentSize": "800px",
"wideSize": "1170px"
```

The two column widths every *constrained* layout resolves against: plain blocks centre at 800px
(comfortable reading measure for running text), `alignwide` reaches 1170px (the Figma design's
content column), `alignfull` spans everything. Emitted as `--wp--style--global--content-size` /
`--wp--style--global--wide-size`.

**The trap to remember:** a *nested* constrained group with no `contentSize` of its own resolves
against this root 800px — not its parent's width. A wrapper that only exists to set a `blockGap`
must be `layout: {"type":"default"}` or its children mysteriously centre at 800px inside a
1170px section.

### `border`, `position`, `dimensions`

```json
"border":     { "color": true, "radius": true, "style": true, "width": true },
"position":   { "sticky": true },
"dimensions": { "minHeight": true }
```

Pure UI switches — they add the Border panel, the "sticky" position control (Group blocks), and
the Min. height control to blocks that support them. No CSS is emitted by these lines
themselves. `minHeight` matters to the theme: the round icon badges and the footer's top row are
built on it (a badge is *sized* with equal `minWidth`/`minHeight`, never padded into shape).
Note core/group supports only `minHeight` and `minWidth` under dimensions — an `aspectRatio`
there is silently dropped.

### `spacing`

```json
"blockGap": true, "margin": true, "padding": true,
"defaultSpacingSizes": false,
"units": ["px","em","rem","vh","vw","%"]
```

- `blockGap: true` enables the gap control on container blocks (and lets the root
  `styles.spacing.blockGap` later take effect).
- `defaultSpacingSizes: false` hides core's own spacing scale, so the picker shows **only** the
  theme's sizes below. The same "only our vocabulary" move is repeated for colors and font sizes.

**`spacingSizes`** — the theme's scale, with one design decision baked in: **the slug is the
literal pixel value** (`8`…`100`), so `var:preset|spacing|48` is always 48px and pattern markup
is self-explanatory. No guessing what "medium" means. The single exception is
**`fluid-inset`** = `clamp(24px, 8.5vw, 100px)`: use it wherever the Figma design shows 100px
horizontal padding on a band that must shrink on phones (CTA band, contact panel).

Why presets rather than raw values in patterns? Two reasons: the values stay retunable in one
place, and the block-attribute shorthand **only resolves presets** — the style engine turns
`var:preset|spacing|48` into a CSS var at render time but never `var:custom|…`, so anything a
block attribute needs to reference must live here, not under `custom`.

### `color`

```json
"defaultPalette": false, "defaultGradients": false, "defaultDuotone": false
```

Kills core's default palette, gradient set and duotone filters — editors see only the twelve
theme colors. (No theme gradients are defined; the design doesn't use any.)

**`palette`** — twelve entries, but really *nine values with role indirection*:

| Slug | Value | Why it exists |
|---|---|---|
| `primary` | `#2D5BDB` | Brand blue: buttons, hover accents. AA on white (5.78:1). |
| `accent` | `#FF9808` | Orange. **2.15:1 on white — fails even large-text AA.** Dark surfaces (7.85:1 on `secondary`) or non-text decoration only. |
| `secondary` | `#111B3A` | Near-black brand ink. |
| `main-bg` | `#FFFFFF` | The page surface. |
| `light-bg` | `#F4F4F4` | Tinted section surface (cards, quiet bands). |
| `dark-bg` | `#111111` | Footer / dark band surface. |
| `heading-color` | `#111B3A` | *Role slug* — same value as `secondary`. |
| `text-white` | `#FFFFFF` | *Role slug* — same value as `main-bg`. |
| `text-color` | `#626368` | Body copy grey. |
| `gray-02` | `#8D8D8D` | Large text / borders only (3.32:1). |
| `gray-03` | `#C6C6C6` | Borders and dividers only (1.71:1). |
| `link-color` | `#111B3A` | *Role slug* — same value as `secondary`. |

The duplicates are the point: patterns colour a heading with `heading-color` and an icon group
with `link-color`, so a **style variation** (`styles/*.json`) can re-point each *role*
independently — turn links teal without turning every heading teal — even though they share a
hex today. Never "clean up" the duplicates into one slug.

`node tools/contrast.mjs` (inside `npm run check`) recomputes every pairing above; the
per-colour usage rules in the table are what it enforces.

### `typography` — the toggles

```json
"fontStyle": true, "fontWeight": true, "lineHeight": true, "letterSpacing": true,
"textTransform": true, "textDecoration": true, "textAlign": true, "writingMode": true,
"defaultFontSizes": false,
"fluid": true
```

Each `true` adds one control to the editor's Typography panel. `defaultFontSizes: false` hides
core's S/M/L/XL/XXL so only the theme scale shows. **`fluid: true` is load-bearing**: it turns
on core's fluid-typography engine, which converts every font-size preset that declares
`fluid.min`/`fluid.max` into a `clamp()` scaled across a 320px→1600px viewport. Without this
flag those `fluid` objects below would be ignored.

### `typography.fontFamilies`

One family — **Poppins** — with four `fontFace` declarations (400/500/600/700, normal style).
Core prints the `@font-face` rules and serves the files itself; `file:./assets/fonts/…` resolves
relative to the theme directory. This is the wp.org-compliant way to ship a font: WOFF2 only
(smallest format), self-hosted, **zero remote requests**. The family preset emits
`--wp--preset--font-family--poppins`, referenced by everything below.

To add a weight: drop the WOFF2 in `assets/fonts/` (convert with `npm run fonts`) and add one
`fontFace` entry. Nothing else — the browser picks the right file by `font-weight`.

### `typography.fontSizes`

The full type ramp from the Figma component styles. Three groups:

| Group | Slugs | Fluid? |
|---|---|---|
| Headings | `heading-01` (94px) … `heading-06` (30px), `display` (64px) | Yes — each carries `fluid.min`/`max`, so a 94px hero heading compresses to 40px on a phone with no media query anywhere. |
| Titles & paragraphs | `large-title` (24px, mildly fluid), `medium-title` (20), `small-title` (16), `large-paragraph` (18), `medium-paragraph` (16), `small-paragraph` (14) | Mostly fixed — body sizes shouldn't drift with the viewport. |
| Buttons | `button-large` (16), `button-small` (14) | Fixed. |

Two rules that exist because of real bugs:

1. **A font-size preset only ever emits `font-size`.** Core's preset metadata whitelists that
   one property — a `lineHeight` or `fontWeight` added to an entry here does *nothing*, silently.
   That is the entire reason line heights live under `custom` below.
2. **In block markup, a preset size goes in the `fontSize` attribute**
   (`"fontSize":"large-title"`), never in `style.typography.fontSize` as a `var:preset|…`
   string. The second form renders on the front end but the editor's serializer drops it, so the
   editor shows the element at the wrong size. `grep -r '"fontSize":"var:preset' patterns/`
   must stay empty.

### `custom`

Everything under `settings.custom` becomes a plain CSS variable
(`--wp--custom--<kebab-case-path>`) with **no** editor UI — it is the theme's private token
store:

- **`lineHeight`** — one leading per type style (`heading-01: 1.064` = Figma's 100px line on the
  94px size, `paragraph-medium: 1.75`, etc.), used as
  `var(--wp--custom--line-height--heading-01)`. They are unitless ratios so they scale
  with the fluid sizes. **The pairing rule:** wherever a block overrides a heading's font size,
  it must set the matching line height too — the `h1`–`h6` element styles below bind size and
  leading together, and changing only the size silently keeps the wrong leading (this once
  produced a 63.36px line where the design wanted 64px).
- **`fontWeight`** (`regular|medium|semibold|bold`) — named weights for pattern markup.
- **`letterSpacing.tight`** (-0.03em) — the display-heading tracking (CTA band, footer heading).

Remember: `var:custom|…` shorthand does **not** resolve in block attributes; patterns write the
full `var(--wp--custom--…)` form in the inline style (pre-resolved by hand in the authored
HTML), or the value belongs in a preset instead.

---

## `styles`

Now the second personality: what actually renders.

### `styles.css` — the verbatim escape hatch

Everything else in `styles` is emitted at specificity (0,1,0) inside `:root :where(…)`. This one
string is printed **untouched**, after the generated rules — the only place the theme can use
`:focus-visible`, `:has()`, media queries, or enough specificity to beat plugin CSS. It holds
seven rule groups, in order:

1. **Focus design** — the blanket `outline:none` on links, buttons, form fields and `summary`,
   then the `:focus-visible` replacement: a 2px underline offset 0.25em. The theme's
   accessibility position: focus is shown through the element's *own* appearance (underline /
   field wash), which adapts to any style variation, where a fixed ring cannot. These rules are
   here and not under `elements` because **theme.json only permits `:focus`, not
   `:focus-visible`** — an `elements.*:focus` style also fires on mouse clicks and sticks.
   Both rules are wrapped in `:where()` to stay low-specificity but printed after the generated
   styles, so they win on source order while remaining easy to override deliberately.
2. **`prefers-reduced-motion` overrides** for the Details-accordion animation and the carousel
   dots. Here because a block-style variation's `css` string **cannot contain a media query**
   (core splits the string on `&` and would mangle the `@media` wrapper).
3. **WooCommerce legacy-markup fixes** — the `span.onsale` badge inside the classic product
   gallery, the cart/checkout/account page-title width, gallery margins and thumbnail strip.
   These need real specificity because Woo's compatibility CSS sits at (0,2,0)–(0,3,2); each
   rule is scoped under a Woo class so it is completely inert when the plugin is inactive.
4. **`.blockspire-scroll-top`** — the back-to-top button printed by `functions.php` on
   `wp_footer`. Its arrow is a `currentColor`-filled data-URI *mask* (not an `img`), so it
   recolours with any style variation.
5. **Mini-cart badge and account icon** — the badge's two `!important`s are the theme's only
   ones, and they are unavoidable: Woo's client script writes the badge colours as *inline
   styles*, and a stylesheet can only beat an inline style with `!important`.
6. **The mobile navigation drawer** — drawer padding (with `env(safe-area-inset-bottom)`),
   equal 48px link rows (`padding-block:14px` on the link, `gap:0` on the containers; the long
   selector deliberately matches core's own (0,4,0) padding reset inside the open overlay), and
   the `html:has(…is-menu-open) .blockspire-header-cta` rules that pin the header's own CTA
   button — the same DOM element — full-width above core's z-index-100000 overlay.
7. **The testimonial carousel** — the scroll-snap strip (`scroll-snap-type:x mandatory`, cards
   `flex:0 0 min(100%,370px)` = three per 1170px view, one on phones, no media query) and the
   JS-built page dots.

Rule of engagement before adding anything here: **measure first** (read the winning rule out of
`document.styleSheets`), prefer a block attribute, then `styles.blocks`, and only then this
string.

### `styles.color` and `styles.spacing`

```json
"color":   { "background": "main-bg", "text": "text-color" }        (as preset vars)
"spacing": { "blockGap": "20px", "padding": { top/bottom 0, inline 20px } }
```

The page surface and default text colour — always via preset vars, never raw hex, so variations
re-skin the whole page by overriding two tokens.

The **root `blockGap: 20px`** separates the top-level blocks of a template — which includes the
header part, `<main>` and footer part. Templates that need sections to touch each other
edge-to-edge (the front page) therefore wrap all sections in one `alignfull` constrained Group
with its own `blockGap: 0` and let each section own its vertical padding.

The **root padding** (0 block, 20px inline) is the mobile gutter that
`useRootPaddingAwareAlignments` (above) distributes to constrained containers instead of the
body — the pair that lets `alignfull` bands reach the screen edge while text keeps its gutter.

### `styles.typography`

Body copy defaults: Poppins, `medium-paragraph` (16px), weight 400, `paragraph-medium` leading
(1.75). Every block that doesn't say otherwise inherits this.

### `styles.elements`

Semantic element defaults, all in preset/custom vars:

- **`link`** — `link-color` at rest; `primary` on `:hover`, `:focus` and `:active`. (`:focus`
  here fires on mouse clicks too — acceptable for a colour that matches hover. The *visible
  focus indicator* is the `:focus-visible` underline in `styles.css`.)
- **`button`** — the theme's one true button recipe: `primary` background, white text, dark-bg
  hover, 8px radius, 16/32px padding, `button-large` size at **weight 500**. The 500 is a
  deliberate deviation from the Figma spec (which binds 600/700) by explicit direction — don't
  "correct" it. And deliberately **no `:focus` styling here**: it would stick after clicks and
  fight the `styles.css` focus design.
- **`caption`** — small grey figure captions.
- **`heading`** — what all six levels share: `heading-color`, Poppins, weight 700.
- **`h1`…`h6`** — each binds exactly two things: its size preset and its matching line-height
  token (`heading-01`+`1.064` … `heading-06`+`1.2`). This is the origin of the pairing rule:
  the pairs live *here*, so a block that overrides one half must override the other.

### `styles.blocks`

Per-block defaults. Note the `css` strings inside blocks: each is split on `&` and every
fragment is prefixed with the block's selector — hence the two authoring laws: **one `&` per
rule** (fold alternatives into `:is()`) and **no media queries**. All of it lands at (0,1,0), so
these rules can only override *core defaults* — anything that must out-gun WooCommerce's own CSS
lives in `styles.css` instead. Conveniently, a rule for an unregistered block emits no selector
at all, so every `woocommerce/*` entry here vanishes when the plugin is off.

- **`core/navigation`** — 32px item gap, `button-large` at weight 600 (navigation shares the
  button *size*, not the button element, so it keeps the Figma 600), `link-color`, and one
  `css` rule underlining the current menu item.
- **`woocommerce/product-sale-badge`** — restyles the *block* sale badge (product grids) into
  the design's dark pill: this only needs to beat core block defaults, so (0,1,0) suffices.
  (Its twin in `styles.css` handles the *legacy* `span.onsale` markup inside the single-product
  gallery, where Woo's own selector is (0,2,1).)
- **`woocommerce/product-price`** — struck-through original price in `gray-02` at 400.
- **`woocommerce/breadcrumbs`** — no underlines in the trail.
- **`woocommerce/product-template`** — 30px card gap inside product grids.
- **`woocommerce/product-details`** — hand-styles Woo's *legacy* tab markup (`.wc-tabs`), which
  the block still renders server-side: flat tab row, uppercase labels, 2px primary underline on
  the active tab. (The tab panels' oversized `h2` title is *not* fixed here — the template sets
  the block's `hideTabTitle` attribute, the "prefer an attribute over CSS" rule in action.)
- **`woocommerce/product-filters`** — fieldset resets and checkbox-list typography for the shop
  sidebar.
- **`woocommerce/add-to-cart-form`** — the single-product purchase row, also legacy markup:
  flex layout, the rounded 56px quantity input and pill button (secondary → primary on hover),
  variable-product table spacing.

RTL note: every rule in these strings (and in `styles.css`) uses logical properties —
`inset-inline`, `padding-block`, `border-block-end` — never `left`/`right`, so the whole file is
RTL-correct without a second stylesheet.

---

## `templateParts`

Registers the five parts in `parts/` with their editor identity:

| name | title | area |
|---|---|---|
| `header` | Header | `header` |
| `header-minimal` | Header (minimal) | `header` |
| `footer` | Footer | `footer` |
| `footer-minimal` | Footer (minimal) | `footer` |
| `sidebar` | Sidebar | `uncategorized` |

The `area` drives the Site Editor's grouping, icons, and — for header/footer — the
swap-with-another-part flow. `sidebar` uses the general area because core defines no sidebar
area; the matching pattern targets it via `Block Types: core/template-part/sidebar` instead.
A part not listed here still *works*, but shows as an untitled, uncategorised orphan — every
part must have an entry.

## `customTemplates`

Registers the five opt-in templates so they appear in the editor's Template picker, each scoped
to the post types that may use it:

| name | title | for |
|---|---|---|
| `page-no-title` | Page without title | page |
| `page-with-sidebar` | Page with sidebar | page |
| `single-with-sidebar` | Post with sidebar | post |
| `focused` | Focused (minimal chrome) | page + post |
| `blank` | Blank canvas | page + post |

The other fifteen files in `templates/` are *hierarchy* templates (`index`, `single`,
`archive-product`, …) — WordPress finds those by filename and they must **not** be listed here.

## What is deliberately *not* in the file

- **Patterns** — auto-registered from `patterns/*.php` headers; theme.json has no `patterns`
  key (that key exists only for opting into wp.org *directory* patterns, which this theme
  doesn't use — no remote requests).
- **Block style variations** — each is its own JSON partial in `styles/blocks/` (a partial
  *with* `blockTypes`); theme style variations are partials in `styles/` *without* it. Core
  scans the directory; nothing to declare here.
- **Focus/`:focus-visible` styling, media queries, `:has()`** — impossible in structured
  theme.json; all live in the `styles.css` string (§ above).
- **Any raw hex or px outside `settings`** — `styles` only ever speaks in
  `var(--wp--preset--…)` / `var(--wp--custom--…)`. That discipline is the entire mechanism by
  which one small style-variation file can re-skin fifty-five patterns.

## Editing checklist

1. Edit → `npm run lint:json` (a mistyped key parses fine and silently does nothing — this
   linter has caught `fontStyles`, `lineHeight` inside a font-size preset, and CSS-style
   `padding-top` keys).
2. Palette change → `npm run contrast`.
3. Hard-refresh the front end (compiled global styles are cached) and remember a saved
   `wp_global_styles` post in the DB overrides this file entirely — check with
   `wp post list --post_type=wp_global_styles` if a change refuses to appear.
