<?php 
if ( ! defined( 'ABSPATH' ) ) {
	
	exit;
	
}


function assign3_plugin_register_settings() {
	
	register_setting( 
		'assign3_plugin_options', 
		'assign3_plugin_options', 
		'assign3_plugin_callback_validate_options' 
	); 
	
	add_settings_section( 
		'assign3_plugin_section_mail', 
		'Setup Sender Page', 
		'assign3_plugin_callback_section_mail', 
		'assign3_plugin'
	);
	
	add_settings_field(
		'sender_id',
		'Sender Email Id',
		'assign3_plugin_callback_field_email',
		'assign3_plugin', 
		'assign3_plugin_section_mail', 
		[ 'id' => 'sender_id', 'label' => 'Senders email address' ]
    );
}
add_action( 'admin_init', 'assign3_plugin_register_settings' );
?>