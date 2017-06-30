<?php 
/*
Template Name: product
Template Post Type: product
*/

get_header(); ?>

<div class="container">
	<div class="row">
		<aside class="col-md-3">
			<?php
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
					<h6 class="uppercase subheading">Одноразовые флисовые тапочки 4 мм</h6>
				</div>
			</div>
			
			<div class="row inner-catalogue inner-ext-product-item">
			<?php
				global $post;
			
				$args = array(
					'numberposts' => 0,
					'post_type' => 'product'
				);

				$posts = get_posts( $args );

				foreach ( $posts as $post ) {
					setup_postdata($post);
					$brands = get_the_terms( $post->ID, 'brands' );
					$categories = get_the_terms( $post->ID, 'categories' );
					$relations = get_the_terms( $post->ID, 'relations' );
					$brand = array_shift( $brands );
					$category = array_shift( $categories );
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
										<li>Цена: <?php echo get_post_meta( $post->ID, 'price', true ); ?></li>
										<li>Артикул: <?php echo get_post_meta( $post->ID, 'art', true ); ?></li>
										<li>Бренд: <?php echo $brand->name; ?></li>
										<li>Наличие: <?php echo get_post_meta( $post->ID, 'available', true ); ?></li>
										<li>Фасовка, мин.: <?php echo get_post_meta( $post->ID, 'packing', true ); ?></li>
									</ul>
								</div>
								<div class="col-xs-6">
									<div class="input-group">
										<span class="input-group-addon">Кол-во:</span>
										<input type="number" name="amount" class="form-control">
									</div>
									<button type="button" class="btn btn-default">В корзину</button>
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

				wp_reset_postdata();
				?>
			</div>
		</main>
	</div>
</div>

<?php get_footer(); ?>