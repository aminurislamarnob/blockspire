<?php
/**
 * Title: Centred hero with two buttons
 * Slug: blockspire/hero-centered
 * Categories: blockspire-hero, featured
 * Description: A short centred hero: an eyebrow, a large display heading, one paragraph and a pair of buttons, over the grid backdrop.
 * Keywords: hero, header, intro, banner, landing
 * Viewport Width: 1600
 *
 * @package Blockspire
 * @since 1.0.0
 */

?>
<!-- wp:group {"align":"full","className":"is-style-hero-grid","style":{"spacing":{"padding":{"top":"var:preset|spacing|100","bottom":"var:preset|spacing|100","left":"var:preset|spacing|fluid-inset","right":"var:preset|spacing|fluid-inset"}},"blockGap":"var:preset|spacing|30"},"layout":{"type":"constrained","contentSize":"800px"}} -->
<div class="wp-block-group alignfull is-style-hero-grid" style="padding-top:var(--wp--preset--spacing--100);padding-right:var(--wp--preset--spacing--fluid-inset);padding-bottom:var(--wp--preset--spacing--100);padding-left:var(--wp--preset--spacing--fluid-inset)"><!-- wp:paragraph {"align":"center","style":{"typography":{"fontWeight":"700","lineHeight":"var:custom|line-height|title-medium"}},"textColor":"gray-02","fontSize":"medium-title"} -->
<p class="has-text-align-center has-gray-02-color has-text-color has-medium-title-font-size" style="font-weight:700;line-height:var(--wp--custom--line-height--title-medium)"><?php echo esc_html__( 'Software studio', 'blockspire' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"textAlign":"center","level":1,"style":{"typography":{"lineHeight":"var:custom|line-height|display","letterSpacing":"var:custom|letter-spacing|tight"}},"fontSize":"display"} -->
<h1 class="wp-block-heading has-text-align-center has-display-font-size" style="letter-spacing:var(--wp--custom--letter-spacing--tight);line-height:var(--wp--custom--line-height--display)"><?php echo esc_html__( 'Built properly, delivered on time', 'blockspire' ); ?></h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","style":{"typography":{"lineHeight":"var:custom|line-height|paragraph-large"}},"textColor":"text-color","fontSize":"large-paragraph"} -->
<p class="has-text-align-center has-text-color-color has-text-color has-large-paragraph-font-size" style="line-height:var(--wp--custom--line-height--paragraph-large)"><?php echo esc_html__( 'We design and build websites and web applications for businesses that need the result to work, not just to look good in a screenshot.', 'blockspire' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:buttons {"style":{"spacing":{"blockGap":"var:preset|spacing|16"}},"layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons"><!-- wp:button {"className":"is-style-arrow"} -->
<div class="wp-block-button is-style-arrow"><a class="wp-block-button__link wp-element-button" href="#"><?php echo esc_html__( 'Start a project', 'blockspire' ); ?></a></div>
<!-- /wp:button -->

<!-- wp:button {"className":"is-style-outline-arrow"} -->
<div class="wp-block-button is-style-outline-arrow"><a class="wp-block-button__link wp-element-button" href="#"><?php echo esc_html__( 'See our work', 'blockspire' ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group -->
