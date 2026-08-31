<?php
/**
 * Title: Shop filters
 * Slug: blockspire/product-filters
 * Categories: blockspire-shop
 * Inserter: no
 * Description: The catalog sidebar: a price slider, category checkboxes, colour options and stock status.
 * Keywords: filters, shop, sidebar, price, category, woocommerce
 *
 * @package Blockspire
 * @since 1.0.0
 *
 * Each filter block wraps a heading plus a display block, which is the scaffold
 * WooCommerce's editor inserts. The wrapper markup is what those blocks' save()
 * functions emit, so the display blocks carry an empty div rather than being
 * written self-closing; a self-closing comment fails editor validation.
 */

$blockspire_colour_attribute = function_exists( 'wc_attribute_taxonomy_id_by_name' ) ? wc_attribute_taxonomy_id_by_name( 'color' ) : 0;
?>
<!-- wp:woocommerce/product-filters {"showFilterDrawer":true,"style":{"spacing":{"blockGap":"var:preset|spacing|40"}}} -->
<div class="wp-block-woocommerce-product-filters wc-block-product-filters"><!-- wp:woocommerce/product-filter-price -->
<div class="wp-block-woocommerce-product-filter-price"><!-- wp:heading {"level":3,"style":{"typography":{"lineHeight":"var:custom|line-height|title-medium"},"spacing":{"margin":{"top":"0","bottom":"var:preset|spacing|16"}}},"fontSize":"medium-title"} -->
<h3 class="wp-block-heading has-medium-title-font-size" style="margin-top:0;margin-bottom:var(--wp--preset--spacing--16);line-height:var(--wp--custom--line-height--title-medium)"><?php echo esc_html__( 'Filter by price', 'blockspire' ); ?></h3>
<!-- /wp:heading -->

<!-- wp:woocommerce/product-filter-price-slider {"showInputFields":false} -->
<div class="wp-block-woocommerce-product-filter-price-slider wc-block-product-filter-price-slider"></div>
<!-- /wp:woocommerce/product-filter-price-slider --></div>
<!-- /wp:woocommerce/product-filter-price -->

<!-- wp:woocommerce/product-filter-taxonomy {"taxonomy":"product_cat","showCounts":true,"displayStyle":"woocommerce/product-filter-checkbox-list"} -->
<div class="wp-block-woocommerce-product-filter-taxonomy"><!-- wp:heading {"level":3,"style":{"typography":{"lineHeight":"var:custom|line-height|title-medium"},"spacing":{"margin":{"top":"0","bottom":"var:preset|spacing|16"}}},"fontSize":"medium-title"} -->
<h3 class="wp-block-heading has-medium-title-font-size" style="margin-top:0;margin-bottom:var(--wp--preset--spacing--16);line-height:var(--wp--custom--line-height--title-medium)"><?php echo esc_html__( 'Filter by category', 'blockspire' ); ?></h3>
<!-- /wp:heading -->

<!-- wp:woocommerce/product-filter-checkbox-list -->
<div class="wp-block-woocommerce-product-filter-checkbox-list wc-block-product-filter-checkbox-list"></div>
<!-- /wp:woocommerce/product-filter-checkbox-list --></div>
<!-- /wp:woocommerce/product-filter-taxonomy -->
<?php if ( $blockspire_colour_attribute ) : ?>
<!-- wp:woocommerce/product-filter-attribute {"attributeId":<?php echo (int) $blockspire_colour_attribute; ?>,"showCounts":true,"displayStyle":"woocommerce/product-filter-checkbox-list"} -->
<div class="wp-block-woocommerce-product-filter-attribute"><!-- wp:heading {"level":3,"style":{"typography":{"lineHeight":"var:custom|line-height|title-medium"},"spacing":{"margin":{"top":"0","bottom":"var:preset|spacing|16"}}},"fontSize":"medium-title"} -->
<h3 class="wp-block-heading has-medium-title-font-size" style="margin-top:0;margin-bottom:var(--wp--preset--spacing--16);line-height:var(--wp--custom--line-height--title-medium)"><?php echo esc_html__( 'Filter by colour', 'blockspire' ); ?></h3>
<!-- /wp:heading -->

<!-- wp:woocommerce/product-filter-checkbox-list -->
<div class="wp-block-woocommerce-product-filter-checkbox-list wc-block-product-filter-checkbox-list"></div>
<!-- /wp:woocommerce/product-filter-checkbox-list --></div>
<!-- /wp:woocommerce/product-filter-attribute -->
<?php endif; ?>
<!-- wp:woocommerce/product-filter-status {"showCounts":true,"displayStyle":"woocommerce/product-filter-checkbox-list"} -->
<div class="wp-block-woocommerce-product-filter-status"><!-- wp:heading {"level":3,"style":{"typography":{"lineHeight":"var:custom|line-height|title-medium"},"spacing":{"margin":{"top":"0","bottom":"var:preset|spacing|16"}}},"fontSize":"medium-title"} -->
<h3 class="wp-block-heading has-medium-title-font-size" style="margin-top:0;margin-bottom:var(--wp--preset--spacing--16);line-height:var(--wp--custom--line-height--title-medium)"><?php echo esc_html__( 'Availability', 'blockspire' ); ?></h3>
<!-- /wp:heading -->

<!-- wp:woocommerce/product-filter-checkbox-list -->
<div class="wp-block-woocommerce-product-filter-checkbox-list wc-block-product-filter-checkbox-list"></div>
<!-- /wp:woocommerce/product-filter-checkbox-list --></div>
<!-- /wp:woocommerce/product-filter-status --></div>
<!-- /wp:woocommerce/product-filters -->
