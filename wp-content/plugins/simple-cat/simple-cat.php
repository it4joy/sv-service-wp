<?php
/*
Plugin Name: Simple Cat
Description: Simple Catalogue
Version: 1.0
Author: Sensitive Graphics
Author URI: http://www.sensitivegraphics.com/
License: GPLv2
*/

function sc_custom_post_type() {
	register_post_type( 'product', array(
		'labels' => array(
			'name' => 'Продукты',
			'singular_name' => 'Продукт',
			'add_new' => 'Добавить новый',
			'add_new_item' => 'Добавить новый продукт',
			'edit_item' => 'Редактировать продукт',
			'new_item' => 'Новый продукт',
			'view_item' => 'Посмотреть продукт',
			'search_items' => 'Найти продукт',
			'not_found' => 'Продуктов не было найдено',
			'not_found_in_trash' => 'Продуктов не было найдено в корзине',
			'view_items' => 'Посмотреть продукты'
		),
		'description' => 'Создание и редактирование записей продуктов',
		'public' => true,
		'exclude_from_search' => false,
		'show_in_menu' => true,
		'menu_position' => 2,
		'menu_icon' => 'dashicons-format-aside',
		'supports' => array( 'title', 'editor', 'thumbnail', 'custom-fields' ),
		'taxonomies' => array( '' )
	) );
}
add_action( 'init', 'sc_custom_post_type' );

function sc_create_taxonomy() {
	register_taxonomy( 'categories', 'product', array(
		'labels' => array(
			'name' => 'Категории',
			'singular_name' => 'Категория',
			'search_items' => 'Найти категорию / подакатегорию',
			'popular_items' => 'Популярные категории',
			'all_items' => 'Все категории',
			'parent_item' => 'Родительская категория',
			'parent_item_colon' => 'Родительская категория:',
			'edit_item' => 'Редактировать категорию',
			'update_item' => 'Обновить категорию',
			'add_new_item' => 'Добавить категорию / подакатегорию',
			'view_item' => 'Посмотреть категорию',
			'new_item_name' => 'Название новой категории'
		),
		'public' => true,
		'show_in_menu' => true,
		'hierarchical' => true,
		'show_admin_column' => true
	) );
}
add_action( 'init', 'sc_create_taxonomy' );

/* function register_metas() {
	register_meta( 'product', 'product_key_data', array(
		'description' => 'Ключевые параметры продукта'
	) );
}
register_metas(); */

add_action( 'add_meta_boxes', 'sc_add_custom_meta_box' );
function sc_add_custom_meta_box() {
	add_meta_box( 'product_key_data', 'Ключевые параметры продукта', 'product_key_data_callback', 'product', 'high' ); // test!;
}

// test! : try several input fields within one custom meta box;
// q: is it necessary to place even input field into standalone meta box?..
function product_key_data_callback() {
	?>

	<p><label for="price">Цена:</label></p>
	<p><input type="text" id="price" name="product_key_data[price]"></p>
	<p><label for="art">Артикул:</label></p>
	<p><input type="text" id="art" name="product_key_data[art]"></p>
	<p><label for="available">Наличие:</label></p>
	<p><input type="text" id="available" name="product_key_data[available]"></p>
	<p><label for="packing">Фасовка, мин.:</label></p>
	<p><input type="text" id="packing" name="product_key_data[packing]"></p>
	<p><input type="hidden" name="product_key_data_nonce" value="<?php echo wp_create_nonce( 'product_key_data_nonce_key' ); ?>"></p>

	<?php
}

// save post data when post was saved;
// use this function for other meta boxes?..

function sc_save_postdata( $post_ID ) {
	if ( ! wp_verify_nonce( $_POST['product_key_data_nonce'], 'product_key_data_nonce_key' ) ) {
		return false;
	}
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return false;
	}
	if ( ! isset( $_POST['product_key_data'] ) ) {
		return false;
	}
	$_POST['product_key_data'] = array_map( 'trim', $_POST['product_key_data'] );
	
	foreach ( $_POST['product_key_data'] as $key => $value ) {
		if ( empty($value) ) {
			delete_post_meta( $post_ID, $key );
			continue;
		}
		
		update_post_meta( $post_ID, $key, $value ); // look: $prev_value;
	}
	return $post_ID;
}
add_action( 'save_post', 'sc_save_postdata' );