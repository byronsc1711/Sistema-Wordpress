<?php 
/************************************************************/
## Slider section for home page.
/***********************************************************/

$slider_status = get_theme_mod('slider_enable');
$slider_layout = get_theme_mod('slider_layout');
$slider_arrow = get_theme_mod('slider_arrow');
$slider_indicators = get_theme_mod('slider_indicators');
$slider_meta = get_theme_mod('slider_meta');
$style = '';
if($slider_layout){
	$style = "style='padding:0'";
}
if( $slider_status ):

	$slider_meta_status  = esc_attr(get_theme_mod('wrt_slider_content_meta', 'enable'));
	$posts_per_page      = absint(get_theme_mod('wrt_slider_posts', '5'));
				
	$innovatory_slider_args = array(
		'post_type'    => 'post',
		'meta_query'   => array(
			array(
				'key'     => '_thumbnail_id',
				'compare' => 'EXISTS'
			),
		),
		'ignore_sticky_posts' => true,
		'posts_per_page'         => $posts_per_page,
		'orderby'                => 'date',
		'order'                  => 'DESC',
	);
		
	$slider_data = new WP_Query($innovatory_slider_args);
	
	if($slider_data->have_posts()):
	
	$slider_display_type = esc_attr(get_theme_mod('wrt_slider_display_type'));

?>

<div class="container<?php echo ($slider_layout) ? '-fluid' : ''; ?>">
	<div class="row">
		<div id="postCarousel" class="carousel slide col-md-12" data-ride="carousel" <?php echo $style; ?>>
			<?php
			if($slider_indicators): ?>
			<ol class="carousel-indicators">
				<?php 
				$counter = 0;
				while($slider_data->have_posts()):
					$slider_data->the_post(); ?>
					<li data-target="#postCarousel" data-slide-to="<?php echo $counter; ?>" class="<?php echo ( $counter == 0 ) ? 'active' : ''; ?>"></li>
				<?php
				$counter++;
				endwhile; ?>
			</ol>
			<?php 
			endif; ?>
			<div class="carousel-inner">
				<?php  
				$slider_counter=0;
				
				while($slider_data->have_posts()): 
					$slider_data->the_post(); 
					if(has_post_thumbnail()) : 
						$src =  wp_get_attachment_image_src(get_post_thumbnail_id( get_the_ID()), 'full');
						?>
						<div class="carousel-item <?php echo ( $slider_counter == 0 ) ? 'active' : ''; ?>" data-interval="false">
							<div class="carousel-wrap" style="<?php echo 'background-image:url('. $src[0].')'; ?>">
								<?php 
								if($slider_meta): ?>
								<div class="banner-text">
									<div class="site-container">
										<?php the_title( '<h2 class="banner-text-title"><a href="' . esc_url( get_permalink() ) . '">', '</a></h2>' );
										?>
										<div class="slider_link">
											<a class="btn btn-lg" href="<?php the_permalink(); ?>"><?php esc_html_e( 'Read More', 'innovatory' ); ?></a>
										</div>
									</div>
								</div>
								<?php 
								endif; ?>
							</div>
						</div>
				<?php endif; 
				$slider_counter++;
				endwhile;	?>
			</div>
			<?php 
			if($slider_arrow) : ?>
			<a class="carousel-control-prev" href="#postCarousel" role="button" data-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="sr-only"><?php esc_html_e( 'Previous', 'innovatory' ); ?></span>
			</a>
			<a class="carousel-control-next" href="#postCarousel" role="button" data-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="sr-only"><?php esc_html_e( 'Next', 'innovatory' ); ?></span>
			</a>
			<?php 
			endif; ?>
		</div>
	</div>
</div>
<?php wp_reset_postdata(); endif; /* have_posts() */ endif; ?>