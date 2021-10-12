<?php
/**
 * Citadela Theme Settings screen
 *
 */
class CitadelaThemeSettings {

	public static function run() {
		add_action( 'admin_menu', [ __CLASS__, 'create_menu' ], 10 );
	}



	public static function create_menu() {
		add_theme_page(
			__('Citadela Theme', 'citadela'),
			__('Citadela Theme', 'citadela'),
			'edit_dashboard',
			'citadela-settings',
			[ __CLASS__, 'render_settings_page' ]
		);
	}



    public static function render_settings_page()
	{
		if ((class_exists('Citadela') && Citadela::$package === 'themeforest') || defined('CITADELA_BLOCKS_PLUGIN') || defined('CITADELA_DIRECTORY_PLUGIN') || defined('CITADELA_PRO_PLUGIN')) {
			get_template_part('citadela-theme/admin/settings/templates/citadela-pro-screen');
		} else {
			get_template_part('citadela-theme/admin/settings/templates/citadela-free-screen');
		}
	}



	public static function get_instance()
	{
		if(!self::$instance){
			self::$instance = new self;
		}

		return self::$instance;
	}

}
