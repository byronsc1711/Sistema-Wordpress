<?php
/**
 * Theme Palace options
 *
 * @package Theme Palace
 * @subpackage Dark Music
 * @since Dark Music 1.0.0
 */

/**
 * List of pages for page choices.
 * @return Array Array of page ids and name.
 */
function dark_music_page_choices() {
    $pages = get_pages();
    $choices = array();
    $choices[0] = esc_html__( '--Select--', 'dark-music' );
    foreach ( $pages as $page ) {
        $choices[ $page->ID ] = $page->post_title;
    }
    return  $choices;
}

/**
 * List of posts for post choices.
 * @return Array Array of post ids and name.
 */
function dark_music_post_choices() {
    $posts = get_posts( array( 'numberposts' => -1 ) );
    $choices = array();
    $choices[0] = esc_html__( '--Select--', 'dark-music' );
    foreach ( $posts as $post ) {
        $choices[ $post->ID ] = $post->post_title;
    }
    return  $choices;
}



/**
 * List of audio for post choices.
 * @return Array Array of post ids and name.
 */
function dark_music_audio_choices() {
    $posts = get_posts( array( 'numberposts' => -1, 'post_type' => 'attachment', 'post_mime_type' => 'audio' ) );
    $choices = array();
    $choices[0] = esc_html__( '--None--', 'dark-music' );
    foreach ( $posts as $post ) {
        $choices[ $post->ID ] = $post->post_title;
    }
    return  $choices;
}


if ( ! function_exists( 'dark_music_site_layout' ) ) :
    /**
     * Site Layout
     * @return array site layout options
     */
    function dark_music_site_layout() {
        $dark_music_site_layout = array(
            'wide'  => get_template_directory_uri() . '/assets/images/full.png',
            'boxed-layout' => get_template_directory_uri() . '/assets/images/boxed.png',
            'frame-layout' => get_template_directory_uri() . '/assets/images/framed.png',
        );

        $output = apply_filters( 'dark_music_site_layout', $dark_music_site_layout );
        return $output;
    }
endif;

if ( ! function_exists( 'dark_music_selected_sidebar' ) ) :
    /**
     * Sidebars options
     * @return array Sidbar positions
     */
    function dark_music_selected_sidebar() {
        $dark_music_selected_sidebar = array(
            'sidebar-1'             => esc_html__( 'Default Sidebar', 'dark-music' ),
            'optional-sidebar'      => esc_html__( 'Optional Sidebar 1', 'dark-music' ),
            'optional-sidebar-2'    => esc_html__( 'Optional Sidebar 2', 'dark-music' ),
            'optional-sidebar-3'    => esc_html__( 'Optional Sidebar 3', 'dark-music' ),
            'optional-sidebar-4'    => esc_html__( 'Optional Sidebar 4', 'dark-music' ),
        );

        $output = apply_filters( 'dark_music_selected_sidebar', $dark_music_selected_sidebar );

        return $output;
    }
endif;


if ( ! function_exists( 'dark_music_global_sidebar_position' ) ) :
    /**
     * Global Sidebar position
     * @return array Global Sidebar positions
     */
    function dark_music_global_sidebar_position() {
        $dark_music_global_sidebar_position = array(
            'right-sidebar' => get_template_directory_uri() . '/assets/images/right.png',
            'no-sidebar'    => get_template_directory_uri() . '/assets/images/full.png',
        );

        $output = apply_filters( 'dark_music_global_sidebar_position', $dark_music_global_sidebar_position );

        return $output;
    }
endif;


if ( ! function_exists( 'dark_music_sidebar_position' ) ) :
    /**
     * Sidebar position
     * @return array Sidbar positions
     */
    function dark_music_sidebar_position() {
        $dark_music_sidebar_position = array(
            'right-sidebar' => get_template_directory_uri() . '/assets/images/right.png',
            'no-sidebar'    => get_template_directory_uri() . '/assets/images/full.png',
            'no-sidebar-content'   => get_template_directory_uri() . '/assets/images/boxed.png',
        );

        $output = apply_filters( 'dark_music_sidebar_position', $dark_music_sidebar_position );

        return $output;
    }
endif;


if ( ! function_exists( 'dark_music_pagination_options' ) ) :
    /**
     * Pagination
     * @return array site pagination options
     */
    function dark_music_pagination_options() {
        $dark_music_pagination_options = array(
            'numeric'   => esc_html__( 'Numeric', 'dark-music' ),
            'default'   => esc_html__( 'Default(Older/Newer)', 'dark-music' ),
        );

        $output = apply_filters( 'dark_music_pagination_options', $dark_music_pagination_options );

        return $output;
    }
endif;

if ( ! function_exists( 'dark_music_switch_options' ) ) :
    /**
     * List of custom Switch Control options
     * @return array List of switch control options.
     */
    function dark_music_switch_options() {
        $arr = array(
            'on'        => esc_html__( 'Enable', 'dark-music' ),
            'off'       => esc_html__( 'Disable', 'dark-music' )
        );
        return apply_filters( 'dark_music_switch_options', $arr );
    }
endif;

if ( ! function_exists( 'dark_music_hide_options' ) ) :
    /**
     * List of custom Switch Control options
     * @return array List of switch control options.
     */
    function dark_music_hide_options() {
        $arr = array(
            'on'        => esc_html__( 'Yes', 'dark-music' ),
            'off'       => esc_html__( 'No', 'dark-music' )
        );
        return apply_filters( 'dark_music_hide_options', $arr );
    }
endif;


