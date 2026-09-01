<?php
/**
 * Blockspire theme setup.
 *
 * Design tokens, element styles and block style variations all live in
 * theme.json and styles/. This file only handles what theme.json cannot:
 * theme supports and pattern category registration.
 *
 * Block themes already receive post-thumbnails, responsive-embeds,
 * editor-styles, html5 and automatic-feed-links from core
 * (see _add_default_theme_supports()), so those are deliberately not repeated.
 *
 * @package Blockspire
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'blockspire_setup' ) ) {
	/**
	 * Registers theme supports and loads translations.
	 *
	 * @since 1.0.0
	 * @return void
	 */
	function blockspire_setup() {
		load_theme_textdomain( 'blockspire', get_template_directory() . '/languages' );

		/*
		 * Opt in to WooCommerce so its block templates resolve against this
		 * theme rather than falling back to the shop's own default styling.
		 */
		add_theme_support( 'woocommerce' );
	}
}
add_action( 'after_setup_theme', 'blockspire_setup' );

if ( ! function_exists( 'blockspire_register_pattern_categories' ) ) {
	/**
	 * Registers the pattern categories used by the bundled patterns.
	 *
	 * @since 1.0.0
	 * @return void
	 */
	function blockspire_register_pattern_categories() {
		$categories = array(
			'blockspire-hero'         => __( 'Blockspire: Hero', 'blockspire' ),
			'blockspire-services'     => __( 'Blockspire: Services', 'blockspire' ),
			'blockspire-features'     => __( 'Blockspire: Features', 'blockspire' ),
			'blockspire-testimonials' => __( 'Blockspire: Testimonials', 'blockspire' ),
			'blockspire-team'         => __( 'Blockspire: Team', 'blockspire' ),
			'blockspire-pricing'      => __( 'Blockspire: Pricing', 'blockspire' ),
			'blockspire-faq'          => __( 'Blockspire: FAQ', 'blockspire' ),
			'blockspire-cta'          => __( 'Blockspire: Call to Action', 'blockspire' ),
			'blockspire-contact'      => __( 'Blockspire: Contact', 'blockspire' ),
			'blockspire-blog'         => __( 'Blockspire: Blog', 'blockspire' ),
			'blockspire-pages'        => __( 'Blockspire: Pages', 'blockspire' ),
			'blockspire-shop'         => __( 'Blockspire: Shop', 'blockspire' ),
		);

		foreach ( $categories as $slug => $label ) {
			register_block_pattern_category( $slug, array( 'label' => $label ) );
		}
	}
}
add_action( 'init', 'blockspire_register_pattern_categories' );

if ( ! function_exists( 'blockspire_enqueue_scripts' ) ) {
	/**
	 * Enqueues the scroll-to-top script and registers the block-bound ones.
	 *
	 * All three behaviours are deferred and all are enhancements only: the
	 * scroll-to-top button renders hidden, a counting figure is already
	 * written out at its final value, and the testimonial strip scrolls and
	 * snaps in plain CSS — the script only adds its page dots. Nothing is
	 * missing if any never runs.
	 *
	 * Only scroll-to-top loads everywhere, because its button is printed on
	 * every page. The counter and carousel scripts are registered here and
	 * enqueued by blockspire_enqueue_block_scripts() the moment a block that
	 * needs them renders — the block template is rendered before wp_head(),
	 * so a mid-render enqueue still prints normally.
	 *
	 * @since 1.0.0
	 * @return void
	 */
	function blockspire_enqueue_scripts() {
		$blockspire_version = wp_get_theme()->get( 'Version' );

		wp_enqueue_script(
			'blockspire-scroll-to-top',
			get_theme_file_uri( 'assets/js/scroll-to-top.js' ),
			array(),
			$blockspire_version,
			array(
				'strategy'  => 'defer',
				'in_footer' => true,
			)
		);

		wp_register_script(
			'blockspire-counter-up',
			get_theme_file_uri( 'assets/js/counter-up.js' ),
			array(),
			$blockspire_version,
			array(
				'strategy'  => 'defer',
				'in_footer' => true,
			)
		);

		wp_register_script(
			'blockspire-carousel',
			get_theme_file_uri( 'assets/js/carousel.js' ),
			array( 'wp-i18n' ),
			$blockspire_version,
			array(
				'strategy'  => 'defer',
				'in_footer' => true,
			)
		);
		wp_set_script_translations( 'blockspire-carousel', 'blockspire' );
	}
}
add_action( 'wp_enqueue_scripts', 'blockspire_enqueue_scripts' );

