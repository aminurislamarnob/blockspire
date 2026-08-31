<?php
/**
 * Title: Newsletter sign-up band
 * Slug: blockspire/newsletter
 * Categories: blockspire-cta
 * Description: A standalone sign-up band that picks up the Mailchimp for WordPress form when the plugin is active, and falls back to a button when it is not.
 * Keywords: newsletter, subscribe, sign up, mailing list, email
 * Viewport Width: 1600
 *
 * @package Blockspire
 * @since 1.0.0
 */

?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|80","bottom":"var:preset|spacing|80","left":"var:preset|spacing|fluid-inset","right":"var:preset|spacing|fluid-inset"},"blockGap":"var:preset|spacing|32"},"background":{"backgroundImage":{"url":"<?php echo esc_url( get_theme_file_uri( 'assets/images/dot-grid.svg' ) ); ?>"},"backgroundSize":"18px","backgroundRepeat":"repeat","backgroundPosition":"0 0"},"elements":{"link":{"color":{"text":"var:preset|color|text-white"}}}},"backgroundColor":"secondary","textColor":"text-white","layout":{"type":"constrained","contentSize":"800px"}} -->
<div class="wp-block-group alignfull has-text-white-color has-secondary-background-color has-text-color has-background has-link-color" style="padding-top:var(--wp--preset--spacing--80);padding-right:var(--wp--preset--spacing--fluid-inset);padding-bottom:var(--wp--preset--spacing--80);padding-left:var(--wp--preset--spacing--fluid-inset)"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|16"}},"layout":{"type":"default"}} -->
<div class="wp-block-group"><!-- wp:heading {"textAlign":"center","level":2,"style":{"typography":{"lineHeight":"var:custom|line-height|heading-05"}},"textColor":"text-white","fontSize":"heading-05"} -->
<h2 class="wp-block-heading has-text-align-center has-text-white-color has-text-color has-heading-05-font-size" style="line-height:var(--wp--custom--line-height--heading-05)"><?php echo esc_html__( 'One useful email a month', 'blockspire' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","style":{"typography":{"lineHeight":"var:custom|line-height|paragraph-medium"}},"textColor":"gray-03","fontSize":"medium-paragraph"} -->
<p class="has-text-align-center has-gray-03-color has-text-color has-medium-paragraph-font-size" style="line-height:var(--wp--custom--line-height--paragraph-medium)"><?php echo esc_html__( 'What we have learned, what we have shipped, and the occasional thing we got wrong. No selling.', 'blockspire' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->
<?php if ( function_exists( 'mc4wp_show_form' ) ) : ?>
<!-- wp:group {"className":"is-style-newsletter-underline","layout":{"type":"default"}} -->
<div class="wp-block-group is-style-newsletter-underline"><!-- wp:mailchimp-for-wp/form /--></div>
<!-- /wp:group -->
<?php else : ?>
<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons"><!-- wp:button {"backgroundColor":"main-bg","textColor":"heading-color","className":"is-style-arrow"} -->
<div class="wp-block-button is-style-arrow"><a class="wp-block-button__link has-heading-color-color has-main-bg-background-color has-text-color has-background wp-element-button" href="#"><?php echo esc_html__( 'Subscribe', 'blockspire' ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons -->
<?php endif; ?>
</div>
<!-- /wp:group -->
