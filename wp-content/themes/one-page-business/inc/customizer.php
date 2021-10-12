<?php
/**
 * One Page Business Customizer functionality
 */
//load go-pro section
require get_template_directory() . '/inc/go-pro/class-customize.php';

if ( ! function_exists( 'one_page_business_header_style' ) ) :
	/**
	 * Styles the header text displayed on the site.
	 *
	 * Create your own one_page_business_header_style() function to override in a child theme.
	 *
	 * @see one_page_business_custom_header_and_background().
	 */
	function one_page_business_header_style() {
		// If the header text option is untouched, let's bail.
		if ( display_header_text() ) {
			return;
		}

		// If the header text has been hidden.
		?>
		<style type="text/css" id="one-page-business-header-css">
		.site-branding {
			margin: 0 auto 0 0;
		}

		.site-branding .site-title,
		.site-description {
			clip: rect(1px, 1px, 1px, 1px);
			position: absolute;
		}
		</style>
		<?php
	}
endif; // one_page_business_header_style

/**
 * Adds postMessage support for site title and description for the Customizer.
 * @param WP_Customize_Manager $wp_customize The Customizer object.
 */
function one_page_business_customize_register( $wp_customize ) {

	$wp_customize->get_setting( 'blogname' )->transport        = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'            => '.site-title a',
				'container_inclusive' => false,
				'render_callback'     => 'one_page_business_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'            => '.site-description',
				'container_inclusive' => false,
				'render_callback'     => 'one_page_business_customize_partial_blogdescription',
			)
		);
	}
	
	require get_template_directory() .'/inc/color-picker/alpha-color-picker.php';
	
	$wp_customize->add_setting( 'hide_title_tagline' , array(
		'default'    => false,
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'one_page_business_sanitize_checkbox',
	));

	$wp_customize->add_control('hide_title_tagline' , array(
		'label' => __('Hide title & tagline','one-page-business' ),
		'section' => 'title_tagline',
		'type'=> 'checkbox',
	));	
	
	/***************** 
	 * Theme options *
	 ****************/
	 

	$wp_customize->add_panel( 'theme_options' , array(
		'title'      => __( 'Theme Options', 'one-page-business' ),
		'priority'   => 1,
	) );
	
	// header and footer
	$wp_customize->add_section( 'theme_header' , array(
		'title'      => __( 'Theme Header', 'one-page-business' ),
		'priority'   => 1,
		'panel' => 'theme_options',
	) );
	
		
	
	//wishlist URL
	$wp_customize->add_setting('header_wishlist_url' , array(
		'default'    => home_url().'/wishlist',
		'sanitize_callback' => 'sanitize_text_field',
	));
	
	

	$wp_customize->add_control('header_wishlist_url' , array(
		'label' => __('Header Wishlist URL', 'one-page-business' ),
		'section' => 'theme_header',
		'type'=> 'text',
	) );	
	
	
	//header shortcode
	$wp_customize->add_setting('header_shortcode' , array(
		'default'    => '',
		'sanitize_callback' => 'sanitize_text_field',
	));
	
	

	$wp_customize->add_control('header_shortcode' , array(
		'label' => __('Add Booking Plugin Shortcode', 'one-page-business' ),
		'section' => 'theme_header',
		'type'=> 'text',
	) );

		

	//add settings page
	require get_template_directory() . '/inc/slider-settings.php';	
	
		
	//Breadcrumb content 

	$wp_customize->add_section( 'breadcrumb_section' , array(
		'title'      => __( 'Breadcrumb', 'one-page-business' ),
		'priority'   => 2,
		'panel' => 'theme_options',
	) );
	
	//
	$wp_customize->add_setting( 'breadcrumb_show' , array(
		'default'    => one_page_business_get_settings('breadcrumb_show'),
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'one_page_business_sanitize_checkbox',
	));

	$wp_customize->add_control('breadcrumb_show' , array(
		'label' => __('Enable Breadcrumb','one-page-business' ),
		'section' => 'breadcrumb_section',
		'type'=> 'checkbox',
	));
	
		
	
	
	// Add primary color setting and control.
	$wp_customize->add_setting(
		'primary_color',
		array(
			'default'           => one_page_business_get_settings('primary_color'),
			'sanitize_callback' => 'sanitize_hex_color',
			'transport'         => 'refresh',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'primary_color',
			array(
				'label'   => __( 'Theme Primary Color', 'one-page-business' ),
				'section' => 'colors',
			)
		)
	);

	// Add page background color setting and control.
	$wp_customize->add_setting(
		'page_background_color',
		array(
			'default'           => one_page_business_get_settings('page_background_color'),
			'sanitize_callback' => 'sanitize_hex_color',
			'transport'         => 'refresh',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'page_background_color',
			array(
				'label'   => __( 'Page Background Color', 'one-page-business' ),
				'section' => 'colors',
			)
		)
	);


	// Add link color setting and control.
	$wp_customize->add_setting(
		'link_color',
		array(
			'default'           => one_page_business_get_settings('link_color'),
			'sanitize_callback' => 'sanitize_hex_color',
			'transport'         => 'refresh',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'link_color',
			array(
				'label'   => __( 'Link Color', 'one-page-business' ),
				'section' => 'colors',
			)
		)
	);

	// Add main text color setting and control.
	$wp_customize->add_setting(
		'main_text_color',
		array(
			'default'           => one_page_business_get_settings('main_text_color'),
			'sanitize_callback' => 'sanitize_hex_color',
			'transport'         => 'refresh',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'main_text_color',
			array(
				'label'   => __( 'Main Text Color', 'one-page-business' ),
				'section' => 'colors',
			)
		)
	);
	
	// layout 2
	// header layout
	
	$wp_customize->add_setting( 'header_layout' , array(
		'default'    => one_page_business_get_settings('header_layout'),
		'sanitize_callback' => 'one_page_business_sanitize_select',
	));

	$wp_customize->add_control('header_layout' , array(
		'label' => __('Select Header Layout', 'one-page-business' ),
		'section' => 'theme_header',
		'type' => 'select',
		'choices' => array(
			'0' => __('Classic Header', 'one-page-business' ),
			'1' => __('WooCommerce Search and Menu', 'one-page-business' ),
			'2' => __('List Logo title and Menu', 'one-page-business' ),
		),
	) );	
	
	// woo menubar background
 
		$wp_customize->add_setting(
			'woocommerce_menubar_color',
			array(
				'default'     => one_page_business_get_settings('woocommerce_menubar_color'),
				'type'        => 'theme_mod',			
				'transport'   => 'refresh',
				'sanitize_callback' => 'sanitize_text_field',
			)
		);
		
		// background Alpha Color Picker control
		$wp_customize->add_control(
			new one_page_business_Customize_Alpha_Color_Control(
				$wp_customize,
				'woocommerce_menubar_color',
				array(
					'label'         =>  __('Menubar Background (Layout 2 & 3)','one-page-business' ),
					'section'       => 'theme_header',
					'settings'      => 'woocommerce_menubar_color',
					'show_opacity'  => true, // Optional.
					'palette'	=> one_page_business_color_codes(),
				)
			)
		);			
	
	// woo menubar text color
	$wp_customize->add_setting(
		'woocommerce_menubar_text_color',
		array(
			'default'           => one_page_business_get_settings('woocommerce_menubar_text_color'),
			'sanitize_callback' => 'sanitize_hex_color',
			'transport'         => 'refresh',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'woocommerce_menubar_text_color',
			array(
				'label'   => __( 'Menu Color (Layout 2 & 3) ', 'one-page-business' ),
				'section' => 'theme_header',
			)
		)
	);
	

	// Add header text color setting and control.
	$wp_customize->add_setting(
		'header_text_color',
		array(
			'default'           => one_page_business_get_settings('header_text_color'),
			'sanitize_callback' => 'sanitize_hex_color',
			'transport'         => 'refresh',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'header_text_color',
			array(
				'label'   => __( 'Header Text Color', 'one-page-business' ),
				'section' => 'theme_header',
			)
		)
	);
	

	// Add header text:hover color
	$wp_customize->add_setting(
		'header_text_hover_color',
		array(
			'default'           => one_page_business_get_settings('header_text_hover_color'),
			'sanitize_callback' => 'sanitize_hex_color',
			'transport'         => 'refresh',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'header_text_hover_color',
			array(
				'label'   => __( 'Headet Text Hover Color', 'one-page-business' ),
				'section' => 'theme_header',
			)
		)
	);		
		
	
	// Header text colour
	$wp_customize->add_setting(
		'header_bg_color',
		array(
			'default'           => one_page_business_get_settings('header_bg_color'),
			'sanitize_callback' => 'sanitize_hex_color',
			'transport'         => 'refresh',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'header_bg_color',
			array(
				'label'   => __( 'Header Background Color', 'one-page-business' ),
				'section' => 'theme_header',
			)
		)
	);
	
	//header tel
	$wp_customize->add_setting('header_telephone' , array(
		'default'    => '1-000-123-4567',
		'sanitize_callback' => 'sanitize_text_field',
	));
	
	

	$wp_customize->add_control('header_telephone' , array(
		'label' => __('Tel', 'one-page-business' ),
		'section' => 'theme_header',
		'type'=> 'text',
	) );
	
	
	$wp_customize->selective_refresh->add_partial( 'header_telephone', array(
		'selector' => '.contact-info',
	) );
	
	//header email
	$wp_customize->add_setting('header_email' , array(
		'default'    => 'mail@domain.com',
		'sanitize_callback' => 'sanitize_email',
	));

	$wp_customize->add_control('header_email' , array(
		'label' => __('Email', 'one-page-business' ),
		'section' => 'theme_header',
		'type'=> 'text',
	) );
			
	//header address
	$wp_customize->add_setting('header_address' , array(
		'default'    => __('Street, City', 'one-page-business'),
		'sanitize_callback' => 'sanitize_text_field',
	));

	$wp_customize->add_control('header_address' , array(
		'label' => __('Address', 'one-page-business' ),
		'section' => 'theme_header',
		'type'=> 'text',
	) );
	

	// Add header contact social background colour
 
		$wp_customize->add_setting(
			'header_contact_bg_color',
			array(
				'default'     => one_page_business_get_settings('header_contact_bg_color'),
				'type'        => 'theme_mod',			
				'transport'   => 'refresh',
				'sanitize_callback' => 'sanitize_text_field',
			)
		);
		
		$wp_customize->add_control(
			new one_page_business_Customize_Alpha_Color_Control(
				$wp_customize,
				'header_contact_bg_color',
				array(
					'label'         =>  __('Contact Section Background','one-page-business' ),
					'section'       => 'theme_header',
					'settings'      => 'header_contact_bg_color',
					'show_opacity'  => true,
					'palette'	=> one_page_business_color_codes(),
				)
			)
		);
		
	// Add header contact social text colour
 
		$wp_customize->add_setting(
			'header_contact_text_color',
			array(
				'default'     => one_page_business_get_settings('header_contact_text_color'),
				'type'        => 'theme_mod',			
				'transport'   => 'refresh',
				'sanitize_callback' => 'sanitize_text_field',
			)
		);
		
		$wp_customize->add_control(
			new one_page_business_Customize_Alpha_Color_Control(
				$wp_customize,
				'header_contact_text_color',
				array(
					'label'         =>  __('Contact Section Text','one-page-business' ),
					'section'       => 'theme_header',
					'settings'      => 'header_contact_text_color',
					'show_opacity'  => true,
					'palette'	=> one_page_business_color_codes(),
				)
			)
		);
	
	
	// 5 Typography

	$wp_customize->add_section( 'typography_section' , array(
		'title'      => __('Typography', 'one-page-business' ),			 
		'description'=> __('Change default fonts. Enter any Google Font name.', 'one-page-business' ),
		'panel' => 'theme_options',
	));


	$wp_customize->add_setting( 'heading_font' , array(
		'default'    => one_page_business_get_settings('heading_font'),
		'sanitize_callback' => 'sanitize_text_field',
	));

	$wp_customize->add_control('heading_font' , array(
		'label' => __('Heading Font Family', 'one-page-business' ),
		'section' => 'typography_section',
		'type' => 'text',
	) );
	
	
	$wp_customize->add_setting( 'body_font' , array(
		'default'    => one_page_business_get_settings('body_font'),
		'sanitize_callback' => 'sanitize_text_field',
	));

	$wp_customize->add_control('body_font' , array(
		'label' => __('Body Font Family', 'one-page-business' ),
		'section' => 'typography_section',
		'type' => 'text',
	));	
	
	//'choices' => one_page_business_font_family(),
	
	
	// 5 layout section 

	$wp_customize->add_section( 'layout_section' , array(
		'title'      => __('Layout', 'one-page-business' ),			 
		'description'=> __('Chanege site layout to fluid / box mode', 'one-page-business' ),
		'panel' => 'theme_options',
	));
 
	$wp_customize->add_setting( 'box_layout_mode' , array(
		'default'    => one_page_business_get_settings('box_layout_mode'),
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'one_page_business_sanitize_checkbox',
	));

	$wp_customize->add_control('box_layout_mode' , array(
		'label' => __('Set Box Layout mode','one-page-business' ),
		'section' => 'layout_section',
		'type'=> 'checkbox',
	));
	
	// sidebar position
	$wp_customize->add_setting( 'woo_sidebar_position' , array(
		'default'    => 'right',
		'sanitize_callback' => 'one_page_business_sanitize_select',
	));

	$wp_customize->add_control('woo_sidebar_position' , array(
		'label' => __('WooCommerce Sidebar position', 'one-page-business' ),
		'section' => 'layout_section',
		'type' => 'select',
		'choices' => array(
			'right' => __('Right', 'one-page-business' ),
			'left' => __('Left', 'one-page-business' ),
			'none' => __('No Sidebar', 'one-page-business' ),
		),
	) );
	
	
	// 7 footer section
	$wp_customize->add_section( 'theme_footer' , array(
		'title'      => __( 'Theme Footer', 'one-page-business' ),
		'panel' => 'theme_options',
	) );
		
	// Add footer color setting and control.
	$wp_customize->add_setting(
		'footer_text_color',
		array(
			'default'           => one_page_business_get_settings('footer_text_color'),
			'sanitize_callback' => 'sanitize_hex_color',
			'transport'         => 'refresh',
		)
	);
	

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'footer_text_color',
			array(
				'label'   => __( 'Footer Text Color', 'one-page-business' ),
				'section' => 'theme_footer',
			)
		)
	);
	

	$wp_customize->add_setting('footer_border' , array(
		'default'    => one_page_business_get_settings('footer_border'),
		'sanitize_callback' => 'absint',
	));

	$wp_customize->add_control('footer_border' , array(
		'label' => __('Footer Border Width', 'one-page-business' ),
		'section' => 'theme_footer',
		'type'=> 'number',
	) );	
	
	
	// Add footer background color setting and control.
	$wp_customize->add_setting(
		'footer_bg_color',
		array(
			'default'           => one_page_business_get_settings('footer_bg_color'),
			'sanitize_callback' => 'sanitize_hex_color',
			'transport'         => 'refresh',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'footer_bg_color',
			array(
				'label'   => __( 'Footer Background Color', 'one-page-business' ),
				'section' => 'theme_footer',
			)
		)
	);
	
	//
	$wp_customize->add_setting(
		'footer_secondary_color',
		array(
			'default'           => one_page_business_get_settings('footer_secondary_color'),
			'sanitize_callback' => 'sanitize_hex_color',
			'transport'         => 'refresh',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'footer_secondary_color',
			array(
				'label'   => __( 'Footer Secondary Color', 'one-page-business' ),
				'section' => 'theme_footer',
			)
		)
	);	
	
	// footer section image
	$wp_customize->add_setting( 'footer_bg_image' , 
		array(
			'default' 		=> '',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'esc_url_raw',
		)
	);
	
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize , 'footer_bg_image' ,
		array(
			'label'          => __( 'Footer Background Image', 'one-page-business' ),
			'description'	=> __('Upload your background image', 'one-page-business'),
			'settings'  => 'footer_bg_image',
			'section'        => 'theme_footer',
		))
	);
	
	// footer copyright text
	$wp_customize->add_setting( 'footer_text' , array(
		'default' 		=> esc_html__('A Theme by Theme Space', 'one-page-business'),
		'sanitize_callback' => 'wp_kses_post',
	));	
	
	$wp_customize->add_control('footer_text' , array(
		'label' => __('Footer Bottom Text', 'one-page-business'),
		'section' => 'theme_footer',
		'type'=>'textarea',
	) );
	
	$wp_customize->selective_refresh->add_partial( 'footer_text', array(
		'selector' => '.site-info',
	) );
	
	
	
