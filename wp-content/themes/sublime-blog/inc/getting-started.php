<?php 

if( ! function_exists( 'sublime_blog_getting_started_menu' ) ) :
/**
 * Adding Getting Started Page in admin menu
 */
function sublime_blog_getting_started_menu(){	
	add_theme_page(
		__( 'Getting Started', 'sublime-blog' ),
		__( 'Getting Started', 'sublime-blog' ),
		'manage_options',
		'sublime-blog-getting-started',
		'sublime_blog_getting_started_page'
	);
}
endif;
add_action( 'admin_menu', 'sublime_blog_getting_started_menu' );

if( ! function_exists( 'sublime_blog_getting_started_admin_scripts' ) ) :
/**
 * Load Getting Started styles in the admin
 */
function sublime_blog_getting_started_admin_scripts(){
    wp_enqueue_style( 'sublime-blog-getting-started', get_template_directory_uri() . '/inc/css/getting-started.css', array(), false );
}
endif;
add_action( 'admin_enqueue_scripts', 'sublime_blog_getting_started_admin_scripts' );

if( ! function_exists( 'sublime_blog_getting_started_page' ) ) :
/**
 * Callback function for admin page.
*/
function sublime_blog_getting_started_page(){ ?>
	<div class="wrap getting-started">
		<div class="heading-cover">
			<div class="heading">
				<h3><?php printf( esc_html__( 'Getting started with %1$s v%2$s', 'sublime-blog' ), SUBLIME_BLOG_THEME_NAME, SUBLIME_BLOG_THEME_VERSION ); ?></h3>
				<h4><?php printf( esc_html__( 'Get to know more about %1$s below.', 'sublime-blog' ), SUBLIME_BLOG_THEME_NAME ); ?></h4>
			</div>
		</div>
        <div class="doc-starter">
            <div class="postbox">
                <h2 class="ast-normal-cusror">
                    <span class="dashicons dashicons-book"></span>
                    <span><?php esc_html_e( 'Knowledge Base', 'sublime-blog' ); ?></span>
                </h2>
                <div class="inside">
                    <p><?php esc_html_e( 'Not sure how something works? Take a peek at the knowledge base and learn.', 'sublime-blog' ); ?></p>
                    <a href="<?php echo esc_url( 'https://docs.sublimetheme.com/' . SUBLIME_BLOG_TEXT_DOMAIN . '/' ); ?>" target="_blank" rel="noopener"><?php esc_html_e( 'Knowledge Base »', 'sublime-blog' ); ?></a>             
                </div>
            </div>  
            <div class="postbox">
                <h2 class="ast-normal-cusror">
                    <span class="dashicons dashicons-visibility"></span>
                    <span><?php esc_html_e( 'View Demo', 'sublime-blog' ); ?></span>
                </h2>
                <div class="inside">
                    <p><?php esc_html_e( 'If you want to check our demo then you can visit us at:', 'sublime-blog' ); ?></p>
                    <a href="<?php echo esc_url( 'https://demo.sublimetheme.com/' . SUBLIME_BLOG_TEXT_DOMAIN . '/' ); ?>" target="_blank" rel="noopener"><?php esc_html_e( 'View Demo »', 'sublime-blog' ); ?></a>             
                </div>
            </div>  
             <div class="postbox">
                <h2 class="ast-normal-cusror">
                    <span class="dashicons dashicons-format-aside"></span>
                    <span><?php esc_html_e( 'About Theme', 'sublime-blog' ); ?></span>
                </h2>
                <div class="inside">
                    <p><?php esc_html_e( 'You can get the detail information about the theme from here:', 'sublime-blog' ); ?></p>
                    <a href="<?php echo esc_url( 'https://sublimetheme.com/wordpress-themes/' . SUBLIME_BLOG_TEXT_DOMAIN . '/' ); ?>" target="_blank" rel="noopener"><?php esc_html_e( 'Know more about our theme »', 'sublime-blog' ); ?></a>             
                </div>
            </div>  
            <div class="postbox">
                <h2 class="ast-normal-cusror">
                    <span class="dashicons dashicons-businessman"></span>
                    <span><?php esc_html_e( 'Five Star Support', 'sublime-blog' ); ?></span>
                </h2>
                <div class="inside">
                    <p><?php esc_html_e( 'Got a question? Get in touch with Sublime Theme Support Department. We are happy to help!', 'sublime-blog' ); ?></p>
                    <a href="<?php echo esc_url( 'https://sublimetheme.com/support/' ); ?>" target="_blank" rel="noopener"><?php esc_html_e( 'Get Support »', 'sublime-blog' ); ?></a>             
                </div>
            </div>  
            <div class="postbox">
                <h2 class="ast-normal-cusror">
                    <span class="dashicons dashicons-star-filled"></span>
                    <span><?php esc_html_e( 'Leave us a review', 'sublime-blog' ); ?></span>
                </h2>
                <div class="inside">
                    <p><?php esc_html_e( 'If you like what you saw and felt it good about the theme you can help us by reviewing it on WordPress', 'sublime-blog' ); ?></p>
                    <a href="<?php echo esc_url( 'https://wordpress.org/support/theme/' . SUBLIME_BLOG_TEXT_DOMAIN . '/reviews/' ); ?>" target="_blank" rel="noopener"><?php esc_html_e( 'Leave us a review »', 'sublime-blog' ); ?></a>             
                </div>
            </div>  
        </div>
	</div><!-- .getting-started -->
	<?php
}
endif;

if( ! function_exists( 'sublime_blog_admin_notice' ) ) :
/**
 * Addmin notice for getting started page
*/
function sublime_blog_admin_notice(){
    global $pagenow;
    $meta            = get_option( 'sublime_blog_admin_notice' );
    $current_screen  = get_current_screen();
    
    if( 'themes.php' == $pagenow && !$meta ){
        
        if( $current_screen->id !== 'dashboard' && $current_screen->id !== 'themes' ){
            return;
        }

        if( is_network_admin() ){
            return;
        }

        if( ! current_user_can( 'manage_options' ) ){
            return;
        } ?>

        <div class="welcome-message notice notice-info">
            <div class="notice-wrapper">
                <div class="notice-text">
                    <h3><?php esc_html_e( 'Congratulations!', 'sublime-blog' ); ?></h3>
                    <p><?php printf( __( '%1$s is now installed and ready to use. Click below to see theme documentation and other details to get started.', 'sublime-blog' ), SUBLIME_BLOG_THEME_NAME ) ; ?></p>
                    <p><a href="<?php echo esc_url( admin_url( 'themes.php?page=sublime-blog-getting-started' ) ); ?>" class="button button-primary"><?php esc_html_e( 'Go to the Getting Started.', 'sublime-blog' ); ?></a></p>
                    <p class="dismiss-link"><strong><a href="?sublime_blog_admin_notice=1"><?php esc_html_e( 'Dismiss', 'sublime-blog' ); ?></a></strong></p>
                </div>
            </div>
        </div>
    <?php }
}
endif;
add_action( 'admin_notices', 'sublime_blog_admin_notice' );

if( ! function_exists( 'sublime_blog_update_admin_notice' ) ) :
/**
 * Updating admin notice on dismiss
*/
function sublime_blog_update_admin_notice(){
    if ( isset( $_GET['sublime_blog_admin_notice'] ) && $_GET['sublime_blog_admin_notice'] = '1' ) {
        update_option( 'sublime_blog_admin_notice', true );
    }
}
endif;
add_action( 'admin_init', 'sublime_blog_update_admin_notice' );