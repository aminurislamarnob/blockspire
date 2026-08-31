<?php
/**
 * Title: Posts in two columns with excerpts
 * Slug: blockspire/posts-two-column
 * Categories: blockspire-blog
 * Description: A roomier two column listing with featured images, categories, titles, excerpts and pagination, for a blog landing page.
 * Keywords: posts, blog, articles, listing, two columns
 * Viewport Width: 1600
 *
 * @package Blockspire
 * @since 1.0.0
 */

?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|100"}}},"layout":{"type":"constrained","contentSize":"1170px"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--100)"><!-- wp:query {"queryId":0,"query":{"perPage":6,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false},"layout":{"type":"default"}} -->
<div class="wp-block-query"><!-- wp:post-template {"style":{"spacing":{"blockGap":"var:preset|spacing|60"}},"layout":{"type":"grid","columnCount":2}} -->
<!-- wp:post-featured-image {"isLink":true,"aspectRatio":"3/2","style":{"border":{"radius":"8px"}}} /-->

<!-- wp:post-terms {"term":"category","style":{"typography":{"fontWeight":"600","textTransform":"uppercase","letterSpacing":"0.05em"},"spacing":{"margin":{"top":"var:preset|spacing|20"}}},"textColor":"gray-02","fontSize":"small-paragraph"} /-->

<!-- wp:post-title {"isLink":true,"style":{"typography":{"fontWeight":"700","lineHeight":"1.2"},"spacing":{"margin":{"top":"var:preset|spacing|10","bottom":"var:preset|spacing|16"}}},"fontSize":"heading-06"} /-->

<!-- wp:post-excerpt {"excerptLength":26,"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|16"}}},"textColor":"text-color","fontSize":"medium-paragraph"} /-->

<!-- wp:pattern {"slug":"blockspire/post-meta"} /-->
<!-- /wp:post-template -->

<!-- wp:query-pagination {"style":{"spacing":{"margin":{"top":"var:preset|spacing|80"}}},"layout":{"type":"flex","justifyContent":"center"}} -->
<!-- wp:query-pagination-previous /-->

<!-- wp:query-pagination-numbers /-->

<!-- wp:query-pagination-next /-->
<!-- /wp:query-pagination -->

<!-- wp:query-no-results -->
<!-- wp:pattern {"slug":"blockspire/no-results"} /-->
<!-- /wp:query-no-results --></div>
<!-- /wp:query --></div>
<!-- /wp:group -->
