<?php
/*
Plugin Name: Assignment 3 Plugin
Description: Welcome to Assignment 3 plugin
Plugin URI:  https://plugin-planet.com/
Author:      Gyapan Shrestha
Version:     1.0
License:     GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.txt

This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 
2 of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
with this program. If not, visit: https://www.gnu.org/licenses/
*/
if ( ! defined( 'ABSPATH' ) ) {	
	exit;	
}

//require_once plugin_dir_path( __FILE__ ) . 'email-confirmation.php';
if(is_admin()){
require_once plugin_dir_path( __FILE__ ) . 'settings/setting.php';
require_once plugin_dir_path( __FILE__ ) . 'settings/settings-page.php';
require_once plugin_dir_path( __FILE__ ) . 'settings/setting-register.php';
require_once plugin_dir_path( __FILE__ ) . 'settings/setting-callback.php';
require_once plugin_dir_path( __FILE__ ) . 'settings/setting-validator.php';
require_once plugin_dir_path( __FILE__ ) . 'assign3-widget.php';
}

function assign3_plugin_on_activation() {

	if ( ! current_user_can( 'activate_plugins' ) ) return;

	add_option( 'assign3_plugin_sender','' );
	

}
register_activation_hook( __FILE__, 'assign3_plugin_on_activation' );

function assign3_plugin_on_deactivation() {

	if ( ! current_user_can( 'activate_plugins' ) ) return;

	flush_rewrite_rules();

}
register_deactivation_hook( __FILE__, 'assign3_plugin_on_deactivation' );

function assign3_plugin_on_uninstall() {

	if ( ! current_user_can( 'activate_plugins' ) ) return;

	delete_option( 'myplugin_posts_per_page' ,'');

}
register_uninstall_hook( __FILE__, 'assign3_plugin_on_uninstall' );

function assign3_plugin_options_default() {

	return array(
		'sender_id'     => 'test@email.com',
	);

}

function loadMyBlock() {
    wp_enqueue_script(
      'Assign3 Plugin Block',
      plugin_dir_url(__FILE__) . 'js/email-confirm-block.js',
      array('wp-blocks','wp-editor'),
      true
    );
  }
     
  add_action('enqueue_block_editor_assets', 'loadMyBlock');
  
  
function wpse_add_front_end_clicker_script() {
    wp_enqueue_script(
        'clicker',
        plugins_url('clicker.js', __FILE__),
        array('jquery'),
        filemtime( plugin_dir_path( __FILE__ ) . 'clicker.js' ),
        true
    );
}
add_action('init', 'wpse_add_front_end_clicker_script');
?>
