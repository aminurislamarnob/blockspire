#!/usr/bin/env node
// Converts source photography in assets/images/src/ to size-capped WebP in
// assets/images/, which is what patterns reference. Keeps the shipped theme
// small: wp.org forbids remote images, so every photo travels in the zip.
// Dev tooling only - not shipped in the theme zip.
// Usage: node tools/convert-images.mjs [--width 1600] [--quality 78]

import { existsSync, mkdirSync, readdirSync, statSync } from 'node:fs';
import { join, parse } from 'node:path';
import sharp from 'sharp';

const SRC_DIR = 'assets/images/src';
const OUT_DIR = 'assets/images';

const arg = ( name, fallback ) => {
	const i = process.argv.indexOf( `--${ name }` );
	return i === -1 ? fallback : Number( process.argv[ i + 1 ] );
};

const maxWidth = arg( 'width', 1600 );
const quality = arg( 'quality', 78 );

if ( ! existsSync( SRC_DIR ) ) {
	console.log( `No ${ SRC_DIR } directory yet - add source photos there and re-run.` );
	process.exit( 0 );
}

mkdirSync( OUT_DIR, { recursive: true } );

const sources = readdirSync( SRC_DIR ).filter( ( f ) => /\.(jpe?g|png|webp|tiff?)$/i.test( f ) );

if ( ! sources.length ) {
	console.log( `No source images in ${ SRC_DIR }.` );
	process.exit( 0 );
}

const kb = ( n ) => `${ ( n / 1024 ).toFixed( 1 ) } KB`;
let before = 0;
let after = 0;

for ( const file of sources ) {
	const src = join( SRC_DIR, file );
	const dest = join( OUT_DIR, `${ parse( file ).name }.webp` );

	await sharp( src )
		.resize( { width: maxWidth, withoutEnlargement: true } )
		.webp( { quality } )
		.toFile( dest );

	const inSize = statSync( src ).size;
	const outSize = statSync( dest ).size;
	before += inSize;
	after += outSize;

	console.log( `${ file.padEnd( 34 ) } ${ kb( inSize ).padStart( 10 ) }  ->  ${ kb( outSize ).padStart( 10 ) }` );
}

console.log( `\nTotal ${ kb( before ) } -> ${ kb( after ) } across ${ sources.length } image(s).` );
console.log( 'Remember to record each photo\'s source URL and CC0 licence in readme.txt.' );
