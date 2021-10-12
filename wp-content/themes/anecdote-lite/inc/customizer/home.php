<?php
/**
 * Section Reorder
 *
 * @package Anecdote Lite
**/

$anecdote_lite_default = anecdote_lite_get_default_theme_options();

// Section Reorder
$wp_customize->add_section( 'wedev_home_section_reorder',
	array(
	'title'      => esc_html__( 'Section Reorder', 'anecdote-lite' ),
	'capability' => 'edit_theme_options',
	'panel'		 => 'anecdote_lite_home',
	)
);


$wp_customize->add_setting(
	'home_section_order_7', 
	array(
		'default' => $anecdote_lite_default['home_section_order_7'],
		'sanitize_callback' => 'anecdote_lite_sanitize_reorder',
	)
);

$wp_customize->add_control(
	new Anecdote_Lite_Sortable_Control(
		$wp_customize,
		'home_section_order_7',
		array(
			'section'     => 'wedev_home_section_reorder',
			'label'       => __( 'Home Section Re-Order', 'anecdote-lite' ),
			'choices'     => array(
        		'featured-category'  => __( 'Featured Category', 'anecdote-lite' ),
        		'latest-posts'   => __( 'Latest Posts', 'anecdote-lite' ),
        	),
		)
	)
);