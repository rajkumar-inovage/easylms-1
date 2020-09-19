<div class="card ">
    <div class="card-body">
        <h5 class="card-title">Classrooms</h5>
        <?php
        $i = 1;
        if (! empty ($classrooms)) {
            foreach ($classrooms as $row) {
            	?>
                <div class="d-flex flex-row justify-content-between mb-3 pb-3 border-bottom">
                    <div class="pr-3">
	                    <span class="mr-2 float-left">
	                    	<?php echo $i; ?>
	                    </span>
                        <a href="#">
                            <p class="font-weight-medium mb-0"><?php echo $row['title']; ?></p>
                            <p class="text-muted mb-0 text-small ml-3">Created On <?php echo date ('d-m-Y', $row['created_on']); ?></p>
                        </a>
                    </div>
                    <div>
                    	<div class="btn-group">
	                    	<!-- Delete -->
							<?php
							$message = 'Delete this category?';
							$url = site_url('coaching/setting_actions/delete_classroom/'.$coaching_id.'/'.$row['id']);
							?>
							<a href="#add_classroom" data-toggle="modal" class="btn btn-info btn-sm" onclick="updateId (<?php echo $row['id']; ?>, '<?php echo $row['title']; ?>')" data-toggle="tooltip" data-placement="top" title="Rename"><i class=" fa fa-edit"></i> </a>
							<a href="#" onclick="show_confirm ('<?php echo $message; ?>', '<?php echo $url; ?>')" class="btn btn-danger btn-sm " ><i class="fa fa-trash"></i></a>
						</div>						
                    </div>

                </div>
            	<?php
            	$i++;
            }
        }
        ?>
        <div class="separator mb-2 mt-2"></div>

		<a href="#add_classroom" data-toggle="modal" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Add Classroom"><i class=" fa fa-plus"></i> Add Classroom</a>

    </div>
</div>


<!-- Add Category Modal -->
<div class="modal fade" id="add_classroom" tabindex="-1" role="dialog" aria-labelledby="add_classroom" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
	   <?php echo form_open ('coaching/setting_actions/create_classroom/'.$coaching_id, array ('class'=>'validate-form')); ?>
		  <input type="hidden" name="room_id" id="room_id" value="0">
		  <div class="modal-header">
			<h5 class="modal-title" id="renameNodeTitle">Add/Edit Classroom</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>
		  <div class="modal-body">
			<div class="form-group">
				<label class="control-label">Classroom Title</label>
				<input type="text" value="" class="form-control" name="title" id="room_title" autofocus="true">
			</div>
		  </div>
		  <div class="modal-footer">
			<button type="submit" class="btn btn-success">Save </button>
		  </div>
	   </form>
	</div>
  </div>
</div>