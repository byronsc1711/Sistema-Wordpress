<?php
/**
 * Archive Settings.
 *
 * @package Anecdote Lite
**/

$anecdote_lite_default = anecdote_lite_get_default_theme_options();

// Layout Section.
$wp_customize->add_section( 'archive_setting',
	array(
	'title'      => esc_html__( 'Archive Settings', 'anecdote-lite' ),
	'capability' => 'edit_theme_options',
	'panel'      => 'anecdote_lite_options',
	)
);

$wp_customize->add_setting('enable_recommended_posts',
    array(
        'default' => $anecdote_lite_default['enable_recommended_posts'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'anecdote_lite_sanitize_checkbox',
    )
);
$wp_customize->add_control('enable_recommended_posts',
    array(
        'label' => esc_html__('Enable Related Posts', 'anecdote-lite'),
        'section' => 'archive_setting',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting('archive_recommended_posts_title',
    array(
        'default' => $anecdote_lite_default['archive_recommended_posts_title'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control('archive_recommended_posts_title',
    array(
        'label' => esc_html__('Recommended Posts Title', 'anecdote-lite'),
        'section' => 'archive_setting',
        'type' => 'text',
    )
);