<?php
/**
 * Custom Functions
 *
 * @package Anecdote Lite
 */

if (!function_exists('anecdote_lite_sanitize_sidebar_option_meta')) :

    // Sidebar Option Sanitize.
    function anecdote_lite_sanitize_sidebar_option_meta($input)
    {
        $metabox_options = array('left-sidebar', 'right-sidebar', 'no-sidebar');
        if (in_array($input, $metabox_options)) {

            return $input;

        } else {

            return '';

        }
    }

endif;


if (!function_exists('anecdote_lite_get_theme_svg')):

    /**
     * Get information about the SVG icon.
     *
     * @param string $svg_name The name of the icon.
     * @param string $group The group the icon belongs to.
     * @param string $color Color code.
     */
    function anecdote_lite_get_theme_svg($svg_name, $return = false)
    {

        // Make sure that only our allowed tags and attributes are included.
        $svg = anecdote_lite_svg_escape(Anecdote_Lite_SVG_Icons::get_svg($svg_name));

        if (!$svg) {
            return false;
        }

        if ($return) {

            return $svg;

        } else {

            echo $svg;

        }

        return false;

    }

endif;

if (!function_exists('anecdote_lite_svg_escape')):

    /**
     * Get information about the SVG icon.
     *
     * @param string $svg_name The name of the icon.
     * @param string $group The group the icon belongs to.
     * @param string $color Color code.
     */
    function anecdote_lite_svg_escape($input)
    {

        // Make sure that only our allowed tags and attributes are included.
        $svg = wp_kses(
            $input,
            array(
                'svg' => array(
                    'class' => true,
                    'xmlns' => true,
                    'width' => true,
                    'height' => true,
                    'viewbox' => true,
                    'aria-hidden' => true,
                    'role' => true,
                    'focusable' => true,
                ),
                'path' => array(
                    'fill' => true,
                    'fill-rule' => true,
                    'd' => true,
                    'transform' => true,
                ),
                'polygon' => array(
                    'fill' => true,
                    'fill-rule' => true,
                    'points' => true,
                    'transform' => true,
                    'focusable' => true,
                ),
            )
        );

        if (!$svg) {
            return false;
        }

        return $svg;

    }

endif;

if (!function_exists('anecdote_lite_toggle_duration')):

    /**
     * Miscellaneous
     */

    /**
     * Toggles animation duration in milliseconds.
     *
     * @return int Duration in milliseconds
     */
    function anecdote_lite_toggle_duration()
    {
        /**
         * Filters the animation duration/speed used usually for submenu toggles.
         *
         * @param int $duration Duration in milliseconds.
         * @since Twenty Twenty 1.0
         *
         */
        $duration = apply_filters('anecdote_lite_toggle_duration', 250);

        return $duration;
    }

endif;

if (!function_exists('anecdote_lite_add_sub_toggles_to_main_menu')):

    /**
     * Adds a Sub Nav Toggle to the Expanded Menu and Mobile Menu.
     *
     * @param stdClass $args An object of wp_nav_menu() arguments.
     * @param WP_Post $item Menu item data object.
     * @param int $depth Depth of menu item. Used for padding.
     * @return stdClass An object of wp_nav_menu() arguments.
     */
    function anecdote_lite_add_sub_toggles_to_main_menu($args, $item, $depth)
    {

        // Add sub menu toggles to the Expanded Menu with toggles.
        if (isset($args->show_toggles) && $args->show_toggles) {

            // Wrap the menu item link contents in a div, used for positioning.
            $args->before = '<div class="ancestor-wrapper">';
            $args->after = '';

            // Add a toggle to items with children.
            if (in_array('menu-item-has-children', $item->classes, true)) {

                $toggle_target_string = '.menu-modal .menu-item-' . $item->ID . ' > .sub-menu';
                $toggle_duration = anecdote_lite_toggle_duration();

                // Add the sub menu toggle.
                $args->after .= '<button class="toggle sub-menu-toggle fill-children-current-color" data-toggle-target="' . $toggle_target_string . '" data-toggle-type="slidetoggle" data-toggle-duration="' . absint($toggle_duration) . '" aria-expanded="false"><span class="screen-reader-text">' . __('Show sub menu', 'anecdote-lite') . '</span>' . anecdote_lite_get_theme_svg('chevron-down', true) . '</button>';

            }

            // Close the wrapper.
            $args->after .= '</div><!-- .ancestor-wrapper -->';

            // Add sub menu icons to the primary menu without toggles.
        } elseif ('anecdote-lite-primary-menu' === $args->theme_location) {
            if (in_array('menu-item-has-children', $item->classes, true)) {
                $args->after = '<span class="icon"></span>';
            } else {
                $args->after = '';
            }
        }

        return $args;

    }

endif;

add_filter('nav_menu_item_args', 'anecdote_lite_add_sub_toggles_to_main_menu', 10, 3);

