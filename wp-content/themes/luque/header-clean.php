<!DOCTYPE html>
    <html id="goup" class="no-js" <?php language_attributes();?>>
        <head>
            <meta http-equiv="content-type" content="<?php bloginfo( 'html_type' ); ?>" charset="<?php bloginfo( 'charset' ); ?>" />
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="profile" href="http://gmpg.org/xfn/11">
            <?php wp_head(); ?>
        </head>
        <body <?php body_class(); ?>>
            <?php
            if ( function_exists( 'wp_body_open' ) ) {
                wp_body_open();
            }
            ?>
            <a class="skip-link" href="#site-content"><?php _e( 'Skip to the content', 'luque' ); ?></a>
            <header>
                <div class="grid clearfix">
                    <div class="col-30">   
                        <div class="site-branding-text logo">
                            <?php the_custom_logo(); ?>
                        </div><!--.site-branding-text-->
                    </div><!--.col-30-->
                    <div class="col-70 header-clean">
                        <div class="header-titles-wrapper">
                            <button class="toggle nav-toggle mobile-nav-toggle" data-toggle-target=".menu-modal"  data-toggle-body-class="showing-menu-modal" aria-expanded="false" data-set-focus=".close-nav-toggle">
                                <span class="toggle-inner">
                                    <span class="toggle-text"><?php _e( '&#9776;', 'luque' ); ?></span>
                                </span>
                            </button><!-- .nav-toggle -->
                        </div><!-- .header-titles-wrapper -->
                        <div class="header-navigation-wrapper-clean">   
                                <ul>
                                    <?php wp_nav_menu( array( 
                                    'theme_location' => 'social',
                                    ));
                                    ?>
                                </ul>
                            </div><!-- .header-navigation-wrapper-clean -->
                    </div><!--.col-70 .header--> 
                </div><!--.grid-->
            </header>
            <?php
                // Output the menu modal.
                get_template_part( 'parts/modal-menu' );
                ?>
            <div class="main" id="site-content">