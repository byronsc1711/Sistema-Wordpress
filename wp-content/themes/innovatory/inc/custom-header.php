<?php
/**
 * Custom Header functionality for Innovatory
 *
 * Set up the WordPress core custom header feature.
 *
 */

function innovatory_customizer_settings($wp_customize) {
	
	// sanitization checkbox callback function
	function innovatory_sanitize_checkbox( $input ){
		//returns true if checkbox is checked
		return ( ( isset( $input ) && true == $input ) ? true : false );
	}
	function innovatory_sanitize_sidebar( $input ) {
		$sidebar = array( 'left', 'right', 'none' );
		$valid = array_flip($sidebar);
		if ( array_key_exists( $input, $valid ) ) {
			return $input;
		}
	}
	// footer section [social media links]
	
	$wp_customize->add_section('social_icons', array(
	  'title'   => esc_html__( 'Social Icons / Header Search', 'innovatory' )
	 ));
	
	//adding facebook url box
	$wp_customize->add_setting('facebook_url', array(
			'default' => esc_html__( 'Facebook URL', 'innovatory' ),
			'sanitize_callback' => 'esc_url_raw',
		));
	$wp_customize->add_control('facebook_url', array(
		'label'   => esc_html__( 'Facebook', 'innovatory' ),
		'section' => 'social_icons',
		'type'    => 'url',
		'transport' => 'refresh',
	));
	//adding twitter url box
	$wp_customize->add_setting('twitter_url', array(
			'default' => esc_html__( 'Twitter URL', 'innovatory' ),
			'sanitize_callback' => 'esc_url_raw',
		));
	$wp_customize->add_control('twitter_url', array(
		'label'   => esc_html__( 'Twitter', 'innovatory' ),
		'section' => 'social_icons',
		'type'    => 'url',
	));
	//adding linkedin url box
	$wp_customize->add_setting('linkedin_url', array(
			'default' => esc_html__( 'Linkedin URL', 'innovatory' ),
			'sanitize_callback' => 'esc_url_raw',
		));
	$wp_customize->add_control('linkedin_url', array(
		'label'   => esc_html__( 'Linkedin', 'innovatory' ),
		'section' => 'social_icons',
		'type'    => 'url',
	));
	//adding insta url box
	$wp_customize->add_setting('insta_url', array(
			'default' => esc_html__( 'Instagram URL', 'innovatory' ),
			'sanitize_callback' => 'esc_url_raw',
		));
	$wp_customize->add_control('insta_url', array(
		'label'   => esc_html__( 'Instagram', 'innovatory' ),
		'section' => 'social_icons',
		'type'    => 'url',
	));
	
	// show social icons
	$wp_customize->add_setting('social_on_header', array(
		'default'	=> false,
		'sanitize_callback' => 'innovatory_sanitize_checkbox',
	)); 
	
	$wp_customize->add_control('social_on_header', array(
		'label'   => esc_html__( 'Show Icons on Header', 'innovatory' ),
		'section' => 'social_icons',
		'type'    => 'checkbox',
		'transport' => 'refresh',
	));
	
	$wp_customize->add_setting('social_on_footer', array(
		'default'	=> false,
		'sanitize_callback' => 'innovatory_sanitize_checkbox',
	)); 
	
	$wp_customize->add_control('social_on_footer', array(
		'label'   => esc_html__( 'Show Icons on Footer', 'innovatory' ),
		'section' => 'social_icons',
		'type'    => 'checkbox',
		'transport' => 'refresh',
	));
	// show/hide search form from header
	$wp_customize->add_setting('header_search_form', array(
		'default'	=> false,
		'sanitize_callback' => 'innovatory_sanitize_checkbox',
	)); 
	
	$wp_customize->add_control('header_search_form', array(
		'label'   => esc_html__( 'Search Form on Header', 'innovatory' ),
		'section' => 'social_icons',
		'type'    => 'checkbox',
		'transport' => 'refresh',
	));
	
	/*----------------------------------
		Post Slider options
	---------------------------------------*/
	$wp_customize->add_section('slider_section', array(
	  'title'   => esc_html__( 'Slider', 'innovatory' )
	));
	// Show/hide option
	$wp_customize->add_setting('slider_enable', array(
		'default'	=> false,
		'sanitize_callback' => 'innovatory_sanitize_checkbox',
	)); 
	
	$wp_customize->add_control('slider_enable', array(
		'label'   => esc_html__( 'Show/Hide Slider', 'innovatory' ),
		'section' => 'slider_section',
		'type'    => 'checkbox',
		'transport' => 'refresh',
	));
	// Fluid/Boxed slider
	$wp_customize->add_setting('slider_layout', array(
		'default'	=> false,
		'sanitize_callback' => 'innovatory_sanitize_checkbox',
	)); 
	
	$wp_customize->add_control('slider_layout', array(
		'label'   => esc_html__( 'Slider fluid layout', 'innovatory' ),
		'section' => 'slider_section',
		'type'    => 'checkbox',
		'transport' => 'refresh',
	));
	// Slider arrow
	$wp_customize->add_setting('slider_arrow', array(
		'default'	=> false,
		'sanitize_callback' => 'innovatory_sanitize_checkbox',
	)); 
	
	$wp_customize->add_control('slider_arrow', array(
		'label'   => esc_html__( 'Slider arrows', 'innovatory' ),
		'section' => 'slider_section',
		'type'    => 'checkbox',
		'transport' => 'refresh',
	));
	// Slider indicators
	$wp_customize->add_setting('slider_indicators', array(
		'default'	=> false,
		'sanitize_callback' => 'innovatory_sanitize_checkbox',
	)); 
	
	$wp_customize->add_control('slider_indicators', array(
		'label'   => esc_html__( 'Slider indicators', 'innovatory' ),
		'section' => 'slider_section',
		'type'    => 'checkbox',
		'transport' => 'refresh',
	));
	// Slider meta
	$wp_customize->add_setting('slider_meta', array(
		'default'	=> false,
		'sanitize_callback' => 'innovatory_sanitize_checkbox',
	)); 
	
	$wp_customize->add_control('slider_meta', array(
		'label'   => esc_html__( 'Post Meta', 'innovatory' ),
		'section' => 'slider_section',
		'type'    => 'checkbox',
		'transport' => 'refresh',
	));
	// Slider Heading text color
	$wp_customize->add_setting( 'slider_title_color', array(
			'default' => '#FFFFFF',
			'sanitize_callback' => 'sanitize_hex_color' //validates 3 or 6 digit HTML hex color code
		)
	);
	  
	$wp_customize->add_control( new WP_Customize_Color_Control( 
		$wp_customize, 
		'slider_title_color', 
			array(              
				'label' => __( 'Title Text color', 'innovatory' ),
				'section' => 'slider_section'       
			)
		) 
	);
	// Sidebar options
	$wp_customize->add_section('sidebar_section', array(
	  'title'   => esc_html__( 'Sidebar Option', 'innovatory' )
	));
	// Show/hide option
	$wp_customize->add_setting('sidebar_enable', array(
		'default'	=> 'right',
		'sanitize_callback' => 'innovatory_sanitize_sidebar',
	)); 
	
	$wp_customize->add_control('sidebar_enable', array(
		'label'   => esc_html__( 'Enable Sidebar', 'innovatory' ),
		'section' => 'sidebar_section',
		'type'    => 'radio',
		'transport' => 'refresh',
		'choices' => array(
			'left' => esc_html__( 'Left Sidebar', 'innovatory' ),
			'right' => esc_html__( 'Right Sidebar', 'innovatory' ),
			'none' => esc_html__( 'No Sidebar', 'innovatory' ),
		  ),
	));
	
}
add_action('customize_register', 'innovatory_customizer_settings');

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses innovatory_header_style()
 */
