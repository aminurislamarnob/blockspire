<?php
/**
 * Title: Client stories with ratings
 * Slug: blockspire/testimonials-rated
 * Categories: blockspire-testimonials
 * Description: A centred section heading above three borderless quotes, each with a five star rating and the name, role and portrait of the person who gave it.
 * Keywords: testimonials, reviews, ratings, stars, clients
 * Viewport Width: 1600
 *
 * @package Blockspire
 * @since 1.0.0
 */

$blockspire_stories = array(
	array(
		'quote' => __( '“They asked better questions than anyone else we spoke to, and the build reflected that. We launched a fortnight early and nothing has broken since.”', 'blockspire' ),
		'name'  => __( 'Priya Raman', 'blockspire' ),
		'role'  => __( 'Operations Lead, Northwind', 'blockspire' ),
	),
	array(
		'quote' => __( '“It was worth every penny. The site is the most valuable thing our marketing team owns, and we can edit all of it ourselves.”', 'blockspire' ),
		'name'  => __( 'Wade Warren', 'blockspire' ),
		'role'  => __( 'Director, ABC Corporation', 'blockspire' ),
	),
	array(
		'quote' => __( '“Six months after launch they still answer within the day. The support is the part we ended up valuing most.”', 'blockspire' ),
		'name'  => __( 'Amara Okafor', 'blockspire' ),
		'role'  => __( 'Marketing Director, Baseline', 'blockspire' ),
	),
);

?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|100","bottom":"var:preset|spacing|80"},"blockGap":"var:preset|spacing|48"}},"layout":{"type":"constrained","contentSize":"1170px"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--100);padding-bottom:var(--wp--preset--spacing--80)"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|16"}},"layout":{"type":"constrained","contentSize":"670px"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"align":"center","style":{"typography":{"fontWeight":"700","lineHeight":"var:custom|line-height|title-medium"}},"textColor":"gray-02","fontSize":"medium-title"} -->
<p class="has-text-align-center has-gray-02-color has-text-color has-medium-title-font-size" style="font-weight:700;line-height:var(--wp--custom--line-height--title-medium)"><?php echo esc_html__( 'Testimonial', 'blockspire' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"textAlign":"center","style":{"typography":{"lineHeight":"var:custom|line-height|heading-03"}},"fontSize":"heading-03"} -->
<h2 class="wp-block-heading has-text-align-center has-heading-03-font-size" style="line-height:var(--wp--custom--line-height--heading-03)"><?php echo esc_html__( 'Our client stories', 'blockspire' ); ?></h2>
<!-- /wp:heading --></div>
<!-- /wp:group -->

<!-- wp:columns {"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|48","left":"var:preset|spacing|30"}}}} -->
<div class="wp-block-columns">
<?php foreach ( $blockspire_stories as $blockspire_story ) : ?>
<!-- wp:column {"style":{"spacing":{"blockGap":"var:preset|spacing|24"}},"layout":{"type":"default"}} -->
<div class="wp-block-column"><!-- wp:paragraph {"className":"is-style-rating","textColor":"accent"} -->
<p class="is-style-rating has-accent-color has-text-color"><?php echo esc_html__( 'Rated 5 out of 5', 'blockspire' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"style":{"typography":{"fontWeight":"700","lineHeight":"var:custom|line-height|paragraph-medium"}},"textColor":"heading-color","fontSize":"medium-paragraph"} -->
<p class="has-heading-color-color has-text-color has-medium-paragraph-font-size" style="font-weight:700;line-height:var(--wp--custom--line-height--paragraph-medium)"><?php echo esc_html( $blockspire_story['quote'] ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|16"}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
<div class="wp-block-group"><!-- wp:group {"style":{"border":{"radius":"100px"},"dimensions":{"minHeight":"56px","minWidth":"56px"}},"backgroundColor":"light-bg","layout":{"type":"constrained"}} -->
<div class="wp-block-group has-light-bg-background-color has-background" style="border-radius:100px;min-height:56px;min-width:56px"></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"default"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"style":{"typography":{"fontWeight":"700","lineHeight":"var:custom|line-height|paragraph-medium"}},"textColor":"heading-color","fontSize":"medium-paragraph"} -->
<p class="has-heading-color-color has-text-color has-medium-paragraph-font-size" style="font-weight:700;line-height:var(--wp--custom--line-height--paragraph-medium)"><?php echo esc_html( $blockspire_story['name'] ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"style":{"typography":{"lineHeight":"var:custom|line-height|paragraph-small"}},"textColor":"text-color","fontSize":"small-paragraph"} -->
<p class="has-text-color-color has-text-color has-small-paragraph-font-size" style="line-height:var(--wp--custom--line-height--paragraph-small)"><?php echo esc_html( $blockspire_story['role'] ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->
<?php endforeach; ?>
</div>
<!-- /wp:columns -->

<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|10"}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center"}} -->
<div class="wp-block-group"><!-- wp:group {"style":{"border":{"radius":"100px"},"dimensions":{"minWidth":"12px","minHeight":"12px"}},"backgroundColor":"heading-color","layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group has-heading-color-background-color has-background" style="border-radius:100px;min-height:12px;min-width:12px"></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"border":{"radius":"100px"},"dimensions":{"minWidth":"12px","minHeight":"12px"}},"backgroundColor":"gray-03","layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group has-gray-03-background-color has-background" style="border-radius:100px;min-height:12px;min-width:12px"></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"border":{"radius":"100px"},"dimensions":{"minWidth":"12px","minHeight":"12px"}},"backgroundColor":"gray-03","layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group has-gray-03-background-color has-background" style="border-radius:100px;min-height:12px;min-width:12px"></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->
