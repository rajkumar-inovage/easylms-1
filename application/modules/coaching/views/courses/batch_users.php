<?php 
if ($add_users > 0) {
	echo form_open ('coaching/enrolment_actions/add_users_to_batch/'.$coaching_id.'/'.$course_id.'/'.$batch_id, array ('id'=>'validate-1')); 
} else {
	echo form_open ('coaching/enrolment_actions/remove_batch_users/'.$coaching_id.'/'.$course_id.'/'.$batch_id, array ('id'=>'validate-1', 'class' => 'row'));
}
?>
	<div class="col-12 ">
		<?php if ($is_admin): ?>
			<?php if ($add_users > 0) { ?>
				<div class="btn-group mb-2">
					<div class="btn btn-primary btn-lg pl-4 pr-0 check-button">
						<label class="custom-control custom-checkbox mb-0 d-inline-block">
							<input type="checkbox" class="custom-control-input" id="checkAll">
							<span class="custom-control-label">&nbsp;</span>
						</label>
					</div>
					<input type="submit" value="Add Users" class="btn btn-primary" /> 
				</div>
			<?php } else if (! empty($result)) { ?>
				<div class="btn-group mb-2">
					<div class="btn btn-danger btn-lg pl-4 pr-0 check-button">
						<label class="custom-control custom-checkbox mb-0 d-inline-block">
							<input type="checkbox" class="custom-control-input" id="checkAll">
							<span class="custom-control-label">&nbsp;</span>
						</label>
					</div>
					<input type="submit" value="Remove" class="btn btn-danger" /> 
        		</div>
			<?php } ?>
		<?php endif; ?>
	</div>
    <div class="col-12 list" data-check-all="checkAll">        
		<?php
		$i = 1;
		if (! empty($result)) {
			foreach ($result as $item) {
				?>
				<div class="card d-flex flex-row mb-0">
		            <div class="d-flex flex-grow-1 min-width-zero">
						<?php if($is_admin): ?>
			                <label class="custom-control custom-checkbox mb-1 align-self-center ml-4">
			                    <input type="checkbox"  name="users[]" value="<?php echo $item['member_id']; ?>" class="custom-control-input">
			                    <span class="custom-control-label">&nbsp;</span>
			                </label>
						<?php endif; ?>
		                <div class="card-body align-self-center d-flex flex-column flex-md-row justify-content-between min-width-zero align-items-md-center">
		                    <p class="mb-0 text-muted text-small w-15 w-xs-100 d-none"><?php echo $i; ?>.</p>
		                    <p class="list-item-heading mb-0 truncate w-40 w-xs-100" >
		                        <?php echo $item["first_name"].' '.$item["last_name"];?><br>
								<?php echo $item["adm_no"]; ?>
		                    </p>
		                    <?php if ($add_users == 0) { ?>
			                    <p class="mb-0 text-muted text-small w-15 w-xs-100">
			                    	<?php echo date ('d M, Y', $item ["enroled_on"]); ?>
			                    </p>
			                    <div class="w-15 w-xs-100">
			                    	<?php 
			                    		$progress = $item['progress'];
                                        if ($progress['total_pages'] > 0) {
                                            $cp_percent = ($progress['total_progress']/$progress['total_pages']) * 100;
                                        } else {
                                            $cp_percent = 0;
                                        }
			                    	?>
			                        <p class="mb-2">
			                            <span>Completed</span>
			                            <span class="float-right text-muted"><?php echo $progress['total_progress']; ?>/<?php echo $progress['total_pages']; ?></span>
			                        </p>
			                        <div class="progress">
			                            <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo $cp_percent; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $cp_percent; ?>%;"></div>
			                        </div>
			                    </div>
		                    <?php } else { ?>
			                    <div class="w-15 w-xs-100"><?php echo $item['description']; ?></div>
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
				<?php if($add_users > 0): ?>
				<?php else: ?>
				<?php echo ($is_admin)? anchor ('coaching/enrolments/batch_users/'.$coaching_id.'/'.$course_id.'/'.$batch_id.'/'.USER_ROLE_STUDENT, 'Add Users') : ''; ?>
				<?php endif; ?>
			</div>
			<?php
		}
		?>
	</div>
</div>
<?php echo form_close(); ?>