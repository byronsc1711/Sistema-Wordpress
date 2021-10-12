<?php
/**
 * Blog / Archive / Search Customizer Options
 *
 * @package shark_business
 */

// Add blog section
$wp_customize->add_section( 'shark_business_blog_section', array(
	'title'             => esc_html__( 'Blog/Archive Page Setting','shark-business' ),
	'description'       => esc_html__( 'Blog/Archive/Search Page Setting Options', 'shark-business' ),
	'panel'             => 'shark_business_theme_options_panel',
) );

// latest blog title drop down chooser control and setting
$wp_customize->add_setting( 'shark_business_theme_options[latest_blog_title]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'          	=> shark_business_theme_option( 'latest_blog_title' ),
) );

$wp_customize->add_control( new Shark_Business_Dropdown_Chosen_Control( $wp_customize, 'shark_business_theme_options[latest_blog_title]', array(
	'label'             => esc_html__( 'Latest Blog Title', 'shark-business' ),
	'description'       => esc_html__( 'Note: This title is displayed when your homepage displays option is set to latest posts.', 'shark-business' ),
	'section'           => 'shark_business_blog_section',
	'type'				=> 'text',
) ) );

// sidebar layout setting and control.
$wp_customize->add_setting( 'shark_business_theme_options[sidebar_layout]', array(
	'sanitize_callback'   => 'shark_business_sanitize_select',
	'default'             => shark_business_theme_option( 'sidebar_layout' ),
) );

$wp_customize->add_control(  new Shark_Business_Radio_Image_Control ( $wp_customize, 'shark_business_theme_options[sidebar_layout]', array(
	'label'               => esc_html__( 'Sidebar Layout', 'shark-business' ),
	'section'             => 'shark_business_blog_section',
	'choices'			  => shark_business_sidebar_position(),
) ) );

// column control and setting
$wp_customize->add_setting( 'shark_business_theme_options[column_type]', array(
	'default'          	=> shark_business_theme_option( 'column_type' ),
	'sanitize_callback' => 'shark_business_sanitize_select',
) );

$wp_customize->add_control( 'shark_business_theme_options[column_type]', array(
	'label'             => esc_html__( 'Column Layout', 'shark-business' ),
	'section'           => 'shark_business_blog_section',
	'type'				=> 'select',
	'choices'			=> array( 
		'column-1' 		=> esc_html__( 'One Column', 'shark-business' ),
		'column-2' 		=> esc_html__( 'Two Column', 'shark-business' ),
	),
) );

// excerpt count control and setting
$wp_customize->add_setting( 'shark_business_theme_options[excerpt_count]', array(
	'default'          	=> shark_business_theme_option( 'excerpt_count' ),
	'sanitize_callback' => 'shark_business_sanitize_number_range',
	'validate_callback' => 'shark_business_validate_excerpt_count',
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'shark_business_theme_options[excerpt_count]', array(
	'label'             => esc_html__( 'Excerpt Length', 'shark-business' ),
	'description'       => esc_html__( 'Note: Min 1 & Max 50.', 'shark-business' ),
	'section'           => 'shark_business_blog_section',
	'type'				=> 'number',
	'input_attrs'		=> array(
		'min'	=> 1,
		'max'	=> 50,
		),
) );

// pagination control and setting
$wp_customize->add_setting( 'shark_business_theme_options[pagination_type]', array(
	'default'          	=> shark_business_theme_option( 'pagination_type' ),
	'sanitize_callback' => 'shark_business_sanitize_select',
) );

$wp_customize->add_control( 'shark_business_theme_options[pagination_type]', array(
	'label'             => esc_html__( 'Pagination Type', 'shark-business' ),
	'section'           => 'shark_business_blog_section',
	'type'				=> 'select',
	'choices'			=> array( 
		'default' 		=> esc_html__( 'Default', 'shark-business' ),
		'numeric' 		=> esc_html__( 'Numeric', 'shark-business' ),
	),
) );

// Archive date meta setting and control.
$wp_customize->add_setting( 'shark_business_theme_options[show_date]', array(
	'default'           => shark_business_theme_option( 'show_date' ),
	'sanitize_callback' => 'shark_business_sanitize_switch',
) );

$wp_customize->add_control( new Shark_Business_Switch_Control( $wp_customize, 'shark_business_theme_options[show_date]', array(
	'label'             => esc_html__( 'Show Date', 'shark-business' ),
	'section'           => 'shark_business_blog_section',
	'on_off_label' 		=> shark_business_show_options(),
) ) );

// Archive category meta setting and control.
$wp_customize->add_setting( 'shark_business_theme_options[show_category]', array(
	'default'           => shark_business_theme_option( 'show_category' ),
	'sanitize_callback' => 'shark_business_sanitize_switch',
) );

$wp_customize->add_control( new Shark_Business_Switch_Control( $wp_customize, 'shark_business_theme_options[show_category]', array(
	'label'             => esc_html__( 'Show Category', 'shark-business' ),
	'section'           => 'shark_business_blog_section',
	'on_off_label' 		=> shark_business_show_options(),
) ) );

// Archive author meta setting and control.
$wp_customize->add_setting( 'shark_business_theme_options[show_author]', array(
	'default'           => shark_business_theme_option( 'show_author' ),
	'sanitize_callback' => 'shark_business_sanitize_switch',
) );

$wp_customize->add_control( new Shark_Business_Switch_Control( $wp_customize, 'shark_business_theme_options[show_author]', array(
	'label'             => esc_html__( 'Show Author', 'shark-business' ),
	'section'           => 'shark_business_blog_section',
	'on_off_label' 		=> shark_business_show_options(),
) ) );

// Archive comment meta setting and control.
$wp_customize->add_setting( 'shark_business_theme_options[show_comment]', array(
	'default'           => shark_business_theme_option( 'show_comment' ),
	'sanitize_callback' => 'shark_business_sanitize_switch',
) );

$wp_customize->add_control( new Shark_Business_Switch_Control( $wp_customize, 'shark_business_theme_options[show_comment]', array(
	'label'             => esc_html__( 'Show Comment', 'shark-business' ),
	'section'           => 'shark_business_blog_section',
	'on_off_label' 		=> shark_business_show_options(),
) ) );