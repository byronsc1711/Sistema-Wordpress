<?php
/**
 * Customizer default options
 *
 * @package Theme Palace
 * @subpackage Dark Music
 * @since Dark Music 1.0.0
 * @return array An array of default values
 */

function dark_music_get_default_theme_options() {
	$theme_data = wp_get_theme();
	$dark_music_default_options = array(
		// Color Options
		'header_title_color'			=> '#fff',
		'header_tagline_color'			=> '#fff',
		'header_txt_logo_extra'			=> 'show-all',
		'theme_color'					=> 'dark-version',

		// breadcrumb
		'breadcrumb_enable'				=> true,
		'breadcrumb_separator'			=> '/',
		
		// layout 
		'site_layout'         			=> 'wide',
		'sidebar_position'         		=> 'right-sidebar',
		'post_sidebar_position' 		=> 'right-sidebar',
		'page_sidebar_position' 		=> 'right-sidebar',

		// excerpt options
		'long_excerpt_length'           => 25,
		
		// pagination options
		'pagination_enable'         	=> true,
		'pagination_type'         		=> 'default',

		// footer options
		'copyright_text'           		=> sprintf( esc_html_x( 'Copyright &copy; %1$s %2$s', '1: Year, 2: Site Title with home URL', 'dark-music' ), '[the-year]', '[site-link]' ),
		'scroll_top_visible'        	=> true,

		// reset options
		'reset_options'      			=> false,
		
		// homepage options
		'enable_frontpage_content' 		=> false,

		// homepage sections sortable
		'sortable' 						=> 'slider,about,playlist,testimonial,event,blog,cta,client',

		// blog/archive options
		'your_latest_posts_title' 		=> esc_html__( 'Blogs', 'dark-music' ),
		'read_more_text' 				=> esc_html__( 'Read Full Article', 'dark-music' ),
		'hide_date' 					=> false,
		'hide_category'					=> false,

		// single post theme options
		'single_post_hide_date' 		=> false,
		'single_post_hide_author'		=> false,
		'single_post_hide_category'		=> false,
		'single_post_hide_tags'			=> false,

		/* Front Page */

		// Slider
		'slider_section_enable'			=> false,
		'slider_search_enable'			=> true,
		'slider_btn_title'				=> esc_html__( 'Download Now', 'dark-music' ),
		'slider_alt_btn_title'				=> esc_html__( 'Buy Album', 'dark-music' ),

		// Playlist
		'playlist_section_enable'		=> false,
		'playlist_title'					=> esc_html__( 'Audio Tracks', 'dark-music' ),
		'playlist_subtitle'				=> esc_html__( 'Playlist', 'dark-music' ),

		// About
		'about_section_enable'			=> false,
		'about_title'					=> esc_html__( 'Popular', 'dark-music' ),
		'about_subtitle'				=> esc_html__( 'Artist of the Week', 'dark-music' ),
		'about_description'				=> esc_html__( 'Etiam euismod pulvinar velit id commodo. Aenean id varius libLorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam euismod pulvinar velit id commodo. Aenean id varius libero. Curabitur sit amet eros velit.', 'dark-music' ),


		// Call to action
		'cta_section_enable'			=> false,
		'cta_title'						=> esc_html__( 'Music is My Escape', 'dark-music' ),
		'cta_subtitle'					=> esc_html__( 'Music is a world within itself', 'dark-music' ),


		// Event
		'event_section_enable'			=> false,
		'event_title'					=> esc_html__( 'Upcoming Events', 'dark-music' ),
		'event_subtitle'				=> esc_html__( 'Amazing shows around 2019', 'dark-music' ),
		'event_readmore'				=> esc_html__( 'Buy Ticket', 'dark-music' ),
		'event_btn_title'				=> esc_html__( 'View All Events', 'dark-music' ),


		// testimonial
		'testimonial_section_enable'	=> false,
		'testimonial_title'				=> esc_html__( 'Loved by business and individuals across the globe.', 'dark-music' ),
		'testimonial_subtitle'			=> esc_html__( 'Testimonials', 'dark-music' ),

		// blog
		'blog_section_enable'			=> false,
		'blog_content_type'				=> 'category',
		'blog_title'					=> esc_html__( 'Our Latest Blog', 'dark-music' ),
		'blog_subtitle'					=> esc_html__( 'Check our blog, resources and more', 'dark-music' ),
		'blog_btn_title'				=> esc_html__( 'Learn More', 'dark-music' ),

		//client 
		'client_section_enable'			=> false,

	);

	$output = apply_filters( 'dark_music_default_theme_options', $dark_music_default_options );

	// Sort array in ascending order, according to the key:
	if ( ! empty( $output ) ) {
		ksort( $output );
	}

	return $output;
}