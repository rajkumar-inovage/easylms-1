<div class="row">
	<div class="col-md-9">
		<div class="card">
			<?php echo form_open ('student/user_actions/my_account/'.$coaching_id.'/'.$member_id, array ('class'=>'form-horizontal', 'id'=>'validate-1')); ?>
				
				<input type="hidden" name="user_role" value="<?php echo $result['role_id']; ?>" >
			
				<div class="card-body ">
				
					<div class="form-group row">
						<div class="col-md-6">
							<label class="form-label"><?php echo 'Role'; ?>	</label>
							<p class="form-control-static "><?php echo $roles['description']; ?></p>
						</div>

						<div class="col-md-6">
							<label class="form-label"><?php echo 'Batch Details'; ?>	</label>
							<p class="form-control-static ">
								<?php
								if (! empty ($batches)) {
									foreach ($batches as $batch) {
										//echo $batch['batch_name'];
									}
								}
								?>
							</p>
						</div>
					</div>
					
					<div class="form-group row">
						<div class="col-md-6">
							<?php echo form_label('User Id <span class="text-danger">*</span>', '', array('class'=>'', 'for' =>"adm_no"));?>			
							<?php 
							$option = array('name'=>'adm_no','class'=>'form-control', 'readonly'=>'true','id'=>'adm_no','value'=>set_value('adm_no', $result['adm_no']));
							echo form_input($option);
							?>	
						</div>
						
						<div class="col-md-6">							
							<?php echo form_label('Serial No', '', array('class'=>'', 'for' =>"sr_no")); ?>
							<?php echo form_input(array('name'=>'sr_no', 'class'=>'form-control', 'id'=>'sr_no', 'value'=>set_value('sr_no', $result['sr_no']), 'readonly'=>true));?>
						</div>
					</div>
					
					<div class="form-group row">
					    
						<div class="col-md-4">
							<?php echo form_label('Name <span class="text-danger">*</span>', '', array('class'=>'', 'for' =>"name")); ?>
							<input name='first_name' class="form-control required " placeholder="First name" type="text" value="<?php echo set_value('first_name', $result['first_name']);?>">
						</div>
						<div class="col-md-4">
							<?php echo form_label('&nbsp;', '', array('class'=>'', 'for' =>"name")); ?>
							<input name='second_name' class="form-control" placeholder="Middle name" type="text" value="<?php echo set_value('second_name', $result['second_name']);?>">
						</div>
						<div class="col-md-4">
							<?php echo form_label('&nbsp;', '', array('class'=>'', 'for' =>"name")); ?>
					    <input name='last_name' class="form-control required " placeholder="Last name" type="text" value="<?php echo set_value('last_name', $result['last_name']);?>">
						</div>
					
					</div>					
					
					<div class="form-group row">
						<div class="col-md-6">
							<?php echo form_label('Contact No<span class="text-danger">*</span>', '', array('class'=>'')); ?>															  
							<?php echo form_input(array('name'=>'primary_contact', 'class'=>'form-control digits ', 'value'=>set_value('primary_contact', $result['primary_contact']) ));?>
						</div>

						<div class="col-md-6">
							<?php echo form_label('E-mail', '', array('class'=>'', 'for' =>"email")); ?>
							<?php
							  echo form_input(array('name'=>'email', 'class'=>'form-control', 'value'=>set_value('email', $result['email']), 'id'=>'email')); 
							?>
						</div>
						
					</div>

					<div class="form-group row">
						<div class="col-md-6">
							<?php echo form_label('Date Of Birth', '', array('class'=>'')); ?>
							<?php  
							if ($result['dob'] != '' ) {
								$dob = date('d-m-Y', strtotime($result["dob"]));
							} else {
								$dob = date('d-m-Y');
							}
							echo form_input(array('type'=>'text', 'name'=>'dob', 'data-date-end-date'=>'0d', 'data-date-format'=> 'dd-mm-yyyy', 'class'=>'form-control datepicker', 'value'=>set_value('dob', $dob)));
							?>
						</div>

						<div class="col-md-6">
							<?php echo form_label('Gender', '', array('class'=>'')); ?>
							<?php
								$status_none = false;
								$status_male = false;
								$status_female = false;
								if ($result['gender'] == 'm')
									$status_male = true;
								else if ($result['gender'] == 'f')
									$status_female = true;
								else
									$status_none = true;
							?> 
							<div class="d-block">
								<div class="btn-group-toggle gender-toggle" data-toggle="buttons">
									<label class="btn position-relative btn-light default p-1 mb-1<?php echo ($status_male)?" active":""; ?>"><?php echo form_radio(array('name'=>'gender', 'value'=>'m', 'checked'=>$status_male, 'class'=>'')); ?><i class="iconsminds-male pr-2"></i><?php echo ('Male'); ?></label>
									<label class="btn position-relative btn-light default p-1 mb-1<?php echo ($status_female)?" active":""; ?>"><?php echo form_radio(array('name'=>'gender', 'value'=>'f', 'checked'=>$status_female, 'class'=>'radio-primary form-check-input')); ?><i class="iconsminds-female pr-2"></i><?php echo ('Female'); ?></label>
									<label class="btn position-relative btn-light default p-1 mb-1<?php echo ($status_none)?" active":""; ?>"><?php echo form_radio(array('name'=>'gender', 'value'=>'n', 'checked'=>$status_none, 'class'=>'radio-primary form-check-input')); ?><i class="iconsminds-woman-man pr-2"></i><?php echo ('Not Specified'); ?></label>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="card-footer">
					<div class="btn-toolbar">
						<?php
						echo form_submit ( array ('name'=>'submit', 'value'=>'Save ', 'class'=>'btn btn-primary')); 
						?>
					</div>	
				</div>
			<?php echo form_close(); ?>
		</div>
	</div>
	<div class="col-md-3">
		<div class="card">
			<div class="card-body">
				<div class="text-center">
					<img alt="Profile" src="<?php echo base_url($profile_image); ?>" class="img-thumbnail border-0 rounded-circle mb-4 border" width="200">
					<h4 class="list-item-heading mb-1"><?php echo $result['first_name'].' '.$result['last_name']; ?></h4>
					<button type="button" class="btn btn-sm btn-outline-info" data-toggle="modal" data-target="#add_image"><i class="fa fa-edit"></i> Edit</button>
				</div>
			</div>
		</div>
	</div>
