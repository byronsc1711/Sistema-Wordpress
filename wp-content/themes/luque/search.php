<?php get_header(); ?>
  <section class="slider-container">
    <ul class="slider-wrapper">
      <li class="slide-current">
       <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/contacto-2.jpg">
       <div class="caption">
        <div class="clearfix grid">
          <div class="line"></div>
          <h3 class="caption-title"><?php esc_html_e( 'Hi! thi is the searcher', 'luque' ); ?></h3>
          <p><?php esc_html_e( 'description, thi is search', 'luque' ); ?></p>
        </div><!--clearfix grid-->
      </div><!--.caption-->
    </li>
  </ul>
  </section>
  <div class="esection grid">
    <div class="father-col clearfix">
      <div class="coinc">
        <h2>
          <?php printf( esc_html__( 'Results found: %s', 'luque' ), '<span>' . get_search_query() . '</span>' ); ?>     
        </h2>
      </div><!--.coinc--> 

      <?php if (have_posts()) : 
        while (have_posts()) : 
          the_post();
          ?>
          <article class="short-entry-search" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
           <div class="content4">
            <div class="col-50">

              <div class="image">
                <?php the_post_thumbnail('large'); ?>
              </div><!--.image-->
              <div class="entrydates">
                <h1>
                  <a href="<?php the_permalink(); ?>">
                    <?php the_title(); ?>
                  </a>
                </h1>
                <p><?php luque_custom_length_excerpt(11) ?></p>
                <div class="read-more">
                  <a href="<?php the_permalink(); ?>"><i class="icon-arrow-right" aria-hidden="true"></i></a>
                </div><!--read-more-->
              </div><!--.entrydates-->
            </div><!--.col-50-->
          </div><!--content4-->          
        </article>
      <?php endwhile; else : ?>
    </div><!--.father-col clearfix-->
  </div><!--.esection grid-->
  
  <div class="esection grid">
    <div class="father-col clearfix">  
      <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <h1><?php esc_html_e('No content available', 'luque'); ?></h1>       
        <div class="">
          <p><?php esc_html_e('There is no content corresponding to this page, please do a search to find what you are looking for', 'luque'); ?></p>
          <?php get_search_form(); ?>
        </div>
      </article>  <!-- article -->
    <?php endif; ?>
    <div class="pager">
      <?php get_template_part( 'pagination' ); ?>    
    </div><!--.pager--> 
    </div><!--.father-col .clearfix--> 
  </div><!--.esection .grid-->      
  </section>
<?php get_footer(); ?>