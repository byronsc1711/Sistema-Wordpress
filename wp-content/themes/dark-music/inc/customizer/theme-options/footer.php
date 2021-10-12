<?php
/**
 * Footer options
 *
 * @package Theme Palace
 * @subpackage Dark Music
 * @since Dark Music 1.0.0
 */

// Footer Section
$wp_customize->add_section( 'dark_music_section_footer',
	array(
		'title'      			=> esc_html__( 'Footer Options', 'dark-music' ),
		'priority'   			=> 900,
		'panel'      			=> 'dark_music_theme_options_panel',
	)
);

// footer text
$wp_customize->add_setting( 'dark_music_theme_options[copyright_text]',
	array(
		'default'       		=> $options['copyright_text'],
		'sanitize_callback'		=> 'dark_music_santize_allow_tag',
		'transport'				=> 'postMessage',
	)
);
$wp_customize->add_control( 'dark_music_theme_options[copyright_text]',
    array(
		'label'      			=> esc_html__( 'Copyright Text', 'dark-music' ),
		'section'    			=> 'dark_music_section_footer',
		'type'		 			=> 'textarea',
    )
);

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'dark_music_theme_options[copyright_text]', array(
		'selector'            => '.site-info .copyright p',
		'settings'            => 'dark_music_theme_options[copyright_text]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'corporate_press_pro_copyright_text_partial',
    ) );
}

// scroll top visible
$wp_customize->add_setting( 'dark_music_theme_options[scroll_top_visible]',
	array(
		'default'       		=> $options['scroll_top_visible'],
		'sanitize_callback' => 'dark_music_sanitize_switch_control',
	)
);
$wp_customize->add_control( new Dark_Music_Switch_Control( $wp_customize, 'dark_music_theme_options[scroll_top_visible]',
    array(
		'label'      			=> esc_html__( 'Display Scroll Top Button', 'dark-music' ),
		'section'    			=> 'dark_music_section_footer',
		'on_off_label' 		=> dark_music_switch_options(),
    )
) );