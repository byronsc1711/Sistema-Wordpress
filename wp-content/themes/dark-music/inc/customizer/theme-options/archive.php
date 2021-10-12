<?php
/**
 * Archive options
 *
 * @package Theme Palace
 * @subpackage Dark Music
 * @since Dark Music 1.0.0
 */

// Add archive section
$wp_customize->add_section( 'dark_music_archive_section', array(
	'title'             => esc_html__( 'Blog/Archive','dark-music' ),
	'description'       => esc_html__( 'Archive section options.', 'dark-music' ),
	'panel'             => 'dark_music_theme_options_panel',
) );

// Your latest posts title setting and control.
$wp_customize->add_setting( 'dark_music_theme_options[your_latest_posts_title]', array(
	'default'           => $options['your_latest_posts_title'],
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'dark_music_theme_options[your_latest_posts_title]', array(
	'label'             => esc_html__( 'Your Latest Posts Title', 'dark-music' ),
	'description'       => esc_html__( 'This option only works if Static Front Page is set to "Your latest posts."', 'dark-music' ),
	'section'           => 'dark_music_archive_section',
	'type'				=> 'text',
	'active_callback'   => 'dark_music_is_latest_posts'
) );

// Your latest posts title setting and control.
$wp_customize->add_setting( 'dark_music_theme_options[read_more_text]', array(
	'default'           => $options['read_more_text'],
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'dark_music_theme_options[read_more_text]', array(
	'label'             => esc_html__( 'Read More Text', 'dark-music' ),
	'section'           => 'dark_music_archive_section',
	'type'				=> 'text',
) );