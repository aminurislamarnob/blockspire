<?php
/**
 * Title: Feature highlight band
 * Slug: blockspire/feature-highlight
 * Categories: blockspire-features
 * Description: A single wide tinted card carrying one promise: an icon, a short title and a paragraph of supporting detail.
 * Keywords: promise, highlight, guarantee, callout, single feature
 * Viewport Width: 1600
 *
 * @package Blockspire
 * @since 1.0.0
 */

?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"}}},"layout":{"type":"constrained","contentSize":"1170px"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--60)"><!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|40","right":"var:preset|spacing|40","bottom":"var:preset|spacing|40","left":"var:preset|spacing|40"},"blockGap":"var:preset|spacing|24"},"border":{"radius":"12px"},"background":{"backgroundImage":{"url":"<?php echo esc_url( get_theme_file_uri( 'assets/images/dot-grid.svg' ) ); ?>"},"backgroundSize":"18px","backgroundRepeat":"repeat","backgroundPosition":"0 0"}},"backgroundColor":"light-bg","layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"top"}} -->
<div class="wp-block-group has-light-bg-background-color has-background" style="border-radius:12px;padding-top:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40)"><!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|16","right":"var:preset|spacing|16","bottom":"var:preset|spacing|16","left":"var:preset|spacing|16"}},"border":{"radius":"100px"},"dimensions":{"minWidth":"64px"}},"backgroundColor":"primary","layout":{"type":"constrained","contentSize":"32px"}} -->
<div class="wp-block-group has-primary-background-color has-background" style="border-radius:100px;min-width:64px;padding-top:var(--wp--preset--spacing--16);padding-right:var(--wp--preset--spacing--16);padding-bottom:var(--wp--preset--spacing--16);padding-left:var(--wp--preset--spacing--16)"><!-- wp:image {"width":"32px","height":"32px","scale":"contain","sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full is-resized"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/icon-shield.svg' ) ); ?>" alt="" style="object-fit:contain;width:32px;height:32px"/></figure>
<!-- /wp:image --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|12"}},"layout":{"type":"default"}} -->
<div class="wp-block-group"><!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"700","lineHeight":"var:custom|line-height|title-large"}},"fontSize":"large-title"} -->
<h3 class="wp-block-heading has-large-title-font-size" style="font-weight:700;line-height:var(--wp--custom--line-height--title-large)"><?php echo esc_html__( 'Our promise', 'blockspire' ); ?></h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"typography":{"lineHeight":"var:custom|line-height|paragraph-medium"}},"textColor":"text-color","fontSize":"medium-paragraph"} -->
<p class="has-text-color-color has-text-color has-medium-paragraph-font-size" style="line-height:var(--wp--custom--line-height--paragraph-medium)"><?php echo esc_html__( 'Every project is handled with discipline, honest communication and a commitment to doing the job properly. We make sure your investment is protected and your expectations are met, and if anything is not right we say so early and put it right.', 'blockspire' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->
