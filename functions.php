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
	 * Enqueues the scroll-back-to-top behaviour.
	 *
	 * The only script the theme ships. It is deferred and dependency-free; the
	 * button it drives renders hidden, so nothing appears if this never runs.
	 *
	 * @since 1.0.0
	 * @return void
	 */
	function blockspire_enqueue_scripts() {
		wp_enqueue_script(
			'blockspire-scroll-to-top',
			get_theme_file_uri( 'assets/js/scroll-to-top.js' ),
			array(),
			wp_get_theme()->get( 'Version' ),
			array(
				'strategy'  => 'defer',
				'in_footer' => true,
			)
		);
	}
}
add_action( 'wp_enqueue_scripts', 'blockspire_enqueue_scripts' );

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
