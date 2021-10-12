<?php
/**
 * Testimonial section
 *
 * This is the template for the content of testimonial section
 *
 * @package Theme Palace
 * @subpackage Dark Music
 * @since Dark Music 1.0.0
 */
if ( ! function_exists( 'dark_music_add_testimonial_section' ) ) :
    /**
    * Add testimonial section
    *
    *@since Dark Music 1.0.0
    */
    function dark_music_add_testimonial_section() {
    	$options = dark_music_get_theme_options();
        // Check if testimonial is enabled on frontpage
        $testimonial_enable = apply_filters( 'dark_music_section_status', true, 'testimonial_section_enable' );

        if ( true !== $testimonial_enable ) {
            return false;
        }
        // Get testimonial section details
        $section_details = array();
        $section_details = apply_filters( 'dark_music_filter_testimonial_section_details', $section_details );

        if ( empty( $section_details ) ) {
            return;
        }

        // Render testimonial section now.
        dark_music_render_testimonial_section( $section_details );
    }
endif;

if ( ! function_exists( 'dark_music_get_testimonial_section_details' ) ) :
    /**
    * testimonial section details.
    *
    * @since Dark Music 1.0.0
    * @param array $input testimonial section details.
    */
    function dark_music_get_testimonial_section_details( $input ) {
        $options = dark_music_get_theme_options();

        $content = array();
      
        $page_ids = array();
        $position = array();

        for ( $i = 1; $i <= 4; $i++ ) {
            if ( ! empty( $options['testimonial_content_page_' . $i] ) ) :
                $page_ids[] = $options['testimonial_content_page_' . $i];
            endif;
        }
        
        $args = array(
            'post_type'         => 'page',
            'post__in'          => ( array ) $page_ids,
            'posts_per_page'    => 4,
            'orderby'           => 'post__in',
            );                    
  

        // Run The Loop.
        $query = new WP_Query( $args );
        if ( $query->have_posts() ) : 
            while ( $query->have_posts() ) : $query->the_post();
                $page_post['id']        = get_the_id();
                $page_post['title']     = get_the_title();
                $page_post['url']       = get_the_permalink();
                $page_post['excerpt']   = dark_music_trim_content( 40 );
                $page_post['image']  	= has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_id(), 'thumbnail' ) : '';

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
// testimonial section content details.
add_filter( 'dark_music_filter_testimonial_section_details', 'dark_music_get_testimonial_section_details' );


if ( ! function_exists( 'dark_music_render_testimonial_section' ) ) :
  /**
   * Start testimonial section
   *
   * @return string testimonial content
   * @since Dark Music 1.0.0
   *
   */
   function dark_music_render_testimonial_section( $content_details = array() ) {
        $options = dark_music_get_theme_options();
        
        if ( empty( $content_details ) ) {
            return;
        } ?>
        <div id="dark_music_testimonial_section">
            <div id="testimonial-section" class="relative page-section same-background">
                <div class="wrapper">
                    <?php if ( is_customize_preview()):
                    dark_music_section_tooltip( 'testimonial-section' );
                    endif; ?>
                    <div class="section-header">
                        <?php if ( !empty( $options['testimonial_subtitle'] ) ): ?>
                            <p class="section-subtitle"><?php echo esc_html( $options['testimonial_subtitle'] ); ?></p>
                        <?php endif ?>
                        <?php if ( !empty( $options['testimonial_title'] ) ): ?>
                            <h2 class="section-title"><?php echo esc_html( $options['testimonial_title'] ); ?></h2>
                        <?php endif ?>                    
                    </div><!-- .section-header -->

                    <div class="testimonial-slider" data-slick='{"slidesToShow": 3, "slidesToScroll": 1, "infinite": true, "speed": 1000, "dots": true, "arrows":false, "autoplay": true, "draggable": true, "fade": false }'>
                        <?php $i = 1; foreach ( $content_details as $content ) : ?>
                        <article>
                            <div class="testimonial-item">
                                <div class="featured-image">
                                    <a href="<?php echo esc_url( $content['url'] ); ?>"><img src="<?php echo esc_url( $content['image'] ); ?>" alt="testimonial"></a>
                                </div><!-- .featured-image -->

                                <div class="entry-container">
                                    <header class="entry-header">
                                        <h2 class="entry-title"><a href="<?php echo esc_url( $content['url'] ); ?>"><?php echo esc_html( $content['title'] ); ?></a></h2>
                                        <?php if ( !empty( $options['testimonial_position_' . $i] ) ): ?>
                                            <span class="testimonial-position"><?php echo esc_html( $options['testimonial_position_' . $i] ); ?></span>
                                        <?php endif ?>                                    
                                    </header>

                                    <div class="entry-content">
                                        <p><?php echo esc_html( $content['excerpt'] ); ?></p>
                                    </div><!-- .entry-content -->
                                </div><!-- .entry-container -->
                            </div><!-- .testimonial-item -->
                        </article>
                        <?php $i++; endforeach; ?>                  
                    </div><!-- .section-content -->
                </div><!-- .wrapper -->
            </div><!-- #testimonial-section -->
        </div>
        
    <?php }
endif;