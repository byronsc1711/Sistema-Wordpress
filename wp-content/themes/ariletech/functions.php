<?php
/**
 * Theme functions and definitions
 *
 * @package Ariletech
 */

/**
 * After setup theme hook
 */
function ariletech_theme_setup(){
    /*
     * Make child theme available for translation.
     * Translations can be filed in the /languages/ directory.
     */
    load_child_theme_textdomain( 'ariletech', get_stylesheet_directory() . '/languages' );	
	require get_stylesheet_directory() . '/inc/customizer/ariletech-customizer-options.php';	
}
add_action( 'after_setup_theme', 'ariletech_theme_setup' );

/**
 * Load assets.
 */

function ariletech_theme_css() {
	wp_enqueue_style( 'ariletech-parent-style', get_template_directory_uri() . '/style.css' );
	wp_enqueue_style('ariletech-child-style', get_stylesheet_directory_uri() . '/style.css');
	wp_enqueue_style('ariletech-default-css', get_stylesheet_directory_uri() . "/assets/css/theme-default.css" );
    wp_enqueue_style('ariletech-bootstrap-smartmenus-css', get_stylesheet_directory_uri() . "/assets/css/bootstrap-smartmenus.css" ); 	
}
add_action( 'wp_enqueue_scripts', 'ariletech_theme_css', 99);

/**
 * Import Options From Parent Theme
 *
 */
function ariletech_parent_theme_options() {
	$arilewp_mods = get_option( 'theme_mods_arilewp' );
	if ( ! empty( $arilewp_mods ) ) {
		foreach ( $arilewp_mods as $arilewp_mod_k => $arilewp_mod_v ) {
			set_theme_mod( $arilewp_mod_k, $arilewp_mod_v );
		}
	}
}
add_action( 'after_switch_theme', 'ariletech_parent_theme_options' );

/**
 * Remove Parent Theme Setting
 *
 */
function ariletech_remove_parent_setting( $wp_customize ) {
	$wp_customize->remove_setting('arilewp_testomonial_background_image');
	$wp_customize->remove_setting('arilewp_testimonial_overlay_disable');
}
add_action( 'customize_register', 'ariletech_remove_parent_setting',99 );


/**
 * Fresh site activate
 *
 */
$fresh_site_activate = get_option( 'fresh_ariletech_site_activate' );
if ( (bool) $fresh_site_activate === false ) {
	set_theme_mod( 'arilewp_page_header_background_color', 'rgba(0,0,0,0.6)' );
	set_theme_mod( 'arilewp_testimonial_overlay_disable', false );
	set_theme_mod( 'arilewp_theme_color', 'theme-blue-strong' );
	set_theme_mod( 'arilewp_testimonial_layout', 'arilewp_testimonial_layout2' );
	set_theme_mod( 'arilewp_slider_caption_layout', 'arilewp_slider_captoin_layout2' );
	set_theme_mod( 'arilewp_theme_info_layout', 'arilewp_theme_info_layout2' );
	set_theme_mod( 'arilewp_main_header_style', 'transparent' );
	set_theme_mod( 'arilewp_footer_container_size', 'container' );
	set_theme_mod( 'arilewp_blog_front_container_size', 'container' );
	set_theme_mod( 'arilewp_blog_column_layout', '3' );

	update_option( 'fresh_ariletech_site_activate', true );
}

/**
 * Page header
 *
 */
function ariletech_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'ariletech_custom_header_args', array(
		'default-image'      => get_stylesheet_directory_uri().'/assets/img/ariletech-page-header.jpg',
		'default-text-color' => 'fff',
		'width'              => 1920,
		'height'             => 500,
		'flex-height'        => true,
		'flex-width'         => true,
		'wp-head-callback'   => 'ariletech_header_style',
	) ) );
}

add_action( 'after_setup_theme', 'ariletech_custom_header_setup' );

/**
 * Custom background
 *
 */
