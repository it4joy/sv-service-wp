<!DOCTYPE html>
<html lang="ru" class="no-js">
    <head>
        <title><?php echo wp_get_document_title(); ?></title>

        <meta charset="UTF-8">
        <meta name="description" content="<?php bloginfo('description'); ?>">
        <meta name="keywords" content="">
        <meta name="copyright" content="SV Service">
        <meta name="author" content="Graphical Shell - Igor Ivanov">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="HandheldFriendly" content="true">
        <meta name="MobileOptimized" content="width">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta http-equiv="X-UA-Compatible" content="IE=Edge">

        <link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/assets/img/favicon.ico" type="image/x-icon">
		
		<?php wp_head(); ?>
    </head>
	
	<body <?php body_class(); ?> >
		<div class="page-wrapper">
			<div class="header-wrapper">
				<header class="page-header">
					<div class="container">
						<div class="row">
							<div class="col-md-3">
								<p class="logo-tmp"><a href="/"><?php bloginfo('name'); ?></a></p>
							</div>
							
							<div class="col-md-6">
								<p>Производство и комплексное оснащение расходными материалами <br> индустрии в сфере оказания услуг. Современно. Комфортно. Гигиенично.</p>
							</div>
							
							<div class="col-md-3 header-contacts">
								<p><a href="tel:+79196740868">+7 (919) 674-08-68</a></p>
								<p><a href="tel:+79276670630">+7 (927) 667-06-30 </a></p>
							</div>
						</div>
					</div>
				</header>
				
				<!-- wp-bootstrap-navwalker -->
				
				
				
				<!-- / wp-bootstrap-navwalker -->

				<nav class="navbar navbar-default">
					<div class="container">
						<!-- Brand and toggle get grouped for better mobile display -->
						<div class="navbar-header">
							<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
							<a href="/" class="navbar-brand"><?php bloginfo('name'); ?></a>
						</div>

						<?php
							wp_nav_menu( array(
								'menu'              => 'top_menu',
								'theme_location'    => 'top_menu', // is it need?
								'depth'             => 0,
								'container'         => 'div',
								'container_class'   => 'collapse navbar-collapse',
								'container_id'      => 'bs-example-navbar-collapse-1',
								'menu_class'        => 'nav navbar-nav',
								'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
								'walker'            => new WP_Bootstrap_Navwalker()
							) );
						?>

					</div><!-- /.container -->
				</nav>
			</div>