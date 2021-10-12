<?php

$anecdote_lite_default = anecdote_lite_get_default_theme_options();
$home_section_order_7 = get_theme_mod( 'home_section_order_7',$anecdote_lite_default['home_section_order_7'] );

if ( 'posts' == get_option( 'show_on_front' ) && !$home_section_order_7 ) {
    
    include( get_home_template() );

}elseif( $home_section_order_7 ){ 

    get_header(); 
    
    anecdote_lite_main_slider();
    ?>

    	<div class="wedevs-block-wrapper homepage-block-wrapper">

    		<?php
    		foreach( $home_section_order_7 as $home_section ){
            	
    			if( !is_paged() && $home_section == 'featured-category' ){
            		
            		anecdote_lite_featured_category();

            	}

            	if( $home_section == 'latest-posts' ){
            		
            		$content_column_class = anecdote_lite_sidebar();
					?>
                    <div class="wedevs-block wedevs-latest-block">
                        <div class="site-wrapper">
                            <div class="site-row">

                                <div id="primary" class="content-area site-column site-column-sm-12 <?php echo esc_attr( $content_column_class ); ?>">
                                    <main id="main" class="site-main site-archive-main">

                                        <?php
                                        if (have_posts()) :

                                            if (is_home() && !is_front_page()) :
                                                ?>
                                                <header>
                                                    <h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
                                                </header>
                                            <?php
                                            endif;

                                            /* Start the Loop */
                                            while (have_posts()) :
                                                the_post();

                                                /*
                                                 * Include the Post-Type-specific template for the content.
                                                 * If you want to override this in a child theme, then include a file
                                                 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
                                                 */
                                                get_template_part('template-parts/content', get_post_type());

                                            endwhile;

                                        else :

                                            get_template_part('template-parts/content', 'none');

                                        endif;
                                        ?>

                                    </main><!-- #main -->

                                    <?php do_action('anecdote_lite_archive_pagination'); ?>
                                    
                                </div>

                                <?php get_sidebar(); ?>

                            </div>
                        </div>
                    </div>

				<?php
            	}

            } ?>


		</div>

	<?php
	get_footer();

}else {

    include( get_page_template() );
    
}
