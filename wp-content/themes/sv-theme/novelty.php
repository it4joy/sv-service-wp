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
								$thumb = get_the_post_thumbnail_url();
								$brands = get_the_terms( $post->ID, 'brands' );
								$categories = get_the_terms( $post->ID, 'categories' );
								$brand = array_shift( $brands );
								$category = array_shift( $categories );
				?>

				<div class="product-item detailed">
					<div class="flex-row">
						<div class="col-sm-2 col-xs-3">
							<img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="">
						</div>
						
						<div class="col-sm-7 col-xs-9 product-key-data">
							<h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
							<div class="flex-row align-items-bottom">
								<div class="col-xs-8 no-padding">
									<ul class="default text-left">
										<li class="article">Артикул: <span><?php echo get_post_meta( $post->ID, 'art', true ); ?></span></li>
										<li class="brand">Бренд: <span><?php echo $brand->name; ?></span></li>
										<li class="availability">Наличие: <span><?php echo get_post_meta( $post->ID, 'available', true ); ?></span></li>
										<li class="packing">Фасовка, мин.: <span><?php echo get_post_meta( $post->ID, 'packing', true ); ?></span></li>
									</ul>
									<input type="hidden" name="product-title" value="<?php the_title(); ?>" class="product-title">
									<input type="hidden" name="product-thumb" value="<?php echo $thumb; ?>" class="product-thumb">
									<input type="hidden" name="product-link" value="<?php the_permalink(); ?>" class="product-link">
								</div>
								<div class="col-xs-4">
									<p><a href="<?php the_permalink(); ?>">Подробнее</a> <i class="fa fa-angle-right"></i></p>
								</div>
							</div>
						</div>
						
						<div class="col-sm-3 col-xs-8">
							<p class="price">Цена: <span><?php echo get_post_meta( $post->ID, 'price', true ); ?></span> руб.</p>
							<div class="input-group">
								<span class="input-group-addon">Кол-во:</span>
								<input type="number" name="amount" value="1" class="form-control products-amount">
							</div>
							<button type="button" class="btn btn-default btn-cart">В корзину</button>
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