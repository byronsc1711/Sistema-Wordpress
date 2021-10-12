<?php
/**
 * Blog section
 *
 * This is the template for the content of blog section
 *
 * @package Theme Palace
 * @subpackage Dark Music
 * @since Dark Music 1.0.0
 */
if ( ! function_exists( 'dark_music_add_blog_section' ) ) :
    /**
    * Add blog section
    *
    *@since Dark Music 1.0.0
    */
    function dark_music_add_blog_section() {
    	$options = dark_music_get_theme_options();
        // Check if blog is enabled on frontpage
        $blog_enable = apply_filters( 'dark_music_section_status', true, 'blog_section_enable' );

        if ( true !== $blog_enable ) {
            return false;
        }
        // Get blog section details
        $section_details = array();
        $section_details = apply_filters( 'dark_music_filter_blog_section_details', $section_details );

        if ( empty( $section_details ) ) {
            return;
        }

        // Render blog section now.
        dark_music_render_blog_section( $section_details );
    }
endif;

if ( ! function_exists( 'dark_music_get_blog_section_details' ) ) :
    /**
    * blog section details.
    *
    * @since Dark Music 1.0.0
    * @param array $input blog section details.
    */
    function dark_music_get_blog_section_details( $input ) {
        $options = dark_music_get_theme_options();

        // Content type.
        $blog_content_type  = $options['blog_content_type'];
        
        $content = array();
        switch ( $blog_content_type ) {
        	
            case 'post':
                $post_ids = array();

                for ( $i = 1; $i <= 3; $i++ ) {
                    if ( ! empty( $options['blog_content_post_' . $i] ) )
                        $post_ids[] = $options['blog_content_post_' . $i];
                }
                
                $args = array(
                    'post_type'         => 'post',
                    'post__in'          => ( array ) $post_ids,
                    'posts_per_page'    => 3,
                    'orderby'           => 'post__in',
                    'ignore_sticky_posts'   => true,
                    );                    
            break;

            case 'category':
                $cat_id = ! empty( $options['blog_content_category'] ) ? $options['blog_content_category'] : '';
                $args = array(
                    'post_type'         => 'post',
                    'posts_per_page'    => 3,
                    'cat'               => absint( $cat_id ),
                    'ignore_sticky_posts'   => true,
                    );                    
            break;

            default:
            break;
        }


        // Run The Loop.
        $query = new WP_Query( $args );
        if ( $query->have_posts() ) : 
            while ( $query->have_posts() ) : $query->the_post();
                $page_post['id']        = get_the_id();
                $page_post['title']     = get_the_title();
                $page_post['url']       = get_the_permalink();
                $page_post['excerpt']   = dark_music_trim_content( 20 );
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
// blog section content details.
add_filter( 'dark_music_filter_blog_section_details', 'dark_music_get_blog_section_details' );


if ( ! function_exists( 'dark_music_render_blog_section' ) ) :
  /**
   * Start blog section
   *
   * @return string blog content
   * @since Dark Music 1.0.0
   *
   */
   function dark_music_render_blog_section( $content_details = array() ) {
        $options = dark_music_get_theme_options();
        $blog_content_type  = $options['blog_content_type'];

        if ( empty( $content_details ) ) {
            return;
        } ?>
        <div id="dark_music_blog_section">   
            <div id="latest-posts-section" class="blog-section relative page-section same-background">
                <div class="wrapper">
                    <?php if ( is_customize_preview()):
                    dark_music_section_tooltip( 'blog-section-class' );
                    endif; ?>
                    <div class="section-header">
                        <?php if ( ! empty( $options['blog_subtitle'] ) ) : ?>
                            <p class="section-subtitle"><?php echo esc_html( $options['blog_subtitle'] ); ?></p>
                        <?php endif; ?>
                        <?php if ( ! empty( $options['blog_title'] ) ) : ?>
                            <h2 class="section-title"><?php echo esc_html( $options['blog_title'] ); ?></h2>
                        <?php endif; ?>                       
                    </div><!-- .section-header -->

                    <div class="archive-blog-wrapper col-3 clear">
                        <?php foreach ( $content_details as $content ) : ?>
                            <article>
                                <div class="post-wrapper">
                                    <div class="featured-image">
                                        <a href="#"><img src="<?php echo esc_url( $content['image'] ); ?>" alt="blog"></a>
                                    </div><!-- .featured-image -->

                                    <div class="entry-container">
                                        <header class="entry-header">
                                            <h2 class="entry-title"><a href="<?php echo esc_url( $content['url'] ); ?>"><?php echo esc_html( $content['title'] ); ?></a></h2>
                                        </header>

                                        <div class="entry-content">
                                            <p><?php echo esc_html( $content['excerpt'] ); ?></p>
                                        </div><!-- .entry-content -->

                                        <?php if ( !empty( $options['blog_btn_title'] ) ): ?>
                                            <div class="read-more">
                                                <a href="<?php echo esc_url( $content['url'] ); ?>" class="btn"><?php echo esc_html( $options['blog_btn_title'] ); ?></a>
                                            </div><!-- .read-more -->
                                        <?php endif ?>
                                        
                                    </div><!-- .entry-container -->
                                </div><!-- .post-wrapper -->
                            </article>
                        <?php endforeach ; ?>
                    </div><!-- .archive-blog-wrapper -->
                </div><!-- .wrapper -->
            </div><!-- #latest-posts-section -->
        </div>
        
    <?php }
endif;