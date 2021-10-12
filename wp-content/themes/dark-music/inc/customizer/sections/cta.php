<?php
/**
 * Call to Action Section options
 *
 * @package Theme Palace
 * @subpackage Dark Music
 * @since Dark Music 1.0.0
 */

// Add Call to Action section
$wp_customize->add_section( 'dark_music_cta_section', array(
	'title'             => esc_html__( 'Call to Action','dark-music' ),
	'description'       => esc_html__( 'Call to Action Section options.', 'dark-music' ),
	'panel'             => 'dark_music_front_page_panel',
) );

// Call to Action content enable control and setting
$wp_customize->add_setting( 'dark_music_theme_options[cta_section_enable]', array(
	'default'			=> 	$options['cta_section_enable'],
	'sanitize_callback' => 'dark_music_sanitize_switch_control',
) );

$wp_customize->add_control( new Dark_Music_Switch_Control( $wp_customize, 'dark_music_theme_options[cta_section_enable]', array(
	'label'             => esc_html__( 'Call to Action Section Enable', 'dark-music' ),
	'section'           => 'dark_music_cta_section',
	'on_off_label' 		=> dark_music_switch_options(),
) ) );

if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'dark_music_theme_options[cta_section_enable]', array(
		'selector'            => '.cta-section .tooltiptext',
		'settings'            => 'dark_music_theme_options[cta_section_enable]',
    ) );
}

// cta pages drop down chooser control and setting
$wp_customize->add_setting( 'dark_music_theme_options[cta_content_page]', array(
	'sanitize_callback' => 'dark_music_sanitize_page',
) );

$wp_customize->add_control( new Dark_Music_Dropdown_Chooser( $wp_customize, 'dark_music_theme_options[cta_content_page]', array(
	'label'             => esc_html__( 'Select Page', 'dark-music' ),
	'section'           => 'dark_music_cta_section',
	'choices'			=> dark_music_page_choices(),
	'active_callback'	=> 'dark_music_is_cta_section_enable',
) ) );

// cta btn title setting and control
$wp_customize->add_setting( 'dark_music_theme_options[cta_btn_title]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'dark_music_theme_options[cta_btn_title]', array(
	'label'           	=> esc_html__( 'Button Label', 'dark-music' ),
	'section'        	=> 'dark_music_cta_section',
	'active_callback' 	=> 'dark_music_is_cta_section_enable',
	'type'				=> 'text',
) );