if (!function_exists('anecdote_lite_sidebar_options')):

    /**
     * Sidebars Options
     **/

    function anecdote_lite_sidebar_options($global = true)
    {

        $sidebars = array();
        $sidebars['right-sidebar'] = esc_html__('Right Sidebar', 'anecdote-lite');
        $sidebars['left-sidebar'] = esc_html__('Left Sidebar', 'anecdote-lite');
        $sidebars['no-sidebar'] = esc_html__('No Sidebar', 'anecdote-lite');

        return $sidebars;

    }

endif;

if (!function_exists('anecdote_lite_post_category_list')) :

    // Post Category List Array.
    function anecdote_lite_post_category_list()
    {

        $post_cat = get_categories(
            array(
                'hide_empty' => '0',
                'exclude' => '1',
            )
        );

        $post_categories = array();
        $post_categories[''] = esc_html__('Select Category', 'anecdote-lite');

        foreach ($post_cat as $post_cat) {

            $post_categories[$post_cat->slug] = $post_cat->name;

        }

        return $post_categories;
    }

endif;

if (!function_exists('anecdote_lite_social_share')):

    /**
     * Social Share
     **/

    function anecdote_lite_social_share()
    {

        $anecdote_lite_default = anecdote_lite_get_default_theme_options();
        $enable_facebook = get_theme_mod('enable_facebook', $anecdote_lite_default['enable_facebook']);
        $enable_twitter = get_theme_mod('enable_twitter', $anecdote_lite_default['enable_twitter']);
        $enable_pinterest = get_theme_mod('enable_pinterest', $anecdote_lite_default['enable_pinterest']);
        $enable_linkedin = get_theme_mod('enable_linkedin', $anecdote_lite_default['enable_linkedin']);
        $enable_email = get_theme_mod('enable_email', $anecdote_lite_default['enable_email']);

        if ($enable_facebook || $enable_twitter || $enable_pinterest || $enable_linkedin || $enable_email) {

            $permalink = urlencode(get_the_permalink());
            $post_title = html_entity_decode(get_the_title(), ENT_COMPAT, 'UTF-8');
            $media_url = urlencode(get_the_post_thumbnail_url(get_the_ID(), 'full')); ?>

            <div class="wedevs-social-share-inner">

                <?php if ($enable_facebook) { ?>
                    <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo esc_attr($permalink); ?>"
                       target="popup" class="wedevs-social-share-icon wedevs-share-icon-facebook"
                       onclick="window.open(this.href,'<?php echo esc_html__('Facebook', 'anecdote-lite'); ?>','width=600,height=400')">
                        <span><?php anecdote_lite_get_theme_svg('facebook'); ?></span>
                    </a>
                <?php } ?>

                <?php if ($enable_twitter) {

                    $twitter_id = get_theme_mod('twitter_id'); ?>
                    <a href="https://twitter.com/intent/tweet?text=<?php echo esc_html($post_title); ?>&amp;url=<?php echo esc_attr($permalink); ?>&amp;via=<?php echo esc_html($twitter_id); ?>"
                       target="popup" class="wedevs-social-share-icon wedevs-share-icon-twitter"
                       onclick="window.open(this.href,'<?php echo esc_html__('Twitter', 'anecdote-lite'); ?>','width=600,height=400')">
                        <span><?php anecdote_lite_get_theme_svg('twitter'); ?></span>
                    </a>
                <?php } ?>

                <?php if ($enable_pinterest) { ?>
                    <a href="http://pinterest.com/pin/create/button/?url=<?php echo esc_attr($permalink); ?>&amp;media=<?php echo $media_url; ?>&amp;description=<?php echo esc_html($post_title); ?>"
                       target="popup" class="wedevs-social-share-icon wedevs-share-icon-pinterest"
                       onclick="window.open(this.href,'<?php echo esc_html__('Pinterest', 'anecdote-lite'); ?>','width=600,height=400')">
                        <span><?php anecdote_lite_get_theme_svg('pinterest'); ?></span>
                    </a>
                <?php } ?>

                <?php if ($enable_linkedin) { ?>
                    <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo esc_attr($permalink); ?>&title=<?php echo esc_html($post_title); ?>"
                       target="popup" class="wedevs-social-share-icon wedevs-share-icon-linkedin"
                       onclick="window.open(this.href,'<?php echo esc_html__('LinkedIn', 'anecdote-lite'); ?>','width=600,height=400')">
                        <span><?php anecdote_lite_get_theme_svg('linkedin'); ?></span>
                    </a>
                <?php } ?>

                <?php if ($enable_email) { ?>
                    <a href="mailto:?subject=<?php echo esc_html($post_title); ?>&body=<?php echo esc_html($post_title) . " " . esc_attr($permalink); ?>"
                       target="_blank" class="wedevs-social-share-icon wedevs-share-icon-email">
                        <span><?php anecdote_lite_get_theme_svg('mail'); ?></span>
                    </a>
                <?php } ?>

            </div>
            <span class="wedevs-social-share-label"><?php esc_html_e('Share', 'anecdote-lite'); ?></span>
            <?php
        }

    }

endif;

