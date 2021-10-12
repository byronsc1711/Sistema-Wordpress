<?php
/**
 * Template part for displaying site info
 *
 * @package Bosa Corporate Business
 */

?>

<div class="site-info">
	<?php echo wp_kses_post( html_entity_decode( esc_html__( 'Copyright &copy; ' , 'bosa-corporate-business' ) ) );
		echo esc_html( date( 'Y' ) );
		printf( esc_html__( ' Bosa Corporate Business. Powered by', 'bosa-corporate-business' ) );
	?>
	<a href="<?php echo esc_url( __( '//bosathemes.com', 'bosa-corporate-business' ) ); ?>" target="_blank">
		<?php
			printf( esc_html__( 'Bosa Themes', 'bosa-corporate-business' ) );
		?>
	</a>
</div><!-- .site-info -->