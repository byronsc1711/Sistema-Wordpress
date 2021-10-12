<?php
/**
 * Event Section options
 *
 * @package Theme Palace
 * @subpackage Dark Music
 * @since Dark Music 1.0.0
 */

// Add Event section
$wp_customize->add_section( 'dark_music_event_section', array(
	'title'             => esc_html__( 'Event','dark-music' ),
	'description'       => esc_html__( 'Event Section options.', 'dark-music' ),
	'panel'             => 'dark_music_front_page_panel',
) );

// Event content enable control and setting
$wp_customize->add_setting( 'dark_music_theme_options[event_section_enable]', array(
	'default'			=> 	$options['event_section_enable'],
	'sanitize_callback' => 'dark_music_sanitize_switch_control',
) );

$wp_customize->add_control( new Dark_Music_Switch_Control( $wp_customize, 'dark_music_theme_options[event_section_enable]', array(
	'label'             => esc_html__( 'Event Section Enable', 'dark-music' ),
	'section'           => 'dark_music_event_section',
	'on_off_label' 		=> dark_music_switch_options(),
) ) );

if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'dark_music_theme_options[event_section_enable]', array(
		'selector'            => '#events-section .tooltiptext',
		'settings'            => 'dark_music_theme_options[event_section_enable]',
    ) );
}


$wp_customize->add_setting( 'dark_music_theme_options[event_bg_image]', array(
	'sanitize_callback' => 'dark_music_sanitize_image'
) );

$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'dark_music_theme_options[event_bg_image]',
		array(
		'label'       		=> esc_html__( 'Bg Image', 'dark-music' ),
		'section'     		=> 'dark_music_event_section',
		'active_callback'	=> 'dark_music_is_event_section_enable',
) ) );


// event title setting and control
$wp_customize->add_setting( 'dark_music_theme_options[event_title]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['event_title'],
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'dark_music_theme_options[event_title]', array(
	'label'           	=> esc_html__( 'Title', 'dark-music' ),
	'section'        	=> 'dark_music_event_section',
	'active_callback' 	=> 'dark_music_is_event_section_enable',
	'type'				=> 'text',
) );


// event subtitle setting and control
$wp_customize->add_setting( 'dark_music_theme_options[event_subtitle]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['event_subtitle'],
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'dark_music_theme_options[event_subtitle]', array(
	'label'           	=> esc_html__( 'Sub Title', 'dark-music' ),
	'section'        	=> 'dark_music_event_section',
	'active_callback' 	=> 'dark_music_is_event_section_enable',
	'type'				=> 'text',
) );


for ( $i = 1; $i <= 5; $i++ ) :

	// event posts drop down chooser control and setting
	$wp_customize->add_setting( 'dark_music_theme_options[event_content_page_' . $i . ']', array(
		'sanitize_callback' => 'dark_music_sanitize_page',
	) );

	$wp_customize->add_control( new Dark_Music_Dropdown_Chooser( $wp_customize, 'dark_music_theme_options[event_content_page_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Select Page %d', 'dark-music' ), $i ),
		'section'           => 'dark_music_event_section',
		'choices'			=> dark_music_page_choices(),
		'active_callback'	=> 'dark_music_is_event_section_enable',
	) ) );
endfor;

// event readmore setting and control
$wp_customize->add_setting( 'dark_music_theme_options[event_readmore]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['event_readmore'],
) );

$wp_customize->add_control( 'dark_music_theme_options[event_readmore]', array(
	'label'           	=> esc_html__( 'Read More Label', 'dark-music' ),
	'section'        	=> 'dark_music_event_section',
	'active_callback' 	=> 'dark_music_is_event_section_enable',
	'type'				=> 'text',
) );
