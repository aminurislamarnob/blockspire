<?php
/**
 * Title: Frequently asked questions
 * Slug: blockspire/faq
 * Categories: blockspire-faq
 * Description: A stack of expandable questions and answers built on the Details block, so it works without any JavaScript.
 * Keywords: faq, questions, answers, accordion, help
 * Viewport Width: 1600
 *
 * @package Blockspire
 * @since 1.0.0
 */

$blockspire_faqs = array(
	array(
		'question' => __( 'How long does a project usually take?', 'blockspire' ),
		'answer'   => __( 'Most sites take six to ten weeks from the first conversation to launch. We give you a dated plan before any work starts, and tell you early if anything threatens it.', 'blockspire' ),
	),
	array(
		'question' => __( 'What do you need from us to begin?', 'blockspire' ),
		'answer'   => __( 'An idea of what the site has to achieve, whatever brand material you already have, and one person on your side who can make decisions. We handle the rest.', 'blockspire' ),
	),
	array(
		'question' => __( 'Can you work with our existing site?', 'blockspire' ),
		'answer'   => __( 'Often, yes. We start with a short audit and tell you honestly whether improving what you have is better value than starting again.', 'blockspire' ),
	),
	array(
		'question' => __( 'What happens after launch?', 'blockspire' ),
		'answer'   => __( 'You own everything we build. We offer ongoing care plans if you want them, but you are never locked in and you can take the site elsewhere at any point.', 'blockspire' ),
	),
);

?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|80","bottom":"var:preset|spacing|100"},"blockGap":"var:preset|spacing|48"}},"layout":{"type":"constrained","contentSize":"800px"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--80);padding-bottom:var(--wp--preset--spacing--100)"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|24"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"align":"center","style":{"typography":{"fontWeight":"700","lineHeight":"var:custom|line-height|title-medium"}},"textColor":"gray-02","fontSize":"medium-title"} -->
<p class="has-text-align-center has-gray-02-color has-text-color has-medium-title-font-size" style="font-weight:700;line-height:var(--wp--custom--line-height--title-medium)"><?php echo esc_html__( 'FAQ', 'blockspire' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"textAlign":"center","style":{"typography":{"lineHeight":"var:custom|line-height|heading-03"}},"fontSize":"heading-03"} -->
<h2 class="wp-block-heading has-text-align-center has-heading-03-font-size" style="line-height:var(--wp--custom--line-height--heading-03)"><?php echo esc_html__( 'Questions we hear often', 'blockspire' ); ?></h2>
<!-- /wp:heading --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|16"}},"layout":{"type":"default"}} -->
<div class="wp-block-group">
<?php foreach ( $blockspire_faqs as $blockspire_faq ) : ?>
<!-- wp:details {"style":{"spacing":{"padding":{"top":"var:preset|spacing|24","right":"var:preset|spacing|24","bottom":"var:preset|spacing|24","left":"var:preset|spacing|24"}},"border":{"color":"var:preset|color|gray-03","width":"1px","radius":"8px"}},"fontSize":"medium-paragraph"} -->
<details class="wp-block-details has-border-color has-medium-paragraph-font-size" style="border-color:var(--wp--preset--color--gray-03);border-width:1px;border-radius:8px;padding-top:var(--wp--preset--spacing--24);padding-right:var(--wp--preset--spacing--24);padding-bottom:var(--wp--preset--spacing--24);padding-left:var(--wp--preset--spacing--24)"><summary><?php echo esc_html( $blockspire_faq['question'] ); ?></summary><!-- wp:paragraph {"style":{"typography":{"lineHeight":"var:custom|line-height|paragraph-medium"}},"textColor":"text-color","fontSize":"medium-paragraph"} -->
<p class="has-text-color-color has-text-color has-medium-paragraph-font-size" style="line-height:var(--wp--custom--line-height--paragraph-medium)"><?php echo esc_html( $blockspire_faq['answer'] ); ?></p>
<!-- /wp:paragraph --></details>
<!-- /wp:details -->
<?php endforeach; ?>
</div>
<!-- /wp:group --></div>
<!-- /wp:group -->
