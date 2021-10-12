<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Sublime_Blog
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head itemscope itemtype="http://schema.org/WebSite">
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> itemscope itemtype="http://schema.org/WebPage">
<?php wp_body_open(); ?> 
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'sublime-blog' ); ?></a>
	<div class="header-banner-wrap">
		<?php sublime_blog_header(); ?>
		<?php 
			if( is_front_page() ){
				$ed_slider      = get_theme_mod( 'ed_slider_section', false );
				$slider_type    = get_theme_mod( 'slider_type', 'latest_posts' );
				$slider_cat     = get_theme_mod( 'slider_cat' );
				$posts_per_page = get_theme_mod( 'no_of_slides', 3 );
				if( $ed_slider ){
					$slider_arg = array(
						'post_type'           => 'post',
						'post_status'         => 'publish',            
						'ignore_sticky_posts' => true
					);

					if( $slider_type === 'cat' && $slider_cat ){
						$slider_arg['cat']            = $slider_cat; 
						$slider_arg['posts_per_page'] = -1;  
					}else{
						$slider_arg['posts_per_page'] = $posts_per_page;
					}

					$slider_qry = new WP_Query( $slider_arg );
					
					if( $slider_qry->have_posts() ){
						echo '<div class="site-banner"><div class="container"><div class="banner-items owl-carousel">';
						while( $slider_qry->have_posts() ){
							$slider_qry->the_post();
							if( has_post_thumbnail() ){ ?>
								<div class="banner-item">
									<?php the_post_thumbnail( 'sublime-blog-slider', array( 'itemprop' => 'image' ) ); ?>
									<div class="item-content">
										<div class="item-content-inner">
											<?php 
												/* translators: used between list items, there is a space after the comma */
												$categories_list = get_the_category_list( esc_html__( ', ', 'sublime-blog' ) );
												if( $categories_list ) printf( '<span class="category" itemprop="about">%1$s</span>', $categories_list ); // WPCS: XSS OK.
												the_title( '<h2 class="item-title"><a href="' . esc_url( get_permalink() ) . '">', '</a></h2>' );
											?>
										</div>
									</div>
								</div><!-- .banner-item -->
								<?php
							}
						}
						echo '</div><!-- .banner-items --></div><!-- .container --></div><!-- .site-banner -->';
						wp_reset_postdata();
					} 
				}
			} 
		?>
	</div><!-- .header-banner-wrap -->

	<div id="content" class="site-content">
		<?php if( ! is_front_page() ){ ?>
			<header class="page-header">
				<div class="container">
					<?php 
						if( is_home() ){
							echo '<h1 class="page-title">';
							single_post_title();
							echo '</h1>';
						}

						if( is_archive() ){
							the_archive_title();
                    		the_archive_description( '<div class="archive-description">', '</div>' );
						}

						if( is_search() ){
							echo '<h1 class="screen-reader-text">' . esc_html__( 'Search Result', 'sublime-blog' ) . '</h1>';
							echo '<span class="sub-title">' . esc_html__( 'Search results for the keyword:', 'sublime-blog' ) . '</span>';
							get_search_form();
						}

						if( is_404() ){
							echo '<h1 class="page-title">' . esc_html__( 'Oop! This page can not be found', 'sublime-blog' ) . '</h1>';
						}

						if( is_singular() ){
							sublime_blog_post_categories();

							the_title( '<h1 class="page-title">', '</h1>' );
							
							if( 'post' == get_post_type() ){
								echo '<div class="entry-meta">';
								sublime_blog_posted_by();
								sublime_blog_posted_on();
								sublime_blog_post_comment();								
								echo '</div><!-- .entry-meta -->';
							}
						}
					?>
				</div><!-- .container -->
			</header><!-- .page-header -->
		<?php } ?>
		<div class="container">
