<?php
/**
 * Playlist Section options
 *
 * @package Theme Palace
 * @subpackage Dark Music
 * @since Dark Music 1.0.0
 */

// Add Playlist section
$wp_customize->add_section( 'dark_music_playlist_section', array(
	'title'             => esc_html__( 'Playlist','dark-music' ),
	'description'       => esc_html__( 'Playlist Section options.', 'dark-music' ),
	'panel'             => 'dark_music_front_page_panel',
) );

// Playlist content enable control and setting
$wp_customize->add_setting( 'dark_music_theme_options[playlist_section_enable]', array(
	'default'			=> 	$options['playlist_section_enable'],
	'sanitize_callback' => 'dark_music_sanitize_switch_control',
) );

$wp_customize->add_control( new Dark_Music_Switch_Control( $wp_customize, 'dark_music_theme_options[playlist_section_enable]', array(
	'label'             => esc_html__( 'Playlist Section Enable', 'dark-music' ),
	'section'           => 'dark_music_playlist_section',
	'on_off_label' 		=> dark_music_switch_options(),
) ) );

if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'dark_music_theme_options[playlist_section_enable]', array(
		'selector'            => '#playlist-section .tooltiptext',
		'settings'            => 'dark_music_theme_options[playlist_section_enable]',
    ) );
}


// playlist title setting and control
$wp_customize->add_setting( 'dark_music_theme_options[playlist_title]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['playlist_title'],
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'dark_music_theme_options[playlist_title]', array(
	'label'           	=> esc_html__( 'Title', 'dark-music' ),
	'section'        	=> 'dark_music_playlist_section',
	'active_callback' 	=> 'dark_music_is_playlist_section_enable',
	'type'				=> 'text',
) );


// playlist subtitle setting and control
$wp_customize->add_setting( 'dark_music_theme_options[playlist_subtitle]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['playlist_subtitle'],
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'dark_music_theme_options[playlist_subtitle]', array(
	'label'           	=> esc_html__( 'Sub Title', 'dark-music' ),
	'section'        	=> 'dark_music_playlist_section',
	'active_callback' 	=> 'dark_music_is_playlist_section_enable',
	'type'				=> 'text',
) );


$wp_customize->add_setting( 'dark_music_theme_options[playlist_bg_image]', array(
	'sanitize_callback' => 'dark_music_sanitize_image'
) );

$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'dark_music_theme_options[playlist_bg_image]',
		array(
		'label'       		=> esc_html__( 'Bg Image', 'dark-music' ),
		'section'     		=> 'dark_music_playlist_section',
		'active_callback'	=> 'dark_music_is_playlist_section_enable',
) ) );


// playlist image setting and control.
$wp_customize->add_setting( 'dark_music_theme_options[playlist_image]', array(
	'sanitize_callback' => 'dark_music_sanitize_image'
) );

$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'dark_music_theme_options[playlist_image]',
		array(
		'label'       		=> esc_html__( 'Featured Image', 'dark-music' ),
		'section'     		=> 'dark_music_playlist_section',
		'active_callback'	=> 'dark_music_is_playlist_section_enable',
) ) );

// playlist posts drop down chooser control and setting
$wp_customize->add_setting( 'dark_music_theme_options[playlist_content]', array(
	'sanitize_callback' => 'dark_music_sanitize_array_int',
) );

$wp_customize->add_control( new Dark_Music_Multiple_Dropdown_Chooser( $wp_customize, 'dark_music_theme_options[playlist_content]', array(
	'label'             => esc_html__( 'Select Multiple Audios', 'dark-music' ),
	'section'           => 'dark_music_playlist_section',
	'choices'			=> dark_music_audio_choices(),
	'active_callback'	=> 'dark_music_is_playlist_section_enable',
) ) );

