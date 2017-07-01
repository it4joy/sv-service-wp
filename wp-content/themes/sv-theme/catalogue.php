<?php
/*
Template Name: Catalogue
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
			
			<div class="row inner-catalogue inner-simple-product-items">
				<div class="col-xs-12">
					<?php
						$args = array(
							'show_option_none' => 'Нет категорий',
							'show_count' => true,
							'hide_empty' => false,
							'taxonomy' => 'categories'
						);
						wp_list_categories( $args );
					?>
				</div>
			</div>
		</main>
	</div>
</div>

<?php get_footer(); ?>