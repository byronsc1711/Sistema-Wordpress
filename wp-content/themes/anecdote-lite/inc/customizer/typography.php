<?php
/**
* Theme Options.
*
* @package Anecdote Lite
*/

$anecdote_lite_default = anecdote_lite_get_default_theme_options();
$google_fonts = anecdote_lite_google_fonts();
$google_fonts_array = anecdote_lite_font_array();

$wedev_general_font = get_theme_mod( 'wedev_general_font',$anecdote_lite_default['wedev_general_font'] );
$wedev_general_font_key = array_search( $wedev_general_font, array_column( $google_fonts_array, 'family') );
$wedev_general_font_variants = $google_fonts_array[$wedev_general_font_key]['variants'];

$wedev_heading_font = get_theme_mod( 'wedev_heading_font',$anecdote_lite_default['wedev_heading_font'] );
$wedev_heading_font_key = array_search( $wedev_heading_font, array_column( $google_fonts_array, 'family') );
$wedev_heading_font_variants = $google_fonts_array[$wedev_heading_font_key]['variants'];

// Typography Panel.
$wp_customize->add_panel( 'wedev_typography_panel',
	array(
		'title'      => esc_html__( 'Typography', 'anecdote-lite' ),
		'priority'   => 50,
		'capability' => 'edit_theme_options',
	)
);

// General Font Section.
$wp_customize->add_section( 'wedev_general_typography',
	array(
	'title'      => esc_html__( 'General Typography', 'anecdote-lite' ),
	'priority'   => 50,
	'capability' => 'edit_theme_options',
	'panel'		 => 'wedev_typography_panel',
	)
);

