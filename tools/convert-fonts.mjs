#!/usr/bin/env node
// Converts bundled TTF webfonts to WOFF2 and reports the size saving.
// Dev tooling only - not shipped in the theme zip.
// Usage: node tools/convert-fonts.mjs [--keep-ttf]

import { readdirSync, readFileSync, writeFileSync, statSync, unlinkSync } from 'node:fs';
import { join } from 'node:path';
import ttf2woff2 from 'ttf2woff2';

const FONT_DIR = 'assets/fonts';
const keepTtf = process.argv.includes( '--keep-ttf' );

const kb = ( n ) => `${ ( n / 1024 ).toFixed( 1 ) } KB`;

const ttfs = readdirSync( FONT_DIR ).filter( ( f ) => f.toLowerCase().endsWith( '.ttf' ) );

if ( ! ttfs.length ) {
	console.log( 'No TTF files found in %s - nothing to do.', FONT_DIR );
	process.exit( 0 );
}

let before = 0;
let after = 0;

for ( const file of ttfs ) {
	const src = join( FONT_DIR, file );
	const dest = src.replace( /\.ttf$/i, '.woff2' );
	const input = readFileSync( src );
	const output = ttf2woff2( input );

	writeFileSync( dest, output );
	before += input.length;
	after += output.length;

	console.log(
		`${ file.padEnd( 26 ) } ${ kb( input.length ).padStart( 9 ) }  ->  ${ kb( output.length ).padStart( 9 ) }  (-${ Math.round( ( 1 - output.length / input.length ) * 100 ) }%)`
	);

	if ( ! keepTtf ) {
		unlinkSync( src );
	}
}

console.log(
	`\nTotal ${ kb( before ) } -> ${ kb( after ) }  (saved ${ kb( before - after ) }, -${ Math.round( ( 1 - after / before ) * 100 ) }%)`
);
console.log( keepTtf ? 'TTF originals kept.' : 'TTF originals removed.' );
