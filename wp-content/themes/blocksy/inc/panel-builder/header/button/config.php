<?php

$config = [
	'name' => __('Button', 'blocksy'),
	'clone' => true,

	'selective_refresh' => [
		'header_button_open',
		'header_button_select_popup',
		'icon',
		'icon_position'
	],

	'translation_keys' => [
		[
			'key' => 'header_button_text',
			'multiline' => false
		],

		[
			'key' => 'header_button_link',
			'multiline' => false
		]
	]
];