$wp_customize->add_setting( 'wedev_general_font',
	array(
	'default'           => $anecdote_lite_default['wedev_general_font'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'anecdote_lite_sanitize_select',
	)
);
$wp_customize->add_control( 'wedev_general_font',
	array(
	'label'       => esc_html__( 'General Font', 'anecdote-lite' ),
	'section'     => 'wedev_general_typography',
	'type'        => 'select',
	'choices'     => $google_fonts,
	)
);

$wp_customize->add_setting( 'wedev_general_font_weight',
	array(
	'default'           => $anecdote_lite_default['wedev_general_font_weight'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'anecdote_lite_sanitize_select',
	)
);
$wp_customize->add_control( 'wedev_general_font_weight',
	array(
	'label'       => esc_html__( 'General Font Weight', 'anecdote-lite' ),
	'section'     => 'wedev_general_typography',
	'type'        => 'select',
	'choices'     => $wedev_general_font_variants,
	)
);

$wp_customize->add_setting(
    'anecdote_lite_general_font_size',
    array(
        'default'           => $anecdote_lite_default['anecdote_lite_general_font_size'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'postMessage',
    )
);
$wp_customize->add_control(
    new Anecdote_Lite_Range_Slider( 
        $wp_customize,
        'anecdote_lite_general_font_size',
        array(
            'label'      => esc_html__( 'General Font Size', 'anecdote-lite' ),
            'settings' => 'anecdote_lite_general_font_size',
            'section'       => 'wedev_general_typography',
            'min'        => '1',
            'max'        => '100',
        )
    )
);


// General Font Section.
$wp_customize->add_section( 'wedev_heading_typography',
	array(
	'title'      => esc_html__( 'Heading Typography', 'anecdote-lite' ),
	'priority'   => 50,
	'capability' => 'edit_theme_options',
	'panel'		 => 'wedev_typography_panel',
	)
);

$wp_customize->add_setting( 'wedev_heading_font',
	array(
	'default'           => $anecdote_lite_default['wedev_heading_font'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'anecdote_lite_sanitize_select',
	)
);
$wp_customize->add_control( 'wedev_heading_font',
	array(
	'label'       => esc_html__( 'Heading Font', 'anecdote-lite' ),
	'section'     => 'wedev_heading_typography',
	'type'        => 'select',
	'choices'     => $google_fonts,
	)
);

$wp_customize->add_setting( 'wedev_heading_font_case',
	array(
		'default'           => $anecdote_lite_default['wedev_heading_font_case'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'anecdote_lite_sanitize_select',
	)
);
$wp_customize->add_control( 'wedev_heading_font_case',
	array(
	'label'       => esc_html__( 'Headings Case', 'anecdote-lite' ),
	'section'     => 'wedev_heading_typography',
	'type'        => 'select',
	'choices'               => array(
		'none'  	=> esc_html__( 'Normal', 'anecdote-lite' ),
		'uppercase' => esc_html__( 'Uppercase', 'anecdote-lite' ),
		'lowercase' => esc_html__( 'Lowercase', 'anecdote-lite' ),
	    ),
	)
);


$wp_customize->add_setting(
    'anecdote_lite_h1_font_size',
    array(
        'default'           => $anecdote_lite_default['anecdote_lite_h1_font_size'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'postMessage',
    )
);
$wp_customize->add_control(
    new Anecdote_Lite_Range_Slider( 
        $wp_customize,
        'anecdote_lite_h1_font_size',
        array(
            'label'      => esc_html__( 'H1 Heading Font Size', 'anecdote-lite' ),
            'settings' => 'anecdote_lite_h1_font_size',
            'section'       => 'wedev_heading_typography',
            'min'        => '1',
            'max'        => '100',
        )
    )
);

$wp_customize->add_setting( 'anecdote_lite_h1_font_weight',
    array(
    'default'           => $anecdote_lite_default['anecdote_lite_h1_font_weight'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'anecdote_lite_sanitize_select',
    )
);
$wp_customize->add_control( 'anecdote_lite_h1_font_weight',
    array(
    'label'       => esc_html__( 'H1 Heading Font Weight', 'anecdote-lite' ),
    'section'     => 'wedev_heading_typography',
    'type'        => 'select',
    'choices'     => $wedev_heading_font_variants
    )
);


$wp_customize->add_setting(
    'anecdote_lite_h2_font_size',
    array(
        'default'           => $anecdote_lite_default['anecdote_lite_h2_font_size'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'postMessage',
    )
);
$wp_customize->add_control(
    new Anecdote_Lite_Range_Slider( 
        $wp_customize,
        'anecdote_lite_h2_font_size',
        array(
            'label'      => esc_html__( 'H2 Heading Font Size', 'anecdote-lite' ),
            'settings' => 'anecdote_lite_h2_font_size',
            'section'       => 'wedev_heading_typography',
            'min'        => '1',
            'max'        => '100',
        )
    )
);

$wp_customize->add_setting( 'anecdote_lite_h2_font_weight',
    array(
    'default'           => $anecdote_lite_default['anecdote_lite_h2_font_weight'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'anecdote_lite_sanitize_select',
    )
);
$wp_customize->add_control( 'anecdote_lite_h2_font_weight',
    array(
    'label'       => esc_html__( 'H2 Heading Font Weight', 'anecdote-lite' ),
    'section'     => 'wedev_heading_typography',
    'type'        => 'select',
    'choices'     => $wedev_heading_font_variants
    )
);


$wp_customize->add_setting(
    'anecdote_lite_h3_font_size',
    array(
        'default'           => $anecdote_lite_default['anecdote_lite_h3_font_size'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'postMessage',
    )
);
$wp_customize->add_control(
    new Anecdote_Lite_Range_Slider( 
        $wp_customize,
        'anecdote_lite_h3_font_size',
        array(
            'label'      => esc_html__( 'H3 Heading Font Size', 'anecdote-lite' ),
            'settings' => 'anecdote_lite_h3_font_size',
            'section'       => 'wedev_heading_typography',
            'min'        => '1',
            'max'        => '100',
        )
    )
);

$wp_customize->add_setting( 'anecdote_lite_h3_font_weight',
    array(
    'default'           => $anecdote_lite_default['anecdote_lite_h3_font_weight'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'anecdote_lite_sanitize_select',
    )
);
$wp_customize->add_control( 'anecdote_lite_h3_font_weight',
    array(
    'label'       => esc_html__( 'H3 Heading Font Weight', 'anecdote-lite' ),
    'section'     => 'wedev_heading_typography',
    'type'        => 'select',
    'choices'     => $wedev_heading_font_variants
    )
);


$wp_customize->add_setting(
    'anecdote_lite_h4_font_size',
    array(
        'default'           => $anecdote_lite_default['anecdote_lite_h4_font_size'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'postMessage',
    )
);
$wp_customize->add_control(
    new Anecdote_Lite_Range_Slider( 
        $wp_customize,
        'anecdote_lite_h4_font_size',
        array(
            'label'      => esc_html__( 'H4 Heading Font Size', 'anecdote-lite' ),
            'settings' => 'anecdote_lite_h4_font_size',
            'section'       => 'wedev_heading_typography',
            'min'        => '1',
            'max'        => '100',
        )
    )
);

$wp_customize->add_setting( 'anecdote_lite_h4_font_weight',
    array(
    'default'           => $anecdote_lite_default['anecdote_lite_h4_font_weight'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'anecdote_lite_sanitize_select',
    )
);
$wp_customize->add_control( 'anecdote_lite_h4_font_weight',
    array(
    'label'       => esc_html__( 'H4 Heading Font Weight', 'anecdote-lite' ),
    'section'     => 'wedev_heading_typography',
    'type'        => 'select',
    'choices'     => $wedev_heading_font_variants
    )
);


$wp_customize->add_setting(
    'anecdote_lite_h5_font_size',
    array(
        'default'           => $anecdote_lite_default['anecdote_lite_h5_font_size'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'postMessage',
    )
);
$wp_customize->add_control(
    new Anecdote_Lite_Range_Slider( 
        $wp_customize,
        'anecdote_lite_h5_font_size',
        array(
            'label'      => esc_html__( 'H5 Heading Font Size', 'anecdote-lite' ),
            'settings' => 'anecdote_lite_h5_font_size',
            'section'       => 'wedev_heading_typography',
            'min'        => '1',
            'max'        => '100',
        )
    )
);

$wp_customize->add_setting( 'anecdote_lite_h5_font_weight',
    array(
    'default'           => $anecdote_lite_default['anecdote_lite_h5_font_weight'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'anecdote_lite_sanitize_select',
    )
);
$wp_customize->add_control( 'anecdote_lite_h5_font_weight',
    array(
    'label'       => esc_html__( 'H5 Heading Font Weight', 'anecdote-lite' ),
    'section'     => 'wedev_heading_typography',
    'type'        => 'select',
    'choices'     => $wedev_heading_font_variants
    )
);


$wp_customize->add_setting(
    'anecdote_lite_h6_font_size',
    array(
        'default'           => $anecdote_lite_default['anecdote_lite_h6_font_size'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'postMessage',
    )
);
$wp_customize->add_control(
    new Anecdote_Lite_Range_Slider( 
        $wp_customize,
        'anecdote_lite_h6_font_size',
        array(
            'label'      => esc_html__( 'H6 Heading Font Size', 'anecdote-lite' ),
            'settings' => 'anecdote_lite_h6_font_size',
            'section'       => 'wedev_heading_typography',
            'min'        => '1',
            'max'        => '100',
        )
    )
);

$wp_customize->add_setting( 'anecdote_lite_h6_font_weight',
    array(
    'default'           => $anecdote_lite_default['anecdote_lite_h6_font_weight'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'anecdote_lite_sanitize_select',
    )
);
$wp_customize->add_control( 'anecdote_lite_h6_font_weight',
    array(
    'label'       => esc_html__( 'H6 Heading Font Weight', 'anecdote-lite' ),
    'section'     => 'wedev_heading_typography',
    'type'        => 'select',
    'choices'     => $wedev_heading_font_variants
    )
);