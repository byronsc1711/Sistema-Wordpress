<?php
function honeypress_type_color_setting() {
// Typography
$honeypress_enable_header_typography = get_theme_mod('enable_header_typography',false);
$honeypress_enable_section_title_typography = get_theme_mod('enable_section_title_typography',false);
$honeypress_enable_slider_title_typography = get_theme_mod('enable_slider_title_typography',false);
$honeypress_enable_content_typography = get_theme_mod('enable_content_typography',false);
$honeypress_enable_post_typography = get_theme_mod('enable_post_typography',false);
$honeypress_enable_shop_page_typography = get_theme_mod('enable_shop_page_typography',false);
$honeypress_enable_sidebar_typography = get_theme_mod('enable_sidebar_typography',false);
$honeypress_enable_footer_widget_typography = get_theme_mod('enable_footer_widget_typography',false);

/* Site title and tagline */
if($honeypress_enable_header_typography == true)
{
?>
<style>
.site-title {
	font-size:<?php echo esc_html(get_theme_mod('site_title_fontsize','36')).'px'; ?> !important;
	font-family:<?php echo esc_html(get_theme_mod('site_title_fontfamily','Open Sans')); ?> !important;
}
.site-description {
	font-size:<?php echo esc_html(get_theme_mod('site_tagline_fontsize','20')).'px'; ?> !important;
	font-family:<?php echo esc_html(get_theme_mod('site_tagline_fontfamily','Open Sans')); ?> !important;
}
.navbar .nav > li > a {
	font-size:<?php echo esc_html(get_theme_mod('menu_title_fontsize','16')).'px'; ?> !important;
	font-family:<?php echo esc_html(get_theme_mod('menu_title_fontfamily','Open Sans')); ?> !important;
}
.dropdown-menu .dropdown-item{
	font-size:<?php echo esc_html(get_theme_mod('submenu_title_fontsize','16')).'px'; ?> !important;
	font-family:<?php echo esc_html(get_theme_mod('submenu_title_fontfamily','Open Sans')); ?> !important;
}
</style>
<?php } 

/* Slider Title Typography*/
if($honeypress_enable_slider_title_typography == true)
{
?>
<style>
.slider-caption h1  {
	font-size:<?php echo esc_html(get_theme_mod('slider_title_fontsize','65')).'px'; ?> !important;
	font-family:<?php echo esc_html(get_theme_mod('slider_title_fontfamily','Open Sans')); ?> !important;
}
</style>
<?php } 


/* Home Page Section Title */
if($honeypress_enable_section_title_typography == true)
{
?>
<style>
 .section-header p {
	font-size:<?php echo esc_html(get_theme_mod('section_description_fontsize','16')).'px'; ?> !important;
	font-family:<?php echo esc_html(get_theme_mod('section_description_fontfamily','Open Sans')); ?> !important;
}

.section-header h2, .contact .section-header h2 {
   font-size:<?php echo esc_html(get_theme_mod('section_title_fontsize','36')).'px'; ?> !important;
	font-family:<?php echo esc_html(get_theme_mod('section_title_fontfamily','Open Sans')); ?> !important;
}
</style>
<?php } 


/* Content */
if($honeypress_enable_content_typography == true)
{
?>
<style>
/* Heading H1 */
.about h1, .entry-content h1, .service h1, .contact h1, .error-page h1  {
	font-size:<?php echo esc_html(get_theme_mod('h1_typography_fontsize','36')).'px'; ?> !important;
	font-family:<?php echo esc_html(get_theme_mod('h1_typography_fontfamily','Open Sans')); ?> !important;
}

/* Heading H2 */
.entry-content h2, .cta-block h2, .error-page h2, .about h2, .service h2, .contact h2{
	font-size:<?php echo esc_html(get_theme_mod('h2_typography_fontsize','30')).'px'; ?> !important;
	font-family:<?php echo esc_html(get_theme_mod('h2_typography_fontfamily','Open Sans')); ?> !important;
}

/* Heading H3 */
.entry-content h3, .related-posts h3, .entry-header h3, .about h3, .service h3, .contact h3, .contact-form-map .title h3, .error-page .sub-title {
	font-size:<?php echo esc_html(get_theme_mod('h3_typography_fontsize','24')).'px'; ?> !important;
	font-family:<?php echo esc_html(get_theme_mod('h3_typography_fontfamily','Open Sans')); ?> !important;
}
.comment-title h3, .comment-reply-title{
	font-size:<?php echo esc_html(get_theme_mod('h3_typography_fontsize','24')) + 4 .'px'; ?> !important;
	font-family:<?php echo esc_html(get_theme_mod('h3_typography_fontfamily','Open Sans')); ?> !important;
}

/* Heading H4 */
.entry-content h4, .entry-header h4, .team-grid h4, .entry-header h4 a, .contact-widget h4, .about h4, .testimonial .testmonial-block .name, .service h4, .contact h4, .blog-author .name {
	font-size:<?php echo esc_html(get_theme_mod('h4_typography_fontsize','20')).'px'; ?> !important;
	font-family:<?php echo esc_html(get_theme_mod('h4_typography_fontfamily','Open Sans')); ?> !important;
}

/* Heading H5 */
.product-price h5, .blog-author h5, .comment-detail h5, .entry-content h5, .about h5, .service h5, .contact h5 {
	font-size:<?php echo esc_html(get_theme_mod('h5_typography_fontsize','18')).'px'; ?> !important;
	font-family:<?php echo esc_html(get_theme_mod('h5_typography_fontfamily','Open Sans')); ?> !important;
}

/* Heading H6 */
.entry-content h6, .about h6, .service h6, .contact h6 {
	font-size:<?php echo esc_html(get_theme_mod('h6_typography_fontsize','14')).'px'; ?> !important;
	font-family:<?php echo esc_html(get_theme_mod('h6_typography_fontfamily','Open Sans')); ?> !important;
}

/* Paragraph */
.entry-content p, .cta-block p, .about-content p, .funfact p, .woocommerce-product-details__short-description p, .wpcf7 .wpcf7-form p label, .testimonial .testmonial-block .designation, .about p, .entry-content li, .contact address, .contact p, .service p, .contact p, .error-page p, .logged-in-as, .comment-form-comment label, .comment-form-comment #comment, .comment-detail p{
	font-size:<?php echo esc_html(get_theme_mod('p_typography_fontsize','16')).'px'; ?> !important;
	font-family:<?php echo esc_html(get_theme_mod('p_typography_fontfamily','Open Sans')); ?> !important;
}
.slider-caption p{
	font-size:<?php echo esc_html(get_theme_mod('p_typography_fontsize','16')) + 2 .'px'; ?> !important;
	font-family:<?php echo esc_html(get_theme_mod('p_typography_fontfamily','Open Sans')); ?> !important;
}
.portfolio .tab a, .portfolio .nav-item a{
	font-size:<?php echo esc_html(get_theme_mod('p_typography_fontsize','16')).'px'; ?> !important;
	font-family:<?php echo esc_html(get_theme_mod('p_typography_fontfamily','Open Sans')); ?> !important;
}


/* Button Text */
.btn-combo a, .mx-auto a, .pt-3 a, .wpcf7-form .wpcf7-submit,  .woocommerce .button, .form-submit #submit, .wp-block-button__link{
	font-size:<?php echo esc_html(get_theme_mod('button_text_typography_fontsize','16')).'px'; ?> !important;
	font-family:<?php echo esc_html(get_theme_mod('button_text_typography_fontfamily','Open Sans')); ?> !important;
}
</style>
<?php }


