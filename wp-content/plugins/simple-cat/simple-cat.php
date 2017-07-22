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

function sc_create_taxonomies() {
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
		'hierarchical' => true,
		'show_admin_column' => true
	) );

	register_taxonomy( 'brands', 'product', array(
		'labels' => array(
			'name' => 'Бренды',
			'singular_name' => 'Бренд',
			'search_items' => 'Найти бренд',
			'popular_items' => 'Популярные бренды',
			'all_items' => 'Все бренды',
			'edit_item' => 'Редактировать бренд',
			'update_item' => 'Обновить бренд',
			'add_new_item' => 'Добавить бренд',
			'view_item' => 'Посмотреть бренд',
			'new_item_name' => 'Название нового бренда'
		),
		'show_admin_column' => true
	) );

	register_taxonomy( 'relations', 'product', array(
		'labels' => array(
			'name' => 'Связанные элементы',
			'singular_name' => 'Элемент',
			'search_items' => 'Найти элемент',
			'popular_items' => 'Популярные элементы',
			'all_items' => 'Все элементы',
			'edit_item' => 'Редактировать элемент',
			'update_item' => 'Обновить элемент',
			'add_new_item' => 'Добавить элемент',
			'view_item' => 'Посмотреть элемент',
			'new_item_name' => 'Название нового элемента'
		),
		'hierarchical' => true,
		'show_admin_column' => true
	) );
	
	register_taxonomy( 'tags', 'product', array(
		'labels' => array(
			'name' => 'Теги',
			'singular_name' => 'Тег',
			'search_items' => 'Найти тег',
			'popular_items' => 'Популярные теги',
			'all_items' => 'Все теги',
			'edit_item' => 'Редактировать тег',
			'update_item' => 'Обновить тег',
			'add_new_item' => 'Добавить тег',
			'view_item' => 'Посмотреть тег',
			'new_item_name' => 'Название нового тега'
		),
		'show_admin_column' => true
	) );
}
add_action( 'init', 'sc_create_taxonomies' );

// add custom meta boxes;

function sc_add_custom_meta_box() {
	add_meta_box( 'product_key_data', 'Ключевые параметры продукта', 'product_key_data_callback', 'product', 'normal', 'high'  );
}
add_action('add_meta_boxes', 'sc_add_custom_meta_box', 1);
function product_key_data_callback( $post ) {
	?>
	
	<div class="flex-row">
		<div class="col col-6">
			<p><label for="price">Цена:</label></p>
			<p><input type="text" id="price" name="product_key_data_arr[price]" value="<?php echo get_post_meta( $post->ID, 'price', true ); ?>"></p>
			<p><label for="art">Артикул:</label></p>
			<p><input type="text" id="art" name="product_key_data_arr[art]" value="<?php echo get_post_meta( $post->ID, 'art', true ); ?>"></p>
		</div>
		<div class="col col-6">
			<p><label for="available">Наличие:</label></p>
			<p><input type="text" id="available" name="product_key_data_arr[available]" 
			value="<?php echo get_post_meta( $post->ID, 'available', true ); ?>"></p>
			<p><label for="packing">Фасовка, мин.:</label></p>
			<p><input type="text" id="packing" name="product_key_data_arr[packing]" value="<?php echo get_post_meta( $post->ID, 'packing', true ); ?>"></p>
		</div>
	</div>
	<div class="flex-row">
		<div class="col col-6">
			<p><label for="main-img">Ссылка на главное изображение:</label></p>
			<p><input type="text" id="main-img" name="product_key_data_arr[main_img]" value="<?php echo get_post_meta( $post->ID, 'main_img', true ); ?>"></p>
		</div>
		<div class="col col-6">
			<p><label for="gallery">NextGen Gallery шорткод для вывода галереи:</label></p>
			<p><input type="text" id="gallery" name="product_key_data_arr[gallery]" value="<?php echo get_post_meta( $post->ID, 'gallery', true ); ?>" placeholder="[nggallery id=1]"></p>
		</div>
	</div>
	<input type="hidden" name="product_key_data_nonce" value="<?php echo wp_create_nonce( 'product_key_data_nonce_key' ); ?>">

	<?php
}
add_action('save_post', 'sc_add_custom_meta_box_update', 0);
function sc_add_custom_meta_box_update( $post_id ) {
	if ( !isset($_POST['product_key_data_nonce']) || !wp_verify_nonce($_POST['product_key_data_nonce'], 'product_key_data_nonce_key' ) ) return false;
	if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE  ) return false;
	if ( !current_user_can('edit_post', $post_id) ) return false;
	if( !isset($_POST['product_key_data_arr']) ) return false; 
	// save / delete postdata;
	$_POST['product_key_data_arr'] = array_map('trim', $_POST['product_key_data_arr']);
	foreach( $_POST['product_key_data_arr'] as $key=>$value ) {
		if( empty($value) ){
			delete_post_meta($post_id, $key); // delete if the value is empty;
			continue;
		}
		update_post_meta($post_id, $key, $value);
	}
	return $post_id;
}

//

