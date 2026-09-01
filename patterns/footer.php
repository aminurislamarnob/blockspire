<?php
/**
 * Title: Footer with contact chips and menus
 * Slug: blockspire/footer
 * Categories: footer
 * Block Types: core/template-part/footer
 * Description: A dark footer with the site logo and social links, a large invitation heading with contact chips, two link columns and the site credit.
 * Keywords: footer, contact, menu, social
 * Viewport Width: 1600
 *
 * @package Blockspire
 * @since 1.0.0
 */

?>
<!-- wp:group {"tagName":"footer","align":"full","style":{"spacing":{"padding":{"top":"0","bottom":"var:preset|spacing|60"},"blockGap":"64px"},"background":{"backgroundImage":{"url":"<?php echo esc_url( get_theme_file_uri( 'assets/images/dot-grid.svg' ) ); ?>"},"backgroundSize":"30px","backgroundRepeat":"repeat","backgroundPosition":"0 0"},"elements":{"link":{"color":{"text":"var:preset|color|text-white"}}}},"backgroundColor":"dark-bg","textColor":"text-white","layout":{"type":"constrained","contentSize":"1170px"}} -->
<footer class="wp-block-group alignfull has-text-white-color has-dark-bg-background-color has-text-color has-background has-link-color" style="padding-top:0;padding-bottom:var(--wp--preset--spacing--60)"><!-- wp:group {"style":{"dimensions":{"minHeight":"80px"},"border":{"bottom":{"color":"rgba(255,255,255,0.2)","width":"1px","style":"solid"}}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between","verticalAlignment":"center"}} -->
<div class="wp-block-group" style="border-bottom-color:rgba(255,255,255,0.2);border-bottom-style:solid;border-bottom-width:1px;min-height:80px"><!-- wp:group {"style":{"spacing":{"blockGap":"6px"}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
<div class="wp-block-group"><!-- wp:image {"width":"165px","sizeSlug":"full","linkDestination":"custom"} -->
<figure class="wp-block-image size-full is-resized"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/logo-light.webp' ) ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" style="width:165px"/></a></figure>
<!-- /wp:image --></div>
<!-- /wp:group -->

<!-- wp:navigation {"overlayMenu":"never","textColor":"text-white","className":"is-style-bulleted","style":{"spacing":{"blockGap":"56px"},"typography":{"fontWeight":"400","lineHeight":"1.75"}},"fontSize":"medium-paragraph","layout":{"type":"flex","justifyContent":"right"}} -->
<!-- wp:navigation-link {"label":"<?php echo esc_attr__( 'FB', 'blockspire' ); ?>","url":"#","kind":"custom"} /-->

<!-- wp:navigation-link {"label":"<?php echo esc_attr__( 'TW', 'blockspire' ); ?>","url":"#","kind":"custom"} /-->

<!-- wp:navigation-link {"label":"<?php echo esc_attr__( 'LI', 'blockspire' ); ?>","url":"#","kind":"custom"} /-->

<!-- wp:navigation-link {"label":"<?php echo esc_attr__( 'IN', 'blockspire' ); ?>","url":"#","kind":"custom"} /-->
<!-- /wp:navigation --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|40"}},"layout":{"type":"default"}} -->
<div class="wp-block-group"><!-- wp:columns {"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|40","left":"var:preset|spacing|80"}}}} -->
<div class="wp-block-columns"><!-- wp:column {"width":"636px","style":{"spacing":{"blockGap":"var:preset|spacing|40"}}} -->
<div class="wp-block-column" style="flex-basis:636px"><!-- wp:heading {"level":2,"style":{"typography":{"lineHeight":"var:custom|line-height|heading-03","letterSpacing":"var:custom|letter-spacing|tight"}},"textColor":"text-white","fontSize":"heading-03"} -->
<h2 class="wp-block-heading has-text-white-color has-text-color has-heading-03-font-size" style="letter-spacing:var(--wp--custom--letter-spacing--tight);line-height:var(--wp--custom--line-height--heading-03)"><?php echo esc_html__( 'Let&#8217;s work together', 'blockspire' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:buttons {"style":{"spacing":{"blockGap":"var:preset|spacing|16"}}} -->
<div class="wp-block-buttons"><!-- wp:button {"className":"is-style-chip"} -->
<div class="wp-block-button is-style-chip"><a class="wp-block-button__link wp-element-button" href="mailto:hello@example.com">hello@example.com</a></div>
<!-- /wp:button -->

<!-- wp:button {"className":"is-style-chip"} -->
<div class="wp-block-button is-style-chip"><a class="wp-block-button__link wp-element-button" href="tel:+15550000000">+1 555 000 0000</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:column -->

<!-- wp:column {"style":{"spacing":{"padding":{"top":"var:preset|spacing|16","bottom":"var:preset|spacing|16"}}}} -->
<div class="wp-block-column" style="padding-top:var(--wp--preset--spacing--16);padding-bottom:var(--wp--preset--spacing--16)"><!-- wp:columns {"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|24","left":"var:preset|spacing|24"}}}} -->
<div class="wp-block-columns"><!-- wp:column {"width":"196px"} -->
<div class="wp-block-column" style="flex-basis:196px"><!-- wp:navigation {"overlayMenu":"never","textColor":"text-white","className":"is-style-bulleted","style":{"spacing":{"blockGap":"var:preset|spacing|32"},"typography":{"fontWeight":"400","lineHeight":"1.75"}},"fontSize":"medium-paragraph","layout":{"type":"flex","orientation":"vertical"}} -->
<!-- wp:navigation-link {"label":"<?php echo esc_attr__( 'About', 'blockspire' ); ?>","url":"#","kind":"custom"} /-->

