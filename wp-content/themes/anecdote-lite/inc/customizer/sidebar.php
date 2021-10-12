<?php
/**
* Layouts Settings.
*
* @package Anecdote Lite
*/

$anecdote_lite_default = anecdote_lite_get_default_theme_options();
$sidebar_option = anecdote_lite_sidebar_options();
$sidebar_option_1 = anecdote_lite_sidebar_options( $global = false );

$wp_customize->add_section( 'sidebar_setting',
	array(
	'title'      => esc_html__( 'Sidebar Settings', 'anecdote-lite' ),
	'priority'   => 60,
	'capability' => 'edit_theme_options',
	'panel'      => 'anecdote_lite_options',
	)
);

$wp_customize->add_setting( 'global_sidebar_layout',
	array(
	'default'           => $anecdote_lite_default['global_sidebar_layout'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'anecdote_lite_sanitize_sidebar_option',
	)
);
$wp_customize->add_control( 'global_sidebar_layout',
	array(
	'label'       => esc_html__( 'Homepage Sidebar Layout', 'anecdote-lite' ),
	'section'     => 'sidebar_setting',
	'type'        => 'select',
	'choices'     => $sidebar_option_1,
	)
);

$wp_customize->add_setting( 'archive_sidebar_layout',
	array(
	'default'           => $anecdote_lite_default['archive_sidebar_layout'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'anecdote_lite_sanitize_sidebar_option',
	)
);
$wp_customize->add_control( 'archive_sidebar_layout',
	array(
	'label'       => esc_html__( 'Archive Sidebar Layout', 'anecdote-lite' ),
	'section'     => 'sidebar_setting',
	'type'        => 'select',
	'choices'     => $sidebar_option,
	)
);


$wp_customize->add_setting( 'single_sidebar_layout',
	array(
	'default'           => $anecdote_lite_default['single_sidebar_layout'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'anecdote_lite_sanitize_sidebar_option',
	)
);
$wp_customize->add_control( 'single_sidebar_layout',
	array(
	'label'       => esc_html__( 'Single Sidebar Layout', 'anecdote-lite' ),
	'section'     => 'sidebar_setting',
	'type'        => 'select',
	'choices'     => $sidebar_option,
	)
);
