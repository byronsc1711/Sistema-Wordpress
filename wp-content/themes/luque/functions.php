<?php

/*  -----------------------------------------------------------------------------------------------
  THEME SUPPORTS
  Default setup.
  --------------------------------------------------------------------------------------------------- */
  function luque_theme_support() {
    // Automatic feed
    add_theme_support( 'automatic-feed-links' );
    // Custom background color
    add_theme_support( 'custom-background', array(
      'default-color' => 'FFFFFF'
    ) );
    // Set content-width
    global $content_width;
    if ( ! isset( $content_width ) ) {
      $content_width = 580;
    }
    // Post thumbnails
    add_theme_support( 'post-thumbnails' );
    // Set post thumbnail size
    $low_res_images = get_theme_mod( 'luque_activate_low_resolution_images', false );
    if ( $low_res_images ) {
      set_post_thumbnail_size( 1120, 9999 );
    } else {
      set_post_thumbnail_size( 2240, 9999 );
    }
    // Add image sizes
    add_image_size( 'luque_preview_image_low_resolution', 540, 9999 );
    add_image_size( 'luque_preview_image_high_resolution', 1080, 9999 );
    add_image_size( 'luque_fullscreen', 1980, 9999 );
    // Custom logo
    add_theme_support( 'custom-logo', 
      array(
        'height'      => 100,
        'width'       => 400,
        'flex-width' => true,
        'header-text' => array( 'site-title', 'site-description' ),
      ) 
    );
    // Title tag
    add_theme_support( 'title-tag' );
    // HTML5 semantic markup
    add_theme_support( 'html5', array(
      'search-form',
      'comment-form',
      'comment-list',
      'gallery',
      'caption',
    ) );
    // Make the theme translation ready
    load_theme_textdomain( 'luque' );
    // Alignwide and alignfull classes in the block editor
    add_theme_support( 'align-wide' );
  }
  add_action( 'after_setup_theme', 'luque_theme_support' );

/*  -----------------------------------------------------------------------------------------------
  REGISTER STYLES & SCRIPTS
  Register and enqueue CSS & JavaScript
  --------------------------------------------------------------------------------------------------- */
  function luque_main_scripts() {
    wp_enqueue_style( 'luque_style', get_stylesheet_uri() );
    wp_enqueue_style( 'luque_main', get_template_directory_uri() . '/assets/css/luque_main.css', array(), '1.1', 'all');
    wp_enqueue_style( 'luque_normalize', get_template_directory_uri() . '/assets/css/luque_normalize.css', array(), '1.1', 'all');
    wp_enqueue_style('google-fonts', '//fonts.googleapis.com/css?family=Noto+Serif:400,700|Quicksand:400,500,700', array());

    wp_enqueue_script( 'luque_main-script', get_template_directory_uri() . '/assets/js/luque_main.js', array( 'jquery' ));
    wp_enqueue_script( 'luque-index-script', get_template_directory_uri() . '/assets/js/index.js', array( 'jquery' ));
    wp_enqueue_script( 'luque_jquery.slides.min', get_template_directory_uri() . '/assets/js/luque_jquery.slides.min.js', array( 'jquery' ));

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
      wp_enqueue_script( 'comment-reply' );
    }
  }
  add_action( 'wp_enqueue_scripts', 'luque_main_scripts' );

/* ---------------------------------------------------------------------------------------------
   EDITOR STYLES FOR THE CLASSIC EDITOR
   --------------------------------------------------------------------------------------------- */
   function luque_classic_editor_styles() {
    $classic_editor_styles = array(
      '/assets/css/editor-style-classic.css',
    );
    add_editor_style( $classic_editor_styles );
  }
  add_action( 'init', 'luque_classic_editor_styles' );

/*  -----------------------------------------------------------------------------------------------
  MENUS
  Register navigational menus (wp_nav_menu)
  --------------------------------------------------------------------------------------------------- */
  function luque_menus() {
    register_nav_menus(
      array(     
        'primary'  => __( 'Primary Menu', 'luque' ),
        'expanded' => __( 'Desktop Expanded Menu', 'luque' ),
        'mobile'   => __( 'Mobile Menu', 'luque' ),
        'foot' => __( 'Foot Menu', 'luque' ),
        'social'   => __( 'Social Menu', 'luque' ),
        'work'   => __( 'Work Menu', 'luque' ),
      )
    );
  }
  add_action( 'init', 'luque_menus' );

