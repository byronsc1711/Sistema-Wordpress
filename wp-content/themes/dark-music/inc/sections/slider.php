<?php
/**
 * Slider section
 *
 * This is the template for the content of slider section
 *
 * @package Theme Palace
 * @subpackage Dark Music
 * @since Dark Music 1.0.0
 */
if ( ! function_exists( 'dark_music_add_slider_section' ) ) :
    /**
    * Add slider section
    *
    *@since Dark Music 1.0.0
    */
    function dark_music_add_slider_section() {
    	$options = dark_music_get_theme_options();
        // Check if slider is enabled on frontpage
        $slider_enable = apply_filters( 'dark_music_section_status', true, 'slider_section_enable' );

        if ( true !== $slider_enable ) {
            return false;
        }
        // Get slider section details
        $section_details = array();
        $section_details = apply_filters( 'dark_music_filter_slider_section_details', $section_details );

        if ( empty( $section_details ) ) {
            return;
        }

        // Render slider section now.
        dark_music_render_slider_section( $section_details );
    }
endif;

if ( ! function_exists( 'dark_music_get_slider_section_details' ) ) :
    /**
    * slider section details.
    *
    * @since Dark Music 1.0.0
    * @param array $input slider section details.
    */
    function dark_music_get_slider_section_details( $input ) {
        $options = dark_music_get_theme_options();
        
        $content = array();
   
        $page_ids = array();

        for ( $i = 1; $i <= 3; $i++ ) {
            if ( ! empty( $options['slider_content_page_' . $i] ) )
                $page_ids[] = $options['slider_content_page_' . $i];
        }
        
        $args = array(
            'post_type'         => 'page',
            'post__in'          => ( array ) $page_ids,
            'posts_per_page'    => 3,
            'orderby'           => 'post__in',
            );                    
          


        // Run The Loop.
        $query = new WP_Query( $args );
        if ( $query->have_posts() ) : 
            while ( $query->have_posts() ) : $query->the_post();
                $page_post['id']        = get_the_id();
                $page_post['title']     = get_the_title();
                $page_post['url']       = get_the_permalink();
                $page_post['excerpt']   = dark_music_trim_content( 30 );
                $page_post['image']  	= has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_id(), 'full' ) : '';

                // Push to the main array.
                array_push( $content, $page_post );
            endwhile;
        endif;
        wp_reset_postdata();
            
        if ( ! empty( $content ) ) {
            $input = $content;
        }
        return $input;
    }
endif;
// slider section content details.
add_filter( 'dark_music_filter_slider_section_details', 'dark_music_get_slider_section_details' );


if ( ! function_exists( 'dark_music_render_slider_section' ) ) :
  /**
   * Start slider section
   *
   * @return string slider content
   * @since Dark Music 1.0.0
   *
   */
   function dark_music_render_slider_section( $content_details = array() ) {
        $options = dark_music_get_theme_options();

        if ( empty( $content_details ) ) {
            return;
        } ?>
        <div id="dark_music_slider_section">
             <div id="featured-slider-section" class="slider-section">
                <div class="featured-slider" data-slick='{"slidesToShow": 1, "slidesToScroll": 1, "infinite": true, "speed": 800, "dots": true, "arrows": true, "autoplay": true, "draggable": true, "fade": true }'>
                    <?php foreach ( $content_details as $content ) : ?>
                    <article style="background-image: url('<?php echo esc_url( $content['image'] ); ?>');">
                        <div class="overlay"></div>
                        <div class="wrapper">
                            <div class="featured-content-wrapper">
                                <div class="entry-container">
                                    <header class="entry-header">
                                       <h2 class="entry-title"><a href="<?php echo esc_url( $content['url'] ); ?>"><?php echo esc_html( $content['title'] ); ?></a></h2>
                                    </header>

                                    <div class="entry-content">
                                        <?php if ( is_customize_preview()):
                                        dark_music_section_tooltip( 'slider-section-class' );
                                        endif; ?>
                                       <p><?php echo esc_html( $content['excerpt'] ); ?></p>
                                    </div><!-- .entry-content -->

                                    <div class="read-more">
                                        <?php if ( !empty( $options['slider_btn_title'] ) ): ?>
                                            <a href="<?php echo esc_url( $content['url'] ); ?>" class="btn"><?php echo esc_html( $options['slider_btn_title'] ); ?></a>
                                        <?php endif ?>
                                        <?php if ( !empty( $options['slider_alt_btn_title'] ) && !empty($options['slider_alt_btn_url']) ): ?>
                                            <a href="<?php echo esc_url( $options['slider_alt_btn_url'] ); ?>" class="btn"><?php echo esc_html( $options['slider_alt_btn_title'] ); ?></a>
                                        <?php endif ?>
                                    </div><!-- .read-more -->
                                </div><!-- .entry-container -->
                            </div><!-- .featured-content-wrapper -->
                        </div><!-- .wrapper -->
                    </article>
                    <?php endforeach; ?>
                </div><!-- .featured-slider -->
            </div><!-- #featured-slider-section -->
        </div>
       
    <?php }
endif;