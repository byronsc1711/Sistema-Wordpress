<!--SECOND FORM PAGER-->
<nav>
  <?php if( get_next_posts_link() || get_previous_posts_link() ) {?>

    <div class="posts-nav cf">

      <?php next_posts_link (__('&larr; Previous', 'luque') ); ?>

      <?php previous_posts_link (__('Recents &rarr;', 'luque') ); ?>

    </div>

  <?php } ?>

</nav>