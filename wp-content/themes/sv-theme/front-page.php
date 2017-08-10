<?php
/*
Template Name: Front Page
*/
get_header(); ?>

			<div class="container">
				<div id="carousel-index-top" class="carousel slide index" data-ride="carousel">
					<!-- Indicators -->
					<ol class="carousel-indicators">
						<li data-target="#carousel-index-top" data-slide-to="0" class="active"></li>
						<li data-target="#carousel-index-top" data-slide-to="1"></li>
						<li data-target="#carousel-index-top" data-slide-to="2"></li>
					</ol>

					<!-- Wrapper for slides -->
					<div class="carousel-inner" role="listbox">
						<?php
							global $post;
							
							$args = array(
								'numberposts' => -1,
								'post_type' => 'big-slide',
								'order' => 'ASC'
							);
							
							$slides = get_posts( $args );

							foreach ( $slides as $post ) {
								setup_postdata( $post );

								$terms = get_the_terms( $post->ID, 'big-slide-tax' );
								
								$imgSrc;
								$link;

								foreach ( $terms as $term ) {
									$termName = $term->name;

									if ( strpos( $termName, 'img-src' ) !== false ) {
										$imgSrc = $term->description;
									} elseif ( strpos( $termName, 'link' ) !== false ) {
										$link = $term->description;
									} else {
										$link = home_url('/'); // do it;
									}
								}
								?>

								<div class="item">
									<img src="<?php echo $imgSrc; ?>" alt="SV Service - производство и комплексное оснащение расходными материалами  индустрии в сфере оказания услуг. Современно. Комфортно. Гигиенично.">
									<div class="carousel-caption">
										<h2><?php the_title(); ?></h2>
										<a class="btn btn-default btn-lg" href="<?php echo $link; ?>" role="button">Узнать больше</a>
									</div>
								</div>
						
								<?php
							}
							wp_reset_postdata();
						?>
					</div>

					<!-- Controls -->
					<a class="slide-btn prev" href="#carousel-index-top" role="button" data-slide="prev">
						<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"><i class="fa fa-chevron-left"></i></span>
						<span class="sr-only">Назад</span>
					</a>
					<a class="slide-btn next" href="#carousel-index-top" role="button" data-slide="next">
						<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"><i class="fa fa-chevron-right"></i></span>
						<span class="sr-only">Вперед</span>
					</a>
				</div>
			</div>

			<div class="container">
				<div class="row double-heading">
					<div class="col-md-12">
						<h3 class="text-center uppercase">Каталог</h3>
						<h6 class="text-center uppercase subheading">Товары по категориям</h6>
					</div>
				</div>

				<div class="row inner-catalogue inner-simple-product-items">
					<?php
						$args = array(
							'taxonomy' => 'categories',
							'orderby' => 'name',
							'hide_empty' => false,
							'parent' => 0
						);

						$terms = get_terms( $args );

						if ( !empty( $terms ) && !is_wp_error( $terms ) ) {
							foreach ( $terms as $term ) {
								$termImgSrc = $term->description;
								$termName = $term->name;
								if ( $termImgSrc ) {
					?>

					<div class="col-xs-6">
						<div class="product-item">
							<img src="<?php echo $termImgSrc; ?>" width="100" height="100">
							<h5><a href="<?php echo get_term_link( $term ); ?>"><?php echo $termName; ?></a></h5>
						</div>
					</div>

					<?php
								} else {
					?>

					<div class="col-xs-6">
						<div class="product-item">
							<img src="http://placehold.it/100x100">
							<h5><a href="<?php echo get_term_link( $term ); ?>"><?php echo $termName; ?></a></h5>
						</div>
					</div>

					<?php
								}
							}
						}
					?>
				</div>

				<div class="row">
					<div class="col-md-12">
						<div class="block-shim text-center">
							<a class="btn btn-default btn-lg" href="katalog" role="button">Перейти в каталог</a>
						</div>
					</div>
				</div>
				
				<div class="divider default"></div>
				
				<!-- Popular goodies -->
				<div class="row">
					<div class="col-md-12">
						<h3 class="text-center uppercase">Популярные товары</h3>
					</div>
				</div>
				<div class="row popular-items">
					<?php
						$args = array(
							'numberposts' => 4,
							'post_type' => 'product'
						);
						$popProducts = new WP_Query( $args );
						if ( $popProducts->have_posts() ) {
							while( $popProducts->have_posts() ) {
								$popProducts->the_post();
								if ( has_term( 'popular', 'tags' ) ) {
					?>

					<div class="col-md-3">
						<div class="product-item index">
							<div class="hidden-block div-slide-down">
								<div class="div-as-table">
									<div class="div-as-table-cell">
										<a href="<?php the_permalink(); ?>" data-toggle="tooltip" data-placement="top" title="Подробнее" class="action-btn"><i class="fa fa-arrow-right"></i></a>
										<a href="#" data-toggle="tooltip" data-placement="top" title="Добавить в корзину" class="action-btn"><i class="fa fa-check"></i></a>
									</div>
								</div>
							</div>
							<img src="<?php echo get_post_meta( $post->ID, 'main_img', true ); ?>" class="img-responsive">
							<div class="sign"><?php the_title(); ?></div>
						</div>
					</div>

					<?php
								}
							}
						} else {
							echo "Записи для вывода не найдены";
						}
						wp_reset_postdata();
					?>
				</div>
				<!-- / Popular goodies -->
				
				<div class="divider default"></div>
				
				<div class="row double-heading">
					<div class="col-md-12">
						<h3 class="text-center uppercase">Преимущества</h3>
						<h6 class="text-center uppercase subheading">С нами удобно и выгодно</h6>
					</div>
				</div>
				
				<div class="row benefits-wrapper">
					<div class="col-md-4">
						<div class="benefits-item">
							<div class="benefit-icon">
								<img src="<?php bloginfo('template_url'); ?>/assets/img/days-7-64.png">
							</div>
							<h6 class="uppercase">Обработка заявок - <br> 7 дней в неделю</h6>
						</div>
					</div>
					
					<div class="col-md-4">
						<div class="benefits-item">
							<div class="benefit-icon">
								<img src="<?php bloginfo('template_url'); ?>/assets/img/delivery-64.png">
							</div>
							<h6 class="uppercase">Оперативная доставка <br> в день заявки</h6>
						</div>
					</div>
					
					<div class="col-md-4">
						<div class="benefits-item">
							<div class="benefit-icon">
								<img src="<?php bloginfo('template_url'); ?>/assets/img/days-6-64.png">
							</div>
							<h6 class="uppercase">Доставка - <br> 6 дней в неделю</h6>
						</div>
					</div>
				</div>
				
				<div class="row">
					<div class="col-md-12">
						<h3 class="text-center uppercase">Использование одноразовых расходных материалов - <br>выгодно, современно и удобно!</h3>
					</div>
				</div>
				<div class="row index-bottom-text-wrapper">
					<?php
						if ( have_posts() ) {
							while ( have_posts() ) {
								the_post();
					?>

					<div class="col-md-12">
						<?php the_content(); ?>
					</div>

					<?php
							}
						}
					?>
				</div>
			</div>

<?php get_footer(); ?>