<?php
/**
 * couture functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package couture
 */

if ( ! function_exists( 'couture_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function couture_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on couture, use a find and replace
	 * to change 'couture' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'couture', get_template_directory() . '/languages' );

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
    add_image_size( 'couture-thumbnail', 350, 410, TRUE );
    add_image_size( 'couture-featured', 1440, 600, TRUE );
    add_image_size( 'couture-single', 800, 9999 );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'couture' ),
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
	add_theme_support( 'custom-background', apply_filters( 'couture_custom_background_args', array(
		'default-color' => 'f5f5f5',
		'default-image' => '',
	) ) );

        add_theme_support( 'custom-logo' );

         // Custom Site Logo
         add_theme_support( 'site-logo', array(
        'header-text' => array(
            'site-title',
            'tagline',
        ),
        'size' => 'medium',
    ) );
}
endif;
add_action( 'after_setup_theme', 'couture_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function couture_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'couture_content_width', 640 );
}
add_action( 'after_setup_theme', 'couture_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function couture_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'couture' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'couture' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Instagram', 'couture' ),
		'id'            => 'insta-footer',
		'description'   => esc_html__( 'Add Instagram Widget here.', 'couture' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'couture_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
if ( ! function_exists( 'couture_fonts_url' ) ) :
/**
 * Register Google fonts for Couture.
 *
 * Create your own couture_fonts_url() function to override in a child theme.
 *
 * @since couture 1.0
 *
 * @return string Google fonts URL for the theme.
 */
function couture_fonts_url() {
	$fonts_url = '';
	$fonts     = array();
	$subsets   = 'latin,latin-ext';
	/* translators: If there are characters in your language that are not supported by Playfair Display, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Playfair Display font: on or off', 'couture' ) ) {
		$fonts[] = 'Oswald:400,700,900,400italic,700italic,900italic';
	}
	/* translators: If there are characters in your language that are not supported by Lato, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Montserrat font: on or off', 'couture' ) ) {
		$fonts[] = 'Lato:400,700';
	}

	if ( $fonts ) {
		$fonts_url = add_query_arg( array(
			'family' => urlencode( implode( '|', $fonts ) ),
			'subset' => urlencode( $subsets ),
		), 'https://fonts.googleapis.com/css' );
	}
	return $fonts_url;
}
endif;
function couture_scripts() {
	wp_enqueue_style( 'couture-fonts', couture_fonts_url(), array(), null );

	wp_enqueue_style( 'couture-grid', get_template_directory_uri() . '/css/grid.css' );

	wp_enqueue_style( 'couture-style', get_stylesheet_uri() );

	wp_enqueue_script( 'couture-scripts', get_template_directory_uri() . '/js/scripts.js', array('jquery','masonry'), '20152215', true );

	wp_enqueue_script( 'couture-navigation', get_template_directory_uri() . '/js/navigation.js', array('jquery'), '20151215', true );

	wp_enqueue_script( 'couture-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'couture_scripts' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
/**
 * Customizer additions.
 */

require get_template_directory() . '/inc/tgm/class-tgm-plugin-activation.php';

require get_template_directory() . '/inc/couture-kirki.php';

require get_template_directory() . '/inc/couture-include-kirki.php';

require get_template_directory() . '/inc/customizer.php';




/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';


require get_template_directory() . '/pt-pro/class-customize.php';

add_action( 'tgmpa_register', 'couture_register_required_plugins' );

function couture_register_required_plugins() {
	/*
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(


		// This is an example of how to include a plugin from the WordPress Plugin Repository.
		array(
			'name'      => 'Instagram',
			'slug'      => 'wp-instagram-widget',
			'required'  => false,
		),
		array(
			'name'      => 'kirki',
			'slug'      => 'kirki',
			'required'  => false,
		),
		array(
			'name'      => 'CMB2',
			'slug'      => 'cmb2',
			'required'  => false,
		),
	);

	/*
	 * Array of configuration settings. Amend each line as needed.
	 *
	 * TGMPA will start providing localized text strings soon. If you already have translations of our standard
	 * strings available, please help us make TGMPA even better by giving us access to these translations or by
	 * sending in a pull-request with .po file(s) with the translations.
	 *
	 * Only uncomment the strings in the config array if you want to customize the strings.
	 */
	$config = array(
		'id'           => 'couture',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.

	);

	tgmpa( $plugins, $config );
}