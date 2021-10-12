<?php get_header(); ?>
  <section class="slider-container">
    <?php get_template_part( 'parts/slideshow', get_post_format() ); ?>
  </section>
  <div class="our-jobs">
    <div class="esection grid"> 
      <div class="father-col clearfix">
        <div class="sections gridcat">
          <h1><?php esc_html_e('Nullam quis ante', 'luque'); ?></h1>      
          <p><?php esc_html_e('Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc.', 'luque'); ?></p>
          <ul>
            <?php wp_nav_menu( array( 
                              'theme_location' => 'work',
                              /*'menu_id' => 'menu-above',
                              'container' => 'div',
                              'container_class' => 'collapse navbar-collapse',
                              'container_id' => 'navbarResponsive',
                              'items_wrap' => '%3$s',
                              'menu_class' => 'navbar-nav ml-auto' */
                              ));
                              ?>
          </ul>
        </div><!--.sections .gridcat-->
      
        <?php if (have_posts()) : 
          while (have_posts()) : 
            the_post();
            ?>
              <div class="content4">
                    <div class="col-50">
                        <a  href="<?php the_permalink(); ?>">
                          <div class="image">
                          <div class="imgho"></div>
                            <?php the_post_thumbnail('full'); ?>
                            </div><!--.image-->
                        </a>
                          <div class="cinfocat">
                            <a  class="cinfotitle" title="<?php the_title(); ?>" href="<?php the_permalink(); ?>"><?php the_title(); ?>
                            <?php the_category(); ?>
                          </div><!--.cinfocat-->                  
                    </div><!--.col-50-->
                  </div><!--content4-->
            <?php endwhile; else : ?>          
              <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <h1><?php esc_html_e('No content available', 'luque'); ?></h1>       
                <div class="">
                  <p><?php esc_html_e('There is no content corresponding to this page, please do a search to find what you are looking for', 'luque'); ?></p>
                  <?php get_search_form(); ?>
                </div>
              </article>
        <?php endif; ?>    
      </div><!--father-col clearfix-->
    </div> <!--.esection grid-->
  </div><!--.our-jobs-->
<?php get_footer(); ?>