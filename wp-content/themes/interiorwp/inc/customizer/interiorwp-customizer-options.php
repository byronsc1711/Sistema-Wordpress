<?php
/**
 * Customizer section options.
 *
 * @package interiorwp
 *
 */

function interiorwp_customizer_theme_settings( $wp_customize ){
	
	$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';	
		
		$wp_customize->add_setting(
			'designexo_footer_copright_text',
			array(
				'sanitize_callback' =>  'interiorwp_sanitize_text',
				'default' => __('Copyright &copy; 2021 | Powered by <a href="//wordpress.org/">WordPress</a> <span class="sep"> | </span> InteriorWP theme by <a target="_blank" href="//themearile.com/">ThemeArile</a>', 'interiorwp'),
				'transport'         => $selective_refresh,
			)	
		);
		$wp_customize->add_control('designexo_footer_copright_text', array(
				'label' => esc_html__('Footer Copyright','interiorwp'),
				'section' => 'designexo_footer_copyright',
				'priority'        => 10,
				'type'    =>  'textarea'
		));

}
add_action( 'customize_register', 'interiorwp_customizer_theme_settings' );

function interiorwp_sanitize_text( $input ) {
		return wp_kses_post( force_balance_tags( $input ) );
}