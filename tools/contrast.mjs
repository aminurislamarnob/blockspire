#!/usr/bin/env node
// WCAG contrast checker for the Blockspire palette.
// Dev tooling only - not shipped in the theme zip.
// Usage: node tools/contrast.mjs

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

const PALETTE = {
	'blue (figma actual)': '#2D5BDB',
	'blue (theme.json now)': '#007CF5',
	orange: '#FF9808',
	'gray-01': '#626368',
	'gray-02': '#8D8D8D',
	'gray-03': '#C6C6C6',
	'black (label)': '#12141D',
	'black (variable)': '#121927',
	'black (rendered)': '#111B3A',
};

const mark = ( r, big = false ) => ( r >= ( big ? 3 : 4.5 ) ? 'PASS' : 'FAIL' );

console.log( 'Contrast vs #FFFFFF - AA normal needs 4.5:1, large (24px / 18.66px bold) needs 3:1\n' );
for ( const [ name, color ] of Object.entries( PALETTE ) ) {
	const r = ratio( color, '#FFFFFF' );
	console.log(
		`${ name.padEnd( 24 ) } ${ color }  ${ r.toFixed( 2 ).padStart( 5 ) }:1   normal ${ mark( r ) }   large ${ mark( r, true ) }`
	);
}

console.log( '\nContrast vs #12141D (dark surfaces)\n' );
for ( const [ name, color ] of Object.entries( PALETTE ) ) {
	if ( name.startsWith( 'black' ) ) continue;
	const r = ratio( color, '#12141D' );
	console.log(
		`${ name.padEnd( 24 ) } ${ color }  ${ r.toFixed( 2 ).padStart( 5 ) }:1   normal ${ mark( r ) }   large ${ mark( r, true ) }`
	);
}
