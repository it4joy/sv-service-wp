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
					$argsTerm = array(
						'taxonomy' => 'categories',
						'orderby' => 'name',
						'hide_empty' => false,
						'parent' => 0
					);
					
					$terms = get_terms( $argsTerm );
					
					//
					
					$argsPost = array(
						'numberposts' => -1,
						'post_type' => 'product'
					);
					
					$products = new WP_Query( $argsPost );
					
					if ( $products->have_posts() ) {
						while ( $products->have_posts() ) {
							$products->the_post();
							$categories = get_the_terms( $post->ID, 'categories' );
							$category = array_shift( $categories );
							$categoryName = $category->name;
							if ( has_term( 'face', 'tags' ) ) {
								$faceImg = get_post_meta( $post->ID, 'main_img', true );
								foreach ( $terms as $term ) {
									$termName = $term->name;
									if ( $termName == $categoryName ) {
				?>
			
				<div class="col-xs-6">
					<div class="product-item">
						<img src="<?php echo $faceImg; ?>" width="100" height="100">
						<h5><a href="<?php echo get_term_link( $term ); ?>"><?php echo $termName; ?></a></h5>
					</div>
				</div>

				<?php
									}
								}
							}
						}
					}
					wp_reset_postdata();
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
					} else {
						echo "Записи для вывода не найдены";
					}
					wp_reset_postdata();
				?>
			</div>
		</main>
	</div>
</div>

<?php get_footer(); ?>