<?php
/**
 * Title: Client stories with ratings
 * Slug: blockspire/testimonials-rated
 * Categories: blockspire-testimonials
 * Description: A centred section heading above a strip of borderless quotes that scrolls and snaps three at a time, each with a five star rating and the name, role and portrait of the person who gave it. Page dots appear when the theme&#8217;s script is loaded.
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
	array(
		'quote' => __( '“The estimate they gave us in week one was the number we actually paid. I did not know that happened in this industry.”', 'blockspire' ),
		'name'  => __( 'Marcus Chen', 'blockspire' ),
		'role'  => __( 'Founder, Fieldnote', 'blockspire' ),
	),
	array(
		'quote' => __( '“Our old site needed a developer for every small change. Now the whole team updates the catalogue without asking anyone.”', 'blockspire' ),
		'name'  => __( 'Leila Haddad', 'blockspire' ),
		'role'  => __( 'Store Manager, Marigold &amp; Co', 'blockspire' ),
	),
	array(
		'quote' => __( '“They rebuilt our checkout in three weeks and abandoned carts dropped by a third. The numbers made the case for us.”', 'blockspire' ),
		'name'  => __( 'Tomás Rivera', 'blockspire' ),
		'role'  => __( 'E-commerce Lead, Brightside', 'blockspire' ),
	),
	array(
		'quote' => __( '“Every handover document was written as if we would never speak again. We still call them, but we have never needed to.”', 'blockspire' ),
		'name'  => __( 'Ingrid Solberg', 'blockspire' ),
		'role'  => __( 'Product Owner, Harbourlight', 'blockspire' ),
	),
	array(
		'quote' => __( '“Accessibility was in the first proposal, not a line item added at the end. Our audit came back with nothing to fix.”', 'blockspire' ),
		'name'  => __( 'Daniel Osei', 'blockspire' ),
		'role'  => __( 'Digital Manager, Cornerstone Trust', 'blockspire' ),
	),
	array(
		'quote' => __( '“Three agencies told us our idea needed an app. They shipped it as a website in half the budget, and it works on everything.”', 'blockspire' ),
		'name'  => __( 'Hana Sato', 'blockspire' ),
		'role'  => __( 'Co-founder, Papermoon', 'blockspire' ),
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

<!-- wp:group {"className":"blockspire-carousel","style":{"spacing":{"blockGap":"var:preset|spacing|30"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group blockspire-carousel">
<?php foreach ( $blockspire_stories as $blockspire_story ) : ?>
<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|24"}},"layout":{"type":"default"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"className":"is-style-rating","textColor":"accent"} -->
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
<!-- /wp:group -->
<?php endforeach; ?>
</div>
<!-- /wp:group --></div>
<!-- /wp:group -->
