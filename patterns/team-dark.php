<?php
/**
 * Title: Team on a dark band
 * Slug: blockspire/team-dark
 * Categories: blockspire-team
 * Description: Eight team cards in two rows on a full width dark band, with an eyebrow, heading and a link to the full team. Replace each tinted placeholder with a photo.
 * Keywords: team, people, staff, portraits, dark
 * Viewport Width: 1600
 *
 * @package Blockspire
 * @since 1.0.0
 */

$blockspire_team = array(
	array(
		'name' => __( 'Farhana Rahman', 'blockspire' ),
		'role' => __( 'Founder', 'blockspire' ),
	),
	array(
		'name' => __( 'Daniel Okonkwo', 'blockspire' ),
		'role' => __( 'Engineering Lead', 'blockspire' ),
	),
	array(
		'name' => __( 'Mei Tanaka', 'blockspire' ),
		'role' => __( 'Design Lead', 'blockspire' ),
	),
	array(
		'name' => __( 'Iwan Sadowski', 'blockspire' ),
		'role' => __( 'Support Lead', 'blockspire' ),
	),
	array(
		'name' => __( 'Noor Haddad', 'blockspire' ),
		'role' => __( 'Product Designer', 'blockspire' ),
	),
	array(
		'name' => __( 'Tomas Ferreira', 'blockspire' ),
		'role' => __( 'Back End Developer', 'blockspire' ),
	),
	array(
		'name' => __( 'Chidera Eze', 'blockspire' ),
		'role' => __( 'Accessibility Specialist', 'blockspire' ),
	),
	array(
		'name' => __( 'Hanna Virtanen', 'blockspire' ),
		'role' => __( 'Account Manager', 'blockspire' ),
	),
);

?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|100","bottom":"var:preset|spacing|100"},"blockGap":"var:preset|spacing|48"},"background":{"backgroundImage":{"url":"<?php echo esc_url( get_theme_file_uri( 'assets/images/dot-grid.svg' ) ); ?>"},"backgroundSize":"18px","backgroundRepeat":"repeat","backgroundPosition":"0 0"}},"backgroundColor":"secondary","textColor":"text-white","layout":{"type":"constrained","contentSize":"1170px"}} -->
<div class="wp-block-group alignfull has-text-white-color has-secondary-background-color has-text-color has-background" style="padding-top:var(--wp--preset--spacing--100);padding-bottom:var(--wp--preset--spacing--100)"><!-- wp:group {"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|24","left":"var:preset|spacing|40"}}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between","verticalAlignment":"bottom"}} -->
<div class="wp-block-group"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|16"}},"layout":{"type":"default"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"style":{"typography":{"fontWeight":"700","lineHeight":"var:custom|line-height|title-medium"}},"textColor":"gray-02","fontSize":"medium-title"} -->
<p class="has-gray-02-color has-text-color has-medium-title-font-size" style="font-weight:700;line-height:var(--wp--custom--line-height--title-medium)"><?php echo esc_html__( 'Team members', 'blockspire' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"style":{"typography":{"lineHeight":"var:custom|line-height|heading-03"}},"textColor":"text-white","fontSize":"heading-03"} -->
<h2 class="wp-block-heading has-text-white-color has-text-color has-heading-03-font-size" style="line-height:var(--wp--custom--line-height--heading-03)"><?php echo esc_html__( 'Meet our expert team', 'blockspire' ); ?></h2>
<!-- /wp:heading --></div>
<!-- /wp:group -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button {"className":"is-style-arrow"} -->
<div class="wp-block-button is-style-arrow"><a class="wp-block-button__link wp-element-button" href="#"><?php echo esc_html__( 'View all', 'blockspire' ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group -->

<!-- wp:columns {"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|40","left":"var:preset|spacing|30"}}}} -->
<div class="wp-block-columns">
<?php foreach ( $blockspire_team as $blockspire_index => $blockspire_member ) : ?>
	<?php if ( 0 !== $blockspire_index && 0 === $blockspire_index % 4 ) : ?>
</div>
<!-- /wp:columns -->

<!-- wp:columns {"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|40","left":"var:preset|spacing|30"}}}} -->
<div class="wp-block-columns">
	<?php endif; ?>
<!-- wp:column {"style":{"spacing":{"blockGap":"var:preset|spacing|16"}},"layout":{"type":"default"}} -->
<div class="wp-block-column"><!-- wp:group {"style":{"dimensions":{"minHeight":"330px"}},"backgroundColor":"light-bg","layout":{"type":"constrained"}} -->
<div class="wp-block-group has-light-bg-background-color has-background" style="min-height:330px"></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"default"}} -->
<div class="wp-block-group"><!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"700","lineHeight":"var:custom|line-height|paragraph-medium"}},"textColor":"text-white","fontSize":"medium-paragraph"} -->
<h3 class="wp-block-heading has-text-white-color has-text-color has-medium-paragraph-font-size" style="font-weight:700;line-height:var(--wp--custom--line-height--paragraph-medium)"><?php echo esc_html( $blockspire_member['name'] ); ?></h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"typography":{"lineHeight":"var:custom|line-height|paragraph-small"}},"textColor":"gray-02","fontSize":"small-paragraph"} -->
<p class="has-gray-02-color has-text-color has-small-paragraph-font-size" style="line-height:var(--wp--custom--line-height--paragraph-small)"><?php echo esc_html( $blockspire_member['role'] ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->
<?php endforeach; ?>
</div>
<!-- /wp:columns --></div>
<!-- /wp:group -->
