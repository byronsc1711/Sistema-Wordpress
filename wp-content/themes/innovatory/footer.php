<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the ".site-content" div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package innovatory
 */

?>
</div><!-- /.container-wrapper -->
<footer class="footer">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<?php 
				if ( has_nav_menu( 'footer' ) ) {
					wp_nav_menu( 
						array(
							'theme_location'  => 'footer',
							'depth' => 1, // 1 = no dropdowns, 2 = with dropdowns.
							'container'       => 'div',
							'container_id'    => 'footer-navbar',
							'menu_class'      => 'footer-menu',
						) 
					);
				}
				?>
				<p class="copyright">
					<?php 
						// Themes footer text.
						echo esc_html( sprintf( __( 'Copyright %1$d | Theme %2$s', 'innovatory' ), date_i18n( __( 'Y', 'innovatory') ), 'Innovatory' ) ); 
					?>
				</p> 
			</div>
			<div class="col-md-6 social-icon text-right">
			<?php
			if( get_theme_mod( 'social_on_footer' ) ): ?>
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
				<?php } 
			endif;	
			?>
			</div>
		</div>
	</div>
</footer>
<?php wp_footer(); ?>
</body>
</html>