<!-- wp:navigation-link {"label":"<?php echo esc_attr__( 'Services', 'blockspire' ); ?>","url":"#","kind":"custom"} /-->

<!-- wp:navigation-link {"label":"<?php echo esc_attr__( 'Blog', 'blockspire' ); ?>","url":"#","kind":"custom"} /-->

<!-- wp:navigation-link {"label":"<?php echo esc_attr__( 'Contact', 'blockspire' ); ?>","url":"#","kind":"custom"} /-->
<!-- /wp:navigation --></div>
<!-- /wp:column -->

<!-- wp:column {"width":"197px"} -->
<div class="wp-block-column" style="flex-basis:197px"><!-- wp:navigation {"overlayMenu":"never","textColor":"text-white","className":"is-style-bulleted","style":{"spacing":{"blockGap":"var:preset|spacing|32"},"typography":{"fontWeight":"400","lineHeight":"1.75"}},"fontSize":"medium-paragraph","layout":{"type":"flex","orientation":"vertical"}} -->
<!-- wp:navigation-link {"label":"<?php echo esc_attr__( 'Portfolio', 'blockspire' ); ?>","url":"#","kind":"custom"} /-->

<!-- wp:navigation-link {"label":"<?php echo esc_attr__( 'Team members', 'blockspire' ); ?>","url":"#","kind":"custom"} /-->

<!-- wp:navigation-link {"label":"<?php echo esc_attr__( 'Pricing', 'blockspire' ); ?>","url":"#","kind":"custom"} /-->

<!-- wp:navigation-link {"label":"<?php echo esc_attr__( 'Help', 'blockspire' ); ?>","url":"#","kind":"custom"} /-->
<!-- /wp:navigation --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<?php if ( function_exists( 'mc4wp_show_form' ) ) : ?>
<!-- wp:columns {"verticalAlignment":"bottom","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|40","left":"var:preset|spacing|40"}}}} -->
<div class="wp-block-columns are-vertically-aligned-bottom"><!-- wp:column {"verticalAlignment":"bottom"} -->
<div class="wp-block-column is-vertically-aligned-bottom"><!-- wp:paragraph {"style":{"typography":{"lineHeight":"var:custom|line-height|paragraph-medium"}},"textColor":"text-white","fontSize":"medium-paragraph"} -->
<p class="has-text-white-color has-text-color has-medium-paragraph-font-size" style="line-height:var(--wp--custom--line-height--paragraph-medium)">
	<?php
	/* translators: %s: WordPress. */
	printf( esc_html__( 'Proudly powered by %s', 'blockspire' ), '<a href="' . esc_url( __( 'https://wordpress.org/', 'blockspire' ) ) . '" rel="nofollow">WordPress</a>' );
	?>
</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"bottom","width":"416px"} -->
<div class="wp-block-column is-vertically-aligned-bottom" style="flex-basis:416px"><!-- wp:group {"className":"is-style-newsletter-boxed","style":{"spacing":{"blockGap":"var:preset|spacing|16"}},"layout":{"type":"default"}} -->
<div class="wp-block-group is-style-newsletter-boxed"><!-- wp:paragraph {"style":{"typography":{"lineHeight":"var:custom|line-height|paragraph-small"}},"textColor":"text-white","fontSize":"small-paragraph"} -->
<p class="has-text-white-color has-text-color has-small-paragraph-font-size" style="line-height:var(--wp--custom--line-height--paragraph-small)"><?php echo esc_html__( 'Subscribe newsletter', 'blockspire' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:mailchimp-for-wp/form /--></div>
<!-- /wp:group --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->
<?php else : ?>
<!-- wp:paragraph {"style":{"typography":{"lineHeight":"var:custom|line-height|paragraph-medium"}},"textColor":"text-white","fontSize":"medium-paragraph"} -->
<p class="has-text-white-color has-text-color has-medium-paragraph-font-size" style="line-height:var(--wp--custom--line-height--paragraph-medium)">
	<?php
	/* translators: %s: WordPress. */
	printf( esc_html__( 'Proudly powered by %s', 'blockspire' ), '<a href="' . esc_url( __( 'https://wordpress.org/', 'blockspire' ) ) . '" rel="nofollow">WordPress</a>' );
	?>
</p>
<!-- /wp:paragraph -->
<?php endif; ?>
</div>
<!-- /wp:group --></footer>
<!-- /wp:group -->
