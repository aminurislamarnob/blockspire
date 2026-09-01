<?php
/**
 * Title: Hero with heading, text and call to action
 * Slug: blockspire/hero
 * Categories: blockspire-hero, featured
 * Description: A large display heading with supporting text, a call to action button and a supporting image.
 * Keywords: hero, banner, headline, intro, landing
 * Viewport Width: 1600
 *
 * @package Blockspire
 * @since 1.0.0
 */

?>
<!-- wp:group {"align":"full","className":"is-style-hero-grid","style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|100"}}},"layout":{"type":"constrained","contentSize":"1170px"}} -->
<div class="wp-block-group alignfull is-style-hero-grid" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--100)"><!-- wp:columns {"verticalAlignment":"center","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|48","left":"var:preset|spacing|48"}}}} -->
<div class="wp-block-columns are-vertically-aligned-center"><!-- wp:column {"verticalAlignment":"center","width":"570px","style":{"spacing":{"blockGap":"var:preset|spacing|48"}}} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:570px"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|30"}},"layout":{"type":"constrained","justifyContent":"left"}} -->
<div class="wp-block-group"><!-- wp:heading {"level":1,"fontSize":"heading-01"} -->
<h1 class="wp-block-heading has-heading-01-font-size"><?php echo esc_html__( 'Creating Software &amp; Digital Excellence', 'blockspire' ); ?></h1>
<!-- /wp:heading -->

