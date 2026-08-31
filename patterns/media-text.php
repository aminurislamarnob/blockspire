<?php
/**
 * Title: Image beside text
 * Slug: blockspire/media-text
 * Categories: blockspire-pages, blockspire-features
 * Description: A rounded image on one side and an eyebrow, heading, paragraph, checklist and button on the other.
 * Keywords: media, image, text, about, split, introduction
 * Viewport Width: 1600
 *
 * @package Blockspire
 * @since 1.0.0
 */

$blockspire_points = array(
	__( 'A written scope before any work begins', 'blockspire' ),
	__( 'One person who knows your account', 'blockspire' ),
	__( 'Everything we build belongs to you', 'blockspire' ),
);

?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|80","bottom":"var:preset|spacing|100"}}},"layout":{"type":"constrained","contentSize":"1170px"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--80);padding-bottom:var(--wp--preset--spacing--100)"><!-- wp:columns {"verticalAlignment":"center","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|48","left":"var:preset|spacing|80"}}}} -->
<div class="wp-block-columns are-vertically-aligned-center"><!-- wp:column {"verticalAlignment":"center"} -->
<div class="wp-block-column is-vertically-aligned-center"><!-- wp:image {"aspectRatio":"4/3","scale":"cover","sizeSlug":"large","linkDestination":"none","style":{"border":{"radius":"12px"}}} -->
<figure class="wp-block-image size-large has-custom-border"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/hero-workspace.webp' ) ); ?>" alt="" style="border-radius:12px;aspect-ratio:4/3;object-fit:cover"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","style":{"spacing":{"blockGap":"var:preset|spacing|24"}}} -->
<div class="wp-block-column is-vertically-aligned-center"><!-- wp:paragraph {"style":{"typography":{"fontWeight":"700","lineHeight":"var:custom|line-height|title-medium"}},"textColor":"gray-02","fontSize":"medium-title"} -->
<p class="has-gray-02-color has-text-color has-medium-title-font-size" style="font-weight:700;line-height:var(--wp--custom--line-height--title-medium)"><?php echo esc_html__( 'About us', 'blockspire' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"style":{"typography":{"lineHeight":"var:custom|line-height|heading-04"}},"fontSize":"heading-04"} -->
<h2 class="wp-block-heading has-heading-04-font-size" style="line-height:var(--wp--custom--line-height--heading-04)"><?php echo esc_html__( 'Partner with us to accelerate growth', 'blockspire' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"typography":{"lineHeight":"var:custom|line-height|paragraph-medium"}},"textColor":"text-color","fontSize":"medium-paragraph"} -->
<p class="has-text-color-color has-text-color has-medium-paragraph-font-size" style="line-height:var(--wp--custom--line-height--paragraph-medium)"><?php echo esc_html__( 'We are a small team that has been building for the web long enough to know which shortcuts cost more than they save. You get the same people from the first call to the last deployment.', 'blockspire' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:list {"style":{"spacing":{"blockGap":"var:preset|spacing|10"}},"fontSize":"medium-paragraph"} -->
<ul class="wp-block-list has-medium-paragraph-font-size">
<?php foreach ( $blockspire_points as $blockspire_point ) : ?>
<!-- wp:list-item -->
<li><?php echo esc_html( $blockspire_point ); ?></li>
<!-- /wp:list-item -->
<?php endforeach; ?>
</ul>
<!-- /wp:list -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button {"className":"is-style-arrow"} -->
<div class="wp-block-button is-style-arrow"><a class="wp-block-button__link wp-element-button" href="#"><?php echo esc_html__( 'Start a project', 'blockspire' ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->
