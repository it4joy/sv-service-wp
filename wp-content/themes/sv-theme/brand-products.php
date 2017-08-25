<?php

/*
Template Name: Products of brand
*/

get_header();

global $selectedBrand;

if ( isset( $_COOKIE['requestedBrand'] ) ) {
	$selectedBrand = $_COOKIE['requestedBrand'];
}

?>

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
					<h3 class="uppercase"><?php the_title(); echo ' ' . $selectedBrand; ?></h3>
				</div>
			</div>

			<div class="row inner-catalogue inner-ext-product-items">
				<?php
					$args = array(
						'numberposts' => -1,
						'post_type' => 'product'
					);

					$brandItems = new WP_Query( $args );

					if ( $brandItems->have_posts() && isset( $_COOKIE['requestedBrand'] ) ) {
						while( $brandItems->have_posts() ) {
							$brandItems->the_post();

							$brands = get_the_terms( $post->ID, 'brands' );
							$brand = array_shift( $brands );
							$brandName = $brand->name;

							if ( $brandName == $selectedBrand ) {
								$thumb = get_the_post_thumbnail_url();
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
										<li class="brand">Бренд: <span><?php echo $brandName; ?></span></li>
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
					} else {
						echo 'Не выбран бренд для вывода продуктов. Перейдите на страницу какого-либо продукта.';
					}
					wp_reset_postdata();
				?>
			</div>
		</main>
	</div>
</div>

<?php get_footer(); ?>