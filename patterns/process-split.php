<?php
/**
 * Title: Work process beside an image
 * Slug: blockspire/process-split
 * Categories: blockspire-features, blockspire-services
 * Description: A centred section heading over numbered steps on one side and a supporting image on the other, for explaining how you work. Each step opens and closes, and opening one closes the rest.
 * Keywords: process, steps, how it works, workflow, method, accordion
 * Viewport Width: 1600
 *
 * @package Blockspire
 * @since 1.0.0
 */

$blockspire_steps = array(
	array(
		'number' => __( '1', 'blockspire' ),
		'title'  => __( 'Submit a proposal for your awesome project.', 'blockspire' ),
		'text'   => __( 'Tell us what you are trying to build and who it is for. A short note is enough to start the conversation, and we will come back to you with questions rather than a quote.', 'blockspire' ),
	),
	array(
		'number' => __( '2', 'blockspire' ),
		'title'  => __( 'Our expert developer team is ready to do all.', 'blockspire' ),
		'text'   => __( 'You get a written scope, a fixed timeline and one person who stays with the project from the first call through to the last deployment.', 'blockspire' ),
	),
	array(
		'number' => __( '3', 'blockspire' ),
		'title'  => __( 'Get full support from us through the project.', 'blockspire' ),
		'text'   => __( 'Updates as we go, no surprises at handover, and someone to write to long after the site has launched.', 'blockspire' ),
	),
);

$blockspire_last = count( $blockspire_steps ) - 1;

?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|80","bottom":"var:preset|spacing|100"},"blockGap":"var:preset|spacing|48"}},"layout":{"type":"constrained","contentSize":"1170px"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--80);padding-bottom:var(--wp--preset--spacing--100)"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|16"}},"layout":{"type":"constrained","contentSize":"670px"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"align":"center","style":{"typography":{"fontWeight":"700","lineHeight":"var:custom|line-height|title-medium"}},"textColor":"gray-02","fontSize":"medium-title"} -->
<p class="has-text-align-center has-gray-02-color has-text-color has-medium-title-font-size" style="font-weight:700;line-height:var(--wp--custom--line-height--title-medium)"><?php echo esc_html__( 'Work process', 'blockspire' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"textAlign":"center","style":{"typography":{"lineHeight":"var:custom|line-height|heading-03"}},"fontSize":"heading-03"} -->
<h2 class="wp-block-heading has-text-align-center has-heading-03-font-size" style="line-height:var(--wp--custom--line-height--heading-03)"><?php echo esc_html__( 'How we work', 'blockspire' ); ?></h2>
<!-- /wp:heading --></div>
<!-- /wp:group -->

<!-- wp:columns {"verticalAlignment":"center","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|48","left":"var:preset|spacing|70"}}}} -->
<div class="wp-block-columns are-vertically-aligned-center"><!-- wp:column {"verticalAlignment":"center","width":"40%","style":{"spacing":{"blockGap":"var:preset|spacing|48"}}} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:40%">
<?php foreach ( $blockspire_steps as $blockspire_index => $blockspire_step ) : ?>
	<?php
	$blockspire_is_first = 0 === $blockspire_index;
	$blockspire_badge    = $blockspire_is_first ? 'primary' : 'secondary';
	// Every step but the last draws the rule that runs down to the next number.
	$blockspire_joined = $blockspire_index < $blockspire_last;
	?>
<!-- wp:group {<?php echo $blockspire_joined ? '"className":"is-style-process-step",' : ''; ?>"style":{"spacing":{"blockGap":"var:preset|spacing|24"}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"top"}} -->
<div class="wp-block-group<?php echo $blockspire_joined ? ' is-style-process-step' : ''; ?>"><!-- wp:group {"style":{"border":{"radius":"4px"},"dimensions":{"minHeight":"36px","minWidth":"36px"}},"backgroundColor":"<?php echo esc_attr( $blockspire_badge ); ?>","textColor":"text-white","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center","verticalAlignment":"center"}} -->
<div class="wp-block-group has-text-white-color has-<?php echo esc_attr( $blockspire_badge ); ?>-background-color has-text-color has-background" style="border-radius:4px;min-height:36px;min-width:36px"><!-- wp:paragraph {"align":"center","style":{"typography":{"fontWeight":"700","lineHeight":"1"}},"fontSize":"medium-paragraph"} -->
<p class="has-text-align-center has-medium-paragraph-font-size" style="font-weight:700;line-height:1"><?php echo esc_html( $blockspire_step['number'] ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:details {<?php echo $blockspire_is_first ? '"showContent":true,' : ''; ?>"className":"is-style-step"} -->
<details class="wp-block-details is-style-step" name="blockspire-process"<?php echo $blockspire_is_first ? ' open' : ''; ?>><summary><h3 class="wp-block-heading has-medium-title-font-size" style="font-weight:700;line-height:var(--wp--custom--line-height--title-medium)"><?php echo esc_html( $blockspire_step['title'] ); ?></h3></summary><!-- wp:paragraph {"style":{"typography":{"lineHeight":"var:custom|line-height|paragraph-small"}},"textColor":"text-color","fontSize":"small-paragraph"} -->
<p class="has-text-color-color has-text-color has-small-paragraph-font-size" style="line-height:var(--wp--custom--line-height--paragraph-small)"><?php echo esc_html( $blockspire_step['text'] ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"is-style-arrow-link","style":{"typography":{"fontWeight":"600","lineHeight":"1.5"},"elements":{"link":{"color":{"text":"var:preset|color|heading-color"}}}},"fontSize":"medium-paragraph"} -->
<p class="is-style-arrow-link has-link-color has-medium-paragraph-font-size" style="font-weight:600;line-height:1.5"><a href="#"><?php echo esc_html__( 'Get started', 'blockspire' ); ?></a></p>
<!-- /wp:paragraph --></details>
<!-- /wp:details --></div>
<!-- /wp:group -->
<?php endforeach; ?>

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button {"className":"is-style-arrow"} -->
<div class="wp-block-button is-style-arrow"><a class="wp-block-button__link wp-element-button" href="#"><?php echo esc_html__( 'Start a project', 'blockspire' ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center"} -->
<div class="wp-block-column is-vertically-aligned-center"><!-- wp:image {"aspectRatio":"4/3","scale":"cover","sizeSlug":"large","linkDestination":"none","style":{"border":{"radius":"8px"}}} -->
<figure class="wp-block-image size-large has-custom-border"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/hero-workspace.webp' ) ); ?>" alt="" style="border-radius:8px;aspect-ratio:4/3;object-fit:cover"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->
