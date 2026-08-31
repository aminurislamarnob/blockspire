<?php
/**
 * Title: Inner page header
 * Slug: blockspire/page-header
 * Categories: blockspire-pages
 * Description: A rounded dark banner carrying a page title and one line of context, for the top of an inner page.
 * Keywords: page header, title, banner, hero, inner page
 * Viewport Width: 1600
 *
 * @package Blockspire
 * @since 1.0.0
 */

?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40"}}},"layout":{"type":"constrained","contentSize":"1170px"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40)"><!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|100","bottom":"var:preset|spacing|100","left":"var:preset|spacing|fluid-inset","right":"var:preset|spacing|fluid-inset"},"blockGap":"var:preset|spacing|16"},"border":{"radius":"12px"},"background":{"backgroundImage":{"url":"<?php echo esc_url( get_theme_file_uri( 'assets/images/dot-grid.svg' ) ); ?>"},"backgroundSize":"18px","backgroundRepeat":"repeat","backgroundPosition":"0 0"},"elements":{"link":{"color":{"text":"var:preset|color|text-white"}}}},"backgroundColor":"secondary","textColor":"text-white","layout":{"type":"constrained","contentSize":"800px"}} -->
<div class="wp-block-group has-text-white-color has-secondary-background-color has-text-color has-background has-link-color" style="border-radius:12px;padding-top:var(--wp--preset--spacing--100);padding-right:var(--wp--preset--spacing--fluid-inset);padding-bottom:var(--wp--preset--spacing--100);padding-left:var(--wp--preset--spacing--fluid-inset)"><!-- wp:heading {"textAlign":"center","level":1,"style":{"typography":{"lineHeight":"var:custom|line-height|heading-03"}},"textColor":"text-white","fontSize":"heading-03"} -->
<h1 class="wp-block-heading has-text-align-center has-text-white-color has-text-color has-heading-03-font-size" style="line-height:var(--wp--custom--line-height--heading-03)"><?php echo esc_html__( 'About us', 'blockspire' ); ?></h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","style":{"typography":{"lineHeight":"var:custom|line-height|paragraph-large"}},"textColor":"gray-03","fontSize":"large-paragraph"} -->
<p class="has-text-align-center has-gray-03-color has-text-color has-large-paragraph-font-size" style="line-height:var(--wp--custom--line-height--paragraph-large)"><?php echo esc_html__( 'A small studio that has been building for the web since before it was fashionable.', 'blockspire' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->
