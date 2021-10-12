<?php
/**
 * Slider Customizer Options
 *
 * @package shark_business
 */

// Add slider section
$wp_customize->add_section( 'shark_business_slider_section', array(
	'title'             => esc_html__( 'Slider Section','shark-business' ),
	'description'       => esc_html__( 'Slider Setting Options', 'shark-business' ),
	'panel'             => 'shark_business_theme_options_panel',
) );

// slider menu enable setting and control.
$wp_customize->add_setting( 'shark_business_theme_options[enable_slider]', array(
	'default'           => shark_business_theme_option('enable_slider'),
	'sanitize_callback' => 'shark_business_sanitize_switch',
) );

$wp_customize->add_control( new Shark_Business_Switch_Control( $wp_customize, 'shark_business_theme_options[enable_slider]', array(
	'label'             => esc_html__( 'Enable Slider', 'shark-business' ),
	'section'           => 'shark_business_slider_section',
	'on_off_label' 		=> shark_business_show_options(),
) ) );

// slider social menu enable setting and control.
$wp_customize->add_setting( 'shark_business_theme_options[slider_entire_site]', array(
	'default'           => shark_business_theme_option('slider_entire_site'),
	'sanitize_callback' => 'shark_business_sanitize_switch',
) );

$wp_customize->add_control( new Shark_Business_Switch_Control( $wp_customize, 'shark_business_theme_options[slider_entire_site]', array(
	'label'             => esc_html__( 'Show Entire Site', 'shark-business' ),
	'section'           => 'shark_business_slider_section',
	'on_off_label' 		=> shark_business_show_options(),
) ) );

// slider arrow control enable setting and control.
$wp_customize->add_setting( 'shark_business_theme_options[slider_arrow]', array(
	'default'           => shark_business_theme_option('slider_arrow'),
	'sanitize_callback' => 'shark_business_sanitize_switch',
) );

$wp_customize->add_control( new Shark_Business_Switch_Control( $wp_customize, 'shark_business_theme_options[slider_arrow]', array(
	'label'             => esc_html__( 'Show Arrow Controller', 'shark-business' ),
	'section'           => 'shark_business_slider_section',
	'on_off_label' 		=> shark_business_show_options(),
) ) );

for ( $i = 1; $i <= 5; $i++ ) :

	// slider pages drop down chooser control and setting
	$wp_customize->add_setting( 'shark_business_theme_options[slider_content_page_' . $i . ']', array(
		'sanitize_callback' => 'shark_business_sanitize_page_post',
	) );

	$wp_customize->add_control( new Shark_Business_Dropdown_Chosen_Control( $wp_customize, 'shark_business_theme_options[slider_content_page_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Select Page %d', 'shark-business' ), $i ),
		'section'           => 'shark_business_slider_section',
		'choices'			=> shark_business_page_choices(),
	) ) );

endfor;