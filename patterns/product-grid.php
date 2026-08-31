<?php
/**
 * Title: Product grid
 * Slug: blockspire/product-grid
 * Categories: blockspire-shop
 * Inserter: no
 * Description: The catalog toolbar above a three column product grid, with pagination and an empty state.
 * Keywords: shop, products, catalog, grid, woocommerce
 *
 * @package Blockspire
 * @since 1.0.0
 */

?>
<!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|20","padding":{"bottom":"var:preset|spacing|20"}},"border":{"bottom":{"color":"var:preset|color|gray-03","width":"1px"}}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between","verticalAlignment":"center"}} -->
<div class="wp-block-group alignwide" style="border-bottom-color:var(--wp--preset--color--gray-03);border-bottom-width:1px;padding-bottom:var(--wp--preset--spacing--20)"><!-- wp:woocommerce/product-results-count {"textColor":"text-color","fontSize":"small-paragraph"} /-->

<!-- wp:woocommerce/catalog-sorting {"fontSize":"small-paragraph"} /--></div>
<!-- /wp:group -->

<!-- wp:woocommerce/product-collection {"queryId":0,"query":{"woocommerceAttributes":[],"woocommerceStockStatus":["instock","outofstock","onbackorder"],"taxQuery":{},"isProductCollectionBlock":true,"perPage":12,"pages":0,"offset":0,"postType":"product","order":"asc","orderBy":"title","author":"","search":"","exclude":[],"sticky":"","inherit":true},"tagName":"div","dimensions":{"widthType":"fill","fixedWidth":""},"displayLayout":{"type":"flex","columns":3,"shrinkColumns":true},"convertedFromProducts":false,"queryContextIncludes":["collection"],"align":"wide"} -->
<div class="wp-block-woocommerce-product-collection alignwide"><!-- wp:woocommerce/product-template -->
<!-- wp:woocommerce/product-image {"imageSizing":"thumbnail","isDescendentOfQueryLoop":true} -->
<!-- wp:woocommerce/product-sale-badge {"isDescendentOfQueryLoop":true,"align":"right"} /-->
<!-- /wp:woocommerce/product-image -->

<!-- wp:post-title {"level":3,"isLink":true,"style":{"typography":{"fontWeight":"700","lineHeight":"1.3"},"spacing":{"margin":{"top":"var:preset|spacing|20","bottom":"var:preset|spacing|10"}}},"fontSize":"medium-title","__woocommerceNamespace":"woocommerce/product-collection/product-title"} /-->

<!-- wp:woocommerce/product-price {"isDescendentOfQueryLoop":true,"textColor":"heading-color","style":{"typography":{"fontWeight":"700","lineHeight":"1.75"},"spacing":{"margin":{"bottom":"var:preset|spacing|20"}}},"fontSize":"medium-paragraph"} /-->

<!-- wp:woocommerce/product-button {"isDescendentOfQueryLoop":true,"fontSize":"button-large"} /-->
<!-- /wp:woocommerce/product-template -->

<!-- wp:query-pagination {"style":{"spacing":{"margin":{"top":"var:preset|spacing|70"}}},"layout":{"type":"flex","justifyContent":"space-between"}} -->
<!-- wp:query-pagination-previous /-->

<!-- wp:query-pagination-numbers /-->

<!-- wp:query-pagination-next /-->
<!-- /wp:query-pagination -->

<!-- wp:woocommerce/product-collection-no-results -->
<!-- wp:paragraph {"fontSize":"medium-paragraph"} -->
<p class="has-medium-paragraph-font-size"><?php echo esc_html__( 'No products matched your selection. Try a different filter, or browse the whole shop.', 'blockspire' ); ?></p>
<!-- /wp:paragraph -->
<!-- /wp:woocommerce/product-collection-no-results --></div>
<!-- /wp:woocommerce/product-collection -->
