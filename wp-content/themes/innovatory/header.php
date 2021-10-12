<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div class="site-content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package innovatory
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
 <meta charset="<?php bloginfo( 'charset' ); ?>">   
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1">
<?php wp_head(); ?> 
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'innovatory' ); ?></a>
<header class="main-header">
	<div class="container">
		<div class="row">
		
			<div class="col-md-12">
				<div class="header-left">
					<?php
					if( get_theme_mod( 'social_on_header' ) ): ?>
						<div class="header-promo">
							<div class="social-icons-wrapper">
								<?php if( get_theme_mod( 'facebook_url' ) ){ ?>
									<a href="<?php echo esc_url( get_theme_mod( 'facebook_url', '#!' ) ); ?>" target="_blank"><i class="fa fa-facebook"></i></a>
								<?php } ?>
								<?php if( get_theme_mod( 'twitter_url' ) ){ ?>
									<a href="<?php echo esc_url( get_theme_mod( 'twitter_url', '#!' ) ); ?>" target="_blank"><i class="fa fa-twitter"></i></a>
								<?php } ?>
								<?php if( get_theme_mod( 'linkedin_url' ) ){ ?>
									<a href="<?php echo esc_url( get_theme_mod( 'linkedin_url', '#!' ) ); ?>" target="_blank"><i class="fa fa-linkedin"></i></a>
								<?php } ?>
								<?php if( get_theme_mod( 'insta_url' ) ){ ?>
									<a href="<?php echo esc_url( get_theme_mod( 'insta_url', '#!' ) ); ?>" target="_blank"><i class="fa fa-instagram"></i></a>
								<?php } ?>
							</div>
						</div>  
					<?php 
					endif; ?>
				</div>

				<div class="header-center">
					<div class="logo">
						<?php get_template_part( 'template-parts/header/site', 'branding' ); ?>
					</div>
				</div>

				<div class="header-right">
					<?php
					if( get_theme_mod( 'header_search_form' ) ): ?>
						<div class="header-promo">
							<?php echo get_search_form(); ?>
						</div>
					<?php endif; ?>
				</div>
			</div>
		
		</div>
	</div>
</header>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<?php if ( has_nav_menu( 'top' ) ) : ?>
				<div class="navigation-top">
					<div class="wrap">
						<?php get_template_part( 'template-parts/header/navigation', 'top' ); ?>
					</div><!-- .wrap -->
				</div><!-- .navigation-top -->
			<?php endif; ?>
		</div>
	</div>
</div>
<?php 
if ( is_front_page() && get_theme_mod('slider_enable') ) : 
	// Post Slider 
	get_template_part( 'template-parts/sliders/slider' );
endif; ?>
<div class="site-content" id="content">