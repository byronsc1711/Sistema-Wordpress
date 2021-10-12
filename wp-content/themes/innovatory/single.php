<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package innovatory
 */

get_header(); 
$sidebar_enable = get_theme_mod('sidebar_enable');
$class = "col-md-9";
switch($sidebar_enable){
	case 'none':
		$class = 'col-md-12';
		break;
}
?>
<section id="single-post">
	<div class="container">
		<div class="row">
			<?php
			if($sidebar_enable == 'left'){
				get_sidebar();
			}
			?>
			<div class="<?php echo $class; ?> col-sm-12">
				<?php
				if ( have_posts() ) :
					// Start the Loop.
					while ( have_posts() ) : the_post(); ?>
						<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
						<?php if ( has_post_thumbnail() ){ ?>
							<p class='text-center'>
								<img class="img-fluid" alt="<?php the_title_attribute(); ?>" src="<?php echo esc_url( get_the_post_thumbnail_url() ); ?>" >
							</p>
						<?php } 
						the_content();
						wp_link_pages(
							array(
								'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'innovatory' ) . '</span>',
								'after'       => '</div>',
								'link_before' => '<span>',
								'link_after'  => '</span>',
								'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'innovatory' ) . ' </span>%',
								'separator'   => '<span class="screen-reader-text">, </span>',
							)
						);
					endwhile;
				endif;
				?>
			<?php
			if ( is_singular( 'post' ) ) {
				// Previous/next post navigation.
				the_post_navigation(
					array(
						'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Next Post', 'innovatory' ) . '</span> ' .
							'<span class="screen-reader-text">' . __( 'Next post:', 'innovatory' ) . '</span> <br/>' .
							'<span class="post-title">%title</span>',
						'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Previous Post', 'innovatory' ) . '</span> ' .
							'<span class="screen-reader-text">' . __( 'Previous post:', 'innovatory' ) . '</span> <br/>' .
							'<span class="post-title">%title</span>',
					)
				);
			}
			the_tags();
			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;
			?>
			</div>
			<?php
			if($sidebar_enable == 'right'){
				get_sidebar();
			}
			?>
		</div>
	</div>
</section>
<?php get_footer();