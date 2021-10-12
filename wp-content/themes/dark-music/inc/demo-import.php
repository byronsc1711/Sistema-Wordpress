<?php
/**
 * Demo Import.
 *
 * This is the template that includes all the other files for core featured of Theme Palace
 *
 * @package Theme Palace
 * @subpackage dark_music
 * @since dark_music 1.0.0
 */

function dark_music_ctdi_plugin_page_setup( $default_settings ) {
    $default_settings['menu_title']  = esc_html__( 'Theme Palace Demo Import' , 'dark-music' );

    return $default_settings;
}
add_filter( 'cp-ctdi/plugin_page_setup', 'dark_music_ctdi_plugin_page_setup' );


function dark_music_ctdi_plugin_intro_text( $default_text ) {
    $default_text .= sprintf( '<p class="about-description">%1$s <a href="%2$s">%3$s</a></p>', esc_html__( 'Demo content files for dark_music Theme.', 'dark-music' ),
    esc_url( 'https://themepalace.com/download/dark-music' ), esc_html__( 'Click here for Demo File download', 'dark-music' ) );
    return $default_text;
}
add_filter( 'cp-ctdi/plugin_intro_text', 'dark_music_ctdi_plugin_intro_text' );