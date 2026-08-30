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
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|100"}}},"layout":{"type":"constrained","contentSize":"1170px"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--100)"><!-- wp:columns {"verticalAlignment":"center","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|48","left":"var:preset|spacing|48"}}}} -->
<div class="wp-block-columns are-vertically-aligned-center"><!-- wp:column {"verticalAlignment":"center","width":"50%","style":{"spacing":{"blockGap":"var:preset|spacing|48"}}} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:50%"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|30"}},"layout":{"type":"constrained","justifyContent":"left"}} -->
<div class="wp-block-group"><!-- wp:heading {"level":1,"fontSize":"heading-01"} -->
<h1 class="wp-block-heading has-heading-01-font-size"><?php echo esc_html__( 'Creating Software &amp; Digital Excellence', 'blockspire' ); ?></h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"typography":{"fontWeight":"400","lineHeight":"var:custom|line-height|paragraph-large"}},"textColor":"text-color","fontSize":"large-paragraph"} -->
<p class="has-text-color-color has-text-color has-large-paragraph-font-size" style="font-weight:400;line-height:var(--wp--custom--line-height--paragraph-large)"><?php echo esc_html__( 'We transform businesses of most major sectors with powerful and adaptable digital solutions.', 'blockspire' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="#"><?php echo esc_html__( 'Let&#8217;s Talk With Us', 'blockspire' ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","width":"50%"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:50%"><!-- wp:image {"aspectRatio":"4/3","scale":"cover","sizeSlug":"full","linkDestination":"none","style":{"border":{"radius":"8px"}}} -->
<figure class="wp-block-image size-full has-custom-border"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/hero-workspace.webp' ) ); ?>" alt="<?php echo esc_attr__( 'A tidy desk with a monitor, keyboard and mouse beside a window', 'blockspire' ); ?>" width="960" height="640" style="border-radius:8px;aspect-ratio:4/3;object-fit:cover"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->
