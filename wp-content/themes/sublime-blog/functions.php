<?php
/**
 * Sublime Blog functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Sublime_Blog
 */
$theme_data = wp_get_theme();
if( ! defined( 'SUBLIME_BLOG_THEME_VERSION' ) ) define ( 'SUBLIME_BLOG_THEME_VERSION', $theme_data->get( 'Version' ) );
if( ! defined( 'SUBLIME_BLOG_THEME_NAME' ) ) define( 'SUBLIME_BLOG_THEME_NAME', $theme_data->get( 'Name' ) );
if( ! defined( 'SUBLIME_BLOG_TEXT_DOMAIN' ) ) define( 'SUBLIME_BLOG_TEXT_DOMAIN', $theme_data->get( 'TextDomain' ) );

if ( ! function_exists( 'sublime_blog_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function sublime_blog_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Sublime Blog, use a find and replace
		 * to change 'sublime-blog' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'sublime-blog', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'primary' => esc_html__( 'Primary', 'sublime-blog' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'sublime_blog_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
			'header-text' => array( 'site-title', 'site-description' )
		) );

		// Add theme support for Responsive Videos.
		add_theme_support( 'jetpack-responsive-videos' );

		add_image_size( 'sublime-blog-slider', 1140, 524, true );
		add_image_size( 'sublime-blog-featured', 720, 465, true );
		add_image_size( 'sublime-blog-schema', 600, 60 );

		/* WooCommerce Support */
		add_theme_support( 'woocommerce' );
	}
endif;
add_action( 'after_setup_theme', 'sublime_blog_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function sublime_blog_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'sublime_blog_content_width', 780 );
}
add_action( 'after_setup_theme', 'sublime_blog_content_width', 0 );

if( ! function_exists( 'sublime_blog_template_redirect_content_width' ) ) :
	/**
	* Adjust content_width value according to template.
	*/
	function sublime_blog_template_redirect_content_width(){	
		$sidebar_layout = sublime_blog_sidebar_layout();	
		if( is_singular() ){
			if( ( $sidebar_layout == 'no-sidebar' ) || ! ( is_active_sidebar( 'sidebar' ) ) ) $GLOBALS['content_width'] = 1180;
		 }elseif ( ! ( is_active_sidebar( 'sidebar' ) ) ) {
			 $GLOBALS['content_width'] = 1180;
		 }           
	}
endif;
add_action( 'template_redirect', 'sublime_blog_template_redirect_content_width' );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function sublime_blog_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'sublime-blog' ),
		'id'            => 'sidebar',
		'description'   => esc_html__( 'Add widgets here.', 'sublime-blog' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title"><span>',
		'after_title'   => '</span></h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer One', 'sublime-blog' ),
		'id'            => 'footer-one',
		'description'   => esc_html__( 'Add widgets here.', 'sublime-blog' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Two', 'sublime-blog' ),
		'id'            => 'footer-two',
		'description'   => esc_html__( 'Add widgets here.', 'sublime-blog' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Three', 'sublime-blog' ),
		'id'            => 'footer-three',
		'description'   => esc_html__( 'Add widgets here.', 'sublime-blog' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'sublime_blog_widgets_init' );

if ( ! function_exists( 'sublime_blog_fonts_url' ) ) :
	/**
	 * Create your own sublime_blog_fonts_url() function to override in a child theme.
	 *
	 * @return string Google fonts URL for the theme.
	 */
	function sublime_blog_fonts_url() {
		$fonts_url = '';
		$fonts     = array();

		/*
		 * translators: If there are characters in your language that are not supported
		 * by Poppins, translate this to 'off'. Do not translate into your own language.
		 */
		if ( 'off' !== _x( 'on', 'Poppins font: on or off', 'sublime-blog' ) ) {
			$fonts[] = 'Poppins:400,400i,500,500i,600,600i,700,700i';
		}

		/*
		 * translators: If there are characters in your language that are not supported
		 * by Leckerli One, translate this to 'off'. Do not translate into your own language.
		*/
		if ( 'off' !== _x( 'on', 'Leckerli One font: on or off', 'sublime-blog' ) ) {
			$fonts[] = 'Leckerli One';
		}

		if ( $fonts ) {
			$fonts_url = add_query_arg(
				array(
					'family'  => urlencode( implode( '|', $fonts ) ),
					'display' => urlencode( 'swap' ),
				),
				'https://fonts.googleapis.com/css'
			);
		}

		return esc_url( $fonts_url );
	}
endif;

/**
 * Enqueue scripts and styles.
 */
function sublime_blog_scripts() {

	$slider_auto       = get_theme_mod( 'slider_auto', true );
	$slider_loop       = get_theme_mod( 'slider_loop', true );
	$slider_transition = get_theme_mod( 'slider_animation' );
	$slider_speed      = get_theme_mod( 'slider_speed', '1000' );
	$slider_pause      = get_theme_mod( 'slider_timeout', '5000' );

	$theme_version = wp_get_theme()->get( 'Version' );
	// Use minified libraries if SCRIPT_DEBUG is false
	$build = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';
	
	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'sublime-blog-fonts', sublime_blog_fonts_url(), array(), null );
	wp_enqueue_style( 'animate', get_template_directory_uri(). '/css/animate' . $build . '.css', array(), '3.5.2' );
	wp_enqueue_style( 'owl-carousel', get_template_directory_uri() . '/css/owl.carousel'. $build .'.css', array(), '2.3.4' );
	wp_enqueue_style( 'sublime-blog-style', get_template_directory_uri() . '/css/main'. $build .'.css', array(), $theme_version );

	wp_enqueue_script( 'owl-carousel', get_template_directory_uri() . '/js/owl.carousel'. $build .'.js', array('jquery'), '2.3.4', true );
	wp_enqueue_script( 'owlcarousel2-a11ylayer', get_template_directory_uri() . '/js/owlcarousel2-a11ylayer'. $build .'.js', array('jquery', 'owl-carousel'), '2.0.0', true );	
	wp_enqueue_script( 'all', get_template_directory_uri() . '/js/all'. $build .'.js', array('jquery'), '5.3.1', true );
	wp_enqueue_script( 'v4-shims', get_template_directory_uri() . '/js/v4-shims'. $build .'.js', array('jquery'), '5.3.1', true );
	wp_enqueue_script( 'sublime-blog-modal-accessibility', get_template_directory_uri() . '/js/modal-accessibility'. $build .'.js', array('jquery'), $theme_version, true );
	wp_enqueue_script( 'sublime-blog-custom', get_template_directory_uri() . '/js/custom'. $build .'.js', array('jquery'), $theme_version, true );
	
    $localize_array = array(
		'auto'   => (bool) $slider_auto,
		'loop'   => (bool) $slider_loop,
		'mode'   => esc_attr( $slider_transition ),
		'speed'  => absint( $slider_speed ),
		'pause'  => absint( $slider_pause ),
		'rtl'    => is_rtl(),
	);
	
    wp_localize_script( 'sublime-blog-custom', 'sublime_blog_data', $localize_array );
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'sublime_blog_scripts' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Add Custom Meta Box
 */
require get_template_directory() . '/inc/metabox.php';

/**
 * Add Custom Meta Box
 */
require get_template_directory() . '/inc/getting-started.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Upgrade Pro
*/
require get_template_directory() . '/inc/upgrade/class-upgrade.php';