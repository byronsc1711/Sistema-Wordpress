<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Anecdote Lite
 */

get_header();
$content_column_class = anecdote_lite_sidebar();
?>
    <div class="site-wrapper">
        <div class="site-row">
            <div id="primary" class="content-area site-column site-column-sm-12 <?php echo esc_attr($content_column_class); ?>">
                <main id="main" class="site-main">

                    <?php
                    while (have_posts()) :
                        the_post();

                        get_template_part('template-parts/content', 'single');

                    endwhile; // End of the loop. ?>

                </main><!-- #main -->
            </div>

            <?php get_sidebar(); ?>
        </div>
    </div>
<?php get_footer();