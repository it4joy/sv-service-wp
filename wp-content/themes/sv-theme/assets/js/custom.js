jQuery(document).ready(function($) {
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
	
	// Magnific Popup;
	
	$('.img-modal').magnificPopup({
		type: 'image',
		disableOn: function() {
			if ( $(window).width() < 320 ) {
				return false;
			}
			return true;
		}
	});
	
	//

	$(".unfold-btn").on("click", function() {
		$(this).next().slideToggle();
		$(this).toggleClass("active");
	});
	
	// insert navbar-right;
	
	$(".navbar-nav").after("<ul class='nav navbar-nav navbar-right'><li><a href='#wp-searching-form' class='navbar-link' data-toggle='modal'><i class='fa fa-search' data-toggle='tooltip' data-placement='left' title='Поиск'></i></a></li><li><a href='/korzina' class='navbar-link'><span class='badge'>0</span><i class='fa fa-shopping-basket' data-toggle='tooltip' data-placement='left' title='Корзина'></i></a></li><li><a href='#callback-form' class='navbar-link' data-toggle='modal'><i class='fa fa-phone' data-toggle='tooltip' data-placement='right' title='Обратный звонок'></i></a></li></ul>");

	// insert link to pop-up form for request of price (top_menu);

	$(".navbar-nav li:nth-child(5) a").attr("data-toggle", "modal");
	$(".navbar-nav li:nth-child(5) a").on("click", function(e) {
		e.preventDefault();
	});
	
	// insert callback link into footer_menu_right;
	
	$("#menu-footer_menu_right li:last-child a").attr("data-toggle", "modal");

	// index : big carousel;

	$(".carousel.index .item:first-child").addClass("active");
	// test it again and upgrade for case when amount of items less than 3;
	$(".carousel.index .item").each(function( i ) {
		if ( $(this).index() > 2 ) {
			var slideIndex = $(this).index();
			var slideIndexStr = slideIndex.toString();
			$(".carousel.index .carousel-indicators li:last-child").after("<li data-target='#carousel-index-top' data-slide-to='" + slideIndexStr + "'></li>");
		}
	});
});