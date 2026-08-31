/**
 * Dev-only: renders abstract placeholder photographs for seeded blog posts.
 *
 * These are NOT shipped. They exist so the blog patterns can be reviewed with
 * real featured images instead of empty covers. Output lands in tools/tmp-seed/
 * and is meant to be imported into the local media library and then deleted.
 *
 * Run: node tools/seed-images.mjs
 */

import { mkdirSync, writeFileSync } from 'node:fs';
import { dirname, resolve } from 'node:path';
import { fileURLToPath } from 'node:url';
import sharp from 'sharp';

const here = dirname( fileURLToPath( import.meta.url ) );
const out = resolve( here, 'tmp-seed' );

const W = 1600;
const H = 900;

const dots = ( opacity, colour ) => `
	<pattern id="dots" width="24" height="24" patternUnits="userSpaceOnUse">
		<circle cx="3" cy="3" r="1.6" fill="${ colour }" fill-opacity="${ opacity }"/>
	</pattern>`;

const scenes = {
	'seed-editorial-1': `
		<defs>
			<radialGradient id="glow" cx="68%" cy="28%" r="62%">
				<stop offset="0%" stop-color="#2D5BDB" stop-opacity="0.9"/>
				<stop offset="100%" stop-color="#111B3A" stop-opacity="0"/>
			</radialGradient>
			${ dots( 0.13, '#FFFFFF' ) }
		</defs>
		<rect width="${ W }" height="${ H }" fill="#111B3A"/>
		<rect width="${ W }" height="${ H }" fill="url(#dots)"/>
		<rect width="${ W }" height="${ H }" fill="url(#glow)"/>
		<g fill="none" stroke="#FFFFFF" stroke-opacity="0.16" stroke-width="2">
			<circle cx="1096" cy="292" r="170"/>
			<circle cx="1096" cy="292" r="286"/>
			<circle cx="1096" cy="292" r="402"/>
		</g>
		<rect x="180" y="560" width="300" height="10" rx="5" fill="#FF9808"/>`,

	'seed-editorial-2': `
		<defs>${ dots( 0.5, '#C6C6C6' ) }</defs>
		<rect width="${ W }" height="${ H }" fill="#F4F4F4"/>
		<rect width="${ W }" height="${ H }" fill="url(#dots)"/>
		<circle cx="1180" cy="620" r="300" fill="#2D5BDB" fill-opacity="0.16"/>
		<rect x="240" y="180" width="520" height="520" rx="24" fill="#2D5BDB"/>
		<rect x="620" y="380" width="420" height="420" rx="24" fill="#111B3A" fill-opacity="0.9"/>
		<circle cx="1240" cy="240" r="96" fill="#FF9808"/>`,

	'seed-editorial-3': `
		<defs>
			<linearGradient id="sweep" x1="0" y1="0" x2="1" y2="1">
				<stop offset="0%" stop-color="#2D5BDB"/>
				<stop offset="100%" stop-color="#111B3A"/>
			</linearGradient>
		</defs>
		<rect width="${ W }" height="${ H }" fill="url(#sweep)"/>
		<g fill="none" stroke="#FFFFFF" stroke-opacity="0.22" stroke-width="3">
			<path d="M-100 720 C 300 420, 700 900, 1100 520 S 1500 240, 1750 420"/>
			<path d="M-100 820 C 300 520, 700 1000, 1100 620 S 1500 340, 1750 520"/>
			<path d="M-100 620 C 300 320, 700 800, 1100 420 S 1500 140, 1750 320"/>
		</g>
		<circle cx="1280" cy="220" r="120" fill="#FF9808" fill-opacity="0.9"/>`,

	'seed-editorial-4': `
		<defs>${ dots( 0.1, '#FFFFFF' ) }</defs>
		<rect width="${ W }" height="${ H }" fill="#111111"/>
		<rect width="${ W }" height="${ H }" fill="url(#dots)"/>
		<rect x="0" y="360" width="${ W }" height="180" fill="#FF9808"/>
		<rect x="820" y="120" width="420" height="660" rx="20" fill="#2D5BDB" fill-opacity="0.85"/>
		<g fill="none" stroke="#FFFFFF" stroke-opacity="0.25" stroke-width="2">
			<rect x="180" y="120" width="420" height="200" rx="16"/>
			<rect x="180" y="580" width="420" height="200" rx="16"/>
		</g>`,

	'seed-editorial-5': `
		<defs>${ dots( 0.45, '#C6C6C6' ) }</defs>
		<rect width="${ W }" height="${ H }" fill="#FFFFFF"/>
		<rect width="${ W }" height="${ H }" fill="url(#dots)"/>
		<path d="M0 900 L0 420 L520 120 L1080 520 L1600 200 L1600 900 Z" fill="#111B3A"/>
		<path d="M0 900 L0 620 L460 380 L1040 700 L1600 460 L1600 900 Z" fill="#2D5BDB" fill-opacity="0.92"/>
		<circle cx="1300" cy="180" r="88" fill="#FF9808"/>`,
};

mkdirSync( out, { recursive: true } );

for ( const [ name, body ] of Object.entries( scenes ) ) {
	const svg = `<svg xmlns="http://www.w3.org/2000/svg" width="${ W }" height="${ H }" viewBox="0 0 ${ W } ${ H }">${ body }</svg>`;
	const file = resolve( out, `${ name }.webp` );
	const buffer = await sharp( Buffer.from( svg ) ).webp( { quality: 82 } ).toBuffer();
	writeFileSync( file, buffer );
	console.log( `wrote ${ file } (${ Math.round( buffer.length / 1024 ) } KB)` );
}
