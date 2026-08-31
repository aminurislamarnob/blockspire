<?php
/**
 * Title: Pricing plans in three columns
 * Slug: blockspire/pricing
 * Categories: blockspire-pricing
 * Description: Three plan cards with a price, a short summary, a feature list and a call to action, with the middle plan emphasised.
 * Keywords: pricing, plans, packages, tiers, rates
 * Viewport Width: 1600
 *
 * @package Blockspire
 * @since 1.0.0
 */

$blockspire_plans = array(
	array(
		'name'     => __( 'Starter', 'blockspire' ),
		'price'    => __( '$29', 'blockspire' ),
		'period'   => __( 'per month', 'blockspire' ),
		'summary'  => __( 'For a small site that needs to stay current and secure.', 'blockspire' ),
		'features' => array(
			__( 'Monthly updates and backups', 'blockspire' ),
			__( 'Uptime monitoring', 'blockspire' ),
			__( 'Email support', 'blockspire' ),
		),
		'featured' => false,
	),
	array(
		'name'     => __( 'Growth', 'blockspire' ),
		'price'    => __( '$79', 'blockspire' ),
		'period'   => __( 'per month', 'blockspire' ),
		'summary'  => __( 'For a growing business that ships changes regularly.', 'blockspire' ),
		'features' => array(
			__( 'Everything in Starter', 'blockspire' ),
			__( 'Two hours of changes a month', 'blockspire' ),
			__( 'Performance reviews', 'blockspire' ),
			__( 'Priority support', 'blockspire' ),
		),
		'featured' => true,
	),
	array(
		'name'     => __( 'Scale', 'blockspire' ),
		'price'    => __( '$199', 'blockspire' ),
		'period'   => __( 'per month', 'blockspire' ),
		'summary'  => __( 'For a busy store or platform where downtime costs money.', 'blockspire' ),
		'features' => array(
			__( 'Everything in Growth', 'blockspire' ),
			__( 'Eight hours of changes a month', 'blockspire' ),
			__( 'Staging environment', 'blockspire' ),
			__( 'Same day response', 'blockspire' ),
		),
		'featured' => false,
	),
);

?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|80","bottom":"var:preset|spacing|100"},"blockGap":"var:preset|spacing|48"}},"layout":{"type":"constrained","contentSize":"1170px"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--80);padding-bottom:var(--wp--preset--spacing--100)"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|24"}},"layout":{"type":"constrained","contentSize":"670px"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"align":"center","style":{"typography":{"fontWeight":"700","lineHeight":"var:custom|line-height|title-medium"}},"textColor":"gray-02","fontSize":"medium-title"} -->
<p class="has-text-align-center has-gray-02-color has-text-color has-medium-title-font-size" style="font-weight:700;line-height:var(--wp--custom--line-height--title-medium)"><?php echo esc_html__( 'Pricing', 'blockspire' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"textAlign":"center","style":{"typography":{"lineHeight":"var:custom|line-height|heading-03"}},"fontSize":"heading-03"} -->
<h2 class="wp-block-heading has-text-align-center has-heading-03-font-size" style="line-height:var(--wp--custom--line-height--heading-03)"><?php echo esc_html__( 'Plans that stay honest', 'blockspire' ); ?></h2>
<!-- /wp:heading --></div>
<!-- /wp:group -->

<!-- wp:columns {"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|30","left":"var:preset|spacing|30"}}}} -->
<div class="wp-block-columns">
<?php foreach ( $blockspire_plans as $blockspire_plan ) : ?>
	<?php if ( $blockspire_plan['featured'] ) : ?>
<!-- wp:column {"style":{"spacing":{"padding":{"top":"var:preset|spacing|32","right":"var:preset|spacing|32","bottom":"var:preset|spacing|32","left":"var:preset|spacing|32"},"blockGap":"var:preset|spacing|24"},"border":{"color":"var:preset|color|primary","width":"2px","radius":"8px"}},"layout":{"type":"default"}} -->
<div class="wp-block-column has-border-color" style="border-color:var(--wp--preset--color--primary);border-width:2px;border-radius:8px;padding-top:var(--wp--preset--spacing--32);padding-right:var(--wp--preset--spacing--32);padding-bottom:var(--wp--preset--spacing--32);padding-left:var(--wp--preset--spacing--32)">
	<?php else : ?>
<!-- wp:column {"style":{"spacing":{"padding":{"top":"var:preset|spacing|32","right":"var:preset|spacing|32","bottom":"var:preset|spacing|32","left":"var:preset|spacing|32"},"blockGap":"var:preset|spacing|24"},"border":{"color":"var:preset|color|gray-03","width":"1px","radius":"8px"}},"layout":{"type":"default"}} -->
<div class="wp-block-column has-border-color" style="border-color:var(--wp--preset--color--gray-03);border-width:1px;border-radius:8px;padding-top:var(--wp--preset--spacing--32);padding-right:var(--wp--preset--spacing--32);padding-bottom:var(--wp--preset--spacing--32);padding-left:var(--wp--preset--spacing--32)">
	<?php endif; ?>
<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|10"}},"layout":{"type":"default"}} -->
<div class="wp-block-group"><!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"700","lineHeight":"var:custom|line-height|title-medium"}},"fontSize":"medium-title"} -->
<h3 class="wp-block-heading has-medium-title-font-size" style="font-weight:700;line-height:var(--wp--custom--line-height--title-medium)"><?php echo esc_html( $blockspire_plan['name'] ); ?></h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"typography":{"fontWeight":"700","lineHeight":"var:custom|line-height|heading-05"}},"fontSize":"heading-05"} -->
<p class="has-heading-05-font-size" style="font-weight:700;line-height:var(--wp--custom--line-height--heading-05)"><?php echo esc_html( $blockspire_plan['price'] ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"style":{"typography":{"lineHeight":"var:custom|line-height|paragraph-small"}},"textColor":"gray-02","fontSize":"small-paragraph"} -->
<p class="has-gray-02-color has-text-color has-small-paragraph-font-size" style="line-height:var(--wp--custom--line-height--paragraph-small)"><?php echo esc_html( $blockspire_plan['period'] ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:paragraph {"style":{"typography":{"lineHeight":"var:custom|line-height|paragraph-medium"}},"textColor":"text-color","fontSize":"medium-paragraph"} -->
<p class="has-text-color-color has-text-color has-medium-paragraph-font-size" style="line-height:var(--wp--custom--line-height--paragraph-medium)"><?php echo esc_html( $blockspire_plan['summary'] ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:list {"style":{"spacing":{"blockGap":"var:preset|spacing|10"}},"fontSize":"small-paragraph"} -->
<ul class="wp-block-list has-small-paragraph-font-size">
	<?php foreach ( $blockspire_plan['features'] as $blockspire_feature ) : ?>
<!-- wp:list-item -->
<li><?php echo esc_html( $blockspire_feature ); ?></li>
<!-- /wp:list-item -->
<?php endforeach; ?>
</ul>
<!-- /wp:list -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button {"width":100} -->
<div class="wp-block-button has-custom-width wp-block-button__width-100"><a class="wp-block-button__link wp-element-button" href="#"><?php echo esc_html__( 'Choose plan', 'blockspire' ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:column -->
<?php endforeach; ?>
</div>
<!-- /wp:columns --></div>
<!-- /wp:group -->
