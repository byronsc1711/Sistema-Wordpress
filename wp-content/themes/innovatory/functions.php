<?php
/**
 * Enqueue styles.
 */
function innovatory_enqueue_styles() {
	// bootstrap css.
	wp_register_style( 'innovatory-bootstrap', get_template_directory_uri() . '/css/bootstrap.css', '', '4.3.1' );
	// font awesome css.
	wp_register_style( 'innovatory-font-awesome', get_template_directory_uri() . '/css/font-awesome.css', '', '4.7.0' );
	// google fonts.
	wp_register_style( 'innovatory-lato-font', 'https://fonts.googleapis.com/css?family=Lato' );
	wp_register_style( 'innovatory-montserrat-font', 'https://fonts.googleapis.com/css?family=Montserrat:400,600i,700' );
	$dependencies = array( 'innovatory-bootstrap', 'innovatory-font-awesome', 'innovatory-lato-font', 'innovatory-montserrat-font' );
	wp_enqueue_style( 'innovatory-style', get_stylesheet_uri(), $dependencies ); 
}
/**
 * Enqueue scripts.
 */
function innovatory_enqueue_scripts() {
	$dependencies = array( 'jquery' );
	wp_enqueue_script( 'innovatory-bootstrap', get_template_directory_uri() . '/js/bootstrap.js', $dependencies, '4.3.1', true );
	wp_enqueue_script( 'innovatory-scroll-script', get_template_directory_uri() . '/js/scroll-down.js', 'scroll-down', '1.0', true );
	wp_enqueue_script( 'innovatory-nav-dropdown', get_template_directory_uri() . '/js/navigation.js', 'drop-down', '1.0', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
// add bootstrap framework.
add_action( 'wp_enqueue_scripts', 'innovatory_enqueue_styles' );
add_action( 'wp_enqueue_scripts', 'innovatory_enqueue_scripts' );

/*
*	set content width
*/
function innovatory_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'innovatory_content_width', 1140 );
}
add_action( 'after_setup_theme', 'innovatory_content_width', 0 );

// Fallback function for wp_body_open

if( ! function_exists( 'wp_body_open' ) ) {
	function wp_body_open() {
		do_action( 'wp_body_open' );
	}
}

/**
 * Implement the Custom Header feature.
 *
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Setup innovatory theme.
 */
function innovatory_wp_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 */
	load_theme_textdomain( 'innovatory', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );
	
	/* Let WordPress manage the document title. */
	add_theme_support( 'title-tag' );
	
	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );
	
	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( 
		array(
			'top'    => esc_html__( 'Top Menu', 'innovatory' ),
			'footer' => esc_html__( 'Footer Menu', 'innovatory' ),
		) 
	);
	
	/*
	 * Enable support for custom logo.
	 */
	add_theme_support( 'custom-logo', array(
		'height'      => 64,
		'width'       => 64,
		'flex-height' => true,
	) );
	
	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );
	
	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	 */
	add_editor_style( array( 'css/editor-style.css' ) );
}
//setup the theme
add_action( 'after_setup_theme', 'innovatory_wp_setup' );

/*
*	Widget
*/
function innovatory_widgets_init() {
	register_sidebar( 
		array(
			'name'          => esc_html__( 'Blog Sidebar', 'innovatory' ),
			'id'            => 'blog-sidebar',
			'description'   => esc_html__( 'Add widgets here to appear in your sidebar.', 'innovatory' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		) 
	);
}
add_action( 'widgets_init', 'innovatory_widgets_init' );

/**
 * Fix skip link focus in IE11.
 *
 * This does not enqueue the script because it is tiny and only for IE11,
 * thus it does not warrant having an entire dedicated blocking script being loaded.
 *
 * @link https://git.io/vWdr2
 */
function innovatory_skip_link_focus() {
	// The following is minified via `terser --compress --mangle -- js/skip-link-focus.js`.
	?>
	<script>
	/(trident|msie)/i.test(navigator.userAgent)&&document.getElementById&&window.addEventListener&&window.addEventListener("hashchange",function(){var t,e=location.hash.substring(1);/^[A-z0-9_-]+$/.test(e)&&(t=document.getElementById(e))&&(/^(?:a|select|input|button|textarea)$/i.test(t.tagName)||(t.tabIndex=-1),t.focus())},!1);
	</script>
	<?php
}
add_action( 'wp_print_footer_scripts', 'innovatory_skip_link_focus' );
/**
 * Filter the except length to 20 words.
 *
 * @param int $length Excerpt length.
 * @return int (Maybe) modified excerpt length.
 */
function innovatory_custom_excerpt_length( $length ) {
    return 15;
}
add_filter( 'excerpt_length', 'innovatory_custom_excerpt_length', 10, 1 );