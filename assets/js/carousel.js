/**
 * Turns a .blockspire-carousel strip into a paged slider.
 *
 * The strip itself is plain CSS — overflow scrolling with snap points — so it
 * works in full without this script: swipe, trackpad and scrollbar all behave.
 * This file only adds the page dots and keeps them in sync, which is why it
 * builds them here instead of shipping static markup that could lie when
 * JavaScript never runs.
 *
 * The dots are also the keyboard interface: each one is a real button that
 * scrolls its page into view, so every slide is reachable without a pointer
 * and the strip needs no tabindex of its own.
 *
 * @package Blockspire
 * @since 1.0.0
 */

( function () {
	'use strict';

	var reduceMotion = window.matchMedia && window.matchMedia( '(prefers-reduced-motion: reduce)' ).matches;
	var hasI18n      = window.wp && window.wp.i18n;

	var __ = hasI18n ? window.wp.i18n.__ : function ( text ) {
		return text;
	};

	var sprintf = hasI18n ? window.wp.i18n.sprintf : function ( text, number ) {
		return text.replace( '%d', number );
	};

	/**
	 * Wires one carousel strip.
	 *
	 * @param {HTMLElement} track The scrolling element.
	 */
	function setup( track ) {
		var nav  = document.createElement( 'div' );
		var dots = [];
		var isRtl = 'rtl' === window.getComputedStyle( track ).direction;
		var scheduled = false;
		var resizeTimer;
		var animationId = 0;

		if ( ! track.children.length ) {
			return;
		}

		nav.className = 'blockspire-carousel-nav';
		nav.setAttribute( 'role', 'group' );
		nav.setAttribute( 'aria-label', __( 'Choose a testimonial page', 'blockspire' ) );
		track.after( nav );

		function metrics() {
			var cards = track.children.length;
			var first = track.children[ 0 ];
			var step  = cards > 1 ? Math.abs( track.children[ 1 ].offsetLeft - first.offsetLeft ) : first.offsetWidth;
			var gap   = step - first.offsetWidth;
			var perView = Math.max( 1, Math.floor( ( track.clientWidth + gap ) / step ) );

			return {
				pages: Math.max( 1, Math.ceil( cards / perView ) ),
				pageStep: perView * step,
			};
		}

		function currentPage() {
			return Math.min( dots.length - 1, Math.round( Math.abs( track.scrollLeft ) / metrics().pageStep ) );
		}

		function sync() {
			var active = currentPage();

			dots.forEach( function ( dot, index ) {
				if ( index === active ) {
					dot.setAttribute( 'aria-current', 'true' );
				} else {
					dot.removeAttribute( 'aria-current' );
				}
			} );
		}

		function cancelGlide() {
			animationId++;
			track.style.scrollSnapType = '';
		}

		function glideTo( target ) {
			var start  = track.scrollLeft;
			var change = target - start;
			var id     = ++animationId;
			var t0     = null;

			if ( reduceMotion || ! window.requestAnimationFrame || Math.abs( change ) < 1 ) {
				track.scrollLeft = target;
				return;
			}

			// Scripted smooth scrolling cannot be trusted here: browsers with it
			// disabled no-op the call, and mandatory snap re-targets every write
			// to the nearest card. So the glide is driven by hand, with snap
			// paused for the ride — the landing position is a card boundary, so
			// restoring it does not move anything.
			track.style.scrollSnapType = 'none';

			window.requestAnimationFrame( function step( now ) {
				if ( id !== animationId ) {
					return;
				}

				if ( null === t0 ) {
					t0 = now;
				}

				var progress = Math.min( 1, ( now - t0 ) / 450 );

				track.scrollLeft = start + change * ( 1 - Math.pow( 1 - progress, 3 ) );

				if ( progress < 1 ) {
					window.requestAnimationFrame( step );
				} else {
					// Restoring snap alone makes Chrome glide back to the snap
					// target it remembered from before the ride, and writing the
					// same position back is a no-op that re-anchors nothing. A
					// write 1px short of the landing forces the snap engine to
					// coerce it — instantly — onto the boundary and adopt it.
					track.style.scrollSnapType = '';
					void track.offsetWidth;
					track.scrollLeft = target > start ? target - 1 : target + 1;
				}
			} );
		}

		function goTo( index ) {
			var left = Math.min( index * metrics().pageStep, track.scrollWidth - track.clientWidth );

			glideTo( isRtl ? -left : left );
		}

		function build() {
			var count = metrics().pages;

			if ( count === dots.length ) {
				sync();
				return;
			}

			dots = [];
			nav.textContent = '';
			nav.hidden = count < 2;

			for ( var i = 0; i < count; i++ ) {
				var dot = document.createElement( 'button' );

				dot.type = 'button';
				dot.className = 'blockspire-carousel-dot';
				/* translators: %d: page number in the testimonial slider. */
				dot.setAttribute( 'aria-label', sprintf( __( 'Go to testimonial page %d', 'blockspire' ), i + 1 ) );
				dot.addEventListener( 'click', goTo.bind( null, i ) );
				nav.appendChild( dot );
				dots.push( dot );
			}

			sync();
		}

		// A wheel or a finger takes over from a running glide immediately.
		track.addEventListener( 'wheel', cancelGlide, { passive: true } );
		track.addEventListener( 'touchstart', cancelGlide, { passive: true } );

		track.addEventListener( 'scroll', function () {
			if ( scheduled ) {
				return;
			}

			scheduled = true;
			window.requestAnimationFrame( function () {
				scheduled = false;
				sync();
			} );
		}, { passive: true } );

		window.addEventListener( 'resize', function () {
			window.clearTimeout( resizeTimer );
			resizeTimer = window.setTimeout( build, 150 );
		} );

		build();
	}

	var tracks = document.querySelectorAll( '.blockspire-carousel' );

	for ( var i = 0; i < tracks.length; i++ ) {
		setup( tracks[ i ] );
	}
} )();
