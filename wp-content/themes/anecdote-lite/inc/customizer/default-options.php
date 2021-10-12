<?php
/**
 * Default Values
 *
 * @package Anecdote Lite
 */

if( !function_exists('anecdote_lite_get_default_theme_options') ):

    /**
     * Get default theme options
     *
     * @return array Default theme options.
     * @since 1.0.0
     *
    */

    function anecdote_lite_get_default_theme_options(){

        $anecdote_lite_defaults = array();

        $anecdote_lite_defaults['anecdote_lite_social_icon_4'] = json_encode( array(
            array(
                'social_svg_icon'     => anecdote_lite_get_theme_svg( 'facebook',true ),
                'social_link'     => '#',
                'label'     => esc_html__('Facebook','anecdote-lite'),
            ),
            array(
                'social_svg_icon'     => anecdote_lite_get_theme_svg( 'twitter',true ),
                'social_link'     => '#',
                'label'     => esc_html__('Twitter','anecdote-lite'),
            ),
            array(
                'social_svg_icon'     => anecdote_lite_get_theme_svg( 'instagram',true ),
                'social_link'     => '#',
                'label'     => esc_html__('Instagram','anecdote-lite'),
            ),
        ) );

        $anecdote_lite_defaults['header_text']                               = esc_html__('Hello World!','anecdote-lite');
        $anecdote_lite_defaults['header_button_label']                       = esc_html__('Learn more','anecdote-lite');

        $anecdote_lite_defaults['anecdote_lite_pagination_layout']                  = 'numeric';
        $anecdote_lite_defaults['global_sidebar_layout']             = 'right-sidebar';
        $anecdote_lite_defaults['single_sidebar_layout']             = 'right-sidebar';
        $anecdote_lite_defaults['archive_sidebar_layout']             = 'right-sidebar';
        $anecdote_lite_defaults['enable_recommended_posts']             = 1;
        $anecdote_lite_defaults['enable_facebook']             = 1;
        $anecdote_lite_defaults['enable_twitter']             = 1;
        $anecdote_lite_defaults['enable_pinterest']             = 1;
        $anecdote_lite_defaults['enable_linkedin']             = 1;
        $anecdote_lite_defaults['enable_email']             = 1;
        $anecdote_lite_defaults['enable_author_box']             = 1;
        $anecdote_lite_defaults['logo_width']             = '290';
        $anecdote_lite_defaults['enable_single_related_post']             = 1;
        $anecdote_lite_defaults['enable_subscribe']             = 0;
        $anecdote_lite_defaults['related_post_title']             = esc_html__('Related Posts','anecdote-lite');
        $anecdote_lite_defaults['subscribe_section_title']             = esc_html__('Newsletter Subscription Us','anecdote-lite');
        $anecdote_lite_defaults['subscribe_section_desc']             = esc_html__("Newsletter Subscription Us and we'll keep you updated with news and information",'anecdote-lite');

        $anecdote_lite_defaults['enable_header_overlay']             = 1;
        $anecdote_lite_defaults['enable_header_search']             = 1;
        $anecdote_lite_defaults['enable_social_link']             = 1;
        $anecdote_lite_defaults['enable_popup_newsletter']             = 1;
        $anecdote_lite_defaults['popup_newsletter_description']             = esc_html__("Newsletter Subscription Us and we'll keep you updated with news and information",'anecdote-lite');
        $anecdote_lite_defaults['popup_newsletter_title']             = esc_html__('Newsletter Subscription Us','anecdote-lite');
        $anecdote_lite_defaults['404_page_image']             = get_template_directory_uri() . '/assets/images/404-image.jpg';
        $anecdote_lite_defaults['enable_404_recommended_posts'] = 1;
        $anecdote_lite_defaults['ed_popup_model_box'] = 0;
        $anecdote_lite_defaults['ed_popup_model_box_home_only'] = 0;
        $anecdote_lite_defaults['ed_popup_model_box_first_loading_only'] = 0;
        $anecdote_lite_defaults['wedev_popup_title'] = esc_html__('Sign Up to Our Newsletter', 'anecdote-lite');
        $anecdote_lite_defaults['wedev_popup_desc'] = esc_html__('Get notified about exclusive offers every week!', 'anecdote-lite');
        $anecdote_lite_defaults['enable_404_recommended_posts_title'] = esc_html__('Recommended Posts', 'anecdote-lite');
        $anecdote_lite_defaults['archive_recommended_posts_title'] = esc_html__('More like this', 'anecdote-lite');
        $anecdote_lite_defaults['enable_header_banner'] = 1;
        $anecdote_lite_defaults['enable_header_featured_category'] = 0;

        // Typography.
        $anecdote_lite_defaults['wedev_tagline_font'] = 'Inter';
        $anecdote_lite_defaults['wedev_tagline_font_weight'] = '900';
        $anecdote_lite_defaults['anecdote_lite_tagline_font_size'] = '34';

        $anecdote_lite_defaults['wedev_general_font'] = 'Inter';
        $anecdote_lite_defaults['wedev_general_font_weight'] = 'regular';
        $anecdote_lite_defaults['anecdote_lite_general_font_size'] = '16';

        $anecdote_lite_defaults['wedev_heading_font'] = 'Barlow Condensed';
        $anecdote_lite_defaults['wedev_heading_font_case'] = 'none';

        $anecdote_lite_defaults['anecdote_lite_h1_font_size'] = '54';
        $anecdote_lite_defaults['anecdote_lite_h2_font_size'] = '42';
        $anecdote_lite_defaults['anecdote_lite_h3_font_size'] = '34';
        $anecdote_lite_defaults['anecdote_lite_h4_font_size'] = '28';
        $anecdote_lite_defaults['anecdote_lite_h5_font_size'] = '24';
        $anecdote_lite_defaults['anecdote_lite_h6_font_size'] = '20';
        $anecdote_lite_defaults['anecdote_lite_h1_font_weight'] = 'regular';
        $anecdote_lite_defaults['anecdote_lite_h2_font_weight'] = 'regular';
        $anecdote_lite_defaults['anecdote_lite_h3_font_weight'] = 'regular';
        $anecdote_lite_defaults['anecdote_lite_h4_font_weight'] = 'regular';
        $anecdote_lite_defaults['anecdote_lite_h5_font_weight'] = 'regular';
        $anecdote_lite_defaults['anecdote_lite_h6_font_weight'] = 'regular';
        $anecdote_lite_defaults['anecdote_lite_tagline_font_case'] = 'none';

        $anecdote_lite_defaults['home_section_order_7'] = array('featured-category','latest-posts' );

        $anecdote_lite_defaults['enable_header_featured_category_column'] = 4;
        
        // Pass through filter.
        $anecdote_lite_defaults = apply_filters('anecdote_lite_filter_default_theme_options', $anecdote_lite_defaults);

        return $anecdote_lite_defaults;

    }

endif;
