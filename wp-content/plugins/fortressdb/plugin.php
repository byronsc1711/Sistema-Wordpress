<?php
/**
 * Plugin Name: FortressDB
 * Plugin URI: https://fortressdb.com/
 * Description: Secure data tables for WordPress with Gutenberg blocks. Ideal for GDPR, choose your database location from US, EU or UK.
 * Version: 2.0.17
 * Author: FortressDB
 *
 * @category Data tables, Gutenberg, Security, Privacy, GDPR
 * @author   FortressDB
 * @version  2.0.17
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'FORTRESSDB_VERSION', '1.0.11' );
define( 'FORTRESSDB_API_HANDLERS', 'api' );
define( 'FORTRESSDB_PLUGIN_DIR_URL', untrailingslashit( plugin_dir_url( __FILE__ ) ) );
define( 'FORTRESSDB_PLUGIN_DIR_PATH', untrailingslashit( plugin_dir_path( __FILE__ ) ) );
define( 'FORTRESSDB_PLUGIN_ADDONS_URL', FORTRESSDB_PLUGIN_DIR_URL . '/addons' );
define( 'FORTRESSDB_PLUGIN_ADDONS_DIR', FORTRESSDB_PLUGIN_DIR_PATH . '/addons' );
define( 'FORTRESSDB_OPTIONS', 'fortressdb_options' );
define( 'FORTRESSDB_ROLE_NOT_LOGGED_IN', '@not_logged_in' );
define( 'FORTRESSDB_ROLE_ALL', '@all' );

global $pluginOptions;
$pluginOptions     = (array) get_option( FORTRESSDB_OPTIONS, array() );
$location          = isset( $pluginOptions['location'] ) ? $pluginOptions['location'] : '';
$custom_server     = isset( $pluginOptions['customServer'] ) ? $pluginOptions['customServer'] : null;
$use_custom_server = isset( $pluginOptions['useCustomServer'] ) ? $pluginOptions['useCustomServer'] : false;
$region            = $location;
if ( $region ) {
	$region .= '.';
}

define( 'FORTRESSDB_BACKEND_PROTOCOL', $use_custom_server ? $custom_server['protocol'] : 'https://' );
define( 'FORTRESSDB_BACKEND_HOST', $use_custom_server ? $custom_server['hostname'] : 'fortressdb.net' );
define( 'FORTRESSDB_BACKEND_PORT', $use_custom_server ? $custom_server['port'] : '' );
define( 'FORTRESSDB_LOCATION', $use_custom_server ? $custom_server['pathname'] : $region );
define( 'FORTRESSDB_BACKEND_SECURE', $use_custom_server ? $custom_server['secure'] : true );
define( 'FORTRESSDB_BACKEND_URL', FORTRESSDB_BACKEND_PROTOCOL . FORTRESSDB_LOCATION . FORTRESSDB_BACKEND_HOST . FORTRESSDB_BACKEND_PORT . "/api/" );

require_once( 'includes/helpers.php' );
require_once( 'addons.php' );
require_once( 'migrations/manager.php' );

if ( isset( $_REQUEST['clear'] ) ) {
	delete_option( FORTRESSDB_OPTIONS );
}

function fortressdb_register_blocks() {
	$file = '/build/fortressdb_blocks.js';
	wp_enqueue_script(
		'fortressdb_blocks_js',
		plugins_url( $file, __FILE__ ),
		array( 'wp-polyfill', 'wp-blocks', 'wp-i18n', 'wp-element', 'jquery', 'fortressdb_lib_js' ),
		filemtime( FORTRESSDB_PLUGIN_DIR_PATH . $file )
	);
}

function fortressdb_enqueue_styles() {
	$file = '/build/fortressdb.css';
	wp_enqueue_style(
		'fortressdb_lib_style',
		plugins_url( $file, __FILE__ ),
		array(),
		filemtime( FORTRESSDB_PLUGIN_DIR_PATH . $file )
	);
}

function fortressdb_stringify_options ($options) {
	$arr_obj  = new ArrayObject($options);
	$options = $arr_obj->getArrayCopy();
	$options['connected'] = isset( $options['accessToken'] ) ? (bool) $options['accessToken'] : false;
	$options['isAdmin']   = fortressdb_user_is_admin();
	$options['userId']		= get_current_user_id();
	$roles                = array(
		FORTRESSDB_ROLE_ALL           => 'All',
		FORTRESSDB_ROLE_NOT_LOGGED_IN => 'Not Logged In',
	);
	foreach ( wp_roles()->roles as $key => $value ) {
		$value         = (array) $value;
		$roles[ $key ] = $value['name'];
	}
	$options['roles']     = $roles;
	$options['userRoles'] = fortressdb_user_roles();
	unset( $options['accessToken'] );
	return json_encode($options);
}

function fortressdb_enqueue_scripts ($hook_suffix) {
	global $pluginOptions;

	$file = '/build/fortressdb_vendors.js';
	wp_enqueue_script(
		'fortressdb_vendors_js',
		plugins_url( $file, __FILE__ ),
		array('react', 'react-dom'),
		filemtime( FORTRESSDB_PLUGIN_DIR_PATH . $file )
	);

	$file = '/build/fdblib.js';
	wp_enqueue_script(
		'fdblib_js',
		plugins_url( $file, __FILE__ ),
		array(),
		filemtime( FORTRESSDB_PLUGIN_DIR_PATH . $file )
	);

	$file = '/build/fdblib-components.css';
	wp_enqueue_style(
		'fdblib_components_css',
		plugins_url( $file, __FILE__ ),
		array(),
		filemtime( FORTRESSDB_PLUGIN_DIR_PATH . $file )
	);

	$file = '/build/fdblib-components.js';
	wp_enqueue_script(
		'fdblib_components_js',
		plugins_url( $file, __FILE__ ),
		array( 'react', 'react-dom', 'fdblib_js' ),
		filemtime( FORTRESSDB_PLUGIN_DIR_PATH . $file )
	);

	$file = '/build/fortressdb.js';
	$assets = FORTRESSDB_PLUGIN_DIR_PATH . '/build/fortressdb.asset.php';
	$script_asset = file_exists(  $assets )
		? require( $assets )
		: array( 'dependencies' => array(), 'version' => filemtime( $file ) );
	wp_enqueue_script(
		'fortressdb_lib_js',
		plugins_url( $file, __FILE__ ),
		array_merge(
			array( 'fdblib_components_js', 'fortressdb_vendors_js' ),
			$script_asset['dependencies']
		),
		md5(filemtime( FORTRESSDB_PLUGIN_DIR_PATH . $file ) . $script_asset['version'])
	);

	if ( $hook_suffix === 'toplevel_page_fortressdb_plugin' ) {
		$file = '/build/pages/fdblib-page-connect.css';
		wp_enqueue_style(
			'fdblib_page_connect_css',
			plugins_url( $file, __FILE__ ),
			array(),
			filemtime( FORTRESSDB_PLUGIN_DIR_PATH . $file )
		);
		$file = '/build/pages/fdblib-page-connect.js';
		wp_enqueue_script(
			'fdblib_page_connect_js',
			plugins_url( $file, __FILE__ ),
			array( 'fdblib_components_js' ),
			filemtime( FORTRESSDB_PLUGIN_DIR_PATH . $file )
		);
		$file = '/build/fortressdb_page_settings.js';
		wp_enqueue_script(
			'fortressdb_page_settings_js',
			plugins_url( $file, __FILE__ ),
			array( 'fdblib_page_connect_js', 'fortressdb_lib_js' ),
			filemtime( FORTRESSDB_PLUGIN_DIR_PATH . $file )
		);
	}

	if ( $hook_suffix === 'fortressdb_page_fortressdb_support' ) {
		$file = '/build/fortressdb_page_support.css';
		wp_enqueue_style(
			'fortressdb_page_support_css',
			plugins_url( $file, __FILE__ ),
			array(),
			filemtime( FORTRESSDB_PLUGIN_DIR_PATH . $file )
		);
		$file = '/build/fortressdb_page_support.js';
		wp_enqueue_script(
			'fortressdb_page_support_js',
			plugins_url( $file, __FILE__ ),
			array( 'fortressdb_lib_js' ),
			filemtime( FORTRESSDB_PLUGIN_DIR_PATH . $file )
		);
	}

	if ( $hook_suffix === 'fortressdb_page_fortressdb_api' ) {
		$file = '/build/fortressdb_page_api.css';
		wp_enqueue_style(
			'fortressdb_page_api_css',
			plugins_url( $file, __FILE__ ),
			array(),
			filemtime( FORTRESSDB_PLUGIN_DIR_PATH . $file )
		);
		$file = '/build/fortressdb_page_api.js';
		wp_enqueue_script(
			'fortressdb_page_api_js',
			plugins_url( $file, __FILE__ ),
			array( 'fortressdb_lib_js' ),
			filemtime( FORTRESSDB_PLUGIN_DIR_PATH . $file )
		);
	}

	if ( $hook_suffix === 'admin_page_fortressdb_developer' ) {
		$file = '/build/fortressdb_page_developer.css';
		wp_enqueue_style(
			'fortressdb_page_developer_css',
			plugins_url( $file, __FILE__ ),
			array(),
			filemtime( FORTRESSDB_PLUGIN_DIR_PATH . $file )
		);
		$file = '/build/fortressdb_page_developer.js';
		wp_enqueue_script(
			'fortressdb_page_developer_js',
			plugins_url( $file, __FILE__ ),
			array( 'fortressdb_lib_js' ),
			filemtime( FORTRESSDB_PLUGIN_DIR_PATH . $file )
		);
	}

	if ( $hook_suffix === 'fortressdb_page_fortressdb_picklists' ) {
		$file = '/build/fortressdb_page_picklists.css';
		wp_enqueue_style(
			'fortressdb_page_picklists_css',
			plugins_url( $file, __FILE__ ),
			array(),
			filemtime( FORTRESSDB_PLUGIN_DIR_PATH . $file )
		);
		$file = '/build/fortressdb_page_picklists.js';
		wp_enqueue_script(
			'fortressdb_page_picklists_js',
			plugins_url( $file, __FILE__ ),
			array( 'fortressdb_lib_js' ),
			filemtime( FORTRESSDB_PLUGIN_DIR_PATH . $file )
		);
	}

	if ( $hook_suffix === 'fortressdb_page_fortressdb_custom_data'
	 || $hook_suffix === 'fortressdb_page_fortressdb_secure_forms' ) {
		$file = '/build/fortressdb_page_tables.css';
		wp_enqueue_style(
			'fortressdb_page_tables_css',
			plugins_url( $file, __FILE__ ),
			array(),
			filemtime( FORTRESSDB_PLUGIN_DIR_PATH . $file )
		);
		$file = '/build/fortressdb_page_tables.js';
		wp_enqueue_script(
			'fortressdb_page_tables_js',
			plugins_url( $file, __FILE__ ),
			array( 'fortressdb_lib_js' ),
			filemtime( FORTRESSDB_PLUGIN_DIR_PATH . $file )
		);
	}

	if ( $hook_suffix === 'fortressdb_page_fortressdb_upgrade' ) {
		$file = '/build/fortressdb_page_upgrade.css';
		wp_enqueue_style(
			'fortressdb_page_upgrade_css',
			plugins_url( $file, __FILE__ ),
			array(),
			filemtime( FORTRESSDB_PLUGIN_DIR_PATH . $file )
		);
		$file = '/build/fortressdb_page_upgrade.js';
		wp_enqueue_script(
			'fortressdb_page_upgrade_js',
			plugins_url( $file, __FILE__ ),
			array( 'fortressdb_lib_js' ),
			filemtime( FORTRESSDB_PLUGIN_DIR_PATH . $file )
		);
	}

	$str_options = fortressdb_stringify_options( $pluginOptions );

	wp_add_inline_script( 'fortressdb_lib_js', "
    var fortressdbNonce = \"" . wp_create_nonce( 'fortressdb_plugin_nonce' ) . "\";
    var fortressdbUserLocale = \"" . fortressdb_user_locale() . "\";
    var fortressdbUserName = \"" . fortressdb_user_get_name() . "\";
    var fortressdbBackendUrl = \"" . FORTRESSDB_BACKEND_URL . "\";
    var fortressdbStaticUrl = \"" . plugins_url('', __FILE__) . "\";
    var fortressdbSocketOptions = {
        hostname: \"" . FORTRESSDB_LOCATION . FORTRESSDB_BACKEND_HOST . "\",
        path: \"/socketcluster/\",
        secure: " . ( FORTRESSDB_BACKEND_SECURE ? "true" : "false" ) . ",
        port: \"" . str_replace( ":", "", FORTRESSDB_BACKEND_PORT ) . "\",
				rejectUnauthorized: false,
				authTokenName: \"fortressdb_auth_token\"
		};
		var fortressdbInitialOptions = " . $str_options . ";
		", 'before' );
}

function fortressdb_include_settings_menu_page() {
	$file = FORTRESSDB_PLUGIN_DIR_PATH . '/pages/settingsPage.php';
	if ( file_exists( $file ) ) {
		include $file;
	} else {
		echo '<h2>File not found!</h2>';
	}
}

function fortressdb_include_custom_data_submenu_page() {
	$file = FORTRESSDB_PLUGIN_DIR_PATH . '/pages/customDataPage.php';
	if ( file_exists( $file ) ) {
		include $file;
	} else {
		echo '<h2>File not found!</h2>';
	}
}

function fortressdb_include_secure_forms_submenu_page() {
	$file = FORTRESSDB_PLUGIN_DIR_PATH . '/pages/secureFormsPage.php';
	if ( file_exists( $file ) ) {
		include $file;
	} else {
		echo '<h2>File not found!</h2>';
	}
}

function fortressdb_include_picklists_submenu_page() {
	$file = FORTRESSDB_PLUGIN_DIR_PATH . '/pages/picklistsPage.php';
	if ( file_exists( $file ) ) {
		include $file;
	} else {
		echo '<h2>File not found!</h2>';
	}
}

function fortressdb_include_upgrade_submenu_page() {
	$file = FORTRESSDB_PLUGIN_DIR_PATH . '/pages/upgradePage.php';
	if ( file_exists( $file ) ) {
		include $file;
	} else {
		echo '<h2>File not found!</h2>';
	}
}

function fortressdb_include_developer_submenu_page() {
	$file = FORTRESSDB_PLUGIN_DIR_PATH . '/pages/developerPage.php';
	if ( file_exists( $file ) ) {
		include $file;
	} else {
		echo '<h2>File not found!</h2>';
	}
}

function fortressdb_include_api_submenu_page() {
	$file = FORTRESSDB_PLUGIN_DIR_PATH . '/pages/apiPage.php';
	if ( file_exists( $file ) ) {
		include $file;
	} else {
		echo '<h2>File not found!</h2>';
	}
}

function fortressdb_include_support_page() {
	$file = FORTRESSDB_PLUGIN_DIR_PATH . '/pages/supportFormPage.php';
	if ( file_exists( $file ) ) {
		include $file;
	} else {
		echo '<h2>File not found!</h2>';
	}
}

function fortressdb_admin_menu() {
	global $pluginOptions;
	$cp   = 'manage_options';
	$icon = plugin_dir_url( __FILE__ ) . 'plugin-icon.png';
	add_menu_page( 'FortressDB', 'FortressDB', $cp, 'fortressdb_plugin', 'fortressdb_include_settings_menu_page', $icon );

	if ( fortressdb_is_connected() ) {
		add_submenu_page( null, 'Developer', 'Developer', $cp, 'fortressdb_developer', 'fortressdb_include_developer_submenu_page' );
		add_submenu_page( 'fortressdb_plugin', 'Secure Forms', 'Secure Forms', $cp, 'fortressdb_secure_forms', 'fortressdb_include_secure_forms_submenu_page' );
		add_submenu_page( 'fortressdb_plugin', 'Custom Data', 'Custom Data', $cp, 'fortressdb_custom_data', 'fortressdb_include_custom_data_submenu_page' );
		add_submenu_page( 'fortressdb_plugin', 'Selection Fields', 'Selection Fields', $cp, 'fortressdb_picklists', 'fortressdb_include_picklists_submenu_page' );
		add_submenu_page( 'fortressdb_plugin', 'License Details', 'License Details', $cp, 'fortressdb_upgrade', 'fortressdb_include_upgrade_submenu_page' );
		add_submenu_page( 'fortressdb_plugin', 'Support', 'Support', $cp, 'fortressdb_support', 'fortressdb_include_support_page' );

		if ( ! empty( $pluginOptions['apiTestTool'] ) ) {
			add_submenu_page( 'fortressdb_plugin', 'API Test Tool', 'API Test Tool', $cp, 'fortressdb_api', 'fortressdb_include_api_submenu_page' );
		}
	}
}

function fortressdb_admin_bar_menu( $admin_bar ) {
	global $pluginOptions;
	$iconurl = plugin_dir_url( __FILE__ ) . 'plugin-icon.png';

	$iconspan = '<span style="float:left; width:20px; height:100%; margin-right:6px; background: no-repeat center url(\'' . $iconurl . '\');"></span>';

	$title = 'FortressDB';

	$admin_bar->add_menu( array(
		'id'    => 'fortressdb-admin-bar-menu',
		'title' => $iconspan . $title,
		'href'  => admin_url( 'admin.php?page=fortressdb_plugin' ),
	) );

	if ( !fortressdb_is_connected() ) {
		return;
	}

	$admin_bar->add_menu( array(
		'id'     => 'fortressdb-admin-bar-menu-settings',
		'parent' => 'fortressdb-admin-bar-menu',
		'title'  => $title,
		'href'   => admin_url( 'admin.php?page=fortressdb_plugin' ),
	) );
	$admin_bar->add_menu( array(
		'id'     => 'fortressdb-admin-bar-menu-secure-forms',
		'parent' => 'fortressdb-admin-bar-menu',
		'title'  => 'Secure Forms',
		'href'   => admin_url( 'admin.php?page=fortressdb_secure_forms' ),
	) );
	$admin_bar->add_menu( array(
		'id'     => 'fortressdb-admin-bar-menu-custom-data',
		'parent' => 'fortressdb-admin-bar-menu',
		'title'  => 'Custom Data',
		'href'   => admin_url( 'admin.php?page=fortressdb_custom_data' ),
	) );
	$admin_bar->add_menu( array(
		'id'     => 'fortressdb-admin-bar-menu-picklists',
		'parent' => 'fortressdb-admin-bar-menu',
		'title'  => 'Selection Fields',
		'href'   => admin_url( 'admin.php?page=fortressdb_picklists' ),
	) );
	$admin_bar->add_menu( array(
		'id'     => 'fortressdb-admin-bar-menu-upgrade',
		'parent' => 'fortressdb-admin-bar-menu',
		'title'  => 'License Details',
		'href'   => admin_url( 'admin.php?page=fortressdb_upgrade' ),
	) );

	$admin_bar->add_menu( array(
		'id'     => 'fortressdb-admin-bar-menu-support',
		'parent' => 'fortressdb-admin-bar-menu',
		'title'  => 'Support',
		'href'   => admin_url( 'admin.php?page=fortressdb_support' ),
	) );

	if ( isset( $pluginOptions['apiTestTool'] ) && $pluginOptions['apiTestTool'] ) {
		$admin_bar->add_menu( array(
			'id'     => 'fortressdb-admin-bar-menu-api',
			'parent' => 'fortressdb-admin-bar-menu',
			'title'  => 'API Test Tool',
			'href'   => admin_url( 'admin.php?page=fortressdb_api' ),
		) );
	}
}

function fortressdb_get_current_user() {
	if ( ! wp_verify_nonce( $_REQUEST['nonce'], 'fortressdb_plugin_nonce' ) ) {
		return;
	}
	if ( is_user_logged_in() ) {
		$curUser = wp_get_current_user();
		echo json_encode( $curUser );
	} else {
		echo '';
	}
	wp_die();
}

function fortressdb_user_is_admin() {
	if ( ! is_user_logged_in() ) {
		return false;
	}
	$user = wp_get_current_user();

	return in_array( 'administrator', (array) $user->roles );
}

function fortressdb_user_get_name() {
	if ( ! is_user_logged_in() ) {
		return false;
	}

	$user = wp_get_current_user();

	return $user->display_name;
}

function fortressdb_user_roles() {
	$roles = array( FORTRESSDB_ROLE_ALL );
	if ( is_user_logged_in() ) {
		$user  = wp_get_current_user();
		$roles = array_merge( $roles, (array) $user->roles );
	} else {
		$roles[] = FORTRESSDB_ROLE_NOT_LOGGED_IN;
	}

	return $roles;
}

function fortressdb_user_locale() {
	if ( ! is_user_logged_in() ) {
		return get_locale();
	}
	$user = wp_get_current_user();

	return get_user_locale( $user );
}

// proxy fortressdb api
function fortressdb_api_options( $method, $msg ) {
	global $pluginOptions;
	$options  = $pluginOptions;
	switch ( $method ) {
		case "GET":
			break;
		case "POST":
		case "PUT":
			$is_admin = fortressdb_user_is_admin();
			if ( ! $is_admin ) {
				http_response_code( 403 );
				echo json_encode( array( 'message' => "Permission denied" ) );
				exit;
			}
			$options = array_merge( $options, (array) $msg['options'] );
			update_option( FORTRESSDB_OPTIONS, $options );
			break;
		case "DELETE":
			$is_admin = fortressdb_user_is_admin();
			if ( ! $is_admin ) {
				http_response_code( 403 );
				echo json_encode( array( 'message' => "Permission denied" ) );
				exit;
			}
			foreach ( (array) $msg['options'] as $name ) {
				unset( $options[ $name ] );
			}
			update_option( FORTRESSDB_OPTIONS, $options );
			break;
	}
	return fortressdb_stringify_options( $options );
}

function fortressdb_api_backend() {
	global $pluginOptions;
	$nonce = $_REQUEST['nonce'];
	if ( ! wp_verify_nonce( $nonce, 'fortressdb_plugin_nonce' ) ) {
		return;
	}

	$msg         = array();
	$contentType = $_SERVER["CONTENT_TYPE"];
	if ( $contentType == 'application/json' ) {
		$msg = json_decode( file_get_contents( 'php://input' ), true );
	} else {
		http_response_code( 400 );
		echo json_encode( array( 'message' => "Unsupported Content-Type: '{$contentType}'" ) );
		exit;
	}

	$headers       = array( 'Content-Type' => 'application/json' );
	$accessToken   = isset( $msg['_accessToken'] ) ? $msg['_accessToken'] : '';
	$method        = isset( $msg['_method'] ) ? $msg['_method'] : '';
	$name          = isset( $msg['_name'] ) ? $msg['_name'] : '';
	$location      = isset( $msg['_location'] ) ? $msg['_location'] : '';
	$custom_server = isset( $msg['_customServer'] ) ? $msg['_customServer'] : null;
	$is_new_user   = isset( $msg['context']['isNewUser'] ) ? $msg['context']['isNewUser'] : false;
	$options = $pluginOptions;

	unset( $msg['_name'], $msg['_accessToken'], $msg['_method'], $msg['_location'], $msg['name'], $msg['_customServer'] );
	if ( ! $name ) {
		http_response_code( 400 );
		echo json_encode( array( 'message' => 'Empty endpoint name.' ) );
		exit;
	}
	if ( $name == 'options' ) {
		echo fortressdb_api_options( $method, $msg );
		if ( $method == 'POST' || $method == 'PUT' ) {
			if ( isset($msg['options']) && isset($msg['options']['permissions']) && isset( $options['accessToken'] ) ) {
				wp_remote_request( FORTRESSDB_BACKEND_URL . "auth/version", array(
					'method'  => 'POST',
					'headers' => array( 'Authorization' => "Bearer {$options['accessToken']}" )
				) );
			}
		}
		exit;
	}
	if ( ! $accessToken ) {
		$accessToken = isset( $options['accessToken'] ) ? $options['accessToken'] : '';
	}
	if ( $name == 'auth/subscribe' && $method == 'POST' ) {
		if ( ! $accessToken ) {
			http_response_code( 400 );
			echo json_encode( array( 'message' => 'Plugin is not connected.' ) );
			exit;
		}
		$roles              = fortressdb_user_roles();
		$is_admin           = fortressdb_user_is_admin();
		$tables_permissions = array();
		if ( isset( $options['permissions'] ) ) {
			foreach ( (array) $options['permissions'] as $table_name => $access_roles ) {
				$table_permissions = array();
				foreach ( $access_roles as $role => $permissions ) {
					if ( in_array( $role, $roles ) ) {
						$table_permissions = array_merge( $table_permissions, (array) $permissions );
					}
				}
				$tables_permissions[ $table_name ] = $table_permissions;
			}
		}
		$msg['data']              = array(
			array(
				'permissions' => array(
					'isAdmin' => $is_admin,
					'tables'  => $tables_permissions,
				),
				'userId' => get_current_user_id()
			),
		);
		$msg['context']['locale'] = fortressdb_user_locale();
	}
	if ( $accessToken ) {
		$headers['Authorization'] = "Bearer {$accessToken}";
	}
	if ( $method && $method != 'POST' ) {
		$headers['X-HTTP-Method-Override'] = $method;
	}
	$backendUrl = FORTRESSDB_BACKEND_URL;
	if ( $name == 'database/connection' && $method == 'POST' ) {
		if ( $custom_server ) {
			$backendUrl =
				$custom_server['protocol'] .
				$custom_server['hostname'] . $custom_server['port'] . "/" .
				$custom_server['pathname'] . "api/";
		} else {
			$region = $location;
			if ( $region ) {
				$region .= '.';
			}
			$backendUrl = FORTRESSDB_BACKEND_PROTOCOL . $region . FORTRESSDB_BACKEND_HOST . FORTRESSDB_BACKEND_PORT . "/api/";
		}
		$msg['context']['locale']    = fortressdb_user_locale();
		$msg['context']['location']  = $custom_server ? 'custom' : $location;
		$msg['context']['isNewUser'] = $is_new_user;

		$username = fortressdb_user_get_name();

		$msg['data'][0]['name'] = isset( $msg['name'] ) ? $msg['name'] : $username;
	}
	$result = wp_remote_request( $backendUrl . "{$name}", array(
		'method'  => 'POST',
		'headers' => $headers,
		'body'    => json_encode( $msg ),
	) );

	if ( is_wp_error( $result ) ) {
		$body = json_encode( array( 'message' => $result->get_error_message() ) );
		$code = 400;
	} else {
		$response = $result['response'];
		$body     = $result['body'];
		$code     = $response['code'];
	}

	if ( $name == 'database/connection' ) {
		if ( $method == 'POST' && $code < 300 ) {
			$data = json_decode( $body, true );
			$msg  = array(
				'options' => array(
					'domain'          => $msg['context']['domain'],
					'location'        => $location,
					'email'           => $msg['data'][0]['email'],
					'name'            => $msg['data'][0]['name'],
					'accessToken'     => $data['accessToken'] ?: '',
					'customServer'    => $custom_server,
					'useCustomServer' => (bool) $custom_server,
				),
			);
			echo fortressdb_api_options( $method, $msg );
			exit;
		} elseif ( $method == 'DELETE' ) {
			$msg = array( 'options' => array( 'accessToken', 'useCustomServer' ) );
			echo fortressdb_api_options( $method, $msg );
			exit;
		}
	}
	http_response_code( $code );
	echo $body;
	exit;
}

function fortressdb_user_logout( $array ) {
	global $pluginOptions;
	$accessToken = $pluginOptions['accessToken'];
	if ( ! ( isset( $accessToken ) && $accessToken ) ) {
		exit;
	}
	wp_remote_request(
		FORTRESSDB_BACKEND_URL . 'auth/logout',
		array(
			'method'  => 'POST',
			'headers' => array(
				'Content-Type' => 'application/json',
				'Authorization' => "Bearer {$accessToken}"
			),
			'body'    => json_encode(
				array(
					'data' => array(
							array(
								'userId' => get_current_user_id()
							),
						)
				)
			),
		)
	);
}

function fortressdb_support_form() {
	if ( ! class_exists( 'WP_Debug_Data' ) ) {
		require_once ABSPATH . 'wp-admin/includes/class-wp-debug-data.php';
	}
	global $pluginOptions;
	$nonce = $_REQUEST['nonce'];
	if ( ! wp_verify_nonce( $nonce, 'fortressdb_plugin_nonce' ) ) {
		return;
	}
	$accessToken = isset( $pluginOptions['shortAccessToken'] ) ? $pluginOptions['shortAccessToken'] : '';
	if ( empty($accessToken) ) {
		http_response_code(400);
		echo "Plugin is not connected";
		exit();
	}

	$request_data = json_decode( file_get_contents( 'php://input' ), true );
	$data = array(
		'name' => isset($request_data['name']) ? htmlspecialchars($request_data['name']): '',
		'email' => isset($request_data['email']) ? htmlspecialchars($request_data['email']) : '',
		'message' => isset($request_data['message']) ? htmlspecialchars($request_data['message']) : '',
	);

	$errors = array();
	if (empty($data['name']) ) {
		$errors[] = "Name is empty";
	}
	if (empty($data['email'])) {
		$errors[] = "Email is empty";
	}
	if (empty($data['message'])) {
		$errors[] = "Message is empty";
	}
	if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
		$errors[] = "Email is invalid";
	}

	if (!empty($errors)) {
		http_response_code( 400 );
		echo json_encode(array("message" => implode(", ", $errors)) );
		exit;
	}

	$include_extra =  isset($request_data['includeExtra']) ? (bool)$request_data['includeExtra'] : false;
	if ($include_extra) {
		WP_Debug_Data::check_for_updates();
		try {
			$debug_info = WP_Debug_Data::debug_data();
			$info       = array();
			foreach ($debug_info as $category => $item) {
				if (!in_array($category, ['wp-core', 'wp-plugins-active', 'wp-server'])) {
					continue;
				}
				$info[$category] = array();
				foreach ($item['fields'] as $field_name => $field_value) {
					$info[$category][$field_name] = $field_value['value'];
				}
			}
		} catch (Exception $e) {
			$info = array('error' => $e->getMessage());
		}
		$data['extra'] = $info;
	}


	try {
		$api = FortressDB::get_api();
		$response = $api->post('support', $data);
		$response_code = 200;
		$response_body = json_encode(array('success' => true));
	} catch (Exception $e) {
		$response_code = 400;
		$response_body = json_encode(array('message' => $e->getMessage()));
	}

	http_response_code( $response_code );
	echo $response_body;
	exit;
}

/**
 * @return bool
 */
