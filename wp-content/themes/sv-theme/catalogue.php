<?php require_once 'templates/head.php'; ?>

<?php require_once 'templates/header.php'; ?>

<div class="container">
	<div class="row">
		<aside class="col-md-3">
			<?php require_once 'templates/sidebar.php'; ?>
		</aside>
		
		<main class="col-md-9">
			<div class="row">
				<div class="col-md-12">
					<ol class="breadcrumb">
					  <li><a href="/">Главная</a></li>
					  <li class="active"><a href="#">Каталог</a></li>
					</ol>
				</div>
			</div>

			<div class="row double-heading">
				<div class="col-md-12">
					<h3 class="uppercase">Каталог</h3>
					<h6 class="uppercase subheading">Товары по категориям</h6>
				</div>
			</div>
			
			<div class="row inner-catalogue inner-simple-product-items">
				<div class="col-sm-6 col-xs-12">
					<div class="product-item">
						<img src="http://placehold.it/100x100">
						<h5><a href="category.php">Одноразовые тапочки</a></h5>
					</div>
					
					<div class="product-item">
						<img src="http://placehold.it/100x100">
						<h5><a href="#">Расходные материалы <br> для салонов</a></h5>
					</div>
					
					<div class="product-item">
						<img src="http://placehold.it/100x100">
						<h5><a href="#">Товары для бани</a></h5>
					</div>
					
					<div class="product-item">
						<img src="http://placehold.it/100x100">
						<h5><a href="#">Дорожный набор</a></h5>
					</div>
				</div>
				<div class="col-sm-6 col-xs-12">
					<div class="product-item">
						<img src="http://placehold.it/100x100">
						<h5><a href="#">Косметика для гостиниц</a></h5>
					</div>
					
					<div class="product-item">
						<img src="http://placehold.it/100x100">
						<h5><a href="#">Текстиль</a></h5>
					</div>
					
					<div class="product-item">
						<img src="http://placehold.it/100x100">
						<h5><a href="#">Прозрачная косметичка</a></h5>
					</div>
				</div>
			</div>
		</main>
	</div>
</div>

<?php require_once 'templates/footer.php'; ?>