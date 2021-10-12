<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Anecdote Lite
 */

?>

</div><!-- #content -->

<?php
if( is_single() && 'post' === get_post_type() ){ ?>
    <div id="additional-content" class="site-additional-content">
        <?php anecdote_lite_related_posts(); ?>
    </div>
<?php } ?>

<footer id="site-footer" class="wedevs-site-footer" role="contentinfo" itemscope itemtype="https://schema.org/WPFooter">



        <?php
        if( is_home() && is_front_page() ) :

            /**
             * anecdote_lite_subscribe - 10
             * anecdote_lite_popup_model_box - 30
             **/

            do_action('anecdote_lite_bottom_content');

        endif;

        if( is_active_sidebar('anecdote-lite-footer-widget-1') ||
            is_active_sidebar('anecdote-lite-footer-widget-2') ||
            is_active_sidebar('anecdote-lite-footer-widget-3') ):

            $widgets = 0;
            if( is_active_sidebar('anecdote-lite-footer-widget-1') ){
                $widgets++;
            }
            if( is_active_sidebar('anecdote-lite-footer-widget-2') ){
                $widgets++;
            }
            if( is_active_sidebar('anecdote-lite-footer-widget-3') ){
                $widgets++;
            }
            if( $widgets == '3' ){
                $widget_class = 'site-column-4';
            }elseif( $widgets == '2' ){
                $widget_class = 'site-column-6';
            }else{
                $widget_class = 'site-column-12';
            } ?>

            <div id="footer-widgetarea" class="site-footer-widgetarea">
                <div class="site-wrapper">
                    <div class="site-row">

                        <?php if( is_active_sidebar('anecdote-lite-footer-widget-1') ): ?>
                            <div class="site-column <?php echo $widget_class; ?> site-column-sm-12">
                                <?php dynamic_sidebar('anecdote-lite-footer-widget-1'); ?>
                            </div>
                        <?php endif; ?>

                        <?php if( is_active_sidebar('anecdote-lite-footer-widget-2') ): ?>
                            <div class="site-column <?php echo $widget_class; ?> site-column-sm-12">
                                <?php dynamic_sidebar('anecdote-lite-footer-widget-2'); ?>
                            </div>
                        <?php endif; ?>

                        <?php if( is_active_sidebar('anecdote-lite-footer-widget-3') ): ?>
                            <div class="site-column <?php echo $widget_class; ?> site-column-sm-12">
                                <?php dynamic_sidebar('anecdote-lite-footer-widget-3'); ?>
                            </div>
                        <?php endif; ?>

                    </div>
                </div>

                <div class="site-wrapper">
                    <div class="site-row">
                        <div class="site-column site-column-12">
                            <div class="site-footer-divider"></div>
                        </div>
                    </div>
                </div>
            </div>

        <?php
        endif; ?>

    <div id="footer-copyrightarea" class="site-footer-copyrightarea">
        <div class="site-wrapper">
            <div class="site-row">
                <div class="site-column site-column-12">
                    <?php anecdote_lite_footer_credit(); ?>
                </div>
            </div>
        </div>
    </div>

</footer><!-- #site-footer -->

<button type="button" class="scroll-up">
    <?php anecdote_lite_get_theme_svg('chevron-up'); ?>
</button>

<?php get_template_part('template-parts/modal-menu');

get_template_part('template-parts/modal-search'); ?>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
