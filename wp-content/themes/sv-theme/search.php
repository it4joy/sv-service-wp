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

			<div class="row double-heading">
				<div class="col-md-12">
					<h3 class="uppercase">Результаты поиска</h3>
				</div>
			</div>

			<div class="row search-results-wrapper">
				<div class="col-md-12">
					<p><strong>Результаты поиска по запросу:</strong> <?php the_search_query(); ?></p>
					<?php
						if ( have_posts() ) {
							while ( have_posts() ) {
								the_post();
					?>
					
					<div class="search-results-item">
						<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
					</div>
					
					<?php svwp_pagination(); ?>
					
					<?php
							}
						} else {
							echo "К сожалению, нет результатов, соответствующих Вашему поисковому запросу. Попробуйте снова.";
							get_search_form();
						}
					?>
				</div>
			</div>
		</main>
	</div>
</div>

<?php get_footer(); ?>