<?php
/**
 * Title: Header with logo, navigation and call to action
 * Slug: blockspire/header
 * Categories: header
 * Block Types: core/template-part/header
 * Description: The site logo beside the primary navigation and a rounded call to action button.
 * Keywords: header, navigation, menu, logo
 * Viewport Width: 1600
 *
 * @package Blockspire
 * @since 1.0.0
 */

?>
<!-- wp:group {"tagName":"header","align":"full","style":{"spacing":{"padding":{"top":"22px","bottom":"22px"}}},"backgroundColor":"main-bg","layout":{"type":"constrained","contentSize":"1170px"}} -->
<header class="wp-block-group alignfull has-main-bg-background-color has-background" style="padding-top:22px;padding-bottom:22px"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|32"}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between","verticalAlignment":"center"}} -->
<div class="wp-block-group"><!-- wp:group {"style":{"spacing":{"blockGap":"6px"}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
<div class="wp-block-group"><!-- wp:site-logo {"width":165} /--></div>
<!-- /wp:group -->

<!-- wp:navigation {"textColor":"link-color","overlayBackgroundColor":"main-bg","overlayTextColor":"link-color","style":{"spacing":{"blockGap":"var:preset|spacing|32"}},"fontSize":"button-large"} /-->

<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"textColor":"link-color","layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
<div class="wp-block-group has-link-color-color has-text-color">
<?php if ( class_exists( 'WooCommerce' ) ) : ?>
<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|8"}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
<div class="wp-block-group"><!-- wp:woocommerce/customer-account {"displayStyle":"icon_only","iconStyle":"line","iconClass":"wc-block-customer-account__account-icon","fontSize":"button-large"} /-->

<!-- wp:woocommerce/mini-cart {"hasHiddenPrice":true,"fontSize":"button-large"} /--></div>
<!-- /wp:group -->
<?php endif; ?>
<!-- wp:buttons {"className":"blockspire-header-cta"} -->
<div class="wp-block-buttons blockspire-header-cta"><!-- wp:button {"className":"is-style-rounded"} -->
<div class="wp-block-button is-style-rounded"><a class="wp-block-button__link wp-element-button" href="#"><?php echo esc_html__( 'Start A Project', 'blockspire' ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></header>
<!-- /wp:group -->
