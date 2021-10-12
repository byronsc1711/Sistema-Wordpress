<?php
/*
 * One Page Business functions
 * Since Version 1.0
 */
 
if ( ! function_exists( 'one_page_business_get_settings' ) ) :

function one_page_business_get_settings($param){
	$values = array (
					 'breadcrumb_show'	=> true, 
					 'primary_color'	=> '#ce0b0b',
					 'link_color'		=> '#063d62',
					 'main_text_color'	=> '#1a1a1a',
					 'header_layout'	=> 0,
					 'box_layout_mode'	=> 0,
					 'page_background_color'		=> '#ffffff',
					 'woocommerce_menubar_color'	=> '#ce120c',
					 'woocommerce_menubar_text_color'	=> '#ffffff',
					 'header_text_color'				=> '#54595f',
					 'header_text_hover_color'			=> '#dd3333',
					 'header_bg_color'				=> '#ffffff',
					 'header_contact_bg_color'		=> 'rgba(255,255,255,0)',
					 'header_contact_text_color'	=> '#54595f',
					 'heading_font'					=> 'Oswald',
					 'body_font'					=> 'Lora',
					 'footer_border'				=> 0,
					 'footer_text_color'			=> '#fff',
					 'footer_bg_color'				=> '#730404',
					 'footer_secondary_color'		=> '#007ac4'					 					 
					 );
					 
	return $values[$param];
}

endif;
 
 
if ( ! function_exists( 'one_page_business_setup' ) ) :

	function one_page_business_setup() {

		load_theme_textdomain( 'one-page-business' );

		add_theme_support( 'automatic-feed-links' );

		add_theme_support( 'title-tag' );

		add_theme_support(
			'custom-logo',
			array(
				'height'      => 240,
				'width'       => 240,
				'flex-height' => true,
			)
		);

		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 1200, 9999 );
		
		$header_args = array(
			'width'           => 2600,
			'flex-width'    => true,
			'uploads'         => true,
			'random-default'  => true,	
			'header-text'     => false,
			
		);
				
		add_theme_support( 'custom-header', $header_args );	
	
		// This theme uses wp_nav_menu() in two locations.
		register_nav_menus(
			array(
				'primary' => __( 'Primary Menu', 'one-page-business' ),
				'social'  => __( 'Social Links Menu', 'one-page-business' ),
			)
		);
		
		$backbround_args = array(
			'default-color'          => '#ffffff',
			'default-image'          => '',
			'default-repeat'         => '',
			'default-position-x'     => '',
			'default-attachment'     => '',
			'wp-head-callback'       => '_custom_background_cb',
			'admin-head-callback'    => '',
			'admin-preview-callback' => ''
		);
		
		add_theme_support( 'custom-background', $backbround_args );		


		/*
		 * Enable support for Post Formats.		
		 */
		add_theme_support(
			'post-formats',
			array(
				'aside',
				'image',
				'video',
				'quote',
				'link',
				'gallery',
				'status',
				'audio',
				'chat',
			)
		);

		// Add support for responsive embeds.
		add_theme_support( 'responsive-embeds' );


		// Indicate widget sidebars can use selective refresh in the Customizer.
		add_theme_support( 'customize-selective-refresh-widgets' );
		
		// Define and register starter content to showcase the theme on new sites.
		$starter_content = array(
			'widgets'     => array(
				// Place three core-defined widgets in the sidebar area.
				'sidebar-1' => array(
					'search',
					'categories',
					'archives',
				),
		
				// Add business info widget to the footer 1 area.
				'footer-sidebar-1' => array(
					'text_about',
				),
		
				// Put widgets in the footer 2 area.
				'footer-sidebar-2' => array(
					'recent-posts',				
				),
				// Putwidgets in the footer 3 area.
				'footer-sidebar-3' => array(
					'categories',				
				),
				// Put widgets in the footer 4 area.
				'footer-sidebar-4' => array(				
					'search',				
				),
												
			),
			
			'nav_menus' => array(
					'primary' => array(
						'name' => __( 'Top Menu', 'one-page-business' ),
						'items' => array(
							'link_home',
							),
					),
					'social' => array(
						'name' => __( 'Social Links Menu', 'one-page-business' ),
						'items' => array(
							'link_yelp',
							'link_facebook',
							'link_twitter',
							'link_instagram',
							'link_email',
						),
					),
				),	
		);



	 
	add_theme_support( 'starter-content', $starter_content );
		
		
	}
	
