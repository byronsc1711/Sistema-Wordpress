<?php
/**
 * Newsletter Settings.
 *
 * @package Anecdote Lite
**/

if( !function_exists( 'anecdote_lite_subscribe' ) ) :

    //Google Fonts URL
    function anecdote_lite_subscribe(){

        $anecdote_lite_default = anecdote_lite_get_default_theme_options();
        $enable_subscribe = get_theme_mod( 'enable_subscribe', $anecdote_lite_default['enable_subscribe'] );
        $subscribe_shortcode = get_theme_mod( 'subscribe_shortcode' );
        $subscribe_section_title = get_theme_mod( 'subscribe_section_title', $anecdote_lite_default['subscribe_section_title'] );
        $subscribe_section_desc = get_theme_mod( 'subscribe_section_desc', $anecdote_lite_default['subscribe_section_desc'] );

        if( function_exists( '_mc4wp_load_plugin' ) && $enable_subscribe && $subscribe_shortcode ){ ?>
            
            <div class="site-bottom-subscribe">
                
                <?php if( $subscribe_section_title && $subscribe_section_desc ){ ?>
                    <div class="wedevs-block-heading wedevs-newsletter-heading">
                        <?php if( $subscribe_section_title ){ echo '<h2 class="wedevs-block-title"><span>'.esc_html( $subscribe_section_title ).'</span></h2>'; } ?>
                        <?php if( $subscribe_section_desc ){ echo '<p class="wedevs-block-subtitle">'.esc_html( $subscribe_section_desc ).'</p>'; } ?>
                    </div>
                <?php } ?>

                <?php echo do_shortcode( $subscribe_shortcode ); ?>

            </div>
        
        <?php
        }
    }

endif;

add_action('anecdote_lite_bottom_content','anecdote_lite_subscribe',10);

if( !function_exists('anecdote_lite_popup_model_box') ):

    function anecdote_lite_popup_model_box(){

        $anecdote_lite_default = anecdote_lite_get_default_theme_options();
        $ed_popup_model_box = get_theme_mod( 'ed_popup_model_box',$anecdote_lite_default['ed_popup_model_box'] );
        $ed_popup_model_box_first_loading_only = get_theme_mod( 'ed_popup_model_box_first_loading_only',$anecdote_lite_default['ed_popup_model_box_first_loading_only'] );

        if( $ed_popup_model_box_first_loading_only && isset( $_COOKIE['visited'] ) ){
            $visited = false;
        }else{
            $visited = true;
        }
        if( $visited && $ed_popup_model_box ){

            $ed_popup_model_box_home_only = get_theme_mod( 'ed_popup_model_box_home_only',$anecdote_lite_default['ed_popup_model_box_home_only'] );
            $wedev_form_shortcode = get_theme_mod( 'wedev_form_shortcode' );
            $wedev_popup_title = get_theme_mod( 'wedev_popup_title',$anecdote_lite_default['wedev_popup_title'] );
            $wedev_popup_desc = get_theme_mod( 'wedev_popup_desc',$anecdote_lite_default['wedev_popup_desc'] );
            $wedev_popup_bg_image_image = get_theme_mod( 'wedev_popup_bg_image_image' );

            if( $ed_popup_model_box_home_only){
                if( is_home() || is_front_page() ){

                    $load_pages = true;

                }else{
                    $load_pages = false;
                }
            }else{
                $load_pages = true;
            }

            if( $load_pages ){ ?>

            <div class="wedevs-modal <?php if( $visited ){ echo 'is-visible '; } if( $ed_popup_model_box_first_loading_only ){ echo 'single-load'; }else{ echo 'always-load'; } ?>">
                
                <div class="wedevs-modal-wrapper">
                    <div class="wedevs-modal-body">
                        <div class="wedevs-popup-image">
                            <div class="data-bg data-bg-modelbox" data-background="<?php echo esc_url( $wedev_popup_bg_image_image ); ?>">
                            </div>
                        </div>
                        <div class="wedevs-popup-content">
                            <button class="wedevs-modal-close wedevs-modal-toggle">
                                <?php anecdote_lite_get_theme_svg('cross'); ?>
                            </button>
                            <div class="wedevs-popup-content-details">

                                <?php if( $wedev_popup_title ){ ?>
                                    <h3 class="wedevs-popup-title"><?php echo esc_html( $wedev_popup_title ); ?></h3>
                                <?php } ?>

                                <?php if( $wedev_popup_desc ){ ?>
                                    <p class="wedevs-popup-content-excerpt"><?php echo esc_html( $wedev_popup_desc ); ?></p>
                                <?php } ?>

                                <?php if( $wedev_form_shortcode ){ ?>
                                    <div class="wedevs-form-wrapper">
                                        <?php echo do_shortcode($wedev_form_shortcode); ?>
                                    </div>
                                <?php } ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <?php }

        }

    }

endif;

add_action( 'anecdote_lite_bottom_content','anecdote_lite_popup_model_box',30 );