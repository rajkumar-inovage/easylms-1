<div class="row">
	<div class="col-12 list" >
	<?php
	$i = 1;
	if (!empty($results)) {
		foreach ($results as $row) {		
			?>
			<div class="card d-flex flex-row mb-3">
	          	<div class="d-flex flex-grow-1 min-width-zero">
	              	<div class="card-body align-self-center d-flex flex-column flex-md-row justify-content-between min-width-zero align-items-md-center">
	                  	<a class="list-item-heading mb-0 w-40 w-xs-100 mt-0" href="<?php echo site_url ('coaching/announcements/view_announcement/'.$coaching_id.'/'.$row['announcement_id']); ?>">
	                      <div class="d-flex">
	                        <span class="mr-2"><?php echo $i; ?>.</span>
	                        <div class="flex-grow-1 my-auto truncate">
	                        	<?php echo $row['title']; ?>
			                    <div class="text-muted text-small">
			                        <?php
										$description = strip_tags ($row['description']);
										$description = character_limiter ($description, 100);
										echo $description;
									?>
			                    </div>
			                </div>
			              </div>
			          	</a>
					    <p class="mb-0 text-muted text-small w-15 w-xs-100">
							From <br>
							<?php echo date('d M, Y', $row['start_date']); ?>
						</p>
						<p class="mb-0 text-muted text-small w-15 w-xs-100">
							To <br>
							<?php echo date('d M, Y', $row['end_date']); ?>
						</p>
	                  	<div class="w-15 w-xs-100">
	                  		<div class="btn-group">
								<a href="<?php echo site_url ('coaching/announcements/create_announcement/'.$coaching_id.'/'.$row['announcement_id']); ?>" class="btn btn-outline-primary" data-toggle="tooltip" data-placement="top" title="Edit">
									<i class="iconsminds-pen"></i>
								</a>
								<a href="javascript:void(0)" class="btn btn-outline-info d-none" data-toggle="tooltip" data-placement="top" title="Send Notification">
									<i class="iconsminds-bell"></i>
								</a>
								<a href="javascript:void(0)" class="btn btn-outline-danger"  data-toggle="tooltip" data-placement="top" title="Delete Notification" onclick="show_confirm ('<?php echo 'Are you sure want to delete this announcement?'; ?>', '<?php echo site_url('coaching/announcement_action/delete/' . $coaching_id . '/' . $row['announcement_id']); ?>' )">
									<i class="simple-icon-trash"></i>
								</a>
	                  		</div>
							
						</div>
			      	</div>
			  	</div>
			</div>		
			<?php
			$i++;
			}
		} else {
			?>
			<div class="list-group-item text-danger">No announcements</div>
			<?php
		}
		?>
	</div>
</div>