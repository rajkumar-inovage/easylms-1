<script>
	// const dataURL = '<?php //echo site_url ('student/courses_actions/search/'.$coaching_id.'/'.$member_id); ?>';

	const outputSelector = document.getElementById ('courses-list');
	const formSelector = document.getElementById ('search-form');
	const dataURL = formSelector.getAttribute ('action');

	$('#categories').on ('change', function () {

		var data = new FormData (formSelector);
		fetch (dataURL, {
			method: 'POST',
			body: data,
		}).then (function (response) {
			return response.json ();
		}).then (function (result) {
			if (result.status == true) {
				outputSelector.innerHTML = result.data;
			}
		});
	});


	$('#search-text').on ('keyup', function () {
		var data = new FormData (formSelector);
		var search = $(this).val ();
		fetch (dataURL, {
			method: 'POST',
			body: data,
		}).then (function (response) {
			return response.json ();
		}).then (function (result) {
			if (result.status == true) {
				outputSelector.innerHTML = result.data;
			}
		});
	});

	$(document).on("keypress", "input", function (e) {
	    var code = e.keyCode || e.which;
	    if (code == 13) {
	        e.preventDefault();
	        return false;
	    }
	});

</script>