function innovatory_custom_header_setup() {
	/**
	 *
	 * @param array $args {
	 *     An array of custom-header support arguments.
	 *
	 *     @type int    $width                  Width in pixels of the custom header image. Default 954.
	 *     @type int    $height                 Height in pixels of the custom header image. Default 1300.
	 *     @type string $wp-head-callback       Callback function used to styles the header image and text
	 *                                          displayed on the blog.
	 * }
	 */
	add_theme_support(
		'custom-header',
		apply_filters(
			'innovatory_custom_header_args',
			array(
				'width'              => 1350,
				'height'             => 65,
				'wp-head-callback'   => 'innovatory_header_style',
			)
		)
	);
}
add_action( 'after_setup_theme', 'innovatory_custom_header_setup' );
if ( ! function_exists( 'innovatory_header_style' ) ) :
	/**
	 * Styles the header image and text displayed on the blog.
	 *
	 */
	function innovatory_header_style() {
		$header_image = get_header_image();
		// If no custom options for text are set, let's bail.
		if ( empty( $header_image ) && display_header_text() ) {
			return;
		}
		// If we get this far, we have custom styles. Let's do this.
		?>
		<style type="text/css" id="innovatory-header-css">
		<?php
		// Has a Custom Header been added?
		if ( ! empty( $header_image ) ) :
			?>
		.main-header {

			/*
			 * No shorthand so the Customizer can override individual properties.
			 * @see https://core.trac.wordpress.org/ticket/31460
			 */
			background-image: url(<?php header_image(); ?>);
			background-repeat: no-repeat;
			background-position: 50% 50%;
			-webkit-background-size: cover;
			-moz-background-size:    cover;
			-o-background-size:      cover;
			background-size:         cover;
		}

		@media screen and (min-width: 59.6875em) {
			body:before {

				/*
				 * No shorthand so the Customizer can override individual properties.
				 * @see https://core.trac.wordpress.org/ticket/31460
				 */
				background-image: url(<?php header_image(); ?>);
				background-repeat: no-repeat;
				background-position: 100% 50%;
				-webkit-background-size: cover;
				-moz-background-size:    cover;
				-o-background-size:      cover;
				background-size:         cover;
				border-right: 0;
			}

			.site-header {
				background: transparent;
			}
		}
			<?php
		endif;

		// Has the text been hidden?
		if ( ! display_header_text() ) :
			?>
		.site-title,
		.header-blog-info {
			clip: rect(1px, 1px, 1px, 1px);
			position: absolute;
		}
	<?php endif; ?>
	</style>
		<?php
	}
