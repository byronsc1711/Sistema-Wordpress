<?php
/**
 * About section
 *
 * This is the template for the content of about section
 *
 * @package Theme Palace
 * @subpackage Dark Music
 * @since Dark Music 1.0.0
 */
if ( ! function_exists( 'dark_music_add_about_section' ) ) :
    /**
    * Add about section
    *
    *@since Dark Music 1.0.0
    */
    function dark_music_add_about_section() {
    	$options = dark_music_get_theme_options();
        // Check if about is enabled on frontpage
        $about_enable = apply_filters( 'dark_music_section_status', true, 'about_section_enable' );

        if ( true !== $about_enable ) {
            return false;
        }
        // Get about section details
        $section_details = array();
        $section_details = apply_filters( 'dark_music_filter_about_section_details', $section_details );

        if ( empty( $section_details ) ) {
            return;
        }

        // Render about section now.
        dark_music_render_about_section( $section_details );
    }
endif;

if ( ! function_exists( 'dark_music_get_about_section_details' ) ) :
    /**
    * about section details.
    *
    * @since Dark Music 1.0.0
    * @param array $input about section details.
    */
    function dark_music_get_about_section_details( $input ) {
        $options = dark_music_get_theme_options();
        
        $content = array();
     
        $page_id = ! empty( $options['about_content_page'] ) ? $options['about_content_page'] : '';
        $args = array(
            'post_type'         => 'page',
            'page_id'           => $page_id,
            'posts_per_page'    => 1,
            );                    
          
        $query = new WP_Query( $args );
        if ( $query->have_posts() ) : 
            while ( $query->have_posts() ) : $query->the_post();
                $page_post['title']     = get_the_title();
                $page_post['url']       = get_the_permalink();
                $page_post['excerpt']   = dark_music_trim_content( 50 );
                $page_post['image']  	= has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_id(), 'post-thumbnail' ) : '';

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
// about section content details.
add_filter( 'dark_music_filter_about_section_details', 'dark_music_get_about_section_details' );


if ( ! function_exists( 'dark_music_render_about_section' ) ) :
  /**
   * Start about section
   *
   * @return string about content
   * @since Dark Music 1.0.0
   *
   */
function dark_music_render_about_section( $content_details = array() ) {
    $options = dark_music_get_theme_options();
    $column = ! empty( $options['about_column'] ) ? $options['about_column'] : 'col-2';
    $readmore = ! empty( $options['about_btn_title'] ) ? $options['about_btn_title'] : esc_html__( 'Read More', 'dark-music' );

    if ( empty( $content_details ) ) {
        return;
    } ?>

    <div id="dark_music_about_section">   
        <div id="about-section" class="relative page-section same-background">
            <div class="wrapper">
                <?php if ( is_customize_preview()):
                    dark_music_section_tooltip( 'about-section' );
                    endif; ?>
                <?php foreach ($content_details as $content ): ?>
                    <article class="has-post-thumbnail">
                        <div class="featured-image">
                            <a href="<?php echo esc_url( $content['url'] ); ?>"><img src="<?php echo esc_url( $content['image'] ); ?>" alt="about"></a>
                        </div><!-- .featured-image -->

                        <div class="entry-container">
                            <div class="section-header">
                                <?php if ( !empty( $options['about_subtitle'] ) ): ?>
                                    <p class="section-subtitle"><?php echo esc_html( $options['about_subtitle'] ); ?></p>
                                <?php endif ?>
                                
                                <h2 class="section-title"><a href="<?php echo esc_url( $content['url'] ); ?>"><?php echo esc_html( $content['title'] ); ?></a></h2>
                            </div><!-- .section-header -->

                            <div class="entry-content">
                                <?php echo wp_kses_post( $content['excerpt'] ); ?>
                            </div><!-- .entry-content -->

                            <div class="read-more">
                                <a href="<?php echo esc_url( $content['url'] ); ?>" class="btn"><?php echo esc_html( $readmore ); ?></a>
                            </div><!-- .read-more -->
                        </div><!-- .entry-container -->
                    </article>
                <?php endforeach ?>           
            </div><!-- .wrapper -->
        </div><!-- #about-section -->
    </div>
  
    <?php }
endif;
