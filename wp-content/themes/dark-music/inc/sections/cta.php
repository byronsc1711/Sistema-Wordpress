<?php
/**
 * Call to action section
 *
 * This is the template for the content of cta section
 *
 * @package Theme Palace
 * @subpackage Dark Music
 * @since Dark Music 1.0.0
 */
if ( ! function_exists( 'dark_music_add_cta_section' ) ) :
    /**
    * Add cta section
    *
    *@since Dark Music 1.0.0
    */
    function dark_music_add_cta_section() {
    	$options = dark_music_get_theme_options();
        // Check if cta is enabled on frontpage
        $cta_enable = apply_filters( 'dark_music_section_status', true, 'cta_section_enable' );

        if ( true !== $cta_enable ) {
            return false;
        }
        // Get cta section details
        $section_details = array();
        $section_details = apply_filters( 'dark_music_filter_cta_section_details', $section_details );

        if ( empty( $section_details ) ) {
            return;
        }

        // Render cta section now.
        dark_music_render_cta_section( $section_details );
    }
endif;

if ( ! function_exists( 'dark_music_get_cta_section_details' ) ) :
    /**
    * cta section details.
    *
    * @since Dark Music 1.0.0
    * @param array $input cta section details.
    */
    function dark_music_get_cta_section_details( $input ) {
        $options = dark_music_get_theme_options();
        $content = array();
        $page_id = ! empty( $options['cta_content_page'] ) ? $options['cta_content_page'] : '';
        $args = array(
            'post_type'         => 'page',
            'page_id'           => $page_id,
            'posts_per_page'    => 1,
            );                    
        
        // Run The Loop.
        $query = new WP_Query( $args );
        if ( $query->have_posts() ) : 
            while ( $query->have_posts() ) : $query->the_post();
                $page_post['title']     = get_the_title();
                $page_post['url']       = get_the_permalink();
                $page_post['excerpt']   = dark_music_trim_content( 25 );
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
// cta section content details.
add_filter( 'dark_music_filter_cta_section_details', 'dark_music_get_cta_section_details' );


if ( ! function_exists( 'dark_music_render_cta_section' ) ) :
  /**
   * Start cta section
   *
   * @return string cta content
   * @since Dark Music 1.0.0
   *
   */
   function dark_music_render_cta_section( $content_details = array() ) {
    $options = dark_music_get_theme_options();
    $readmore = ! empty( $options['cta_btn_title'] ) ? $options['cta_btn_title'] : esc_html__( 'Read More', 'dark-music' );

    if ( empty( $content_details ) ) {
        return;
    } 

    foreach ( $content_details as $content ) : ?>
        <div id="dark_music_cta_section">   
            <div id="promotion-section" class="cta-section relative page-section" style="background-image: url('<?php echo esc_url( $content['image'] ); ?>');">
                <div class="overlay"></div>
                <div class="wrapper">
                    <?php if ( is_customize_preview()):
                    dark_music_section_tooltip( 'cta-section-class' );
                    endif; ?>
                    <header class="entry-header">
                        <h2 class="section-title"><?php echo esc_html( $content['title'] ); ?></h2>
                    </header>

                    <div class="entry-content">
                        <p><?php echo wp_kses_post( $content['excerpt'] ); ?></p>
                    </div><!-- .entry-content -->

                    <div class="read-more">
                        <a href="<?php echo esc_url( $content['url'] ); ?>" class="btn"><?php echo esc_html( $readmore ); ?></a>
                    </div><!-- .read-more -->
                </div><!-- .wrapper -->
            </div><!-- #promotion-section -->
        </div>
       

    <?php endforeach; 
    }
endif;
