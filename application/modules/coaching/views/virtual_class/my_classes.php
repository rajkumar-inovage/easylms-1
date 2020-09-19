<div class="card card-default">
	<ul class="list-group">	
		<?php 
			$i=1;
			if (! empty ($my_classes)) {
				foreach($my_classes as $row) { 
					?>
					<li class="list-group-item media">
						<div class="media-left d-none">
							<?php if ($row['running'] == 'true') { ?>
								<span class="icon-block half bg-green-500 rounded-circle" title="Meeting is running">
									<i class="fa fa-video"></i>
								</span>
							<?php } else { ?>
								<span class="icon-block half bg-grey-200 rounded-circle" title="Meeting is not running">
									<i class="fa fa-video"></i>
								</span>
							<?php } ?>
						</div>

						<div class="media-body">
							<h4><strong><?php echo $row['course']['title']; ?></strong> <small class="text-muted"><?php echo $row['class_name']; ?></small></h4>
							<p class=""><?php echo character_limiter ($row['description'], 250); ?></p>
							<p>
								<?php
								/*
								if ($row['start_date'] > 0) {
									echo 'Start Date: '. date ('d F, Y', $row['start_date']);
									echo ' at  '. date ('h:i A', $row['start_date']);
								}

								if ($row['end_date'] > 0) {
									echo 'End Date: '. date ('d F, Y', $row['end_date']);
									echo ' at  '. date ('h:i A', $row['end_date']);
								}
								*/
								?>
							</p>
							<hr>
							<div class="btn-group">
								<?php
								if ($row['running'] == 'true') {
									echo anchor ('coaching/virtual_class/join_class/'.$coaching_id.'/'.$row['class_id'].'/'.$member_id.'/'.$row['course_id'].'/'.$row['batch_id'], '<i class="fa fa-plus"></i> Start Class', ['class'=>'btn btn-success ']);
								} else {
									echo anchor ('coaching/virtual_class/join_class/'.$coaching_id.'/'.$row['class_id'].'/'.$member_id.'/'.$row['course_id'].'/'.$row['batch_id'], '<i class="fa fa-plus"></i> Start Class', ['class'=>'btn btn-outline-primary ']);
								}
								echo anchor ('coaching/virtual_class/participants/'.$coaching_id.'/'.$row['class_id'].'/'.$row['course_id'].'/'.$row['batch_id'], '<i class="fa fa-users"></i> Participants', ['class'=>'btn btn-outline-info']); 
								//echo anchor ('coaching/virtual_class/recordings/'.$coaching_id.'/'.$row['class_id'].'/'.$row['meeting_id'].'/'.$row['course_id'].'/'.$row['batch_id'], '<i class="fa fa-play"></i> Recordings', ['class'=>'btn btn-outline-dark']); 
								if ($this->session->userdata ('role_id') == USER_ROLE_TEACHER) {
								} else {
									?>
									<a onclick="show_confirm ('Delete this virtual classroom?', '<?php echo site_url ('coaching/virtual_class_actions/delete_class/'.$coaching_id.'/'.$row['class_id'].'/'.$row['course_id'].'/'.$row['batch_id']); ?>')" href="#" class="btn btn-danger ">Delete Classroom</a>
									<?php
								}
								?>
							</div>
						</div>
					</li>
					<?php
					$i++; 
				}

			} else {
				?>
				<li class="list-group-item">
					<span class="text-danger">No classroom created yet</span> <?php //echo anchor ('coaching/virtual_class/create_class/'.$coaching_id, 'Create Class'); ?>
					</td>
				</li>
				<?php
			}
		?> 
		</ul> 
	</div>
</div>