//end of settings
	
}
add_action( 'customize_register', 'one_page_business_customize_register', 11 );

/**
 * Render the site title for the selective refresh partial.
 */
function one_page_business_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @since One Page Business 1.2
 * @see one_page_business_customize_register()
 *
 * @return void
 */
function one_page_business_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Enqueues front-end CSS for color scheme.
 * @see wp_add_inline_style()
 */
function one_page_business_color_scheme_css() {

	$scheme_css = one_page_business_get_theme_css();

	wp_add_inline_style( 'one-page-business-style', $scheme_css );
}
add_action( 'wp_enqueue_scripts', 'one_page_business_color_scheme_css' );


/**
 * Binds JS handlers to make the Customizer preview reload changes asynchronously.
 *
 *
 */
function one_page_business_customize_preview_js() {
	wp_enqueue_script( 'one-page-business-customize-preview', get_template_directory_uri() . '/js/customize-preview.js', array( 'customize-preview' ), '20160816', true );
}
add_action( 'customize_preview_init', 'one_page_business_customize_preview_js' );

/**
 * Theme options
 */

require get_template_directory() . '/inc/colors-fonts.php';

/*
 * Get product categories
 */

$one_page_business_product_categories = one_page_business_get_product_categories();

function one_page_business_get_product_categories(){

	$args = array(
			'taxonomy' => 'product_cat',
			'orderby' => 'date',
			'order' => 'ASC',
			'show_count' => 1,
			'pad_counts' => 0,
			'hierarchical' => 0,
			'title_li' => '',
			'hide_empty' => 1,
	);

	$categories = get_categories($args);

	$arr = array();
	$arr['0'] = esc_html__('-Select Category-', 'one-page-business') ;
	foreach($categories as $category){
		$arr[$category->term_id] = $category->name;
	}
	return $arr;
}


/* 
 * check valid font has been selected 
 */
function one_page_business_sanitize_font_family( $value ) {
    if ( array_key_exists($value, one_page_business_font_family()) )  {   
    	return $value;
	} else {
		return "Google Sans, Sans Serif";
	}
}

function one_page_business_font_family(){

	$google_fonts = array(  "Google Sans" => "Google Sans",
							"Open sans" => "Open sans",
							"Oswald" => "Oswald",
							"Lora" => "Lora",
							"Raleway" => "Raleway",
						);
						
	return ($google_fonts);
}


if( class_exists( 'WP_Customize_Control' ) ):
	class one_page_business_WP_Customize_Help_Control extends WP_Customize_Control {

		public function render_content() {
		?>
			<label>
				<span class="customize-control-title" style="padding:9px; border:1px solid #CCCCCC; background-color:#FFFFFF;"><?php echo esc_html( $this->label ); ?></span>
			</label>
		<?php
		}
	}
endif;