if (!function_exists('anecdote_lite_author_box')):
    function anecdote_lite_author_box()
    {
        $author_img = get_avatar(get_the_author_meta('ID'), 300, '', '', array('class' => 'avatar-img'));
        $author_name = esc_html(get_the_author_meta('display_name'));
        $author_user_url = esc_url(get_the_author_meta('user_url'));
        $author_description = esc_html(get_the_author_meta('description'));
        $author_email = esc_html(get_the_author_meta('user_email'));
        $author_post_url = esc_url(get_author_posts_url(get_the_author_meta('ID')));
        $user_data = get_userdata(get_the_author_meta('ID'));
        $user_role = $user_data->roles[0]; ?>

        <div class="wedevs-author-bio">
            <div class="wedevs-author-image">
                <?php echo wp_kses_post($author_img); ?>
            </div>

            <div class="wedevs-author-info">
                <div class="wedevs-author-description">
                    <h4 class="wedevs-author-title">
                        <a href="<?php echo esc_url($author_post_url); ?>">
                            <span><?php esc_html_e('About', 'anecdote-lite'); ?></span>
                            <span><?php echo esc_html($author_name); ?></span>
                        </a>
                    </h4>

                    <?php if ($user_role) { ?>
                        <div class="wedevs-author-role">
                            <?php echo esc_html($user_role); ?>
                        </div>
                    <?php } ?>

                    <?php if ($author_description) { ?>
                        <div class="wedevs-author-excerpt">
                            <?php echo esc_html($author_description); ?>
                        </div>
                    <?php } ?>

                </div>
                <div class="wedevs-author-social">
                    <ul class="wedevs-author-social-list reset-list-style">
                        <?php if ($author_user_url) { ?>
                            <li class="wedevs-author-social-brand wedevs-author-social-url">
                                <a href="<?php echo esc_url($author_user_url); ?>" target="_blank">
                                    <?php anecdote_lite_get_theme_svg('sphere'); ?>
                                </a>
                            </li>
                        <?php } ?>
                        <?php if ($author_email) { ?>
                            <li class="wedevs-author-social-brand wedevs-author-social-email">
                                <a href="mailto: <?php echo esc_html($author_email); ?>">
                                    <?php anecdote_lite_get_theme_svg('mail'); ?>
                                </a>
                            </li>
                        <?php } ?>
                    </ul>
                </div>

            </div>
            <div class="clear"></div>
        </div>

        <?php
    }
endif;

if (!function_exists('anecdote_lite_related_posts')):

    // Single Posts Related Posts.
    function anecdote_lite_related_posts($category = false, $title = false)
    {

        global $post;
        $anecdote_lite_default = anecdote_lite_get_default_theme_options();
        $enable_single_related_post = absint(get_theme_mod('enable_single_related_post', $anecdote_lite_default['enable_single_related_post']));

        if (is_404() || ($enable_single_related_post && is_single() && 'post' === get_post_type())) {

            if (is_404()) {

                $array = array(
                    'post_type' => 'post',
                    'posts_per_page' => 10,
                );

                if ($category) {
                    $array['category_name'] = $category;
                }

                $related_posts_query = new WP_Query($array);

            } else {

                $current_category = get_the_category($post->ID);
                $category_array = array();
                if ($current_category) {
                    foreach ($current_category as $category) {
                        $category_array[] = $category->term_id;
                    }
                }

                $related_posts_query = new WP_Query(
                    array(
                        'post_type' => 'post',
                        'posts_per_page' => 10,
                        'post__not_in' => array($post->ID),
                        'category__in' => $category_array
                    )
                );

            }

            $rtl = '';
            if (is_rtl()) {
                $rtl = 'dir="rtl"';
            }

            if ($related_posts_query->have_posts()): ?>

                <div class="wedevs-block wedevs-related-articles">
                    <div class="site-wrapper">
                        <?php $related_post_title = esc_html(get_theme_mod('related_post_title', $anecdote_lite_default['related_post_title']));
                        if (!is_404() && $related_post_title) { ?>

                            <div class="wedevs-block-heading wedevs-related-heading">
                                <h2 class="wedevs-block-title">
                                    <span><?php echo esc_html($related_post_title); ?></span>
                                </h2>
                            </div>

                        <?php }

                        if (is_404() && $title) { ?>

                            <div class="wedevs-block-heading wedevs-related-heading">
                                <h2 class="wedevs-block-title">
                                    <span><?php echo esc_html($related_post_title); ?></span>
                                </h2>
                            </div>

                        <?php } ?>

                        <div class="wedevs-block-content wedevs-related-content">
                            <div class="site-row">
                                <div class="swiper-container wedevs-swiper-container wedevs-related-carousel" <?php echo $rtl; ?>>
                                    <div class="swiper-wrapper">
                                        <?php
                                        while ($related_posts_query->have_posts()):
                                            $related_posts_query->the_post(); ?>

                                            <div class="swiper-slide site-column site-column-4 site-column-sm-12">

                                                <article
                                                        id="related-post-<?php the_ID(); ?>" <?php post_class('wedevs-post related-post'); ?>>
                                                    <?php
                                                    if (has_post_thumbnail()): ?>
                                                        <div class="entry-thumbnail">
                                                            <?php anecdote_lite_post_thumbnail($size = 'medium_large', $else = false); ?>
                                                        </div>
                                                    <?php endif; ?>

                                                    <div class="entry-details">
                                                        <div class="entry-meta">
                                                            <?php anecdote_lite_entry_cat(); ?>
                                                        </div>

                                                        <header class="entry-header">
                                                            <h3 class="entry-title entry-title-medium">
                                                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                                            </h3>
                                                        </header>

                                                        <div class="entry-content">
                                                            <div class="entry-meta">
                                                                <?php anecdote_lite_posted_on(); ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </article>

                                            </div>

                                        <?php endwhile; ?>
                                    </div>

                                    <div class="swiper-nav">
                                        <div class="swiper-nav-control">
                                            <div class="wedevs-related-prev"><?php anecdote_lite_get_theme_svg('chevron-left') ?></div>
                                            <div class="swiper-pagination swiper-pagination-carousel"></div>
                                            <div class="wedevs-related-next"><?php anecdote_lite_get_theme_svg('chevron-right') ?></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <?php
                wp_reset_postdata();
            endif;

        }

    }

