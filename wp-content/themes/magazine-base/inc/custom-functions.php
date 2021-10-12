<?php
if ( ! function_exists( 'magazine_base_the_custom_logo' ) ) :
/**
 * Displays the optional custom logo.
 *
 * Does nothing if the custom logo is not available.
 *
 * @since magazine-base 1.0.0
 */
function magazine_base_the_custom_logo() {
    if ( function_exists( 'the_custom_logo' ) ) {
        the_custom_logo();
    }
}
endif;


if ( ! function_exists( 'magazine_base_body_class' ) ) :

	/**
	 * body class.
	 *
	 * @since 1.0.0
	 */
	function magazine_base_body_class($magazine_base_body_class) {
		global $post;
		$global_layout = magazine_base_get_option( 'global_layout' );
		$input = '';
		$home_content_status =	magazine_base_get_option( 'home_page_content_status' );
		if( 1 != $home_content_status ){
			$input = 'home-content-not-enabled';
		}
		// Check if single.
		if ( $post && is_singular() ) {
			$post_options = get_post_meta( $post->ID, 'magazine-base-meta-select-layout', true );
			if ( empty( $post_options ) ) {
				$global_layout = esc_attr( magazine_base_get_option('global_layout') );
			} else{
				$global_layout = esc_attr($post_options);
			}
		}
		if ($global_layout == 'left-sidebar') {
			$magazine_base_body_class[]= 'left-sidebar ' . esc_attr( $input );
		}
		elseif ($global_layout == 'no-sidebar') {
			$magazine_base_body_class[]= 'no-sidebar ' . esc_attr( $input );
		}
		else{
			$magazine_base_body_class[]= 'right-sidebar ' . esc_attr( $input );

		}
		return $magazine_base_body_class;
	}
endif;

add_action( 'body_class', 'magazine_base_body_class' );
/**
* Returns word count of the sentences.
*
* @since magazine-base 1.0.0
*/
if ( ! function_exists( 'magazine_base_words_count' ) ) :
	function magazine_base_words_count( $length = 25, $magazine_base_content = null ) {
		$length = absint( $length );
		$source_content = preg_replace( '`\[[^\]]*\]`', '', $magazine_base_content );
		$trimmed_content = wp_trim_words( $source_content, $length, '' );
		return $trimmed_content;
	}
endif;


if ( ! function_exists( 'magazine_base_simple_breadcrumb' ) ) :

	/**
	 * Simple breadcrumb.
	 *
	 * @since 1.0.0
	 */
	function magazine_base_simple_breadcrumb() {

		if ( ! function_exists( 'breadcrumb_trail' ) ) {

			require_once get_template_directory() . '/assets/libraries/breadcrumbs/breadcrumbs.php';
		}

		$breadcrumb_args = array(
			'container'   => 'div',
			'show_browse' => false,
		);
		breadcrumb_trail( $breadcrumb_args );

	}

endif;


if ( ! function_exists( 'magazine_base_custom_posts_navigation' ) ) :
	/**
	 * Posts navigation.
	 *
	 * @since 1.0.0
	 */
	function magazine_base_custom_posts_navigation() {

		$pagination_type = magazine_base_get_option( 'pagination_type' );

		switch ( $pagination_type ) {

			case 'default':
				the_posts_navigation();
			break;

			case 'numeric':
				the_posts_pagination();
			break;

			default:
			break;
		}

	}
endif;

add_action( 'magazine_base_action_posts_navigation', 'magazine_base_custom_posts_navigation' );


if( ! function_exists( 'magazine_base_excerpt_length' ) ) :

    /**
     * Excerpt length
     *
     * @since  magazine-base 1.0.0
     *
     * @param null
     * @return int
     */
    function magazine_base_excerpt_length( $length ){
    	if ( is_admin() ) {
    	        return $length;
    	}
        $excerpt_length = magazine_base_get_option('excerpt_length_global');
        if ( empty( $excerpt_length) ) {
            $excerpt_length = $length;
        }
        return absint( $excerpt_length );

    }

endif;
add_filter( 'excerpt_length', 'magazine_base_excerpt_length', 999 );

if (magazine_base_get_option('enable_category_archive_title') == 1){
    function magazine_base_archive_title( $title ) {
        if ( is_category() ) {
            $title = single_cat_title( '', false );
        } elseif ( is_tag() ) {
            $title = single_tag_title( '', false );
        } elseif ( is_author() ) {
            $title = '<span class="vcard">' . get_the_author() . '</span>';
        } elseif ( is_post_type_archive() ) {
            $title = post_type_archive_title( '', false );
        } elseif ( is_tax() ) {
            $title = single_term_title( '', false );
        }

        return $title;
    }

    add_filter( 'get_the_archive_title', 'magazine_base_archive_title' );
}