/* ------------------------------------------------------------------------------------------------
   REGISTER THEME WIDGETS
   --------------------------------------------------------------------------------------------------- */
   function luque_widgets_luque() {
    register_sidebar( array(
      'name'          => esc_html__( 'widget foot', 'luque' ),
      'id'            => 'widgetsfoot',
      'description'   => esc_html__( 'Add widgets here.', 'luque' ),
      'before_widget' => '<section id="%1$s" class="widget %2$s">',
      'after_widget'  => '</section>',
      'before_title'  => '<h2 class="widget-title">',
      'after_title'   => '</h2>',
    ) );
    register_sidebar( array(
      'name'          => esc_html__( 'widget column', 'luque' ),
      'id'            => 'widgetscolumn',
      'description'   => esc_html__( 'Add widgets here.', 'luque' ),
      'before_widget' => '<section id="%1$s" class="widget %2$s">',
      'after_widget'  => '</section>',
      'before_title'  => '<h2 class="widget-title">',
      'after_title'   => '</h2>',
    ) );
    register_sidebar( array(
      'name'          => esc_html__( 'widget single', 'luque' ),
      'id'            => 'widgetssingle',
      'description'   => esc_html__( 'Add widgets here.', 'luque' ),
      'before_widget' => '<section id="%1$s" class="widget %2$s">',
      'after_widget'  => '</section>',
      'before_title'  => '<h2 class="widget-title">',
      'after_title'   => '</h2>',
    ) );
  }
  add_action( 'widgets_init', 'luque_widgets_luque' );

/*  -----------------------------------------------------------------------------------------------
  EXCERPT
  --------------------------------------------------------------------------------------------------- */
  function luque_custom_length_excerpt($word_count_limit) {
    $content = wp_strip_all_tags(get_the_excerpt() , true );
    echo wp_trim_words($content, $word_count_limit);
  }
  add_filter('luque_custom_length_excerpt', 'luque_custom_length_excerpt');

/*  -----------------------------------------------------------------------------------------------
  ELIPSIS
  --------------------------------------------------------------------------------------------------- */
  function luque_new_excerpt_more( $more ) {
    if ( is_admin() ) return $more;
  }
  add_filter('excerpt_more', 'luque_new_excerpt_more');

/*  -----------------------------------------------------------------------------------------------
  DIFFERENT SINGLE PAGES
  --------------------------------------------------------------------------------------------------- */
function custom_single_template($the_template) {
    foreach ( (array) get_the_category() as $cat ) {
        if ( locate_template("single-{$cat->slug}.php") ) {
            return locate_template("single-{$cat->slug}.php");
        }
    }
    return $the_template;
}
add_filter( 'single_template', 'custom_single_template');


/*  -----------------------------------------------------------------------------------------------
  RELATED POSTS
  --------------------------------------------------------------------------------------------------- */
  function luque_related_post($titulo,$post_ID,$max_posts=5)
  {
   $i=0;
   $tags = wp_get_post_tags($post_ID);
   if($tags)
   {
     $first_tag = $tags[0]->term_id;
     $args=array(
       'tag__in' => array($first_tag),
       'post__not_in' => array($post_ID),
       'showposts'=> ($max_posts),
       'caller_get_posts'=>1
     );
     $consulta = new WP_Query($args);
     if( $consulta->have_posts() ) {
       echo $titulo.'<ul class="luque_related_post">';
       while ($consulta->have_posts()) : $consulta->the_post();
         if($i<$max_posts){
           echo '<div class="box">'; 
           echo '<li><a class="img" href="'.get_permalink().'" title="'.get_the_title().'"'.'" img="'. get_the_post_thumbnail().''.get_the_post_thumbnail().'</a></li>';
           echo '<li><a class="tit" href="'.get_permalink().'" title="'.get_the_title().'">'.get_the_title().'</a></li>';
           echo the_tags("");               
           echo '</div>';  
           ;
           $i++;
         }
       endwhile;
       echo '</ul>';
     }
   }
   wp_reset_query();
 }
 ?>