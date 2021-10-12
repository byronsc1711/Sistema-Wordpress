<?php get_header(); ?>
<section id="slides">

  <?php if ( have_posts() ) : 

    while ( have_posts() ) : 

      the_post(); 

      ?>

    <div class="slide">

      <div class="thumb">

        <a href="<?php the_permalink();?>"><?php if ( has_post_thumbnail() ) { the_post_thumbnail(); } ?></a>

      </div>

      <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

        <h2>

          <a href="<?php the_permalink();?>"><?php the_title();?></a>

        </h2>

        <p class="date">

          <?php 

          the_date(); 

          esc_html_e("in", "luque"); 

          the_category();

          ?>

        </p>

        <p class="extract"><?php the_excerpt();?></p>

      </article>

    </div>

  <?php endwhile; else: ?>

  <h1><?php esc_html_e("No items found", "luque"); ?></h1>

  <?php endif; ?>

</section>
   <section class="esection">

    <div class="father-col clearfix">

      <div class="col-70">

        <?php if (have_posts()) : 

          while (have_posts()) : 

            the_post();

            ?>

            <div class="col-33">

              <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                <div class="">

                  <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>

                  <ul>

                    <li><?php the_time( get_option('date_format') ); ?></li>

                    <li><?php the_category( ', ' ); ?></li>

                  </ul>

                  <div class="">

                    <?php the_post_thumbnail('medium') ?>

                    <?php the_excerpt(); ?>

                    <a href="<?php the_permalink(); ?>" class="readmore"><?php esc_html_e('Keep reading &rarr;', 'luque'); ?></a>

                  </div>

                </article>  <!-- article -->

              </div><!--col-33-->

            <?php endwhile; else : ?>



              <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                <h1><?php esc_html_e('No content available', 'luque'); ?></h1>       

                <div class="">

                  <p><?php esc_html_e('There is no content corresponding to this page, please do a search to find what you are looking for', 'luque'); ?></p>

                  <?php get_search_form(); ?>

                </div>

              </article>  <!-- article -->       

            <?php endif; ?>  

      </div><!--.col-70-->

      <div class="col-30">

        <?php get_sidebar(); ?>

      </div><!--col-30-->

    </div><!--.father-col clearfix-->

    <div class="father-col clearfix">

      <div class="pager">

        <?php get_template_part( 'pagination' ); ?>    

      </div><!--.pager--> 

    </div><!--.father-col clearfix-->

  </section><!--esection-->   


  <?php get_footer(); ?>