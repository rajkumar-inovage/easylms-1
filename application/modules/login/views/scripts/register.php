<script>
$('#show-password').on ('click', function () {
	const password = $("#reg-password");
	const password_text = $("#show-password-link");
	const password_icon = $("#password-icon");
	if (password.attr('type') === "password") {
	    password.attr('type','text');
	    password_icon.addClass('fa-eye-slash').removeClass('fa-eye');
	    password_text.text('Hide Password');
	} else {
		password.attr('type','password');
		password_icon.removeClass('fa-eye-slash').addClass('fa-eye');
	    password_text.text('Show Password');
	}
});
</script>