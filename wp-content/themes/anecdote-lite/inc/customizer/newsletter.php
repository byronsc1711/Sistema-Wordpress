<?php
/**
 * Newsletter Subscription Settings.
 *
 * @package Anecdote Lite
**/

$anecdote_lite_default = anecdote_lite_get_default_theme_options();

// Layout Section.
$wp_customize->add_section( 'subscribe_section',
    array(
    'title'      => esc_html__( 'Newsletter Subscription Settings', 'anecdote-lite' ),
    'capability' => 'edit_theme_options',
    'panel'      => 'anecdote_lite_options',
    )
);

if( function_exists( '_mc4wp_load_plugin' ) ){

    $wp_customize->add_setting('enable_subscribe',
        array(
            'default' => $anecdote_lite_default['enable_subscribe'],
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'anecdote_lite_sanitize_checkbox',
        )
    );
    $wp_customize->add_control('enable_subscribe',
        array(
            'label' => esc_html__('Enable Newsletter Subscription Section', 'anecdote-lite'),
            'section' => 'subscribe_section',
            'type' => 'checkbox',
        )
    );

    $wp_customize->add_setting('subscribe_section_title',
        array(
            'default' => $anecdote_lite_default['subscribe_section_title'],
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control('subscribe_section_title',
        array(
            'label' => esc_html__('Newsletter Subscription Section Title', 'anecdote-lite'),
            'section' => 'subscribe_section',
            'type' => 'text',
        )
    );

    $wp_customize->add_setting('subscribe_section_desc',
        array(
            'default' => $anecdote_lite_default['subscribe_section_desc'],
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control('subscribe_section_desc',
        array(
            'label' => esc_html__('Newsletter Subscription Section Title', 'anecdote-lite'),
            'section' => 'subscribe_section',
            'type' => 'text',
        )
    );

    $wp_customize->add_setting('subscribe_shortcode',
        array(
            'default' => '',
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control('subscribe_shortcode',
        array(
            'label' => esc_html__('Newsletter Subscription Form Shortcode', 'anecdote-lite'),
            'section' => 'subscribe_section',
            'type' => 'textarea',
        )
    );

    $wp_customize->add_setting('ed_popup_model_box',
        array(
            'default' => $anecdote_lite_default['ed_popup_model_box'],
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'anecdote_lite_sanitize_checkbox',
        )
    );
    $wp_customize->add_control('ed_popup_model_box',
        array(
            'label' => esc_html__('Enable Newsletter popup', 'anecdote-lite'),
            'section' => 'subscribe_section',
            'type' => 'checkbox',
        )
    );

    $wp_customize->add_setting('ed_popup_model_box_home_only',
        array(
            'default' => $anecdote_lite_default['ed_popup_model_box_home_only'],
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'anecdote_lite_sanitize_checkbox',
        )
    );
    $wp_customize->add_control('ed_popup_model_box_home_only',
        array(
            'label' => esc_html__('Prompt only on homepage', 'anecdote-lite'),
            'section' => 'subscribe_section',
            'type' => 'checkbox',
        )
    );

    $wp_customize->add_setting('ed_popup_model_box_first_loading_only',
        array(
            'default' => $anecdote_lite_default['ed_popup_model_box_first_loading_only'],
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'anecdote_lite_sanitize_checkbox',
        )
    );
    $wp_customize->add_control('ed_popup_model_box_first_loading_only',
        array(
            'label' => esc_html__('Do not show this again this session', 'anecdote-lite'),
            'section' => 'subscribe_section',
            'type' => 'checkbox',
        )
    );

    $wp_customize->add_setting('wedev_popup_bg_image_image',
        array(
            'default' => '',
            'sanitize_callback' => 'esc_url_raw'
        )
    );
    $wp_customize->add_control( new WP_Customize_Image_Control(
        $wp_customize,
        'wedev_popup_bg_image_image',
            array(
                'label'      => esc_html__( 'Popup Model Box Image', 'anecdote-lite' ),
                'section'    => 'subscribe_section',
            )
        )
    );

    $wp_customize->add_setting( 'wedev_popup_title',
        array(
        'default'           => $anecdote_lite_default['wedev_popup_title'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control( 'wedev_popup_title',
        array(
        'label'    => esc_html__( 'Popup Model Box Title', 'anecdote-lite' ),
        'section'  => 'subscribe_section',
        'type'     => 'text',
        )
    );

    $wp_customize->add_setting( 'wedev_popup_desc',
        array(
        'default'           => $anecdote_lite_default['wedev_popup_desc'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control( 'wedev_popup_desc',
        array(
        'label'    => esc_html__( 'Popup Model Box Description', 'anecdote-lite' ),
        'section'  => 'subscribe_section',
        'type'     => 'text',
        )
    );

    $wp_customize->add_setting( 'wedev_form_shortcode',
        array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control( 'wedev_form_shortcode',
        array(
        'label'    => esc_html__( 'Shortcode', 'anecdote-lite' ),
        'section'  => 'subscribe_section',
        'type'     => 'textarea',
        )
    );

}else{

    $wp_customize->add_setting(
        'anecdote_lite_mcfwp_plugin',
        array(
            'default'           => '',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'sanitize_text_field'
        )
    );
    $wp_customize->add_control(
        new Anecdote_Lite_Plugin_Link( 
            $wp_customize,
            'anecdote_lite_mcfwp_plugin',
            array(
                'label'      => esc_html__( 'Please install and activate "MC4WP: Mailchimp for WordPress" in order to use this feature.', 'anecdote-lite' ),
                'settings' => 'anecdote_lite_mcfwp_plugin',
                'section'       => 'subscribe_section',
            )
        )
    );

}