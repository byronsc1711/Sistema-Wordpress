<?php
/**
 * pagination options
 *
 * @package Theme Palace
 * @subpackage Dark Music
 * @since Dark Music 1.0.0
 */

// Add sidebar section
$wp_customize->add_section( 'dark_music_pagination', array(
	'title'               => esc_html__('Pagination','dark-music'),
	'description'         => esc_html__( 'Pagination section options.', 'dark-music' ),
	'panel'               => 'dark_music_theme_options_panel',
) );

// Sidebar position setting and control.
$wp_customize->add_setting( 'dark_music_theme_options[pagination_enable]', array(
	'sanitize_callback' => 'dark_music_sanitize_switch_control',
	'default'             => $options['pagination_enable'],
) );

$wp_customize->add_control( new Dark_Music_Switch_Control( $wp_customize, 'dark_music_theme_options[pagination_enable]', array(
	'label'               => esc_html__( 'Pagination Enable', 'dark-music' ),
	'section'             => 'dark_music_pagination',
	'on_off_label' 		=> dark_music_switch_options(),
) ) );

// Site layout setting and control.
$wp_customize->add_setting( 'dark_music_theme_options[pagination_type]', array(
	'sanitize_callback'   => 'dark_music_sanitize_select',
	'default'             => $options['pagination_type'],
) );

$wp_customize->add_control( 'dark_music_theme_options[pagination_type]', array(
	'label'               => esc_html__( 'Pagination Type', 'dark-music' ),
	'section'             => 'dark_music_pagination',
	'type'                => 'select',
	'choices'			  => dark_music_pagination_options(),
	'active_callback'	  => 'dark_music_is_pagination_enable',
) );
