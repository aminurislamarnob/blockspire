<?php
/**
 * Title: Post meta row
 * Slug: blockspire/post-meta
 * Categories: blockspire-blog
 * Inserter: no
 * Description: A single row of post date, author and categories.
 * Keywords: meta, date, author, category, byline
 *
 * @package Blockspire
 * @since 1.0.0
 */

?>
<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|16"}},"layout":{"type":"flex","flexWrap":"wrap","verticalAlignment":"center"}} -->
<div class="wp-block-group"><!-- wp:post-date {"textColor":"text-color","fontSize":"small-paragraph"} /-->

<!-- wp:paragraph {"textColor":"gray-03","fontSize":"small-paragraph"} -->
<p class="has-gray-03-color has-text-color has-small-paragraph-font-size">&#8226;</p>
<!-- /wp:paragraph -->

<!-- wp:post-author-name {"isLink":true,"textColor":"text-color","fontSize":"small-paragraph"} /-->

<!-- wp:paragraph {"textColor":"gray-03","fontSize":"small-paragraph"} -->
<p class="has-gray-03-color has-text-color has-small-paragraph-font-size">&#8226;</p>
<!-- /wp:paragraph -->

<!-- wp:post-terms {"term":"category","textColor":"primary","fontSize":"small-paragraph"} /--></div>
<!-- /wp:group -->
