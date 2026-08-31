<?php
/**
 * Title: Related products
 * Slug: blockspire/product-related
 * Categories: blockspire-shop
 * Inserter: no
 * Description: A four column strip of products from the same categories or tags, for the end of a product page.
 * Keywords: related, products, cross sell, woocommerce
 *
 * @package Blockspire
 * @since 1.0.0
 */

?>
<!-- wp:woocommerce/product-collection {"queryId":0,"query":{"perPage":4,"pages":1,"offset":0,"postType":"product","order":"asc","orderBy":"title","search":"","exclude":[],"inherit":false,"taxQuery":{},"isProductCollectionBlock":true,"featured":false,"woocommerceOnSale":false,"woocommerceStockStatus":["instock","onbackorder"],"woocommerceAttributes":[],"woocommerceHandPickedProducts":[],"filterable":false,"relatedBy":{"categories":true,"tags":true}},"tagName":"div","displayLayout":{"type":"flex","columns":4,"shrinkColumns":true},"dimensions":{"widthType":"fill"},"collection":"woocommerce/product-collection/related","hideControls":["inherit"],"queryContextIncludes":["collection"],"align":"wide"} -->
<div class="wp-block-woocommerce-product-collection alignwide"><!-- wp:heading {"level":2,"style":{"typography":{"lineHeight":"var:custom|line-height|heading-06"},"spacing":{"margin":{"top":"0","bottom":"var:preset|spacing|40"}}},"fontSize":"heading-06"} -->
<h2 class="wp-block-heading has-heading-06-font-size" style="margin-top:0;margin-bottom:var(--wp--preset--spacing--40);line-height:var(--wp--custom--line-height--heading-06)"><?php echo esc_html__( 'Related products', 'blockspire' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:woocommerce/product-template -->
<!-- wp:woocommerce/product-image {"imageSizing":"thumbnail","isDescendentOfQueryLoop":true} -->
<!-- wp:woocommerce/product-sale-badge {"isDescendentOfQueryLoop":true,"align":"right"} /-->
<!-- /wp:woocommerce/product-image -->

<!-- wp:post-title {"level":3,"isLink":true,"style":{"typography":{"fontWeight":"700","lineHeight":"1.625"},"spacing":{"margin":{"top":"var:preset|spacing|16","bottom":"var:preset|spacing|10"}}},"fontSize":"medium-paragraph","__woocommerceNamespace":"woocommerce/product-collection/product-title"} /-->

<!-- wp:woocommerce/product-price {"isDescendentOfQueryLoop":true,"textColor":"heading-color","style":{"typography":{"fontWeight":"700","lineHeight":"1.571"}},"fontSize":"small-paragraph"} /-->
<!-- /wp:woocommerce/product-template --></div>
<!-- /wp:woocommerce/product-collection -->
