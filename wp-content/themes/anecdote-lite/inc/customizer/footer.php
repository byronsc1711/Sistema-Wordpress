<?php
/**
* Footer Settings.
*
* @package Anecdote Lite
*/


$wp_customize->add_section( 'footer_settings',
	array(
	'title'      => esc_html__( 'Footer Settings', 'anecdote-lite' ),
	'priority'   => 200,
	'capability' => 'edit_theme_options',
	'panel'      => 'anecdote_lite_options',
	)
);

$wp_customize->add_setting( 'footer_copyright_text',
	array(
	'default'           => '',
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control( 'footer_copyright_text',
	array(
	'label'    => esc_html__( 'Footer Copyright Text', 'anecdote-lite' ),
	'section'  => 'footer_settings',
	'type'     => 'text',
	)
);

$wp_customize->add_setting(
    'anecdote_lite_premium_notiece_footer',
    array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    )
);
$wp_customize->add_control(
    new Anecdote_Lite_Premium_Notiece_Control( 
        $wp_customize,
        'anecdote_lite_premium_notiece_footer',
        array(
            'label'      => esc_html__( 'Notice', 'anecdote-lite' ),
            'settings' => 'anecdote_lite_premium_notiece_footer',
            'section'       => 'footer_settings',
        )
    )
);