<?php
/**
 * Title: Sidebar
 * Slug: blockspire/sidebar
 * Categories: blockspire-blog
 * Block Types: core/template-part/sidebar
 * Description: A search field above recent posts and a category list, for the sidebar templates.
 * Keywords: sidebar, aside, widgets, search, recent posts, categories
 *
 * @package Blockspire
 * @since 1.0.0
 */

?>
<!-- wp:group {"tagName":"aside","style":{"spacing":{"blockGap":"var:preset|spacing|48"}},"layout":{"type":"default"}} -->
<aside class="wp-block-group"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|16"}},"layout":{"type":"default"}} -->
<div class="wp-block-group"><!-- wp:heading {"level":2,"style":{"typography":{"lineHeight":"var:custom|line-height|title-large"}},"fontSize":"large-title"} -->
<h2 class="wp-block-heading has-large-title-font-size" style="line-height:var(--wp--custom--line-height--title-large)"><?php echo esc_html__( 'Search', 'blockspire' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:pattern {"slug":"blockspire/search-form"} /--></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|16"}},"layout":{"type":"default"}} -->
<div class="wp-block-group"><!-- wp:heading {"level":2,"style":{"typography":{"lineHeight":"var:custom|line-height|title-large"}},"fontSize":"large-title"} -->
<h2 class="wp-block-heading has-large-title-font-size" style="line-height:var(--wp--custom--line-height--title-large)"><?php echo esc_html__( 'Recent posts', 'blockspire' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:latest-posts {"postsToShow":5,"displayPostDate":true,"fontSize":"medium-paragraph"} /--></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|16"}},"layout":{"type":"default"}} -->
<div class="wp-block-group"><!-- wp:heading {"level":2,"style":{"typography":{"lineHeight":"var:custom|line-height|title-large"}},"fontSize":"large-title"} -->
<h2 class="wp-block-heading has-large-title-font-size" style="line-height:var(--wp--custom--line-height--title-large)"><?php echo esc_html__( 'Categories', 'blockspire' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:categories {"showPostCounts":true,"fontSize":"medium-paragraph"} /--></div>
<!-- /wp:group --></aside>
<!-- /wp:group -->