</div>



<!-- Add Image -->
<div class="modal" tabindex="-1" role="dialog" id="add_image">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
	  <?php echo form_open_multipart ('student/user_actions/upload_profile_picture/'.$member_id.'/'.$coaching_id, array ('class'=>'form-horizontal row-border', 'id'=>'upload_image')); ?>
            <div class="modal-header">
                <h5 class="modal-title">Profile Image</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
			<div class="modal-body">
				<div class="form-row">
					<div class="form-group col-12">
						<div id="profile_messages"></div>
						<div id="image_preview" class="text-center">
								<img src="<?php echo base_url ($profile_image); ?>" alt="Profile Image" class="img-fluid rounded-circle" />
						</div>
						<?php echo form_label('Upload Image', '', array('class'=>'control-label')); ?>
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<button class="btn btn-outline-danger default" id="remove_image" type="button" data-toggle="tooltip" data-placement="right" title="Click to Remove Image" onclick="show_confirm ('Remove this image?', '<?php echo site_url('student/user_actions/remove_profile_image/'.$member_id.'/'.$coaching_id); ?>')"><i class="simple-icon-trash"></i></button>
							</div>
							<div class="custom-file">
								<input type="file" class="custom-file-input required" id="userfile" name="userfile" accept="image/*" data-style="fileinput" data-inputsize="medium" />
								<label class="custom-file-label" for="userfile">Select file to upload...</label>
							</div>
						</div>
						<small class="form-text text-muted">Images only (image/*)</small>
					</div>
				</div>
			</div>
			
			<div class="modal-footer">
				<div class="btn-toolbar">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<input type="submit" name="submit" value="<?php echo ('Upload'); ?>" class="btn btn-primary pull-right" />
				</div>
			</div>
		<?php echo form_close (); ?>
	</div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->