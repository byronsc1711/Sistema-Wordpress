<?php get_header(); ?>
  <section class="slider-container">
    <ul class="slider-wrapper">
      <li class="slide-current">
       <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/blog-1.jpg">
      <div class="caption">
        <div class="clearfix grid">
          <div class="line"></div>
          <h3 class="caption-title"><?php esc_html_e( 'Title Blog', 'luque' ); ?></h3>
          <p><?php esc_html_e( 'Description Blog', 'luque' ); ?></p>
        </div><!--clearfix grid-->
      </div><!--.caption-->
      </li>
    </ul>
  </section>

  <div class="bog">
    <div class="esection grid">
      <div class="father-col clearfix">
        <div class="col-70">
          <?php if (have_posts()) : 
          while (have_posts()) : 
            the_post();
            ?>
            <div class="col-50">
              <div class="entryb">
                  <div class="bimg">
                    <a title="<?php the_title(); ?>" href="<?php the_permalink(); ?>">
                      <?php the_post_thumbnail('large'); ?>
                    </a>
                  </div><!--.bimg-->
                  <div class="entrydates">
                    <ul class="fa">
                      <li>
                        <?php the_author(); ?> |
                      </li>
                      <li>
                        <?php the_date() ?>
                      </li>
                    </ul>
                    <h1><a title="<?php the_title(); ?>" href="<?php the_permalink(); ?>"><?php the_title(); ?></h1></a>
                   
                    <ul class="ta">
                      <li>
                        <?php the_tags(""); ?>
                      </li>
                    </ul>
                  </div><!--.entrydates-->
              </div><!--.entryb-->
            </div><!--.col-50-->  
            <?php endwhile; else : ?>          
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
              <h1><?php esc_html_e('No content available', 'luque'); ?></h1>       
              <div>
                <p><?php esc_html_e('There is no content corresponding to this page, please do a search to find what you are looking for', 'luque'); ?></p>
                <?php get_search_form(); ?>
              </div>
            </article>
          <?php endif; ?> 
          <div class="pager">
            <?php get_template_part( 'pagination' ); 

                    wp_link_pages( array(

                      'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'luque' ) . '</span>',

                      'after'       => '</div>',

                      'link_before' => '<span>',

                      'link_after'  => '</span>',

                    ) );

                  ?>   
          </div><!--.pager--> 
        </div><!--col-70-->
        <div class="col-30">
          <?php if(!dynamic_sidebar('widgetscolumn')); ?>
        </div><!--.col-30-->   
    </div><!--.father-col clearfix-->
  </div><!--.esection grid-->
 </div><!--bog-->
<?php get_footer(); ?>