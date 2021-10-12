<?php
/**
 * Single Post Settings.
 *
 * @package Anecdote Lite
**/

$anecdote_lite_default = anecdote_lite_get_default_theme_options();

// Layout Section.
$wp_customize->add_section( 'single_post_setting',
	array(
	'title'      => esc_html__( 'Single Post Settings', 'anecdote-lite' ),
	'capability' => 'edit_theme_options',
	'panel'      => 'anecdote_lite_options',
	)
);

$wp_customize->add_setting('enable_author_box',
    array(
        'default' => $anecdote_lite_default['enable_author_box'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'anecdote_lite_sanitize_checkbox',
    )
);
$wp_customize->add_control('enable_author_box',
    array(
        'label' => esc_html__('Enable Author Box', 'anecdote-lite'),
        'section' => 'single_post_setting',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting('enable_single_related_post',
    array(
        'default' => $anecdote_lite_default['enable_single_related_post'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'anecdote_lite_sanitize_checkbox',
    )
);
$wp_customize->add_control('enable_single_related_post',
    array(
        'label' => esc_html__('Enable Related Posts', 'anecdote-lite'),
        'section' => 'single_post_setting',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting('related_post_title',
    array(
        'default' => $anecdote_lite_default['related_post_title'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control('related_post_title',
    array(
        'label' => esc_html__('Related Posts Title', 'anecdote-lite'),
        'section' => 'single_post_setting',
        'type' => 'text',
    )
);