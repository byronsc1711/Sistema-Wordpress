<?php
/**
 * Register Widgets
 *
 * @package shark_business
 */

/**
 * Load dynamic logic for the widgets.
 */
function shark_business_widget_js( $hook ) {
	if ( 'widgets.php' === $hook ) :
		wp_enqueue_script( 'media-upload' );
	   	wp_enqueue_media();
	   	
		// Choose from select jquery.
		wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/css/font-awesome' . shark_business_min() . '.css' );
		wp_enqueue_style( 'simple-iconpicker', get_template_directory_uri() . '/assets/css/simple-iconpicker' . shark_business_min() . '.css' );
		wp_enqueue_style( 'shark-business-admin-style', get_template_directory_uri() . '/assets/css/admin' . shark_business_min() . '.css' );
		wp_enqueue_style( 'jquery-chosen', get_template_directory_uri() . '/assets/css/chosen' . shark_business_min() . '.css' );
		wp_enqueue_script( 'jquery-simple-iconpicker', get_template_directory_uri() . '/assets/js/simple-iconpicker' . shark_business_min() . '.js', array( 'jquery' ), '', true );
		wp_enqueue_script( 'jquery-chosen', get_template_directory_uri() . '/assets/js/chosen' . shark_business_min() . '.js', array( 'jquery' ), '1.4.2', true );
		wp_enqueue_script( 'shark-business-admin-script', get_template_directory_uri() . '/assets/js/admin' . shark_business_min() . '.js', array( 'jquery', 'jquery-chosen', 'jquery-simple-iconpicker' ), '1.0.0', true );
	endif;

}
add_action( 'admin_enqueue_scripts', 'shark_business_widget_js' );

/*
 * Add introduction widget
 */
require get_template_directory() . '/inc/widgets/introduction-widget.php';

/*
 * Add featured widget
 */
require get_template_directory() . '/inc/widgets/featured-widget.php';

/*
 * Add portfolio widget
 */
require get_template_directory() . '/inc/widgets/portfolio-widget.php';

/*
 * Add recent widget
 */
require get_template_directory() . '/inc/widgets/recent-widget.php';

/*
 * Add service widget
 */
require get_template_directory() . '/inc/widgets/service-widget.php';

/*
 * Add call to action widget
 */
require get_template_directory() . '/inc/widgets/cta-widget.php';

/*
 * Add client widget
 */
require get_template_directory() . '/inc/widgets/client-widget.php';

/*
 * Add social widget
 */
require get_template_directory() . '/inc/widgets/social-widget.php';

/**
 * Register widgets
 */
function shark_business_register_widgets() {
	
	register_widget( 'Shark_Business_Introduction_Widget' );
	
	register_widget( 'Shark_Business_Featured_Widget' );

	register_widget( 'Shark_Business_Portfolio_Widget' );

	register_widget( 'Shark_Business_Recent_Widget' );

	register_widget( 'Shark_Business_Service_Widget' );

	register_widget( 'Shark_Business_Cta_Widget' );

	register_widget( 'Shark_Business_Client_Widget' );
	
	register_widget( 'Shark_Business_Social_Links_Widget' );
}
add_action( 'widgets_init', 'shark_business_register_widgets' );