function ariletech_custom_background_setup() {
	add_theme_support( 'custom-background', apply_filters( 'ariletech_custom_background_args', array(
		'default-color' => 'fff',
		'default-image' => '',
	) ) );
}
add_action( 'after_setup_theme', 'ariletech_custom_background_setup' );


if ( ! function_exists( 'ariletech_header_style' ) ) :
	/**
	 * Styles the header image and text displayed on the blog.
	 *
	 * @see ariletech_custom_header_setup().
	 */
	function ariletech_header_style() {
		$header_text_color = get_header_textcolor();

		/*
		 * If no custom options for text are set, let's bail.
		 * get_header_textcolor() options: Any hex value, 'blank' to hide text. Default: add_theme_support( 'custom-header' ).
		 */
		if ( get_theme_support( 'custom-header', 'default-text-color' ) === $header_text_color ) {
			return;
		}

		// If we get this far, we have custom styles. Let's do this.
		?>
		<style type="text/css">
			<?php
			// Has the text been hidden?
			if ( ! display_header_text() ) :
				?>
			.site-title,
			.site-description {
				position: absolute;
				clip: rect(1px, 1px, 1px, 1px);
			}

			<?php
			// If the user has set a custom color for the text use that.
			else :
				?>
			.site-title a,
			.site-description {
				color: #<?php echo esc_attr( $header_text_color ); ?> !important;
			}

			<?php endif; ?>
		</style>
		<?php
	}
endif;

/**
 * Theme Page Header Breadcrumb
*/
if( !function_exists('ariletech_page_header_breadcrumbs') ):
	function ariletech_page_header_breadcrumbs() { 	
		global $post;
		$home_Link = home_url();
	    echo '<ul class="page-breadcrumb text-right">';			
				if (is_home() || is_front_page()) :
					echo '<li><a href="'.esc_url($home_Link).'">'.esc_html__('Home','ariletech').'</a></li>';
					    echo '<li class="active">'; echo single_post_title(); echo '</li>';
						else:
						echo '<li><a href="'.esc_url($home_Link).'">'.esc_html__('Home','ariletech').'</a></li>';
						if ( is_category() ) {
							echo '<li class="active"><a href="'. arilewp_curPageURL() .'">' . esc_html__('Archive by category','ariletech').' "' . single_cat_title('', false) . '"</a></li>';
						} elseif ( is_day() ) {
							echo '<li class="active"><a href="'. esc_url(get_year_link(esc_attr(get_the_time('Y')))) . '">'. esc_html(get_the_time('Y')) .'</a>';
							echo '<li class="active"><a href="'. esc_url(get_month_link(esc_attr(get_the_time('Y')),esc_attr(get_the_time('m')))) .'">'. esc_html(get_the_time('F')) .'</a>';
							echo '<li class="active"><a href="'. arilewp_curPageURL() .'">'. esc_html(get_the_time('d')) .'</a></li>';
						} elseif ( is_month() ) {
							echo '<li class="active"><a href="' . get_year_link(esc_attr(get_the_time('Y'))) . '">' . esc_html(get_the_time('Y')) . '</a>';
							echo '<li class="active"><a href="'. arilewp_curPageURL() .'">'. esc_html(get_the_time('F')) .'</a></li>';
						} elseif ( is_year() ) {
							echo '<li class="active"><a href="'. arilewp_curPageURL() .'">'. esc_html(get_the_time('Y')) .'</a></li>';
                        } elseif ( is_single() && !is_attachment() && is_page('single-product') ) {
						if ( get_post_type() != 'post' ) {
							$cat = get_the_category(); 
							$cat = $cat[0];
							echo '<li>';
								echo get_category_parents($cat, TRUE, '');
							echo '</li>';
							echo '<li class="active"><a href="' . arilewp_curPageURL() . '">'. get_the_title() .'</a></li>';
						} }  
						elseif ( is_page() && $post->post_parent ) {
							$parent_id  = $post->post_parent;
							$breadcrumbs = array();
							while ($parent_id) {
							$page = get_page($parent_id);
							$breadcrumbs[] = '<li class="active"><a href="' . esc_url(get_permalink($page->ID)) . '">' . get_the_title($page->ID) . '</a>';
							$parent_id  = $page->post_parent;
                            }
							$breadcrumbs = array_reverse($breadcrumbs);
							foreach ($breadcrumbs as $crumb) echo $crumb;
							echo '<li class="active"><a href="' . arilewp_curPageURL() . '">'. get_the_title().'</a></li>';
                        }
						elseif( is_search() )
						{
							echo '<li class="active"><a href="' . arilewp_curPageURL() . '">'. get_search_query() .'</a></li>';
						}
						elseif( is_404() )
						{
							echo '<li class="active"><a href="' . arilewp_curPageURL() . '">'.esc_html__('Error 404','ariletech').'</a></li>';
						}
						else { 
						    echo '<li class="active"><a href="' . arilewp_curPageURL() . '">'. get_the_title() .'</a></li>';
						}
					endif;
			echo '</ul>';
        }
