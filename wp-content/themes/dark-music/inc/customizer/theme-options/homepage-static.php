<?php
/**
* Homepage (Static ) options
*
* @package Theme Palace
* @subpackage Dark Music
* @since Dark Music 1.0.0
*/

// Homepage (Static ) setting and control.
$wp_customize->add_setting( 'dark_music_theme_options[enable_frontpage_content]', array(
	'sanitize_callback'   => 'dark_music_sanitize_checkbox',
	'default'             => $options['enable_frontpage_content'],
) );

$wp_customize->add_control( 'dark_music_theme_options[enable_frontpage_content]', array(
	'label'       	=> esc_html__( 'Enable Content', 'dark-music' ),
	'description' 	=> esc_html__( 'Check to enable content on static front page only.', 'dark-music' ),
	'section'     	=> 'static_front_page',
	'type'        	=> 'checkbox',
) );