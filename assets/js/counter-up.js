/**
 * Counts a figure up from zero the first time it scrolls into view.
 *
 * Progressive enhancement throughout: the finished figure is what sits in the
 * markup, and nothing here runs without JavaScript, without
 * IntersectionObserver, or when the visitor has asked for reduced motion. The
 * DOM is only rewritten at the moment a figure is about to animate, so an
 * element that is never reached is never left showing a zero.
 *
 * @package Blockspire
 * @since 1.0.0
 */

( function () {
	'use strict';

	if ( ! ( 'IntersectionObserver' in window ) ) {
		return;
	}

	if (
		window.matchMedia &&
		window.matchMedia( '(prefers-reduced-motion: reduce)' ).matches
	) {
		return;
	}

	var counters = document.querySelectorAll( '.is-style-counter' );

	if ( ! counters.length ) {
		return;
	}

	var DURATION = 1400;

	/**
	 * Splits a figure such as "230+" into the parts we have to put back.
	 *
	 * Only shapes we can rebuild without guessing are accepted: a plain
	 * integer, an integer grouped in threes, or a decimal with one separator.
	 * Anything else (a range, two numbers, "1.5M") returns null and is left
	 * exactly as the author wrote it.
	 *
	 * @param {string} text Trimmed text content of the element.
	 * @return {Object|null} Parsed parts, or null when the figure is not one we
	 *                       can safely rebuild.
	 */
	function parse( text ) {
		var match = text.match( /^(\D*)(\d[\d.,\u202F\u00A0 ]*\d|\d)(\D*)$/ );

		if ( ! match ) {
			return null;
		}

		var token = match[ 2 ];
		var spec = {
			prefix: match[ 1 ],
			suffix: match[ 3 ],
			decimals: 0,
			separator: '',
		};

		/*
		 * Grouped first, so "1,200" is read as twelve hundred rather than as
		 * one-point-two. A decimal group is never exactly three digits long in
		 * the figures this is meant for.
		 */
		if ( /^\d{1,3}(?:[.,\u202F\u00A0 ]\d{3})+$/.test( token ) ) {
			spec.separator = token.replace( /\d/g, '' ).charAt( 0 );
			spec.value = parseInt( token.replace( /\D/g, '' ), 10 );
		} else if ( /^\d+[.,]\d+$/.test( token ) ) {
			spec.separator = token.replace( /\d/g, '' );
			spec.decimals = token.split( spec.separator )[ 1 ].length;
			spec.value = parseFloat( token.replace( spec.separator, '.' ) );
		} else if ( /^\d+$/.test( token ) ) {
			spec.value = parseInt( token, 10 );
		} else {
			return null;
		}

		return isFinite( spec.value ) ? spec : null;
	}

	/**
	 * Renders an intermediate value the way the author wrote the final one.
	 *
	 * @param {number} current Value to render.
	 * @param {Object} spec    Parts returned by parse().
	 * @return {string} The formatted figure.
	 */
	function format( current, spec ) {
		var text;

		if ( spec.decimals ) {
			text = current
				.toFixed( spec.decimals )
				.replace( '.', spec.separator );
		} else {
			text = String( Math.round( current ) );

			if ( spec.separator ) {
				text = text.replace(
					/\B(?=(\d{3})+(?!\d))/g,
					spec.separator
				);
			}
		}

		return spec.prefix + text + spec.suffix;
	}

	/**
	 * Animates one figure.
	 *
	 * The counting text is hidden from assistive technology and the finished
	 * figure is offered beside it, so a screen reader announces the value once
	 * rather than reading whatever number the animation happens to be on.
	 *
	 * @param {Element} element Element holding the figure.
	 * @param {Object}  spec    Parts returned by parse().
	 * @return {void}
	 */
	function run( element, spec ) {
		var visual = document.createElement( 'span' );
		var label = document.createElement( 'span' );

		visual.setAttribute( 'aria-hidden', 'true' );
		visual.textContent = format( 0, spec );

		label.className = 'screen-reader-text';
		label.textContent = element.textContent.trim();

		element.textContent = '';
		element.appendChild( visual );
		element.appendChild( label );

		var start;

		function step( now ) {
			if ( undefined === start ) {
				start = now;
			}

			var elapsed = Math.min( 1, ( now - start ) / DURATION );
			// Ease out, so the figure settles rather than stopping dead.
			var eased = 1 - Math.pow( 1 - elapsed, 3 );

			visual.textContent = format( spec.value * eased, spec );

			if ( elapsed < 1 ) {
				window.requestAnimationFrame( step );
			}
		}

		window.requestAnimationFrame( step );
	}

	var observer = new IntersectionObserver(
		function ( entries ) {
			entries.forEach( function ( entry ) {
				if ( ! entry.isIntersecting ) {
					return;
				}

				observer.unobserve( entry.target );

				var spec = parse( entry.target.textContent.trim() );

				if ( spec ) {
					run( entry.target, spec );
				}
			} );
		},
		{ threshold: 0.4 }
	);

	Array.prototype.forEach.call( counters, function ( element ) {
		observer.observe( element );
	} );
}() );
