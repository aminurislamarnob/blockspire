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
<!-- wp:group {"className":"is-style-catalog-toolbar","style":{"spacing":{"blockGap":"var:preset|spacing|20","margin":{"bottom":"var:preset|spacing|32"}}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between","verticalAlignment":"center"}} -->
<div class="wp-block-group is-style-catalog-toolbar" style="margin-bottom:var(--wp--preset--spacing--32)"><!-- wp:woocommerce/product-results-count {"textColor":"text-color","fontSize":"small-paragraph"} /-->

<!-- wp:woocommerce/catalog-sorting {"fontSize":"small-paragraph"} /--></div>
<!-- /wp:group -->

<!-- wp:woocommerce/product-collection {"queryId":0,"query":{"woocommerceAttributes":[],"woocommerceStockStatus":["instock","outofstock","onbackorder"],"taxQuery":{},"isProductCollectionBlock":true,"perPage":12,"pages":0,"offset":0,"postType":"product","order":"asc","orderBy":"title","author":"","search":"","exclude":[],"sticky":"","inherit":true,"filterable":true},"tagName":"div","dimensions":{"widthType":"fill","fixedWidth":""},"displayLayout":{"type":"flex","columns":3,"shrinkColumns":true},"convertedFromProducts":false,"queryContextIncludes":["collection"],"className":"is-style-product-cards"} -->
<div class="wp-block-woocommerce-product-collection is-style-product-cards"><!-- wp:woocommerce/product-template -->
<!-- wp:pattern {"slug":"blockspire/product-card"} /-->
<!-- /wp:woocommerce/product-template -->

<!-- wp:query-pagination {"style":{"spacing":{"margin":{"top":"var:preset|spacing|70"}}},"layout":{"type":"flex","justifyContent":"center"}} -->
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
