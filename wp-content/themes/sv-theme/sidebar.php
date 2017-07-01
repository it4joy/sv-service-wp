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

?>

<div class="aside-top-sales inner-simple-product-items">
	<h3 class="text-center uppercase">Популярные товары</h3>

<?php

global $post;

$args = array(
	'numberposts' => 2,
	'post_type' => 'product'
);

$popProducts = get_posts( $args );

foreach ( $popProducts as $popProduct ) {
	if ( has_term( 'popular', 'tags' ) ) {
		setup_postdata( $post );
?>

	<div class="product-item">
		<?php echo get_the_post_thumbnail( array( 70, 70 ) ); ?>
		<p><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
	</div>

<?php
	}
}
wp_reset_postdata();
?>

</div>

<?php

if ( is_active_sidebar( 'left-sidebar' ) ) {
	dynamic_sidebar( 'left-sidebar' );
}