function svwp_sessions() {
	if ( ! session_id() ) {
		session_start();
	}
}
add_action( 'init', 'svwp_sessions' );

//

function simple_cat_scripts() {
	$url = plugin_dir_url( __FILE__ );
	
	wp_register_script( 'simple-cat-ajax', $url . 'simple-cat.js', array( 'jquery' ), '1.0', true );
	wp_localize_script( 'simple-cat-ajax', 'simple_cat_ajax', 
		array(
			'ajax_url' => admin_url( 'admin-ajax.php' ),
			'nonce' => wp_create_nonce( 'simple-cat-nonce' )
		)
	);
	wp_enqueue_script( 'simple-cat-ajax' );
}
add_action( 'wp_enqueue_scripts', 'simple_cat_scripts' );

// Interaction with DB;

global $sessionId;

function simple_cat_ajax() {
	global $wpdb;
	$nonce = $_REQUEST['nonce'];

	if ( ! wp_verify_nonce( $nonce, 'simple-cat-nonce' ) ) {
		wp_die();
	} else {
		$wpdb->show_errors(); // tmp;
		ini_set( 'session.use_strict_mode', 1 ); // must work!
		svwp_sessions();

		$sessionId = session_id();
		//$sessionId = (string) $sessionId;

		if ( $_REQUEST['actionType'] == 'adding' ) {
			//$customerRandomSequence = $sessionId;
			$productTitle = $_REQUEST['productTitle'];
			$productLink = $_REQUEST['productLink'];
			$productThumb = $_REQUEST['productThumb'];
			$productArticle = $_REQUEST['article'];
			$productBrand = $_REQUEST['brand'];
			$productAvailability = $_REQUEST['availability'];
			$productPacking = $_REQUEST['packing'];
			$productPrice = $_REQUEST['price'];
			$productAmount = $_REQUEST['amount'];

			$checkingArticle = $wpdb->get_results("SELECT product_article FROM svwp_cart WHERE customer_id = '".$sessionId."' AND product_article = '".$productArticle."'");

			if ( !$checkingArticle ) {
				$wpdb->insert(
					'svwp_cart',
					array(
						//'customer_id' => $customerRandomSequence,
						'customer_id' => $sessionId,
						'product_title' => $productTitle,
						'product_link' => $productLink,
						'product_thumb' => $productThumb,
						'product_article' => $productArticle,
						'product_brand' => $productBrand,
						'product_availability' => $productAvailability,
						'product_packing' => $productPacking,
						'product_price' => $productPrice,
						'product_amount' => $productAmount
					),
					array( '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%f', '%d' )
				);
			} else {
				//wp_die();
				header('HTTP/1.1 500 There is already exists a record with proposed values in DB');
			}
		} elseif ( $_REQUEST['actionType'] == 'delete' ) {
			$productArticle = $_REQUEST['article'];
			$customerId = $wpdb->get_results("SELECT customer_id FROM svwp_cart WHERE customer_id = '".$sessionId."'");
			
			if ( $customerId ) {
				$wpdb->delete( 'svwp_cart', array( 'product_article' => $productArticle ) );
			} else {
				wp_die();
			}
		} elseif ( $_REQUEST['actionType'] == 'deleteAll' ) {
			$articles = $_REQUEST['articles'];
			$articlesArr = explode(", ", $articles);

			$customerId = $wpdb->get_results("SELECT customer_id FROM svwp_cart WHERE customer_id = '".$sessionId."'");

			if ( $customerId ) {
				foreach ( $articlesArr as $articlesArrEl ) {
					$wpdb->delete( 'svwp_cart', array( 'product_article' => $articlesArrEl ) );
				}
			} else {
				wp_die();
			}
		} elseif ( $_REQUEST['actionType'] == 'sendPreorder' ) {
			if ( !empty( $_REQUEST['agreement'] ) ) {
				$headers  = "Content-Type: text/html; charset=utf-8\n";
				$headers .= "From: " . $_REQUEST['name'];
				$to = 'drkierkegor@gmail.com';
				$subject = 'Предзаказ на продукты';
				$productsStr = $_REQUEST['productsTableStr'];
				$total = $_REQUEST['total'];
				$name = $_REQUEST['name'];
				$phone = $_REQUEST['phone'];
				
				$productsArr = explode( ", ", $productsStr );
				
				$productsGroup;
				
				foreach ( $productsArr as $productsArrEl ) {
					$productsGroup = $productsGroup . "<br>" . $productsArrEl;
				}

				$msg = "<html><body>
							<p><strong>Имя:</strong> ".$name."</p>
							<p><strong>Телефон:</strong> ".$phone."</p>
							<p>Предзаказ на продукты</p>
							<div>".$productsGroup."</div>
						</body></html>";

				mail($to, $subject, $msg, $headers);
			} else {
				wp_die();
			}
		}

	}
}

if ( wp_doing_ajax() ) {
	add_action('wp_ajax_nopriv_sc_ajax', 'simple_cat_ajax' );
	add_action('wp_ajax_sc_ajax', 'simple_cat_ajax' );
}