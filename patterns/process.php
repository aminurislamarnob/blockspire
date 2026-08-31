<?php
/**
 * Title: Numbered process steps
 * Slug: blockspire/process
 * Categories: blockspire-features
 * Description: Four numbered steps explaining how you work, from first conversation through to launch and support.
 * Keywords: process, steps, how it works, method, workflow
 * Viewport Width: 1600
 *
 * @package Blockspire
 * @since 1.0.0
 */

$blockspire_steps = array(
	array(
		'number' => __( '01', 'blockspire' ),
		'title'  => __( 'Discover', 'blockspire' ),
		'text'   => __( 'We start by listening. What the business needs, who it serves and what success actually looks like.', 'blockspire' ),
	),
	array(
		'number' => __( '02', 'blockspire' ),
		'title'  => __( 'Plan', 'blockspire' ),
		'text'   => __( 'A clear scope, a realistic timeline and a written estimate, agreed before any code is written.', 'blockspire' ),
	),
	array(
		'number' => __( '03', 'blockspire' ),
		'title'  => __( 'Build', 'blockspire' ),
		'text'   => __( 'Short cycles with something to look at each time, so you are never waiting in the dark.', 'blockspire' ),
	),
	array(
		'number' => __( '04', 'blockspire' ),
		'title'  => __( 'Launch and support', 'blockspire' ),
		'text'   => __( 'We ship it, watch it settle, and stay available for the changes that follow.', 'blockspire' ),
	),
);

?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|80","bottom":"var:preset|spacing|100"},"blockGap":"var:preset|spacing|48"}},"layout":{"type":"constrained","contentSize":"1170px"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--80);padding-bottom:var(--wp--preset--spacing--100)"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|24"}},"layout":{"type":"constrained","contentSize":"670px"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"align":"center","style":{"typography":{"fontWeight":"700","lineHeight":"var:custom|line-height|title-medium"}},"textColor":"gray-02","fontSize":"medium-title"} -->
<p class="has-text-align-center has-gray-02-color has-text-color has-medium-title-font-size" style="font-weight:700;line-height:var(--wp--custom--line-height--title-medium)"><?php echo esc_html__( 'How we work', 'blockspire' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"textAlign":"center","style":{"typography":{"lineHeight":"var:custom|line-height|heading-03"}},"fontSize":"heading-03"} -->
<h2 class="wp-block-heading has-text-align-center has-heading-03-font-size" style="line-height:var(--wp--custom--line-height--heading-03)"><?php echo esc_html__( 'A simple way of working', 'blockspire' ); ?></h2>
<!-- /wp:heading --></div>
<!-- /wp:group -->

<!-- wp:columns {"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|40","left":"var:preset|spacing|30"}}}} -->
<div class="wp-block-columns">
<?php foreach ( $blockspire_steps as $blockspire_step ) : ?>
<!-- wp:column {"style":{"spacing":{"blockGap":"var:preset|spacing|16","padding":{"top":"var:preset|spacing|24"}},"border":{"top":{"color":"var:preset|color|gray-03","width":"2px"}}},"layout":{"type":"default"}} -->
<div class="wp-block-column" style="border-top-color:var(--wp--preset--color--gray-03);border-top-width:2px;padding-top:var(--wp--preset--spacing--24)"><!-- wp:paragraph {"style":{"typography":{"fontWeight":"700","lineHeight":"1.2"}},"textColor":"primary","fontSize":"large-title"} -->
<p class="has-primary-color has-text-color has-large-title-font-size" style="font-weight:700;line-height:1.2"><?php echo esc_html( $blockspire_step['number'] ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"700","lineHeight":"var:custom|line-height|title-medium"}},"fontSize":"medium-title"} -->
<h3 class="wp-block-heading has-medium-title-font-size" style="font-weight:700;line-height:var(--wp--custom--line-height--title-medium)"><?php echo esc_html( $blockspire_step['title'] ); ?></h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"typography":{"lineHeight":"var:custom|line-height|paragraph-small"}},"textColor":"text-color","fontSize":"small-paragraph"} -->
<p class="has-text-color-color has-text-color has-small-paragraph-font-size" style="line-height:var(--wp--custom--line-height--paragraph-small)"><?php echo esc_html( $blockspire_step['text'] ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->
<?php endforeach; ?>
</div>
<!-- /wp:columns --></div>
<!-- /wp:group -->
