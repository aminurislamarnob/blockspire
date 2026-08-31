<?php
/**
 * Title: Comments
 * Slug: blockspire/comments
 * Categories: blockspire-blog
 * Inserter: no
 * Description: The comment list, pagination and reply form for a single entry.
 * Keywords: comments, discussion, replies
 *
 * @package Blockspire
 * @since 1.0.0
 */

?>
<!-- wp:comments {"style":{"spacing":{"blockGap":"var:preset|spacing|40","margin":{"top":"var:preset|spacing|80"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-comments" style="margin-top:var(--wp--preset--spacing--80)"><!-- wp:comments-title {"level":2,"style":{"typography":{"lineHeight":"1.2"}},"fontSize":"heading-06"} /-->

<!-- wp:comment-template {"style":{"spacing":{"blockGap":"var:preset|spacing|40"}}} -->
<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|12","padding":{"top":"var:preset|spacing|24","right":"var:preset|spacing|24","bottom":"var:preset|spacing|24","left":"var:preset|spacing|24"}},"border":{"color":"var:preset|color|gray-03","width":"1px","radius":"8px"}},"layout":{"type":"default"}} -->
<div class="wp-block-group has-border-color" style="border-color:var(--wp--preset--color--gray-03);border-width:1px;border-radius:8px;padding-top:var(--wp--preset--spacing--24);padding-right:var(--wp--preset--spacing--24);padding-bottom:var(--wp--preset--spacing--24);padding-left:var(--wp--preset--spacing--24)"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|12"}},"layout":{"type":"flex","flexWrap":"wrap","verticalAlignment":"center"}} -->
<div class="wp-block-group"><!-- wp:avatar {"size":40,"style":{"border":{"radius":"20px"}}} /-->

<!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"default"}} -->
<div class="wp-block-group"><!-- wp:comment-author-name {"fontSize":"medium-paragraph","style":{"typography":{"fontWeight":"700","lineHeight":"1.625"}}} /-->

<!-- wp:comment-date {"textColor":"text-color","fontSize":"small-paragraph"} /--></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:comment-content {"fontSize":"medium-paragraph"} /-->

<!-- wp:comment-reply-link {"fontSize":"small-paragraph"} /--></div>
<!-- /wp:group -->
<!-- /wp:comment-template -->

<!-- wp:comments-pagination {"layout":{"type":"flex","justifyContent":"space-between"}} -->
<!-- wp:comments-pagination-previous /-->

<!-- wp:comments-pagination-numbers /-->

<!-- wp:comments-pagination-next /-->
<!-- /wp:comments-pagination -->

<!-- wp:post-comments-form /--></div>
<!-- /wp:comments -->
