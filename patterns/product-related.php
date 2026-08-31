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
<!-- wp:woocommerce/product-collection {"queryId":0,"query":{"perPage":4,"pages":1,"offset":0,"postType":"product","order":"asc","orderBy":"title","search":"","exclude":[],"inherit":false,"taxQuery":{},"isProductCollectionBlock":true,"featured":false,"woocommerceOnSale":false,"woocommerceStockStatus":["instock","onbackorder"],"woocommerceAttributes":[],"woocommerceHandPickedProducts":[],"filterable":false,"relatedBy":{"categories":true,"tags":true}},"tagName":"div","displayLayout":{"type":"flex","columns":4,"shrinkColumns":true},"dimensions":{"widthType":"fill"},"collection":"woocommerce/product-collection/related","hideControls":["inherit"],"queryContextIncludes":["collection"],"align":"wide","className":"is-style-product-cards"} -->
<div class="wp-block-woocommerce-product-collection alignwide is-style-product-cards"><!-- wp:heading {"level":2,"style":{"typography":{"lineHeight":"var:custom|line-height|heading-06"},"spacing":{"margin":{"top":"0","bottom":"var:preset|spacing|40"}}},"fontSize":"heading-06"} -->
<h2 class="wp-block-heading has-heading-06-font-size" style="margin-top:0;margin-bottom:var(--wp--preset--spacing--40);line-height:var(--wp--custom--line-height--heading-06)"><?php echo esc_html__( 'Related products', 'blockspire' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:woocommerce/product-template -->
<!-- wp:pattern {"slug":"blockspire/product-card"} /-->
<!-- /wp:woocommerce/product-template --></div>
<!-- /wp:woocommerce/product-collection -->
