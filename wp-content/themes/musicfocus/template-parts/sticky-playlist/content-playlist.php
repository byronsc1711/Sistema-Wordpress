<?php
/**
 * The template used for displaying playlist
 *
 * @package Photofocus
 */
?>

<?php
$enable_section = get_theme_mod( 'photofocus_sticky_playlist_visibility', 'disabled' );

if ( ! photofocus_check_section( $enable_section ) ) {
	// Bail if playlist is not enabled
	return;
}

get_template_part( 'template-parts/sticky-playlist/post-type', 'playlist' );
