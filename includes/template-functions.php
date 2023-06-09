<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function toc_body_classes( $classes ) {
	global $post;

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of page-{slug} for every page.
	if ( isset( $post ) ) {
		$classes[] = 'page-' . $post->post_name;

		if ( is_front_page() ) {
			$classes[] = 'page-front';
		}
	}

	// Adds a class of has-post-thumbnail if the page has a featured image.
	if ( ( is_single() || is_page_template( 'template-narrow.php' ) ) && has_post_thumbnail( $post->ID ) ) {
		$classes[] = 'has-post-thumbnail';
	}

	// Adds a class of page-header-centered if the page should have a centered page header.
	if ( is_single() || is_page_template( 'template-narrow.php' ) ) {
		$classes[] = 'page-header-centered';
	}

	// Adds a class of site-header-dark if the site header should be dark.
	if ( is_front_page() ) {
		$classes[] = 'site-header-dark';
	}

	return $classes;
}
add_filter( 'body_class', 'toc_body_classes' );

/**
 * Only show posts in search results and increase the posts per page.
 *
 * @param $query
 *
 * @return mixed
 */
function toc_posts_only_search( $query ) {

	if ( $query->is_search && ! is_admin() ) {
		$query->set( 'post_type', 'post' );
		$query->set( 'posts_per_page', 20 );
	}
	return $query;
}
add_action( 'pre_get_posts', 'toc_posts_only_search' );


/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function toc_pingback_header() {

	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'toc_pingback_header' );

/**
 * Add excerpts to pages.
 *
 * @return void
 */
function toc_add_excerpts_to_pages() {
	add_post_type_support( 'page', 'excerpt' );
}
add_action( 'init', 'toc_add_excerpts_to_pages' );
