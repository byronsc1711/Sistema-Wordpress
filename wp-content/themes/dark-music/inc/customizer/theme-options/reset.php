<?php
/**
 * Reset options
 *
 * @package Theme Palace
 * @subpackage Dark Music
 * @since Dark Music 1.0.0
 */

/**
* Reset section
*/
// Add reset enable section
$wp_customize->add_section( 'dark_music_reset_section', array(
	'title'             => esc_html__('Reset all settings','dark-music'),
	'description'       => esc_html__( 'Caution: All settings will be reset to default. Refresh the page after clicking Save & Publish.', 'dark-music' ),
) );

// Add reset enable setting and control.
$wp_customize->add_setting( 'dark_music_theme_options[reset_options]', array(
	'default'           => $options['reset_options'],
	'sanitize_callback' => 'dark_music_sanitize_checkbox',
	'transport'			  => 'postMessage',
) );

$wp_customize->add_control( 'dark_music_theme_options[reset_options]', array(
	'label'             => esc_html__( 'Check to reset all settings', 'dark-music' ),
	'section'           => 'dark_music_reset_section',
	'type'              => 'checkbox',
) );
