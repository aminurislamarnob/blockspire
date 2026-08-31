<?php
/**
 * Title: Portfolio grid in two columns
 * Slug: blockspire/portfolio-grid
 * Categories: blockspire-pages
 * Description: Six project cards in two columns, each with an image slot, a title and a link through to the case study.
 * Keywords: portfolio, projects, work, case studies, gallery
 * Viewport Width: 1600
 *
 * @package Blockspire
 * @since 1.0.0
 */

$blockspire_projects = array(
	array(
		'title' => __( 'A booking platform for a clinic group', 'blockspire' ),
		'meta'  => __( 'Healthcare', 'blockspire' ),
	),
	array(
		'title' => __( 'Rebuilding a marketplace checkout', 'blockspire' ),
		'meta'  => __( 'E-commerce', 'blockspire' ),
	),
	array(
		'title' => __( 'A member portal for a trade body', 'blockspire' ),
		'meta'  => __( 'Membership', 'blockspire' ),
	),
	array(
		'title' => __( 'Publishing tools for a news desk', 'blockspire' ),
		'meta'  => __( 'Editorial', 'blockspire' ),
	),
	array(
		'title' => __( 'An estate agency search rebuild', 'blockspire' ),
		'meta'  => __( 'Property', 'blockspire' ),
	),
	array(
		'title' => __( 'A logistics dashboard that loads fast', 'blockspire' ),
		'meta'  => __( 'Operations', 'blockspire' ),
	),
);

?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|100"},"blockGap":"var:preset|spacing|40"}},"layout":{"type":"constrained","contentSize":"1170px"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--100)">
<!-- wp:columns {"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|40","left":"var:preset|spacing|30"}}}} -->
<div class="wp-block-columns">
<?php foreach ( $blockspire_projects as $blockspire_index => $blockspire_project ) : ?>
	<?php if ( 0 !== $blockspire_index && 0 === $blockspire_index % 2 ) : ?>
</div>
<!-- /wp:columns -->

<!-- wp:columns {"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|40","left":"var:preset|spacing|30"}}}} -->
<div class="wp-block-columns">
	<?php endif; ?>
<!-- wp:column {"style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"default"}} -->
<div class="wp-block-column"><!-- wp:group {"style":{"dimensions":{"minHeight":"320px"},"border":{"radius":"8px"}},"backgroundColor":"light-bg","layout":{"type":"constrained"}} -->
<div class="wp-block-group has-light-bg-background-color has-background" style="border-radius:8px;min-height:320px"></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|10"}},"layout":{"type":"default"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"style":{"typography":{"fontWeight":"600","textTransform":"uppercase","letterSpacing":"0.05em","lineHeight":"var:custom|line-height|paragraph-small"}},"textColor":"gray-02","fontSize":"small-paragraph"} -->
<p class="has-gray-02-color has-text-color has-small-paragraph-font-size" style="font-weight:600;letter-spacing:0.05em;line-height:var(--wp--custom--line-height--paragraph-small);text-transform:uppercase"><?php echo esc_html( $blockspire_project['meta'] ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"700","lineHeight":"var:custom|line-height|title-large"}},"fontSize":"large-title"} -->
<h3 class="wp-block-heading has-large-title-font-size" style="font-weight:700;line-height:var(--wp--custom--line-height--title-large)"><?php echo esc_html( $blockspire_project['title'] ); ?></h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"is-style-arrow-link","style":{"typography":{"lineHeight":"1.5"},"elements":{"link":{"color":{"text":"var:preset|color|heading-color"}}}},"fontSize":"medium-paragraph"} -->
<p class="is-style-arrow-link has-link-color has-medium-paragraph-font-size" style="line-height:1.5"><a href="#"><?php echo esc_html__( 'View case study', 'blockspire' ); ?></a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->
<?php endforeach; ?>
</div>
<!-- /wp:columns --></div>
<!-- /wp:group -->
