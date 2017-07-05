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
	wp_localize_script( 'sg-forms-ajax', 'sg_forms_ajax', 
		array(
			'ajax_url' => admin_url( 'admin-ajax.php' ),
			'nonce' => wp_create_nonce( 'sg-forms-nonce' )
		)
	);
	wp_enqueue_script( 'sg-forms-ajax' );
}
add_action( 'wp_enqueue_scripts', 'sg_forms_scripts' );

$to = 'drkierkegor@gmail.com';

function sgforms_ajax() {
	global $to;

	$nonce = $_REQUEST['nonce'];

	if ( ! wp_verify_nonce( $nonce, 'sg-forms-nonce' ) ) {
		wp_die();
	} else {
		if ( $_REQUEST['form_type'] == 'footer-callback-form' ) {
			$phone = $_REQUEST['phone'];
			$subject  = 'Запрос на обратный звонок';
			$msg = 'Телефон: '.$phone .'<br/>';
			$headers  = "Content-Type: text/html; charset=utf-8\n";
			$headers .= "From: " . $_REQUEST['phone'];

			mail($to, $subject, $msg, $headers);
			wp_die();
		} elseif ( $_REQUEST['form_type'] == 'callback-form-ajax' ) {
			$name = $_REQUEST['name'];
			$phone = $_REQUEST['phone'];
			$subject  = 'Запрос на обратный звонок';
			$msg = 'Имя: ' . $name . '<br/>' . 'Телефон: ' . $phone;
			$headers  = "Content-Type: text/html; charset=utf-8\n";
			$headers .= "From: " . $_REQUEST['name'];

			mail($to, $subject, $msg, $headers);
			wp_die();
		}
	}
}

if ( wp_doing_ajax() ) {
	add_action('wp_ajax_nopriv_sg_ajax', 'sgforms_ajax' );
	add_action('wp_ajax_sg_ajax', 'sgforms_ajax' );
}