/**
 * Reveals the scroll-back-to-top control once the page has scrolled, and sends
 * keyboard focus back to the top of the document when it is used.
 *
 * The button ships with the `hidden` attribute so it never appears without
 * JavaScript, where it could not do anything.
 *
 * @package Blockspire
 * @since 1.0.0
 */

( function () {
	'use strict';

	var button = document.querySelector( '.blockspire-scroll-top' );

	if ( ! button ) {
		return;
	}

	// Roughly one viewport: far enough that "back to top" is worth offering.
	var threshold = Math.max( 400, window.innerHeight * 0.75 );
	var pending = false;

	function sync() {
		pending = false;

		var scrolled = window.scrollY || document.documentElement.scrollTop;
		var shouldShow = scrolled > threshold;

		if ( shouldShow === ! button.hidden ) {
			return;
		}

		button.hidden = ! shouldShow;
	}

	function onScroll() {
		if ( pending ) {
			return;
		}

		pending = true;
		window.requestAnimationFrame( sync );
	}

	function prefersReducedMotion() {
		return (
			window.matchMedia &&
			window.matchMedia( '(prefers-reduced-motion: reduce)' ).matches
		);
	}

	button.addEventListener( 'click', function () {
		/*
		 * Scrolling alone leaves the tab order where it was, so a keyboard user
		 * would carry on from the middle of the page. Hand focus to the same
		 * landmark the skip link uses, then put its tabindex back.
		 *
		 * This has to happen *before* the scroll: moving focus cancels a smooth
		 * scroll already in flight, which stranded the page part-way up.
		 */
		var target =
			document.getElementById( 'wp--skip-link--target' ) || document.body;

		target.setAttribute( 'tabindex', '-1' );
		target.focus( { preventScroll: true } );
		target.addEventListener( 'blur', function restore() {
			target.removeAttribute( 'tabindex' );
			target.removeEventListener( 'blur', restore );
		} );

		window.scrollTo( {
			top: 0,
			behavior: prefersReducedMotion() ? 'auto' : 'smooth',
		} );
	} );

	window.addEventListener( 'scroll', onScroll, { passive: true } );
	window.addEventListener( 'resize', function () {
		threshold = Math.max( 400, window.innerHeight * 0.75 );
		onScroll();
	}, { passive: true } );

	sync();
}() );