/* Blog / Archive / Single Post */
if($honeypress_enable_post_typography == true)
{
?>
<style>
.entry-header h2{
	font-size:<?php echo esc_html(get_theme_mod('post-title_fontsize','36')).'px'; ?> !important;
	font-family:<?php echo esc_html(get_theme_mod('post-title_fontfamily','Open Sans')); ?> !important;
}
</style>
<?php }

/* Shop Page */
if($honeypress_enable_shop_page_typography == true)
{
?>
<style>
/* Shop Page H1 */
 .woocommerce div.product .product_title{
	font-size:<?php echo esc_html(get_theme_mod('shop_h1_typography_fontsize','36')).'px'; ?> !important;
	font-family:<?php echo esc_html(get_theme_mod('shop_h1_typography_fontfamily','Open Sans')); ?> !important;
}

/* Shop Page H2 */
.woocommerce .products h2, .woocommerce .cart_totals h2, .woocommerce-Tabs-panel h2, .woocommerce .cross-sells h2, body #wrapper .cross-sells h2.woocommerce-loop-product__title,body .woocommerce-Tabs-panel h2{
	font-size:<?php echo esc_html(get_theme_mod('shop_h2_typography_fontsize','18')).'px'; ?> !important;
	font-family:<?php echo esc_html(get_theme_mod('shop_h2_typography_fontfamily','Open Sans')); ?> !important;
}

