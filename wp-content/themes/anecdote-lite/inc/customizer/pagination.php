<?php
/**
 * Pagination Settings
 *
 * @package Anecdote Lite
 */

$anecdote_lite_default = anecdote_lite_get_default_theme_options();

// Pagination Section.
$wp_customize->add_section( 'anecdote_lite_pagination_section',
	array(
	'title'      => esc_html__( 'Pagination Settings', 'anecdote-lite' ),
	'priority'   => 20,
	'capability' => 'edit_theme_options',
	'panel'		 => 'anecdote_lite_options',
	)
);

// Pagination Layout Settings
$wp_customize->add_setting( 'anecdote_lite_pagination_layout',
	array(
	'default'           => $anecdote_lite_default['anecdote_lite_pagination_layout'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control( 'anecdote_lite_pagination_layout',
	array(
	'label'       => esc_html__( 'Pagination Method', 'anecdote-lite' ),
	'section'     => 'anecdote_lite_pagination_section',
	'type'        => 'select',
	'choices'     => array(
		'next-prev' => esc_html__('Next/Previous Method','anecdote-lite'),
		'numeric' => esc_html__('Numeric Method','anecdote-lite'),
		'load-more' => esc_html__('Ajax Load More Button','anecdote-lite'),
		'auto-load' => esc_html__('Ajax Auto Load','anecdote-lite'),
	),
	)
);