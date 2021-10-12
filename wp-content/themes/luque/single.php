<?php get_header('clean'); ?>
  <section class="slider-container">
    <ul class="slider-wrapper">
      <li class="slide-current">
       <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/background-3.jpg">
       <div class="caption">
        <div class="clearfix grid">
          <div class="line"></div>
          <h3 class="caption-title"><?php esc_html_e( 'Hi! this is single', 'luque' ); ?></h3>
          <p><?php esc_html_e( 'description single', 'luque' ); ?></p>
        </div><!--clearfix grid-->
      </div><!--.caption-->
    </li>
  </ul>
  </section>
  <div class="sbog">
    <div class="esection grid">
      <div class="father-col clearfix">
        <div class="col-75">
          <?php if (have_posts()) : while (have_posts()) : the_post();?>
            <div class="entryb">    
              <?php the_post_thumbnail('full'); ?>  
              <h1> <?php the_title(); ?> </h1>
              <ul class="dat">
                <li>
                  <?php the_date() ?>/
                </li>
                <li>
                  <?php the_author(); ?>
                </li>
              </ul>
              <p><?php the_content(); ?></p>
              <ul>
                <li class="image">
                 <?php 
                 the_post_thumbnail();
                 ?>
               </li>
             </ul>
             <?php get_the_tags(); ?>
             <?php get_template_part( 'parts/content-share', get_post_format() ); ?>
           </div><!--.entryb-->
        <?php endwhile;
      endif;
      ?> 
    </div><!--col-75-->
        <div class="col-25">
          <?php  get_sidebar(); ?>
        </div><!--.col-25-->
      </div><!--.father-col clearfix-->
    </div><!--.esection grid-->
  </div><!--sbog-->
<?php get_footer(); ?>