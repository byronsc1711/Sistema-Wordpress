<?php
/**
 * Layout options
 *
 * @package Theme Palace
 * @subpackage Dark Music
 * @since Dark Music 1.0.0
 */

// Add sidebar section
$wp_customize->add_section( 'dark_music_layout', array(
	'title'               => esc_html__('Layout','dark-music'),
	'description'         => esc_html__( 'Layout section options.', 'dark-music' ),
	'panel'               => 'dark_music_theme_options_panel',
) );

// Site layout setting and control.
$wp_customize->add_setting( 'dark_music_theme_options[site_layout]', array(
	'sanitize_callback'   => 'dark_music_sanitize_select',
	'default'             => $options['site_layout'],
) );

$wp_customize->add_control(  new Dark_Music_Custom_Radio_Image_Control ( $wp_customize, 'dark_music_theme_options[site_layout]', array(
	'label'               => esc_html__( 'Site Layout', 'dark-music' ),
	'section'             => 'dark_music_layout',
	'choices'			  => dark_music_site_layout(),
) ) );

// Sidebar position setting and control.
$wp_customize->add_setting( 'dark_music_theme_options[sidebar_position]', array(
	'sanitize_callback'   => 'dark_music_sanitize_select',
	'default'             => $options['sidebar_position'],
) );

$wp_customize->add_control(  new Dark_Music_Custom_Radio_Image_Control ( $wp_customize, 'dark_music_theme_options[sidebar_position]', array(
	'label'               => esc_html__( 'Global Sidebar Position', 'dark-music' ),
	'section'             => 'dark_music_layout',
	'choices'			  => dark_music_global_sidebar_position(),
) ) );

// Post sidebar position setting and control.
$wp_customize->add_setting( 'dark_music_theme_options[post_sidebar_position]', array(
	'sanitize_callback'   => 'dark_music_sanitize_select',
	'default'             => $options['post_sidebar_position'],
) );

$wp_customize->add_control(  new Dark_Music_Custom_Radio_Image_Control ( $wp_customize, 'dark_music_theme_options[post_sidebar_position]', array(
	'label'               => esc_html__( 'Posts Sidebar Position', 'dark-music' ),
	'section'             => 'dark_music_layout',
	'choices'			  => dark_music_sidebar_position(),
) ) );

// Post sidebar position setting and control.
$wp_customize->add_setting( 'dark_music_theme_options[page_sidebar_position]', array(
	'sanitize_callback'   => 'dark_music_sanitize_select',
	'default'             => $options['page_sidebar_position'],
) );

$wp_customize->add_control( new Dark_Music_Custom_Radio_Image_Control( $wp_customize, 'dark_music_theme_options[page_sidebar_position]', array(
	'label'               => esc_html__( 'Pages Sidebar Position', 'dark-music' ),
	'section'             => 'dark_music_layout',
	'choices'			  => dark_music_sidebar_position(),
) ) );