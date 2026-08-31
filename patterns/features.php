<?php
/**
 * Title: Feature grid with icons
 * Slug: blockspire/features
 * Categories: blockspire-features
 * Description: A centred section heading above two columns of feature blocks, each with an icon badge, a title and a short paragraph.
 * Keywords: features, benefits, reasons, grid, icons
 * Viewport Width: 1600
 *
 * @package Blockspire
 * @since 1.0.0
 */

$blockspire_features = array(
	array(
		'icon'  => 'icon-shield',
		'title' => __( 'Proven experience', 'blockspire' ),
		'text'  => __( 'Backed by years of practice, we deliver reliable, high quality work tailored to your business.', 'blockspire' ),
	),
	array(
		'icon'  => 'icon-layers',
		'title' => __( 'Business focused', 'blockspire' ),
		'text'  => __( 'Every business is different, so is our approach. We build software that fits how you already work.', 'blockspire' ),
	),
	array(
		'icon'  => 'icon-puzzle',
		'title' => __( 'Built with care', 'blockspire' ),
		'text'  => __( 'We go beyond the brief, understanding your goals and shipping solutions that hold up over time.', 'blockspire' ),
	),
	array(
		'icon'  => 'icon-cart',
		'title' => __( 'No surprises', 'blockspire' ),
		'text'  => __( 'Transparent pricing and a clear scope from the first conversation. Your investment is always protected.', 'blockspire' ),
	),
	array(
		'icon'  => 'icon-api',
		'title' => __( 'Ongoing support', 'blockspire' ),
		'text'  => __( 'Our work does not end at launch. We stay on hand to keep your site secure and performing well.', 'blockspire' ),
	),
	array(
		'icon'  => 'icon-code',
		'title' => __( 'Modern by default', 'blockspire' ),
		'text'  => __( 'We use current, well supported technology so your site stays maintainable as your business grows.', 'blockspire' ),
	),
);

?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|80","bottom":"var:preset|spacing|100"},"blockGap":"var:preset|spacing|48"}},"layout":{"type":"constrained","contentSize":"1170px"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--80);padding-bottom:var(--wp--preset--spacing--100)"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|24"}},"layout":{"type":"constrained","contentSize":"670px"}} -->
<div class="wp-block-group"><!-- wp:heading {"textAlign":"center","style":{"typography":{"lineHeight":"var:custom|line-height|heading-03"}},"fontSize":"heading-03"} -->
<h2 class="wp-block-heading has-text-align-center has-heading-03-font-size" style="line-height:var(--wp--custom--line-height--heading-03)"><?php echo esc_html__( 'Why businesses choose us', 'blockspire' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","style":{"typography":{"lineHeight":"var:custom|line-height|paragraph-large"}},"textColor":"text-color","fontSize":"large-paragraph"} -->
<p class="has-text-align-center has-text-color-color has-text-color has-large-paragraph-font-size" style="line-height:var(--wp--custom--line-height--paragraph-large)"><?php echo esc_html__( 'Partner with a team that blends experience, care and plain speaking to turn your ideas into working software.', 'blockspire' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:columns {"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|30","left":"var:preset|spacing|30"}}}} -->
<div class="wp-block-columns">
<?php foreach ( $blockspire_features as $blockspire_index => $blockspire_feature ) : ?>
	<?php if ( 0 !== $blockspire_index && 0 === $blockspire_index % 2 ) : ?>
</div>
<!-- /wp:columns -->

<!-- wp:columns {"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|30","left":"var:preset|spacing|30"}}}} -->
<div class="wp-block-columns">
	<?php endif; ?>
<!-- wp:column {"style":{"spacing":{"padding":{"top":"var:preset|spacing|24","right":"var:preset|spacing|24","bottom":"var:preset|spacing|24","left":"var:preset|spacing|24"},"blockGap":"var:preset|spacing|16"},"border":{"radius":"8px"}},"backgroundColor":"light-bg","layout":{"type":"default"}} -->
<div class="wp-block-column has-light-bg-background-color has-background" style="border-radius:8px;padding-top:var(--wp--preset--spacing--24);padding-right:var(--wp--preset--spacing--24);padding-bottom:var(--wp--preset--spacing--24);padding-left:var(--wp--preset--spacing--24)"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|16"}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"top"}} -->
<div class="wp-block-group"><!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|12","right":"var:preset|spacing|12","bottom":"var:preset|spacing|12","left":"var:preset|spacing|12"}},"border":{"radius":"100px"},"dimensions":{"minWidth":"48px"}},"backgroundColor":"primary","layout":{"type":"constrained","contentSize":"24px"}} -->
<div class="wp-block-group has-primary-background-color has-background" style="border-radius:100px;min-width:48px;padding-top:var(--wp--preset--spacing--12);padding-right:var(--wp--preset--spacing--12);padding-bottom:var(--wp--preset--spacing--12);padding-left:var(--wp--preset--spacing--12)"><!-- wp:image {"width":"24px","height":"24px","scale":"contain","sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full is-resized"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/' . $blockspire_feature['icon'] . '.svg' ) ); ?>" alt="" style="object-fit:contain;width:24px;height:24px"/></figure>
<!-- /wp:image --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|10"}},"layout":{"type":"default"}} -->
<div class="wp-block-group"><!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"700","lineHeight":"var:custom|line-height|title-medium"}},"fontSize":"medium-title"} -->
<h3 class="wp-block-heading has-medium-title-font-size" style="font-weight:700;line-height:var(--wp--custom--line-height--title-medium)"><?php echo esc_html( $blockspire_feature['title'] ); ?></h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"typography":{"lineHeight":"var:custom|line-height|paragraph-medium"}},"textColor":"text-color","fontSize":"medium-paragraph"} -->
<p class="has-text-color-color has-text-color has-medium-paragraph-font-size" style="line-height:var(--wp--custom--line-height--paragraph-medium)"><?php echo esc_html( $blockspire_feature['text'] ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->
<?php endforeach; ?>
</div>
<!-- /wp:columns --></div>
<!-- /wp:group -->
