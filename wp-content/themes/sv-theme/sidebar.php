<?php
/*
Template Name: Sidebar
*/
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

$args = array(
	'numberposts' => 2,
	'post_type' => 'product'
);

$popProducts = new WP_Query( $args );

if ( $popProducts->have_posts() ) {
	while( $popProducts->have_posts() ) {
		$popProducts->the_post();
		if ( has_term( 'popular', 'tags' ) ) {
?>

	<div class="product-item">
		<?php echo get_the_post_thumbnail( $post->ID, array( 70, 70 ) ); ?>
		<p><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
	</div>

<?php
		}
	}
}
wp_reset_postdata();
?>

</div>

<?php
if ( is_active_sidebar( 'left-sidebar' ) ) {
	dynamic_sidebar( 'left-sidebar' );
}