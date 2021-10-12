<?php
/**
* Header Banner Options.
*
* @package Anecdote Lite
*/

$anecdote_lite_default = anecdote_lite_get_default_theme_options();
$anecdote_lite_post_category_list = anecdote_lite_post_category_list();

$wp_customize->add_section( 'header_banner_setting',
    array(
    'title'      => esc_html__( 'Slider Banner Settings', 'anecdote-lite' ),
    'priority'   => 10,
    'capability' => 'edit_theme_options',
    'panel'      => 'anecdote_lite_home',
    )
);

$wp_customize->add_setting('enable_header_banner',
    array(
        'default' => $anecdote_lite_default['enable_header_banner'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'anecdote_lite_sanitize_checkbox',
    )
);
$wp_customize->add_control('enable_header_banner',
    array(
        'label' => esc_html__('Enable Slider Banner', 'anecdote-lite'),
        'section' => 'header_banner_setting',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting( 'anecdote_lite_header_banner_cat',
    array(
    'default'           => '',
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'anecdote_lite_sanitize_select',
    )
);
$wp_customize->add_control( 'anecdote_lite_header_banner_cat',
    array(
    'label'       => esc_html__( 'Slider Post Category', 'anecdote-lite' ),
    'section'     => 'header_banner_setting',
    'type'        => 'select',
    'choices'     => $anecdote_lite_post_category_list,
    )
);