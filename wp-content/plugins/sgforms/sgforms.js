jQuery(document).ready(function($) {
	$("#footer-callback-form").submit(function() {
		$.ajax({
			method: "POST",
			url: sg_forms_ajax_url.ajax_url,
			data: {
				action: "sgforms_action",
				phone: $("#phone").val()
			},
			success: function(data) {
				$("#success-modal").modal("show");
			},
			error: function() {
				$("#failure-modal").modal("show");
			}
		});
	});
});