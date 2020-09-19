 <script>
$(document).ready (function () {
	function toggleEnrolmentSetting(){
		if ($('.check:checked').length) {
			$('#set_enrolment').removeAttr('disabled');
		} else {
			$('#set_enrolment').attr('disabled', true);
		}
	}
	$("#check-all").click (function() {
		$('.check').not(this).prop('checked', this.checked);
		toggleEnrolmentSetting();
	});
	$(".check").click(function(){
		toggleEnrolmentSetting();
	});
	$('.status').on('click', (e) => {
		var thisElement = $(e.currentTarget);
		$('#filter-status').val(thisElement.data('value'));
		$('.status.active').removeClass('active');
		thisElement.addClass('active');
		$('#search-form').trigger('submit');
	});
	$('#search-form').on('submit', (e) => {
		e.preventDefault ();
		var formData = new FormData(e.currentTarget);
		fetch ($(e.currentTarget).attr('action'), {
			method : 'POST',
			body: formData,
		}).then (function (response) {
			return response.json ();
		}).then(function(result) {
			if (result.status == true) {
				var output =  result.data;
				$('#list').html(output);
			}
		});
	});
});
</script>