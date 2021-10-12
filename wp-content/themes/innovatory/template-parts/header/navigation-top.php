<?php
/**
 * Displays top navigation
 *
 * @package innovatory
 */

?>
<div class="navbar-light">
	<button class="menu-toggle" data-toggle="collapse" data-target="#site-navigation" aria-controls="site-navigation" aria-expanded="false" aria-label="<?php esc_attr_e( 'Toggle navigation', 'innovatory' ); ?>">
		<span class="navbar-toggler-icon"></span>
	</button>

<nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Top Menu', 'innovatory' ); ?>">
	<?php
	wp_nav_menu(
		array(
			'theme_location' => 'top',
			'menu_id'        => 'top-menu',
		)
	);
	?>
	<?php if ( is_home() && is_front_page() ) : ?>
		<a href="#content" class="menu-scroll-down scrolldown"><i class="fa fa-arrow-down"></i></a>
	<?php endif; ?>
</nav><!-- #site-navigation -->
</div>