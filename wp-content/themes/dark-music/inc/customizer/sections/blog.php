<?php
/**
 * Blog Section options
 *
 * @package Theme Palace
 * @subpackage Dark Music
 * @since Dark Music 1.0.0
 */

// Add Blog section
$wp_customize->add_section( 'dark_music_blog_section', array(
	'title'             => esc_html__( 'Blog','dark-music' ),
	'description'       => esc_html__( 'Blog Section options.', 'dark-music' ),
	'panel'             => 'dark_music_front_page_panel',
) );

// Blog content enable control and setting
$wp_customize->add_setting( 'dark_music_theme_options[blog_section_enable]', array(
	'default'			=> 	$options['blog_section_enable'],
	'sanitize_callback' => 'dark_music_sanitize_switch_control',
) );

$wp_customize->add_control( new Dark_Music_Switch_Control( $wp_customize, 'dark_music_theme_options[blog_section_enable]', array(
	'label'             => esc_html__( 'Blog Section Enable', 'dark-music' ),
	'section'           => 'dark_music_blog_section',
	'on_off_label' 		=> dark_music_switch_options(),
) ) );

if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'dark_music_theme_options[blog_section_enable]', array(
		'selector'            => '.blog-section .tooltiptext',
		'settings'            => 'dark_music_theme_options[blog_section_enable]',
    ) );
}


// blog title setting and control
$wp_customize->add_setting( 'dark_music_theme_options[blog_title]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['blog_title'],
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'dark_music_theme_options[blog_title]', array(
	'label'           	=> esc_html__( 'Title', 'dark-music' ),
	'section'        	=> 'dark_music_blog_section',
	'active_callback' 	=> 'dark_music_is_blog_section_enable',
	'type'				=> 'text',
) );


// blog subtitle setting and control
$wp_customize->add_setting( 'dark_music_theme_options[blog_subtitle]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['blog_subtitle'],
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'dark_music_theme_options[blog_subtitle]', array(
	'label'           	=> esc_html__( 'Sub Title', 'dark-music' ),
	'section'        	=> 'dark_music_blog_section',
	'active_callback' 	=> 'dark_music_is_blog_section_enable',
	'type'				=> 'text',
) );

// blog btn title setting and control
$wp_customize->add_setting( 'dark_music_theme_options[blog_btn_title]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['blog_btn_title'],
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'dark_music_theme_options[blog_btn_title]', array(
	'label'           	=> esc_html__( 'Button Label', 'dark-music' ),
	'section'        	=> 'dark_music_blog_section',
	'active_callback' 	=> 'dark_music_is_blog_section_enable',
	'type'				=> 'text',
) );


// Blog content type control and setting
$wp_customize->add_setting( 'dark_music_theme_options[blog_content_type]', array(
	'default'          	=> $options['blog_content_type'],
	'sanitize_callback' => 'dark_music_sanitize_select',
) );

$wp_customize->add_control( 'dark_music_theme_options[blog_content_type]', array(
	'label'             => esc_html__( 'Content Type', 'dark-music' ),
	'section'           => 'dark_music_blog_section',
	'type'				=> 'select',
	'active_callback' 	=> 'dark_music_is_blog_section_enable',
	'choices'			=> array( 
		'post' 		=> esc_html__( 'Post', 'dark-music' ),
		'category' 	=> esc_html__( 'Category', 'dark-music' ),
	),
) );


for ( $i = 1; $i <= 3; $i++ ) :
	// blog pages drop down chooser control and setting
	$wp_customize->add_setting( 'dark_music_theme_options[blog_content_post_' . $i . ']', array(
		'sanitize_callback' => 'dark_music_sanitize_post',
	) );

	$wp_customize->add_control( new Dark_Music_Dropdown_Chooser( $wp_customize, 'dark_music_theme_options[blog_content_post_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Select post %d', 'dark-music' ), $i ),
		'section'           => 'dark_music_blog_section',
		'choices'			=> dark_music_post_choices(),
		'active_callback'	=> 'dark_music_is_blog_section_content_post_enable',
	) ) );
endfor;

// Add dropdown category setting and control.
$wp_customize->add_setting(  'dark_music_theme_options[blog_content_category]', array(
	'sanitize_callback' => 'dark_music_sanitize_single_category',
) ) ;

$wp_customize->add_control( new Dark_Music_Dropdown_Taxonomies_Control( $wp_customize,'dark_music_theme_options[blog_content_category]', array(
	'label'             => esc_html__( 'Select Category', 'dark-music' ),
	'description'      	=> esc_html__( 'Note: Latest selected no of posts will be shown from selected category', 'dark-music' ),
	'section'           => 'dark_music_blog_section',
	'type'              => 'dropdown-taxonomies',
	'active_callback'	=> 'dark_music_is_blog_section_content_category_enable'
) ) );
