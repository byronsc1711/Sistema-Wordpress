<?php
if ( !class_exists('Anecdote_Lite_Dashboard_Notice') ):

    class Anecdote_Lite_Dashboard_Notice{

        function __construct(){

            if( get_option('anecdote_lite_about_admin_notice')  != 'hide' ){
                add_action( 'admin_notices',array( $this,'anecdote_lite_about_admin_notiece' ) );
            }
            
            add_action( 'wp_ajax_anecdote_lite_about_notice_dismiss', array( $this, 'anecdote_lite_about_notice_dismiss' ) );
            add_action( 'switch_theme', array( $this, 'anecdote_lite_about_notice_clear_cache' ) );
            if( isset( $_GET['page'] ) && $_GET['page'] == 'anecdote-lite-about' ){

                add_action('in_admin_header', array( $this,'anecdote_lite_about_hide_all_admin_notice' ),1000 );

            }

        }

        public function anecdote_lite_about_hide_all_admin_notice(){

            remove_all_actions('admin_notices');
            remove_all_actions('all_admin_notices');

        }

        public function anecdote_lite_about_notice_dismiss(){

            if ( isset( $_POST[ '_wpnonce' ] ) && wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST[ '_wpnonce' ] ) ), 'anecdote_lite_ajax_nonce' ) ) {

                update_option('anecdote_lite_about_admin_notice','hide');

            }

            die();

        }

        public function anecdote_lite_about_notice_clear_cache(){

            update_option('anecdote_lite_about_admin_notice',true);

        }

        // Admin About Notice
        public static function anecdote_lite_about_admin_notiece(){

            $base_url = home_url();
            $theme_info      = wp_get_theme();
            $theme_name            = $theme_info->__get( 'Name' ); ?>

            <div id="wedevs-greeting-panel" class="notice notice-success wedevs-greeting-notice is-dismissible">

                <div class="greeting-panel-content">

                    <h2><?php esc_html_e('Congratulations!','anecdote-lite'); ?></h2>
                    <p class="about-description"><?php printf( __( '%1$s is now installed and ready to use. We\'ve assembled some links to get you started.', 'anecdote-lite' ), esc_html( $theme_name ) ); ?></p>

                    <div class="greeting-panel-wrapper">

                        <div class="greeting-panel-column greeting-panel-column-4">

                            <h3><?php esc_html_e('Get Started','anecdote-lite'); ?></h3>

                            <div class="wedevs-button-group">
                                <a target="_blank" class="button button-primary" href="https://preview.wedevstudios.com/anecdote-lite/">
                                    <?php esc_html_e('Live Preview','anecdote-lite'); ?>
                                </a>

                                <a target="_blank" class="button button-primary wedevs-upgrade-pro" href="https://wedevstudios.com/theme/anecdote-pro/">
                                    <?php esc_html_e('Upgrade','anecdote-lite'); ?>
                                </a>

                                <a target="_blank" class="button button-secondary" href="https://documentation.wedevstudios.com/docs/anecdote-wordpress-theme/">
                                    <?php esc_html_e('Documentation','anecdote-lite'); ?>
                                </a>
                            </div>

                            <p><?php esc_html_e('If you\'re having any issues with the theme, feel free to create a support ticket. We will investigate your inquiry as quickly as possible and then get back to you.','anecdote-lite'); ?></p>

                            <a target="_blank" class="button button-primary button-hero" href="https://wedevstudios.com/help-center/">
                                <span class="dashicons dashicons-sos"></span> <?php esc_html_e('Help Center','anecdote-lite'); ?>
                            </a>

                            <a class="button button-secondary button-hero" href="<?php echo esc_url($base_url . '/wp-admin/themes.php?page=anecdote-lite-about'); ?>">
                                <span class="dashicons dashicons-admin-home"></span> <?php esc_html_e('About Page','anecdote-lite'); ?>
                            </a>

                        </div>

                        <div class="greeting-panel-column greeting-panel-column-2">

                            <h3><?php esc_html_e('First Things First','anecdote-lite'); ?></h3>

                            <ul class="greeting-panel-list">
                                <li>
                                    <a href="<?php echo esc_url($base_url . '/wp-admin/customize.php?autofocus%5Bsection%5D=title_tagline'); ?>">
                                        <span class="dashicons dashicons-welcome-view-site"></span>
                                        <?php esc_html_e('Site identity', 'anecdote-lite'); ?>
                                    </a>
                                </li>

                                <li>
                                    <a href="<?php echo esc_url($base_url . '/wp-admin/customize.php?autofocus%5Bpanel%5D=anecdote_lite_home'); ?>">
                                        <span class="dashicons dashicons-admin-home"></span>
                                        <?php esc_html_e('Set up your homepage section', 'anecdote-lite'); ?>
                                    </a>
                                </li>

                                <li>
                                    <a href="<?php echo esc_url($base_url . '/wp-admin/customize.php?autofocus%5Bpanel%5D=anecdote_lite_colors_panel'); ?>">
                                        <span class="dashicons dashicons-art"></span>
                                        <?php esc_html_e('Color options', 'anecdote-lite'); ?>
                                    </a>
                                </li>

                                <li>
                                    <a href="<?php echo esc_url($base_url . '/wp-admin/customize.php?autofocus%5Bpanel%5D=anecdote_lite_options'); ?>">
                                        <span class="dashicons dashicons-admin-generic"></span>
                                        <?php esc_html_e('Miscellaneous theme options', 'anecdote-lite'); ?>
                                    </a>
                                </li>

                            </ul>
                        </div>

                        <div class="greeting-panel-column greeting-panel-column-2">

                            <h3><?php esc_html_e('Manage','anecdote-lite'); ?></h3>

                            <ul class="greeting-panel-list">

                                <li>
                                    <a href="<?php echo esc_url($base_url . '/wp-admin/nav-menus.php'); ?>">
                                        <span class="dashicons dashicons-menu"></span>
                                        <?php esc_html_e('Manage menus', 'anecdote-lite'); ?>
                                    </a>
                                </li>

                                <li>
                                    <a href="<?php echo esc_url($base_url . '/wp-admin/widgets.php'); ?>">
                                        <span class="dashicons dashicons-layout"></span>
                                        <?php esc_html_e('Manage widgets', 'anecdote-lite'); ?>
                                    </a>
                                </li>

                                <li>
                                    <a href="<?php echo esc_url($base_url . '/wp-admin/customize.php?autofocus%5Bsection%5D=social_icon'); ?>">
                                        <span class="dashicons dashicons-admin-links"></span>
                                        <?php esc_html_e('Social Icons', 'anecdote-lite'); ?>
                                    </a>
                                </li>

                                <li>
                                    <a href="<?php echo esc_url($base_url . '/wp-admin/customize.php?autofocus%5Bsection%5D=social_share'); ?>">
                                        <span class="dashicons dashicons-share"></span>
                                        <?php esc_html_e('Social Share', 'anecdote-lite'); ?>
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <div class="greeting-panel-column greeting-panel-column-2">

                            <h3><?php esc_html_e('More Actions','anecdote-lite'); ?></h3>
                            
                            <ul class="greeting-panel-list">

                                <li>
                                    <a href="<?php echo esc_url( $base_url.'/wp-admin/customize.php?autofocus%5Bsection%5D=sidebar_setting' ); ?>">
                                        <span class="dashicons dashicons-welcome-widgets-menus"></span>
                                        <?php esc_html_e('Sidebar Settings','anecdote-lite'); ?>
                                    </a>
                                </li>

                                <li>
                                    <a href="<?php echo esc_url($base_url . '/wp-admin/customize.php?autofocus%5Bsection%5D=single_post_setting'); ?>">
                                        <span class="dashicons dashicons dashicons-analytics"></span>
                                        <?php esc_html_e('Single post settings', 'anecdote-lite'); ?>
                                    </a>
                                </li>

                                <li>
                                    <a href="<?php echo esc_url($base_url . '/wp-admin/customize.php?autofocus%5Bsection%5D=archive_setting'); ?>">
                                        <span class="dashicons dashicons-welcome-widgets-menus"></span>
                                        <?php esc_html_e('Archive settings', 'anecdote-lite'); ?>
                                    </a>
                                </li>

                                <li>
                                    <a href="<?php echo esc_url($base_url . '/wp-admin/customize.php?autofocus%5Bsection%5D=subscribe_section'); ?>">
                                        <span class="dashicons dashicons-admin-comments"></span>
                                        <?php esc_html_e('Newsletter subscription settings', 'anecdote-lite'); ?>
                                    </a>
                                </li>

                            </ul>
                        </div>

                    </div>
                    <div class="greeting-panel-footer">
                        <a href="javascript:void(0)" class="wedevs-dismiss-notice"><?php esc_html_e("Dismiss and do not show this message ever again",'anecdote-lite'); ?></a>

                    </div>
                </div>

            </div>

        <?php
        }

    }

    new Anecdote_Lite_Dashboard_Notice();

endif;