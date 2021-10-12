<?php
/**
 * Breadcrumb options
 *
 * @package Theme Palace
 * @subpackage Dark Music
 * @since Dark Music 1.0.0
 */

$wp_customize->add_section( 'dark_music_breadcrumb', array(
	'title'             => esc_html__( 'Breadcrumb','dark-music' ),
	'description'       => esc_html__( 'Breadcrumb section options.', 'dark-music' ),
	'panel'             => 'dark_music_theme_options_panel',
) );

// Breadcrumb enable setting and control.
$wp_customize->add_setting( 'dark_music_theme_options[breadcrumb_enable]', array(
	'sanitize_callback' => 'dark_music_sanitize_switch_control',
	'default'          	=> $options['breadcrumb_enable'],
) );

$wp_customize->add_control( new Dark_Music_Switch_Control( $wp_customize, 'dark_music_theme_options[breadcrumb_enable]', array(
	'label'            	=> esc_html__( 'Enable Breadcrumb', 'dark-music' ),
	'section'          	=> 'dark_music_breadcrumb',
	'on_off_label' 		=> dark_music_switch_options(),
) ) );

// Breadcrumb separator setting and control.
$wp_customize->add_setting( 'dark_music_theme_options[breadcrumb_separator]', array(
	'sanitize_callback'	=> 'sanitize_text_field',
	'default'          	=> $options['breadcrumb_separator'],
) );

$wp_customize->add_control( 'dark_music_theme_options[breadcrumb_separator]', array(
	'label'            	=> esc_html__( 'Separator', 'dark-music' ),
	'active_callback' 	=> 'dark_music_is_breadcrumb_enable',
	'section'          	=> 'dark_music_breadcrumb',
) );