endif; // one_page_business_setup
add_action( 'after_setup_theme', 'one_page_business_setup' );

/* global variables */
$one_page_business_slider_id = 0;
$one_page_business_id = 99 ;

add_action( 'after_setup_theme', 'one_page_business_default_header' );
/**
 * Add Default Custom Header Image To
 * @return void
 */
function one_page_business_default_header() {

    add_theme_support(
        'custom-header',
        apply_filters(
            'one_page_business_custom_header_args',
            array(
                'default-text-color' => '#ffffff',
				'width'              => 1300,
				'height'             => 800,
				'flex-width'         => true,
				'flex-height'        => true,
                'default-image' =>  get_theme_file_uri ('/images/header.jpg'),								
            )
        )
    );
}


/**
 *
 * @global int $content_width
 *
 *
 */
function one_page_business_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'one_page_business_content_width', 840 );
}
add_action( 'after_setup_theme', 'one_page_business_content_width', 0 );

/**
 * Add preconnect for Google Fonts.
 *
 * @param array  $urls           URLs to print for resource hints.
 * @param string $relation_type  The relation type the URLs are printed.
 * @return array $urls           URLs to print for resource hints.
 */
function one_page_business_resource_hints( $urls, $relation_type ) {
	if ( wp_style_is( 'one-page-business-fonts', 'queue' ) && 'preconnect' === $relation_type ) {
		$urls[] = array(
			'href' => 'https://fonts.gstatic.com',
			'crossorigin',
		);
	}

	return $urls;
}
add_filter( 'wp_resource_hints', 'one_page_business_resource_hints', 10, 2 );

/**
 * Registers a widget area.
 */
