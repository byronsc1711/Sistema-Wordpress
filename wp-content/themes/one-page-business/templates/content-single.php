<?php
/**
 * The template part for displaying single posts
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->
	
	<?php one_page_business_excerpt(); ?>

	<?php one_page_business_post_thumbnail(); ?>

	<div class="entry-content">
		<?php
			the_content();

			wp_link_pages(
				array(
					'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'one-page-business' ) . '</span>',
					'after'       => '</div>',
					'link_before' => '<span>',
					'link_after'  => '</span>',
					'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'one-page-business' ) . ' </span>%',
					'separator'   => '<span class="screen-reader-text">, </span>',
				)
			);


			?>
	</div><!-- .entry-content -->
	
	<footer class="entry-footer vertical-center">
		<?php one_page_business_entry_meta(); ?>
		<?php
			edit_post_link(
				sprintf(
					/* translators: %s: Name of current post */
					__( 'Edit<span class="screen-reader-text"> "%s"</span>', 'one-page-business' ),
					esc_html(get_the_title())
				),
				'<span class="edit-link">',
				'</span>'
			);
			?>
	</footer><!-- .entry-footer -->	

</article><!-- #post-<?php the_ID(); ?> -->
