<?php 
/*
Template Name: product
Template Post Type: product
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

			<div class="row double-heading">
				<div class="col-md-12">
					<h3 class="uppercase"><?php the_title(); ?></h3>
					<!--<h6 class="uppercase subheading">Одноразовые флисовые тапочки 4 мм</h6>-->
				</div>
			</div>
			
			<div class="row inner-catalogue inner-ext-product-item">
				<?php
					if ( have_posts() ) {
						while( have_posts() ) {
							the_post();
							$brands = get_the_terms( $post->ID, 'brands' );
							$categories = get_the_terms( $post->ID, 'categories' );
							$relations = get_the_terms( $post->ID, 'relations' );
							$brand = array_shift( $brands );
							$category = array_shift( $categories );
							$thumb = get_the_post_thumbnail_url();
				?>
				
				<div class="col-md-12">
					<div class="flex-row align-items-top">
						<div class="col-xs-4">
							<a href="<?php echo get_post_meta( $post->ID, 'main_img', true ); ?>" class="img-modal">
								<img src="<?php echo get_post_meta( $post->ID, 'main_img', true ); ?>" class="img-responsive">
							</a>
						</div>
						
						<div class="col-xs-8">
							<div class="flex-row product-main align-items-top">
								<div class="col-xs-6">
									<ul>
										<li class="price">Цена: <?php $price = get_post_meta( $post->ID, 'price', true ); echo $price; ?></li>
										<li class="article">Артикул: <?php $article = get_post_meta( $post->ID, 'art', true ); echo $article; ?></li>
										<li class="brand">Бренд: <?php $brandName = $brand->name; echo $brandName; ?></li>
										<li class="availability">Наличие: <?php $availability = get_post_meta( $post->ID, 'available', true ); echo $availability; ?></li>
										<li class="packing">Фасовка, мин.: <?php $packing = get_post_meta( $post->ID, 'packing', true ); echo $packing; ?></li>
									</ul>
									<input type="hidden" name="product-title" value="<?php the_title(); ?>" class="product-title">
									<input type="hidden" name="product-thumb" value="<?php $thumb; ?>" class="product-thumb">
									<input type="hidden" name="product-link" value="<?php the_permalink(); ?>" class="product-link">
								</div>
								<div class="col-xs-6">
									<div class="input-group">
										<span class="input-group-addon">Кол-во:</span>
										<input type="number" name="amount" class="form-control products-amount">
									</div>
									<button type="button" class="btn btn-default btn-cart">В корзину</button>
									<div class="ask-question">
										<p><i class="fa fa-question-circle"></i> 
										<a href="#product-ask-question-form" class="ask-question-link" data-toggle="modal" 
										data-art="<?php echo $article; ?>" 
										data-title="<?php the_title(); ?>">Задайте вопрос по товару</a>
										</p>
									</div>
								</div>
							</div>
							
							<div class="flex-row gallery-wrapper">
								<div class="col-xs-12">
									<?php
										$nggallery = get_post_meta( $post->ID, 'gallery', true );
										echo do_shortcode( $nggallery );
									?>
								</div>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-xs-12">
							<?php the_content(); ?>
						</div>
					</div>
					
					<div class="divider default"></div>
					
					<div class="row">
						<div class="col-xs-6">
							<p class="one-line-p"><a href="#">Посмотреть / скачать инструкцию</a> <i class="fa fa-angle-right"></i></p>
						</div>
						<div class="col-xs-6">
							<p class="one-line-p"><a href="#">Посмотреть всю продукцию под брендом Компания Х</a> <i class="fa fa-angle-right"></i></p>
						</div>
					</div>

					<div class="divider default"></div>

					<div class="row">
						<div class="col-xs-12">
							<h3 class="uppercase">Категория: <?php echo $category->name; ?></h3>
							<p><i class="fa fa-truck"></i> Бесплатная доставка по городу и до транспортной компании - от 2000 руб.</p>
							<p><i class="fa fa-shopping-cart"></i> Отпуск товара в розницу возможен при самовывозе со склада от 1 упаковки</p>
						</div>
					</div>

					<div class="row">
						<div class="col-xs-12">
							<h6>С этим продуктом часто заказывают</h6>
						</div>
					</div>
					<div class="row related-products">
						<?php
							foreach ( $relations as $relation ) {
						?>

						<div class="col-sm-6 col-xs-12">
							<div class="product-item">
								<p> <?php echo $relation->name; ?> </p>
							</div>
						</div>

						<?php
							}
						?>
					</div>
				</div>
				
				<?php
						}
					}
				?>
			</div>
		</main>
	</div>
</div>

<?php get_footer(); ?>