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
	wp_enqueue_script( 'sg-forms-ajax' );
}
add_action( 'wp_enqueue_scripts', 'sg_forms_scripts' );

function sgforms_ajax() {
	if ( $_REQUEST['form_type'] == 'footer-callback-form' ) {
		$phone = $_REQUEST['phone'];
		$subject  = 'Запрос на обратный звонок';

		$msg = 'Телефон: '.$phone .'<br/>';
		$to = 'drkierkegor@gmail.com';
		$headers  = "Content-Type: text/html; charset=utf-8\n";
		$headers .= "From: " . $_REQUEST['phone'];

		mail($to, $subject, $msg, $headers);
		wp_die();
	}
}
add_action('wp_ajax_nopriv_sg_ajax', 'sgforms_ajax' );
add_action('wp_ajax_sg_ajax', 'sgforms_ajax' );