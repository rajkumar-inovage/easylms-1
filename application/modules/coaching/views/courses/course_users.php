 <div class="row">
    <div class="col-12 list" data-check-all="checkAll">        
		<?php 
		if ($add_users > 0) {
			echo form_open ('coaching/enrolment_actions/add_users_to_batch/'.$coaching_id.'/'.$course_id.'/'.$batch_id, array ('id'=>'validate-1')); 
		} else {
			echo form_open ('coaching/enrolment_actions/remove_batch_users/'.$coaching_id.'/'.$course_id.'/'.$batch_id, array ('id'=>'validate-1'));
		}
		?>
		
		<?php
		$i = 1;
		if (! empty($result)) {
			foreach ($result as $item) {
				?>
				<div class="card d-flex flex-row mb-0">
		            <div class="d-flex flex-grow-1 min-width-zero">
		                <label class="custom-control custom-checkbox mb-1 align-self-center pl-4">
			                <span class="mb-0 text-muted text-small "><?php echo $i; ?>.</span>
		                </label>

		                <div class="card-body align-self-center d-flex flex-column flex-md-row justify-content-between min-width-zero align-items-md-center">
		                    <div class="list-item-heading mb-0 truncate w-40 w-xs-100" >
			                        <?php echo $item["first_name"].' '.$item["last_name"];?><br>
									<?php echo $item["adm_no"]; ?>
		                    </div>
		                    <?php if ($add_users == 0) { ?>
			                    <p class="mb-0 text-muted text-small w-15 w-xs-100">
			                    	Joined
			                    	<?php echo date ('d M, Y', $item ["enroled_on"]); ?>
			                    </p>
			                    <div class="w-15 w-xs-100">
			                    	<?php 
			                    		$progress = $item['progress'];
			                    		$total_pages = $progress['total_pages'];
			                    		$total_progress = $progress['total_progress'];
			                    	?>
			                        <div class="mb-4">
		                                <p class="mb-2">Progress
		                                    <span class="float-right text-muted">
		                                    	<?php echo $total_progress; ?>/<?php echo $total_pages; ?>
		                                    </span>
		                                </p>
		                                <div class="progress">
		                                    <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo $total_progress; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $total_progress; ?>%;"></div>
		                                </div>
		                            </div>
			                    </div>
		                    <?php } ?>
		                </div>
			        </div>
		        </div>
				<?php 
				$i++;
			}
		} else { 
			?>
			<div class="alert alert-danger">
				<span  class="">No users in this batch.</span> 
				<?php echo ($is_admin)? anchor ('coaching/enrolments/batch_users/'.$coaching_id.'/'.$course_id.'/'.$batch_id.'/'.USER_ROLE_STUDENT, 'Enroll Users') : ''; ?>
				<?php if ($is_admin): ?><?php else: ?><?php endif; ?>
			</div>
			<?php
		}
		?>

		<?php if($is_admin): ?>
			<div class="mt-4 d-flex justify-content-between">
				<?php echo ($is_admin)? anchor ('coaching/enrolments/batch_users/'.$coaching_id.'/'.$course_id.'/'.$batch_id.'/'.USER_ROLE_STUDENT, 'Add Users', array('class'=>'btn btn-primary')) : ''; ?>
				<?php if ($add_users > 0) { ?>
					<input type="submit" value="Add Users" class="btn btn-primary"> 
				<?php } else { ?>
				<?php } ?>
			</div>
		<?php endif; ?>
		</form>

	</div>
</div>