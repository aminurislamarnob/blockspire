# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## What this is

Blockspire — a WordPress **block theme** (full site editing) for company websites. It lives inside a local WordPress install served by Laravel Herd at `/Users/aiarnob/Herd/fse-theme-dev` (site root is the parent of `wp-content`).

There is **no build step**: no `package.json`, no `composer.json`, no bundler, no test suite. Files are edited and served directly. "Running" the theme means loading the site in the browser and activating the theme; there is nothing to compile.

## Architecture

Everything about the theme's design system lives in `theme.json`. It is the single source of truth — `functions.php` and templates consume it, never duplicate it.

- **`theme.json`** (schema v3) defines the entire token set: color palette, font sizes, spacing sizes, the self-hosted Poppins font family (four weights loaded from `assets/fonts/*.ttf` via `fontFace`), and `styles` for elements/blocks. Core default palette, gradients, duotone, and default spacing sizes are all **disabled** — only the theme's own presets are offered in the editor.
- **`functions.php`** registers custom block styles on `init` via `register_block_style()` with inline CSS. There is no stylesheet enqueue and no `after_setup_theme` hook — block styles are the only PHP-side customization mechanism used so far. Existing styles: `core/button` → `rounded`, `core/navigation-link` → `hover-primary`.
- **`style.css`** is the theme header only (metadata). Do not put rules there unless you also add an enqueue.
- **`templates/index.html`** exists but is currently empty. Header/footer work so far was done through `theme.json` styles rather than exported template parts — there is no `parts/` or `patterns/` directory yet. If you add template parts or patterns, create those directories at the theme root.

### Token naming conventions

Presets are referenced in CSS as `var(--wp--preset--<type>--<slug>)`. Established slugs:

- Colors: `primary`, `secondary`, `main-bg`, `light-bg`, `dark-bg`, `heading-color`, `text-white`, `text-color`, `link-color`
- Font sizes: `small|medium|large-paragraph`, `small|medium|large-title`, `heading-01`…`heading-06`, `button-large`, `button-small`
- Spacing: numeric slugs matching the px value (`10`, `20`, `30`, `50`, `60`, `70`, `100`)
- Font family: `poppins`

When writing inline CSS in `register_block_style()`, always use these variables rather than literal hex values or px sizes — that is the pattern the existing block styles follow.

### Conventions

- Text domain is `blockspire` (`Domain Path: /assets/lang`); wrap user-facing strings in translation functions with that domain.
- Theme requires WP 6.2+ / PHP 7.4+; keep API usage within that floor.
- `useRootPaddingAwareAlignments` and `appearanceTools` are on — prefer layout/alignment via theme.json settings over hand-written CSS.

### Editing theme.json

Changes to `theme.json` may not appear immediately: WordPress caches the compiled global styles. If a change doesn't show up, check that the site is not in production mode and hard-refresh / flush caches. Site Editor customizations saved by a user are stored in the database (`wp_global_styles`) and **override** `theme.json` — a "my change isn't applying" report is usually this, not a syntax error.