/* Shop Page H3 */
 .woocommerce .checkout h3 {
	font-size:<?php echo esc_html(get_theme_mod('shop_h3_typography_fontsize','24')).'px'; ?> !important;
	font-family:<?php echo esc_html(get_theme_mod('shop_h3_typography_fontfamily','Open Sans')); ?> !important;
}
</style>
<?php }


/* Sidebar widgets */
if($honeypress_enable_sidebar_typography == true)
{
?>
<style>
.sidebar .widget-title{
	font-size:<?php echo esc_html(get_theme_mod('sidebar_fontsize','24')).'px'; ?> !important;
	font-family:<?php echo esc_html(get_theme_mod('sidebar_fontfamily','Open Sans')); ?> !important;
}
/* Sidebar Widget Content */
.sidebar .widget_recent_entries a, .sidebar a, .sidebar p, .sidebar .address {
	font-size:<?php echo esc_html(get_theme_mod('sidebar_widget_content_fontsize','16')).'px'; ?> !important;
	font-family:<?php echo esc_html(get_theme_mod('sidebar_widget_content_fontfamily','Open Sans')); ?> !important;
}
.sidebar .btn.btn-success, .sidebar .form-control{font-family:<?php echo esc_html(get_theme_mod('sidebar_widget_content_fontfamily','Open Sans')); ?> !important;}
</style>
<?php }


/* Footer Widget */
if($honeypress_enable_footer_widget_typography == true)
{
?>
<style>
/* Footer Widget Title */
.site-footer .widget-title  {
	font-size:<?php echo esc_html(get_theme_mod('footer_widget_title_fontsize','24')).'px'; ?> !important;
	font-family:<?php echo esc_html(get_theme_mod('footer_widget_title_fontfamily','Open Sans')); ?> !important;
}
/* Footer Widget Content */
.footer-sidebar .widget_recent_entries a, .footer-sidebar a, .footer-sidebar p, .footer-sidebar address {
	font-size:<?php echo esc_html(get_theme_mod('footer_widget_content_fontsize','16')).'px'; ?> !important;
	font-family:<?php echo esc_html(get_theme_mod('footer_widget_content_fontfamily','Open Sans')); ?> !important;
}
</style>
<?php }

    if(get_theme_mod('apply_hdr_clr_enable',false)==true) :?>
	<style>
	body .site-title a, body .header-logo.index6 .site-title, body .navbar.navbar7 .site-title-name, body .header-logo.index6 .site-title-name{
		color: <?php echo esc_html(get_theme_mod('site_title_link_color','#061018')); ?>;
	}
	body .site-title a:hover, body .header-logo.index6 .site-title, body .navbar.navbar7 .site-title-name:hover, body .navbar.navbar7 .site-title-name:focus, body .header-logo.index6 .site-title-name:hover, body .header-logo.index6 .site-title-name:focus{
		color: <?php echo esc_html(get_theme_mod('site_title_link_hover_color','#061018')); ?>;
	}
	body .site-description, body .navbar.navbar7 .site-description, body .header-logo.index6 .site-description{
		color: <?php echo esc_html(get_theme_mod('site_tagline_text_color','#333333')); ?>;
	}
    </style>
    <?php endif;
		/* Primary Menu */
	if(get_theme_mod('apply_menu_clr_enable',false)==true) :?>
     <style>   
	.navbar.custom .nav .nav-item .nav-link, .navbar .nav .nav-item .nav-link {
    	color: <?php echo esc_html(get_theme_mod('menus_link_color','#061018')); ?> !important;
    }
    .navbar.custom .nav .nav-item:hover .nav-link, .navbar.custom .nav .nav-item.active .nav-link:hover, .navbar .nav .nav-item:hover .nav-link {
    	color: <?php echo esc_html(get_theme_mod('menus_link_hover_color','#2d6ef8')); ?> !important;
    }
    .navbar.custom .nav .nav-item.active .nav-link, .navbar .nav .nav-item.active .nav-link {
    	color: <?php echo esc_html(get_theme_mod('menus_link_active_color','#2d6ef8')); ?> !important;
    	display: block;
    }
    /* Submenus */
    .nav.navbar-nav .dropdown-item, .nav.navbar-nav .dropdown-menu {
    	background-color: <?php echo esc_html(get_theme_mod('submenus_background_color','#ffffff')); ?> !important;
    }
    .nav.navbar-nav .dropdown-item {
    	color: <?php echo esc_html(get_theme_mod('submenus_link_color','#212529')); ?> !important;
    }
    .nav.navbar-nav .dropdown-item:hover {
    	color: <?php echo esc_html(get_theme_mod('submenus_link_hover_color','#2d6ef8')); ?> !important;
    }
    .nav.navbar-nav .dropdown-item:focus, .nav.navbar-nav .dropdown-item:hover
    {
    	    background-color: transparent !important;
    }
    @media (min-width: 992px){
body .navbar .nav .dropdown-menu {
    border-bottom: unset !important;
}}
</style>
<?php endif;

    /* Banner */
    ?>
    <style>
    .page-title h1{
    	color: <?php echo esc_html(get_theme_mod('banner_text_color','#fff')); ?> !important;
    }
    </style>
    <?php
    $enable_brd_link_clr_setting=get_theme_mod('enable_brd_link_clr_setting',false);
    if($enable_brd_link_clr_setting==true): ?>
        <style>
    .page-breadcrumb.text-center span a {
    color: <?php echo esc_html(get_theme_mod('breadcrumb_title_link_color','#ffffff'));?> !important;
}
    .page-breadcrumb.text-center span a:hover {
    	color: <?php echo esc_html(get_theme_mod('breadcrumb_title_link_hover_color','#2d6ef8')); ?> !important;
    }
