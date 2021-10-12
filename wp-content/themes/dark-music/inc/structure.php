<?php
/**
 * Theme Palace basic theme structure hooks
 *
 * This file contains structural hooks.
 *
 * @package Theme Palace
 * @subpackage Dark Music
 * @since Dark Music 1.0.0
 */

$options = dark_music_get_theme_options();


if ( ! function_exists( 'dark_music_doctype' ) ) :
	/**
	 * Doctype Declaration.
	 *
	 * @since Dark Music 1.0.0
	 */
	function dark_music_doctype() {
	?>
		<!DOCTYPE html>
			<html <?php language_attributes(); ?>>
	<?php
	}
endif;

add_action( 'dark_music_doctype', 'dark_music_doctype', 10 );


if ( ! function_exists( 'dark_music_head' ) ) :
	/**
	 * Header Codes
	 *
	 * @since Dark Music 1.0.0
	 *
	 */
	function dark_music_head() {
		?>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link rel="profile" href="https://gmpg.org/xfn/11">
		<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
			<link rel="pingback" href="<?php echo esc_url( get_bloginfo( 'pingback_url' ) ); ?>">
		<?php endif;
	}
endif;
add_action( 'dark_music_before_wp_head', 'dark_music_head', 10 );

if ( ! function_exists( 'dark_music_page_start' ) ) :
	/**
	 * Page starts html codes
	 *
	 * @since Dark Music 1.0.0
	 *
	 */
	function dark_music_page_start() {
		?>
		<div id="page" class="site">
			<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'dark-music' ); ?></a>

		<?php
	}
endif;
add_action( 'dark_music_page_start_action', 'dark_music_page_start', 10 );

if ( ! function_exists( 'dark_music_page_end' ) ) :
	/**
	 * Page end html codes
	 *
	 * @since Dark Music 1.0.0
	 *
	 */
	function dark_music_page_end() {
		?>
		</div><!-- #page -->
		<?php
	}
endif;
add_action( 'dark_music_page_end_action', 'dark_music_page_end', 10 );

if ( ! function_exists( 'dark_music_header_start' ) ) :
	/**
	 * Header start html codes
	 *
	 * @since Dark Music 1.0.0
	 *
	 */
	function dark_music_header_start() { ?>
		<header id="masthead" class="site-header" role="banner">
			<div class="wrapper">
		<?php
	}
endif;
add_action( 'dark_music_header_action', 'dark_music_header_start', 10 );

if ( ! function_exists( 'dark_music_site_branding' ) ) :
	/**
	 * Site branding codes
	 *
	 * @since Dark Music 1.0.0
	 *
	 */
	function dark_music_site_branding() {
		$options  = dark_music_get_theme_options();
		$header_txt_logo_extra = $options['header_txt_logo_extra'];		
		?>
			<div class="site-branding-wrapper">
				<div class="site-branding">
					<?php if ( in_array( $header_txt_logo_extra, array( 'show-all', 'logo-title', 'logo-tagline' ) )  ) { ?>
						<div class="site-logo">
							<?php the_custom_logo(); ?>
						</div>
					<?php } 
					if ( in_array( $header_txt_logo_extra, array( 'show-all', 'title-only', 'logo-title', 'show-all', 'tagline-only', 'logo-tagline' ) ) ) : ?>
						<div id="site-details">
							<?php
							if( in_array( $header_txt_logo_extra, array( 'show-all', 'title-only', 'logo-title' ) )  ) {
								if ( dark_music_is_latest_posts() ) : ?>
									<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
								<?php else : ?>
									<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
								<?php
								endif;
							} 
							if ( in_array( $header_txt_logo_extra, array( 'show-all', 'tagline-only', 'logo-tagline' ) ) ) {
								$description = get_bloginfo( 'description', 'display' );
								if ( $description || is_customize_preview() ) : ?>
									<p class="site-description"><?php echo esc_html( $description ); /* WPCS: xss ok. */ ?></p>
								<?php
								endif; 
							}?>
						</div>
					<?php endif; ?>
				</div><!-- .site-branding -->				
			</div>
		
		<?php
	}
endif;
add_action( 'dark_music_header_action', 'dark_music_site_branding', 20 );

if ( ! function_exists( 'dark_music_site_navigation' ) ) :
	/**
	 * Site navigation codes
	 *
	 * @since Dark Music 1.0.0
	 *
	 */
	function dark_music_site_navigation() { 
		$options  = dark_music_get_theme_options();
		?>
		<nav id="site-navigation" class="main-navigation" role="navigation">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
				<?php
				echo dark_music_get_svg( array( 'icon' => 'menu' ) );
				echo dark_music_get_svg( array( 'icon' => 'close' ) );
				?>					
				<span class="menu-label"><?php esc_html_e( 'Menu', 'dark-music' ); ?></span>
			</button>
			<?php  
        		$search_html = sprintf(
					'<li class="search-menu"><a href="#" title="%1$s">%2$s%3$s</a><div id="search">%4$s</div>',
					esc_attr__('Search','dark-music'),
					dark_music_get_svg( array( 'icon' => 'search' ) ), 
					dark_music_get_svg( array( 'icon' => 'close' ) ), 
					get_search_form( $echo = false )
				);
        		wp_nav_menu( array(
        			'theme_location' => 'primary',
        			'container' => 'div',
        			'menu_class' => 'menu nav-menu',
        			'menu_id' => 'primary-menu',
        			'echo' => true,
        			'fallback_cb' => 'dark_music_menu_fallback_cb',
        			'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s'.$search_html.'</ul>',
        		) );
        	?>
		</nav><!-- #site-navigation -->
		<?php
	}
endif;
add_action( 'dark_music_header_action', 'dark_music_site_navigation', 30 );

