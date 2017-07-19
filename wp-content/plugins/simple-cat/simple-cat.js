jQuery(document).ready(function($) {
	var cartVal = 0;
	var btnCartCounter = 0;

	$(".btn-cart").on("click", function() {
		var productMainData = $(this).parents(".product-main");
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
				$("#success-modal").modal("show");
			},
			error: function() {
				$("#failure-modal").find(".modal-title").text("Произошла ошибка");
				$("#failure-modal").modal("show");
			}
		});

		
	});
	
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
	});
	
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
		} else {
			return false;
		}
	});
});