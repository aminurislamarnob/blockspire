<?php
/**
 * Title: Large pull quote
 * Slug: blockspire/quote
 * Categories: blockspire-testimonials, blockspire-pages
 * Description: One quotation set large and centred on a tinted band, with an attribution underneath.
 * Keywords: quote, pull quote, testimonial, statement, feature
 * Viewport Width: 1600
 *
 * @package Blockspire
 * @since 1.0.0
 */

?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|100","bottom":"var:preset|spacing|100","left":"var:preset|spacing|fluid-inset","right":"var:preset|spacing|fluid-inset"},"blockGap":"var:preset|spacing|32"}},"backgroundColor":"light-bg","layout":{"type":"constrained","contentSize":"800px"}} -->
<div class="wp-block-group alignfull has-light-bg-background-color has-background" style="padding-top:var(--wp--preset--spacing--100);padding-right:var(--wp--preset--spacing--fluid-inset);padding-bottom:var(--wp--preset--spacing--100);padding-left:var(--wp--preset--spacing--fluid-inset)"><!-- wp:paragraph {"align":"center","style":{"typography":{"fontWeight":"700","lineHeight":"var:custom|line-height|heading-06"}},"textColor":"heading-color","fontSize":"heading-06"} -->
<p class="has-text-align-center has-heading-color-color has-text-color has-heading-06-font-size" style="font-weight:700;line-height:var(--wp--custom--line-height--heading-06)"><?php echo esc_html__( '&#8220;They treated our budget like it was their own money. That is the part I tell other people about.&#8221;', 'blockspire' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|10"}},"layout":{"type":"default"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"align":"center","style":{"typography":{"fontWeight":"700","lineHeight":"var:custom|line-height|paragraph-medium"}},"textColor":"heading-color","fontSize":"medium-paragraph"} -->
<p class="has-text-align-center has-heading-color-color has-text-color has-medium-paragraph-font-size" style="font-weight:700;line-height:var(--wp--custom--line-height--paragraph-medium)"><?php echo esc_html__( 'Priya Raman', 'blockspire' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"align":"center","style":{"typography":{"lineHeight":"var:custom|line-height|paragraph-small"}},"textColor":"text-color","fontSize":"small-paragraph"} -->
<p class="has-text-align-center has-text-color-color has-text-color has-small-paragraph-font-size" style="line-height:var(--wp--custom--line-height--paragraph-small)"><?php echo esc_html__( 'Operations Lead, Northwind', 'blockspire' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->
