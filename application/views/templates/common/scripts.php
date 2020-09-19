<script src="<?php echo base_url (THEME_PATH.'assets/plugins/tinymce/tinymce.min.js'); ?>"></script>
<script> 
$(document).ready (function () {
	tinymce.init({
		selector: '.tinyeditor',
		branding: false,
		menubar: false,	
		mobile: {
			menubar: true,
		},	
		plugins: " link image lists charmap preview code fullscreen media nonbreaking  directionality paste code table",
		toolbar: " undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media | table | preview fullpage | code charmap",
	    toolbar_mode: 'floating',

		setup: function (editor) {
			editor.on('change', function () {
				tinymce.triggerSave();
			});
			editor.on('keydown', function(event) {
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
		},
		relative_urls: false,
		entity_encoding: 'raw',
		extended_valid_elements : "a[href|target=_blank]",
		fix_list_elements : true,
		image_caption: false,
		<?php if(isset($coaching_id)): ?>
		images_upload_url: '<?php echo site_url("public/coaching/upload/$coaching_id")?>',
		<?php endif; ?>
		file_picker_types: 'image',
		paste_data_images: true,	// Needed for images
		convert_urls : false,      	// Needed for images
		remove_script_host : true, 	// Needed for images
	});
	/* SAVE BUTTON CLICK  */
	$('#save').on('click', function () { 
		$('#save_type').val ('save');
	});
	/* SAVE-NEW BUTTON CLICK  */
	$('#save_new').on('click', function () {
		$('#save_type').val ('save_new');
	});
});


// tinymce cleanup_callback
function tinymce_cleanup_callback(type,value) {
	switch (type) { 
		case 'get_from_editor': 
			// Remove &nbsp; characters
			value = value.replace(/&nbsp;/ig, ' ');
		break;
		case 'insert_to_editor':
		case 'submit_content':
		case 'get_from_editor_dom':
		case 'insert_to_editor_dom':
		case 'setup_content_dom':
		case 'submit_content_dom':
		default: 
		break;
	}
	return value;
}
</script>