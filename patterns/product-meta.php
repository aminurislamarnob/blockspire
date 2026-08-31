<?php
/**
 * Title: Product meta
 * Slug: blockspire/product-meta
 * Categories: blockspire-shop
 * Inserter: no
 * Description: The SKU, categories and tags shown under the add to cart form on a product page.
 * Keywords: product, meta, sku, category, tag, woocommerce
 *
 * @package Blockspire
 * @since 1.0.0
 */

?>
<!-- wp:woocommerce/product-meta -->
<div class="wp-block-woocommerce-product-meta"><!-- wp:group {"className":"is-style-product-meta","style":{"spacing":{"blockGap":"var:preset|spacing|10","padding":{"top":"var:preset|spacing|24"}},"border":{"top":{"color":"var:preset|color|gray-03","width":"1px"}}},"layout":{"type":"default"}} -->
<div class="wp-block-group is-style-product-meta" style="border-top-color:var(--wp--preset--color--gray-03);border-top-width:1px;padding-top:var(--wp--preset--spacing--24)"><!-- wp:woocommerce/product-sku {"prefix":"<?php echo esc_attr__( 'SKU:', 'blockspire' ); ?>","textColor":"text-color","fontSize":"small-paragraph"} /-->

<!-- wp:post-terms {"term":"product_cat","prefix":"<?php echo esc_attr__( 'Category: ', 'blockspire' ); ?>","textColor":"text-color","fontSize":"small-paragraph"} /-->

<!-- wp:post-terms {"term":"product_tag","prefix":"<?php echo esc_attr__( 'Tags: ', 'blockspire' ); ?>","textColor":"text-color","fontSize":"small-paragraph"} /--></div>
<!-- /wp:group --></div>
<!-- /wp:woocommerce/product-meta -->
