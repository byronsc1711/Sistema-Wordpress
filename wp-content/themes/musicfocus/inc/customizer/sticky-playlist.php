<?php
/**
 * Playlist Options
 *
 * @package Photofocus
 */

/**
 * Change default options settings in customizer for child theme.
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function weddingfocus_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'photofocus_header_media_text_alignment' )->default    = 'text-align-left';
}
add_action( 'customize_register', 'weddingfocus_customize_register', 999 );

/**
 * Add sticky_playlist options to theme options
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function musicfocus_sticky_playlist( $wp_customize ) {
	$wp_customize->add_section( 'photofocus_sticky_playlist', array(
			'title' => esc_html__( 'Sticky Playlist', 'musicfocus' ),
			'panel' => 'photofocus_theme_options',
		)
	);

	photofocus_register_option( $wp_customize, array(
			'name'              => 'photofocus_sticky_playlist_visibility',
			'default'           => 'disabled',
			'sanitize_callback' => 'photofocus_sanitize_select',
			'choices'           => photofocus_section_visibility_options(),
			'label'             => esc_html__( 'Enable on', 'musicfocus' ),
			'section'           => 'photofocus_sticky_playlist',
			'type'              => 'select',
		)
	);

	photofocus_register_option( $wp_customize, array(
			'name'              => 'photofocus_sticky_playlist',
			'default'           => '0',
			'sanitize_callback' => 'photofocus_sanitize_post',
			'active_callback'   => 'musicfocus_is_sticky_playlist_active',
			'label'             => esc_html__( 'Page', 'musicfocus' ),
			'section'           => 'photofocus_sticky_playlist',
			'type'              => 'dropdown-pages',
		)
	);
}
add_action( 'customize_register', 'musicfocus_sticky_playlist', 12 );

/** Active Callback Functions **/
if ( ! function_exists( 'musicfocus_is_sticky_playlist_active' ) ) :
	/**
	* Return true if sticky_playlist is active
	*
	* @since 1.0
	*/
	function musicfocus_is_sticky_playlist_active( $control ) {
		$enable = $control->manager->get_setting( 'photofocus_sticky_playlist_visibility' )->value();

		return photofocus_check_section( $enable );
	}
endif;
