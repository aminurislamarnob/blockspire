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
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|80","bottom":"var:preset|spacing|100"},"blockGap":"var:preset|spacing|40"}},"layout":{"type":"constrained","contentSize":"1170px"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--80);padding-bottom:var(--wp--preset--spacing--100)"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|24"}},"layout":{"type":"constrained","contentSize":"670px"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"align":"center","style":{"typography":{"fontWeight":"700","lineHeight":"var:custom|line-height|title-medium"}},"textColor":"gray-02","fontSize":"medium-title"} -->
<p class="has-text-align-center has-gray-02-color has-text-color has-medium-title-font-size" style="font-weight:700;line-height:var(--wp--custom--line-height--title-medium)"><?php echo esc_html__( 'Services', 'blockspire' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"textAlign":"center","style":{"typography":{"lineHeight":"var:custom|line-height|heading-03"}},"fontSize":"heading-03"} -->
<h2 class="wp-block-heading has-text-align-center has-heading-03-font-size" style="line-height:var(--wp--custom--line-height--heading-03)"><?php echo esc_html__( 'Top notch digital services', 'blockspire' ); ?></h2>
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
<!-- wp:column {"style":{"spacing":{"padding":{"top":"var:preset|spacing|24","right":"var:preset|spacing|24","bottom":"var:preset|spacing|24","left":"var:preset|spacing|24"},"blockGap":"var:preset|spacing|48"},"border":{"color":"var:preset|color|gray-03","width":"1px"}},"layout":{"type":"default"}} -->
<div class="wp-block-column has-border-color" style="border-color:var(--wp--preset--color--gray-03);border-width:1px;padding-top:var(--wp--preset--spacing--24);padding-right:var(--wp--preset--spacing--24);padding-bottom:var(--wp--preset--spacing--24);padding-left:var(--wp--preset--spacing--24)"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|12"}},"layout":{"type":"constrained","justifyContent":"left"}} -->
<div class="wp-block-group"><!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"left"}} -->
<div class="wp-block-group"><!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|16","right":"var:preset|spacing|16","bottom":"var:preset|spacing|16","left":"var:preset|spacing|16"}}},"backgroundColor":"primary","layout":{"type":"constrained","contentSize":"32px"}} -->
<div class="wp-block-group has-primary-background-color has-background" style="padding-top:var(--wp--preset--spacing--16);padding-right:var(--wp--preset--spacing--16);padding-bottom:var(--wp--preset--spacing--16);padding-left:var(--wp--preset--spacing--16)"><!-- wp:image {"width":"32px","height":"32px","scale":"contain","sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full is-resized"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/' . $blockspire_service['icon'] . '.svg' ) ); ?>" alt="" style="object-fit:contain;width:32px;height:32px"/></figure>
<!-- /wp:image --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:heading {"level":3,"style":{"typography":{"fontSize":"var:preset|font-size|large-title","fontWeight":"700","lineHeight":"var:custom|line-height|title-large"}}} -->
<h3 class="wp-block-heading" style="font-size:var(--wp--preset--font-size--large-title);font-weight:700;line-height:var(--wp--custom--line-height--title-large)"><?php echo wp_kses_post( $blockspire_service['title'] ); ?></h3>
<!-- /wp:heading --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|16"}},"layout":{"type":"constrained","justifyContent":"left"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"style":{"typography":{"fontWeight":"400","lineHeight":"var:custom|line-height|paragraph-small"}},"textColor":"text-color","fontSize":"small-paragraph"} -->
<p class="has-text-color-color has-text-color has-small-paragraph-font-size" style="font-weight:400;line-height:var(--wp--custom--line-height--paragraph-small)"><?php echo esc_html( $blockspire_service['text'] ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"is-style-arrow-link","style":{"typography":{"fontWeight":"400","lineHeight":"1.5"},"elements":{"link":{"color":{"text":"var:preset|color|heading-color"}}}},"fontSize":"medium-paragraph"} -->
<p class="is-style-arrow-link has-link-color has-medium-paragraph-font-size" style="font-weight:400;line-height:1.5"><a href="#"><?php echo esc_html__( 'Learn More', 'blockspire' ); ?></a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->
<?php endforeach; ?>
</div>
<!-- /wp:columns -->

<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons"><!-- wp:button {"className":"is-style-outline-arrow"} -->
<div class="wp-block-button is-style-outline-arrow"><a class="wp-block-button__link wp-element-button" href="#"><?php echo esc_html__( 'View All', 'blockspire' ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group -->
