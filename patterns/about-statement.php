<?php
/**
 * Title: About statement with figures
 * Slug: blockspire/about-statement
 * Categories: blockspire-pages
 * Description: One large statement paragraph followed by a row of supporting figures, for opening an about page.
 * Keywords: about, statement, intro, figures, company
 * Viewport Width: 1600
 *
 * @package Blockspire
 * @since 1.0.0
 */

$blockspire_figures = array(
	array(
		'figure' => __( '2011', 'blockspire' ),
		'label'  => __( 'Year we started', 'blockspire' ),
	),
	array(
		'figure' => __( '31', 'blockspire' ),
		'label'  => __( 'Countries worked in', 'blockspire' ),
	),
	array(
		'figure' => __( '96%', 'blockspire' ),
		'label'  => __( 'Clients who come back', 'blockspire' ),
	),
);

?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|80","bottom":"var:preset|spacing|100"},"blockGap":"var:preset|spacing|70"}},"layout":{"type":"constrained","contentSize":"1170px"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--80);padding-bottom:var(--wp--preset--spacing--100)"><!-- wp:paragraph {"style":{"typography":{"lineHeight":"var:custom|line-height|heading-06"}},"fontSize":"heading-06"} -->
<p class="has-heading-06-font-size" style="line-height:var(--wp--custom--line-height--heading-06)"><?php echo esc_html__( 'We are a studio of designers and engineers who like the unglamorous parts: the migration nobody wants to touch, the checkout that has to survive a Monday morning, the admin screen a team will use every day for years.', 'blockspire' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:columns {"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|40","left":"var:preset|spacing|70"}}}} -->
<div class="wp-block-columns">
<?php foreach ( $blockspire_figures as $blockspire_figure ) : ?>
<!-- wp:column {"style":{"spacing":{"blockGap":"var:preset|spacing|10","padding":{"top":"var:preset|spacing|24"}},"border":{"top":{"color":"var:preset|color|gray-03","width":"1px"}}},"layout":{"type":"default"}} -->
<div class="wp-block-column" style="border-top-color:var(--wp--preset--color--gray-03);border-top-width:1px;padding-top:var(--wp--preset--spacing--24)"><!-- wp:paragraph {"style":{"typography":{"fontWeight":"700","lineHeight":"var:custom|line-height|heading-05"}},"textColor":"primary","fontSize":"heading-05"} -->
<p class="has-primary-color has-text-color has-heading-05-font-size" style="font-weight:700;line-height:var(--wp--custom--line-height--heading-05)"><?php echo esc_html( $blockspire_figure['figure'] ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"style":{"typography":{"lineHeight":"var:custom|line-height|paragraph-medium"}},"textColor":"text-color","fontSize":"medium-paragraph"} -->
<p class="has-text-color-color has-text-color has-medium-paragraph-font-size" style="line-height:var(--wp--custom--line-height--paragraph-medium)"><?php echo esc_html( $blockspire_figure['label'] ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->
<?php endforeach; ?>
</div>
<!-- /wp:columns --></div>
<!-- /wp:group -->
