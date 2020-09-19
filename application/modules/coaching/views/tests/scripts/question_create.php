<script>
$(document).ready (() => {
	const templateURL = '<?php echo site_url ('coaching/tests/question_create/'.$coaching_id.'/'.$course_id.'/'.$test_id.'/'.$parent_id.'/'.$question_id); ?>';
	$('#question-type').on ('change', function () {
		var qt = $(this).val ();
		document.location = templateURL + '/' + qt;
	});
	$(window).bind('keydown', function(event) {
	    if (event.ctrlKey && !event.shiftKey || event.metaKey) {
	        switch (String.fromCharCode(event.which).toLowerCase()) {
	        case 's':
	            event.preventDefault();
	            $('#save').trigger('click');
	            break;
	        }
	    }
	    if (event.ctrlKey && event.shiftKey || event.metaKey) {
	        switch (String.fromCharCode(event.which).toLowerCase()) {
	        case 's':
	            event.preventDefault();
	            $('#save_new').trigger('click');
	            break;
	        }
	    }
	});
});
</script>