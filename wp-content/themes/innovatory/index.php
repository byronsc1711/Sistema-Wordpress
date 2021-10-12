<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package innovatory
 */

get_header(); 
$sidebar_enable = get_theme_mod('sidebar_enable');
if ( have_posts() ) { 

	switch($sidebar_enable){
		case 'none':
			get_template_part( 'template-parts/content/content', 'fullwidth' );
			break;
		case 'left':
			get_template_part( 'template-parts/content/content', 'leftsidebar' );
			break;
		default:
			get_template_part( 'template-parts/content/content', 'rightsidebar' );
			break;
	}	
} 

get_footer();