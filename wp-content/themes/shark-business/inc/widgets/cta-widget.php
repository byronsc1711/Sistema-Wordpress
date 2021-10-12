<?php
/**
 * Call to Action Widget
 *
 * @package shark_business
 */

if ( ! class_exists( 'Shark_Business_Cta_Widget' ) ) :

     
    class Shark_Business_Cta_Widget extends WP_Widget {
        /**
         * Sets up the widgets name etc
         */
        public function __construct() {
            $st_widget_cta = array(
                'classname'   => 'cta_widget',
                'description' => esc_html__( 'Compatible Area: Homepage, Sidebar', 'shark-business' ),
            );
            parent::__construct( 'shark_business_cta_widget', esc_html__( 'ST: Call to Action Widget', 'shark-business' ), $st_widget_cta );
        }

        /**
         * Outputs the content of the widget
         *
         * @param array $args
         * @param array $instance
         */
        public function widget( $args, $instance ) {
            // outputs the content of the widget
            if ( ! isset( $args['widget_id'] ) ) {
                $args['widget_id'] = $this->id;
            }

            $title   = ( ! empty( $instance['title'] ) ) ? ( $instance['title'] ) : '';
            $title   = apply_filters( 'widget_title', $title, $instance, $this->id_base );
            $read_more  = isset( $instance['read_more'] ) ? $instance['read_more'] : esc_html__( 'Read More', 'shark-business' );
                    
            $page_id  = isset( $instance['page_id'] ) ? $instance['page_id'] : '';
            $query_args = array(
                'post_type' => 'page',
                'page_id' => absint( $page_id ),
                'posts_per_page' => 1,
            );

            $query = new WP_Query( $query_args );

            echo $args['before_widget'];
            ?>
                <?php if ( $query -> have_posts() ) : while ( $query -> have_posts() ) : $query -> the_post();  
                $image = has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_id(), 'full' ) : '';
                ?>
                    <div class="page-section cta-section relative center-align" style="background-image: url('<?php echo esc_url( $image ); ?>');">
                        <div class="overlay"></div>
                        <div class="wrapper">
                            <?php if ( ! empty( $title ) ) : ?>
                                <div class="section-header align-center add-separator">
                                    <?php echo $args['before_title'] . esc_html( $title ) . $args['after_title']; ?>
                                </div><!-- .section-header -->
                            <?php endif; ?>

                            <article class="hentry">
                                <div class="post-wrapper">
                                    <div class="entry-container">
                                        <div class="entry-content">
                                            <?php the_excerpt(); ?>
                                        </div><!-- .entry-content -->
                                        <div class="read-more">
                                            <a href="<?php the_permalink(); ?>"><?php echo esc_html( $read_more ); ?></a>
                                        </div>
                                    </div><!-- .entry-container -->
                                </div><!-- .post-wrapper -->
                            </article>
                        </div><!-- .wrapper -->
                    </div><!-- #cta -->
                <?php endwhile; endif;
                wp_reset_postdata(); ?>

            <?php
            echo $args['after_widget'];
        }

        /**
         * Outputs the options form on admin
         *
         * @param array $instance The widget options
         */
        public function form( $instance ) {
            $title       = isset( $instance['title'] ) ? ( $instance['title'] ) : esc_html__( 'Call to Action', 'shark-business' );
            $page_id        = isset( $instance['page_id'] ) ? $instance['page_id'] : '';
            $read_more  = isset( $instance['read_more'] ) ? $instance['read_more'] : esc_html__( 'Read More', 'shark-business' );

            $page_options = shark_business_page_choices();
            ?>

            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'shark-business' ); ?></label>
                <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('title') ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
            </p>

            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'page_id' ) ); ?>"><?php esc_html_e( 'Select Page', 'shark-business' ); ?></label>
                <select class="shark-business-widget-chosen-select widfat" id="<?php echo esc_attr( $this->get_field_id( 'page_id' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'page_id' ) ); ?>">
                    <?php foreach ( $page_options as $page_option => $value ) : ?>
                        <option value="<?php echo absint( $page_option ); ?>" <?php selected( $page_id, $page_option, $echo = true ) ?> ><?php echo esc_html( $value ); ?></option>
                    <?php endforeach; ?>
                </select>
                <small><?php esc_html_e( 'Excerpt will be shown from the selected page', 'shark-business' ); ?></small>
            </p>

            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'read_more' ) ); ?>"><?php esc_html_e( 'Read More Text:', 'shark-business' ); ?></label>
                <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('read_more') ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'read_more' ) ); ?>" type="text" value="<?php echo esc_attr( $read_more ); ?>" />
            </p>

        <?php }

        /**
        * Processing widget options on save
        *
        * @param array $new_instance The new options
        * @param array $old_instance The previous options
        */
        public function update( $new_instance, $old_instance ) {
            // processes widget options to be saved
            $instance                   = $old_instance;
            $instance['title']          = sanitize_text_field( $new_instance['title'] );
            $instance['page_id']        = shark_business_sanitize_page_post( $new_instance['page_id'] );
            $instance['read_more']      = sanitize_text_field( $new_instance['read_more'] );
           
            return $instance;
        }
    }
endif;
