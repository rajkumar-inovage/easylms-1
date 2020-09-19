<script>
const formSelector = document.getElementById('search-form');
const formURL = formSelector.getAttribute ('action');
const outputSelector = document.getElementById ('users-list');
$(document).ready (function () {
	$('#search-status').on ('change', function () {
		var status = $(this).val ();
		var url = '<?php echo site_url ('coaching/users/index/'.$coaching_id.'/'.$role_id); ?>/'+status+'/<?php echo $batch_id; ?>';
		$(location).attr('href', url);
	});

	$('#search-role').on ('change', function () {
		var role_id = $(this).val ();
		var url = '<?php echo site_url ('coaching/users/index/'.$coaching_id); ?>/'+role_id+'/<?php echo $status.'/'.$batch_id; ?>';
		$(location).attr('href', url);
	});
	
	$('#search-batch').on ('change', function () {
		var batch_id = $(this).val ();
		var url = '<?php echo site_url ('coaching/users/index/'.$coaching_id.'/'.$role_id.'/'.$status); ?>/'+batch_id;
		$(location).attr('href', url);
	});
	$('.status, .role, .sort-by').on('click', (e) => {
		var thisElement = $(e.currentTarget);
		thisElement.parents('.dropdown-menu').prev().html(thisElement.html());
	});
	$('.sort-by').on('click', (e) => {
		var thisElement = $(e.currentTarget);
		$('#filter-sort').val(thisElement.data('value'));
		$('.sort-by.active').removeClass('active');
		thisElement.addClass('active');
		$('#search-form').trigger('submit');
	});
	$('#search-form').on('submit', (e) => {
		e.preventDefault ();
		var formData = new FormData(formSelector);
		startLoader();
		fetch (formURL, {
			method : 'POST',
			body: formData,
		}).then (function (response) {
			return response.json ();
		}).then(function(result) {
			if (result.status == true) {
				stopLoader();
				var output =  result.data;
				outputSelector.innerHTML = output;
			}
		});
	});
	/*
	$('#filter-sort').on ('change', function (e) {
		var formData = new FormData(formSelector);
		fetch (formURL, {
			method : 'POST',
			body: formData,
		}).then (function (response) {
			return response.json ();
		}).then(function(result) {
			if (result.status == true) {
				var output =  result.data;
				outputSelector.innerHTML = output;
			}
		});
	});
	*/
});
</script>