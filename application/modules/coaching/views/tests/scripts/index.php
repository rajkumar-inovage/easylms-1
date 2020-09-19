<script>
const outputSelector = document.getElementById ('test-list');
$(document).ready (() => {
	$('#search-status').on ('change', () => {
		var status = $(this).val ();
		var url = '<?php echo site_url ('coaching/tests/index/'.$coaching_id.'/'.$course_id); ?>/'+status;
		$(location).attr('href', url);
	});
	$('#search-type').on ('change', () => {
		var type = $(this).val ();
		var url = '<?php echo site_url ('coaching/tests/index/'.$coaching_id.'/'.$course_id.'/'.$status); ?>/'+type;
		$(location).attr('href', url);
	});
	$('#search-category').on ('change', () => {
		var cat_id = $(this).val ();
		var url = '<?php echo site_url ('coaching/tests/index/'.$coaching_id); ?>/'+cat_id+'/<?php echo $status; ?>';
		$(location).attr ('href', url);
	});
	$('.status').on('click', (e) => {
		var thisElement = $(e.currentTarget);
		thisElement.parents('.dropdown-menu').prev().html(thisElement.html());
	});
	// For Demo Switch
	$('.switch_demo').on('change', (e) => {
		let data;
		if ($(e.currentTarget).is(':checked')) {
			data = 1;
		} else {
			data = 0;			
		}
		let id = $(e.currentTarget).attr ('data-id');
		fetch ('<?php echo site_url ('coaching/tests_actions/mark_for_demo'); ?>/'+id+'/'+data, {
			method: 'POST',
		}).then ((response) => {
			return response.json ();
		}).then ((result) => {
		});
	});
	$('#search-form').on('submit', (e) => {
		e.preventDefault ();
		let formURL = $(e.currentTarget).attr('action');
		let formData = new FormData(e.currentTarget);
		fetch (formURL, {
			method : 'POST',
			body: formData,
		}).then ((response) => {
			return response.json ();
		}).then((result) => {
			if (result.status == true) {
				var output =  result.data;
				$('#test-list').html(output);
			}
		});
	});
});
</script>