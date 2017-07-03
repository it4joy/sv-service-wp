jQuery(document).ready(function($) {
	$("#footer-callback-form").on("submit", function(e) {
		e.preventDefault();
		var $form = $(this);
		$.ajax({
			method: "POST",
			url: "/wp-admin/admin-ajax.php",
			data: {
				action: "sg_ajax",
				phone: $("#phone").val(),
				form_type: $(".form-type").val()
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
		$.ajax({
			method: "POST",
			url: "/wp-admin/admin-ajax.php",
			data: {
				action: "sg_ajax",
				name: $("#name").val(),
				phone: $("#phone").val(),
				form_type: $(".form-type").val()
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
});