function one_page_business_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Main Sidebar', 'one-page-business' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here to appear in your sidebar.', 'one-page-business' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	
	register_sidebar(
		array(
			'name'          => esc_html__( 'WooCommerce', 'one-page-business' ),
			'id'            => 'woocommerce-sidebar-1',
			'description'   => esc_html__( 'Add widgets here to appear in WooCommerce sidebar.', 'one-page-business' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	
	
	/* Footer widget area */
	
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer 1', 'one-page-business' ),
			'id'            => 'footer-sidebar-1',
			'description'   => esc_html__( 'Add widgets here to appear in your footer.', 'one-page-business' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer 2', 'one-page-business' ),
			'id'            => 'footer-sidebar-2',
			'description'   => esc_html__( 'Add widgets here to appear in your footer.', 'one-page-business' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer 3', 'one-page-business' ),
			'id'            => 'footer-sidebar-3',
			'description'   => esc_html__( 'Add widgets here to appear in your footer.', 'one-page-business' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);	
	
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer 4', 'one-page-business' ),
			'id'            => 'footer-sidebar-4',
			'description'   => esc_html__( 'Add widgets here to appear in your footer.', 'one-page-business' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	
}
add_action( 'widgets_init', 'one_page_business_widgets_init' );

/**
 * @since 1.0.0
 * An error notice that can be displayed if the Minimum PHP version is not met.
 */
function one_page_business_php_not_met_notice() {
	?>
	<div class="notice notice-error is-dismissible" ><p><?php esc_html_e("Unable to activate the theme. One Page Business Theme requires Minimum PHP version 5.6", 'one-page-business'); ?></p></div>
	<?php
}


if ( ! function_exists( 'one_page_business_fonts_url' ) ) :
	/**
	 * @return string Google fonts URL for the theme.
	 */
	function one_page_business_fonts_url() {

		/*
		 * Translators: If there are characters in your language that are not
		 * supported by "Open Sans", sans-serif;, translate this to 'off'. Do not translate
		 * into your own language.
		 */
		$typography = _x( 'on', 'Open Sans font: on or off', 'one-page-business' ); 
	
		if ( 'off' !== $typography ) {
			$font_families = array();
			
			$font_families[] = get_theme_mod('heading_font', one_page_business_get_settings('heading_font')).':300,400,500';
			$font_families[] = get_theme_mod('body_font', one_page_business_get_settings('body_font')).':300,400,500';
			
	 
			$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
			);
			
			$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
			
			
		}
	   
		return esc_url( $fonts_url );
	
	}
endif;

/**
 * Handles JavaScript detection.
 * Adds a `js` class to the root `<html>` element when JavaScript is detected.
 */
function one_page_business_javascript_detection() {
	echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}
add_action( 'wp_head', 'one_page_business_javascript_detection', 0 );

/**
 * @since 1.0.0
 * Switches back to the previous theme if the minimum PHP version is not met.
 */
function one_page_business_test_for_min_php() {

	// Compare versions.
	if ( version_compare( PHP_VERSION, one_page_business_php_version, '<' ) ) {
		// Site doesn't meet themes min php requirements, add notice...
		add_action( 'admin_notices', 'one_page_business_php_not_met_notice' );
		// ... and switch back to previous theme.
		switch_theme( get_option( 'theme_switched' ) );
		return false;

	};
}


/**
 * Enqueues scripts and styles.
 */
function one_page_business_scripts() {
	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'one-page-business-fonts', one_page_business_fonts_url(), array(), null );
	
	wp_enqueue_style( 'bootstrap', get_theme_file_uri( '/css/bootstrap.css' ), array(), '3.3.6');

	// Add FontAwesome, used in the main stylesheet.
	wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/fonts/font-awesome/css/font-awesome.css', array(), '3.4.1' );

	// Theme stylesheet.
	wp_enqueue_style( 'one-page-business-style', get_stylesheet_uri() );

	// Load the html5 shiv.
	wp_enqueue_script( 'one-page-business-html5', get_template_directory_uri() . '/js/html5.js', array(), '3.7.3' );
	wp_script_add_data( 'one-page-business-html5', 'conditional', 'lt IE 9' );

	wp_enqueue_script( 'one-page-business-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20191010', true );

	wp_enqueue_script( 'bootstrap', get_theme_file_uri( '/js/bootstrap.js' ), array( 'jquery' ), '3.3.7', true);

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_singular() && wp_attachment_is_image() ) {
		wp_enqueue_script( 'one-page-business-keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20160816' );
	}
	
	//Pro styles and widgets
	one_page_business_styles();

	wp_enqueue_script( 'one-page-business-script', get_template_directory_uri() . '/js/navigation.js', array( 'jquery' ), '20191010', true );

	wp_localize_script(
		'one-page-business-script',
		'onePageBusinesScreenReaderText',
		array(
			'expand'   => esc_html__( 'Expand child menu', 'one-page-business' ),
			'collapse' => esc_html__( 'Collapse child menu', 'one-page-business' ),
		)
	);
}
add_action( 'wp_enqueue_scripts', 'one_page_business_scripts' );

/**
 * Enqueue styles, scripts for pro version
 */
function one_page_business_styles(){
		wp_enqueue_style( 'pro-css', get_theme_file_uri( '/pro/pro-style.css' ), array() );

}



require get_template_directory() . '/inc/breadcrumb-class.php';

/**
 * Enqueue styles for the block-based editor.
 */
function one_page_business_block_editor_styles() {
	// Add custom fonts.
	wp_enqueue_style( 'one-page-business-fonts', one_page_business_fonts_url(), array(), null );
}
add_action( 'enqueue_block_editor_assets', 'one_page_business_block_editor_styles' );


/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';




/**
 * @since 1.0.0
 * Set a constant that holds the theme's minimum supported PHP version.
 */
define( 'one_page_business_php_version', '5.6' );

/**
 * Immediately after theme switch is fired we we want to check php version and
 * revert to previously active theme if version is below our minimum.
 */
add_action( 'after_switch_theme', 'one_page_business_test_for_min_php' );




// Display fontawesome search icon in menus and toggle search form 
add_filter('wp_nav_menu_items', 'one_page_business_search_form', 10, 2);

function one_page_business_search_form($items, $args) {
if( $args->theme_location == 'primary' )
       $items .= '<li class="menu-search-popup" tabindex="0" ><a class="search_icon"><i class="fa fa-search"></i></a><div  class="spicewpsearchform" >'. get_search_form(false) .'</div></li></ul>';
       return $items;
}

/**
 * @since 1.0.0
 * Add WooCommerce product support to theme
 */

add_action( 'after_setup_theme', 'one_page_business_woocommerce_support' );
function one_page_business_woocommerce_support() {
	add_theme_support( 'woocommerce' );
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );	
}


/**
 * @since 1.0.0
 * add home link.
 */
function one_page_business_nav_wrap() {
  $wrap  = '<ul id="%1$s" class="%2$s">';
  $wrap .= '<li class="hidden-xs"><a href="'.esc_url(home_url()).'"><i class="fa fa-home"></i></a></li>';
  $wrap .= '%3$s';
  $wrap .= '</ul>';
  return $wrap;
}


/**
 *TGM Plugin activation.
*/

require get_template_directory() . '/inc/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'one_page_business_activate_recommended_plugins' );

/**
 * Register recommended plugins.
 */

function one_page_business_activate_recommended_plugins() {

	$plugins = array(
	
		array(
			'name'     => __( 'Elementor Drag & Drop Page Builder', 'one-page-business' ),
			'slug'     => 'elementor',
			'required' => false,
		),
		
		array(
			'name'      => 'Contact Form 7',
			'slug'      => 'contact-form-7',
			'required'  => false,
		),
		
		
		array(
			'name'      => esc_html__('Wishlist', 'one-page-business' ),
			'slug'      => 'yith-woocommerce-wishlist',
			'required'  => false,
		),	
		
		array(
			'name'      => esc_html__('Quick View', 'one-page-business' ),
			'slug'      => 'yith-woocommerce-quick-view',
			'required'  => false,
		),

		array(
			'name'      => esc_html__('Product Compare', 'one-page-business' ),
			'slug'      => 'yith-woocommerce-compare',
			'required'  => false,
		),		

				
	
		
		
	);

	$config = array();

	tgmpa( $plugins, $config );

}

/*
 * https://developer.wordpress.org/reference/hooks/admin_notices/
 *
 * Displays theme info / quick help 
 */

global $pagenow; 
  

if($pagenow == 'index.php' || $pagenow == 'themes.php'){
	if ( isset( $_GET['hide_admin_notice'] ) ) {
		 update_option('one_page_business_hide_admin_notice', 'dismiss-notice');
	} else {
		$one_page_business_notice = get_option('one_page_business_hide_admin_notice', '');
		if ($one_page_business_notice != 'dismiss-notice' || $one_page_business_notice == '') {	
		  add_action( 'admin_notices', 'one_page_business_admin_notice_info' );
		}
	}
}

function one_page_business_admin_notice_info() {
    $class = 'notice notice-info is-dismissible';
    $message = __( 'Customize page Header: Edit page-> Header style, More Options goto customizer -> Theme Options', 'one-page-business' );
 	$dismiss = __( 'Dismiss', 'one-page-business');
    printf( '<div class="%1$s"> <p> 
	
	<a class="tsp-btn-get-started button button-primary button-hero tsp-button-padding" href="#" data-name="" data-slug="" >'.esc_html__("Demo install and complete installation... ","one-page-business").'</a>	
	
	<strong><span>%2$s</span></strong> &nbsp;&nbsp; <em><a href="?hide_admin_notice" target="_self"  class="dismiss-notice">%3$s</a></em> </p></div>', esc_attr( $class ), esc_html( $message ), esc_html( $dismiss ) ); 
}


/*************************************
 * Add meta box to switch box shadow *
 *************************************/

function one_page_business_get_header_class(){
	$one_page_business_header_style = get_post_meta( get_the_ID(), 'header_style', true);
	if($one_page_business_header_style == 'transparent') {
		$one_page_business_header_style ='transparent-header ';
	} elseif ($one_page_business_header_style == 'box_shadow'){
		$one_page_business_header_style ='box_shadow';
	} elseif ($one_page_business_header_style == 'border'){
		$one_page_business_header_style ='border';
	} elseif ($one_page_business_header_style == 'none'){
		$one_page_business_header_style ='none';	
	} else {
		$one_page_business_header_style ='box_shadow';
	}
	return $one_page_business_header_style;
}

/* Define the custom box */
add_action( 'add_meta_boxes', 'one_page_business_add_custom_box' );

/* Do something with the data entered */
add_action( 'save_post', 'one_page_business_save_postdata' );

/* Adds a box to the main column on the Post and Page edit screens */
function one_page_business_add_custom_box() {
    add_meta_box( 
        'one_page_business_sectionid',
        'Page Header Styles',
        'one_page_business_inner_custom_box',
        array('post','page'),
        'side',
        'high'
    );
}

/* Prints the box content */
function one_page_business_inner_custom_box($post)
{
    // Use nonce for verification
    wp_nonce_field( 'one_page_business_nounce_header_style', 'one_page_business_headerstyle' );

    // Get saved value, if none exists, "default" is selected
    $saved = get_post_meta( $post->ID, 'header_style', true);
    if( !$saved )
        $saved = 'box_shadow';

    $fields = array(
        'box_shadow'       => __('Header Box Shadow', 'one-page-business'),
		'border'     => __('Header Border', 'one-page-business'),
		'transparent'     => __('Transparent Sticky Header', 'one-page-business'),
		'none'     => __('None', 'one-page-business'),
    );
	
	echo '<p class="post-attributes-label-wrapper"><label class="post-attributes-label">'.esc_html__("Select Header Style", "one-page-business").'</label></p>';

    foreach($fields as $key => $label)
    {
        printf(
            '<input type="radio" name="header_style" value="%1$s" id="header_style[%1$s]" %3$s />'.
            '<label for="header_style[%1$s]"> %2$s ' .
            '</label><br>',
            esc_attr($key),
            esc_html($label),
            checked($saved, $key, false)
        );
    }
	
	echo '<p><i>'.esc_html__('Use full width template if you select transparent sticky header style', 'one-page-business').'</i></p>';
}

/* When the post is saved, saves our custom data */
function one_page_business_save_postdata( $post_id ) 
{
     // verify if this is an auto save routine. 
     // If it is our form has not been submitted, so we dont want to do anything
     if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
	 if (!isset($_POST['one_page_business_headerstyle'])) return; 	  
	 if (!isset($_POST['header_style'])) return;
	 
	 $header_style = sanitize_text_field(wp_unslash($_POST['header_style']));
	 $pro_header_style = sanitize_text_field(wp_unslash($_POST['one_page_business_headerstyle']));

	  
      // verify this came from the our screen and with proper authorization,
      // because save_post can be triggered at other times
      if (!wp_verify_nonce( $pro_header_style, 'one_page_business_nounce_header_style' ) )
          return;
		  
      if ( $header_style != "" ){
            update_post_meta( $post_id, 'header_style', $header_style );
      } 
}





/**********************
 *   Demo Installer
 *   @package Avril
 *   @subpackage wpbusinessthemes
 **********************/
 
function one_page_business_admin_enqueue_scripts(){	
	wp_enqueue_script( 'tsp-admin-script', get_template_directory_uri() . '/js/admin.js', array( 'jquery' ), '', true );
    wp_localize_script( 'tsp-admin-script', 'tsp_ajax_object',
        array( 'ajax_url' => admin_url( 'admin-ajax.php' ) )
    );
}
add_action( 'admin_enqueue_scripts', 'one_page_business_admin_enqueue_scripts' );

add_action( 'wp_ajax_install_act_plugin', 'one_page_business_admin_install_plugin' );

function one_page_business_admin_install_plugin() {
    /**
     * Install Plugin.
     */
    include_once ABSPATH . '/wp-admin/includes/file.php';
    include_once ABSPATH . '/wp-admin/includes/class-wp-upgrader.php';
    include_once ABSPATH . '/wp-admin/includes/plugin-install.php';

    if ( ! file_exists( WP_PLUGIN_DIR . '/web-theme-space-demos' ) ) {
        $api = plugins_api( 'plugin_information', array(
            'slug'   => sanitize_key( wp_unslash( 'tsp-demos' ) ),
            'fields' => array(
                'sections' => false,
            ),
        ) );

        $skin     = new WP_Ajax_Upgrader_Skin();
        $upgrader = new Plugin_Upgrader( $skin );
        $result   = $upgrader->install( $api->download_link );
    }
	
    if ( ! file_exists( WP_PLUGIN_DIR . '/advanced-import' ) ) {
        $api = plugins_api( 'plugin_information', array(
            'slug'   => sanitize_key( wp_unslash( 'advanced-import' ) ),
            'fields' => array(
                'sections' => false,
            ),
        ) );

        $skin     = new WP_Ajax_Upgrader_Skin();
        $upgrader = new Plugin_Upgrader( $skin );
        $result   = $upgrader->install( $api->download_link );
    }	

    // Activate plugin.
    if ( current_user_can( 'activate_plugin' ) ) {
	
        $result = activate_plugin( 'web-theme-space-demos/web-theme-space-demos.php' );		
        $result = activate_plugin( 'advanced-import/advanced-import.php' );
		
    }
}

