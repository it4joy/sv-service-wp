<?php
/*
Template Name: Contacts
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
				</div>
			</div>

			<div class="row">
				<?php the_post(); ?>

				<div class="col-md-12">
					<?php the_content(); ?>
				</div>
			</div>

			<div class="row">
				<div class="col-md-12">
					<script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3Aa26b9913df12413cc49702c3cb625788a648cfca3d5a8f9c9ebe2c45f6414ebe&amp;width=100%&amp;height=500&amp;lang=ru_RU&amp;scroll=true"></script>
				</div>
			</div>
		</main>
	</div>
</div>

<?php get_footer(); ?>