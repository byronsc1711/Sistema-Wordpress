<?php
/**
 * 404 Eroor Page Settings.
 *
 * @package Anecdote Lite
**/

$anecdote_lite_default = anecdote_lite_get_default_theme_options();
$anecdote_lite_post_category_list = anecdote_lite_post_category_list();

// Layout Section.
$wp_customize->add_section( '404_page_setting',
    array(
    'title'      => esc_html__( '404 Error Page Setting', 'anecdote-lite' ),
    'capability' => 'edit_theme_options',
    'panel'      => 'anecdote_lite_options',
    )
);

$wp_customize->add_setting(
    '404_page_image',
    array(
        'default'           => $anecdote_lite_default['404_page_image'],
        'sanitize_callback' => 'esc_url_raw',
    )
);

$wp_customize->add_control(
    new WP_Customize_Image_Control(
        $wp_customize,
        '404_page_image',
        array(
            'label'           => esc_html__( '404 Page Image', 'anecdote-lite' ),
            'description'     => esc_html__( '404 Featured Image.', 'anecdote-lite' ),
            'section'         => '404_page_setting',
        )
    )
);

$wp_customize->add_setting('enable_404_recommended_posts',
    array(
        'default' => $anecdote_lite_default['enable_404_recommended_posts'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'anecdote_lite_sanitize_checkbox',
    )
);
$wp_customize->add_control('enable_404_recommended_posts',
    array(
        'label' => esc_html__('Enable recommended articles', 'anecdote-lite'),
        'section' => '404_page_setting',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting('enable_404_recommended_post_cat',
    array(
        'default' => '',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control('enable_404_recommended_post_cat',
    array(
        'label' => esc_html__('Enable 404 Error Page Posts Category', 'anecdote-lite'),
        'section' => '404_page_setting',
        'type' => 'select',
        'choices' => $anecdote_lite_post_category_list,
    )
);

$wp_customize->add_setting('enable_404_recommended_posts_title',
    array(
        'default' => $anecdote_lite_default['enable_404_recommended_posts_title'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control('enable_404_recommended_posts_title',
    array(
        'label' => esc_html__('Enable 404 Error Page', 'anecdote-lite'),
        'section' => '404_page_setting',
        'type' => 'text',
    )
);