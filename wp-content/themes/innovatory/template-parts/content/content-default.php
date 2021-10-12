<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package innovatory
 */
$format = get_post_format() ? : 'standard';
?>

<article id="post-<?php the_ID(); ?>" <?php post_class($format); ?>>
	<div class="post-content-container">
		<div class="post-img-side">
		<?php if ( has_post_thumbnail() ): ?>
			<div class="blog-img">
				<img class="img-fluid" alt="<?php echo esc_attr(get_the_title()); ?>" src="<?php echo esc_url(get_the_post_thumbnail_url()); ?>" >
			</div>
		<?php endif; ?>
		</div>
		<div class="post-content-side">
			<?php
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			?>
			<div class="excerpt"><?php the_excerpt(); ?></div>
			<div class="meta-desc">
				<div class="post-info text-left">
					<?php echo esc_html__('By', 'innovatory'); ?> <span><?php the_author(); ?></span> | <?php echo the_time( get_option( 'date_format' ) ); ?>
				</div>
				<div class="post-readmore text-right">
					<a href="<?php echo esc_url(get_the_permalink()); ?>" class="readmore"><?php echo esc_html__('Read More >', 'innovatory'); ?></a>
				</div>
			</div>
		</div>
	</div>
</article><!-- #post-## -->