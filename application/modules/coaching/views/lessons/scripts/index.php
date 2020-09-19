 <script>
	const dataURL = '<?php echo site_url ('coaching/lesson_actions/search/'.$coaching_id.'/'.$course_id); ?>';
	const formSelector = document.getElementById ('search-form');
	const outputSelector = document.getElementById ('lessons-list');
	function search_status (status) {
		fetch (dataURL + '/' + status, {
			method: 'POST',
		}).then (function (response) {
			return response.json ();
		}).then (function (result) {
			if (result.status == true) {
				outputSelector.innerHTML = result.data;
			}
		});
	}
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
	$('.status').on('click', (e) => {
		var thisElement = $(e.currentTarget);
		thisElement.parents('.dropdown-menu').prev().html(thisElement.html());
		thisElement.parents('.dropdown-menu').find('.dropdown-item.active').removeClass('active');
		thisElement.addClass('active');
	});
	// For Demo Switch
	$('.switch_demo').on ('change', function () {
		if ($(this).is(':checked')) {
			var data = 1;
		} else {
			var data = 0;			
		}
		var id = $(this).attr ('data-id');
		fetch ('<?php echo site_url ('coaching/lesson_actions/mark_for_demo'); ?>/'+id+'/'+data, {
			method: 'POST',
		}).then (function (response){
			return response.json ();
		}).then (function (result) {

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