<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
function assign3_plugin_add_sublevel_menu() {

	add_submenu_page(
		'options-general.php',
		'Assign3_plugin Settings',
		'Assign3_plugin Setting',
		'manage_options',
		'assign3_plugin',
		'assign3_plugin_display_settings_page'
	);
	
}
add_action( 'admin_menu', 'assign3_plugin_add_sublevel_menu' );
?>