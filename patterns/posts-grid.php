<?php
/**
 * Title: Latest posts in three columns
 * Slug: blockspire/posts-grid
 * Categories: blockspire-blog
 * Description: A section heading beside a link to the blog, above three of the most recent posts with featured images.
 * Keywords: posts, blog, articles, news, latest, grid
 * Viewport Width: 1600
 *
 * @package Blockspire
 * @since 1.0.0
 */

?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|80","bottom":"var:preset|spacing|100"},"blockGap":"var:preset|spacing|48"}},"layout":{"type":"constrained","contentSize":"1170px"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--80);padding-bottom:var(--wp--preset--spacing--100)"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between","verticalAlignment":"bottom"}} -->
<div class="wp-block-group"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|12"}},"layout":{"type":"default"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"style":{"typography":{"fontWeight":"700","lineHeight":"var:custom|line-height|title-medium"}},"textColor":"gray-02","fontSize":"medium-title"} -->
<p class="has-gray-02-color has-text-color has-medium-title-font-size" style="font-weight:700;line-height:var(--wp--custom--line-height--title-medium)"><?php echo esc_html__( 'Blog', 'blockspire' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"style":{"typography":{"lineHeight":"var:custom|line-height|heading-04"}},"fontSize":"heading-04"} -->
<h2 class="wp-block-heading has-heading-04-font-size" style="line-height:var(--wp--custom--line-height--heading-04)"><?php echo esc_html__( 'Latest articles', 'blockspire' ); ?></h2>
<!-- /wp:heading --></div>
<!-- /wp:group -->

<!-- wp:paragraph {"className":"is-style-arrow-link","style":{"typography":{"lineHeight":"1.5"},"elements":{"link":{"color":{"text":"var:preset|color|heading-color"}}}},"fontSize":"medium-paragraph"} -->
<p class="is-style-arrow-link has-link-color has-medium-paragraph-font-size" style="line-height:1.5"><a href="#"><?php echo esc_html__( 'View all posts', 'blockspire' ); ?></a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:query {"queryId":0,"query":{"perPage":3,"pages":1,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false},"layout":{"type":"default"}} -->
<div class="wp-block-query"><!-- wp:post-template {"style":{"spacing":{"blockGap":"var:preset|spacing|30"}},"layout":{"type":"grid","columnCount":3}} -->
<!-- wp:post-featured-image {"isLink":true,"aspectRatio":"3/2","style":{"border":{"radius":"8px"}}} /-->

<!-- wp:post-title {"isLink":true,"style":{"typography":{"fontWeight":"700","lineHeight":"var:custom|line-height|title-large"},"spacing":{"margin":{"top":"var:preset|spacing|20","bottom":"var:preset|spacing|10"}}},"fontSize":"large-title"} /-->

<!-- wp:pattern {"slug":"blockspire/post-meta"} /-->

<!-- wp:post-excerpt {"excerptLength":18,"style":{"spacing":{"margin":{"top":"var:preset|spacing|16"}}},"fontSize":"small-paragraph"} /-->
<!-- /wp:post-template -->

<!-- wp:query-no-results -->
<!-- wp:pattern {"slug":"blockspire/no-results"} /-->
<!-- /wp:query-no-results --></div>
<!-- /wp:query --></div>
<!-- /wp:group -->
