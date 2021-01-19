<?php
/*
Plugin Name: Assign 3 Mail widget
Description: Add clean, well-formatted markup to any widgetized area.
Plugin URI:  https://test.com/assign3-mail-widget/
Author:      Gyapan Shrestha
Version:     1.0
*/

class Assign3_Mail_Widget extends WP_Widget {

	public function __construct() {

		$id = 'assign3_mail_widget';

		$title = esc_html__('Assign3 Mail Widget', 'custom-widget');

		$options = array(
			'classname' => 'assign3-mail-widget',
			'description' => esc_html__('Ask for email address to be verified.', 'custom-widget')
		);

		parent::__construct( $id, $title, $options );

	}

	public function widget( $args, $instance ) {

		// extract( $args );

		$markup = '';

		if ( isset( $instance['markup'] ) ) {

			echo wp_kses_post( $instance['markup'] );

		}

	}

	public function update( $new_instance, $old_instance ) {

		$instance = array();

		if ( isset( $new_instance['markup'] ) && ! empty( $new_instance['markup'] ) ) {

			$instance['markup'] = $new_instance['markup'];

		}

		return $instance;

	}

	public function form( $instance ) {

    }

}

// register widget
function assign3_plugin_register_widgets() {

	register_widget( 'Assign3_Mail_Widget' );

}
add_action( 'widgets_init', 'assign3_plugin_register_widgets' );


?>