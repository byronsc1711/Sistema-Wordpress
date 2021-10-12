<?php
/**
 * Returns CSS for the color schemes, @return string Color scheme CSS.
 */
function one_page_business_get_theme_css( ) {

	/* fonts */
	
	$header_font = get_theme_mod('heading_font', one_page_business_get_settings('heading_font'));
	$body_font = get_theme_mod('body_font', one_page_business_get_settings('body_font'));
	
	/* colors */
	
	$colors['background_color'] = get_theme_mod('background_color', '#ffffff');
	
	$colors['page_background_color'] = get_theme_mod('page_background_color', one_page_business_get_settings('page_background_color'));
	$colors['link_color'] = get_theme_mod('link_color', one_page_business_get_settings('link_color'));
	$colors['main_text_color'] = get_theme_mod('main_text_color', one_page_business_get_settings('main_text_color'));

	$colors['primary_color'] = get_theme_mod('primary_color', one_page_business_get_settings('primary_color'));
	
	$colors['footer_text_color'] = get_theme_mod('footer_text_color', one_page_business_get_settings('footer_text_color'));
	
	/* Convert main text hex color to rgba */
	$main_text_color_rgb = one_page_business_hex2rgb( $colors['main_text_color'] );
	$border_color = vsprintf( 'rgba( %1$s, %2$s, %3$s, 0.2)', $main_text_color_rgb );	
	$colors['border_color'] = $border_color;
	
	$header_image = esc_url(get_header_image());
	$footer_image = get_theme_mod('footer_bg_image');
	$footer_bg_color = get_theme_mod('footer_bg_color', one_page_business_get_settings('footer_bg_color'));
	
	$footer_secondary_color = get_theme_mod('footer_secondary_color', one_page_business_get_settings('footer_secondary_color'));
	
	$header_bg_color = get_theme_mod('header_bg_color', one_page_business_get_settings('header_bg_color'));	
	
	$colors['header_text_color'] = get_theme_mod('header_text_color', one_page_business_get_settings('header_text_color'));
	$colors['header_text_hover_color'] = get_theme_mod('header_text_hover_color', one_page_business_get_settings('header_text_hover_color'));
	
	$colors['header_contact_bg_color'] = get_theme_mod('header_contact_bg_color', one_page_business_get_settings('header_contact_bg_color'));
	$colors['header_contact_text_color'] = get_theme_mod('header_contact_text_color', one_page_business_get_settings('header_contact_text_color'));
	
	$hero_border = get_theme_mod('hero_border', 0);
	
	$footer_border = get_theme_mod('footer_border', one_page_business_get_settings('footer_border'));
	
	$woocommerce_menubar = get_theme_mod('woocommerce_menubar_color', one_page_business_get_settings('woocommerce_menubar_color'));
	
	$woocommerce_menubar_text = get_theme_mod('woocommerce_menubar_text_color', one_page_business_get_settings('woocommerce_menubar_text_color'));
	
	return "
	
	.menu-goto-wishlist .fa:before {
		font-family:'FontAwesome';
	}
	
	#masthead .contact-info a.tel-link, 
	#masthead .contact-info a.email-link, 
	#masthead .contact-info, 
	#masthead .contact-info .fa, 
	#masthead .social-navigation a {
		color:".$colors['header_contact_text_color'].";	
	}
	
	.category-navigation > ul > li > a::before {
		color:".$colors['primary_color'].";	
	}
	
	.category-navigation > ul > li > a {
		color:unset;	
	}	
	
	.woocommerce a.add_to_cart_button, 
	.woocommerce a.add_to_cart_button:focus, 
	.woocommerce a.product_type_grouped, 
	.woocommerce a.product_type_external, 
	.woocommerce a.product_type_simple, 
	.woocommerce a.product_type_variable, 
	.woocommerce button.button.alt, 
	.woocommerce a.button, 
	.woocommerce button.button, 
	.woocommerce a.button.alt, 
	.woocommerce #respond input#submit, 
	.woocommerce .widget_price_filter .price_slider_amount .button,
	.scroll-to-top,
	.woocommerce .widget_price_filter .ui-slider .ui-slider-handle,
	.woocommerce .widget_price_filter .ui-slider .ui-slider-range {
		background-color: ".$colors['primary_color'].";
	}
	
	.cart-contents-count span {
		background-color: ".$colors['primary_color'].";
	}
	
	.woocommerce .widget_price_filter .price_slider_wrapper .ui-widget-content {
		background-color: #d7d7d7;
	}
	
	.woo-product-wrap .badge-wrapper .onsale {		
		background-color: #008040;
		color: #fff;
	}
	
	
	.wishlist-compare-qw .button.yith-wcqv-button::before,
	.wishlist-compare-qw .woocommerce a.compare.button:before,
	.wishlist-compare-qw .yith-wcwl-add-button .add_to_wishlist:before,
	.wishlist-compare-qw .yith-wcwl-wishlistaddedbrowse a:before,
	.wishlist-compare-qw .yith-wcwl-wishlistexistsbrowse.show a:before,
	.wishlist-compare-qw .yith-wcwl-wishlistexistsbrowse a:before,
	.wishlist-compare-qw .compare-button a::before	 {
			color: ".$colors['primary_color'].";
	}
					
	.site-header { 
	
		background-color: ".$header_bg_color.";
		background-size: cover;
		background-position: center top;
		background-attachment: fixed;				
	}
	
	#masthead .contact-ribbon {
		background-color: ".$colors['header_contact_bg_color'].";
	}
	
	.menu-toggle:hover,
	.menu-toggle:focus,
	.site-branding .site-title a:hover,
	.site-branding .site-title a:focus,
	#masthead .social-navigation a:hover::before, 
	#masthead .social-navigation a:focus::before {
		color: ".$colors['header_text_hover_color'].";
	}
	
	.menu-toggle:hover,
	.menu-toggle:focus {
		background-color: ".$colors['header_text_hover_color'].";
		color:#fff;
	}
	
		
	.site-footer {
		background-image: url(".$footer_image.");
		background: linear-gradient(140deg, ".$footer_bg_color." 0%, ".$footer_secondary_color." 100%);
		background-size: cover;
		background-position: center bottom;	
		border-top: ".$footer_border."px solid #e6e6e6;
	}
	
	.footer-text .widget-title, 
	.footer-text a, 
	.footer-text p,
	.footer-text caption, 
	.footer-text li,
	.footer-text h1,
	.footer-text h2,
	.footer-text h3,
	.footer-text h4,
	.footer-text h5,
	.footer-text h6,
	.footer-text .social-navigation a,
	.site-info a,
	.site-info {
		color: ".$colors['footer_text_color'].";
		font-weight: 400;
		line-height: 2;
		text-decoration: none;
		transition: all 0.2s ease-in-out;
	}
	
	
	.footer-text .social-navigation a, 
	.footer-text th, 
	.footer-text td,	
	.footer-text .widget_calendar th,
	.footer-text .widget_calendar td, 
	.footer-text table {
		border-color: ".$colors['footer_text_color'].";
		color: ".$colors['footer_text_color'].";
	}
	
	/* slider button */
	
	#header-hero-section {
		border-top: ".$hero_border."px solid ".$colors['header_text_color'].";
	}
	
	.hero-callout .start-button {
		background-color: ".$colors['primary_color'].";	
	}
	
	.hero-callout span.start-button:hover,
	.hero-callout span.start-button:focus {
		color: ".$colors['primary_color'].";	
		border: 2px solid ".$colors['primary_color'].";	
		background-color: #ffffffe6;
	}	
	
	.start-button {
		background-color: ".$colors['primary_color'].";
		border: 1px solid ".$colors['primary_color'].";
	
	}
	a.start-button:hover,
	a.start-button:focus {
		color: ".$colors['primary_color'].";
		border: 1px solid ".$colors['primary_color'].";
	}
	
	.carousel-indicators li.active {
    	background-color:  ".$colors['primary_color'].";
	}
	
	.product-menu .navigation-name {
		background-color:".$colors['primary_color'].";
		color:#fff;

	}

	/* Background Color */
	body {
		background-color: ".$colors['background_color'].";
	}
	
	/* Heaader text Color */	
	.site-title a,
	.site-description,
	.main-navigation ul a,
	.woo-cart-wrap a,
	.dropdown-toggle,
	.menu-toggle,
	.dropdown-toggle:after,
	#masthead .callout-title,
	#masthead .hero-callout .callout-section-desc,
	#masthead .start-button {
		color: ".$colors['header_text_color'].";
	}

		
	.hero-content a, 
	.hero-content p,
	.hero-content h1,
	.hero-content h2,
	.hero-content h3,
	.hero-content h4,
	.hero-content h5,
	.hero-content h6,
	.hero-content span{
		color: ".$colors['header_text_color'].";
	}
	
	.menu-toggle {
		border-color: ".$colors['header_text_color'].";
	}	



	mark,
	button,
	button[disabled]:hover,
	button[disabled]:focus,
	input[type='button'],
	input[type='button'][disabled]:hover,
	input[type='button'][disabled]:focus,
	input[type='reset'],
	input[type='reset'][disabled]:hover,
	input[type='reset'][disabled]:focus,
	input[type='submit'],
	input[type='submit'][disabled]:hover,
	input[type='submit'][disabled]:focus,
	.pagination .prev,
	.pagination .next,
	.pagination .prev:hover,
	.pagination .prev:focus,
	.pagination .next:hover,
	.pagination .next:focus,
	.pagination .nav-links:before,
	.pagination .nav-links:after,
	.widget_calendar tbody a,
	.widget_calendar tbody a:hover,
	.widget_calendar tbody a:focus,
	a.comment-reply-link:hover,
	a.comment-reply-link:focus,
	a.comment-reply-link,
	.page-links a,
	.page-links a:hover,
	.page-links a:focus {
		color: ".$colors['page_background_color'].";
	}

	/* Link Color */
	.woo-cart-wrap a:hover,
	.woo-cart-wrap a:focus,
	a,
	.main-navigation a:hover,
	.main-navigation a:focus,
	.dropdown-toggle:hover,
	.dropdown-toggle:focus,
	.social-navigation a:hover:before,
	.social-navigation a:focus:before,
	.post-navigation a:hover .post-title,
	.post-navigation a:focus .post-title,
	.tagcloud a:hover,
	.tagcloud a:focus,
	.entry-title a:hover,
	.entry-title a:focus,
	.entry-footer a:hover,
	.entry-footer a:focus,
	.comment-metadata a:hover,
	.comment-metadata a:focus,
	.pingback .comment-edit-link:hover,
	.pingback .comment-edit-link:focus,
	.required {
		color: ".$colors['link_color'].";
	}

	mark,
	button:hover,
	button:focus,
	input[type='button']:hover,
	input[type='button']:focus,
	input[type='reset']:hover,
	input[type='reset']:focus,
	input[type='submit']:hover,
	input[type='submit']:focus,
	.pagination .prev:hover,
	.pagination .prev:focus,
	.pagination .next:hover,
	.pagination .next:focus,
	.widget_calendar tbody a,
	a.comment-reply-link,
	.page-links a:hover,
	.page-links a:focus {
		background-color: ".$colors['link_color'].";
	}

	input[type='date']:focus,
	input[type='time']:focus,
	input[type='datetime-local']:focus,
	input[type='week']:focus,
	input[type='month']:focus,
	input[type='text']:focus,
	input[type='email']:focus,
	input[type='url']:focus,
	input[type='password']:focus,
	input[type='search']:focus,
	input[type='tel']:focus,
	input[type='number']:focus,
	textarea:focus,
	.tagcloud a:hover,
	.tagcloud a:focus,
	.menu-toggle:hover,
	.menu-toggle:focus {
		border-color: ".$colors['link_color'].";
	}

	/* Main Text Color */
	body,
	blockquote cite,
	blockquote small,
	.main-navigation a,
	.social-navigation a,
	.post-navigation a,
	.pagination a:hover,
	.pagination a:focus,
	.widget-title a,
	.entry-title a,
	.page-links > .page-links-title,
	.comment-author,
	.comment-reply-title small a:hover,
	.comment-reply-title small a:focus {
		color: ".$colors['main_text_color'].";
	}

	blockquote,
	.menu-toggle.toggled-on,
	.menu-toggle.toggled-on:hover,
	.menu-toggle.toggled-on:focus,
	.post-navigation,
	.post-navigation div + div,
	.pagination,
	.widget,
	.page-header,
	.page-links a,
	.comments-title,
	.comment-reply-title {
		border-color: ".$colors['main_text_color'].";
	}

	button,
	button[disabled]:hover,
	button[disabled]:focus,
	input[type='button'],
	input[type='button'][disabled]:hover,
	input[type='button'][disabled]:focus,
	input[type='reset'],
	input[type='reset'][disabled]:hover,
	input[type='reset'][disabled]:focus,
	input[type='submit'],
	input[type='submit'][disabled]:hover,
	input[type='submit'][disabled]:focus,
	.menu-toggle.toggled-on,
	.menu-toggle.toggled-on:hover,
	.menu-toggle.toggled-on:focus,
	.pagination:before,
	.pagination:after,
	.pagination .prev,
	.pagination .next,
	.comment-reply-link,	
	.page-links a {
		background-color: ".$colors['primary_color'].";
	}
	

	/* main text color 2 */
	body:not(.search-results) .entry-summary {
		color: ".$colors['main_text_color'].";
	}

	/**
	 * IE8 and earlier will drop any block with CSS3 selectors.
	 * Do not combine these styles with the next block.
	 */

	blockquote,
	.post-password-form label,
	a:hover,
	a:focus,
	a:active,
	.post-navigation .meta-nav,
	.image-navigation,
	.comment-navigation,
	.widget_recent_entries .post-date,
	.widget_rss .rss-date,
	.widget_rss cite,
	.author-bio,
	.entry-footer,
	.entry-footer a,
	.sticky-post,
	.taxonomy-description,
	.entry-caption,
	.comment-metadata,
	.pingback .edit-link,
	.comment-metadata a,
	.pingback .comment-edit-link,
	.comment-form label,
	.comment-notes,
	.comment-awaiting-moderation,
	.logged-in-as,
	.form-allowed-tags,
	.wp-caption .wp-caption-text,
	.gallery-caption,
	.widecolumn label,
	.widecolumn .mu_register label {
		color: ".$colors['main_text_color'].";
	}

	.widget_calendar tbody a:hover,
	.widget_calendar tbody a:focus {
		background-color: ".$colors['main_text_color'].";
	}
	
	#secondary .widget .widget-title {
		border-bottom: 2px solid #e1e1e1 ;
	}


	/* Border Color */
	fieldset,
	pre,
	abbr,
	acronym,
	table,
	th,
	td,
	input[type='date'],
	input[type='time'],
	input[type='datetime-local'],
	input[type='week'],
	input[type='month'],
	input[type='text'],
	input[type='email'],
	input[type='url'],
	input[type='password'],
	input[type='search'],
	input[type='tel'],
	input[type='number'],
	textarea,
	.main-navigation .primary-menu,
	.social-navigation a,
	.image-navigation,
	.comment-navigation,
	.tagcloud a,
	.entry-content,
	.entry-summary,
	.page-links a,
	.page-links > span,
	.comment-list article,
	.comment-list .pingback,
	.comment-list .trackback,
	.no-comments,
	.widecolumn .mu_register .mu_alert {
		border-color: ".$colors['main_text_color']."; /* Fallback for IE7 and IE8 */
		border-color: ".$colors['border_color'].";
	}

	hr, code {
		background-color: ".$colors['main_text_color']."; /* Fallback for IE7 and IE8 */
		background-color: ".$colors['border_color'].";
	}
	
	@media screen and (max-width: 56.875em) {
		.main-navigation ul ul a {
			color: ".$colors['header_text_color'].";
		}
		.burger-header .main-navigation ul ul a {
			color: #fff;
		}		
		.main-navigation li {
			border-top: 1px solid ".$colors['header_text_color'].";
		}
		
		/* menu hover colours */
		
		.main-navigation li:hover > a,
		.main-navigation li.focus > a,
		.main-navigation.sticky-nav li:hover > a,
		.main-navigation.sticky-nav li:focus > a {
			color: ".$colors['header_text_hover_color'].";		
		}
		
		
	}

	@media screen and (min-width: 56.875em) {
		.main-navigation li:hover > a,
		.main-navigation li.focus > a,
		.main-navigation.sticky-nav li:hover > a,
		.main-navigation.sticky-nav li:focus > a {
			color: ".$colors['header_text_hover_color'].";
		}
		
		.main-navigation .current-menu-item > a {
			border-bottom:2px solid ".$colors['primary_color'].";
		}
		
		
		#site-navigation.sticky-nav { 
			background-color: #ffffff ; 
		}
		
		#site-navigation.sticky-nav ul > li > a { 
			color: #000 ; 
		}
		
		#site-navigation.sticky-nav ul > li > a:focus,
		#site-navigation.sticky-nav ul > li > a:hover { 
			color: ".$colors['primary_color']."; 
		}
						
		#woocommerce-layout-menu,
		.sticky-nav {
			background-color: ".$woocommerce_menubar.";
		}
		
		#woocommerce-layout-menu .main-navigation .primary-menu > li > a {
			color: #fff;
		}
		
		#woocommerce-layout-menu .main-navigation .primary-menu > li > a:hover {
			border-bottom:2px solid ".$colors['primary_color'].";
		}
		
		#woocommerce-layout-menu .main-navigation.sticky-nav .primary-menu > li > a {
			color: initial;
		}		
		
		
		.main-navigation li {
			border-color: ".$colors['main_text_color']."; /* Fallback for IE7 and IE8 */
			border-color: ".$colors['border_color'].";
		}		


		.main-navigation ul ul:before {
			border-top-color: ".$colors['border_color'].";
			border-bottom-color: ".$colors['border_color'].";
		}

		
	} /* end media query */
	
	
	/*
	 * Google Font CSS 
	 */
 
	h1 ,
	h2 ,
	h3 ,
	h4 ,
	h5 ,
	h6 ,
	.site-title a, 
	.entry-title , 
	.page-title , 
	.entry-meta ,
	.callout-title , 
	.entry-meta a,
	.main-navigation,
	.post-navigation,
	.post-navigation .post-title,
	.pagination,	
	.image-navigation,
	.comment-navigation,	
	.site .skip-link,	
	.widget_recent_entries .post-date,	
	.widget_rss .rss-date,
	.widget_rss cite,	
	.tagcloud a,	
	.page-links,	
	.comments-title,
	.comment-reply-title,	
	.comment-metadata,
	.pingback .edit-link,	
	.comment-reply-link,	
	.comment-form label,	
	.no-comments,	
	.site-footer .site-title:after,	
	.site-footer span[role=separator],	
	.widecolumn label,
	.widecolumn .mu_register label,
	.product-menu .navigation-name  {
 		font-family : ".$header_font.", Sans serif;	
	} 
	
	html {
		font-family: ".$body_font.", Sans Serif;
	}
		

	
	@media screen and (min-width: 56.875em) {
	
			.transparent-header .site-title a,
			.transparent-header .site-description,
			.transparent-header .site-description,
			.transparent-header .main-navigation .primary-menu > li > a,
			.transparent-header .woo-cart-wrap a,
			#masthead.transparent-header .contact-info a.tel-link,
			#masthead.transparent-header .contact-info  a.email-link,
			#masthead.transparent-header .contact-info,
			#masthead.transparent-header .contact-info .fa,
			#masthead.transparent-header .social-navigation a,
			.transparent-header .hero-callout .callout-title,
			.transparent-header .hero-callout .start-button {
				color: #fff;
			}
			
			.transparent-header .main-navigation .primary-menu > li > a:hover {
				border-bottom:2px solid ".$colors['primary_color'].";
			}
			
			.transparent-header .contact-ribbon {
				background-color:transparent ;
			}
			
			.transparent-header.site-header {
				background-color: #00000038;
				box-shadow:unset ;
				position: absolute;
				z-index: 9999;
				width: 100%;
			}
			
			.transparent-header .main-navigation.sticky-nav #menu-topest > li > a { color:#000; }
			
			.transparent-header .main-navigation.sticky-nav #menu-topest > li > a:hover,
			.transparent-header .main-navigation.sticky-nav #menu-topest > li > a:focus { color:#fff; }		
	
		} /* end transparent header css */ 		
 	

";

}


/**
 * The template generates the css dynamically for instant display in the
 * Customizer preview.
 *
 */
function one_page_business_css_template() {
	?>
	<script type="text/css" id="tmpl-one-page-business-css-scheme">
		<?php 
		echo wp_strip_all_tags(one_page_business_get_theme_css() ); 
		?>
	</script>
	<?php
}
add_action( 'customize_controls_print_footer_scripts', 'one_page_business_css_template' );

