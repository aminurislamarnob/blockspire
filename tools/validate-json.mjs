#!/usr/bin/env node
// Validates theme.json and every style variation in styles/ against the
// settings keys WordPress actually recognises, catching silently-ignored keys
// (the class of bug where a typo'd key parses fine but does nothing).
// Dev tooling only - not shipped in the theme zip.
// Usage: node tools/validate-json.mjs

import { readFileSync, readdirSync, existsSync } from 'node:fs';
import { join } from 'node:path';

// Mirrors WP_Theme_JSON::VALID_SETTINGS (WordPress 6.7+).
const VALID_SETTINGS = {
	appearanceTools: null,
	useRootPaddingAwareAlignments: null,
	background: [ 'backgroundImage', 'backgroundSize', 'gradient' ],
	border: [ 'color', 'radius', 'radiusSizes', 'style', 'width' ],
	color: [
		'background', 'custom', 'customDuotone', 'customGradient', 'defaultDuotone',
		'defaultGradients', 'defaultPalette', 'duotone', 'gradients', 'link',
		'heading', 'button', 'caption', 'palette', 'text',
	],
	custom: null,
	dimensions: [
		'aspectRatio', 'aspectRatios', 'defaultAspectRatios', 'dimensionSizes',
		'height', 'minHeight', 'minWidth', 'width',
	],
	layout: [ 'contentSize', 'wideSize', 'allowEditing', 'allowCustomContentAndWideSize' ],
	lightbox: [ 'enabled', 'allowEditing' ],
	position: [ 'fixed', 'sticky' ],
	blockVisibility: [ 'allowEditing' ],
	spacing: [
		'customSpacingSize', 'defaultSpacingSizes', 'spacingSizes', 'spacingScale',
		'blockGap', 'margin', 'padding', 'units',
	],
	shadow: [ 'presets', 'defaultPresets' ],
	typography: [
		'fluid', 'customFontSize', 'defaultFontSizes', 'dropCap', 'fontFamilies',
		'fontSizes', 'fontStyle', 'fontWeight', 'letterSpacing', 'lineHeight',
		'textAlign', 'textColumns', 'textDecoration', 'textIndent', 'textTransform',
		'writingMode',
	],
	viewport: [ 'mobile', 'tablet' ],
};

// A fontSizes preset only ever emits font-size; anything else here is ignored.
const VALID_FONT_SIZE_KEYS = [ 'name', 'slug', 'size', 'fluid' ];

const errors = [];
const warnings = [];

function checkSettings( settings, file ) {
	for ( const [ key, value ] of Object.entries( settings ?? {} ) ) {
		if ( ! ( key in VALID_SETTINGS ) ) {
			errors.push( `${ file }: unknown settings key "${ key }" - WordPress will ignore it` );
			continue;
		}
		const allowed = VALID_SETTINGS[ key ];
		if ( ! allowed || typeof value !== 'object' || Array.isArray( value ) ) continue;
		for ( const sub of Object.keys( value ) ) {
			if ( ! allowed.includes( sub ) ) {
				errors.push( `${ file }: unknown settings.${ key } key "${ sub }" - WordPress will ignore it` );
			}
		}
	}

	for ( const preset of settings?.typography?.fontSizes ?? [] ) {
		for ( const key of Object.keys( preset ) ) {
			if ( ! VALID_FONT_SIZE_KEYS.includes( key ) ) {
				errors.push(
					`${ file }: fontSizes["${ preset.slug ?? '?' }"] has "${ key }" - font-size presets only emit font-size; move it to styles`
				);
			}
		}
	}
}

function checkPadding( styles, file ) {
	const padding = styles?.spacing?.padding;
	if ( ! padding ) return;
	for ( const key of Object.keys( padding ) ) {
		if ( ! [ 'top', 'right', 'bottom', 'left' ].includes( key ) ) {
			errors.push( `${ file }: styles.spacing.padding has "${ key }" - expected top/right/bottom/left` );
		}
	}
}

// Core scans styles/ recursively, so this must too.
function findJson( dir ) {
	return readdirSync( dir, { withFileTypes: true } ).flatMap( ( entry ) => {
		const path = join( dir, entry.name );
		if ( entry.isDirectory() ) return findJson( path );
		return entry.name.endsWith( '.json' ) ? [ path ] : [];
	} );
}

const files = [ 'theme.json' ];
if ( existsSync( 'styles' ) ) {
	files.push( ...findJson( 'styles' ) );
}

for ( const file of files ) {
	let json;
	try {
		json = JSON.parse( readFileSync( file, 'utf8' ) );
	} catch ( e ) {
		errors.push( `${ file }: invalid JSON - ${ e.message }` );
		continue;
	}
	if ( json.version !== 3 ) {
		warnings.push( `${ file }: version is ${ json.version }, expected 3` );
	}
	checkSettings( json.settings, file );
	checkPadding( json.styles, file );
	console.log( `checked ${ file }` );
}

for ( const w of warnings ) console.log( `WARN  ${ w }` );
for ( const e of errors ) console.log( `ERROR ${ e }` );

console.log( `\n${ files.length } file(s), ${ errors.length } error(s), ${ warnings.length } warning(s)` );
process.exit( errors.length ? 1 : 0 );
