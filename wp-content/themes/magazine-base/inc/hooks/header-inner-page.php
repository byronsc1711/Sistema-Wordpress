<?php
global $post;
if (!function_exists('magazine_base_single_page_title')) :
    function magazine_base_single_page_title()
    { 
        if (is_home()) {
            return;
        }
        global $post;
        $global_banner_image = get_header_image();
        // Check if single.
            if (is_singular()) {
                if ( has_post_thumbnail( $post->ID ) ) {
                    $banner_image_single_post = get_post_meta( $post->ID, 'magazine-base-meta-checkbox', true );
                    if ( 'yes' == $banner_image_single_post ) {
                        $banner_image_array = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'magazine-base-header-image' );
                        $global_banner_image = $banner_image_array[0];
                    }
                }
            }
            ?>
        <div class="wrapper page-inner-title inner-banner primary-bgcolor data-bg " data-background="<?php echo esc_url($global_banner_image); ?>">
            <header class="entry-header">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <?php if (is_singular()) { ?>
                                <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
                                <?php if (!is_page()) { ?>
                                    <header class="entry-header">
                                        <div class="entry-meta entry-inner">
                                            <?php
                                                magazine_base_posted_on(); 
                                            ?>
                                        </div><!-- .entry-meta -->
                                    </header><!-- .entry-header -->
                                <?php }
                            } elseif (is_404()) { ?>
                                <h1 class="entry-title"><?php esc_html_e('Oops! That page can&rsquo;t be found.', 'magazine-base'); ?></h1>
                            <?php } elseif (is_archive()) {
                                the_archive_title('<h1 class="entry-title">', '</h1>');
                                the_archive_description('<div class="taxonomy-description">', '</div>');
                            } elseif (is_search()) { ?>
                                <h1 class="entry-title"><?php printf(esc_html__('Search Results for: %s', 'magazine-base'), '<span>' . get_search_query() . '</span>'); ?></h1>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </header><!-- .entry-header -->
            <div class="bg-overlay"></div>
        </div>

        <?php if( !is_404() ){ ?>
        <div class="breadcrumb-wrapper">
            <div class="container">
                <div class="row">
                    <?php
                    /**
                     * Hook - magazine_base_add_breadcrumb.
                     */
                    do_action( 'magazine_base_action_breadcrumb' );
                    ?>
                </div>
            </div>
        </div>

        <?php
        }
    }
endif;
add_action('magazine-base-page-inner-title', 'magazine_base_single_page_title', 15);