endif;

/**
 * Theme Page Header Title
*/
function ariletech_theme_page_header_title(){
	if( is_archive() )
	{
		echo '<div class="page-header-title"><h1 class="text-white">';
		if ( is_day() ) :
		/* translators: %1$s %2$s: day */
		  printf( esc_html__( '%1$s %2$s', 'ariletech' ), esc_html__('Archives','ariletech'), get_the_date() );  
        elseif ( is_month() ) :
		/* translators: %1$s %2$s: month */
		  printf( esc_html__( '%1$s %2$s', 'ariletech' ), esc_html__('Archives','ariletech'), get_the_date( 'F Y' ) );
        elseif ( is_year() ) :
		/* translators: %1$s %2$s: year */
		  printf( esc_html__( '%1$s %2$s', 'ariletech' ), esc_html__('Archives','ariletech'), get_the_date( 'Y' ) );
		elseif( is_author() ):
		/* translators: %1$s %2$s: author */
			printf( esc_html__( '%1$s %2$s', 'ariletech' ), esc_html__('All posts by','ariletech'), get_the_author() );
        elseif( is_category() ):
		/* translators: %1$s %2$s: category */
			printf( esc_html__( '%1$s %2$s', 'ariletech' ), esc_html__('Category','ariletech'), single_cat_title( '', false ) );
		elseif( is_tag() ):
		/* translators: %1$s %2$s: tag */
			printf( esc_html__( '%1$s %2$s', 'ariletech' ), esc_html__('Tag','ariletech'), single_tag_title( '', false ) );
		elseif( class_exists( 'WooCommerce' ) && is_shop() ):
		/* translators: %1$s %2$s: WooCommerce */
			printf( esc_html__( '%1$s %2$s', 'ariletech' ), esc_html__('Shop','ariletech'), single_tag_title( '', false ));
        elseif( is_archive() ): 
		the_archive_title( '<h1 class="text-white">', '</h1>' ); 
		endif;
		echo '</h1></div>';
	}
	elseif( is_404() )
	{
		echo '<div class="page-header-title"><h1 class="text-white">';
		/* translators: %1$s: 404 */
		printf( esc_html__('404','ariletech') );
		echo '</h1></div>';
	}
	elseif( is_search() )
	{
		echo '<div class="page-header-title"><h1 class="text-white">';
		/* translators: %1$s %2$s: search */
		printf( esc_html__( '%1$s %2$s', 'ariletech' ), esc_html__('Search results for','ariletech'), get_search_query() );
		echo '</h1></div>';
	}
	else
	{
		echo '<div class="page-header-title"><h1 class="text-white">'.esc_html( get_the_title() ).'</h1></div>';
	}
}