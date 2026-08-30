#!/usr/bin/env node
// WCAG contrast gate for every Blockspire palette: theme.json plus each
// theme style variation in styles/. The accessibility-ready tag requires AA
// in every variation, so this runs as a gate rather than a manual check.
// Dev tooling only - not shipped in the theme zip.
// Usage: node tools/contrast.mjs

import { readFileSync, readdirSync, existsSync } from 'node:fs';
import { join } from 'node:path';

const hex = ( h ) => h.replace( '#', '' ).match( /../g ).map( ( x ) => parseInt( x, 16 ) );

const lum = ( h ) =>
	hex( h )
		.map( ( v ) => v / 255 )
		.map( ( v ) => ( v <= 0.03928 ? v / 12.92 : ( ( v + 0.055 ) / 1.055 ) ** 2.4 ) )
		.reduce( ( a, c, i ) => a + c * [ 0.2126, 0.7152, 0.0722 ][ i ], 0 );

const ratio = ( a, b ) => {
	const [ x, y ] = [ lum( a ), lum( b ) ].sort( ( m, n ) => n - m );
	return ( x + 0.05 ) / ( y + 0.05 );
};

// [ foreground, background, minimum, label ]. 4.5 = AA normal text, 3 = AA
// large text and non-text UI such as borders and icons.
const PAIRS = [
	[ 'text-color', 'main-bg', 4.5, 'body text' ],
	[ 'heading-color', 'main-bg', 4.5, 'headings' ],
	[ 'link-color', 'main-bg', 4.5, 'links' ],
	[ 'text-color', 'light-bg', 4.5, 'body text on light panel' ],
	[ 'heading-color', 'light-bg', 4.5, 'headings on light panel' ],
	[ 'text-white', 'dark-bg', 4.5, 'footer text' ],
	[ 'gray-02', 'main-bg', 3, 'muted text (large only)' ],
	// The CTA band sets white text on the primary colour; its heading is
	// display size, so large-text 3:1 is the applicable minimum.
	[ 'text-white', 'primary', 3, 'band heading on primary (large)' ],
];

// Button text/background comes from styles.elements.button, which variations
// may override, so it is resolved per palette rather than hardcoded.
const paletteOf = ( json ) =>
	Object.fromEntries( ( json?.settings?.color?.palette ?? [] ).map( ( p ) => [ p.slug, p.color ] ) );

const resolve = ( value, palette ) => {
	if ( ! value ) return null;
	const m = /var\(--wp--preset--color--([a-z0-9-]+)\)/.exec( value );
	return m ? palette[ m[ 1 ] ] ?? null : value;
};

const base = JSON.parse( readFileSync( 'theme.json', 'utf8' ) );
const basePalette = paletteOf( base );

const variations = [ { name: 'theme.json (Default)', json: base } ];
if ( existsSync( 'styles' ) ) {
	for ( const file of readdirSync( 'styles' ).filter( ( f ) => f.endsWith( '.json' ) ) ) {
		const json = JSON.parse( readFileSync( join( 'styles', file ), 'utf8' ) );
		if ( json.blockTypes ) continue; // block style variation, not a theme palette
		variations.push( { name: `styles/${ file } (${ json.title ?? '?' })`, json } );
	}
}

let failures = 0;

for ( const { name, json } of variations ) {
	// A variation may override only some slugs; the rest fall through to base.
	const palette = { ...basePalette, ...paletteOf( json ) };
	const button = json?.styles?.elements?.button?.color ?? base?.styles?.elements?.button?.color;

	console.log( `\n${ name }` );
	console.log( '-'.repeat( name.length ) );

	const checks = [ ...PAIRS ];
	const btnText = resolve( button?.text, palette );
	const btnBg = resolve( button?.background, palette );
	if ( btnText && btnBg ) {
		checks.push( [ btnText, btnBg, 4.5, 'button label', true ] );
	}
	// Outline controls rely on their border to be identifiable as a control,
	// so that border is a UI component boundary and needs 3:1 (WCAG 1.4.11).
	if ( palette[ 'gray-02' ] && palette[ 'main-bg' ] ) {
		checks.push( [ 'gray-02', 'main-bg', 3, 'outline control border' ] );
	}

	for ( const [ fg, bg, min, label, literal ] of checks ) {
		const fgHex = literal ? fg : palette[ fg ];
		const bgHex = literal ? bg : palette[ bg ];
		if ( ! fgHex || ! bgHex ) {
			console.log( `  SKIP  ${ label } (missing slug)` );
			continue;
		}
		const r = ratio( fgHex, bgHex );
		const ok = r >= min;
		if ( ! ok ) failures++;
		console.log(
			`  ${ ok ? 'PASS' : 'FAIL' }  ${ label.padEnd( 26 ) } ${ fgHex } on ${ bgHex }  ${ r.toFixed( 2 ).padStart( 5 ) }:1  (needs ${ min })`
		);
	}

	if ( palette[ 'gray-03' ] && palette[ 'main-bg' ] ) {
		const r = ratio( palette[ 'gray-03' ], palette[ 'main-bg' ] );
		console.log( `  NOTE  ${ 'decorative divider'.padEnd( 26 ) } ${ palette[ 'gray-03' ] } on ${ palette[ 'main-bg' ] }  ${ r.toFixed( 2 ).padStart( 5 ) }:1  (exempt from 1.4.11 while purely decorative)` );
	}

	// Reported, not gated: accent is decorative and its safe usage is a
	// judgement call rather than a pass/fail.
	if ( palette.accent && palette[ 'main-bg' ] ) {
		const r = ratio( palette.accent, palette[ 'main-bg' ] );
		console.log(
			`  NOTE  ${ 'accent on main-bg'.padEnd( 26 ) } ${ palette.accent } on ${ palette[ 'main-bg' ] }  ${ r.toFixed( 2 ).padStart( 5 ) }:1  ${ r >= 4.5 ? '(safe for text)' : r >= 3 ? '(large text / non-text only)' : '(decorative fills only, never text)' }`
		);
	}
}

console.log( `\n${ variations.length } palette(s), ${ failures } failure(s)` );
process.exit( failures ? 1 : 0 );
