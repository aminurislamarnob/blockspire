<?php
/**
 * Title: Values in three columns
 * Slug: blockspire/values
 * Categories: blockspire-features, blockspire-pages
 * Description: Three short statements of what the business stands for, each above a rule, with no icons to distract.
 * Keywords: values, principles, beliefs, culture, about
 * Viewport Width: 1600
 *
 * @package Blockspire
 * @since 1.0.0
 */

$blockspire_values = array(
	array(
		'title' => __( 'Say it plainly', 'blockspire' ),
		'text'  => __( 'No jargon, no padding. If something will take longer or cost more, you hear it from us first rather than finding out later.', 'blockspire' ),
	),
	array(
		'title' => __( 'Build to last', 'blockspire' ),
		'text'  => __( 'We would rather spend an extra day on the foundations than hand over something that needs rescuing in six months.', 'blockspire' ),
	),
	array(
		'title' => __( 'Stay involved', 'blockspire' ),
		'text'  => __( 'Launch is a milestone, not an exit. The people who built your site are the people who answer when you write in.', 'blockspire' ),
	),
);

?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|80","bottom":"var:preset|spacing|100"},"blockGap":"var:preset|spacing|48"}},"layout":{"type":"constrained","contentSize":"1170px"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--80);padding-bottom:var(--wp--preset--spacing--100)"><!-- wp:heading {"style":{"typography":{"lineHeight":"var:custom|line-height|heading-04"}},"fontSize":"heading-04"} -->
<h2 class="wp-block-heading has-heading-04-font-size" style="line-height:var(--wp--custom--line-height--heading-04)"><?php echo esc_html__( 'Our values', 'blockspire' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:columns {"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|40","left":"var:preset|spacing|70"}}}} -->
<div class="wp-block-columns">
<?php foreach ( $blockspire_values as $blockspire_value ) : ?>
<!-- wp:column {"style":{"spacing":{"blockGap":"var:preset|spacing|16","padding":{"top":"var:preset|spacing|24"}},"border":{"top":{"color":"var:preset|color|heading-color","width":"2px"}}},"layout":{"type":"default"}} -->
<div class="wp-block-column" style="border-top-color:var(--wp--preset--color--heading-color);border-top-width:2px;padding-top:var(--wp--preset--spacing--24)"><!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"700","lineHeight":"var:custom|line-height|title-large"}},"fontSize":"large-title"} -->
<h3 class="wp-block-heading has-large-title-font-size" style="font-weight:700;line-height:var(--wp--custom--line-height--title-large)"><?php echo esc_html( $blockspire_value['title'] ); ?></h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"typography":{"lineHeight":"var:custom|line-height|paragraph-medium"}},"textColor":"text-color","fontSize":"medium-paragraph"} -->
<p class="has-text-color-color has-text-color has-medium-paragraph-font-size" style="line-height:var(--wp--custom--line-height--paragraph-medium)"><?php echo esc_html( $blockspire_value['text'] ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->
<?php endforeach; ?>
</div>
<!-- /wp:columns --></div>
<!-- /wp:group -->
