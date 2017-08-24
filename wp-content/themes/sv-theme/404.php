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
					<h3>Ошибка 404. Страницы не существует</h3>
					<p><a href="/">На Главную</a></p>
				</div>
			</div>
		</main>
	</div>
</div>

<?php get_footer(); ?>