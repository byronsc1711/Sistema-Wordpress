<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Anecdote Lite
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function anecdote_lite_body_classes( $classes ) {
    $anecdote_lite_default = anecdote_lite_get_default_theme_options();
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

        // sidebar layout
    $homepage_sidebar_layout = get_theme_mod( 'global_sidebar_layout', $anecdote_lite_default['global_sidebar_layout'] );
    $archive_sidebar_layout = get_theme_mod( 'archive_sidebar_layout', $anecdote_lite_default['archive_sidebar_layout'] );
    $single_sidebar_layout = get_theme_mod( 'single_sidebar_layout', $anecdote_lite_default['single_sidebar_layout'] );
	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}elseif ((is_single()) || is_page()) {
        $classes[] = $single_sidebar_layout;
    }elseif (is_archive() || is_search()) {
        $classes[] = $archive_sidebar_layout;
    }else {
        $classes[] = $homepage_sidebar_layout;
    }
    if( has_header_image() || get_header_video_url() ){

        $classes[] = 'has-header-media';

        if( get_header_video_url() ){

            $classes[] = 'has-header-video';

        }else{

            $classes[] = 'has-header-image';

        }
    }

    $header_overlay = get_theme_mod( 'enable_header_overlay', $anecdote_lite_default['enable_header_overlay'] );
    if (($header_overlay == 1) && !is_search() && !is_404()){
        $classes[] = 'navigation-header-overlay';
    }

	return $classes;
}
add_filter( 'body_class', 'anecdote_lite_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function anecdote_lite_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'anecdote_lite_pingback_header' );
