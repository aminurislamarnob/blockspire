<?php
/**
 * Title: Testimonials in three columns
 * Slug: blockspire/testimonials
 * Categories: blockspire-testimonials
 * Description: Three bordered quote cards, each with a short testimonial and the name and role of the person who gave it.
 * Keywords: testimonials, quotes, reviews, clients, social proof
 * Viewport Width: 1600
 *
 * @package Blockspire
 * @since 1.0.0
 */

$blockspire_testimonials = array(
	array(
		'quote' => __( 'They asked better questions than anyone else we spoke to, and the build reflected that. We launched a fortnight early.', 'blockspire' ),
		'name'  => __( 'Priya Raman', 'blockspire' ),
		'role'  => __( 'Operations Lead, Northwind', 'blockspire' ),
	),
	array(
		'quote' => __( 'The estimate held, the scope held, and nothing arrived as a surprise. That is rarer than it should be.', 'blockspire' ),
		'name'  => __( 'Tomas Lindqvist', 'blockspire' ),
		'role'  => __( 'Founder, Fieldnote', 'blockspire' ),
	),
	array(
		'quote' => __( 'Six months after launch they still answer within the day. The support is the part we value most.', 'blockspire' ),
		'name'  => __( 'Amara Okafor', 'blockspire' ),
		'role'  => __( 'Marketing Director, Baseline', 'blockspire' ),
	),
);

?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|80","bottom":"var:preset|spacing|100"},"blockGap":"var:preset|spacing|48"}},"layout":{"type":"constrained","contentSize":"1170px"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--80);padding-bottom:var(--wp--preset--spacing--100)"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|24"}},"layout":{"type":"constrained","contentSize":"670px"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"align":"center","style":{"typography":{"fontWeight":"700","lineHeight":"var:custom|line-height|title-medium"}},"textColor":"gray-02","fontSize":"medium-title"} -->
<p class="has-text-align-center has-gray-02-color has-text-color has-medium-title-font-size" style="font-weight:700;line-height:var(--wp--custom--line-height--title-medium)"><?php echo esc_html__( 'Testimonials', 'blockspire' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"textAlign":"center","style":{"typography":{"lineHeight":"var:custom|line-height|heading-03"}},"fontSize":"heading-03"} -->
<h2 class="wp-block-heading has-text-align-center has-heading-03-font-size" style="line-height:var(--wp--custom--line-height--heading-03)"><?php echo esc_html__( 'What people say', 'blockspire' ); ?></h2>
<!-- /wp:heading --></div>
<!-- /wp:group -->

<!-- wp:columns {"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|30","left":"var:preset|spacing|30"}}}} -->
<div class="wp-block-columns">
<?php foreach ( $blockspire_testimonials as $blockspire_testimonial ) : ?>
<!-- wp:column {"style":{"spacing":{"padding":{"top":"var:preset|spacing|32","right":"var:preset|spacing|32","bottom":"var:preset|spacing|32","left":"var:preset|spacing|32"},"blockGap":"var:preset|spacing|24"},"border":{"color":"var:preset|color|gray-03","width":"1px","radius":"8px"}},"layout":{"type":"default"}} -->
<div class="wp-block-column has-border-color" style="border-color:var(--wp--preset--color--gray-03);border-width:1px;border-radius:8px;padding-top:var(--wp--preset--spacing--32);padding-right:var(--wp--preset--spacing--32);padding-bottom:var(--wp--preset--spacing--32);padding-left:var(--wp--preset--spacing--32)"><!-- wp:paragraph {"style":{"typography":{"lineHeight":"var:custom|line-height|paragraph-medium"}},"fontSize":"medium-paragraph"} -->
<p class="has-medium-paragraph-font-size" style="line-height:var(--wp--custom--line-height--paragraph-medium)"><?php echo esc_html( $blockspire_testimonial['quote'] ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:group {"style":{"spacing":{"blockGap":"0","padding":{"top":"var:preset|spacing|20"}},"border":{"top":{"color":"var:preset|color|gray-03","width":"1px"}}},"layout":{"type":"default"}} -->
<div class="wp-block-group" style="border-top-color:var(--wp--preset--color--gray-03);border-top-width:1px;padding-top:var(--wp--preset--spacing--20)"><!-- wp:paragraph {"style":{"typography":{"fontWeight":"700","lineHeight":"var:custom|line-height|paragraph-medium"}},"fontSize":"medium-paragraph"} -->
<p class="has-medium-paragraph-font-size" style="font-weight:700;line-height:var(--wp--custom--line-height--paragraph-medium)"><?php echo esc_html( $blockspire_testimonial['name'] ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"style":{"typography":{"lineHeight":"var:custom|line-height|paragraph-small"}},"textColor":"text-color","fontSize":"small-paragraph"} -->
<p class="has-text-color-color has-text-color has-small-paragraph-font-size" style="line-height:var(--wp--custom--line-height--paragraph-small)"><?php echo esc_html( $blockspire_testimonial['role'] ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->
<?php endforeach; ?>
</div>
<!-- /wp:columns --></div>
<!-- /wp:group -->
