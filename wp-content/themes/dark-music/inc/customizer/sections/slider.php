<?php
/**
 * Slider Section options
 *
 * @package Theme Palace
 * @subpackage Dark Music
 * @since Dark Music 1.0.0
 */

// Add Slider section
$wp_customize->add_section( 'dark_music_slider_section', array(
	'title'             => esc_html__( 'Main Slider','dark-music' ),
	'description'       => esc_html__( 'Slider Section options.', 'dark-music' ),
	'panel'             => 'dark_music_front_page_panel',
) );

// Slider content enable control and setting
$wp_customize->add_setting( 'dark_music_theme_options[slider_section_enable]', array(
	'default'			=> 	$options['slider_section_enable'],
	'sanitize_callback' => 'dark_music_sanitize_switch_control',
) );

$wp_customize->add_control( new Dark_Music_Switch_Control( $wp_customize, 'dark_music_theme_options[slider_section_enable]', array(
	'label'             => esc_html__( 'Slider Section Enable', 'dark-music' ),
	'section'           => 'dark_music_slider_section',
	'on_off_label' 		=> dark_music_switch_options(),
) ) );

if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'dark_music_theme_options[slider_section_enable]', array(
		'selector'            => '.slider-section .tooltiptext',
		'settings'            => 'dark_music_theme_options[slider_section_enable]',
    ) );
}


$wp_customize->add_setting( 'dark_music_theme_options[slider_btn_title]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['slider_btn_title'],
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'dark_music_theme_options[slider_btn_title]', array(
	'label'           	=> esc_html__( 'Button Label', 'dark-music' ),
	'section'        	=> 'dark_music_slider_section',
	'active_callback' 	=> 'dark_music_is_slider_section_enable',
	'type'				=> 'text',
) );

$wp_customize->add_setting( 'dark_music_theme_options[slider_alt_btn_title]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['slider_alt_btn_title'],
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'dark_music_theme_options[slider_alt_btn_title]', array(
	'label'           	=> esc_html__( 'Alt Button Label', 'dark-music' ),
	'section'        	=> 'dark_music_slider_section',
	'active_callback' 	=> 'dark_music_is_slider_section_enable',
	'type'				=> 'text',
) );

$wp_customize->add_setting( 'dark_music_theme_options[slider_alt_btn_url]', array(
	'sanitize_callback' => 'esc_url_raw',
) );

$wp_customize->add_control( 'dark_music_theme_options[slider_alt_btn_url]', array(
	'label'           	=> esc_html__( 'Alt Button Url', 'dark-music' ),
	'section'        	=> 'dark_music_slider_section',
	'active_callback' 	=> 'dark_music_is_slider_section_enable',
	'type'				=> 'url',
) );


for ( $i = 1; $i <= 4; $i++ ) :
	// slider pages drop down chooser control and setting
	$wp_customize->add_setting( 'dark_music_theme_options[slider_content_page_' . $i . ']', array(
		'sanitize_callback' => 'dark_music_sanitize_page',
	) );

	$wp_customize->add_control( new Dark_Music_Dropdown_Chooser( $wp_customize, 'dark_music_theme_options[slider_content_page_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Select Page %d', 'dark-music' ), $i ),
		'section'           => 'dark_music_slider_section',
		'choices'			=> dark_music_page_choices(),
		'active_callback'	=> 'dark_music_is_slider_section_enable',
	) ) );

endfor;
