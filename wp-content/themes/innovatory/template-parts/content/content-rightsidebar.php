<?php
/**
 * Template part for displaying posts with left sidebar
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package innovatory
 */
?>
<div class="container">
	<div class="row">
		<div class="col-sm-9 main-blog">
		<?php 
		if ( have_posts() ) { 
		
			while ( have_posts() ) : the_post();
				get_template_part( 'template-parts/content/content', 'default' );
				wp_link_pages( 
					array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'innovatory' ),
						'after'  => '</div>',
					) 
				);
			endwhile;
		} 
		the_posts_pagination();
		?>
		</div><!-- /.blog-main -->
		<?php get_sidebar(); ?>
	</div>
</div>