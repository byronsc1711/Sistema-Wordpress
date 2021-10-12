<?php
/**
 * The template part for displaying single post
 *
 * @package advance-it-company
 * @subpackage advance-it-company
 * @since advance-it-company 1.0
 */
?> 
<?php 
  $archive_year  = get_the_time('Y'); 
  $archive_month = get_the_time('m'); 
  $archive_day   = get_the_time('d'); 
?>  
<article class="page-box-single">
  <h1><?php the_title();?></h1>
  <?php if( get_theme_mod( 'advance_it_company_show_featured_image_single_post',true) != '') { ?>
    <div class="box-img">
      <?php the_post_thumbnail(); ?>
    </div>
  <?php } ?>
  <div class="new-text">
    <?php if( get_theme_mod( 'advance_it_company_date_hide',true) != '' || get_theme_mod( 'advance_it_company_comment_hide',true) != '' || get_theme_mod( 'advance_it_company_author_hide',true) != '') { ?>
      <div class="metabox">
        <?php if( get_theme_mod( 'advance_it_company_date_hide',true) != '') { ?>
          <span class="entry-date"><i class="fa fa-calendar"></i><a href="<?php echo esc_url( get_day_link( $archive_year, $archive_month, $archive_day)); ?>"><?php echo esc_html( get_the_date() ); ?><span class="screen-reader-text"><?php echo esc_html( get_the_date() ); ?></span></a></span><?php echo esc_html( get_theme_mod('advance_it_company_metabox_separator_blog_post') ); ?>
        <?php } ?>
        <?php if( get_theme_mod( 'advance_it_company_comment_hide',true) != '') { ?>
          <span class="entry-comments"><i class="fas fa-comments"></i><?php comments_number( __('0 Comments','advance-it-company'), __('0 Comments','advance-it-company'), __('% Comments','advance-it-company') ); ?></span><?php echo esc_html( get_theme_mod('advance_it_company_metabox_separator_blog_post') ); ?>
        <?php } ?>
        <?php if( get_theme_mod( 'advance_it_company_author_hide',true) != '') { ?>
          <span class="entry-author"><i class="fa fa-user"></i><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' )) ); ?>"><?php the_author(); ?><span class="screen-reader-text"><?php the_author(); ?></span></a></span>
        <?php } ?>
      </div>
    <?php }?>
    <div class="entry-content"><p><?php the_content();?></p></div>
    <?php if( get_theme_mod( 'advance_it_company_tags_hide',true) != '') { ?>
      <div class="tags"><p><?php
        if( $tags = get_the_tags() ) {
          echo '<i class="fas fa-tags"></i>';
          echo '<span class="meta-sep"></span>';
          foreach( $tags as $content_tag ) {
            $sep = ( $content_tag === end( $tags ) ) ? '' : ' ';
            echo '<a href="' . esc_url(get_term_link( $content_tag, $content_tag->taxonomy )) . '">' . esc_html($content_tag->name) . '</a>' . esc_html($sep);
          }
        } ?></p>
      </div>
    <?php } ?>
  </div>
  <div class="clearfix"></div>
</article>