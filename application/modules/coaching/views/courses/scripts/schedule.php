<script>
$(document).ready(function() {
	$('.repeat-w').on ('change', function () {
		$('#repeat-weekly').prop('checked', true);
	});

	$('#repeat-daily').on ('click', function () {
	    if (('#repeat-daily').is (':checked')) {
	        $('.repeat-w').prop('checked', false);
	    }
	});
});

$( function() {
    $( ".datepicker" ).datepicker({
      format: 'mm-dd-yyyy',
    });
});
</script>