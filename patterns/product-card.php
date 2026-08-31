<?php
/**
 * Title: Product card
 * Slug: blockspire/product-card
 * Categories: blockspire-shop
 * Inserter: no
 * Description: The inside of one product card: square image, centred title, category eyebrow and a split price and add to cart row.
 * Keywords: product, card, tile, thumbnail, woocommerce
 *
 * @package Blockspire
 * @since 1.0.0
 *
 * Shared by the catalog grid and the related products strip so the two never
 * drift apart. It is the inner content of woocommerce/product-template, so it
 * has no wrapper of its own.
 */

?>
<!-- wp:woocommerce/product-image {"imageSizing":"thumbnail","aspectRatio":"1","scale":"cover","saleBadgeAlign":"left","isDescendentOfQueryLoop":true} -->
<!-- wp:woocommerce/product-sale-badge {"isDescendentOfQueryLoop":true,"align":"left"} /-->
<!-- /wp:woocommerce/product-image -->

<!-- wp:post-title {"textAlign":"center","level":3,"isLink":true,"style":{"typography":{"fontWeight":"600","lineHeight":"1.5"},"spacing":{"margin":{"top":"var:preset|spacing|20","bottom":"var:preset|spacing|10"}}},"fontSize":"medium-paragraph","__woocommerceNamespace":"woocommerce/product-collection/product-title"} /-->

<!-- wp:post-terms {"term":"product_cat","textAlign":"center","style":{"typography":{"textTransform":"uppercase","fontWeight":"600","lineHeight":"1.5"},"spacing":{"margin":{"top":"0","bottom":"var:preset|spacing|20"}}},"textColor":"text-color","fontSize":"small-paragraph"} /-->

<!-- wp:group {"className":"is-style-product-card-actions","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center","verticalAlignment":"center"}} -->
<div class="wp-block-group is-style-product-card-actions"><!-- wp:woocommerce/product-price {"isDescendentOfQueryLoop":true,"textColor":"heading-color","style":{"typography":{"fontWeight":"600","lineHeight":"1.75"}},"fontSize":"medium-paragraph"} /-->

<!-- wp:woocommerce/product-button {"isDescendentOfQueryLoop":true,"textAlign":"center","fontSize":"medium-paragraph"} /--></div>
<!-- /wp:group -->
