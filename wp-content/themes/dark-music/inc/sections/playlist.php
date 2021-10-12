<?php
/**
 * Playlist section
 *
 * This is the template for the content of playlist section
 *
 * @package Theme Palace
 * @subpackage Dark Music
 * @since Dark Music 1.0.0
 */
if ( ! function_exists( 'dark_music_add_playlist_section' ) ) :
    /**
    * Add playlist section
    *
    *@since Dark Music 1.0.0
    */
    function dark_music_add_playlist_section() {
    	$options = dark_music_get_theme_options();
        // Check if playlist is enabled on frontpage
        $playlist_enable = apply_filters( 'dark_music_section_status', true, 'playlist_section_enable' );

        if ( true !== $playlist_enable ) {
            return false;
        }

        // Render playlist section now.
        dark_music_render_playlist_section();
    }
endif;

if ( ! function_exists( 'dark_music_render_playlist_section' ) ) :
  /**
   * Start playlist section
   *
   * @return string playlist content
   * @since Dark Music 1.0.0
   *
   */
   function dark_music_render_playlist_section() {
        $options = dark_music_get_theme_options();
        $playlist = ! empty( $options['playlist_content'] ) ? $options['playlist_content'] : array();
        $bg_image = !empty( $options['playlist_bg_image'] ) ? $options['playlist_bg_image'] : '';
        
        if ( empty( $playlist ) )
            return;
        ?>
        <div id="dark_music_playlist_section">
            <div id="playlist-section" class="relative page-section" style="background-image: url('<?php echo esc_url( $bg_image ); ?>');" >
                <div class="overlay"></div>
                <div class="wrapper">
                    <?php if ( is_customize_preview()):
                    dark_music_section_tooltip( 'playlist-section' );
                    endif; ?>
                   <div class="section-header">
                        <?php if ( !empty( $options['playlist_subtitle'] ) ): ?>
                            <p class="section-subtitle"><?php echo esc_html( $options['playlist_subtitle'] ); ?></p>
                        <?php endif ?>
                        <?php if ( !empty( $options['playlist_title'] ) ): ?>
                            <h2 class="section-title"><?php echo esc_html( $options['playlist_title'] ); ?></h2>
                        <?php endif ?>                    
                    </div><!-- .section-header -->

                    <?php if ( ! empty( $playlist ) ) :
                        $playlist = implode(',', $playlist); ?>

                        <div class="playlist">
                            <?php if ( !empty( $options['playlist_image'] ) ): ?>
                                <div class="featured-image" style="background-image: url('<?php echo esc_html( $options['playlist_image'] ); ?>');">
                                </div><!-- .featured-image -->  
                            <?php endif ?>  
                            <div class="wp-playlist-tracks">                    
                                <?php 
                                    $playlist_shortcode = '[playlist type="audio" ids="' . $playlist . '" style="light"]';
                                    echo do_shortcode( wp_kses_post( $playlist_shortcode ) );  
                                ?>
                            </div><!-- .wp-playlist-tracks -->
                        </div><!-- .playlist -->
                    <?php endif; ?>
                </div><!-- .wrapper -->
            </div><!-- #playlist-section -->
        </div>
       
    <?php }
endif;