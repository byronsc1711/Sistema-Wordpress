<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Anecdote Lite
 */

$anecdote_lite_default = anecdote_lite_get_default_theme_options();
$enable_social_link = get_theme_mod('enable_social_link', $anecdote_lite_default['enable_social_link']);
?>


<div class="site-wrapper">
    <div class="site-header-area site-header-top">
        <div class="site-header-components header-components-left">
            <div class="header-component-item">
                <div class="site-branding">

                    <?php
                    if (function_exists('has_custom_logo') && has_custom_logo()) { ?>
                        <div class="site-logo" itemscope itemtype="https://schema.org/Organization">
                            <?php the_custom_logo(); ?>
                        </div>
                    <?php }

                    if (is_front_page() && is_home()) :
                        ?>
                        <h1 itemprop="name" class="site-title"><a itemprop="url"
                                                                  href="<?php echo esc_url(home_url('/')); ?>"
                                                                  rel="home"><?php bloginfo('name'); ?></a></h1>
                    <?php
                    else :
                        ?>
                        <p itemprop="name" class="site-title"><a itemprop="url"
                                                                 href="<?php echo esc_url(home_url('/')); ?>"
                                                                 rel="home"><?php bloginfo('name'); ?></a></p>
                    <?php
                    endif;
                    $anecdote_lite_description = get_bloginfo('description', 'display');
                    if ($anecdote_lite_description || is_customize_preview()) :
                        ?>
                        <p itemprop="description" class="site-description">
                            <span><?php echo $anecdote_lite_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
                                ?></span>
                        </p>
                    <?php endif; ?>

                </div><!-- .site-branding -->
            </div>



        </div>


        <div class="site-header-components header-components-right">



            <div class="header-component-item  header-wedevs-social hidden-sm-screen">
                <?php if ($enable_social_link) { ?>
                    <?php anecdote_lite_social_icon(); ?>
                <?php } ?>
            </div>


            <?php
            // Check whether the header search is activated in the customizer.
            $enable_header_search = get_theme_mod('enable_header_search', $anecdote_lite_default['enable_header_search']);

            if ($enable_header_search) { ?>
                <div class="header-component-item header-wedevs-search">
                    <button class="toggle search-toggle mobile-search-toggle" data-toggle-target=".search-modal"
                            data-toggle-body-class="showing-search-modal" data-set-focus=".search-modal .search-field"
                            aria-expanded="false">
                        <?php anecdote_lite_get_theme_svg('search'); ?>
                    </button>
                </div>
            <?php } ?>

            <?php
            if (class_exists('WooCommerce')) { ?>
            <div class="header-component-item header-wedevs-minicart">
                <?php ecommerce_prime_woocommerce_header_cart(); ?>
            </div>
            <?php } ?>

            <div class="header-component-item header-wedevs-menu">
                <button class="toggle nav-toggle mobile-nav-toggle" data-toggle-target=".menu-modal" data-toggle-body-class="showing-menu-modal" aria-expanded="false" data-set-focus=".close-nav-toggle">
                    <?php anecdote_lite_get_theme_svg('menu'); ?>
                </button>
            </div>
        </div>

    </div>

    <div class="site-header-area site-header-bottom hidden-sm-screen">
        <div class="site-header-components header-components-right">
            <div class="header-component-item">
                <nav class="primary-menu-wrapper"
                     aria-label="<?php esc_attr_e('Horizontal', 'anecdote-lite'); ?>" role="navigation" itemscope
                     itemtype="https://schema.org/SiteNavigationElement">
                    <ul class="primary-menu reset-list-style">

                        <?php
                        if (has_nav_menu('anecdote-lite-primary-menu')) {

                            wp_nav_menu(
                                array(
                                    'container' => '',
                                    'items_wrap' => '%3$s',
                                    'theme_location' => 'anecdote-lite-primary-menu',
                                )
                            );

                        } else {

                            wp_list_pages(
                                array(
                                    'match_menu_classes' => true,
                                    'show_sub_menu_icons' => true,
                                    'title_li' => false,
                                    'walker' => new Anecdote_Lite_Walker_Page(),
                                )
                            );

                        } ?>

                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>