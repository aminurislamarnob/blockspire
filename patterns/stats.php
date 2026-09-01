<?php
/**
 * Title: Statistics band
 * Slug: blockspire/stats
 * Categories: blockspire-features
 * Description: Four large figures with short labels on a dark band, for milestones such as clients, projects and years in business.
 * Keywords: stats, numbers, figures, metrics, milestones
 * Viewport Width: 1600
 *
 * @package Blockspire
 * @since 1.0.0
 */

$blockspire_stats = array(
	array(
		'figure' => __( '520k+', 'blockspire' ),
		'label'  => __( 'Businesses served', 'blockspire' ),
	),
	array(
		'figure' => __( '15', 'blockspire' ),
		'label'  => __( 'Years in practice', 'blockspire' ),
	),
	array(
		'figure' => __( '900+', 'blockspire' ),
		'label'  => __( 'Projects delivered', 'blockspire' ),
	),
	array(
		'figure' => __( '140+', 'blockspire' ),
		'label'  => __( 'People on the team', 'blockspire' ),
	),
);

?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|80","bottom":"var:preset|spacing|80","left":"var:preset|spacing|fluid-inset","right":"var:preset|spacing|fluid-inset"}},"background":{"backgroundImage":{"url":"<?php echo esc_url( get_theme_file_uri( 'assets/images/dot-grid.svg' ) ); ?>"},"backgroundSize":"30px","backgroundRepeat":"repeat","backgroundPosition":"0 0"}},"backgroundColor":"secondary","textColor":"text-white","layout":{"type":"constrained","contentSize":"1170px"}} -->
<div class="wp-block-group alignfull has-text-white-color has-secondary-background-color has-text-color has-background" style="padding-top:var(--wp--preset--spacing--80);padding-right:var(--wp--preset--spacing--fluid-inset);padding-bottom:var(--wp--preset--spacing--80);padding-left:var(--wp--preset--spacing--fluid-inset)"><!-- wp:columns {"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|40","left":"var:preset|spacing|40"}}}} -->
<div class="wp-block-columns">
<?php foreach ( $blockspire_stats as $blockspire_stat ) : ?>
<!-- wp:column {"style":{"spacing":{"blockGap":"var:preset|spacing|10"}},"layout":{"type":"default"}} -->
<div class="wp-block-column"><!-- wp:paragraph {"style":{"typography":{"fontWeight":"700","lineHeight":"var:custom|line-height|heading-04"}},"textColor":"text-white","fontSize":"heading-04"} -->
<p class="has-text-white-color has-text-color has-heading-04-font-size" style="font-weight:700;line-height:var(--wp--custom--line-height--heading-04)"><?php echo esc_html( $blockspire_stat['figure'] ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"style":{"typography":{"lineHeight":"var:custom|line-height|paragraph-medium"}},"textColor":"gray-03","fontSize":"medium-paragraph"} -->
<p class="has-gray-03-color has-text-color has-medium-paragraph-font-size" style="line-height:var(--wp--custom--line-height--paragraph-medium)"><?php echo esc_html( $blockspire_stat['label'] ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->
<?php endforeach; ?>
</div>
<!-- /wp:columns --></div>
<!-- /wp:group -->
