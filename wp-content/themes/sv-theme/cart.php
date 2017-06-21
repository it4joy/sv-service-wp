<?php require_once 'templates/head.php'; ?>

<?php require_once 'templates/header.php'; ?>

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<ol class="breadcrumb">
			  <li><a href="/">Главная</a></li>
			  <li><a href="#">Корзина</a></li>
			</ol>
		</div>
	</div>
	<div class="row cart-product-list inner-catalogue inner-ext-product-items">
		<div class="col-md-9">
			<div class="product-item">
				<div class="row">
					<div class="col-md-2">
						<div class="div-as-table">
							<div class="div-as-table-cell">
								<img src="http://placehold.it/100x100">
							</div>
						</div>
					</div>
					
					<div class="col-md-7">
						<div class="div-as-table">
							<div class="div-as-table-cell">
								<h6><a href="#">Одноразовые велюровые тапочки Бизнес 5,5 мм</a></h6>
								<div class="row">
									<div class="col-md-6">
										<ul class="default text-left">
											<!-- <li>Цена: 80,52 руб.</li> -->
											<li>Артикул: 09285</li>
											<li>Бренд: Компания Х</li>
										</ul>
									</div>
									<div class="col-md-6">
										<ul class="default text-left">
											<li>Наличие: есть</li>
											<li>Фасовка, мин.: коробка, 100 пар</li>
										</ul>
									</div>
								</div>
								<p><a href="#">Подробнее</a> <i class="fa fa-angle-right"></i></p>
							</div>
						</div>
					</div>
					
					<div class="col-md-3">
						<div class="div-as-table">
							<div class="div-as-table-row">
								<div class="div-as-table-cell">
									<p class="price"><strong>Цена: </strong>80,52 руб.</p>
								</div>
							</div>
							<div class="div-as-table-row">
								<div class="div-as-table-cell">
									<div class="input-group">
										<span class="input-group-addon">Кол-во:</span>
										<input type="number" name="amount" value="100" class="form-control">
									</div>
								</div>
							</div>
							<div class="div-as-table-row">
								<div class="div-as-table-cell">
									<button type="button" class="btn btn-default"><i class="fa fa-close"></i></button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="col-md-3">
			<div class="cart-common-data">
				<p><strong>Итого: </strong> ...</p>
				<button type="button" class="unfold-btn btn btn-default">Загрузить документы</button>
				<div class="upload-form hidden-block">
					<p>Допустимые форматы: изображения, .pdf, .doc</p>
					<form enctype="multipart/form-data" method="post">
						<input type="file" name="upload-doc" multiple accept="image/*,application/pdf,application/msword">
						<button type="reset" class="btn btn-default">Очистить</button>
						<button type="submit" class="btn btn-default">Загрузить</button>
					</form>
				</div>
				<a href="#preorder-form" class="btn-order btn btn-primary" data-toggle="modal">Оформить предзаказ</a>
				<p><a href="#" class="link-cart-clear">Очистить корзину</a></p>
			</div>
		</div>
	</div>
</div>

<?php require_once 'templates/footer.php'; ?>