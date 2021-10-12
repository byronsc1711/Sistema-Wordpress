<?php
/**
 * Social Icon Settings.
 *
 * @package Anecdote Lite
**/

$anecdote_lite_default = anecdote_lite_get_default_theme_options();

// Layout Section.
$wp_customize->add_section( 'social_icon',
    array(
    'title'      => esc_html__( 'Social Icon Settings', 'anecdote-lite' ),
    'capability' => 'edit_theme_options',
    'panel'      => 'anecdote_lite_options',
    )
);

$wp_customize->add_setting('enable_social_link',
    array(
        'default' => $anecdote_lite_default['enable_social_link'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'anecdote_lite_sanitize_checkbox',
    )
);
$wp_customize->add_control('enable_social_link',
    array(
        'label' => esc_html__('Enable Social Link', 'anecdote-lite'),
        'section' => 'social_icon',
        'type' => 'checkbox',
    )
);

// Social Icons
$wp_customize->add_setting( 'anecdote_lite_social_icon_4', array(
    'sanitize_callback' => 'anecdote_lite_sanitize_social_icons',
    'default' => $anecdote_lite_default['anecdote_lite_social_icon_4'],
    'sanitize_callback' => 'anecdote_lite_sanitize_social_icons',
));

$wp_customize->add_control(  new Anecdote_Lite_Social_Icon_Controler( $wp_customize, 'anecdote_lite_social_icon_4',
    array(
        'section' => 'social_icon',
        'settings' => 'anecdote_lite_social_icon_4',
        'anecdote_lite_box_label' => esc_html__('Social Profile','anecdote-lite'),
        'anecdote_lite_box_add_control' => esc_html__('Add New Social Link','anecdote-lite'),
    ),
    array(
        'social_svg_icon' => array(
            'type'        => 'icons',
            'label'       => esc_html__( 'SVG Icons', 'anecdote-lite' ),
            'class'     => 'ta-fa-icons-rep'
        ),
        'social_link' => array(
            'type'        => 'link',
            'label'       => esc_html__( 'Social Links', 'anecdote-lite' ),
        ),
        'label' => array(
            'type'        => 'text',
            'label'       => esc_html__( 'Social Icon Label', 'anecdote-lite' ),
        ),
    )
));