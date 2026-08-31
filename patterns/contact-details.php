<?php
/**
 * Title: Contact details in three columns
 * Slug: blockspire/contact-details
 * Categories: blockspire-contact
 * Description: Three cards carrying an address, a phone number and an email address, above a line inviting people to get in touch.
 * Keywords: contact, address, phone, email, get in touch
 * Viewport Width: 1600
 *
 * @package Blockspire
 * @since 1.0.0
 */

$blockspire_contacts = array(
	array(
		'icon'  => 'icon-layers',
		'label' => __( 'Visit us', 'blockspire' ),
		'lines' => array(
			__( '18 Fitzroy Street', 'blockspire' ),
			__( 'London W1T 4BQ', 'blockspire' ),
		),
	),
	array(
		'icon'  => 'icon-api',
		'label' => __( 'Call us', 'blockspire' ),
		'lines' => array(
			__( '+1 555 000 0000', 'blockspire' ),
			__( 'Weekdays, 9am to 6pm', 'blockspire' ),
		),
	),
	array(
		'icon'  => 'icon-code',
		'label' => __( 'Email us', 'blockspire' ),
		'lines' => array(
			__( 'hello@example.com', 'blockspire' ),
			__( 'We reply within one working day', 'blockspire' ),
		),
	),
);

?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|80","bottom":"var:preset|spacing|100"},"blockGap":"var:preset|spacing|48"}},"layout":{"type":"constrained","contentSize":"1170px"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--80);padding-bottom:var(--wp--preset--spacing--100)"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|24"}},"layout":{"type":"constrained","contentSize":"670px"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"align":"center","style":{"typography":{"fontWeight":"700","lineHeight":"var:custom|line-height|title-medium"}},"textColor":"gray-02","fontSize":"medium-title"} -->
<p class="has-text-align-center has-gray-02-color has-text-color has-medium-title-font-size" style="font-weight:700;line-height:var(--wp--custom--line-height--title-medium)"><?php echo esc_html__( 'Contact', 'blockspire' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"textAlign":"center","style":{"typography":{"lineHeight":"var:custom|line-height|heading-03"}},"fontSize":"heading-03"} -->
<h2 class="wp-block-heading has-text-align-center has-heading-03-font-size" style="line-height:var(--wp--custom--line-height--heading-03)"><?php echo esc_html__( 'Tell us what you need', 'blockspire' ); ?></h2>
<!-- /wp:heading --></div>
<!-- /wp:group -->

<!-- wp:columns {"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|30","left":"var:preset|spacing|30"}}}} -->
<div class="wp-block-columns">
<?php foreach ( $blockspire_contacts as $blockspire_contact ) : ?>
<!-- wp:column {"style":{"spacing":{"padding":{"top":"var:preset|spacing|32","right":"var:preset|spacing|32","bottom":"var:preset|spacing|32","left":"var:preset|spacing|32"},"blockGap":"var:preset|spacing|20"},"border":{"radius":"8px"}},"backgroundColor":"light-bg","layout":{"type":"default"}} -->
<div class="wp-block-column has-light-bg-background-color has-background" style="border-radius:8px;padding-top:var(--wp--preset--spacing--32);padding-right:var(--wp--preset--spacing--32);padding-bottom:var(--wp--preset--spacing--32);padding-left:var(--wp--preset--spacing--32)"><!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"left"}} -->
<div class="wp-block-group"><!-- wp:group {"style":{"typography":{"lineHeight":"0"},"border":{"radius":"100px"},"dimensions":{"minWidth":"48px","minHeight":"48px"}},"backgroundColor":"primary","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center","verticalAlignment":"center"}} -->
<div class="wp-block-group has-primary-background-color has-background" style="border-radius:100px;min-height:48px;min-width:48px;line-height:0"><!-- wp:image {"width":"24px","height":"24px","scale":"contain","sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full is-resized"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/' . $blockspire_contact['icon'] . '.svg' ) ); ?>" alt="" style="object-fit:contain;width:24px;height:24px"/></figure>
<!-- /wp:image --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|10"}},"layout":{"type":"default"}} -->
<div class="wp-block-group"><!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"700","lineHeight":"var:custom|line-height|title-medium"}},"fontSize":"medium-title"} -->
<h3 class="wp-block-heading has-medium-title-font-size" style="font-weight:700;line-height:var(--wp--custom--line-height--title-medium)"><?php echo esc_html( $blockspire_contact['label'] ); ?></h3>
<!-- /wp:heading -->
	<?php foreach ( $blockspire_contact['lines'] as $blockspire_line ) : ?>
<!-- wp:paragraph {"style":{"typography":{"lineHeight":"var:custom|line-height|paragraph-medium"}},"textColor":"text-color","fontSize":"medium-paragraph"} -->
<p class="has-text-color-color has-text-color has-medium-paragraph-font-size" style="line-height:var(--wp--custom--line-height--paragraph-medium)"><?php echo esc_html( $blockspire_line ); ?></p>
<!-- /wp:paragraph -->
<?php endforeach; ?>
</div>
<!-- /wp:group --></div>
<!-- /wp:column -->
<?php endforeach; ?>
</div>
<!-- /wp:columns --></div>
<!-- /wp:group -->
