jQuery(document).ready(function($) {
	var currentHref = window.location.href;
	
	var cartVal = 0;

	var btnCartCounter = 0;

	var cartCommonData = $(".cart-common-data");
	var totalPrice = $(cartCommonData).find(".total span");

	var productsTableStr;

	// adding;

	$(".btn-cart").on("click", function() {
		var productMainData;
		
		if ( $("div").is(".product-main") ) {
			productMainData = $(this).parents(".product-main");
		} else if ( $("div").is(".product-item.detailed") ) {
			productMainData = $(this).parents(".product-item.detailed");
		}

		//var productMainData = $(this).parents(".product-main");
		cartVal++;
		btnCartCounter++;
		
		if (btnCartCounter > 1) {
			$("#failure-modal").find(".modal-title").text("Продукт уже есть в корзине");
			$("#failure-modal").modal("show");
			return false;
		}

		$.ajax({
			method: "POST",
			url: simple_cat_ajax.ajax_url,
			data: {
				action: "sc_ajax",
				nonce: simple_cat_ajax.nonce,
				actionType: "adding",
				article: $(productMainData).find(".article span").text(),
				brand: $(productMainData).find(".brand span").text(),
				availability: $(productMainData).find(".availability span").text(),
				packing: $(productMainData).find(".packing span").text(),
				price: $(productMainData).find(".price span").text(),
				amount: $(productMainData).find(".products-amount").val(),
				productTitle: $(productMainData).find(".product-title").val(),
				productThumb: $(productMainData).find(".product-thumb").val(),
				productLink: $(productMainData).find(".product-link").val()
			},
			success: function() {
				$("#success-modal").find(".modal-title").text("Продукт успешно добавлен");
				$(".modal-title").after("<p class='text-center'><a href='/korzina/'>Перейти в корзину</a></p>");
				$("#success-modal").modal("show");
				add_unit();
			},
			error: function(request, status, error) {
				if (request.status == 500) {
					$("#failure-modal").find(".modal-title").text("Данный продукт уже был добавлен");
					$("#failure-modal").modal("show");
				} else {
					$("#failure-modal").find(".modal-title").text("Произошла ошибка");
					$("#failure-modal").modal("show");
				}
			}
		});
	});

	var cartPageChecking = setInterval(function() {
		if ( currentHref.indexOf("korzina") !== -1 ) {
			if ( $("div").is(".detailed") ) {
				var price = 0;

				$(".product-item.detailed").each(function() {
					price = price + Number( $(this).find(".price span").text() );
				});

				price = Number( price.toFixed(2) );

				$(totalPrice).text(price);
			} else {
				$(totalPrice).text("0");
			}
		}
	}, 2000);

	// top cart icon indication;

	function add_unit() {
		var cartVal = localStorage.getItem("topCartVal");
		if (cartVal === null) {
			cartVal = 0;
		}
		cartVal++;
		localStorage.setItem("topCartVal", cartVal);
	}

	setInterval(function() {
		var cartVal = localStorage.getItem("topCartVal");

		if (cartVal !== null) {
			var cartVal = localStorage.getItem("topCartVal");
			$(".navbar-right .badge").text(cartVal);
		} else {
			return false;
		}
	}, 2000);

	// delete;

	$(".btn-delete").on("click", function() {
		var productItem = $(this).parents(".product-item");
		
		$.ajax({
			method: "POST",
			url: simple_cat_ajax.ajax_url,
			data: {
				action: "sc_ajax",
				nonce: simple_cat_ajax.nonce,
				actionType: "delete",
				article: $(productItem).find(".article span").text()
			},
			success: function() {
				$(productItem).detach();
				$("#success-modal").find(".modal-title").text("Продукт удален из корзины");
				$("#success-modal").modal("show");
			},
			error: function() {
				$("#failure-modal").modal("show");
			},
			// finish it!
			complete: function() {
				if ( !$(".product-item").length > 0 ) {
					$(".cart-product-list .col-md-9").append("<p class='msg-empty-cart'>Корзина пуста. Добавьте товары в Вашу корзину :)</p>");
				}
			}
		});
		
		var cartVal = localStorage.getItem("topCartVal");
		cartVal--;
		localStorage.setItem("topCartVal", cartVal);
	});

	// deleteAll;

	$(".link-cart-clear").on("click", function(e) {
		e.preventDefault();

		if ( $(".cart-product-list div").is(".product-item") ) {
			var articles = [];

			$(".cart-product-list .product-item").each(function() {
				var article = $(this).find(".article span").text();
				articles.push(article);
			});

			var articlesStr = articles.join(", ");
			//console.log(articlesStr);

			$.ajax({
				method: "POST",
				url: simple_cat_ajax.ajax_url,
				data: {
					action: "sc_ajax",
					nonce: simple_cat_ajax.nonce,
					actionType: "deleteAll",
					articles: articlesStr
				},
				success: function() {
					$(".cart-product-list .product-item").detach();
					$("#success-modal").find(".modal-title").text("Продукты удалены из корзины");
					$("#success-modal").modal("show");
				},
				error: function() {
					$("#failure-modal").modal("show");
				}
			});

			var cartVal = localStorage.getItem("topCartVal");

			if ( cartVal !== null ) {
				localStorage.setItem("topCartVal", 0);
			} else {
				return false;
			}
		} else {
			return false;
		}
	});

	// preorder start;

	$(".btn-preorder").on("click", function() {
		var productsTableArr = [];
		
		if ( $("tr").is(".product-data-row") ) {
			$(".product-data-row").remove();
		}

		if ( $("div").is(".detailed") ) {
			$(".product-item.detailed").each(function() {
				var preorderTitle = $(this).find("h6 a").text();
				var productArticle = $(this).find(".article span").text();
				var preorderAmount = $(this).find("input[name='amount']").val();
				var preorderPrice = $(this).find(".price span").text();
				
				var productsTableRow = preorderTitle + " / " + productArticle + " / " + preorderAmount + " / " + preorderPrice;
				productsTableArr.push(productsTableRow);
				
				$("#preorder-form table .heading").after("<tr class='product-data-row'><td>" + preorderTitle + "</td><td>" + productArticle + "</td><td>" + preorderAmount + "</td><td>" + preorderPrice + "</td></tr>");
			});
		} else {
			return false;
		}
		
		productsTableStr = productsTableArr.join(", ");
		console.log(productsTableStr);
		
		var currentTotal = Number( totalPrice.text() );
		
		if ( currentTotal > 0 ) {
			$("#preorder-form table .total span").text(currentTotal);
		} else {
			return false;
		}
	});

	// final preorder form;

	$("#preorder-form-ajax").on("submit", function(e) {
		e.preventDefault();

		var $form = $(this);

		$.ajax({
			method: "POST",
			url: simple_cat_ajax.ajax_url,
			data: {
				action: "sc_ajax",
				nonce: simple_cat_ajax.nonce,
				actionType: "sendPreorder",
				productsTableStr: productsTableStr,
				total: $("#preorder-form table .total span").text(),
				name: $form.find("#fullname").val(),
				phone: $form.find("#phone4").val(),
				agreement: $form.find("#agreement4").val()
			},
			success: function() {
				$form.trigger("reset");
				$("#preorder-form").modal("hide");
				$("#success-modal").find(".modal-title").text("Ваша заявка отправлена");
				$("#success-modal").modal("show");
			},
			error: function() {
				$form.trigger("reset");
				$("#preorder-form").modal("hide");
				$("#failure-modal").modal("show");
			}
		});
	});
});