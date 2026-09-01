<?php
/**
 * Title: Compact call to action banner
 * Slug: blockspire/cta-banner
 * Categories: blockspire-cta, call-to-action
 * Description: A short coloured strip with an invitation on one side and a single button on the other.
 * Keywords: call to action, cta, banner, strip, contact
 * Viewport Width: 1600
 *
 * @package Blockspire
 * @since 1.0.0
 */

?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"}}},"layout":{"type":"constrained","contentSize":"1170px"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--60)"><!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|48","right":"var:preset|spacing|48","bottom":"var:preset|spacing|48","left":"var:preset|spacing|48"},"blockGap":"var:preset|spacing|32"},"border":{"radius":"12px"},"background":{"backgroundImage":{"url":"<?php echo esc_url( get_theme_file_uri( 'assets/images/dot-grid.svg' ) ); ?>"},"backgroundSize":"30px","backgroundRepeat":"repeat","backgroundPosition":"0 0"},"elements":{"link":{"color":{"text":"var:preset|color|text-white"}}}},"backgroundColor":"primary","textColor":"text-white","layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between","verticalAlignment":"center"}} -->
<div class="wp-block-group has-text-white-color has-primary-background-color has-text-color has-background has-link-color" style="border-radius:12px;padding-top:var(--wp--preset--spacing--48);padding-right:var(--wp--preset--spacing--48);padding-bottom:var(--wp--preset--spacing--48);padding-left:var(--wp--preset--spacing--48)"><!-- wp:heading {"level":2,"style":{"typography":{"lineHeight":"var:custom|line-height|heading-05"}},"textColor":"text-white","fontSize":"heading-05"} -->
<h2 class="wp-block-heading has-text-white-color has-text-color has-heading-05-font-size" style="line-height:var(--wp--custom--line-height--heading-05)"><?php echo esc_html__( 'Got a project? Let&#8217;s talk.', 'blockspire' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button {"backgroundColor":"main-bg","textColor":"heading-color","className":"is-style-arrow"} -->
<div class="wp-block-button is-style-arrow"><a class="wp-block-button__link has-heading-color-color has-main-bg-background-color has-text-color has-background wp-element-button" href="#"><?php echo esc_html__( 'Start a conversation', 'blockspire' ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->
