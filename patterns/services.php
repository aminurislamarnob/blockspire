<?php
/**
 * Title: Services grid with icons
 * Slug: blockspire/services
 * Categories: blockspire-services, blockspire-features
 * Description: A centred section heading above a grid of bordered service cards, each with an icon, title, description and link.
 * Keywords: services, features, grid, cards, icons
 * Viewport Width: 1600
 *
 * @package Blockspire
 * @since 1.0.0
 */

$blockspire_services = array(
	array(
		'icon'  => 'icon-code',
		'title' => __( 'Theme Development &amp; Customisation', 'blockspire' ),
		'text'  => __( 'Create tailored websites that reflect your brand and engage your audience effectively.', 'blockspire' ),
	),
	array(
		'icon'  => 'icon-puzzle',
		'title' => __( 'Plugin Development &amp; Customisation', 'blockspire' ),
		'text'  => __( 'Extend your site with reliable, maintainable functionality built around your workflow.', 'blockspire' ),
	),
	array(
		'icon'  => 'icon-cart',
		'title' => __( 'E-commerce Development', 'blockspire' ),
		'text'  => __( 'Launch and grow an online store designed to convert visitors into loyal customers.', 'blockspire' ),
	),
	array(
		'icon'  => 'icon-layers',
		'title' => __( 'Custom Web Development', 'blockspire' ),
		'text'  => __( 'Build considered, standards-based sites that stay fast and easy to look after.', 'blockspire' ),
	),
	array(
		'icon'  => 'icon-api',
		'title' => __( 'Custom APIs &amp; Integration', 'blockspire' ),
		'text'  => __( 'Connect the tools your team already relies on with dependable, well-documented APIs.', 'blockspire' ),
	),
	array(
		'icon'  => 'icon-shield',
		'title' => __( 'Security &amp; Performance', 'blockspire' ),
		'text'  => __( 'Keep your site quick, resilient and protected as your traffic and content grow.', 'blockspire' ),
	),
);

?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|100","bottom":"var:preset|spacing|100"},"blockGap":"var:preset|spacing|60"}},"layout":{"type":"constrained","contentSize":"1170px"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--100);padding-bottom:var(--wp--preset--spacing--100)"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|10"}},"layout":{"type":"constrained","contentSize":"720px"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"align":"center","style":{"typography":{"fontWeight":"600","lineHeight":"var:custom|line-height|title-small"}},"textColor":"text-color","fontSize":"small-title"} -->
<p class="has-text-align-center has-text-color-color has-text-color has-small-title-font-size" style="font-weight:600;line-height:var(--wp--custom--line-height--title-small)"><?php echo esc_html__( 'Services', 'blockspire' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"textAlign":"center","fontSize":"heading-03"} -->
<h2 class="wp-block-heading has-text-align-center has-heading-03-font-size"><?php echo esc_html__( 'Top notch digital services', 'blockspire' ); ?></h2>
<!-- /wp:heading --></div>
<!-- /wp:group -->

<!-- wp:columns {"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|30","left":"var:preset|spacing|30"}}}} -->
<div class="wp-block-columns">
<?php foreach ( $blockspire_services as $blockspire_index => $blockspire_service ) : ?>
	<?php if ( 0 !== $blockspire_index && 0 === $blockspire_index % 3 ) : ?>
</div>
<!-- /wp:columns -->

<!-- wp:columns {"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|30","left":"var:preset|spacing|30"}}}} -->
<div class="wp-block-columns">
	<?php endif; ?>
<!-- wp:column {"style":{"spacing":{"padding":{"top":"var:preset|spacing|30","right":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"var:preset|spacing|30"},"blockGap":"var:preset|spacing|20"},"border":{"color":"var:preset|color|gray-03","width":"1px","radius":"8px"}},"layout":{"type":"default"}} -->
<div class="wp-block-column has-border-color" style="border-color:var(--wp--preset--color--gray-03);border-width:1px;border-radius:8px;padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)"><!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"left"}} -->
<div class="wp-block-group"><!-- wp:group {"style":{"spacing":{"padding":{"top":"14px","right":"14px","bottom":"14px","left":"14px"}},"border":{"radius":"8px"}},"backgroundColor":"primary","layout":{"type":"constrained","contentSize":"36px"}} -->
<div class="wp-block-group has-primary-background-color has-background" style="border-radius:8px;padding-top:14px;padding-right:14px;padding-bottom:14px;padding-left:14px"><!-- wp:image {"width":"36px","height":"36px","scale":"contain","sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full is-resized"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/' . $blockspire_service['icon'] . '.svg' ) ); ?>" alt="" style="object-fit:contain;width:36px;height:36px"/></figure>
<!-- /wp:image --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:heading {"level":3,"style":{"typography":{"fontSize":"var:preset|font-size|large-title","lineHeight":"var:custom|line-height|title-large"}}} -->
<h3 class="wp-block-heading" style="font-size:var(--wp--preset--font-size--large-title);line-height:var(--wp--custom--line-height--title-large)"><?php echo wp_kses_post( $blockspire_service['title'] ); ?></h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"typography":{"lineHeight":"var:custom|line-height|paragraph-small"}},"fontSize":"small-paragraph"} -->
<p class="has-small-paragraph-font-size" style="line-height:var(--wp--custom--line-height--paragraph-small)"><?php echo esc_html( $blockspire_service['text'] ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"style":{"typography":{"fontWeight":"600","lineHeight":"var:custom|line-height|button-large"}},"fontSize":"button-large"} -->
<p class="has-button-large-font-size" style="font-weight:600;line-height:var(--wp--custom--line-height--button-large)"><a href="#"><?php echo esc_html__( 'Learn More', 'blockspire' ); ?></a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->
<?php endforeach; ?>
</div>
<!-- /wp:columns -->

<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons"><!-- wp:button {"backgroundColor":"main-bg","textColor":"heading-color","style":{"border":{"color":"var:preset|color|gray-02","width":"1px"},"elements":{"link":{"color":{"text":"var:preset|color|heading-color"}}}},"className":"is-style-outline"} -->
<div class="wp-block-button is-style-outline"><a class="wp-block-button__link has-heading-color-color has-main-bg-background-color has-text-color has-background has-border-color wp-element-button" style="border-color:var(--wp--preset--color--gray-02);border-width:1px" href="#"><?php echo esc_html__( 'View All', 'blockspire' ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group -->
