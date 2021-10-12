<?php
/**
 * Dark Music Customizer.
 *
 * @package Theme Palace
 * @subpackage Dark Music
 * @since Dark Music 1.0.0
 */

//load upgrade-to-pro section
require get_template_directory() . '/inc/customizer/upgrade-to-pro/class-customize.php';

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function dark_music_customize_register( $wp_customize ) {
	$options = dark_music_get_theme_options();

	// Load custom control functions.
	require get_template_directory() . '/inc/customizer/custom-controls.php';

	// Load customize active callback functions.
	require get_template_directory() . '/inc/customizer/active-callback.php';

	// Load validation callback functions.
	require get_template_directory() . '/inc/customizer/validation.php';

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport  = 'postMessage';

	// Remove the core header textcolor control, as it shares the main text color.
	$wp_customize->remove_control( 'header_textcolor' );

	// Header title color setting and control.
	$wp_customize->add_setting( 'dark_music_theme_options[header_title_color]', array(
		'default'           => $options['header_title_color'],
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'			=> 'postMessage'
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'dark_music_theme_options[header_title_color]', array(
		'priority'			=> 5,
		'label'             => esc_html__( 'Header Title Color', 'dark-music' ),
		'section'           => 'colors',
	) ) );

	// Header tagline color setting and control.
	$wp_customize->add_setting( 'dark_music_theme_options[header_tagline_color]', array(
		'default'           => $options['header_tagline_color'],
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'			=> 'postMessage'
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'dark_music_theme_options[header_tagline_color]', array(
		'priority'			=> 6,
		'label'             => esc_html__( 'Header Tagline Color', 'dark-music' ),
		'section'           => 'colors',
	) ) );

	$wp_customize->add_setting( 'dark_music_theme_options[theme_color]', array(
		'default'           => $options['theme_color'],
		'sanitize_callback' => 'dark_music_sanitize_select',
	) );

	$wp_customize->add_control( 'dark_music_theme_options[theme_color]', array(
		'type'    => 'radio',
		'label'    => esc_html__( 'Theme Color', 'dark-music-pro' ),
		'choices'  => array(
            'lite-version'   => esc_html__( 'Light', 'dark-music-pro' ),
            'dark-version'      => esc_html__( 'Dark', 'dark-music-pro' ),
		),
		'section'  => 'colors',
	) );


	// Site identity extra options.
	$wp_customize->add_setting( 'dark_music_theme_options[header_txt_logo_extra]', array(
		'default'           => $options['header_txt_logo_extra'],
		'sanitize_callback' => 'dark_music_sanitize_select',
		'transport'			=> 'refresh'
	) );

	$wp_customize->add_control( 'dark_music_theme_options[header_txt_logo_extra]', array(
		'priority'			=> 50,
		'type'				=> 'radio',
		'label'             => esc_html__( 'Site Identity Extra Options', 'dark-music' ),
		'section'           => 'title_tagline',
		'choices'				=> array( 
			'hide-all'     => esc_html__( 'Hide All', 'dark-music' ),
			'show-all'     => esc_html__( 'Show All', 'dark-music' ),
			'title-only'   => esc_html__( 'Title Only', 'dark-music' ),
			'tagline-only' => esc_html__( 'Tagline Only', 'dark-music' ),
			'logo-title'   => esc_html__( 'Logo + Title', 'dark-music' ),
			'logo-tagline' => esc_html__( 'Logo + Tagline', 'dark-music' ),
			)
	) );

	// Add panel for common theme options
	$wp_customize->add_panel( 'dark_music_theme_options_panel' , array(
	    'title'      => esc_html__( 'Theme Options','dark-music' ),
	    'description'=> esc_html__( 'Dark Music Theme Options.', 'dark-music' ),
	    'priority'   => 150,
	) );


	// breadcrumb
	require get_template_directory() . '/inc/customizer/theme-options/breadcrumb.php';

	// load layout
	require get_template_directory() . '/inc/customizer/theme-options/layout.php';

	// load static homepage option
	require get_template_directory() . '/inc/customizer/theme-options/homepage-static.php';

	// load archive option
	require get_template_directory() . '/inc/customizer/theme-options/excerpt.php';

	// load archive option
	require get_template_directory() . '/inc/customizer/theme-options/archive.php';
	
	// load single post option
	require get_template_directory() . '/inc/customizer/theme-options/single-posts.php';

	// load pagination option
	require get_template_directory() . '/inc/customizer/theme-options/pagination.php';

	// load footer option
	require get_template_directory() . '/inc/customizer/theme-options/footer.php';

	// load reset option
	require get_template_directory() . '/inc/customizer/theme-options/reset.php';

	// Add panel for front page theme options.
	$wp_customize->add_panel( 'dark_music_front_page_panel' , array(
	    'title'      => esc_html__( 'Front Page','dark-music' ),
	    'description'=> esc_html__( 'Front Page Theme Options.', 'dark-music' ),
	    'priority'   => 140,
	) );

	// slider section
	require get_template_directory() . '/inc/customizer/sections/slider.php';

	// about section
	require get_template_directory() . '/inc/customizer/sections/about.php';

	// playlist section
	require get_template_directory() . '/inc/customizer/sections/playlist.php';

	// call to action section
	require get_template_directory() . '/inc/customizer/sections/cta.php';

	// event section
	require get_template_directory() . '/inc/customizer/sections/event.php';

	// testimonial section
	require get_template_directory() . '/inc/customizer/sections/testimonial.php';

	// blog section
	require get_template_directory() . '/inc/customizer/sections/blog.php';

	// client section
	require get_template_directory() . '/inc/customizer/sections/client.php';
	
	
}
add_action( 'customize_register', 'dark_music_customize_register' );

