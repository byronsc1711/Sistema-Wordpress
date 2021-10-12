<?php
/**
 * Excerpt options
 *
 * @package Theme Palace
 * @subpackage Dark Music
 * @since Dark Music 1.0.0
 */

// Add excerpt section
$wp_customize->add_section( 'dark_music_single_post_section', array(
	'title'             => esc_html__( 'Single Post','dark-music' ),
	'description'       => esc_html__( 'Options to change the single posts globally.', 'dark-music' ),
	'panel'             => 'dark_music_theme_options_panel',
) );

// Archive date meta setting and control.
$wp_customize->add_setting( 'dark_music_theme_options[single_post_hide_date]', array(
	'default'           => $options['single_post_hide_date'],
	'sanitize_callback' => 'dark_music_sanitize_switch_control',
) );

$wp_customize->add_control( new Dark_Music_Switch_Control( $wp_customize, 'dark_music_theme_options[single_post_hide_date]', array(
	'label'             => esc_html__( 'Hide Date', 'dark-music' ),
	'section'           => 'dark_music_single_post_section',
	'on_off_label' 		=> dark_music_hide_options(),
) ) );

// Archive author meta setting and control.
$wp_customize->add_setting( 'dark_music_theme_options[single_post_hide_author]', array(
	'default'           => $options['single_post_hide_author'],
	'sanitize_callback' => 'dark_music_sanitize_switch_control',
) );

$wp_customize->add_control( new Dark_Music_Switch_Control( $wp_customize, 'dark_music_theme_options[single_post_hide_author]', array(
	'label'             => esc_html__( 'Hide Author', 'dark-music' ),
	'section'           => 'dark_music_single_post_section',
	'on_off_label' 		=> dark_music_hide_options(),
) ) );

// Archive author category setting and control.
$wp_customize->add_setting( 'dark_music_theme_options[single_post_hide_category]', array(
	'default'           => $options['single_post_hide_category'],
	'sanitize_callback' => 'dark_music_sanitize_switch_control',
) );

$wp_customize->add_control( new Dark_Music_Switch_Control( $wp_customize, 'dark_music_theme_options[single_post_hide_category]', array(
	'label'             => esc_html__( 'Hide Category', 'dark-music' ),
	'section'           => 'dark_music_single_post_section',
	'on_off_label' 		=> dark_music_hide_options(),
) ) );

// Archive tag category setting and control.
$wp_customize->add_setting( 'dark_music_theme_options[single_post_hide_tags]', array(
	'default'           => $options['single_post_hide_tags'],
	'sanitize_callback' => 'dark_music_sanitize_switch_control',
) );

$wp_customize->add_control( new Dark_Music_Switch_Control( $wp_customize, 'dark_music_theme_options[single_post_hide_tags]', array(
	'label'             => esc_html__( 'Hide Tag', 'dark-music' ),
	'section'           => 'dark_music_single_post_section',
	'on_off_label' 		=> dark_music_hide_options(),
) ) );
