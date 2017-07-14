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

			<div class="row inner-catalogue inner-ext-product-items">
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
								$brands = get_the_terms( $post->ID, 'brands' );
								$categories = get_the_terms( $post->ID, 'categories' );
								$brand = array_shift( $brands );
								$category = array_shift( $categories );
				?>
				
				<div class="product-item">
					<div class="flex-row">
						<div class="col-sm-2 col-xs-3">
							<img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="">
						</div>
						
						<div class="col-sm-7 col-xs-9 product-key-data">
							<h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
							<div class="flex-row align-items-bottom">
								<div class="col-xs-8 no-padding">
									<ul class="default text-left">
										<li>Артикул: <?php echo get_post_meta( $post->ID, 'art', true ); ?></li>
										<li>Бренд: <?php echo $brand->name; ?></li>
										<li>Наличие: <?php echo get_post_meta( $post->ID, 'available', true ); ?></li>
										<li>Фасовка, мин.: <?php echo get_post_meta( $post->ID, 'packing', true ); ?></li>
									</ul>
								</div>
								<div class="col-xs-4">
									<p><a href="<?php the_permalink(); ?>">Подробнее</a> <i class="fa fa-angle-right"></i></p>
								</div>
							</div>
						</div>
						
						<div class="col-sm-3 col-xs-8">
							<p class="price"><?php echo get_post_meta( $post->ID, 'price', true ); ?></p>
							<div class="input-group">
								<span class="input-group-addon">Кол-во:</span>
								<input type="number" name="amount" class="form-control">
							</div>
							<button type="button" class="btn btn-default">В корзину</button>
						</div>
					</div>
				</div>
				<!-- /.product-item -->
				
				<?php
							}
						}
					}
					wp_reset_postdata();
				?>
			</div>
		</main>
	</div>
</div>

<?php get_footer(); ?>