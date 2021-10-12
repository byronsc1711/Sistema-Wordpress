<?php
/**
* Header Banner Options.
*
* @package Anecdote Lite
*/

$anecdote_lite_default = anecdote_lite_get_default_theme_options();
$anecdote_lite_post_category_list = anecdote_lite_post_category_list();

$wp_customize->add_section( 'header_featured_category_setting',
    array(
    'title'      => esc_html__( 'Featured Category Settings', 'anecdote-lite' ),
    'priority'   => 10,
    'capability' => 'edit_theme_options',
    'panel'      => 'anecdote_lite_home',
    )
);

$wp_customize->add_setting('enable_header_featured_category',
    array(
        'default' => $anecdote_lite_default['enable_header_featured_category'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'anecdote_lite_sanitize_checkbox',
    )
);
$wp_customize->add_control('enable_header_featured_category',
    array(
        'label' => esc_html__('Enable Featured Category', 'anecdote-lite'),
        'section' => 'header_featured_category_setting',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting('enable_header_featured_category_column',
    array(
        'default' => $anecdote_lite_default['enable_header_featured_category_column'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'absint',
    )
);
$wp_customize->add_control('enable_header_featured_category_column',
    array(
        'label' => esc_html__('Grid Column Layout', 'anecdote-lite'),
        'section' => 'header_featured_category_setting',
        'type' => 'select',
        'choices' => array(
            '2' => esc_html__('Two Column', 'anecdote-lite'),
            '3' => esc_html__('Three Column', 'anecdote-lite'),
            '4' => esc_html__('Four Column', 'anecdote-lite'),
        ),
    )
);

$wp_customize->add_setting( 'anecdote_lite_header_featured_category_cat_1',
    array(
    'default'           => '',
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'anecdote_lite_sanitize_select',
    )
);
$wp_customize->add_control( 'anecdote_lite_header_featured_category_cat_1',
    array(
    'label'       => esc_html__( 'Featured Category 1', 'anecdote-lite' ),
    'section'     => 'header_featured_category_setting',
    'type'        => 'select',
    'choices'     => $anecdote_lite_post_category_list,
    )
);

$wp_customize->add_setting( 'anecdote_lite_header_featured_category_cat_2',
    array(
    'default'           => '',
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'anecdote_lite_sanitize_select',
    )
);
$wp_customize->add_control( 'anecdote_lite_header_featured_category_cat_2',
    array(
    'label'       => esc_html__( 'Featured Category 2', 'anecdote-lite' ),
    'section'     => 'header_featured_category_setting',
    'type'        => 'select',
    'choices'     => $anecdote_lite_post_category_list,
    )
);

$wp_customize->add_setting( 'anecdote_lite_header_featured_category_cat_3',
    array(
    'default'           => '',
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'anecdote_lite_sanitize_select',
    )
);
$wp_customize->add_control( 'anecdote_lite_header_featured_category_cat_3',
    array(
    'label'       => esc_html__( 'Featured Category 3', 'anecdote-lite' ),
    'section'     => 'header_featured_category_setting',
    'type'        => 'select',
    'choices'     => $anecdote_lite_post_category_list,
    'active_callback' => 'anecdote_lite_featured_cat_ac_3',
    )
);

$wp_customize->add_setting( 'anecdote_lite_header_featured_category_cat_4',
    array(
    'default'           => '',
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'anecdote_lite_sanitize_select',
    )
);
$wp_customize->add_control( 'anecdote_lite_header_featured_category_cat_4',
    array(
    'label'       => esc_html__( 'Featured Category 4', 'anecdote-lite' ),
    'section'     => 'header_featured_category_setting',
    'type'        => 'select',
    'choices'     => $anecdote_lite_post_category_list,
    'active_callback' => 'anecdote_lite_featured_cat_ac_4',
    )
);