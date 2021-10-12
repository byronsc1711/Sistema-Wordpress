<?php
/**
 * Excerpt options
 *
 * @package Theme Palace
 * @subpackage Dark Music
 * @since Dark Music 1.0.0
 */

// Add excerpt section
$wp_customize->add_section( 'dark_music_excerpt_section', array(
	'title'             => esc_html__( 'Excerpt','dark-music' ),
	'description'       => esc_html__( 'Excerpt section options.', 'dark-music' ),
	'panel'             => 'dark_music_theme_options_panel',
) );


// long Excerpt length setting and control.
$wp_customize->add_setting( 'dark_music_theme_options[long_excerpt_length]', array(
	'sanitize_callback' => 'dark_music_sanitize_number_range',
	'validate_callback' => 'dark_music_validate_long_excerpt',
	'default'			=> $options['long_excerpt_length'],
) );

$wp_customize->add_control( 'dark_music_theme_options[long_excerpt_length]', array(
	'label'       		=> esc_html__( 'Blog Page Excerpt Length', 'dark-music' ),
	'description' 		=> esc_html__( 'Total words to be displayed in archive page/search page.', 'dark-music' ),
	'section'     		=> 'dark_music_excerpt_section',
	'type'        		=> 'number',
	'input_attrs' 		=> array(
		'style'       => 'width: 80px;',
		'max'         => 100,
		'min'         => 5,
	),
) );

