<?php
/**
 * Default Theme Customizer Values
 *
 * @package shark_business
 */

function shark_business_get_default_theme_options() {
	$shark_business_default_options = array(
		// default options

		// Top Bar
		'enable_topbar'			=> true,
		'show_social_menu'		=> false,
		'show_top_search'		=> true,
		'topbar_address'		=> esc_html__( 'Wall Street, New York', 'shark-business' ),
		'topbar_phone'			=> esc_html__( '+00 0 0000000', 'shark-business' ),
		'topbar_email'			=> 'abc@sharkthemes.com',

		// Slider
		'enable_slider'			=> true,
		'slider_entire_site'	=> false,
		'slider_arrow'			=> true,

		// Footer
		'slide_to_top'			=> true,
		'copyright_text'		=> esc_html__( 'Copyright &copy; 2018 | All Rights Reserved', 'shark-business' ),

		// blog / archive
		'latest_blog_title'		=> esc_html__( 'Blogs', 'shark-business' ),
		'excerpt_count'			=> 25,
		'pagination_type'		=> 'numeric',
		'sidebar_layout'		=> 'right-sidebar',
		'column_type'			=> 'column-2',
		'show_date'				=> true,
		'show_category'			=> true,
		'show_author'			=> true,
		'show_comment'			=> true,

		// single post
		'sidebar_single_layout'	=> 'right-sidebar',
		'show_single_date'		=> true,
		'show_single_category'	=> true,
		'show_single_tags'		=> true,
		'show_single_author'	=> true,

		// page
		'sidebar_page_layout'	=> 'right-sidebar',

		// global
		'enable_loader'			=> true,
		'enable_breadcrumb'		=> true,
		'enable_sticky_header'	=> false,
		'loader_type'			=> 'spinner-dots',
		'site_layout'			=> 'full',

	);

	$output = apply_filters( 'shark_business_default_theme_options', $shark_business_default_options );
	return $output;
}