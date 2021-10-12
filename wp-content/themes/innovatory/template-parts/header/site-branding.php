<?php
/**
 * Displays header site branding
 *
 * @package innovatory
 */

?>
<div class="site-branding">
	<div class="wrap">
		<?php the_custom_logo(); ?>
		<div class="site-branding-text">
			<?php if ( is_front_page() ) : ?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<?php else : ?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
			<?php endif; ?>

			<?php
			$description = get_bloginfo( 'description', 'display' );
			if ( $description || is_customize_preview() ) : ?>
				<div class="header-blog-info"><?php echo esc_html ( $description ); ?></div>
			<?php endif; ?>
		</div><!-- .site-branding-text -->
	</div><!-- .wrap -->
</div><!-- .site-branding -->
