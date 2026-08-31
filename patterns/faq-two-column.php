<?php
/**
 * Title: FAQ with a sidebar introduction
 * Slug: blockspire/faq-two-column
 * Categories: blockspire-faq
 * Description: An introduction and a way to get in touch on the left, with the expandable questions stacked on the right.
 * Keywords: faq, questions, answers, accordion, support
 * Viewport Width: 1600
 *
 * @package Blockspire
 * @since 1.0.0
 */

$blockspire_faqs = array(
	array(
		'question' => __( 'Do you work with businesses outside your region?', 'blockspire' ),
		'answer'   => __( 'Most of our clients are, and always have been, somewhere else. We keep overlapping hours and write things down, which turns out to matter more than sharing a postcode.', 'blockspire' ),
	),
	array(
		'question' => __( 'Who owns the code you write?', 'blockspire' ),
		'answer'   => __( 'You do, from the first commit. We hand over the repository at the end of every project whether or not you carry on working with us.', 'blockspire' ),
	),
	array(
		'question' => __( 'Can you take over a project someone else started?', 'blockspire' ),
		'answer'   => __( 'Frequently. We begin with a short paid audit so we can tell you honestly what shape it is in before either of us commits to anything larger.', 'blockspire' ),
	),
	array(
		'question' => __( 'How do you charge?', 'blockspire' ),
		'answer'   => __( 'Fixed price for defined work, a monthly retainer for ongoing care. We do not bill by the hour, because it rewards the wrong thing.', 'blockspire' ),
	),
);

?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|80","bottom":"var:preset|spacing|100"}}},"layout":{"type":"constrained","contentSize":"1170px"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--80);padding-bottom:var(--wp--preset--spacing--100)"><!-- wp:columns {"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|48","left":"var:preset|spacing|80"}}}} -->
<div class="wp-block-columns"><!-- wp:column {"width":"38%","style":{"spacing":{"blockGap":"var:preset|spacing|24"}}} -->
<div class="wp-block-column" style="flex-basis:38%"><!-- wp:paragraph {"style":{"typography":{"fontWeight":"700","lineHeight":"var:custom|line-height|title-medium"}},"textColor":"gray-02","fontSize":"medium-title"} -->
<p class="has-gray-02-color has-text-color has-medium-title-font-size" style="font-weight:700;line-height:var(--wp--custom--line-height--title-medium)"><?php echo esc_html__( 'FAQ', 'blockspire' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"style":{"typography":{"lineHeight":"var:custom|line-height|heading-04"}},"fontSize":"heading-04"} -->
<h2 class="wp-block-heading has-heading-04-font-size" style="line-height:var(--wp--custom--line-height--heading-04)"><?php echo esc_html__( 'Things people ask before they hire us', 'blockspire' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"typography":{"lineHeight":"var:custom|line-height|paragraph-medium"}},"textColor":"text-color","fontSize":"medium-paragraph"} -->
<p class="has-text-color-color has-text-color has-medium-paragraph-font-size" style="line-height:var(--wp--custom--line-height--paragraph-medium)"><?php echo esc_html__( 'If the answer you need is not here, write to us and a person will reply.', 'blockspire' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"is-style-arrow-link","style":{"typography":{"lineHeight":"1.5"},"elements":{"link":{"color":{"text":"var:preset|color|heading-color"}}}},"fontSize":"medium-paragraph"} -->
<p class="is-style-arrow-link has-link-color has-medium-paragraph-font-size" style="line-height:1.5"><a href="mailto:hello@example.com"><?php echo esc_html__( 'Ask a question', 'blockspire' ); ?></a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column {"style":{"spacing":{"blockGap":"var:preset|spacing|16"}}} -->
<div class="wp-block-column">
<?php foreach ( $blockspire_faqs as $blockspire_faq ) : ?>
<!-- wp:details {"style":{"spacing":{"padding":{"top":"var:preset|spacing|24","right":"var:preset|spacing|24","bottom":"var:preset|spacing|24","left":"var:preset|spacing|24"}},"border":{"color":"var:preset|color|gray-03","width":"1px","radius":"8px"}},"fontSize":"medium-paragraph"} -->
<details class="wp-block-details has-border-color has-medium-paragraph-font-size" style="border-color:var(--wp--preset--color--gray-03);border-width:1px;border-radius:8px;padding-top:var(--wp--preset--spacing--24);padding-right:var(--wp--preset--spacing--24);padding-bottom:var(--wp--preset--spacing--24);padding-left:var(--wp--preset--spacing--24)"><summary><?php echo esc_html( $blockspire_faq['question'] ); ?></summary><!-- wp:paragraph {"style":{"typography":{"lineHeight":"var:custom|line-height|paragraph-medium"}},"textColor":"text-color","fontSize":"medium-paragraph"} -->
<p class="has-text-color-color has-text-color has-medium-paragraph-font-size" style="line-height:var(--wp--custom--line-height--paragraph-medium)"><?php echo esc_html( $blockspire_faq['answer'] ); ?></p>
<!-- /wp:paragraph --></details>
<!-- /wp:details -->
<?php endforeach; ?>
</div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->
