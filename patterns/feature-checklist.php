<?php
/**
 * Title: Checklist beside a media slot
 * Slug: blockspire/feature-checklist
 * Categories: blockspire-features
 * Description: A heading and a two column checklist of what is included, next to a media slot.
 * Keywords: checklist, included, features, list, comparison
 * Viewport Width: 1600
 *
 * @package Blockspire
 * @since 1.0.0
 */

$blockspire_included = array(
	__( 'A written scope before work starts', 'blockspire' ),
	__( 'Design files you actually own', 'blockspire' ),
	__( 'Accessibility checked, not assumed', 'blockspire' ),
	__( 'Performance budget agreed up front', 'blockspire' ),
	__( 'Staging site for every change', 'blockspire' ),
	__( 'Handover notes a developer can read', 'blockspire' ),
);

?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|80","bottom":"var:preset|spacing|100"}}},"layout":{"type":"constrained","contentSize":"1170px"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--80);padding-bottom:var(--wp--preset--spacing--100)"><!-- wp:columns {"verticalAlignment":"center","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|48","left":"var:preset|spacing|80"}}}} -->
<div class="wp-block-columns are-vertically-aligned-center"><!-- wp:column {"verticalAlignment":"center","width":"55%","style":{"spacing":{"blockGap":"var:preset|spacing|32"}}} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:55%"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|16"}},"layout":{"type":"default"}} -->
<div class="wp-block-group"><!-- wp:heading {"style":{"typography":{"lineHeight":"var:custom|line-height|heading-04"}},"fontSize":"heading-04"} -->
<h2 class="wp-block-heading has-heading-04-font-size" style="line-height:var(--wp--custom--line-height--heading-04)"><?php echo esc_html__( 'What is included, every time', 'blockspire' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"typography":{"lineHeight":"var:custom|line-height|paragraph-medium"}},"textColor":"text-color","fontSize":"medium-paragraph"} -->
<p class="has-text-color-color has-text-color has-medium-paragraph-font-size" style="line-height:var(--wp--custom--line-height--paragraph-medium)"><?php echo esc_html__( 'None of this is an upgrade or an optional extra. It is what we think a project needs in order to be worth doing at all.', 'blockspire' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:columns {"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|16","left":"var:preset|spacing|40"}}}} -->
<div class="wp-block-columns"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:list {"style":{"spacing":{"blockGap":"var:preset|spacing|12"}},"fontSize":"medium-paragraph"} -->
<ul class="wp-block-list has-medium-paragraph-font-size">
<?php foreach ( array_slice( $blockspire_included, 0, 3 ) as $blockspire_item ) : ?>
<!-- wp:list-item -->
<li><?php echo esc_html( $blockspire_item ); ?></li>
<!-- /wp:list-item -->
<?php endforeach; ?>
</ul>
<!-- /wp:list --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:list {"style":{"spacing":{"blockGap":"var:preset|spacing|12"}},"fontSize":"medium-paragraph"} -->
<ul class="wp-block-list has-medium-paragraph-font-size">
<?php foreach ( array_slice( $blockspire_included, 3 ) as $blockspire_item ) : ?>
<!-- wp:list-item -->
<li><?php echo esc_html( $blockspire_item ); ?></li>
<!-- /wp:list-item -->
<?php endforeach; ?>
</ul>
<!-- /wp:list --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center"} -->
<div class="wp-block-column is-vertically-aligned-center"><!-- wp:group {"style":{"dimensions":{"minHeight":"400px"},"border":{"radius":"12px"}},"backgroundColor":"light-bg","layout":{"type":"constrained"}} -->
<div class="wp-block-group has-light-bg-background-color has-background" style="border-radius:12px;min-height:400px"></div>
<!-- /wp:group --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->
