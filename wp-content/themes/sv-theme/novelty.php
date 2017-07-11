<?php
/*
Template Name: Novelty
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

			<div class="row inner-simple-product-items">
				<?php
					$args = array(
						'numberposts' => -1,
						'post_type' => 'product'
					);

					$novelties = new WP_Query( $args );

					if ( $novelties->have_posts() ) {
						while( $novelties->have_posts() ) {
							$novelties->the_post();
							if ( has_term( 'new', 'tags' ) ) {
				?>
				
				<div class="col-xs-6">
					<div class="product-item">
						<?php echo get_the_post_thumbnail(); ?>
						<h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
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