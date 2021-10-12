<?php
/**
 * Theme functions and definitions
 *
 * @package shark_education
 */ 

if ( ! function_exists( 'shark_education_theme_defaults' ) ) :
	/**
	 * Customize theme defaults.
	 *
	 * @since 1.0.0
	 *
	 * @param array $defaults Theme defaults.
	 * @param array Custom theme defaults.
	 */
	function shark_education_theme_defaults( $defaults ) {
		$defaults['column_type'] 	 = 'column-1';

		return $defaults;
	}
endif;
add_filter( 'uni_education_default_theme_options', 'shark_education_theme_defaults', 99 );

if ( ! function_exists( 'shark_education_enqueue_styles' ) ) :
	/**
	 * Load assets.
	 *
	 * @since 1.0.0
	 */
	function shark_education_enqueue_styles() {
		wp_enqueue_style( 'uni-education-style-parent', get_template_directory_uri() . '/style.css' );
		wp_enqueue_style( 'shark-education-style', get_stylesheet_directory_uri() . '/style.css', array( 'uni-education-style-parent' ), '1.0.0' );
	}
endif;
add_action( 'wp_enqueue_scripts', 'shark_education_enqueue_styles', 99 );
