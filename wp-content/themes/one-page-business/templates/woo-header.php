<!--start header-->
<div class="header-full-width">

	<div class="row vertical-center">
	
	<div class="col-sm-5">				
		<div class="site-branding vertical-center">
			<?php one_page_business_the_custom_logo(); ?>
			<div class="site-info-container <?php if(get_theme_mod('hide_title_tagline', 0)) { echo ' hide-info';} ?>">
			<?php if ( is_front_page() && is_home() ) : ?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<?php else : ?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
				<?php
			endif;

			$one_page_business_description = get_bloginfo( 'description', 'display' );
			if ( $one_page_business_description || is_customize_preview() ) :
				?>
				<p class="site-description"><?php echo esc_html($one_page_business_description); ?></p>
			<?php endif; ?>
			</div>
		</div> <!-- .site-branding --> 
	</div>
	
		
	<div class="col-sm-7"> <!--start search-->
        <div class="woo-search">
          <?php if ( class_exists( 'WooCommerce' ) ) { ?>
          <div class="header-search-form">
            <form  method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
              <select class="header-search-select" name="product_cat">
                <option value="">
                <?php esc_html_e( 'All Categories', 'one-page-business' ); ?>
                </option>
                <?php
								/*
								 * @package envo-ecommerce
								 * @subpackage agency-starter
								 */
								$args = array(
									'taxonomy'     => 'product_cat',
									'orderby'      => 'date',
									'order'      	=> 'ASC',
									'show_count'   => 1,
									'pad_counts'   => 0,
									'hierarchical' => 1,
									'title_li'     => '',
									'hide_empty'   => 1,
								);
								$categories = get_categories( $args);
								foreach ( $categories as $category ) {
									$option = '<option value="' . esc_attr( $category->category_nicename ) . '">';
									$option .= esc_html( $category->cat_name );
									$option .= ' (' . absint( $category->category_count ) . ')';
									$option .= '</option>';
									echo ($option); 
								}
								?>
              </select>
              <input type="hidden" name="post_type" value="product" />
              <input class="header-search-input" name="s" type="text" placeholder="<?php esc_attr_e( 'Search products...', 'one-page-business' ); ?>"/>
              <button class="header-search-button" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
            </form>
          </div>
          <?php } ?>
        </div>		
	</div> <!--end search-->

	
</div> <!--end .row-->
	
</div> <!--end .colum-->



		  
	  
</div>
<!-- end header -->



<!-- WooCommerce Menu -->	
<div id="woocommerce-layout-menu">
	<?php if ( has_nav_menu( 'primary' ) || has_nav_menu( 'social' ) ) : ?>				
		<div id="toggle-container"><button id="menu-toggle" class="menu-toggle"><?php esc_html_e( 'Menu', 'one-page-business' ); ?></button></div>

		<div id="site-header-menu" class="site-header-menu">
			<?php if ( has_nav_menu( 'primary' ) ) : ?>
				<nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Primary Menu', 'one-page-business' ); ?>">
					<div id="sticky-nav-container">
					<?php
						if(is_home() ||  is_front_page()) { 
						wp_nav_menu(
							array(
								'theme_location' => 'primary',
								'menu_class' => 'primary-menu',
							)
						);
						} else {
						wp_nav_menu(
							array(
								'theme_location' => 'primary',
								'menu_class' => 'primary-menu',
								'items_wrap' 		=> 	one_page_business_nav_wrap(),
							)
						);
						
						}
					?>
					</div>
				</nav><!-- .main-navigation -->
			<?php endif; ?>
		</div><!-- .site-header-menu -->
	<?php endif; ?>
	
	
</div> <!--end outer div -->
