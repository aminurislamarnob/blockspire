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
		);

		foreach ( $categories as $slug => $label ) {
			register_block_pattern_category( $slug, array( 'label' => $label ) );
		}
	}
}
add_action( 'init', 'blockspire_register_pattern_categories' );
