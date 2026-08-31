<?php
/**
 * Title: Featured post beside recent posts
 * Slug: blockspire/blog-featured
 * Categories: blockspire-blog
 * Description: The newest post given a large card, with the next four listed compactly beside it.
 * Keywords: blog, featured, posts, latest, highlight
 * Viewport Width: 1600
 *
 * @package Blockspire
 * @since 1.0.0
 */

?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|80","bottom":"var:preset|spacing|100"},"blockGap":"var:preset|spacing|48"}},"layout":{"type":"constrained","contentSize":"1170px"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--80);padding-bottom:var(--wp--preset--spacing--100)"><!-- wp:heading {"style":{"typography":{"lineHeight":"var:custom|line-height|heading-04"}},"fontSize":"heading-04"} -->
<h2 class="wp-block-heading has-heading-04-font-size" style="line-height:var(--wp--custom--line-height--heading-04)"><?php echo esc_html__( 'From the journal', 'blockspire' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:columns {"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|48","left":"var:preset|spacing|70"}}}} -->
<div class="wp-block-columns"><!-- wp:column {"width":"58%"} -->
<div class="wp-block-column" style="flex-basis:58%"><!-- wp:query {"queryId":0,"query":{"perPage":1,"pages":1,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false},"layout":{"type":"default"}} -->
<div class="wp-block-query"><!-- wp:post-template {"layout":{"type":"default"}} -->
<!-- wp:post-featured-image {"isLink":true,"aspectRatio":"3/2","style":{"border":{"radius":"8px"}}} /-->

<!-- wp:post-terms {"term":"category","style":{"typography":{"fontWeight":"600","textTransform":"uppercase","letterSpacing":"0.05em"},"spacing":{"margin":{"top":"var:preset|spacing|20"}}},"textColor":"gray-02","fontSize":"small-paragraph"} /-->

<!-- wp:post-title {"isLink":true,"style":{"typography":{"lineHeight":"1.2"},"spacing":{"margin":{"top":"var:preset|spacing|10","bottom":"var:preset|spacing|16"}}},"fontSize":"heading-05"} /-->

<!-- wp:post-excerpt {"excerptLength":32,"textColor":"text-color","fontSize":"medium-paragraph"} /-->
<!-- /wp:post-template -->

<!-- wp:query-no-results -->
<!-- wp:pattern {"slug":"blockspire/no-results"} /-->
<!-- /wp:query-no-results --></div>
<!-- /wp:query --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:query {"queryId":0,"query":{"perPage":4,"pages":1,"offset":1,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false},"layout":{"type":"default"}} -->
<div class="wp-block-query"><!-- wp:post-template {"style":{"spacing":{"blockGap":"var:preset|spacing|24"}},"layout":{"type":"default"}} -->
<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|10","padding":{"bottom":"var:preset|spacing|24"}},"border":{"bottom":{"color":"var:preset|color|gray-03","width":"1px"}}},"layout":{"type":"default"}} -->
<div class="wp-block-group" style="border-bottom-color:var(--wp--preset--color--gray-03);border-bottom-width:1px;padding-bottom:var(--wp--preset--spacing--24)"><!-- wp:post-title {"isLink":true,"style":{"typography":{"fontWeight":"700","lineHeight":"var:custom|line-height|title-large"}},"fontSize":"large-title"} /-->

<!-- wp:post-date {"textColor":"text-color","fontSize":"small-paragraph"} /--></div>
<!-- /wp:group -->
<!-- /wp:post-template -->

<!-- wp:query-no-results -->
<!-- wp:pattern {"slug":"blockspire/no-results"} /-->
<!-- /wp:query-no-results --></div>
<!-- /wp:query --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->
