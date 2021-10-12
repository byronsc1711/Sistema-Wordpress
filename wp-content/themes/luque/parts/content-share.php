    <div class="share-post">
        <h4><?php esc_html_e( 'To share', 'luque' ); ?></h4>
        <a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" class="facebook" target="_blank">
            <i class="icon-social-facebook"></i><?php esc_html_e( 'Facebook', 'luque' ); ?>
        </a>
        <a href="https://twitter.com/intent/tweet?url=<?php the_permalink(); ?>&text=<?php the_title_attribute(); ?>" class="twitter" target="_blank">
            <i class="icon-social-twitter"></i>
        </a>
        <a href="https://plus.google.com/share?url=<?php the_permalink(); ?>" class="googleplus" target="_blank">
            <i class="icon-social-linkedin"></i>
        </a>
       <?php //We get the URL of the featured image
       $pin_imagen = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large' ); ?>
       <a href="https://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&media=<?php echo $pin_imagen[0]; ?>" class="pinterest" target="_blank">
        <i class="icon-social-pinterest"></i> 
    </a>
    </div> <!-- /. share-post -->