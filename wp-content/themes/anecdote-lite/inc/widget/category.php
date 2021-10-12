<?php
/**
 * Category Widgets.
 *
 * @package Anecdote Lite
 */

if ( !function_exists('anecdote_lite_category_widgets') ) :

    function anecdote_lite_category_widgets(){
        
        register_widget('Anecdote_Lite_Sidebar_Category_Widget');

    }

endif;

add_action('widgets_init', 'anecdote_lite_category_widgets');


if ( !class_exists('Anecdote_Lite_Sidebar_Category_Widget') ) :

    // Recent Post widget Form & Display

    class Anecdote_Lite_Sidebar_Category_Widget extends Anecdote_Lite_Widget_Base{

        function __construct(){

            $opts = array(
                'classname' => 'anecdote_lite_category_widget',
                'description' => esc_html__('Displays selected category Image title.', 'anecdote-lite'),
                'customize_selective_refresh' => true,
            );
            
            $category_list = anecdote_lite_post_category_list();

            $fields = array(
                'title' => array(
                    'label' => esc_html__('Title:', 'anecdote-lite'),
                    'type' => 'text',
                    'class' => 'widefat',
                ),
                'post_category_1' => array(
                    'label' => esc_html__('Select Category One:', 'anecdote-lite'),
                    'type' => 'select',
                    'options' => $category_list,
                ),
                'post_category_2' => array(
                    'label' => esc_html__('Select Category Two:', 'anecdote-lite'),
                    'type' => 'select',
                    'options' => $category_list,
                ),
                'post_category_3' => array(
                    'label' => esc_html__('Select Category Three:', 'anecdote-lite'),
                    'type' => 'select',
                    'options' => $category_list,
                ),
                'post_category_4' => array(
                    'label' => esc_html__('Select Category Four:', 'anecdote-lite'),
                    'type' => 'select',
                    'options' => $category_list,
                ),
                'post_category_5' => array(
                    'label' => esc_html__('Select Category Five:', 'anecdote-lite'),
                    'type' => 'select',
                    'options' => $category_list,
                ),
                'post_category_6' => array(
                    'label' => esc_html__('Select Category Six:', 'anecdote-lite'),
                    'type' => 'select',
                    'options' => $category_list,
                ),
                'post_category_7' => array(
                    'label' => esc_html__('Select Category Seven:', 'anecdote-lite'),
                    'type' => 'select',
                    'options' => $category_list,
                ),
            );

            parent::__construct( 'anecdote-lite-category', esc_html__('WeDevs: Sidebar Category Widget', 'anecdote-lite'), $opts, array(), $fields );

        }

        /**
         * Outputs the content for the current widget instance.
         *
         * @since 1.0.0
         *
         * @param array $args Display arguments.
         * @param array $instance Settings for the current widget instance.
         */
        function widget( $args, $instance ){

            $params = $this->get_params( $instance );

            echo $args['before_widget'];

            $title = isset( $params['title'] ) ? $params['title'] : '';

            if( $title ){
                echo $args['before_title'] . esc_html( $title ) . $args['after_title'];
            } ?>
            <div class="site-widget site-widget-categories">
                <ul class="categories-widget-layout widget-layout-2">

                    <?php
                    for ($i = 1; $i <= 7; $i++) {

                        $post_category = isset($params['post_category_' . $i]) ? $params['post_category_' . $i] : '';

                        if ($post_category) {

                            $cat_obj = get_category_by_slug($post_category);
                            $cat_name = isset($cat_obj->name) ? $cat_obj->name : '';
                            $cat_id = isset($cat_obj->term_id) ? $cat_obj->term_id : '';
                            $count = isset($cat_obj->count) ? $cat_obj->count : '';
                            $cat_link = get_category_link($cat_id);
                            $wedev_term_image = get_term_meta($cat_id, 'wedevs-term-featured-image', true);
                            $wedev_term_image = wp_get_attachment_image_url($wedev_term_image, 'medium'); ?>

                            <li class="data-bg data-bg-small" <?php if( $wedev_term_image ){ ?> data-background="<?php echo esc_url( $wedev_term_image ); ?>" <?php } ?>>
                                <a href="<?php echo esc_url($cat_link); ?>" target="_self">
                                    <span class="cat-title"><?php echo esc_html($cat_name); ?></span>
                                    <span class="post-count"><?php echo esc_html($count) . __(' Posts', 'anecdote-lite'); ?></span>
                                </a>
                            </li>

                        <?php } ?>

                    <?php } ?>
                </ul>
            </div>
            <?php
            echo $args['after_widget'];
        }

    }

endif;