<div class="row">
	<div class="col-md-12" id="list">
		<?php 
		if ($type == TEACHERS_ASSIGNED) {
			$this->load->view ('inc/teachers_assigned', $data);
		} else if ($type == TEACHERS_NOT_ASSIGNED) {
			$this->load->view ('inc/teachers_not_assigned', $data);
		}
		?>
	</div>
</div>