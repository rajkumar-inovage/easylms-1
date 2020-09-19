<div class="row">
    <div class="col-12" data-check-all="checkAll">	
		<?php 
		$i = 1;
		if ( ! empty ($lessons)) { 
			foreach ($lessons as $row) { 
				?>
				<div class="card d-flex flex-row mb-3">
		          <div class="d-flex flex-grow-1 min-width-zero">
		              <div class="card-body align-self-center d-flex flex-column flex-md-row justify-content-between min-width-zero align-items-md-center">
		                  <a class="list-item-heading mb-0 w-40 w-xs-100 mt-0" href="<?php echo site_url ('coaching/lessons/create/'.$coaching_id.'/'.$course_id.'/'.$row['lesson_id']); ?>">
		                      <div class="d-flex">
		                        <span class="mr-2"><?php echo $i; ?>.</span>
		                        <div class="flex-grow-1 my-auto truncate">
		                          <div class="text-muted text-small">
		                          	Chapter <?php echo $i; ?>
		                          </div>
		                          <?php echo $row['title']; ?>
		                        </div>
		                      </div>
		                    </a>
                            <p class="text-muted text-small w-15 w-xs-100">
                            	<?php echo $row['duration']; ?>
                            	<?php 
                            	if ($row['duration_type'] == LESSON_DURATION_MIN) {
                            		echo ' minutes';
                            	} else if ($row['duration_type'] == LESSON_DURATION_HOUR) {
                            		echo ' hours';
                            	} else if ($row['duration_type'] == LESSON_DURATION_WEEK) {
                            		echo ' weeks';
                            	}
                            	?>
                            </p>
                            <p class="w-15 w-xs-100">
	                        	<?php 
								if ($row['status'] == LESSON_STATUS_PUBLISHED) {
									echo '<span class="badge badge-success">Published</span>';
								} else {
									echo '<span class="badge badge-light">Unpublished</span>';
								}
								?>
                                <div class="custom-switch custom-switch-primary-inverse mb-2 custom-switch-small">
                                    <input class="custom-switch-input switch_demo" id="demo<?php echo $row['lesson_id']; ?>" data-id="<?php echo $row['lesson_id']; ?>" type="checkbox" value="1" <?php if ($row['for_demo'] == 1) echo 'checked'; ?> >
                                    <label class="custom-switch-btn" for="demo<?php echo $row['lesson_id']; ?>"></label><br>
                                    <span class="text-small">For Demo</span>
                                </div>
                            </p>
                            <p class="w-15 w-xs-100">
								<?php echo anchor ('coaching/lessons/pages/'.$coaching_id.'/'.$course_id.'/'.$row['lesson_id'], 'Content', ['class'=>'btn btn-primary btn-sm']); ?>
							</p>
                        </div>
                    </div>
                </div>
				<?php 
				$i++; 
			} 
		} else {
			?>
			<div class="alert alert-danger" role="alert">
				No chapters found
				<?php echo anchor ('coaching/lessons/create/'.$coaching_id.'/'.$course_id, 'Create Chapter'); ?>
			</div>
			<?php
		}
		?>
	</div>
</div>