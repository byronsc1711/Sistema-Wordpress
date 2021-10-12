<?php get_header(); ?>
  <section class="slider-container">
    <ul class="slider-wrapper">
      <li class="slide-current">
       <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/background-3.jpg">
      <div class="caption">
        <div class="clearfix grid">
          <div class="line"></div>
          <h3 class="caption-title"><?php esc_html_e( 'Hi! thi is the page', 'luque' ); ?></h3>
          <p><?php esc_html_e( 'description the page', 'luque' ); ?></p>
        </div><!--clearfix grid-->
      </div><!--.caption-->
      </li>
    </ul>
  </section>

  <div class="esection grid">
    <div class="father-col clearfix">
      <div class="study">
        <?php if (have_posts()) : 
          while (have_posts()) : 
            the_post();
            ?>
          <div class="content">
              <?php the_content(); ?>
          </div><!--.content-->
          <div class="col-33">    
            <div>
              <span><strong><?php esc_html_e( 'Aenean vulputate', 'luque' ); ?></span></strong>
              <p> 
                <?php esc_html_e( 'Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. ', 'luque' ); ?>                        
              </p>
            </div>
            <div>
              <span><strong><?php esc_html_e( 'Aenean eleifend', 'luque' ); ?></span></strong>
              <p> 
                <?php esc_html_e( 'Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. ', 'luque' ); ?>                        
              </p>
            </div>
            <div>
              <span><strong><?php esc_html_e( 'Phasellus viver null', 'luque' ); ?></span></strong>
              <p> 
                <?php esc_html_e( 'Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. ', 'luque' ); ?>                        
              </p>
            </div>
          </div><!--.col-33-->
            
        <?php endwhile;
         endif;
         ?> 
      </div><!--.study-->
    </div><!--.father-col clearfix-->
  </div><!--esection grid-->
  <div class="image-study">
    <?php if ( has_post_thumbnail() ) {the_post_thumbnail();} ?>
   </div><!--.image-study-->
   <div class="esection grid">
    <div class="father-col clearfix">
      <div class="study">
        <div class="cultur content4">
          <h1><?php esc_html_e( 'Aliquam lorem', 'luque' ); ?></h1>
            <div class="col-55">
              <div class="left">
                <div class="cultur-content">
                  <h2><?php esc_html_e( 'Etiam ultricies nisi', 'luque' ); ?></h2>
                  <h3><?php esc_html_e( 'Tellus eget condimentum', 'luque' ); ?></h3>
                 <p> 
                    <?php esc_html_e( 'Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. ', 'luque' ); ?>                        
                  </p>
                </div><!--.cultur-content-->
                <div class="cultur-content">
                  <h2><?php esc_html_e( 'Aliquam loremante', 'luque' ); ?></h2>
                  <h3><?php esc_html_e( 'Maecenas tempus eget', 'luque' ); ?></h3>
                 <p> 
                    <?php esc_html_e( 'Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. ', 'luque' ); ?>                        
                  </p>
                </div><!--.cultur-content-->
              </div><!--left-->
              <div class="right">
                <div class="cultur-content-right">
                  <h2><?php esc_html_e( 'Sem nequesed', 'luque' ); ?></h2>
                  <h3><?php esc_html_e( 'Etiam ultricinisi', 'luque' ); ?></h3>
                 <p> 
                    <?php esc_html_e( 'Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. ', 'luque' ); ?>                        
                  </p>
                </div><!--.cultur-content-->
                <div class="cultur-content-right">
                   <h2><?php esc_html_e( 'Sem quam semper libero', 'luque' ); ?></h2>
                  <h3><?php esc_html_e( 'Sem quam semper libero', 'luque' ); ?></h3>
                 <p> 
                    <?php esc_html_e( 'Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. ', 'luque' ); ?>                        
                  </p>
                </div><!--.cultur-content-right-->
              </div><!--right-->
            </div><!--.col-55-->
            </div><!--.cultur-->
          </div><!--.study-->
      </div><!--.father-col clearfix-->
    </div><!--esection grid-->
  
   <div class="father-col clearfix">
      <div class="maxinfo">
        <div class="col-55">
          <div class="left">
            <div class="gridd">
              <?php
                  // Get the ID of a given category
                  $category_id = get_cat_ID( 'blog' );
               
                  // Get the URL of this category
                  $category_link = get_category_link( $category_id );
              ?>
              <a class="knowmore"  target="blank" href="<?php echo esc_url( $category_link ); ?>" title="Know more"><?php esc_html_e( 'Know more', 'luque' ); ?></a>

              <p class="definition"><?php esc_html_e( 'Blog', 'luque' ); ?></p>
              <p class="description"><?php esc_html_e( 'Take a look at our blog', 'luque' ); ?></p>
              <?php
                  // Get the ID of a given category
                  $category_id = get_cat_ID( 'blog' );
               
                  // Get the URL of this category
                  $category_link = get_category_link( $category_id );
              ?>
              <a class="knowmore"  target="blank" href="<?php echo esc_url( $category_link ); ?>" title="See our blog"><?php esc_html_e( 'See our blog', 'luque' ); ?></a>
            </div><!--.grid-->
          </div><!--.left-->
          <div class="right">
            <div class="gridd">
              <?php
                  // Get the ID of a given category
                  $category_id = get_cat_ID( 'trabajos' );
               
                  // Get the URL of this category
                  $category_link = get_category_link( $category_id );
              ?>
              <a class="knowmore"  target="blank" href="<?php echo esc_url( $category_link ); ?>" title="Our jobs"><?php esc_html_e( 'Our jobs', 'luque' ); ?></a>
              <p class="definition"><?php esc_html_e( 'Jobs', 'luque' ); ?></p>
              <p class="description"><?php esc_html_e( 'See our work', 'luque' ); ?></p>
              <?php
                  // Get the ID of a given category
                  $category_id = get_cat_ID( 'trabajos' );
               
                  // Get the URL of this category
                  $category_link = get_category_link( $category_id );
              ?>
              <a class="knowmore"  target="blank" href="<?php echo esc_url( $category_link ); ?>" title="See our work"><?php esc_html_e( 'See our work', 'luque' ); ?></a>
            </div><!--.grid-->
          </div><!--.right-->
        </div><!--.col-55-->
      </div><!--.maxinfo-->
   </div><!--.father-col clearfix-->
   
     <div class="work-we">
       <div class="grid">
        <a target="blank" href="<?php echo get_permalink( get_page_by_title( 'contacto' ) ); ?>"><?php esc_html_e( 'Go work together', 'luque' ); ?></a> 
       </div><!--.grid-->
     </div><!--.work-we-->
<?php get_footer(); ?>