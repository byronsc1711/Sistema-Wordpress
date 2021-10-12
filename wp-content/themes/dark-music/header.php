<?php
	/**
	 * The header for our theme.
	 *
	 * This is the template that displays all of the <head> section and everything up until <div id="content">
	 *
	 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
	 *
	 * @package Theme Palace
	 * @subpackage Dark Music
	 * @since Dark Music 1.0.0
	 */

	/**
	 * dark_music_doctype hook
	 *
	 * @hooked dark_music_doctype -  10
	 *
	 */
	do_action( 'dark_music_doctype' );

?>
<head>
<?php
	/**
	 * dark_music_before_wp_head hook
	 *
	 * @hooked dark_music_head -  10
	 *
	 */
	do_action( 'dark_music_before_wp_head' );

	wp_head(); 
?>
</head>

<body <?php body_class(); ?>>

<?php do_action('wp_body_open'); ?>

<?php
	/**
	 * dark_music_page_start_action hook
	 *
	 * @hooked dark_music_page_start -  10
	 *
	 */
	do_action( 'dark_music_page_start_action' ); 

	/**
	 * dark_music_loader_action hook
	 *
	 * @hooked dark_music_loader -  10
	 *
	 */
	do_action( 'dark_music_before_header' );

	/**
	 * dark_music_header_action hook
	 *
	 * @hooked dark_music_header_start -  10
	 * @hooked dark_music_site_branding -  20
	 * @hooked dark_music_site_navigation -  30
	 * @hooked dark_music_header_end -  50
	 *
	 */
	do_action( 'dark_music_header_action' );

	/**
	 * dark_music_content_start_action hook
	 *
	 * @hooked dark_music_content_start -  10
	 *
	 */
	do_action( 'dark_music_content_start_action' );

	/**
	 * dark_music_header_image_action hook
	 *
	 * @hooked dark_music_header_image -  10
	 *
	 */
	do_action( 'dark_music_header_image_action' );

    if ( dark_music_is_frontpage() ) {
    	$options = dark_music_get_theme_options();

    	$sections = explode( ',' , $options['sortable'] );

		foreach ( $sections as $section ) {
			add_action( 'dark_music_primary_content', 'dark_music_add_'. $section .'_section' );			
		}
		do_action( 'dark_music_primary_content' );
	}