if ( ! function_exists( 'dark_music_header_end' ) ) :
	/**
	 * Header end html codes
	 *
	 * @since Dark Music 1.0.0
	 *
	 */
	function dark_music_header_end() {
		?>
			</div><!-- .wrapper -->
		</header><!-- #masthead -->
		<?php
	}
endif;

add_action( 'dark_music_header_action', 'dark_music_header_end', 50 );

if ( ! function_exists( 'dark_music_content_start' ) ) :
	/**
	 * Site content codes
	 *
	 * @since Dark Music 1.0.0
	 *
	 */
	function dark_music_content_start() {
		?>
		<div id="content" class="site-content">
		<?php
	}
endif;
add_action( 'dark_music_content_start_action', 'dark_music_content_start', 10 );

if ( ! function_exists( 'dark_music_header_image' ) ) :
	/**
	 * Header Image codes
	 *
	 * @since Dark Music 1.0.0
	 *
	 */
	function dark_music_header_image() {
		if ( dark_music_is_frontpage() )
			return;
		$header_image = get_header_image();
		?>

		<div id="page-site-header" class="relative" style="background-image: url('<?php echo esc_url( $header_image ); ?>');">
            <div class="overlay"></div>
            <div class="wrapper">
                <header class="page-header">
                    <h2 class="page-title"><?php dark_music_custom_header_banner_title(); ?></h2>
                </header>

                <?php dark_music_add_breadcrumb(); ?>
            </div><!-- .wrapper -->
        </div><!-- #page-site-header -->

	<?php
	}
endif;
add_action( 'dark_music_header_image_action', 'dark_music_header_image', 10 );

if ( ! function_exists( 'dark_music_add_breadcrumb' ) ) :
	/**
	 * Add breadcrumb.
	 *
	 * @since Dark Music 1.0.0
	 */
	function dark_music_add_breadcrumb() {
		$options = dark_music_get_theme_options();

		// Bail if Breadcrumb disabled.
		$breadcrumb = $options['breadcrumb_enable'];
		if ( false === $breadcrumb ) {
			return;
		}
		
		// Bail if Home Page.
		if ( dark_music_is_frontpage() ) {
			return;
		}

		echo '<div id="breadcrumb-list" >';
				/**
				 * dark_music_simple_breadcrumb hook
				 *
				 * @hooked dark_music_simple_breadcrumb -  10
				 *
				 */
				do_action( 'dark_music_simple_breadcrumb' );
		echo '</div><!-- #breadcrumb-list -->';
	}
endif;

if ( ! function_exists( 'dark_music_content_end' ) ) :
	/**
	 * Site content codes
	 *
	 * @since Dark Music 1.0.0
	 *
	 */
	function dark_music_content_end() {
		?>
			<div class="menu-overlay"></div>
		</div><!-- #content -->
		<?php
	}
endif;
add_action( 'dark_music_content_end_action', 'dark_music_content_end', 10 );

if ( ! function_exists( 'dark_music_footer_start' ) ) :
	/**
	 * Footer starts
	 *
	 * @since Dark Music 1.0.0
	 *
	 */
	function dark_music_footer_start() {
		?>
		<footer id="colophon" class="site-footer" role="contentinfo">
		<?php
	}
endif;
add_action( 'dark_music_footer', 'dark_music_footer_start', 10 );

if ( ! function_exists( 'dark_music_footer_site_info' ) ) :
	/**
	 * Footer starts
	 *
	 * @since Dark Music 1.0.0
	 *
	 */
	function dark_music_footer_site_info() {
		$options = dark_music_get_theme_options();
		$search = array( '[the-year]', '[site-link]' );
		$theme_data = wp_get_theme();
        $replace = array( date( 'Y' ), '<a href="'. esc_url( home_url( '/' ) ) .'">'. esc_html( get_bloginfo( 'name', 'display' ) ) . '</a>' );

        $options['copyright_text'] = str_replace( $search, $replace, $options['copyright_text'] );

		$copyright_text = $options['copyright_text']; 
		?>
		<div class="site-info col-3">
            <div class="wrapper">
                <span>
                	<?php echo dark_music_santize_allow_tag( $copyright_text ); ?>
                	<?php echo esc_html__( ' All Rights Reserved | ', 'dark-music' ) . esc_html( $theme_data->get( 'Name') ) . '&nbsp;' . esc_html__( 'by', 'dark-music' ). '&nbsp;<a target="_blank" href="'. esc_url( $theme_data->get( 'AuthorURI' ) ) .'">'. esc_html( ucwords( $theme_data->get( 'Author' ) ) ) .'</a>' ?>
            	</span>
            </div><!-- .wrapper -->    
        </div><!-- .site-info -->

		<?php
	}
endif;
add_action( 'dark_music_footer', 'dark_music_footer_site_info', 40 );

if ( ! function_exists( 'dark_music_footer_scroll_to_top' ) ) :
	/**
	 * Footer starts
	 *
	 * @since Dark Music 1.0.0
	 *
	 */
	function dark_music_footer_scroll_to_top() {
		$options  = dark_music_get_theme_options();
		if ( true === $options['scroll_top_visible'] ) : ?>
			<div class="backtotop"><?php echo dark_music_get_svg( array( 'icon' => 'up' ) ); ?></div>
		<?php endif;
	}
endif;
add_action( 'dark_music_footer', 'dark_music_footer_scroll_to_top', 40 );

if ( ! function_exists( 'dark_music_footer_end' ) ) :
	/**
	 * Footer starts
	 *
	 * @since Dark Music 1.0.0
	 *
	 */
	function dark_music_footer_end() {
		?>
		</footer>
		<div class="popup-overlay"></div>
		<?php
	}
endif;
add_action( 'dark_music_footer', 'dark_music_footer_end', 100 );

