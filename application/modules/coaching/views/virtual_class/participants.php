 <div class="card ">
	<div class="card-body">
		<div class="row">
			<div class="col-md-3 mb-2">
				<dt>Class Name</dt>
				<dd><?php echo $class['class_name']; ?></dd>
			</div>
			<div class="col-md-3 mb-2">
				<dt>Category</dt>
				<dd><?php if (isset ($class['title'])) echo $class['title']; else echo 'Uncategorized'; ?></dd>
			</div>
			<div class="col-md-3 mb-2">
				<dt>Participants</dt>
				<dd><?php echo $num_participants; ?></dd>
			</div>
		</div>
	</div>
</div>

<div class="row justify-content-center">

	<div class="col-md-12">
		<div class="card mb-2">
			<?php echo form_open ('coaching/virtual_class_actions/participant_actions/'.$coaching_id.'/'.$class_id.'/'.$course_id.'/'.$batch_id, ['id'=>'validate-1']); ?>
				<table class="table">
					<thead>
						<tr>
							<th width="10"><input id="checkAll" type="checkbox" onchange="check_all()"></th>
							<th width="25%">User Name/ID</th>
							<th class="d-none d-sm-table-cell">Email</th>
							<th>Role</th>
							<th class="d-none d-sm-table-cell">Link</th>
						</tr>
					</thead>
					<tbody>
					<?php
					$i = 1;
					if (! empty ($participants)) {
						foreach ($participants as $user) {
							$meeting_url = $user['meeting_url'];
							$api_join_url = $api_setting['join_url'];
							$join_url = $api_join_url . $meeting_url;
							$full_name = $user['first_name'].' '.$user['last_name'];
							?>
							<tr>
								<td><input type="checkbox" name="users[]" value="<?php echo $user['member_id']; ?>" class="checks"></td>
								<td>
									<?php echo $user['first_name'].' '.$user['last_name']; ?><br>
									<?php echo $user['adm_no']; ?>									
								</td>
								<td class="d-none d-sm-table-cell"><?php echo $user['email']; ?></td>
								<td>
									<?php 
									if ($user['role'] == VM_PARTICIPANT_MODERATOR) 
										echo 'Moderator'; 
									else 
										echo 'Attendee';
									?>

									<?php /*if ($user['member_id'] == $this->session->userdata ('member_id')) { ?>
										<a href="<?php echo site_url ('coaching/virtual_class/join_class/'.$coaching_id.'/'.$class_id.'/'.$user['member_id']); ?>" class='btn btn-primary mr-1' target="_blank"><i class="fa fa-plus"></i> Join</a>
									<?php } */ ?>
								</td>
								<td>
									<input type="text" name="" id="join_url<?php echo $i; ?>" value="<?php echo $join_url; ?>" readonly="true" class="w-100 form-control">
									<a onclick="copy_text('join_url<?php echo $i; ?>')" class="text-small text-info">Copy </a>
								</td>
							</tr>
							<?php
							$i++;
						}
					} else {
						?>
						<tr>
							<td colspan="4"><span class="text-danger">No users found</span></td>
						</tr>
						<?php
					}
					?> 
					</tbody>
				</table>

				<div class="card-footer">
					<select class="w-15 w-xs-100 form-control mb-2" name="action">
						<option value="0">Select an action</option>
						<option value="send_sms">Send joining link through SMS</option>
						<option value="remove">Remove participants</option>
					</select>

					<input type="submit" name="" value="Submit" class="btn btn-primary">
					
					<?php echo anchor ('coaching/virtual_class/add_participants/'.$coaching_id.'/'.$class_id.'/'.$course_id.'/'.$batch_id, 'Add Participants', ['class'=>'btn btn-link']); ?>
				</div>
			</form>
		</div>
	</div>	

</div>