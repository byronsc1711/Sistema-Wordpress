<?php /* Template Name: Contact */ ?>
<?php get_header(); ?>  
	<section class="slider-container">
		<ul class="slider-wrapper">
			<li class="slide-current">
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/contact-1.jpg">
				<div class="caption">
					<div class="clearfix grid">
						<div class="line"></div>
						<h3 class="caption-title"><?php esc_html_e( 'We make you different so,', 'luque' ); ?></h3>
						<p><?php esc_html_e( 'that you stand out', 'luque' ); ?></p>
					</div><!--clearfix grid-->
				</div><!--.caption-->
			</li>
		</ul>
	</section>

  <div class="esection grid">
  <div class="father-col clearfix">
    <div class="contact col-30">
                <div class="image">
                  <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/RV-10.png">
                </div><!--.image-->
                <div class="description">
                  <h1><?php esc_html_e( 'malesuada', 'luque' ); ?></h1>
                  <p>
                    <?php esc_html_e( 'Cras sollicitudin neque eget nibh pulvinar, ut finibus tellus sodales. Morbi at odio malesuada, pulvinar elit non, euismod libero.', 'luque' ); ?>
                  </p>
                    
                  <p>
                    <?php esc_html_e( '600 000 000', 'luque' ); ?>
                  </p>
                  
                </div><!--.description-->
              
           </div><!--.col-30-->
           <div class="contact col-30">
                <div class="image">
                  <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/RV-12.png">
                </div><!--.image-->
                <div class="description">
                  <h1><?php esc_html_e( 'consectetur', 'luque' ); ?></h1>
                  <p>
                    <?php esc_html_e( 'Cras sollicitudin neque eget nibh pulvinar, ut finibus tellus sodales. Morbi at odio malesuada, pulvinar elit non, euismod libero.', 'luque' ); ?>
                  </p>
                    
                  <p>
                    <?php esc_html_e( '600 000 000', 'luque' ); ?>
                  </p>
                  
                </div><!--.description-->
              
           </div><!--.col-30-->
           <div class="contact col-30">
                <div class="image">
                  <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/RV-13.png">
                </div><!--.image-->
                <div class="description">
                  <h1><?php esc_html_e( 'sodales', 'luque' ); ?></h1>
                  <p>
                    <?php esc_html_e( 'Cras sollicitudin neque eget nibh pulvinar, ut finibus tellus sodales. Morbi at odio malesuada, pulvinar elit non, euismod libero.', 'luque' ); ?>
                  </p>
                    
                  <p>
                    <?php esc_html_e( '600 000 000', 'luque' ); ?>
                  </p>
                  
                </div><!--.description-->
              
           </div><!--.col-30-->
  </div><!--.father-col clearfix-->
</div><!--.esection .grid-->
  
	<div class="n-t">
		<div class="contact grid">
			<div class="captionc">
				<p><?php esc_html_e("we invite you to leave us ", "luque"); ?></p>
				<p><?php esc_html_e("your questions", "luque"); ?></p>
				<div></div>
			</div><!--.captionc-->
    <div class="esection">
      <div class="father-col clearfix">
      <?php if (have_posts()) : while (have_posts()) : the_post();?>
              <?php the_content(); ?> 
      <?php endwhile;
    endif;
    ?>
    </div><!--.father-col clearfix-->
    </div><!--.esection-->
	</div><!--contact-->
	</div><!--n-t--> 



<?php get_footer(); ?>