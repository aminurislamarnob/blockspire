<?php
/**
 * Title: Latest articles in two large cards
 * Slug: blockspire/posts-latest
 * Categories: blockspire-blog
 * Description: An eyebrow, heading and archive link beside each other, above the two newest posts as large cards with the category shown on the image.
 * Keywords: blog, posts, latest, articles, news
 * Viewport Width: 1600
 *
 * @package Blockspire
 * @since 1.0.0
 */

?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|80","bottom":"var:preset|spacing|100"},"blockGap":"var:preset|spacing|48"}},"layout":{"type":"constrained","contentSize":"1170px"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--80);padding-bottom:var(--wp--preset--spacing--100)"><!-- wp:group {"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|24","left":"var:preset|spacing|40"}}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between","verticalAlignment":"bottom"}} -->
<div class="wp-block-group"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|16"}},"layout":{"type":"default"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"style":{"typography":{"fontWeight":"700","lineHeight":"var:custom|line-height|title-medium"}},"textColor":"gray-02","fontSize":"medium-title"} -->
<p class="has-gray-02-color has-text-color has-medium-title-font-size" style="font-weight:700;line-height:var(--wp--custom--line-height--title-medium)"><?php echo esc_html__( 'Blog', 'blockspire' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"style":{"typography":{"lineHeight":"var:custom|line-height|heading-03"}},"fontSize":"heading-03"} -->
<h2 class="wp-block-heading has-heading-03-font-size" style="line-height:var(--wp--custom--line-height--heading-03)"><?php echo esc_html__( 'Our latest articles', 'blockspire' ); ?></h2>
<!-- /wp:heading --></div>
<!-- /wp:group -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button {"className":"is-style-arrow"} -->
<div class="wp-block-button is-style-arrow"><a class="wp-block-button__link wp-element-button" href="#"><?php echo esc_html__( 'View all', 'blockspire' ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group -->

<!-- wp:query {"queryId":0,"query":{"perPage":2,"pages":1,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false},"layout":{"type":"default"}} -->
<div class="wp-block-query"><!-- wp:post-template {"style":{"spacing":{"blockGap":"var:preset|spacing|30"}},"layout":{"type":"grid","columnCount":2}} -->
<!-- wp:cover {"useFeaturedImage":true,"dimRatio":0,"isUserOverlayColor":true,"minHeight":320,"minHeightUnit":"px","contentPosition":"top left","isDark":false,"style":{"border":{"radius":"8px"},"spacing":{"padding":{"top":"var:preset|spacing|20","right":"var:preset|spacing|20","bottom":"var:preset|spacing|20","left":"var:preset|spacing|20"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-cover is-light has-custom-content-position is-position-top-left" style="border-radius:8px;padding-top:var(--wp--preset--spacing--20);padding-right:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--20);padding-left:var(--wp--preset--spacing--20);min-height:320px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-0 has-background-dim"></span><div class="wp-block-cover__inner-container"><!-- wp:post-terms {"term":"category","className":"is-style-chip","style":{"typography":{"fontWeight":"600"},"border":{"radius":"4px"},"spacing":{"padding":{"top":"6px","right":"14px","bottom":"6px","left":"14px"}},"elements":{"link":{"color":{"text":"var:preset|color|heading-color"}}}},"backgroundColor":"main-bg","textColor":"heading-color","fontSize":"small-paragraph"} /--></div></div>
<!-- /wp:cover -->

<!-- wp:post-date {"style":{"typography":{"lineHeight":"1.571"},"spacing":{"margin":{"top":"var:preset|spacing|24"}}},"textColor":"text-color","fontSize":"small-paragraph"} /-->

<!-- wp:post-title {"isLink":true,"style":{"typography":{"fontWeight":"700","lineHeight":"1.25"},"spacing":{"margin":{"top":"var:preset|spacing|10","bottom":"var:preset|spacing|24"}}},"fontSize":"large-title"} /-->

<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|20"}},"border":{"top":{"color":"var:preset|color|gray-03","width":"1px"}}},"layout":{"type":"default"}} -->
<div class="wp-block-group" style="border-top-color:var(--wp--preset--color--gray-03);border-top-width:1px;padding-top:var(--wp--preset--spacing--20)"><!-- wp:read-more {"className":"is-style-arrow","content":"<?php echo esc_attr__( 'Read more', 'blockspire' ); ?>","style":{"typography":{"fontWeight":"400","lineHeight":"1.5"}},"textColor":"heading-color","fontSize":"medium-paragraph"} /--></div>
<!-- /wp:group -->
<!-- /wp:post-template -->

<!-- wp:query-no-results -->
<!-- wp:pattern {"slug":"blockspire/no-results"} /-->
<!-- /wp:query-no-results --></div>
<!-- /wp:query --></div>
<!-- /wp:group -->
