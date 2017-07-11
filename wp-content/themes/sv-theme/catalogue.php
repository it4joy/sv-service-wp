<?php
/*
Template Name: Catalogue
*/

get_header(); ?>

<div class="container">
	<div class="row">
		<aside class="col-md-3">
			<?php get_sidebar(); ?>
		</aside>

		<main class="col-md-9">
			<div class="row">
				<div class="col-md-12">
					<div class="breadcrumbs-wrapper">
						<?php if ( function_exists('kama_breadcrumbs') ) kama_breadcrumbs(); ?>
					</div>
				</div>
			</div>
			
			<div class="row">
				<div class="col-md-12">
					<h3 class="uppercase"><?php the_title(); ?></h3>
				</div>
			</div>
			
			<div class="row inner-catalogue inner-simple-product-items">
				<?php
					$args = array(
						'taxonomy' => 'categories',
						'orderby' => 'name',
						'hide_empty' => false,
						'parent' => 0
					);
					
					$terms = get_terms( $args );
					
					if ( !empty( $terms ) && !is_wp_error( $terms ) ) {
						foreach ( $terms as $term ) {
				?>
			
				<div class="col-xs-6">
					<div class="product-item">
						<img src="http://placehold.it/100x100">
						<h5><a href="<?php echo get_term_link( $term ); ?>"><?php echo $term->name; ?></a></h5>
					</div>
				</div>

				<?php
						}
					}
				?>
			</div>
			
			<div class="row">
				<div class="col-md-12">
					<h5 class="uppercase">Популярные товары</h5>
				</div>
			</div>
			<div class="row inner-simple-product-items">
				<?php
					$args = array(
						'numberposts' => 10,
						'post_type' => 'product'
					);

					$popProducts = new WP_Query( $args );

					if ( $popProducts->have_posts() ) {
						while( $popProducts->have_posts() ) {
							$popProducts->the_post();
							if ( has_term( 'popular', 'tags' ) ) {
				?>
				
				<div class="col-xs-6">
					<div class="product-item">
						<?php echo get_the_post_thumbnail( $post->ID, 'thumb-sq70' ); ?>
						<p><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
					</div>
				</div>
				<?php
							}
						}
					}
				?>
			</div>
		</main>
	</div>
</div>

<?php get_footer(); ?>