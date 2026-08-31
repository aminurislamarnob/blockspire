<?php
/**
 * Title: Statistics row between rules
 * Slug: blockspire/stats-inline
 * Categories: blockspire-features, blockspire-pages
 * Description: Four large figures with short labels in a single row, held between two hairline rules, for milestones on a light section.
 * Keywords: stats, numbers, figures, facts, milestones
 * Viewport Width: 1600
 *
 * @package Blockspire
 * @since 1.0.0
 */

$blockspire_facts = array(
	array(
		'figure' => __( '10+', 'blockspire' ),
		'label'  => __( 'Years of experience', 'blockspire' ),
	),
	array(
		'figure' => __( '230+', 'blockspire' ),
		'label'  => __( 'Active customers', 'blockspire' ),
	),
	array(
		'figure' => __( '60+', 'blockspire' ),
		'label'  => __( 'Team members', 'blockspire' ),
	),
	array(
		'figure' => __( '500+', 'blockspire' ),
		'label'  => __( 'Companies trusted us', 'blockspire' ),
	),
);

?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"}}},"layout":{"type":"constrained","contentSize":"1170px"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--60)"><!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40"}},"border":{"top":{"color":"var:preset|color|gray-03","width":"1px"},"bottom":{"color":"var:preset|color|gray-03","width":"1px"}}},"layout":{"type":"default"}} -->
<div class="wp-block-group" style="border-top-color:var(--wp--preset--color--gray-03);border-top-width:1px;border-bottom-color:var(--wp--preset--color--gray-03);border-bottom-width:1px;padding-top:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40)"><!-- wp:columns {"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|32","left":"var:preset|spacing|40"}}}} -->
<div class="wp-block-columns">
<?php foreach ( $blockspire_facts as $blockspire_fact ) : ?>
<!-- wp:column {"style":{"spacing":{"blockGap":"var:preset|spacing|10"}},"layout":{"type":"default"}} -->
<div class="wp-block-column"><!-- wp:paragraph {"className":"is-style-counter","style":{"typography":{"fontWeight":"700","lineHeight":"var:custom|line-height|heading-04"}},"textColor":"heading-color","fontSize":"heading-04"} -->
<p class="is-style-counter has-heading-color-color has-text-color has-heading-04-font-size" style="font-weight:700;line-height:var(--wp--custom--line-height--heading-04)"><?php echo esc_html( $blockspire_fact['figure'] ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"style":{"typography":{"lineHeight":"var:custom|line-height|paragraph-medium"}},"textColor":"text-color","fontSize":"medium-paragraph"} -->
<p class="has-text-color-color has-text-color has-medium-paragraph-font-size" style="line-height:var(--wp--custom--line-height--paragraph-medium)"><?php echo esc_html( $blockspire_fact['label'] ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->
<?php endforeach; ?>
</div>
<!-- /wp:columns --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->
