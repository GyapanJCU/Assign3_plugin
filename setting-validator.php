<?php 
if ( ! defined( 'ABSPATH' ) ) {
	
	exit;
	
}

function assign3_plugin_callback_validate_options( $input ) {
	
	// custom url
	if ( isset( $input['sender_id'] ) ) {
		
		$input['sender_id'] = is_email( $input['sender_id'] );
		
    }
    return $input;
}
?>