<?php
/**
 * client Section options
 *
 * @package Theme Palace
 * @subpackage Dark Music
 * @since Dark Music 1.0.0
 */

// Add client section
$wp_customize->add_section( 'dark_music_client_section', array(
	'title'             => esc_html__( 'Client','dark-music' ),
	'description'       => esc_html__( 'Client Section options.', 'dark-music' ),
	'panel'             => 'dark_music_front_page_panel',
) );

// client content enable control and setting
$wp_customize->add_setting( 'dark_music_theme_options[client_section_enable]', array(
	'default'			=> 	$options['client_section_enable'],
	'sanitize_callback' => 'dark_music_sanitize_switch_control',
) );

$wp_customize->add_control( new Dark_Music_Switch_Control( $wp_customize, 'dark_music_theme_options[client_section_enable]', array(
	'label'             => esc_html__( 'client Section Enable', 'dark-music' ),
	'section'           => 'dark_music_client_section',
	'on_off_label' 		=> dark_music_switch_options(),
) ) );

if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'dark_music_theme_options[client_section_enable]', array(
		'selector'            => '.client-section .tooltiptext',
		'settings'            => 'dark_music_theme_options[client_section_enable]',
    ) );
}

for ( $i = 1; $i <= 5; $i++ ) :
	// client image setting and control.
	$wp_customize->add_setting( 'dark_music_theme_options[client_image_' . $i . ']', array(
		'sanitize_callback' => 'dark_music_sanitize_image'
	) );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'dark_music_theme_options[client_image_' . $i . ']',
			array(
			'label'       		=> sprintf( esc_html__( 'Client Logo %d', 'dark-music' ), $i ),
			'description' 		=> sprintf( esc_html__( 'Recommended size: %1$dpx x %2$dpx ', 'dark-music' ), 200, 200 ),
			'section'     		=> 'dark_music_client_section',
			'active_callback'	=> 'dark_music_is_client_section_enable',
	) ) );

	// client position setting and control
	$wp_customize->add_setting( 'dark_music_theme_options[client_link_' . $i . ']', array(
		'sanitize_callback' => 'esc_url_raw',
	) );

	$wp_customize->add_control( 'dark_music_theme_options[client_link_' . $i . ']', array(
		'label'           	=> sprintf( esc_html__( 'Client Link %d', 'dark-music' ), $i ),
		'section'        	=> 'dark_music_client_section',
		'active_callback' 	=> 'dark_music_is_client_section_enable',
		'type'				=> 'url',
	) );

	// client hr setting and control
	$wp_customize->add_setting( 'dark_music_theme_options[client_hr_'. $i .']', array(
		'sanitize_callback' => 'sanitize_text_field'
	) );

	$wp_customize->add_control( new Dark_Music_Customize_Horizontal_Line( $wp_customize, 'dark_music_theme_options[client_hr_'. $i .']',
		array(
			'section'         => 'dark_music_client_section',
			'active_callback' => 'dark_music_is_client_section_enable',
			'type'			  => 'hr'
	) ) );
endfor;

