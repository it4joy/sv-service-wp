<?php
/*
Template Name: Sidebar
*/

// remove to standalone template file;
wp_nav_menu( array(
	'theme_location' => 'sidebar_menu',
	'menu' => 'sidebar_menu',
	'container' => 'nav',
	'container_class' => 'navbar-sidebar',
	'menu_id' => 'navbar-sidebar',
	'fallback_cb' => '__return_empty_string',
	'depth' => 0
) );

if ( is_active_sidebar( 'left-sidebar' ) ) {
	dynamic_sidebar( 'left-sidebar' );
}