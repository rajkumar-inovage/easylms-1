<?php echo form_open('coaching/user_actions/confirm/'.$coaching_id.'/'.$role_id.'/'.$status, array('class'=>'form-horizontal row-border', 'id'=>'validate-1') ); ?>
	<div class="row">
		<div class="col-12 list" data-check-all="checkAll" id="users-list">
			<?php $this->load->view ('users/inc/index', $data); ?>
		</div>
	</div>
	<div>
		<div class="row my-3">
			<div class="col-12 text-right">
				<div class="btn-group" role="group" aria-label="Basic example">
					<input type="submit" name="Submit" value="Change" class="btn btn-primary"/>
					<select name="action" class="custom-select pr-4 w-auto">
						<option value="0">---With Selected---</option>
						<option value="delete">Delete</option>
						<option value="enable">Enable Account</option>
						<option value="disable">Disable Account</option>
					</select>
					<div class="btn btn-primary btn-lg pl-4 pr-0 check-button">
						<label class="custom-control custom-checkbox mb-0 d-inline-block">
							<input type="checkbox" class="custom-control-input" id="checkAll">
							<span class="custom-control-label">&nbsp;</span>
						</label>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php echo form_close(); ?>