if ( ! function_exists( 'blockspire_enqueue_block_scripts' ) ) {
	/**
	 * Enqueues a block-bound script when a block that needs it renders.
	 *
	 * Watching the renderer rather than the post content is what keeps this
	 * reliable: the marker class is found whether it arrives from a pattern
	 * file, from a template a user saved in the Site Editor (which flattens
	 * every pattern reference into static markup), or from a pattern pasted
	 * into a post. has_block() would miss the first two entirely.
	 *
	 * @since 1.0.0
	 * @param string $blockspire_content The block's rendered HTML.
	 * @param array  $blockspire_block   The parsed block.
	 * @return string The rendered HTML, unchanged.
	 */
	function blockspire_enqueue_block_scripts( $blockspire_content, $blockspire_block ) {
		$blockspire_classes = isset( $blockspire_block['attrs']['className'] ) ? $blockspire_block['attrs']['className'] : '';

		if ( '' === $blockspire_classes ) {
			return $blockspire_content;
		}

		if ( false !== strpos( $blockspire_classes, 'blockspire-carousel' ) ) {
			wp_enqueue_script( 'blockspire-carousel' );
		}

		if ( false !== strpos( $blockspire_classes, 'is-style-counter' ) ) {
			wp_enqueue_script( 'blockspire-counter-up' );
		}

		return $blockspire_content;
	}
}
add_filter( 'render_block_core/group', 'blockspire_enqueue_block_scripts', 10, 2 );
add_filter( 'render_block_core/paragraph', 'blockspire_enqueue_block_scripts', 10, 2 );

if ( ! function_exists( 'blockspire_unhook_customer_account' ) ) {
	/**
	 * Stops WooCommerce injecting a second account icon after the navigation.
	 *
	 * WooCommerce hooks both its customer-account and mini-cart blocks after
	 * core/navigation in header template parts. The header pattern places
	 * both explicitly inside the right-hand flex group, where the group's
	 * gap spaces them evenly against the call to action; hooked as a direct
	 * child of the space-between row instead, the account icon floats
	 * between the menu and the cart with whatever space is left over. The
	 * plugin skips its hooked mini-cart when the context already contains
	 * one, but performs no such check for the account icon, so without this
	 * filter the icon renders twice. Runs after WooCommerce's own callback.
	 *
	 * @since 1.0.0
	 * @param string[] $blockspire_hooked   Block names hooked at this point.
	 * @param string   $blockspire_position Relative position being filled.
	 * @param string   $blockspire_anchor   Anchor block name.
	 * @return string[] The hooked block names without the account icon.
	 */
	function blockspire_unhook_customer_account( $blockspire_hooked, $blockspire_position, $blockspire_anchor ) {
		if ( 'core/navigation' === $blockspire_anchor && 'after' === $blockspire_position ) {
			$blockspire_hooked = array_values( array_diff( $blockspire_hooked, array( 'woocommerce/customer-account' ) ) );
		}

		return $blockspire_hooked;
	}
}
add_filter( 'hooked_block_types', 'blockspire_unhook_customer_account', 20, 3 );

if ( ! function_exists( 'blockspire_render_scroll_to_top' ) ) {
	/**
	 * Prints the scroll-back-to-top control.
	 *
	 * Rendered here rather than in a template part so it is present on every
	 * view, including ones a user has customised. The label carries the whole
	 * accessible name; the arrow is a masked pseudo-element that follows
	 * currentColor, so it stays correct in every style variation.
	 *
	 * @since 1.0.0
	 * @return void
	 */
	function blockspire_render_scroll_to_top() {
		printf(
			'<button type="button" class="blockspire-scroll-top" hidden>%s</button>',
			'<span class="screen-reader-text">' . esc_html__( 'Scroll back to top', 'blockspire' ) . '</span>'
		);
	}
}
add_action( 'wp_footer', 'blockspire_render_scroll_to_top' );
