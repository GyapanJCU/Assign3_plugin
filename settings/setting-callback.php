<?php 

if ( ! defined( 'ABSPATH' ) ) {
	exit;	
}

function assign3_plugin_callback_section_mail() {
	
	echo '<p>These settings enable you to add senders email address.</p>';
	
}
function assign3_plugin_callback_field_email( $args ) {
	
	$options = get_option( 'assign3_plugin_options', assign3_plugin_options_default() );
	
	$id    = isset( $args['id'] )    ? $args['id']    : '';
	$label = isset( $args['label'] ) ? $args['label'] : '';
	
	$value = isset( $options[$id] ) ? sanitize_email( $options[$id] ) : '';
	
	echo '<input id="assign3_plugin_options_'. $id .'" name="assign3_plugin_options['. $id .']" type="email" size="40" value="'. $value .'"><br />';
	echo '<label for="assign3_plugin_options_'. $id .'">'. $label .'</label>';
	
}