<?php
/**
 * Title: Follow us row
 * Slug: blockspire/social-follow
 * Categories: blockspire-contact, blockspire-pages
 * Description: A short invitation beside a row of social icons, using the core Social Icons block so no images are bundled.
 * Keywords: social, follow, links, icons, community
 * Viewport Width: 1600
 *
 * @package Blockspire
 * @since 1.0.0
 */

?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"}}},"layout":{"type":"constrained","contentSize":"1170px"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--60)"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|32","padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40"}},"border":{"top":{"color":"var:preset|color|gray-03","width":"1px"},"bottom":{"color":"var:preset|color|gray-03","width":"1px"}}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between","verticalAlignment":"center"}} -->
<div class="wp-block-group" style="border-top-color:var(--wp--preset--color--gray-03);border-top-width:1px;border-bottom-color:var(--wp--preset--color--gray-03);border-bottom-width:1px;padding-top:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40)"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|10"}},"layout":{"type":"default"}} -->
<div class="wp-block-group"><!-- wp:heading {"level":2,"style":{"typography":{"fontWeight":"700","lineHeight":"var:custom|line-height|title-large"}},"fontSize":"large-title"} -->
<h2 class="wp-block-heading has-large-title-font-size" style="font-weight:700;line-height:var(--wp--custom--line-height--title-large)"><?php echo esc_html__( 'Follow along', 'blockspire' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"typography":{"lineHeight":"var:custom|line-height|paragraph-medium"}},"textColor":"text-color","fontSize":"medium-paragraph"} -->
<p class="has-text-color-color has-text-color has-medium-paragraph-font-size" style="line-height:var(--wp--custom--line-height--paragraph-medium)"><?php echo esc_html__( 'Notes on what we are building, roughly once a week.', 'blockspire' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:social-links {"iconColor":"text-white","iconColorValue":"#FFFFFF","iconBackgroundColor":"secondary","iconBackgroundColorValue":"#111B3A","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|12","left":"var:preset|spacing|12"}}},"className":"has-icon-color has-icon-background-color","layout":{"type":"flex"}} -->
<ul class="wp-block-social-links has-icon-color has-icon-background-color"><!-- wp:social-link {"url":"#","service":"linkedin"} /-->

<!-- wp:social-link {"url":"#","service":"x"} /-->

<!-- wp:social-link {"url":"#","service":"github"} /-->

<!-- wp:social-link {"url":"#","service":"rss"} /--></ul>
<!-- /wp:social-links --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->
