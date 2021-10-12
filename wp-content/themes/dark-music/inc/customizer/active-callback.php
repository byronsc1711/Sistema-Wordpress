<?php
/**
 * Customizer active callbacks
 *
 * @package Theme Palace
 * @subpackage Dark Music
 * @since Dark Music 1.0.0
 */

if ( ! function_exists( 'dark_music_is_breadcrumb_enable' ) ) :
	/**
	 * Check if breadcrumb is enabled.
	 *
	 * @since Dark Music 1.0.0
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function dark_music_is_breadcrumb_enable( $control ) {
		return $control->manager->get_setting( 'dark_music_theme_options[breadcrumb_enable]' )->value();
	}
endif;

if ( ! function_exists( 'dark_music_is_pagination_enable' ) ) :
	/**
	 * Check if pagination is enabled.
	 *
	 * @since Dark Music 1.0.0
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function dark_music_is_pagination_enable( $control ) {
		return $control->manager->get_setting( 'dark_music_theme_options[pagination_enable]' )->value();
	}
endif;

/**
 * Front Page Active Callbacks
 */

/**
 * Check if slider section is enabled.
 *
 * @since Dark Music 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function dark_music_is_slider_section_enable( $control ) {
	return ( $control->manager->get_setting( 'dark_music_theme_options[slider_section_enable]' )->value() );
}


/**
 * Check if playlist section is enabled.
 *
 * @since Dark Music 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function dark_music_is_playlist_section_enable( $control ) {
	return ( $control->manager->get_setting( 'dark_music_theme_options[playlist_section_enable]' )->value() );
}


/**
 * Check if about section is enabled.
 *
 * @since Dark Music 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function dark_music_is_about_section_enable( $control ) {
	return ( $control->manager->get_setting( 'dark_music_theme_options[about_section_enable]' )->value() );
}


/**
 * Check if cta section is enabled.
 *
 * @since Dark Music 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function dark_music_is_cta_section_enable( $control ) {
	return ( $control->manager->get_setting( 'dark_music_theme_options[cta_section_enable]' )->value() );
}

/**
 * Check if event section is enabled.
 *
 * @since Dark Music 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function dark_music_is_event_section_enable( $control ) {
	return ( $control->manager->get_setting( 'dark_music_theme_options[event_section_enable]' )->value() );
}


/**
 * Check if testimonial section is enabled.
 *
 * @since Dark Music 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function dark_music_is_testimonial_section_enable( $control ) {
	return ( $control->manager->get_setting( 'dark_music_theme_options[testimonial_section_enable]' )->value() );
}

/**
 * Check if client section is enabled.
 *
 * @since Dark Music 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function dark_music_is_client_section_enable( $control ) {
	return ( $control->manager->get_setting( 'dark_music_theme_options[client_section_enable]' )->value() );
}



/**
 * Check if blog section is enabled.
 *
 * @since Dark Music 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function dark_music_is_blog_section_enable( $control ) {
	return ( $control->manager->get_setting( 'dark_music_theme_options[blog_section_enable]' )->value() );
}

/**
 * Check if blog section content type is post.
 *
 * @since Dark Music 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function dark_music_is_blog_section_content_post_enable( $control ) {
	$content_type = $control->manager->get_setting( 'dark_music_theme_options[blog_content_type]' )->value();
	return dark_music_is_blog_section_enable( $control ) && ( 'post' == $content_type );
}

/**
 * Check if blog section content type is category.
 *
 * @since Dark Music 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function dark_music_is_blog_section_content_category_enable( $control ) {
	$content_type = $control->manager->get_setting( 'dark_music_theme_options[blog_content_type]' )->value();
	return dark_music_is_blog_section_enable( $control ) && ( 'category' == $content_type );
}

