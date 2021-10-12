<div class="esection grid">
  <div class="father-col clearfix">
    <h3>
      <?php esc_html_e("Related Post", "luque"); ?>
    </h3>
<?php
  $categories = get_the_category($post->ID);
  if ($categories) {
   $category_ids = array();
   foreach($categories as $individual_category) $category_ids[] = $individual_category->term_id;
   $args=array(
     'category__in' => $category_ids,
     'post__not_in' => array($post->ID),
     'showposts'=>5, // Number of related posts that will be shown.
     ); 
   $my_query = new WP_Query($args);
   if( $my_query->have_posts() ) {
     echo '<ul>';
     while ($my_query->have_posts()) {
       $my_query->the_post();
       ?>
        <div class="col-20">
          <li><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></li>       
          <li><a href="<?php the_permalink() ?>"><?php the_post_thumbnail('thumbnail'); ?></a></li>
        </div><!--.col-25-->
       <?php
     }
     echo '</ul>';
   }
  }
  wp_reset_postdata();
?>
  </div><!--.father-col clearfix-->
</div><!--.esection grid-->