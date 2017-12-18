<?php get_header(); ?>

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
					<?php $cat = single_cat_title( '', false ); ?>
					<h3 class="uppercase"><?php echo $cat; ?></h3>
					<!--<p>it's TAXONOMY</p>-->
                    <p>it's TAXONOMY</p>
				</div>
			</div>

			<div class="row inner-catalogue inner-ext-product-items">
				<div class="col-xs-12">
					<?php
						global $post;

						$postArgs = array(
							'numberposts' => -1,
							'post_type' => 'product'
						);

						$posts = get_posts( $postArgs );

						foreach ( $posts as $post ) {
							$thumb = get_the_post_thumbnail_url();
							$brands = get_the_terms( $post->ID, 'brands' );
							$brand = array_shift( $brands );
							$categories = get_the_terms( $post->ID, 'categories' );
							$tags = get_the_terms( $post->ID, 'tags' );

							//$category = array_shift( $categories );
							foreach ($categories as $categoriesEl) {
								$currentCat = $categoriesEl->name;
								if ( $currentCat == $cat ) {
					?>

					<div class="product-item detailed">
						<?php
							if ( is_array($tags) && ! is_wp_error($tags) ) {
								$tag = array_shift($tags);
								$tagName = $tag->name;
								if ( $tagName == "new" ) {
						?>

							<div class="novelty-tag">новинка</div>

						<?php
								}
							}
						?>

						<div class="flex-row">
							<div class="col-sm-2 col-xs-3">
								<img src="<?php echo $thumb; ?>" alt="">
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
			</div>
		</main>
	</div>
</div>

<?php get_footer(); ?>