<!-- wp:group {"layout":{"type":"constrained","contentSize":"492px","justifyContent":"left"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"style":{"typography":{"fontWeight":"400","lineHeight":"var:custom|line-height|paragraph-large"}},"textColor":"text-color","fontSize":"large-paragraph"} -->
<p class="has-text-color-color has-text-color has-large-paragraph-font-size" style="font-weight:400;line-height:var(--wp--custom--line-height--paragraph-large)"><?php echo esc_html__( 'We transform businesses of most major sectors with powerful and adaptable digital solutions.', 'blockspire' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button {"className":"is-style-arrow"} -->
<div class="wp-block-button is-style-arrow"><a class="wp-block-button__link wp-element-button" href="#"><?php echo esc_html__( 'Let&#8217;s Talk With Us', 'blockspire' ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center"} -->
<div class="wp-block-column is-vertically-aligned-center"><!-- wp:group {"className":"is-style-hero-collage","style":{"spacing":{"blockGap":"0"}},"layout":{"type":"default"}} -->
<div class="wp-block-group is-style-hero-collage"><!-- wp:image {"aspectRatio":"0.96","scale":"cover","sizeSlug":"full","linkDestination":"none","className":"blockspire-collage-photo","style":{"border":{"radius":"24px"}}} -->
<figure class="wp-block-image size-full has-custom-border blockspire-collage-photo"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/hero-workspace.webp' ) ); ?>" alt="<?php echo esc_attr__( 'A tidy desk with a monitor, keyboard and mouse beside a window', 'blockspire' ); ?>" style="border-radius:24px;aspect-ratio:0.96;object-fit:cover"/></figure>
<!-- /wp:image -->

<!-- wp:group {"className":"blockspire-collage-stat","style":{"typography":{"lineHeight":"0"},"border":{"radius":"24px"},"spacing":{"padding":{"top":"var:preset|spacing|24","right":"var:preset|spacing|24","bottom":"var:preset|spacing|24","left":"var:preset|spacing|24"},"blockGap":"var:preset|spacing|10"}},"backgroundColor":"primary","textColor":"text-white","layout":{"type":"default"}} -->
<div class="wp-block-group blockspire-collage-stat has-text-white-color has-primary-background-color has-text-color has-background" style="border-radius:24px;padding-top:var(--wp--preset--spacing--24);padding-right:var(--wp--preset--spacing--24);padding-bottom:var(--wp--preset--spacing--24);padding-left:var(--wp--preset--spacing--24);line-height:0"><!-- wp:paragraph {"style":{"typography":{"fontWeight":"700","lineHeight":"var:custom|line-height|heading-05"}},"fontSize":"heading-05"} -->
<p class="has-heading-05-font-size" style="font-weight:700;line-height:var(--wp--custom--line-height--heading-05)"><?php echo esc_html__( '2K+', 'blockspire' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"style":{"typography":{"fontWeight":"600","lineHeight":"var:custom|line-height|paragraph-small"}},"fontSize":"small-paragraph"} -->
<p class="has-small-paragraph-font-size" style="font-weight:600;line-height:var(--wp--custom--line-height--paragraph-small)"><?php echo esc_html__( 'Successful projects', 'blockspire' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"blockspire-collage-note","style":{"border":{"radius":"24px"},"spacing":{"padding":{"top":"var:preset|spacing|24","right":"var:preset|spacing|24","bottom":"var:preset|spacing|24","left":"var:preset|spacing|24"},"blockGap":"var:preset|spacing|20"},"shadow":"0 16px 40px 0 rgba(17,27,58,0.14)"},"backgroundColor":"main-bg","layout":{"type":"default"}} -->
<div class="wp-block-group blockspire-collage-note has-main-bg-background-color has-background" style="border-radius:24px;padding-top:var(--wp--preset--spacing--24);padding-right:var(--wp--preset--spacing--24);padding-bottom:var(--wp--preset--spacing--24);padding-left:var(--wp--preset--spacing--24);box-shadow:0 16px 40px 0 rgba(17,27,58,0.14)"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|12"}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between","verticalAlignment":"top"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"style":{"typography":{"lineHeight":"var:custom|line-height|paragraph-small"}},"textColor":"text-color","fontSize":"small-paragraph"} -->
<p class="has-text-color-color has-text-color has-small-paragraph-font-size" style="line-height:var(--wp--custom--line-height--paragraph-small)"><?php echo esc_html__( '100%', 'blockspire' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:group {"style":{"typography":{"lineHeight":"0"},"border":{"radius":"100px"},"dimensions":{"minWidth":"56px","minHeight":"56px"},"color":{"background":"#3fae5c"}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center","verticalAlignment":"center"}} -->
<div class="wp-block-group has-background" style="border-radius:100px;background-color:#3fae5c;min-height:56px;min-width:56px;line-height:0"><!-- wp:image {"width":"28px","height":"28px","scale":"contain","sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full is-resized"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/icon-package.svg' ) ); ?>" alt="" style="object-fit:contain;width:28px;height:28px"/></figure>
<!-- /wp:image --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"default"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"style":{"typography":{"fontWeight":"700","lineHeight":"var:custom|line-height|title-medium"}},"textColor":"heading-color","fontSize":"medium-title"} -->
<p class="has-heading-color-color has-text-color has-medium-title-font-size" style="font-weight:700;line-height:var(--wp--custom--line-height--title-medium)"><?php echo esc_html__( 'Client', 'blockspire' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"style":{"typography":{"lineHeight":"var:custom|line-height|title-medium"}},"textColor":"heading-color","fontSize":"medium-title"} -->
<p class="has-heading-color-color has-text-color has-medium-title-font-size" style="line-height:var(--wp--custom--line-height--title-medium)"><?php echo esc_html__( 'Satisfaction', 'blockspire' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"blockspire-collage-play","style":{"border":{"radius":"100px"},"spacing":{"padding":{"top":"var:preset|spacing|8","right":"var:preset|spacing|24","bottom":"var:preset|spacing|8","left":"var:preset|spacing|8"},"blockGap":"var:preset|spacing|12"},"shadow":"0 16px 40px 0 rgba(17,27,58,0.14)"},"backgroundColor":"main-bg","layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
<div class="wp-block-group blockspire-collage-play has-main-bg-background-color has-background" style="border-radius:100px;padding-top:var(--wp--preset--spacing--8);padding-right:var(--wp--preset--spacing--24);padding-bottom:var(--wp--preset--spacing--8);padding-left:var(--wp--preset--spacing--8);box-shadow:0 16px 40px 0 rgba(17,27,58,0.14)"><!-- wp:group {"style":{"typography":{"lineHeight":"0"},"border":{"radius":"100px"},"dimensions":{"minWidth":"44px","minHeight":"44px"}},"backgroundColor":"secondary","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center","verticalAlignment":"center"}} -->
<div class="wp-block-group has-secondary-background-color has-background" style="border-radius:100px;min-height:44px;min-width:44px;line-height:0"><!-- wp:image {"width":"20px","height":"20px","scale":"contain","sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full is-resized"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/icon-play.svg' ) ); ?>" alt="" style="object-fit:contain;width:20px;height:20px"/></figure>
<!-- /wp:image --></div>
<!-- /wp:group -->

<!-- wp:paragraph {"style":{"typography":{"fontWeight":"500","lineHeight":"var:custom|line-height|button-large"}},"textColor":"heading-color","fontSize":"button-large"} -->
<p class="has-heading-color-color has-text-color has-button-large-font-size" style="font-weight:500;line-height:var(--wp--custom--line-height--button-large)"><?php echo esc_html__( 'How we work', 'blockspire' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:image {"scale":"contain","sizeSlug":"full","linkDestination":"none","className":"blockspire-collage-doodle"} -->
<figure class="wp-block-image size-full blockspire-collage-doodle"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/doodle-arrow.svg' ) ); ?>" alt="" style="object-fit:contain"/></figure>
<!-- /wp:image --></div>
<!-- /wp:group --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->
