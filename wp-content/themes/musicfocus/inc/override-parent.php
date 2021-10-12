<?php
/*
 * Add functions here to override parent theme functions
 */

/**
 * Register Google fonts Poppin for BusinessFociu
 *
 * @since MusicFocus 1.0.0
 *
 * @return string Google fonts URL for the theme.
 */
function photofocus_fonts_url() {
	$fonts_url = '';

	/* Translators: If there are characters in your language that are not
	* supported by Poppins, translate this to 'off'. Do not translate
	* into your own language.
	*/
	$poppins = _x( 'on', 'Poppins: on or off', 'musicfocus' );

	if ( 'off' !== $poppins ) {
		$font_families = array();

		$font_families[] = 'Poppins:200,300,400,500,600,700,400italic,700italic';
		
		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);

		$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
	}

	return esc_url_raw( $fonts_url );
}

/**
 * Override parent theme to add promotion headline section.
 */
function photofocus_sections( $selector = 'header' ) {
	get_template_part( 'template-parts/header/header-media' );
	get_template_part( 'template-parts/slider/display-slider' );
	get_template_part( 'template-parts/services/display-services' );
	get_template_part( 'template-parts/hero-content/content','hero' );
	get_template_part( 'template-parts/featured-content/display-featured' );
	get_template_part( 'template-parts/portfolio/display-portfolio' );
	get_template_part( 'template-parts/testimonial/display-testimonial' );
	get_template_part( 'template-parts/sticky-playlist/content-playlist' );
}

/**
 * Display Header Media Text
 *
 * @since PhotoFocus Pro 1.0
 */
function photofocus_header_media_text() {

	if ( ! photofocus_has_header_media_text() ) {
		// Bail early if header media text is disabled on front page
		return get_header_image();
	}

	$content_alignment = get_theme_mod( 'photofocus_header_media_content_alignment', 'content-align-left' );
	$text_alignment = get_theme_mod( 'photofocus_header_media_text_alignment', 'text-align-left' );

	$header_media_logo = get_theme_mod( 'photofocus_header_media_logo' );

	$classes = array();
	if( is_front_page() ) {
		$classes[] = $content_alignment;
		$classes[] = $text_alignment;
	}

	?>
	<div class="custom-header-content sections header-media-section <?php echo esc_attr( implode( ' ', $classes ) ); ?>">
		<div class="custom-header-content-wrapper">
			<?php
			$header_media_subtitle = get_theme_mod( 'photofocus_header_media_sub_title' );
			$enable_homepage_logo = get_theme_mod( 'photofocus_header_media_logo_option', 'homepage' );

			if( is_front_page() ) : ?>
				<div class="section-subtitle"> <?php echo esc_html( $header_media_subtitle ); ?> </div>
			<?php endif;

			if ( photofocus_check_section( $enable_homepage_logo ) && $header_media_logo ) {  ?>
				<div class="site-header-logo">
					<img src="<?php echo esc_url( $header_media_logo ); ?>" title="<?php echo esc_url( home_url( '/' ) ); ?>" />
				</div><!-- .site-header-logo -->
			<?php } ?>

			<?php
			$tag = 'h2';

			if ( is_singular() || is_404() ) {
				$tag = 'h1';
			}

			photofocus_header_title( '<div class="section-title-wrapper"><' . $tag . ' class="section-title entry-title">', '</' . $tag . '></div>' );
			?>

			<?php photofocus_header_description( '<div class="site-header-text">', '</div>' ); ?>

			<?php if ( is_front_page() ) :
				$header_media_url_text = get_theme_mod( 'photofocus_header_media_url_text' );
				
				if ( $header_media_url_text ) : 
					$header_media_url = get_theme_mod( 'photofocus_header_media_url', '#' );
					?>
					<span class="more-link">
						<a href="<?php echo esc_url( $header_media_url ); ?>" target="<?php echo esc_attr( get_theme_mod( 'photofocus_header_url_target' ) ? '_blank' : '_self' ); ?>" class="readmore"><?php echo esc_html( $header_media_url_text ); ?></a>
					</span>
				<?php endif;

				$header_media_secondary_url_text = get_theme_mod( 'photofocus_header_media_secondary_url_text' );
				
				if ( $header_media_secondary_url_text ) : 
					$header_media_secondary_url = get_theme_mod( 'photofocus_header_media_secondary_url', '#' );
					?>
					<span class="more-link">
						<a href="<?php echo esc_url( $header_media_secondary_url ); ?>" target="<?php echo esc_attr( get_theme_mod( 'photofocus_header_secondary_url_target' ) ? '_blank' : '_self' ); ?>" class="readmore solid-button"><?php echo esc_html( $header_media_secondary_url_text ); ?></a>
					</span>
				<?php endif; ?>
			<?php endif; ?>
		</div><!-- .custom-header-content-wrapper -->
	</div><!-- .custom-header-content -->
	<?php
} // photofocus_header_media_text.
