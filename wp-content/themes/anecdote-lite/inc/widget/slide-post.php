<?php
/**
 * Slide Post Widgets.
 *
 * @package Anecdote Lite
 */

if ( !function_exists('anecdote_lite_slide_post_widgets') ) :

    function anecdote_lite_slide_post_widgets(){
        
        register_widget('Anecdote_Lite_Sidebar_Slide_Post_Widget');

    }

endif;

add_action('widgets_init', 'anecdote_lite_slide_post_widgets');


if ( !class_exists('Anecdote_Lite_Sidebar_Slide_Post_Widget') ) :

    // Slide Post widget Form & Display

    class Anecdote_Lite_Sidebar_Slide_Post_Widget extends Anecdote_Lite_Widget_Base{

        function __construct(){

            $opts = array(
                'classname' => 'anecdote_lite_slide_post_widget',
                'description' => esc_html__('Displays articles from selected category in a slide.', 'anecdote-lite'),
                'customize_selective_refresh' => true,
            );
            
            $category_list = anecdote_lite_post_category_list();

            $fields = array(
                'title' => array(
                    'label' => esc_html__('Title:', 'anecdote-lite'),
                    'type' => 'text',
                    'class' => 'widefat',
                ),
                'post_category' => array(
                    'label' => esc_html__('Select Category:', 'anecdote-lite'),
                    'type' => 'select',
                    'options' => $category_list,
                ),
                'post_number' => array(
                    'label' => esc_html__('Number of posts to show:', 'anecdote-lite'),
                    'type' => 'number',
                    'default' => 5,
                    'css' => 'max-width:60px;',
                    'min' => 1,
                    'max' => 10,
                ),
            );

            parent::__construct( 'anecdote-lite-slide-posts', esc_html__('WeDevs: Sidebar Slide Post Widget', 'anecdote-lite'), $opts, array(), $fields );

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
            $post_number = isset( $params['post_number'] ) ? $params['post_number'] : '';
            $post_category = isset( $params['post_category'] ) ? $params['post_category'] : '';

            if( $title ){
                echo $args['before_title'] . esc_html( $title ) . $args['after_title'];
            }

            $qargs = array(
                'posts_per_page' => esc_attr( $post_number ),
                'no_found_rows' => true,
            );

            $rtl = '';
            if( is_rtl() ){
                $rtl = 'dir="rtl"';
            }
            
            $slide_posts_query = new WP_Query( $qargs );
            $count = 1;
            
            if ( $slide_posts_query->have_posts() ) : ?>

                <div class="site-widget site-widget-slider">

                    <div class="swiper-container widget-swiper-slider" <?php echo $rtl; ?>>
                        <div class="swiper-wrapper">
                            <?php
                            while( $slide_posts_query->have_posts() ):
                                $slide_posts_query->the_post(); ?>

                                <div class="swiper-slide">

                                    <?php
                                    if( has_post_thumbnail() ): ?>
                                        <div class="entry-thumbnail">
                                            <?php anecdote_lite_post_thumbnail( $size = 'medium_large', $else = false ); ?>
                                        </div>
                                    <?php endif; ?>

                                    <div class="entry-details">
                                        <div class="entry-meta">
                                            <?php anecdote_lite_entry_cat(); ?>
                                        </div>

                                        <header class="entry-header">
                                            <h3 class="entry-title">
                                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                            </h3>
                                        </header>

                                        <div class="entry-content">
                                            <div class="entry-meta">
                                                <?php anecdote_lite_posted_on(); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            <?php endwhile; ?>
                        </div>
                    </div>

                    <div class="swiper-nav">
                        <div class="swiper-nav-control">
                            <div class="wedevs-sidebar-nav wedevs-sidebar-slide-prev"><?php anecdote_lite_get_theme_svg('chevron-left') ?></div>
                            <div class="wedevs-sidebar-nav wedevs-sidebar-slide-next"><?php anecdote_lite_get_theme_svg('chevron-right') ?></div>
                        </div>
                    </div>

                </div>

                <?php wp_reset_postdata();

            endif;
            
            echo $args['after_widget'];
        }

    }

endif;