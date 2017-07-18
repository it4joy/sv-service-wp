jQuery(document).ready(function($) {
	var cartVal = 0;
	var btnCartState = 0;

	$(".btn-cart").on("click", function() {
		var productMainData = $(this).parents(".product-main");
		cartVal++;
		btnCartState++;
		//alert("yes");

		$.ajax({
			method: "POST",
			url: simple_cat_ajax.ajax_url,
			data: {
				action: "sc_ajax",
				nonce: simple_cat_ajax.nonce,
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
				//$("#success-modal").modal("show");
				alert("Продукт успешно добавлен");
			},
			error: function() {
				//$("#failure-modal").modal("show");
				alert("Произошла ошибка");
			}
		});

		/* if ( btnCartState > 1 ) {
			alert("Продукт уже есть в корзине.");
			return false;
		} else {
			
		} */
	});
});