endif;

if (!function_exists('anecdote_lite_social_icon')):

    /**
     * Social Icon
     **/

    function anecdote_lite_social_icon($layout = 'layout-1', $social_label = false)
    {


        $anecdote_lite_default = anecdote_lite_get_default_theme_options();
        $anecdote_lite_social_icon_4 = get_theme_mod('anecdote_lite_social_icon_4', $anecdote_lite_default['anecdote_lite_social_icon_4']);

        if ($anecdote_lite_social_icon_4) {
            $anecdote_lite_social_icon_4 = json_decode($anecdote_lite_social_icon_4); ?>

             <div class="wedevs-social-icon icon-<?php echo esc_attr($layout); ?>">

                <?php if ($anecdote_lite_social_icon_4) {

                    foreach ($anecdote_lite_social_icon_4 as $anecdote_lite_social_icon) {

                        $icon = isset($anecdote_lite_social_icon->social_svg_icon) ? $anecdote_lite_social_icon->social_svg_icon : '';
                        $social_link = isset($anecdote_lite_social_icon->social_link) ? $anecdote_lite_social_icon->social_link : '';
                        $label = isset($anecdote_lite_social_icon->label) ? $anecdote_lite_social_icon->label : '';
                        $label_small = strtolower($label); ?>
                        <a target="_blank" href="<?php echo esc_url($social_link); ?>"
                           class="wedevs-icon-holder wedevs-social-<?php echo esc_html($label_small); ?>">
                            <?php echo anecdote_lite_svg_escape($icon); ?>
                            <?php if ($social_label) { ?><span><?php echo esc_html($label); ?></span><?php } ?>
                        </a>
                        <?php
                    }

                } ?>

            </div>

            <?php
        }
    }

endif;


if (!function_exists('anecdote_lite_sidebar')):

    /**
     * SIdebar Classes
     **/

    function anecdote_lite_sidebar($block = 'primary')
    {

        $anecdote_lite_default = anecdote_lite_get_default_theme_options();

        global $post;

        $global_sidebar_layout = get_theme_mod('global_sidebar_layout', $anecdote_lite_default['global_sidebar_layout']);
        $single_sidebar_layout = get_theme_mod('single_sidebar_layout', $anecdote_lite_default['single_sidebar_layout']);
        
        if (!is_active_sidebar('sidebar-1') || is_404()) {

            $sidebar = 'no-sidebar';

        } elseif ((is_single()) || is_page()) {

            $anecdote_lite_post_sidebar_option = get_post_meta($post->ID, 'anecdote_lite_post_sidebar_option', true);
            if ($anecdote_lite_post_sidebar_option == '') {
                $sidebar = esc_attr($single_sidebar_layout);
            } else {
                $sidebar = $anecdote_lite_post_sidebar_option;
            }

        } elseif (is_archive() || is_search()) {

            $archive_sidebar_layout = get_theme_mod('archive_sidebar_layout', $anecdote_lite_default['archive_sidebar_layout']);
            if ($archive_sidebar_layout == '') {
                $sidebar = esc_attr($global_sidebar_layout);
            } else {
                $sidebar = $archive_sidebar_layout;
            }

        } else {

            $sidebar = $global_sidebar_layout;

        }

        $content_column_class = '';
        if ($block == 'primary') {

            $content_column_class = 'site-column-12 site-column-miniwrap';
            if ($sidebar == 'right-sidebar') {
                $content_column_class = 'column-order-1 site-column-9';
            } elseif ($sidebar == 'left-sidebar') {
                $content_column_class = 'column-order-2 site-column-9';
            }

        }

        if ($block == 'sidebar') {

            if ($sidebar == 'right-sidebar') {
                $content_column_class = 'column-order-2 site-column-3';
            } elseif ($sidebar == 'left-sidebar') {
                $content_column_class = 'column-order-1 site-column-3';
            }

        }

        return $content_column_class;

    }

endif;

