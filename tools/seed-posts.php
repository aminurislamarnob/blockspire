<?php
/**
 * Dev-only: seeds demo blog posts so the blog patterns can be reviewed with
 * real content. Run with: wp eval-file tools/seed-posts.php
 *
 * Not shipped — tools/ is excluded from the zip. Safe to re-run: posts are
 * matched on slug and updated in place. The featured images are the abstract
 * placeholders produced by tools/seed-images.mjs and imported with
 * `wp media import`; adjust the thumb IDs if your media library differs.
 *
 * @package Blockspire
 */

/**
 * Creates or updates the demo posts.
 *
 * @return void
 */
function blockspire_seed_posts() {
	$blockspire_posts = array(
		array(
			'slug'  => 'time-tracking-reports',
			'title' => 'Time tracking reports: why do you need time management?',
			'cat'   => 'Design',
			'thumb' => 109,
			'days'  => 2,
			'lead'  => 'Tracking time is not about proving you were busy. It is about noticing, months later, that the thing you keep saying is quick actually takes two days.',
		),
		array(
			'slug'  => 'proven-time-management-techniques',
			'title' => '15 most effective and proven time management techniques',
			'cat'   => 'Development',
			'thumb' => 110,
			'days'  => 6,
			'lead'  => 'Most advice on this subject is a list of apps. The techniques that survive contact with a real project are older and duller than that, and they work.',
		),
		array(
			'slug'  => 'designing-for-the-block-editor',
			'title' => 'Designing for the block editor without fighting it',
			'cat'   => 'Design',
			'thumb' => 111,
			'days'  => 11,
			'lead'  => 'The editor has opinions. A design that argues with all of them costs three times as much to build and breaks on the first core release.',
		),
		array(
			'slug'  => 'what-we-measure-after-a-launch',
			'title' => 'What we measure after a launch, and why',
			'cat'   => 'Performance',
			'thumb' => 112,
			'days'  => 17,
			'lead'  => 'A launch is the moment you stop guessing. These are the numbers we watch in the first fortnight, and the ones we deliberately ignore.',
		),
		array(
			'slug'  => 'accessibility-is-not-a-phase',
			'title' => 'Accessibility is not a phase at the end of the project',
			'cat'   => 'Accessibility',
			'thumb' => 113,
			'days'  => 24,
			'lead'  => 'Every audit we have been handed late has cost more than building it properly would have. The work is not hard; doing it last is what makes it hard.',
		),
	);

	foreach ( $blockspire_posts as $blockspire_item ) {
		$blockspire_term = term_exists( $blockspire_item['cat'], 'category' );

		if ( ! $blockspire_term ) {
			$blockspire_term = wp_insert_term( $blockspire_item['cat'], 'category' );
		}

		$blockspire_content = "<!-- wp:paragraph -->\n<p>" . $blockspire_item['lead'] . "</p>\n<!-- /wp:paragraph -->\n\n"
			. "<!-- wp:heading -->\n<h2 class=\"wp-block-heading\">Where the time actually goes</h2>\n<!-- /wp:heading -->\n\n"
			. "<!-- wp:paragraph -->\n<p>Write the scope down before anyone opens an editor. Read it back a week later. The gap between those two readings is the whole project, and it is the only part worth arguing about early.</p>\n<!-- /wp:paragraph -->\n\n"
			. "<!-- wp:quote -->\n<blockquote class=\"wp-block-quote\"><!-- wp:paragraph -->\n<p>The best decision we made was writing down what we were not going to build.</p>\n<!-- /wp:paragraph --></blockquote>\n<!-- /wp:quote -->\n\n"
			. "<!-- wp:paragraph -->\n<p>None of this is complicated. It is simply easier to skip, and skipping it is what turns a six week build into a four month one. Start with the boring parts and the interesting parts get cheaper.</p>\n<!-- /wp:paragraph -->";

		$blockspire_existing = get_page_by_path( $blockspire_item['slug'], OBJECT, 'post' );
		$blockspire_args     = array(
			'post_title'    => $blockspire_item['title'],
			'post_name'     => $blockspire_item['slug'],
			'post_content'  => $blockspire_content,
			'post_excerpt'  => $blockspire_item['lead'],
			'post_status'   => 'publish',
			'post_type'     => 'post',
			'post_author'   => 1,
			'post_date'     => gmdate( 'Y-m-d H:i:s', strtotime( '-' . $blockspire_item['days'] . ' days' ) ),
			'post_category' => array( (int) $blockspire_term['term_id'] ),
		);

		if ( $blockspire_existing ) {
			$blockspire_args['ID'] = $blockspire_existing->ID;
			$blockspire_id         = wp_update_post( $blockspire_args );
		} else {
			$blockspire_id = wp_insert_post( $blockspire_args );
		}

		if ( is_wp_error( $blockspire_id ) ) {
			WP_CLI::warning( $blockspire_item['slug'] . ': ' . $blockspire_id->get_error_message() );
			continue;
		}

		set_post_thumbnail( $blockspire_id, $blockspire_item['thumb'] );
		WP_CLI::log( sprintf( 'post %d  %-34s  %s', $blockspire_id, $blockspire_item['slug'], $blockspire_item['cat'] ) );
	}

	WP_CLI::success( 'Seeded ' . count( $blockspire_posts ) . ' posts.' );
}

blockspire_seed_posts();
