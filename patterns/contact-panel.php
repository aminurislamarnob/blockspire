<?php
/**
 * Title: Contact panel with details
 * Slug: blockspire/contact-panel
 * Categories: blockspire-contact
 * Description: A two panel card: contact details and opening hours on a light panel, an invitation to write in on a dark one.
 * Keywords: contact, enquiry, details, hours, panel
 * Viewport Width: 1600
 *
 * @package Blockspire
 * @since 1.0.0
 *
 * The dark panel is deliberately a heading, a paragraph and a button rather
 * than a form: wp.org themes cannot bundle form handling. Drop your form
 * plugin's block in place of the button and the panel styling still holds.
 */

$blockspire_lines = array(
	array(
		'label' => __( 'Phone', 'blockspire' ),
		'value' => __( '+1 555 000 0000', 'blockspire' ),
	),
	array(
		'label' => __( 'Email', 'blockspire' ),
		'value' => __( 'hello@example.com', 'blockspire' ),
	),
	array(
		'label' => __( 'Hours', 'blockspire' ),
		'value' => __( 'Monday to Friday, 9am to 6pm', 'blockspire' ),
	),
	array(
		'label' => __( 'Address', 'blockspire' ),
		'value' => __( '18 Fitzroy Street, London W1T 4BQ', 'blockspire' ),
	),
);

?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|100"}}},"layout":{"type":"constrained","contentSize":"1170px"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--100)"><!-- wp:columns {"style":{"spacing":{"blockGap":{"top":"0","left":"0"}}}} -->
<div class="wp-block-columns"><!-- wp:column {"width":"40%","style":{"spacing":{"padding":{"top":"var:preset|spacing|48","right":"var:preset|spacing|48","bottom":"var:preset|spacing|48","left":"var:preset|spacing|48"},"blockGap":"var:preset|spacing|32"},"border":{"radius":"12px"}},"backgroundColor":"light-bg","layout":{"type":"default"}} -->
<div class="wp-block-column has-light-bg-background-color has-background" style="border-radius:12px;padding-top:var(--wp--preset--spacing--48);padding-right:var(--wp--preset--spacing--48);padding-bottom:var(--wp--preset--spacing--48);padding-left:var(--wp--preset--spacing--48);flex-basis:40%"><!-- wp:heading {"level":2,"style":{"typography":{"lineHeight":"var:custom|line-height|heading-06"}},"fontSize":"heading-06"} -->
<h2 class="wp-block-heading has-heading-06-font-size" style="line-height:var(--wp--custom--line-height--heading-06)"><?php echo esc_html__( 'Contact information', 'blockspire' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|24"}},"layout":{"type":"default"}} -->
<div class="wp-block-group">
<?php foreach ( $blockspire_lines as $blockspire_line ) : ?>
<!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"default"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"style":{"typography":{"fontWeight":"600","textTransform":"uppercase","letterSpacing":"0.05em","lineHeight":"var:custom|line-height|paragraph-small"}},"textColor":"gray-02","fontSize":"small-paragraph"} -->
<p class="has-gray-02-color has-text-color has-small-paragraph-font-size" style="font-weight:600;letter-spacing:0.05em;line-height:var(--wp--custom--line-height--paragraph-small);text-transform:uppercase"><?php echo esc_html( $blockspire_line['label'] ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"style":{"typography":{"lineHeight":"var:custom|line-height|paragraph-medium"}},"fontSize":"medium-paragraph"} -->
<p class="has-medium-paragraph-font-size" style="line-height:var(--wp--custom--line-height--paragraph-medium)"><?php echo esc_html( $blockspire_line['value'] ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->
<?php endforeach; ?>
</div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column {"style":{"spacing":{"padding":{"top":"var:preset|spacing|48","right":"var:preset|spacing|48","bottom":"var:preset|spacing|48","left":"var:preset|spacing|48"},"blockGap":"var:preset|spacing|24"},"border":{"radius":"12px"},"background":{"backgroundImage":{"url":"<?php echo esc_url( get_theme_file_uri( 'assets/images/dot-grid.svg' ) ); ?>"},"backgroundSize":"30px","backgroundRepeat":"repeat","backgroundPosition":"0 0"},"elements":{"link":{"color":{"text":"var:preset|color|text-white"}}}},"backgroundColor":"secondary","textColor":"text-white","layout":{"type":"default"}} -->
<div class="wp-block-column has-text-white-color has-secondary-background-color has-text-color has-background has-link-color" style="border-radius:12px;padding-top:var(--wp--preset--spacing--48);padding-right:var(--wp--preset--spacing--48);padding-bottom:var(--wp--preset--spacing--48);padding-left:var(--wp--preset--spacing--48)"><!-- wp:heading {"level":2,"style":{"typography":{"lineHeight":"var:custom|line-height|heading-06"}},"textColor":"text-white","fontSize":"heading-06"} -->
<h2 class="wp-block-heading has-text-white-color has-text-color has-heading-06-font-size" style="line-height:var(--wp--custom--line-height--heading-06)"><?php echo esc_html__( 'Tell us about the project', 'blockspire' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"typography":{"lineHeight":"var:custom|line-height|paragraph-medium"}},"textColor":"gray-03","fontSize":"medium-paragraph"} -->
<p class="has-gray-03-color has-text-color has-medium-paragraph-font-size" style="line-height:var(--wp--custom--line-height--paragraph-medium)"><?php echo esc_html__( 'A sentence or two about what you are trying to do is plenty to start with. We read every message ourselves and reply within one working day.', 'blockspire' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button {"backgroundColor":"main-bg","textColor":"heading-color","className":"is-style-arrow"} -->
<div class="wp-block-button is-style-arrow"><a class="wp-block-button__link has-heading-color-color has-main-bg-background-color has-text-color has-background wp-element-button" href="mailto:hello@example.com"><?php echo esc_html__( 'Send an enquiry', 'blockspire' ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->
