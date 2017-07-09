jQuery(document).ready(function($) {
	$("#footer-callback-form").on("submit", function(e) {
		e.preventDefault();
		var $form = $(this);
		$.ajax({
			method: "POST",
			url: sg_forms_ajax.ajax_url,
			data: {
				action: "sg_ajax",
				nonce: sg_forms_ajax.nonce,
				phone: $("#phone").val(),
				form_type: $form.find(".form-type").val()
			},
			success: function() {
				$form.trigger("reset");
				$("#success-modal").modal("show");
			},
			error: function() {
				$form.trigger("reset");
				$("#failure-modal").modal("show");
			}
		});
	});
	
	$("#callback-form-ajax").on("submit", function(e) {
		e.preventDefault();
		var $form = $(this);
		if ($("#checking").val() != 5) {
			$form.find(".form-group:nth-child(3)").after("<div class='col-md-6 col-md-offset-6 danger-msg'><p class='text-danger'>Введите верное значение</p></div>");
			setTimeout(function() {$(".danger-msg").fadeOut()}, 3000);
		} else {
			$.ajax({
				method: "POST",
				url: sg_forms_ajax.ajax_url,
				data: {
					action: "sg_ajax",
					nonce: sg_forms_ajax.nonce,
					name: $("#name").val(),
					phone: $("#phone2").val(),
					checking: $("#checking").val(),
					agreement: $("#agreement").val(),
					form_type: $form.find(".form-type").val()
				},
				success: function() {
					$form.trigger("reset");
					$("#callback-form").modal("hide");
					$("#success-modal").modal("show");
				},
				error: function() {
					$form.trigger("reset");
					$("#callback-form").modal("hide");
					$("#failure-modal").modal("show");
				}
			});
		}
	});
	
	$("#price-list-form-ajax").on("submit", function(e) {
		e.preventDefault();
		var $form = $(this);
		$.ajax({
			method: "POST",
			url: sg_forms_ajax.ajax_url,
			data: {
				action: "sg_ajax",
				nonce: sg_forms_ajax.nonce,
				name: $("#name2").val(),
				email: $("#email").val(),
				agreement: $("#agreement2").val(),
				form_type: $form.find(".form-type").val()
			},
			success: function() {
				$form.trigger("reset");
				$("#price-request-form").modal("hide");
				$("#success-modal").modal("show");
			},
			error: function() {
				$form.trigger("reset");
				$("#price-request-form").modal("hide");
				$("#failure-modal").modal("show");
			}
		});
	});
	
	$("#product-ask-question-form-ajax").on("submit", function(e) {
		e.preventDefault();
		var $form = $(this);
		$.ajax({
			method: "POST",
			url: sg_forms_ajax.ajax_url,
			data: {
				action: "sg_ajax",
				nonce: sg_forms_ajax.nonce,
				question_about: $("#question-about").val(),
				articul: $form.find(".product-articul").val(),
				name: $("#name3").val(),
				phone: $("#phone3").val(),
				question_text: $("#product-question").val(),
				agreement: $("#agreement3").val(),
				form_type: $form.find(".form-type").val()
			},
			success: function() {
				$form.trigger("reset");
				$("#product-ask-question-form").modal("hide");
				$("#success-modal").modal("show");
			},
			error: function() {
				$form.trigger("reset");
				$("#product-ask-question-form").modal("hide");
				$("#failure-modal").modal("show");
			}
		});
	});
});