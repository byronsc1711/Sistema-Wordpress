<?php
/**
 * demo import
 *
 * @package shark_business
 */

/**
 * Imports predefine demos.
 * @return [type] [description]
 */
function shark_business_intro_text( $default_text ) {
    $default_text .= sprintf( '<p class="about-description">%1$s <a href="%2$s">%3$s</a></p>', esc_html__( 'Demo content files for Shark Business Theme.', 'shark-business' ),
    esc_url( 'https://drive.google.com/open?id=1qhkniH2xbPio_9tT0J9qE1S6hek_mwbs' ), esc_html__( 'Click here to download Demo Data', 'shark-business' ) );

    return $default_text;
}
add_filter( 'pt-ocdi/plugin_intro_text', 'shark_business_intro_text' );