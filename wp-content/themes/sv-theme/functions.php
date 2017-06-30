<?php
/**
 * sv-theme's functions and definitions
 * For more information on hooks, actions, and filters,
 * {@link https://codex.wordpress.org/Plugin_API}
 *
 * @package WordPress
 * @subpackage sv_theme
 * @since sv-theme 1.0
 */

function svwp_setup() {
    add_theme_support( 'title-tag' );

	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
		'gallery',
		'audio',
	) );
	
	add_theme_support( 'post-thumbnails', array( 'post', 'movie', 'big-slide', 'product' ) );
	set_post_thumbnail_size(200, 200, true); // adjust;
	
	add_theme_support( 'widgets' );
	
	register_nav_menus( array(
		'top_menu' => 'Верхнее меню',
		'sidebar_menu' => 'Боковое меню',
		'footer_menu_left' => 'Нижнее меню левое',
		'footer_menu_center' => 'Нижнее меню центральное',
		'footer_menu_right' => 'Нижнее меню правое'
	) );
}
add_action( 'after_setup_theme', 'svwp_setup' );

define( "THEME_DIR", get_template_directory_uri() );

// remove generator meta tag;

remove_action('wp_head', 'wp_generator');

// enqueue styles;

function svwp_enqueue_styles() {
	wp_register_style( 'main-styles', THEME_DIR . '/style.css', '1', 'screen' );
	wp_enqueue_style( 'main-styles' );

	wp_register_style( 'bootstrap-styles', THEME_DIR . '/assets/bootstrap/css/bootstrap.css', 'all' );
    wp_enqueue_style( 'bootstrap-styles' );
	
	wp_register_style( 'magnific-popup-styles', THEME_DIR . '/assets/css/magnific-popup.css', 'screen' );
    wp_enqueue_style( 'magnific-popup-styles' );
	
	wp_register_style( 'jquery-ui', '//ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css', '1.12.1', 'all' );
    wp_enqueue_style( 'jquery-ui' );
}
add_action( 'wp_enqueue_scripts', 'svwp_enqueue_styles' );

function svwp_enqueue_admin_styles() {
	wp_register_style( 'admin-styles', THEME_DIR . '/assets/css/admin.css', '1', 'screen' );
	wp_enqueue_style( 'admin-styles' );
}
add_action( 'admin_enqueue_scripts', 'svwp_enqueue_admin_styles' );

// enqueue scripts;

function svwp_enqueue_scripts() {
	/* wp_deregister_script( 'jquery' );
	wp_register_script( 'jquery', '//ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js', true );
	wp_enqueue_script( 'jquery' ); */
	
	wp_register_script( 'jquery-ui', '//ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js', '1.12.1', true );
	wp_enqueue_script( 'jquery-ui' );

    wp_register_script( 'html5shiv', '//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js', array( 'jquery' ), '3.7.3', false );
    wp_enqueue_script( 'html5shiv' );
	wp_script_add_data('html5shiv', 'conditional', 'lt IE 9');

    wp_register_script( 'css3-support', '//cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js', array( 'jquery' ), '1.4.2', false );
    wp_enqueue_script( 'css3-support' );
	wp_script_add_data('css3-support', 'conditional', 'lt IE 9');

	wp_register_script( 'bootstrap-js', THEME_DIR . '/assets/bootstrap/js/bootstrap.min.js', array( 'jquery' ), '3.3.7', true );
	wp_enqueue_script( 'bootstrap-js' );
	
	wp_register_script( 'font-awesome', '//use.fontawesome.com/3183b6899f.js', true );
	wp_enqueue_script( 'font-awesome' );
	
	wp_register_script( 'magnific-popup', '//cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js', true );
	wp_enqueue_script( 'magnific-popup' );
	
	// Yandex Share;
	wp_register_script( 'es5-shims', '//yastatic.net/es5-shims/0.0.2/es5-shims.min.js', true );
	wp_enqueue_script( 'es5-shims' );
	
	wp_register_script( 'ya-share', '//yastatic.net/share2/share.js', true );
	wp_enqueue_script( 'ya-share' );

	// custom;
	wp_register_script( 'custom', THEME_DIR . '/assets/js/custom.js', array( 'jquery' ), '1', true );
	wp_enqueue_script( 'custom' );
}
add_action( 'wp_enqueue_scripts', 'svwp_enqueue_scripts' );

// admin panel footer text;

function footer_admin_func () {
	echo 'It was developed by: <a href="http://sensitivegraphics.com/" target="_blank">Sensitive Graphics</a>. Runs on <a href="http://wordpress.org" target="_blank">WordPress</a>.';
}
add_filter('admin_footer_text', 'footer_admin_func');

// remove 'p' wrapping for imgs;

function remove_img_ptags_func( $content ){
	return preg_replace('/<p>\s*((?:<a[^>]+>)?\s*<img[^>]+>\s*(?:<\/a>)?)\s*<\/p>/i', '\1', $content );
}
add_filter('the_content', 'remove_img_ptags_func');

// closing a possibility to publish via xmlrpc.php;

add_filter('xmlrpc_enabled', '__return_false');

// wp-bootstrap-navwalker;

require_once('wp-bootstrap-navwalker.php');

// custom post type;

function register_post_types() {
	register_post_type( 'big-slide', array(
		'labels' => array(
			'name' => 'Слайды на Главной',
			'singular_name' => 'Слайд на Главной',
			'add_new' => 'Добавить новый',
			'add_new_item' => 'Добавить новый слайд',
			'edit_item' => 'Редактировать слайд',
			'new_item' => 'Новый слайд',
			'view_item' => 'Посмотреть слайд',
			'name_admin_bar' => 'Слайды на Главной',
			'search_items' => 'Искать',
			'not_found' => 'Не найдено',
			'not_found_in_trash' => 'Не найдено в корзине'
		),
		'description' => 'Создание и редактирование слайдов на Главной',
		'public' => true,
		'show_in_menu' => true,
		'menu_position' => 3,
		'supports' => array( 'title', 'editor', 'custom-fields' ),
		'taxonomies' => array( 'big-slide-tax' )
	) );
}
add_action( 'init', 'register_post_types' );

// taxonomies;

function create_taxonomy() {
	register_taxonomy( 'big-slide-tax', 'big-slide', array(
		'labels' => array(
			'name' => 'Свойства слайдера',
			'singular_name' => 'Свойство',
			'edit_item' => 'Редактировать свойство',
			'update_item' => 'Обновить свойство',
			'add_new_item' => 'Добавить новое свойство',
			'new_item_name' => 'Имя нового свойства', // ?
		),
		'description' => 'Свойства слайдера',
		'public' => true,
		'show_admin_column' => true
	) );
}
add_action( 'init', 'create_taxonomy' );

//

//function test() {
	//add_post_type_support( 'product', 'custom-fields' );
//}
//add_action( 'init', 'test' );

// sidebar - widgets panel;

function register_widgets() {
	register_sidebar( array(
		'name' => 'Левая боковая панель',
		'id' => 'left-sidebar',
		'description' => 'Выводится на внутренних страницах сайта',
		'class' => 'left-widgets-panel',
		'before_widget' => '<div class="left-widgets-panel-item">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>\n'
	) );
}
add_action( 'widgets_init', 'register_widgets' );