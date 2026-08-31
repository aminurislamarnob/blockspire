<?php
/**
 * Title: 404 content
 * Slug: blockspire/404
 * Categories: blockspire-pages
 * Inserter: no
 * Description: The heading, explanation and search shown when a page cannot be found.
 * Keywords: 404, not found, error
 *
 * @package Blockspire
 * @since 1.0.0
 */

?>
<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|24","padding":{"top":"var:preset|spacing|100","bottom":"var:preset|spacing|100"}}},"layout":{"type":"constrained","contentSize":"670px"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--100);padding-bottom:var(--wp--preset--spacing--100)"><!-- wp:paragraph {"style":{"typography":{"fontWeight":"700","lineHeight":"var:custom|line-height|title-medium"}},"textColor":"gray-02","fontSize":"medium-title"} -->
<p class="has-gray-02-color has-text-color has-medium-title-font-size" style="font-weight:700;line-height:var(--wp--custom--line-height--title-medium)"><?php echo esc_html__( 'Error 404', 'blockspire' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":1,"style":{"typography":{"lineHeight":"var:custom|line-height|heading-03"}},"fontSize":"heading-03"} -->
<h1 class="wp-block-heading has-heading-03-font-size" style="line-height:var(--wp--custom--line-height--heading-03)"><?php echo esc_html__( 'That page has moved on.', 'blockspire' ); ?></h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"textColor":"text-color","fontSize":"large-paragraph"} -->
<p class="has-text-color-color has-text-color has-large-paragraph-font-size"><?php echo esc_html__( 'The link may be out of date, or the page may have been renamed. Try a search, or head back to the homepage.', 'blockspire' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:search {"label":"<?php echo esc_attr__( 'Search', 'blockspire' ); ?>","showLabel":false,"placeholder":"<?php echo esc_attr__( 'Search this site', 'blockspire' ); ?>","buttonText":"<?php echo esc_attr__( 'Search', 'blockspire' ); ?>","style":{"spacing":{"margin":{"top":"var:preset|spacing|16"}}}} /-->

<!-- wp:buttons {"style":{"spacing":{"margin":{"top":"var:preset|spacing|16"}}}} -->
<div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--16)"><!-- wp:button {"className":"is-style-arrow"} -->
<div class="wp-block-button is-style-arrow"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo esc_html__( 'Back to home', 'blockspire' ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group -->
