<script>
const toBase64 = file => new Promise((resolve, reject) => {
	const reader = new FileReader();
	reader.readAsDataURL(file);
	reader.onload = () => resolve(reader.result);
	reader.onerror = error => reject(error);
});
$(document).ready(() => {
	$('#userfile').on('change',(e) => {
		let thisElement = $(e.currentTarget);
		let files = thisElement.prop('files');
		let file = files[0];
		(async (file) => {
			base64Logo = await toBase64(file);
			$('#image_preview').find('img').attr('src', base64Logo).css('max-width', '240px');
		})(file);
	});
});
</script>