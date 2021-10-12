<?php
/**
 * About Section options
 *
 * @package Theme Palace
 * @subpackage Dark Music
 * @since Dark Music 1.0.0
 */

// Add About section
$wp_customize->add_section( 'dark_music_about_section', array(
	'title'             => esc_html__( 'About Us','dark-music' ),
	'description'       => esc_html__( 'About Section options.', 'dark-music' ),
	'panel'             => 'dark_music_front_page_panel',
) );

// About content enable control and setting
$wp_customize->add_setting( 'dark_music_theme_options[about_section_enable]', array(
	'default'			=> 	$options['about_section_enable'],
	'sanitize_callback' => 'dark_music_sanitize_switch_control',
) );

$wp_customize->add_control( new Dark_Music_Switch_Control( $wp_customize, 'dark_music_theme_options[about_section_enable]', array(
	'label'             => esc_html__( 'About Section Enable', 'dark-music' ),
	'section'           => 'dark_music_about_section',
	'on_off_label' 		=> dark_music_switch_options(),
) ) );

if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'dark_music_theme_options[about_section_enable]', array(
		'selector'            => '#about-section .tooltiptext',
		'settings'            => 'dark_music_theme_options[about_section_enable]',
    ) );
}



// about subtitle setting and control
$wp_customize->add_setting( 'dark_music_theme_options[about_subtitle]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['about_subtitle'],
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'dark_music_theme_options[about_subtitle]', array(
	'label'           	=> esc_html__( 'Sub Title', 'dark-music' ),
	'section'        	=> 'dark_music_about_section',
	'active_callback' 	=> 'dark_music_is_about_section_enable',
	'type'				=> 'text',
) );

// about pages drop down chooser control and setting
$wp_customize->add_setting( 'dark_music_theme_options[about_content_page]', array(
	'sanitize_callback' => 'dark_music_sanitize_page',
) );

$wp_customize->add_control( new Dark_Music_Dropdown_Chooser( $wp_customize, 'dark_music_theme_options[about_content_page]', array(
	'label'             => esc_html__( 'Select Page', 'dark-music' ),
	'section'           => 'dark_music_about_section',
	'choices'			=> dark_music_page_choices(),
	'active_callback'	=> 'dark_music_is_about_section_enable',
) ) );

// about btn title setting and control
$wp_customize->add_setting( 'dark_music_theme_options[about_btn_title]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'dark_music_theme_options[about_btn_title]', array(
	'label'           	=> esc_html__( 'Button Label', 'dark-music' ),
	'section'        	=> 'dark_music_about_section',
	'active_callback' 	=> 'dark_music_is_about_section_enable',
	'type'				=> 'text',
) );


