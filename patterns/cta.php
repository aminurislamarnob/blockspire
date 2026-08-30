<?php
/**
 * Title: Call to action band
 * Slug: blockspire/cta
 * Categories: blockspire-cta, call-to-action
 * Description: A wide coloured band with a display heading, a call to action button and a subtle decorative texture.
 * Keywords: cta, call to action, banner, contact, get in touch
 * Viewport Width: 1600
 *
 * @package Blockspire
 * @since 1.0.0
 */

?>
<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"var:preset|spacing|80","right":"var:preset|spacing|fluid-inset","bottom":"var:preset|spacing|80","left":"var:preset|spacing|fluid-inset"}},"background":{"backgroundImage":{"url":"<?php echo esc_url( get_theme_file_uri( 'assets/images/band-decoration.svg' ) ); ?>"},"backgroundSize":"cover","backgroundPosition":"50% 50%"},"elements":{"link":{"color":{"text":"var:preset|color|text-white"}}}},"backgroundColor":"primary","textColor":"text-white","layout":{"type":"default"}} -->
<div class="wp-block-group alignwide has-text-white-color has-primary-background-color has-text-color has-background has-link-color" style="padding-top:var(--wp--preset--spacing--80);padding-right:var(--wp--preset--spacing--fluid-inset);padding-bottom:var(--wp--preset--spacing--80);padding-left:var(--wp--preset--spacing--fluid-inset)"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|48"}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between","verticalAlignment":"bottom"}} -->
<div class="wp-block-group"><!-- wp:group {"layout":{"type":"constrained","contentSize":"470px","justifyContent":"left"}} -->
<div class="wp-block-group"><!-- wp:heading {"level":2,"style":{"typography":{"fontWeight":"700","lineHeight":"var:custom|line-height|display","letterSpacing":"var:custom|letter-spacing|tight"}},"textColor":"text-white","fontSize":"display"} -->
<h2 class="wp-block-heading has-text-white-color has-text-color has-display-font-size" style="font-weight:700;letter-spacing:var(--wp--custom--letter-spacing--tight);line-height:var(--wp--custom--line-height--display)"><?php echo esc_html__( 'Got a project? Let&#8217;s talk.', 'blockspire' ); ?></h2>
<!-- /wp:heading --></div>
<!-- /wp:group -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button {"backgroundColor":"text-white","textColor":"primary"} -->
<div class="wp-block-button"><a class="wp-block-button__link has-primary-color has-text-white-background-color has-text-color has-background wp-element-button" href="#"><?php echo esc_html__( 'Start a Project', 'blockspire' ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->
