<?php
/**
 * Template part for displaying front page imtroduction.
 *
 * @package Moral
 */


function dark_music_add_client_section(){
    $options = dark_music_get_theme_options();
    // Check if client is enabled on frontpage
    $client_enable = apply_filters( 'dark_music_section_status', true, 'client_section_enable' );

    if ( true !== $client_enable ) {
        return false;
    }

?>
<div id="dark_music_client_section">
    <div id="sponsor-section" class="client-section relative page-section same-background">
        <div class="wrapper">
            <?php if ( is_customize_preview()):
                dark_music_section_tooltip( 'client-section-class' );
            endif; ?>
            <div class="section-content col-5 clear">
                <?php for ($i=1; $i <= 5 ; $i++) : ?>
                    <article>
                        <?php if ( !empty( $options['client_link_'.$i] ) && !empty( $options['client_image_'.$i] ) ): ?>
                            <div class="featured-image">
                                <a href="<?php echo esc_url( $options['client_link_'.$i] ); ?>" target="_blank"><img src="<?php echo esc_url( $options['client_image_'.$i] ); ?>" alt="sponsor"></a>
                            </div><!-- .featured-image -->
                        <?php endif ?>                    
                    </article>
                <?php endfor; ?>
            </div><!-- .col-5 -->                        
        </div><!-- .wrapper -->
    </div><!-- #sponsor-section -->
</div>

<?php }
