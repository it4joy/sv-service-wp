<?php
/*
Template Name: Cart
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

			<div class="row cart-product-list inner-catalogue inner-ext-product-items">
				<div class="col-md-10">
					<?php
						$sessionId = session_id();
						$sessionId = (string) $sessionId;
                        
                        // an unique session ID
						//echo $sessionId;

						$customerId = $wpdb->get_results("SELECT customer_id FROM svwp_cart WHERE customer_id = '".$sessionId."'");

						if ( $customerId ) {
							$selectedProducts = $wpdb->get_results("SELECT * FROM svwp_cart WHERE customer_id = '".$sessionId."'");

							foreach ( $selectedProducts as $selectedProduct ) {
					?>
					<div class="product-item detailed">
						<div class="flex-row">
							<div class="col-md-3">
								<div class="div-as-table">
									<div class="div-as-table-cell">
										<img src="<?php echo $selectedProduct->product_thumb; ?>">
									</div>
								</div>
							</div>
							
							<div class="col-md-6">
								<div class="flex-row">
									<div class="col-md-12">
										<h6 class="text-left">
											<a href="<?php echo $selectedProduct->product_link; ?>"><?php echo $selectedProduct->product_title; ?></a>
										</h6>
									</div>
								</div>
								<div class="flex-row">
									<div class="col-md-6">
										<ul class="default text-left">
											<li class="article">Артикул: <span><?php echo $selectedProduct->product_article; ?></span></li>
											<li class="brand">Бренд: <span><?php echo $selectedProduct->product_brand; ?></span></li>
										</ul>
									</div>
									<div class="col-md-6">
										<ul class="default text-left">
											<li class="availability">Наличие: <span><?php echo $selectedProduct->product_availability; ?></span></li>
											<li class="packing">Фасовка, мин.: <span><?php echo $selectedProduct->product_packing; ?></span></li>
										</ul>
									</div>
								</div>
							</div>
							
							<div class="col-md-3">
								<div class="flex-row">
									<p class="price"><strong>Цена: <span><?php echo $selectedProduct->product_price; ?></span> руб.</strong></p>
									<div class="input-group">
										<span class="input-group-addon">Кол-во:</span>
										<input type="number" name="amount" value="<?php echo $selectedProduct->product_amount; ?>" class="form-control cart-products-amount">
									</div>
									<button type="button" class="btn btn-default btn-delete" data-toggle="tooltip" data-placement="top" title="Удалить"><i class="fa fa-trash"></i></button>
								</div>
							</div>
						</div>
					</div>
					<?php
							}
						} else {
					?>
					
					<p class="msg-empty-cart">Корзина пуста. Добавьте товары в Вашу корзину :)</p>
                    <p><a href="/katalog/">Перейти в каталог</a></p>

					<?php
						}
					?>
				</div>

				<div class="col-md-2">
					<div class="cart-common-data">
						<p class="total"><strong>Итого: </strong><span>0</span> руб.</p>
						<a href="#preorder-form" class="btn btn-primary btn-preorder" data-toggle="modal">Оформить предзаказ</a>
						<a href="#" class="btn btn-default link-cart-clear">Очистить корзину</a>
					</div>
				</div>
			</div>
		</main>
	</div>
</div>

<?php get_footer(); ?>