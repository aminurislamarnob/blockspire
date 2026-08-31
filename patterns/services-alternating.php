<?php
/**
 * Title: Services as alternating rows
 * Slug: blockspire/services-alternating
 * Categories: blockspire-services
 * Description: Each service gets a full row: a numbered heading and description on one side, a media slot on the other, alternating sides down the page.
 * Keywords: services, alternating, rows, zigzag, detail
 * Viewport Width: 1600
 *
 * @package Blockspire
 * @since 1.0.0
 */

$blockspire_rows = array(
	array(
		'number' => __( '01', 'blockspire' ),
		'title'  => __( 'Design that earns its keep', 'blockspire' ),
		'text'   => __( 'Interfaces built around what people are actually trying to do, tested on real content rather than neat placeholder text.', 'blockspire' ),
	),
	array(
		'number' => __( '02', 'blockspire' ),
		'title'  => __( 'Development you can hand over', 'blockspire' ),
		'text'   => __( 'Readable, documented code on standard foundations, so the next developer to open it is not starting from scratch.', 'blockspire' ),
	),
	array(
		'number' => __( '03', 'blockspire' ),
		'title'  => __( 'Care after the launch', 'blockspire' ),
		'text'   => __( 'Updates, monitoring and a person to write to. The unglamorous part that decides whether a site is still good in two years.', 'blockspire' ),
	),
);

?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|80","bottom":"var:preset|spacing|100"},"blockGap":"var:preset|spacing|80"}},"layout":{"type":"constrained","contentSize":"1170px"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--80);padding-bottom:var(--wp--preset--spacing--100)">
<?php foreach ( $blockspire_rows as $blockspire_index => $blockspire_row ) : ?>
<!-- wp:columns {"verticalAlignment":"center","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|40","left":"var:preset|spacing|80"}}}} -->
<div class="wp-block-columns are-vertically-aligned-center">
	<?php if ( 0 === $blockspire_index % 2 ) : ?>
<!-- wp:column {"verticalAlignment":"center","style":{"spacing":{"blockGap":"var:preset|spacing|16"}}} -->
<div class="wp-block-column is-vertically-aligned-center"><!-- wp:paragraph {"style":{"typography":{"fontWeight":"700","lineHeight":"1.2"}},"textColor":"primary","fontSize":"large-title"} -->
<p class="has-primary-color has-text-color has-large-title-font-size" style="font-weight:700;line-height:1.2"><?php echo esc_html( $blockspire_row['number'] ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":3,"style":{"typography":{"lineHeight":"var:custom|line-height|heading-05"}},"fontSize":"heading-05"} -->
<h3 class="wp-block-heading has-heading-05-font-size" style="line-height:var(--wp--custom--line-height--heading-05)"><?php echo esc_html( $blockspire_row['title'] ); ?></h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"typography":{"lineHeight":"var:custom|line-height|paragraph-medium"}},"textColor":"text-color","fontSize":"medium-paragraph"} -->
<p class="has-text-color-color has-text-color has-medium-paragraph-font-size" style="line-height:var(--wp--custom--line-height--paragraph-medium)"><?php echo esc_html( $blockspire_row['text'] ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center"} -->
<div class="wp-block-column is-vertically-aligned-center"><!-- wp:group {"style":{"dimensions":{"minHeight":"320px"},"border":{"radius":"12px"}},"backgroundColor":"light-bg","layout":{"type":"constrained"}} -->
<div class="wp-block-group has-light-bg-background-color has-background" style="border-radius:12px;min-height:320px"></div>
<!-- /wp:group --></div>
<!-- /wp:column -->
	<?php else : ?>
<!-- wp:column {"verticalAlignment":"center"} -->
<div class="wp-block-column is-vertically-aligned-center"><!-- wp:group {"style":{"dimensions":{"minHeight":"320px"},"border":{"radius":"12px"}},"backgroundColor":"light-bg","layout":{"type":"constrained"}} -->
<div class="wp-block-group has-light-bg-background-color has-background" style="border-radius:12px;min-height:320px"></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","style":{"spacing":{"blockGap":"var:preset|spacing|16"}}} -->
<div class="wp-block-column is-vertically-aligned-center"><!-- wp:paragraph {"style":{"typography":{"fontWeight":"700","lineHeight":"1.2"}},"textColor":"primary","fontSize":"large-title"} -->
<p class="has-primary-color has-text-color has-large-title-font-size" style="font-weight:700;line-height:1.2"><?php echo esc_html( $blockspire_row['number'] ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":3,"style":{"typography":{"lineHeight":"var:custom|line-height|heading-05"}},"fontSize":"heading-05"} -->
<h3 class="wp-block-heading has-heading-05-font-size" style="line-height:var(--wp--custom--line-height--heading-05)"><?php echo esc_html( $blockspire_row['title'] ); ?></h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"typography":{"lineHeight":"var:custom|line-height|paragraph-medium"}},"textColor":"text-color","fontSize":"medium-paragraph"} -->
<p class="has-text-color-color has-text-color has-medium-paragraph-font-size" style="line-height:var(--wp--custom--line-height--paragraph-medium)"><?php echo esc_html( $blockspire_row['text'] ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->
	<?php endif; ?>
</div>
<!-- /wp:columns -->
<?php endforeach; ?>
</div>
<!-- /wp:group -->
