<?php
/**
 * Title: Minimal footer
 * Slug: blockspire/footer-minimal
 * Categories: footer
 * Block Types: core/template-part/footer
 * Description: A single quiet row with the site credit, for checkout and other focused pages.
 * Keywords: footer, minimal, credit, simple
 * Viewport Width: 1600
 *
 * @package Blockspire
 * @since 1.0.0
 */

?>
<!-- wp:group {"tagName":"footer","align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40"}},"border":{"top":{"color":"var:preset|color|gray-03","width":"1px"}}},"layout":{"type":"constrained","contentSize":"1170px"}} -->
<footer class="wp-block-group alignfull" style="border-top-color:var(--wp--preset--color--gray-03);border-top-width:1px;padding-top:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40)"><!-- wp:paragraph {"align":"center","textColor":"text-color","fontSize":"small-paragraph"} -->
<p class="has-text-align-center has-text-color-color has-text-color has-small-paragraph-font-size">
	<?php
	/* translators: %s: WordPress. */
	printf( esc_html__( 'Proudly powered by %s', 'blockspire' ), '<a href="' . esc_url( __( 'https://wordpress.org/', 'blockspire' ) ) . '" rel="nofollow">WordPress</a>' );
	?>
</p>
<!-- /wp:paragraph --></footer>
<!-- /wp:group -->
