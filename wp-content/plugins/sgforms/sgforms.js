jQuery(document).ready(function($) {
	$("#footer-callback-form").submit(function(e) {
		e.preventDefault();
		$.ajax({
			method: "POST",
			url: "/wp-admin/admin-ajax.php",
			data: {
				action: "sg_ajax",
				phone: $("#phone").val(),
				form_type: $(".form-type").val()
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