</style>
<?php endif;?>

<style>
  body h1 {
    	color: <?php echo esc_html(get_theme_mod('h1_color','#061018')); ?> ;
    }
    body .section-header h2, body .funfact h2, body h2{
    	color: <?php echo esc_html(get_theme_mod('h2_color','#061018')); ?>;
    }
    body h3 {
    	color: <?php echo esc_html(get_theme_mod('h3_color','#061018')); ?>;
    }
    body .entry-header h4 > a, body h4 {
    	color: <?php echo esc_html(get_theme_mod('h4_color','#061018')); ?>;
    }
    body .product-price h5 > a, body .blog-author h5, body .comment-detail h5, body h5, body .blog .blog-author.media h5{
    	color: <?php echo esc_html(get_theme_mod('h5_color','#061018')); ?>;
    }
    body h6 {
    	color: <?php echo esc_html(get_theme_mod('h6_color','#061018')); ?>;
    }
     p,body .services5 .post .entry-content p, p.comment-form-comment label{
    	color: <?php echo esc_html(get_theme_mod('p_color','#061018')); ?>;
    }
    .site-footer .site-info p{color: #bec3c7;}


    /* Sidebar */
    body .sidebar .widget-title {
    	color: <?php echo esc_html(get_theme_mod('sidebar_widget_title_color','#061018')); ?>;
    }
    body .sidebar p, body .sidebar .woocommerce-Price-amount.amount,.sidebar .quantity, body .sidebar #wp-calendar, body .sidebar #wp-calendar caption {
    	color: <?php echo esc_html(get_theme_mod('sidebar_widget_text_color','#061018')); ?>;
    }
    body .sidebar a, body #wrapper .sidebar .woocommerce a {
    	color: <?php echo esc_html(get_theme_mod('sidebar_widget_link_color','#061018')); ?>;
    }
</style>
    <?php
    if(get_theme_mod('apply_sibar_link_hover_clr_enable',false)==true):?>
        <style>
    body  .sidebar a:hover, body .sidebar .widget a:hover {
    	color: <?php echo esc_html(get_theme_mod('sidebar_widget_link_hover_color','#2d6ef8')); ?> !important;
    }
</style>
	<?php endif;?>

    
    <?php
    /* Footer Widgets */
    if(get_theme_mod('apply_ftrsibar_link_hover_clr_enable',false)==true){?>
        <style>
    body .site-footer {
    	background-color: <?php echo esc_html(get_theme_mod('footer_widget_background_color','#061018')); ?>;
    }
     body .site-footer .widget-title {
    	color: <?php echo esc_html(get_theme_mod('footer_widget_title_color','#ffffff')); ?>;
    }
    body .footer-sidebar p,  body .footer-sidebar .widget {
    	color: <?php echo esc_html(get_theme_mod('footer_widget_text_color','#ffffff')); ?>;
    }
    body .footer-sidebar .widget a, body .footer-sidebar .widget_recent_entries .post-date , body #wrapper .footer-sidebar .product_list_widget li a {
    	color: <?php echo esc_html(get_theme_mod('footer_widget_link_color','#ffffff')); ?>;
    }
    body .footer-sidebar .widget a:hover, body #wrapper .footer-sidebar .product_list_widget li a:hover{
    	color: <?php echo esc_html(get_theme_mod('footer_widget_link_hover_color','#2d6ef8')); ?> !important;
    }
    </style>
	<?php } else { ?>
        <style>
		.site-footer p {
			color: #ffffff;
		}
        </style>
<?php	}
}
add_action('wp_head', 'honeypress_type_color_setting');