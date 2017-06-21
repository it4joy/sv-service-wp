$(function() {
	// sticky top navigation;
	
	var topNavStartPosition = $(".navbar").offset();
	var topNavStartPositionTop = topNavStartPosition.top;
	
	var windowHeight = $(window).height();
	
	$(".btn-to-top").hide();

	$(window).scroll(function() {
		if ( $(this).scrollTop() > topNavStartPositionTop ) {
			$(".navbar").addClass("navbar-fixed-top");
			$(".navbar-brand").show();
		} else {
			$(".navbar").removeClass("navbar-fixed-top");
			$(".navbar-brand").hide();
		}
		
		if ( $(this).scrollTop() >= windowHeight / 2 ) {
			$(".btn-to-top").fadeIn();
		} else {
			$(".btn-to-top").fadeOut();
		}
	});

	$(".btn-to-top").on("click", function() {
		$("html, body").animate({ scrollTop: 0 }, 600);
	});

	// slide down via :hover;

	$("div").has(".div-slide-down").hover(function() {
		$(this).children(".div-slide-down").slideDown();
	}, function() {
		$(this).children(".div-slide-down").slideUp();
	});

	// Twitter Bootstrap tooltip;

	$('[data-toggle="tooltip"]').tooltip();

	// jQuery UI sidebar dropdown menu;

	$("#navbar-sidebar").menu();
	
	//

	$(".unfold-btn").on("click", function() {
		$(this).next().slideToggle();
		$(this).toggleClass("active");
	});
	
	// insert navbar-right;
	
	$(".navbar-nav").after("<ul class='nav navbar-nav navbar-right'><li><a href='#' class='navbar-link'><i class='fa fa-search' data-toggle='tooltip' data-placement='left' title='Поиск'></i></a></li><li><a href='cart.php' class='navbar-link'><span class='badge'>0</span><i class='fa fa-shopping-basket' data-toggle='tooltip' data-placement='left' title='Корзина'></i></a></li><li><a href='#callback-form' class='navbar-link' data-toggle='modal'><i class='fa fa-phone' data-toggle='tooltip' data-placement='right' title='Обратный звонок'></i></a></li></ul>");
	
	// insert callback link into footer_menu_right;
	
	$("#menu-footer_menu_right li:last-child a").attr("data-toggle", "modal");
	
	// index : big carousel;
	$(".carousel.index .item:first-child").addClass("active");
});