if (!function_exists('anecdote_lite_single_navigation')) :

    /**
     * Single Post Navigation
     */
    function anecdote_lite_single_navigation()
    {


        $next_post = get_next_post();
        $prev_post = get_previous_post(); ?>

        <nav class="post-navigation pagination" role="navigation">

            <h2 class="screen-reader-text"><?php esc_html_e('Post Navigation', 'anecdote-lite'); ?></h2>

            <div class="nav-links">

                <?php if ($prev_post) { ?>

                    <div class="nav-previous">

                        <a href="<?php echo esc_url(get_permalink($prev_post->ID)); ?>" rel="prev">
                            <article
                                    id="pagination-post-<?php the_ID(); ?>" <?php post_class('wedevs-post pagination-post'); ?>>

                                <?php
                                $post_thumb_id = get_post_thumbnail_id($prev_post->ID, 'thumbnail');
                                if ($post_thumb_id) { ?>

                                    <div class="entry-thumbnail">
                                        <?php
                                        $prev_thumbnail = wp_get_attachment_image($post_thumb_id, 'thumbnail');
                                        if ($prev_thumbnail) {
                                            echo wp_kses_post($prev_thumbnail);
                                        } ?>
                                    </div>

                                <?php } ?>

                                <div class="meta-nav"><?php esc_html_e('Previous Post', 'anecdote-lite'); ?></div>

                                <header class="entry-header">
                                    <h3 class="entry-title entry-title-small entry-title-primary"><?php echo esc_html(get_the_title($prev_post->ID)); ?></h3>
                                </header>

                            </article>


                        </a>
                    </div>

                <?php } ?>

                <?php if ($next_post) { ?>

                    <div class="nav-next">
                        <a href="<?php echo esc_url(get_permalink($next_post->ID)); ?>" rel="next">

                            <article
                                    id="pagination-post-<?php the_ID(); ?>" <?php post_class('wedevs-post pagination-post'); ?>>

                                <?php
                                $post_thumb_id = get_post_thumbnail_id($next_post->ID, 'thumbnail');
                                if ($post_thumb_id) { ?>

                                    <div class="entry-thumbnail">
                                        <?php
                                        $prev_thumbnail = wp_get_attachment_image($post_thumb_id, 'thumbnail');
                                        if ($prev_thumbnail) {
                                            echo wp_kses_post($prev_thumbnail);
                                        } ?>
                                    </div>

                                <?php } ?>

                                <div class="meta-nav"><?php esc_html_e('Next Post', 'anecdote-lite'); ?></div>

                                <header class="entry-header">
                                    <h3 class="entry-title entry-title-small entry-title-primary"><?php echo esc_html(get_the_title($next_post->ID)); ?></h3>
                                </header>
                            </article>


                        </a>
                    </div>

                <?php } ?>

            </div>

        </nav>

        <?php
    }

endif;

if (!function_exists('anecdote_lite_unique_id')) :

    /**
     * Gets unique ID.
     *
     * This is a PHP implementation of Underscore's uniqueId method. A static variable
     * contains an integer that is incremented with each call. This number is returned
     * with the optional prefix. As such the returned value is not universally unique,
     * but it is unique across the life of the PHP process.
     *
     * @param string $prefix Prefix for the returned ID.
     * @return string Unique ID.
     * @see wp_unique_id() Themes requiring WordPress 5.0.3 and greater should use this instead.
     *
     */
    function anecdote_lite_unique_id($prefix = '')
    {
        static $id_counter = 0;
        if (function_exists('wp_unique_id')) {
            return wp_unique_id($prefix);
        }
        return $prefix . (string)++$id_counter;
    }

endif;

if (!function_exists('anecdote_lite_archive_recommended_posts')) :

    /**
     * Gets unique ID.
     *
     * This is a PHP implementation of Underscore's uniqueId method. A static variable
     * contains an integer that is incremented with each call. This number is returned
     * with the optional prefix. As such the returned value is not universally unique,
     * but it is unique across the life of the PHP process.
     *
     * @param string $prefix Prefix for the returned ID.
     * @return string Unique ID.
     * @see wp_unique_id() Themes requiring WordPress 5.0.3 and greater should use this instead.
     *
     */
    function anecdote_lite_archive_recommended_posts($prefix = '')
    {

        $post_id = get_the_ID();
        $anecdote_lite_default = anecdote_lite_get_default_theme_options();
        $enable_recommended_posts = absint(get_theme_mod('enable_recommended_posts', $anecdote_lite_default['enable_recommended_posts']));

        if ($enable_recommended_posts && 'post' === get_post_type()) {


            $current_category = get_the_category($post_id);
            $category_array = array();
            if ($current_category) {
                foreach ($current_category as $category) {
                    $category_array[] = $category->term_id;
                }
            }

            $related_posts_query = new WP_Query(
                array(
                    'post_type' => 'post',
                    'posts_per_page' => 4,
                    'post__not_in' => array($post_id),
                    'category__in' => $category_array
                )
            );
            if ($related_posts_query->have_posts()): ?>

                <div class="wedevs-panel wedevs-more-panel">

                    <?php
                    $archive_recommended_posts_title = esc_html(get_theme_mod('archive_recommended_posts_title', $anecdote_lite_default['archive_recommended_posts_title']));

                    if ($archive_recommended_posts_title) { ?>

                        <div class="wedevs-panel-heading wedevs-more-heading">
                            <h4 class="wedevs-panel-title">
                                <span><?php echo esc_html($archive_recommended_posts_title); ?></span>
                            </h4>
                        </div>

                    <?php } ?>

                    <div class="wedevs-panel-content wedevs-more-content">
                        <div class="site-row">
                            <?php
                            while ($related_posts_query->have_posts()):
                                $related_posts_query->the_post(); ?>
                                <div class="site-column site-column-3 site-column-sm-6 site-column-xxs-12">
                                    <article
                                            id="more-post-<?php the_ID(); ?>" <?php post_class('wedevs-post more-post'); ?>>
                                        <?php
                                        if (has_post_thumbnail()): ?>
                                            <div class="entry-thumbnail">
                                                <?php anecdote_lite_post_thumbnail($size = 'medium', $else = false); ?>
                                            </div>
                                        <?php endif; ?>

                                        <header class="entry-header">
                                            <h3 class="entry-title entry-title-regular">
                                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                            </h3>
                                        </header>

                                    </article>
                                </div>
                            <?php endwhile; ?>
                        </div>
                    </div>

                </div>

                <?php
                wp_reset_postdata();
            endif;

        }

    }

