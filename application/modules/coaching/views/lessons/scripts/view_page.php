<script>
$(document).ready(() => {
	$(window).resize((event) => {
		$('iframe').each((index, frame)=>{
			$(frame).width(
				Math.floor(
					$(frame)
					.parent()
					.width()
				)
			);
			$(frame).height(
				Math.floor(
					$(frame)
					.parent()
					.width() * 9 / 16
				)
			);
		});
	});
	$('iframe').on("load", (event) => {
		$(event.currentTarget).width(
			Math.floor(
				$(event.currentTarget)
				.parent()
				.width()
				)
			);
		$(event.currentTarget).height(
			Math.floor(
				$(event.currentTarget)
				.parent()
				.width() * 9 / 16
				)
			);
	});
	$('iframe').each((index, frame)=>{
		$(frame).height(0);
	});
});
</script>