endif; // innovatory_header_style
function innovatory_get_customizer_css(){
	?>
	<style>
		<?php
		// header color change
		$txtColor = get_theme_mod( 'header_textcolor' );
		if(!empty($txtColor)){ ?>
			.site-title a{
				color: #<?php echo esc_attr( $txtColor );  ?> !important;
			}
		<?php
		}
		// heading color for Hero Section
		$heading_color = get_theme_mod( 'heading_color', '' );
		if(!empty($heading_color)){ ?>
			.intro h1{
				color: <?php echo esc_attr( $heading_color );  ?>;
			}
		<?php 
		}
		$subheading_color = get_theme_mod( 'subheading_color', '' );
		if(!empty($heading_color)){ ?>
			.intro h3{
				color: <?php echo esc_attr( $subheading_color ); ?> !important;
			}
		<?php 
		}
		$slider_title_color	= get_theme_mod( 'slider_title_color', '' );
		if(!empty($slider_title_color)){ ?>
			.banner-text h2 a{
				color: <?php echo esc_attr( $slider_title_color ); ?> !important;
			}
		<?php 
		}
	?>
	</style>
	<?php
}
function innovatory_theme_styles() {
  wp_enqueue_style( 'innovatory-customizer-styles', get_stylesheet_uri() ); // This is where you enqueue your theme's main stylesheet
  $custom_css = innovatory_get_customizer_css();
  wp_add_inline_style( 'innovatory-customizer-styles', $custom_css );
}

add_action( 'wp_enqueue_scripts', 'innovatory_theme_styles' );