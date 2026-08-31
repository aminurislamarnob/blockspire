<?php
/**
 * Title: Callout box
 * Slug: blockspire/callout
 * Categories: blockspire-pages
 * Description: A bordered box with an icon, a short heading and a link, for drawing attention to one thing inside a longer page.
 * Keywords: callout, notice, highlight, tip, aside
 * Viewport Width: 1600
 *
 * @package Blockspire
 * @since 1.0.0
 */

?>
<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"var:preset|spacing|32","right":"var:preset|spacing|32","bottom":"var:preset|spacing|32","left":"var:preset|spacing|32"},"blockGap":"var:preset|spacing|24","margin":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40"}},"border":{"color":"var:preset|color|primary","width":"1px","radius":"8px"}},"layout":{"type":"flex","flexWrap":"wrap","verticalAlignment":"center"}} -->
<div class="wp-block-group alignwide has-border-color" style="border-color:var(--wp--preset--color--primary);border-width:1px;border-radius:8px;margin-top:var(--wp--preset--spacing--40);margin-bottom:var(--wp--preset--spacing--40);padding-top:var(--wp--preset--spacing--32);padding-right:var(--wp--preset--spacing--32);padding-bottom:var(--wp--preset--spacing--32);padding-left:var(--wp--preset--spacing--32)"><!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"left"}} -->
<div class="wp-block-group"><!-- wp:group {"style":{"typography":{"lineHeight":"0"},"border":{"radius":"100px"},"dimensions":{"minWidth":"48px","minHeight":"48px"}},"backgroundColor":"primary","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center","verticalAlignment":"center"}} -->
<div class="wp-block-group has-primary-background-color has-background" style="border-radius:100px;min-height:48px;min-width:48px;line-height:0"><!-- wp:image {"width":"24px","height":"24px","scale":"contain","sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full is-resized"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/icon-shield.svg' ) ); ?>" alt="" style="object-fit:contain;width:24px;height:24px"/></figure>
<!-- /wp:image --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|10"}},"layout":{"type":"default"}} -->
<div class="wp-block-group"><!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"700","lineHeight":"var:custom|line-height|title-medium"}},"fontSize":"medium-title"} -->
<h3 class="wp-block-heading has-medium-title-font-size" style="font-weight:700;line-height:var(--wp--custom--line-height--title-medium)"><?php echo esc_html__( 'Not sure where to start?', 'blockspire' ); ?></h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"is-style-arrow-link","style":{"typography":{"lineHeight":"var:custom|line-height|paragraph-medium"},"elements":{"link":{"color":{"text":"var:preset|color|heading-color"}}}},"fontSize":"medium-paragraph"} -->
<p class="is-style-arrow-link has-link-color has-medium-paragraph-font-size" style="line-height:var(--wp--custom--line-height--paragraph-medium)"><a href="#"><?php echo esc_html__( 'Book a half hour with us, free', 'blockspire' ); ?></a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->
