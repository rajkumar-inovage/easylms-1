<div class="row justify-content-center">
	<div class="col-md-6">
		<?php echo form_open('coaching/courses_actions/category_action/' . $coaching_id . '/' . $cat_id . '/', array('class' => 'card', 'id' => 'validate-1')); ?>
			<div class="card-body">
				<h4 class="card-title text-center mb-0"><?php echo $sub_title; ?></h4>
				<div class="form-group">
					<label for="title">Title</label>
					<input type="text" class="form-control" name="title" id="title" placeholder="Course category title"<?php echo isset($category) ? " value=\"" . $category['title'] . "\"" : "" ?> />

				</div>
			</div>
			<div class="card-footer">
				<input type="submit" name="submit" class="btn btn-primary" value="<?php echo $submit_label; ?>" data-toggle="tooltip" data-placement="right" title="<?php echo $submit_title; ?>">
			</div>
		<?php echo form_close(); ?>
	</div>
</div>