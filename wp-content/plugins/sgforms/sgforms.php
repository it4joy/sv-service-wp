<?php
/*
Plugin Name: SG Forms
Description: Simple forms
Version: 1.0
Author: Sensitive Graphics
Author URI: http://www.sensitivegraphics.com/
License: GPLv2
*/

function sg_forms_scripts() {
	$url = plugin_dir_url( __FILE__ );

	wp_register_script( 'sg-forms-ajax', $url . 'sgforms.js', array( 'jquery' ), '1.0', true );
	wp_localize_script( 'sg-forms-ajax', 'sg_forms_ajax_url', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );
	wp_enqueue_script( 'sg-forms-ajax' );
}
add_action( 'wp_enqueue_scripts', 'sg_forms_scripts' );

function sgforms_ajax_callback() {
	if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
		if ( !empty( $_POST['phone'] ) ) {
			$to = 'drkierkegor@gmail.com';
			$body = "\nТелефон: {$_POST['phone']}\n\n";
			mail( $to, "Заявка на обратный звонок", $body, "From: {$_POST['phone']}" );
		}
	}
	wp_die();
}
add_action( 'wp_ajax_sgforms_action', 'sgforms_ajax_callback' );
add_action( 'wp_ajax_nopriv_sgforms_action', 'sgforms_ajax_callback' );