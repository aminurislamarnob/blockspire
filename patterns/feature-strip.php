<?php
/**
 * Title: Promise strip on a dark band
 * Slug: blockspire/feature-strip
 * Categories: blockspire-features
 * Description: Three short promises spread across a full width dark band, each with a circled outline icon, for sitting directly under a hero.
 * Keywords: promises, strip, band, icons, reassurance
 * Viewport Width: 1600
 *
 * @package Blockspire
 * @since 1.0.0
 */

$blockspire_promises = array(
	array(
		'icon' => 'icon-send',
		'text' => __( 'Developed with the highest care. Always up to date.', 'blockspire' ),
	),
	array(
		'icon' => 'icon-users',
		'text' => __( 'An expert and dedicated team on every project.', 'blockspire' ),
	),
	array(
		'icon' => 'icon-headset',
		'text' => __( 'Support that answers, for as long as you need it.', 'blockspire' ),
	),
);

?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|48","bottom":"var:preset|spacing|48"}}},"backgroundColor":"secondary","textColor":"text-white","layout":{"type":"constrained","contentSize":"1170px"}} -->
<div class="wp-block-group alignfull has-text-white-color has-secondary-background-color has-text-color has-background" style="padding-top:var(--wp--preset--spacing--48);padding-bottom:var(--wp--preset--spacing--48)"><!-- wp:columns {"verticalAlignment":"center","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|32","left":"var:preset|spacing|40"}}}} -->
<div class="wp-block-columns are-vertically-aligned-center">
<?php foreach ( $blockspire_promises as $blockspire_promise ) : ?>
<!-- wp:column {"verticalAlignment":"center"} -->
<div class="wp-block-column is-vertically-aligned-center"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
<div class="wp-block-group"><!-- wp:group {"style":{"typography":{"lineHeight":"0"},"border":{"color":"var:preset|color|text-white","width":"1px","radius":"100px"},"dimensions":{"minWidth":"56px","minHeight":"56px"}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center","verticalAlignment":"center"}} -->
<div class="wp-block-group has-border-color" style="border-color:var(--wp--preset--color--text-white);border-width:1px;border-radius:100px;min-height:56px;min-width:56px;line-height:0"><!-- wp:image {"width":"24px","height":"24px","scale":"contain","sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full is-resized"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/' . $blockspire_promise['icon'] . '.svg' ) ); ?>" alt="" style="object-fit:contain;width:24px;height:24px"/></figure>
<!-- /wp:image --></div>
<!-- /wp:group -->

<!-- wp:paragraph {"style":{"typography":{"lineHeight":"var:custom|line-height|paragraph-medium"}},"fontSize":"medium-paragraph"} -->
<p class="has-medium-paragraph-font-size" style="line-height:var(--wp--custom--line-height--paragraph-medium)"><?php echo esc_html( $blockspire_promise['text'] ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->
<?php endforeach; ?>
</div>
<!-- /wp:columns --></div>
<!-- /wp:group -->
