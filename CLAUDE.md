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
| `secondary`, `dark-bg`, `heading-color`, `link-color` | `#12141D` | Text Color / Black |
| `main-bg`, `text-white` | `#FFFFFF` | Text Color / White |
| `light-bg` | `#F4F4F4` | (not in Figma spec) |

> The Figma swatches' **typed hex labels disagree with their actual fills** — the blue swatch is labelled `#007CF5` but renders `#2D5BDB`. Always sample the pixel or read the bound variable; never trust the printed label.

**Contrast (run `node tools/contrast.mjs`):** `primary` passes AA on white at 5.78:1. `accent` is **2.15:1 on white and fails even for large text** — only use it on dark surfaces (8.52:1 on `#12141D`) or as a non-text decorative fill. `gray-02` is large-text/border only (3.32:1); `gray-03` is borders and dividers only (1.71:1).

**Font sizes:** `small|medium|large-paragraph`, `small|medium|large-title`, `heading-01`…`heading-06`, `button-large`, `button-small`. **Font family:** `poppins`. **Spacing:** numeric slugs matching the px value (`10`, `20`, `30`, `50`, `60`, `70`, `100`).

**Line heights** live in `settings.custom.lineHeight` as `var(--wp--custom--line-height--<slug>)` — `heading-01`…`heading-06`, `title-large|medium|small`, `paragraph-large|medium|small`, `button-large|small`. A `fontSizes` preset **only ever emits `font-size`**; putting `lineHeight` or `fontWeight` in one does nothing (core's `PRESETS_METADATA` declares `'properties' => array( 'font-size' )`). That is why line heights are custom tokens rather than preset properties.

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

## Editing theme.json

Changes may not appear immediately: WordPress caches compiled global styles. If a change doesn't show up, hard-refresh and flush caches. Site Editor customizations saved by a user are stored in the database (`wp_global_styles`) and **override** `theme.json` — a "my change isn't applying" report is usually this, not a syntax error.