function fortressdb_is_connected() {
	global $pluginOptions;
	return isset( $pluginOptions['accessToken'] ) ? (bool) $pluginOptions['accessToken'] : false;
}

add_action( 'enqueue_block_editor_assets', 'fortressdb_register_blocks' );
add_action( 'admin_menu', 'fortressdb_admin_menu' );
add_action( 'admin_bar_menu', 'fortressdb_admin_bar_menu', 100 );
add_action( 'admin_enqueue_scripts', 'fortressdb_enqueue_styles' );
add_action( 'admin_enqueue_scripts', 'fortressdb_enqueue_scripts' );
add_action( 'wp_enqueue_scripts', 'fortressdb_enqueue_styles' );
add_action( 'wp_enqueue_scripts', 'fortressdb_enqueue_scripts' );
add_action( 'plugins_loaded', 'fortressdb_load_all_addons' );
# gform_loaded fires BEFORE plugins_loaded because reasons
add_action( 'gform_loaded', function () {
	fortressdb_addon_load( 'gravity_forms', 'GFForms', 'GF_SUPPORTED_WP_VERSION' );
} );

// api actions
add_action( 'wp_ajax_fortressdb_get_current_user', 'fortressdb_get_current_user' );
add_action( 'wp_ajax_nopriv_fortressdb_get_current_user', 'fortressdb_get_current_user' );
add_action( 'wp_ajax_fortressdb_api_backend', 'fortressdb_api_backend' );
add_action( 'wp_ajax_nopriv_fortressdb_api_backend', 'fortressdb_api_backend' );
add_action( 'wp_ajax_fortressdb_support_form', 'fortressdb_support_form' );

if ( ! class_exists( 'FortressDB' ) ) {
	require_once( fortressdb_includes_dir( 'class-fortressdb.php' ) );
	require_once( fortressdb_includes_dir( 'class-fortressdb-addon-exception.php' ) );
}

add_action( 'clear_auth_cookie', 'fortressdb_user_logout');

add_action( 'plugins_loaded', function () {
	if (!is_admin() || wp_doing_ajax() || wp_doing_cron()) {
		return;
	}
	$migration_manager = \FortressDB\Migrations\MigrationManager::getInstance();
	$migration_manager->applyMigrations();
}, 10);

load_plugin_textdomain( FortressDB::DOMAIN, false, basename( dirname( __FILE__ ) ) . '/languages/' );