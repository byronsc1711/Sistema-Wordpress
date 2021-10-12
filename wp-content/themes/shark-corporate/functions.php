<?php
/**
 * Theme functions and definitions
 *
 * @package shark_corporate
 */ 


if ( ! function_exists( 'shark_corporate_enqueue_styles' ) ) :
	/**
	 * Load assets.
	 *
	 * @since 1.0.0
	 */
	function shark_corporate_enqueue_styles() {
		wp_enqueue_style( 'shark-business-style-parent', get_template_directory_uri() . '/style.css' );
		wp_enqueue_style( 'shark-corporate-style', get_stylesheet_directory_uri() . '/style.css', array( 'shark-business-style-parent' ), '1.0.0' );
	}
endif;
add_action( 'wp_enqueue_scripts', 'shark_corporate_enqueue_styles', 99 );
