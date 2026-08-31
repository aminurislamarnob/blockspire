<?php
/**
 * Title: Blog heading
 * Slug: blockspire/blog-heading
 * Categories: blockspire-blog
 * Inserter: no
 * Description: The eyebrow and title that introduce the posts listing.
 * Keywords: blog, journal, heading, posts
 *
 * @package Blockspire
 * @since 1.0.0
 */

?>
<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|16"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"style":{"typography":{"fontWeight":"700","lineHeight":"var:custom|line-height|title-medium"}},"textColor":"gray-02","fontSize":"medium-title"} -->
<p class="has-gray-02-color has-text-color has-medium-title-font-size" style="font-weight:700;line-height:var(--wp--custom--line-height--title-medium)"><?php echo esc_html__( 'Blog', 'blockspire' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":1,"style":{"typography":{"lineHeight":"var:custom|line-height|heading-03"}},"fontSize":"heading-03"} -->
<h1 class="wp-block-heading has-heading-03-font-size" style="line-height:var(--wp--custom--line-height--heading-03)"><?php echo esc_html__( 'Latest writing', 'blockspire' ); ?></h1>
<!-- /wp:heading --></div>
<!-- /wp:group -->
