<?php
/**
 * The template for displaying the header
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php echo esc_url( get_bloginfo( 'pingback_url' ) ); ?>">
	<?php endif; ?>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php one_page_business_wp_body_open();

$business_starter_header = get_theme_mod('header_layout', one_page_business_get_settings('header_layout'));
$business_starter_header_class = one_page_business_get_header_class();
if ($business_starter_header == 2){
	$business_starter_header_class = "none";
}

if(get_theme_mod("box_layout_mode", one_page_business_get_settings('box_layout_mode'))) { echo '<div class="box-layout-style">'; }
?>

<div id="page" class="site <?php if (get_theme_mod('header_layout', one_page_business_get_settings('header_layout')) == 2) { echo(' burger-header'); } else { echo('normal-header'); } ?>">
	<div class="site-inner">
		<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'one-page-business' ); ?></a>
		
		<?php $one_page_business_header_style = get_post_meta( get_the_ID(), 'header_style', true); ?>
		
		<header id="masthead" class="<?php echo esc_attr($business_starter_header_class); ?>  site-header" role="banner" >
			<?php get_template_part( 'templates/contact', 'section' ); ?>
			<div id="site-header-main" class="site-header-main vertical-center">
			<?php			
			
			
			if ($business_starter_header == 0) {
				get_template_part( 'templates/header', 'default' );
				//woocommerce layout
			} else if($business_starter_header == 1 && class_exists('WooCommerce')){
				get_template_part( 'templates/woo', 'header' ); 
				//list layout
			} else if ($business_starter_header == 2){
				get_template_part( 'templates/header', 'list' );
			} else {
				//default layout
				get_template_part( 'templates/header', 'default' );
				$business_starter_header = 0;
			}
			
			// shortcode section
			get_template_part( 'templates/shortcode', 'section' );

			?>		
			</div><!-- .site-header-main -->
		</header><!-- .site-header -->
		


<?php

//no breadcrumb in list layout
if (get_theme_mod('breadcrumb_show', one_page_business_get_settings('breadcrumb_show')) && $business_starter_header != 2  ) {
	
	if(!is_front_page() || (is_home() && get_option('page_on_front') < 1)) {

		$one_page_business_header_image =  esc_url(get_header_image());
	
		if ( is_singular() ) {
			$one_page_business_header_image = has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_id(), 'full' ) : $one_page_business_header_image;
		} else if (class_exists('WooCommerce') && is_product_category() ) {
		
		global $wp_query;
	
		// get the query object
		$one_page_business_cat = $wp_query->get_queried_object();
	
		// get the thumbnail id using the queried category term_id
		$one_page_business_thumbnail_id = get_woocommerce_term_meta( $one_page_business_cat->term_id, 'thumbnail_id', true ); 
	
		// get the image URL
		$one_page_business_image = wp_get_attachment_url( $one_page_business_thumbnail_id ); 	
			$one_page_business_header_image = $one_page_business_image ? $one_page_business_image : $one_page_business_header_image;
		}
		?>
		
		<div id="page-site-header" class="relative" style="background-image: url('<?php echo esc_url( $one_page_business_header_image ); ?>');">
			<div class="overlay"></div>
			<div class="container">
				<header class="page-header">
					<h2 class="page-title"><?php echo esc_html(one_page_business_custom_header_banner_title()); ?></h2>
				</header>
		
				<?php one_page_business_add_breadcrumb(); ?>
			</div><!-- .wrapper -->
		</div><!-- #page-site-header -->
		<?php
	}	//end breadcrumb
}

		
