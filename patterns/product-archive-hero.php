<?php
/**
 * Title: Shop hero
 * Slug: blockspire/product-archive-hero
 * Categories: blockspire-shop
 * Inserter: no
 * Description: A rounded dark banner carrying the archive title above a centred breadcrumb trail.
 * Keywords: shop, hero, banner, breadcrumb, woocommerce
 *
 * @package Blockspire
 * @since 1.0.0
 */

?>
<!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|16","padding":{"top":"var:preset|spacing|100","bottom":"var:preset|spacing|100","left":"var:preset|spacing|fluid-inset","right":"var:preset|spacing|fluid-inset"}},"border":{"radius":"12px"},"background":{"backgroundImage":{"url":"<?php echo esc_url( get_theme_file_uri( 'assets/images/dot-grid.svg' ) ); ?>"},"backgroundSize":"30px","backgroundRepeat":"repeat","backgroundPosition":"0 0"},"elements":{"link":{"color":{"text":"var:preset|color|text-white"}}}},"backgroundColor":"secondary","textColor":"text-white","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignwide has-text-white-color has-secondary-background-color has-text-color has-background has-link-color" style="border-radius:12px;padding-top:var(--wp--preset--spacing--100);padding-right:var(--wp--preset--spacing--fluid-inset);padding-bottom:var(--wp--preset--spacing--100);padding-left:var(--wp--preset--spacing--fluid-inset)"><!-- wp:query-title {"type":"archive","showPrefix":false,"textAlign":"center","style":{"typography":{"lineHeight":"1.067"}},"textColor":"text-white","fontSize":"heading-03"} /-->

<!-- wp:woocommerce/breadcrumbs {"contentJustification":"center","className":"is-style-breadcrumb-caps-center","textColor":"text-white","fontSize":"small-paragraph"} /--></div>
<!-- /wp:group -->
