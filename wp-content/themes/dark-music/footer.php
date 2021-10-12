<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Theme Palace
 * @subpackage Dark Music
 * @since Dark Music 1.0.0
 */

/**
 * dark_music_content_end_action hook
 *
 * @hooked dark_music_add_subscription_section -  5
 * @hooked dark_music_content_end -  10
 *
 */
do_action( 'dark_music_content_end_action' );

/**
 * dark_music_content_end_action hook
 *
 * @hooked dark_music_footer_start -  10
 * @hooked dark_music_Footer_Widgets->add_footer_widgets -  20
 * @hooked dark_music_footer_site_info -  40
 * @hooked dark_music_footer_end -  100
 *
 */
do_action( 'dark_music_footer' );

/**
 * dark_music_page_end_action hook
 *
 * @hooked dark_music_page_end -  10
 *
 */
do_action( 'dark_music_page_end_action' ); 

?>

<?php wp_footer(); ?>

</body>
</html>
