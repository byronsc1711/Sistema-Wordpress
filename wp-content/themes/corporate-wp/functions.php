<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

//OVERRIDE PARENT THEME SETTINGS
function one_page_business_get_settings($param){
	$values = array (
					 'breadcrumb_show'	=> true,
					 
					 'primary_color'	=> '#0b73ce',
					 
					 'link_color'		=> '#063d62',
					 'main_text_color'	=> '#1a1a1a',
					 'header_layout'	=> 0,
					 'box_layout_mode'	=> 0,
					 'page_background_color'		=> '#ffffff',
					 'woocommerce_menubar_color'	=> '#ce120c',
					 'woocommerce_menubar_text_color'	=> '#ffffff',
					 'header_text_color'				=> '#54595f',
					 
					 'header_text_hover_color'			=> '#0b73ce',
					 
					 'header_bg_color'				=> '#ffffff',
					 'header_contact_bg_color'		=> 'rgba(255,255,255,0)',
					 'header_contact_text_color'	=> '#54595f',
					 
					 'heading_font'					=> 'Poppins',
					 'body_font'					=> 'Lora',
					 
					 'footer_border'				=> 0,
					 'footer_text_color'			=> '#fff',
					 
					 'footer_bg_color'				=> '#030a31',
					 'footer_secondary_color'		=> '#3992c8'
					 				 					 
					 );
					 
	return $values[$param];
}


// BEGIN ENQUEUE PARENT ACTION
// AUTO GENERATED - Do not modify or remove comment markers above or below:

if ( !function_exists( 'corporate_wplocale_css' ) ):
    function corporate_wplocale_css( $uri ){
        if ( empty( $uri ) && is_rtl() && file_exists( get_template_directory() . '/rtl.css' ) )
            $uri = get_template_directory_uri() . '/rtl.css';
        return $uri;
    }
endif;
add_filter( 'locale_stylesheet_uri', 'corporate_wplocale_css' );

if ( !function_exists( 'corporate_wpparent_css' ) ):
    function corporate_wpparent_css() {
        wp_enqueue_style( 'corporate_wpparent', trailingslashit( get_template_directory_uri() ) . 'style.css', array( 'bootstrap','fontawesome' ) );
    }
endif;
add_action( 'wp_enqueue_scripts', 'corporate_wpparent_css', 10 );
         
if ( !function_exists( 'corporate_wp_configurator_css' ) ):
    function corporate_wp_configurator_css() {
        wp_enqueue_style( 'corporate_wpseparate', trailingslashit( get_stylesheet_directory_uri() ) . 'ctc-style.css', array( 'corporate_wpparent','corporate-wp-style','pro-css' ) );
    }
endif;
add_action( 'wp_enqueue_scripts', 'corporate_wp_configurator_css', 10 );

// END ENQUEUE PARENT ACTION


//CHANGE DEFAULT HEADER IMAGE
remove_action( 'after_setup_theme', 'one_page_business_default_header');

add_action( 'after_setup_theme', 'corporate_wp_default_header' );
/**
 * Add Default Custom Header Image To
 * @return void
 */
function corporate_wp_default_header() {

    add_theme_support(
        'custom-header',
        apply_filters(
            'corporate_wp_default_header',
            array(
                'default-text-color' => '#ffffff',
				'width'              => 1300,
				'height'             => 800,
				'flex-width'         => true,
				'flex-height'        => true,
                'default-image' =>  get_stylesheet_directory_uri(). '/images/header.jpg',								
            )
        )
    );
}


/* show yith wishlist, compare, quick view buttons */
function corporate_wp_business_yith(){
?>
	<div class="wishlist-compare-qw">
	<?php
	global $product;
	$corporate_wp_id = $product->get_id();
		if( class_exists('YITH_WCWL')) {
			echo do_shortcode( '[yith_wcwl_add_to_wishlist product_id="'.absint($corporate_wp_id).'"]' );
		}
		if( class_exists('YITH_WOOCOMPARE')) {	
			echo do_shortcode( '[yith_compare_button product_id=' .absint($corporate_wp_id). ']' );
		}
		if( class_exists('YITH_WCQV')) {	
			echo do_shortcode( '[yith_quick_view product_id=' .absint($corporate_wp_id). '  type="button" label="'.__("Quick View",'corporate-wp').'"]' );
		}

	?>
	</div>
<?php	
}