endif;

if (!function_exists('anecdote_lite_main_slider')) :

    function anecdote_lite_main_slider()
    {

        $anecdote_lite_default = anecdote_lite_get_default_theme_options();
        $enable_header_banner = get_theme_mod('enable_header_banner', $anecdote_lite_default['enable_header_banner']);
        $anecdote_lite_header_banner_cat = get_theme_mod('anecdote_lite_header_banner_cat');

        if ($enable_header_banner) {

            $rtl = '';
            if (is_rtl()) {
                $rtl = 'dir="rtl"';
            }

            $banner_query = new WP_Query(array('post_type' => 'post', 'posts_per_page' => 4, 'post__not_in' => get_option("sticky_posts"), 'category_name' => esc_html($anecdote_lite_header_banner_cat)));

            if ($banner_query->have_posts()): ?>

                <div class="wedevs-block wedevs-banner-block">
                    <div class="swiper-container wedevs-swiper-container wedevs-banner-slider" <?php echo $rtl; ?>>

                        <div class="swiper-wrapper">

                            <?php
                            while ($banner_query->have_posts()):
                                $banner_query->the_post(); ?>
                                <div class="swiper-slide wedevs-swiper-slide data-bg" data-background="<?php the_post_thumbnail_url('full'); ?>">
                                        <div class="site-wrapper">
                                            <div class="post-content">
                                                <div class="entry-meta">
                                                    <?php anecdote_lite_entry_cat(); ?>
                                                </div>

                                                <header class="entry-header">
                                                    <h2 class="entry-title entry-title-large">
                                                        <a href="<?php the_permalink(); ?>"
                                                           rel="bookmark"><?php the_title(); ?></a>
                                                    </h2>
                                                </header>

                                                <div class="entry-meta entry-meta-center">
                                                    <?php anecdote_lite_posted_by($icon = true); ?>
                                                    <span class="meta-seperator"></span>
                                                    <?php anecdote_lite_posted_on($icon = true); ?>
                                                </div>
                                            </div>
                                                <?php
                                                $anecdote_lite_default = anecdote_lite_get_default_theme_options();
                                                $enable_facebook = get_theme_mod('enable_facebook', $anecdote_lite_default['enable_facebook']);
                                                $enable_twitter = get_theme_mod('enable_twitter', $anecdote_lite_default['enable_twitter']);
                                                $enable_pinterest = get_theme_mod('enable_pinterest', $anecdote_lite_default['enable_pinterest']);
                                                $enable_linkedin = get_theme_mod('enable_linkedin', $anecdote_lite_default['enable_linkedin']);
                                                $enable_email = get_theme_mod('enable_email', $anecdote_lite_default['enable_email']);

                                                if ($enable_facebook || $enable_twitter || $enable_pinterest || $enable_linkedin || $enable_email) {

                                                    $permalink = urlencode(get_the_permalink());
                                                    $post_title = html_entity_decode(get_the_title(), ENT_COMPAT, 'UTF-8');
                                                    $media_url = urlencode(get_the_post_thumbnail_url(get_the_ID(), 'full')); ?>

                                                    <div class="social-media">
                                                        <div class="social-label"><?php esc_html_e('SOCIAL MEDIA', 'anecdote-lite'); ?></div>
                                                        <ul class="reset-list-style">
                                                            <?php if ($enable_facebook) { ?>
                                                                <li>
                                                                    <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo esc_attr($permalink); ?>" target="popup" onclick="window.open(this.href,'<?php echo esc_html__('Facebook', 'anecdote-lite'); ?>','width=600,height=400')">
                                                                        <span><?php anecdote_lite_get_theme_svg('facebook'); ?></span>
                                                                    </a>
                                                                </li>
                                                            <?php } ?>
                                                            <?php if ($enable_twitter) {
                                                                $twitter_id = get_theme_mod('twitter_id'); ?>
                                                                <li>
                                                                    <a href="https://twitter.com/intent/tweet?text=<?php echo esc_html($post_title); ?>&amp;url=<?php echo esc_attr($permalink); ?>&amp;via=<?php echo esc_html($twitter_id); ?>" target="popup" onclick="window.open(this.href,'<?php echo esc_html__('Twitter', 'anecdote-lite'); ?>','width=600,height=400')">
                                                                        <span><?php anecdote_lite_get_theme_svg('twitter'); ?></span>
                                                                    </a>
                                                                </li>
                                                            <?php } ?>
                                                            <?php if ($enable_pinterest) { ?>
                                                                <li>
                                                                    <a href="http://pinterest.com/pin/create/button/?url=<?php echo esc_attr($permalink); ?>&amp;media=<?php echo $media_url; ?>&amp;description=<?php echo esc_html($post_title); ?>" target="popup" onclick="window.open(this.href,'<?php echo esc_html__('Pinterest', 'anecdote-lite'); ?>','width=600,height=400')">
                                                                        <span><?php anecdote_lite_get_theme_svg('pinterest'); ?></span>
                                                                    </a>
                                                                </li>
                                                            <?php } ?>
                                                            <?php if ($enable_linkedin) { ?>
                                                                <li>
                                                                    <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo esc_attr($permalink); ?>&title=<?php echo esc_html($post_title); ?>" target="popup" onclick="window.open(this.href,'<?php echo esc_html__('LinkedIn', 'anecdote-lite'); ?>','width=600,height=400')">
                                                                        <span><?php anecdote_lite_get_theme_svg('linkedin'); ?></span>
                                                                    </a>
                                                                </li>
                                                            <?php } ?>
                                                            <?php if ($enable_email) { ?>
                                                                <li>
                                                                    <a href="mailto:?subject=<?php echo esc_html($post_title); ?>&body=<?php echo esc_html($post_title) . " " . esc_attr($permalink); ?>" target="_blank">
                                                                        <span><?php anecdote_lite_get_theme_svg('mail'); ?></span>
                                                                    </a>
                                                                </li>
                                                            <?php } ?>
                                                        </ul>
                                                    </div>
                                                <?php } ?>
                                        </div>
                                </div>

                            <?php endwhile; ?>

                        </div>

                        <div class="inner-elements">
                            <div class="site-wrapper">
                                <div class="pagination"></div>
                                <!-- end pagination -->
                                <div class="button-prev"><?php esc_html_e('PREV', 'anecdote-lite'); ?></div>
                                <!-- end button-prev -->
                                <div class="button-next"><?php esc_html_e('NEXT', 'anecdote-lite'); ?></div>
                                <!-- end button-next -->

                            </div>


                        </div>

                    </div>
                </div>

                <?php
                wp_reset_postdata();
            endif;
        } elseif (has_custom_header()) { ?>
            <div class="wedevs-block custom-header">
                <?php
                $header_text = get_theme_mod('header_text', $anecdote_lite_default['header_text']);
                $header_button_label = get_theme_mod('header_button_label', $anecdote_lite_default['header_button_label']);
                $header_button_link = get_theme_mod('header_button_link');
                $header_description = get_theme_mod('header_description'); ?>
                <div class="custom-header-media">
                    <?php the_custom_header_markup(); ?>
                </div>
                <?php
                if ($header_text || $header_button_link) { ?>
                    <div class="header-media-content">
                        <div class="site-wrapper">
                            <div class="site-row">
                                <div class="site-column site-column-9">
                                    <div class="header-media-caption">

                                        <?php if ($header_text) { ?>
                                        <header class="entry-header">
                                            <h2 class="entry-title entry-title-large">
                                                <?php echo esc_html($header_text); ?>
                                            </h2>
                                        </header>

                                        <?php } ?>

                                        <?php if ($header_description) { ?>
                                            <div class="entry-content" itemprop="text">
                                                <p>
                                                    <?php echo esc_html($header_description); ?>
                                                </p>
                                            </div>

                                        <?php } ?>

                                        <?php if ($header_button_label) { ?>

                                            <div class="wedevs-continue-reading">
                                                <a href="<?php echo esc_url($header_button_link); ?>" class="wedevs-btn wedevs-btn-primary">
                                                    <?php echo esc_html($header_button_label); ?>
                                                    <span class="wedevs-btn-icon"><?php anecdote_lite_get_theme_svg('chevron-right'); ?></span>
                                                </a>
                                            </div>

                                        <?php } ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>

            </div>
        <?php }

    }

endif;


if (!function_exists('anecdote_lite_icons')) :

    function anecdote_lite_icons()
    {

        return $social_icons_map = array(
            'facebook',
            'twitter',
            'instagram',
            'linkedin',
            'vimeo',
            'vk',
            'pinterest',
            'youtube',
            'whatsapp',
            'amazon',
            'apple',
            'behance',
            'codepen',
            'feed',
            'lastfm',
            'mail',
            'slideshare',
            'pocket',
            'twitch',
            'wp',
            'chain',
            'deviantart',
            'digg',
            'dribbble',
            'dropbox',
            'etsy',
            'foursquare',
            'goodreads',
            'github',
            'reddit',
            'skype',
            'snapchat',
            'soundcloud',
            'spotify',
            'stumbleupon',
            'tumblr',
            'medium',
            'yelp',
            'sphere'

        );

    }

endif;

if (!function_exists('anecdote_lite_archive_banner')) :

    function anecdote_lite_archive_banner()
    {

        $cat_obj = get_queried_object();

        $cat_id = isset($cat_obj->term_id) ? $cat_obj->term_id : '';
        $wedev_term_image = get_term_meta($cat_id, 'wedevs-term-featured-image', true);
        $wedev_term_image = wp_get_attachment_image_url($wedev_term_image, 'full');

        if (empty($wedev_term_image)) {
            $wedev_term_image = get_header_image();
        }
        ?>

        <div class="wedevs-inner-banner <?php if ($wedev_term_image) { ?>data-bg<?php } ?>" <?php if ($wedev_term_image) { ?> data-background="<?php echo esc_url($wedev_term_image); ?>" <?php } ?>>
            <div class="site-wrapper">

                <?php anecdote_lite_breadcrumb(); ?>

                <?php
                the_archive_title('<h1 class="entry-title entry-title-large" itemprop="headline">', '</h1>');
                the_archive_description('<div class="archive-description">', '</div>');
                ?>

            </div>
        </div>

        <?php
    }

endif;


if (!function_exists('anecdote_lite_search_banner')) :

    function anecdote_lite_search_banner()
    {
        $wedev_term_image = get_header_image();
        ?>

        <div class="wedevs-inner-banner <?php if ($wedev_term_image) { ?>data-bg<?php } ?>" <?php if ($wedev_term_image) { ?> data-background="<?php echo esc_url($wedev_term_image); ?>" <?php } ?>>
            <div class="site-wrapper">
                <?php anecdote_lite_breadcrumb(); ?>
                <h1 class="page-title">
                    <?php
                    /* translators: %s: search query. */
                    printf( esc_html__( 'Search Results for: %s', 'anecdote-lite' ), '<span>' . get_search_query() . '</span>' );
                    ?>
                </h1>
            </div>
        </div>

        <?php
    }

endif;



if (!function_exists('anecdote_lite_single_banner')) :

    function anecdote_lite_single_banner()
    {

        $post_image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');
        $post_image = isset($post_image[0]) ? $post_image[0] : '';
        if (empty($post_image)) {
            $post_image = get_header_image();
        }
        ?>

        <div class="wedevs-inner-banner data-bg" data-background="<?php echo esc_url($post_image); ?>">
            <div class="site-wrapper">

                <?php anecdote_lite_breadcrumb();

                if ('post' === get_post_type()) { ?>
                    <div class="entry-meta">
                        <?php
                        anecdote_lite_entry_cat();
                        ?>
                    </div><!-- .entry-meta -->
                <?php } ?>

                <h1 class="entry-title entry-title-large" itemprop="headline">
                    <?php the_title(); ?>
                </h1>
                <?php

                if ('post' === get_post_type()) :
                    ?>
                    <div class="entry-meta">
                        <?php
                        anecdote_lite_posted_on();
                        anecdote_lite_posted_by();
                        ?>
                    </div><!-- .entry-meta -->
                <?php endif; ?>

            </div>
        </div>

        <?php
    }

endif;

if (!function_exists('anecdote_lite_breadcrumb')) :

    function anecdote_lite_breadcrumb($comment = null)
    {

        echo '<div class="entry-breadcrumb">';
        breadcrumb_trail();
        echo '</div>';

    }

endif;


if (!function_exists('anecdote_lite_footer_credit')) :

    function anecdote_lite_footer_credit()
    { ?>

        <div class="footer-copyright">

            <?php
            $footer_copyright_text = wp_kses_post(get_theme_mod('footer_copyright_text'));

            if ($footer_copyright_text) {
                echo esc_html($footer_copyright_text);
            } else {
                echo esc_html__('Copyright ', 'anecdote-lite') . '&copy ' . absint(date('Y')) . ' <a href="' . esc_url(home_url('/')) . '" title="' . esc_attr(get_bloginfo('name', 'display')) . '" ><span>' . esc_html(get_bloginfo('name', 'display')) . '. </span></a> ';

            }

            echo '<br>';
            echo esc_html__('Theme: ', 'anecdote-lite') . 'Anecdote Lite ' . esc_html__('By ', 'anecdote-lite') . '<a href="' . esc_url('https://wedevstudios.com/') . '"  title="' . esc_attr__('WeDevStudios', 'anecdote-lite') . '" target="_blank" rel="author"><span>' . esc_html__('WeDevStudios. ', 'anecdote-lite') . '</span></a>';
            echo esc_html__('Powered by ', 'anecdote-lite') . '<a href="' . esc_url('https://wordpress.org') . '" title="' . esc_attr__('WordPress', 'anecdote-lite') . '" target="_blank"><span>' . esc_html__('WordPress.', 'anecdote-lite') . '</span></a>';

            ?>

        </div>

        <?php
    }

endif;


