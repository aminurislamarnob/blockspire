=== Blockspire ===

Contributors: aminurislam01
Requires at least: 6.7
Tested up to: 7.1
Requires PHP: 7.4
Stable tag: 1.0.0
License: GNU General Public License v2.0 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Tags: blog, e-commerce, portfolio, accessibility-ready, block-patterns, block-styles, style-variations, full-site-editing, template-editing, translation-ready, rtl-language-support, custom-colors, custom-logo, custom-menu, editor-style, featured-images, full-width-template, sticky-post, threaded-comments, wide-blocks, grid-layout, one-column, two-columns, left-sidebar, right-sidebar

A fast, accessible, multipurpose block theme for businesses, agencies, blogs, portfolios and online stores.

== Description ==

Blockspire is built entirely for full site editing. It ships a complete template hierarchy, a large pattern library, several style variations and themed WooCommerce templates, so you can assemble a polished site in the Site Editor without writing code.

Fonts are self-hosted and the theme makes no external requests, so nothing about your visitors leaves your server. There is no page builder dependency and no settings page to learn: everything is edited where WordPress already puts it, in the Site Editor.

== Installation ==

1. In your WordPress dashboard, go to Appearance > Themes and click Add New.
2. Click Upload Theme, choose the theme zip, and click Install Now.
3. Click Activate.
4. Go to Appearance > Editor to edit templates, or Appearance > Editor > Styles to pick a style variation.

== Frequently Asked Questions ==

= Does Blockspire require any plugins? =

No. WooCommerce is supported if you want to sell, but nothing is required.

= What does Blockspire change when WooCommerce is active? =

It replaces every WooCommerce template with a themed one: the shop and product
category, tag, brand and attribute archives, single products, product search
results, cart, checkout and the order confirmation. Product categories, tags and
brands reuse the shop archive, so editing "Product Catalog" in the Site Editor
covers all of them.

Checkout and the order confirmation use the minimal header and footer so there is
nothing to click away from at the point of purchase. A cart icon appears in the
main header only while WooCommerce is active.

= How do I add the newsletter sign-up form? =

Install and connect the free Mailchimp for WordPress plugin (or Brevo). The call to action band and the footer pick the form up automatically and style it to match the theme. For the cleanest result, set the form markup in the plugin to:

`<p><label for="newsletter-email" class="screen-reader-text">Email address</label><input type="email" id="newsletter-email" name="EMAIL" placeholder="Enter your email" required /><input type="submit" value="Subscribe" /></p>`

You can also drop any sign-up form into a Group block and pick the "Newsletter underline" or "Newsletter boxed" style.

= How do I change the colours and fonts? =

Go to Appearance > Editor > Styles. Pick a style variation, or open the styles panel to adjust colours and typography yourself.

== Copyright ==

Blockspire WordPress theme, Copyright 2026 Aminur Islam Arnob
Blockspire is distributed under the terms of the GNU GPL v2 or later.

This theme bundles the following third-party resources:

Poppins font
Copyright 2014-2020 Indian Type Foundry, Jonny Pinhorn
License: SIL Open Font License, 1.1
License URI: https://scripts.sil.org/OFL
Source: https://fonts.google.com/specimen/Poppins

Service icons, decorative graphics and the arrow icons embedded as data URIs in
styles/blocks/button-arrow.json, button-outline-arrow.json, button-chip.json,
group-newsletter-underline.json and group-newsletter-boxed.json
(assets/images/icon-*.svg, band-decoration.svg, dot-grid.svg)
Copyright 2026 Aminur Islam Arnob
License: GNU General Public License v2.0 or later
Original work created for this theme.

Arrow icon "arrow-right" from Feather Icons, embedded as a data URI in styles/blocks/paragraph-arrow-link.json
Copyright 2013-2023 Cole Bemis
License: MIT License
License URI: https://github.com/feathericons/feather/blob/main/LICENSE
Source: https://feathericons.com/

Bundled image (assets/images/hero-workspace.webp)
Photograph by Design by Matt
License: CC0 1.0 Universal (Public Domain Dedication)
License URI: https://creativecommons.org/publicdomain/zero/1.0/
Source: https://stocksnap.io/photo/home-office-QUU0AQABSN
Found via Openverse. Resized and converted to WebP for this theme.

Bundled image (assets/images/logo-light.webp)
Pluginize Lab logo, light variant, used in the footer.
This is a placeholder for demonstration and MUST be removed or replaced before
distribution: it is a third-party brand mark, not GPL-licensed theme artwork.
Replacing it with a neutral placeholder also restores the footer logo slot to
the Site Editor, since the footer currently references this file directly
instead of the user's own Site Identity logo.

== Changelog ==

= 1.0.0 =
* Initial release.
