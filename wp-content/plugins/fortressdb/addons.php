<?php

define( 'FORTRESSDB_MAX_FIELDS_ORDER', 1000 );

function fortressdb_load_all_addons() {
	$addons = array(
		'forminator' => array(
			'version_constant' => 'FORMINATOR_VERSION',
			'class_name' => 'Forminator_Addon_Loader',
		),
		'weforms' => array(
			'version_constant' => 'WEFORMS_VERSION',
			'class_name' => 'WeForms',
		)
	);
	
	foreach ( $addons as $id => $addon ) {
		fortressdb_addon_load( $id, $addon['class_name'], $addon['version_constant'] );
	}
}
