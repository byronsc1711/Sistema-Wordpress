<?php
/**
 * Testimonial Section options
 *
 * @package Theme Palace
 * @subpackage Dark Music
 * @since Dark Music 1.0.0
 */

// Add Testimonial section
$wp_customize->add_section( 'dark_music_testimonial_section', array(
	'title'             => esc_html__( 'Testimonial','dark-music' ),
	'description'       => esc_html__( 'Testimonial Section options.', 'dark-music' ),
	'panel'             => 'dark_music_front_page_panel',
) );

// Testimonial content enable control and setting
$wp_customize->add_setting( 'dark_music_theme_options[testimonial_section_enable]', array(
	'default'			=> 	$options['testimonial_section_enable'],
	'sanitize_callback' => 'dark_music_sanitize_switch_control',
) );

$wp_customize->add_control( new Dark_Music_Switch_Control( $wp_customize, 'dark_music_theme_options[testimonial_section_enable]', array(
	'label'             => esc_html__( 'Testimonial Section Enable', 'dark-music' ),
	'section'           => 'dark_music_testimonial_section',
	'on_off_label' 		=> dark_music_switch_options(),
) ) );

if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'dark_music_theme_options[testimonial_section_enable]', array(
		'selector'            => '#testimonial-section .tooltiptext',
		'settings'            => 'dark_music_theme_options[testimonial_section_enable]',
    ) );
}


// testimonial title setting and control
$wp_customize->add_setting( 'dark_music_theme_options[testimonial_title]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['testimonial_title'],
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'dark_music_theme_options[testimonial_title]', array(
	'label'           	=> esc_html__( 'Title', 'dark-music' ),
	'section'        	=> 'dark_music_testimonial_section',
	'active_callback' 	=> 'dark_music_is_testimonial_section_enable',
	'type'				=> 'text',
) );

// testimonial subtitle setting and control
$wp_customize->add_setting( 'dark_music_theme_options[testimonial_subtitle]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['testimonial_subtitle'],
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'dark_music_theme_options[testimonial_subtitle]', array(
	'label'           	=> esc_html__( 'Sub Title', 'dark-music' ),
	'section'        	=> 'dark_music_testimonial_section',
	'active_callback' 	=> 'dark_music_is_testimonial_section_enable',
	'type'				=> 'text',
) );


for ( $i = 1; $i <= 4; $i++ ) :
	// testimonial pages drop down chooser control and setting
	$wp_customize->add_setting( 'dark_music_theme_options[testimonial_content_page_' . $i . ']', array(
		'sanitize_callback' => 'dark_music_sanitize_page',
	) );

	$wp_customize->add_control( new Dark_Music_Dropdown_Chooser( $wp_customize, 'dark_music_theme_options[testimonial_content_page_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Select Page %d', 'dark-music' ), $i ),
		'section'           => 'dark_music_testimonial_section',
		'choices'			=> dark_music_page_choices(),
		'active_callback'	=> 'dark_music_is_testimonial_section_enable',
	) ) );


	// testimonial position setting and control
	$wp_customize->add_setting( 'dark_music_theme_options[testimonial_position_' . $i . ']', array(
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'dark_music_theme_options[testimonial_position_' . $i . ']', array(
		'label'           	=> sprintf( esc_html__( 'Position %d', 'dark-music' ), $i ),
		'section'        	=> 'dark_music_testimonial_section',
		'active_callback' 	=> 'dark_music_is_testimonial_section_enable',
		'type'				=> 'text',
	) );
endfor;