/*
 * Load customizer sanitization functions.
 */
require get_template_directory() . '/inc/customizer/sanitize.php';

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function dark_music_customize_preview_js() {
	wp_enqueue_script( 'dark-music-customizer', get_template_directory_uri() . '/assets/js/customizer' . dark_music_min() . '.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'dark_music_customize_preview_js' );

/**
 * Load dynamic logic for the customizer controls area.
 */
function dark_music_customize_control_js() {
	// fontawesome
	wp_enqueue_style( 'font-awesome-css', get_template_directory_uri() . '/assets/css/font-awesome' . dark_music_min() . '.css' );
	
	// Choose from select jquery.
	wp_enqueue_style( 'chosen-css', get_template_directory_uri() . '/assets/css/chosen' . dark_music_min() . '.css' );
	wp_enqueue_script( 'jquery-chosen', get_template_directory_uri() . '/assets/js/chosen.jquery' . dark_music_min() . '.js', array( 'jquery' ), '1.4.2', true );

	wp_enqueue_style( 'dark-music-customize-controls-css', get_template_directory_uri() . '/assets/css/customize-controls' . dark_music_min() . '.css' );
	wp_enqueue_script( 'dark-music-customize-controls', get_template_directory_uri() . '/assets/js/customize-controls' . dark_music_min() . '.js', array(), '1.0', true );
	$dark_music_reset_data = array(
		'reset_message' => esc_html__( 'Refresh the customizer page after saving to view reset effects', 'dark-music' )
	);
	// Send list of color variables as object to custom customizer js
	wp_localize_script( 'dark-music-customize-controls', 'dark_music_reset_data', $dark_music_reset_data );
}
add_action( 'customize_controls_enqueue_scripts', 'dark_music_customize_control_js' );

if ( !function_exists( 'dark_music_reset_options' ) ) :
	/**
	 * Reset all options
	 *
	 * @since Dark Music 1.0.0
	 *
	 * @param bool $checked Whether the reset is checked.
	 * @return bool Whether the reset is checked.
	 */
	function dark_music_reset_options() {
		$options = dark_music_get_theme_options();
		if ( true === $options['reset_options'] ) {
			// Reset custom theme options.
			set_theme_mod( 'dark_music_theme_options', array() );
			// Reset custom header and backgrounds.
			remove_theme_mod( 'header_image' );
			remove_theme_mod( 'header_image_data' );
			remove_theme_mod( 'background_image' );
			remove_theme_mod( 'background_color' );
			remove_theme_mod( 'header_textcolor' );
	    }
	  	else {
		    return false;
	  	}
	}
endif;
add_action( 'customize_save_after', 'dark_music_reset_options' );
