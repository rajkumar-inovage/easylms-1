<div class="row justify-content-center mb-4">
	<div class="col-md-6 ">
		<div class="card shadow-sm">
			<div class="card-body">
				<h4 class="text-primary">ACESSS CODE</h4>
				<?php echo $coaching['reg_no']; ?>
			</div>
		</div>
	</div>

	<div class="col-md-6 mt-2 mt-md-0">
		<div class="card shadow-sm">
			<div class="card-body">
				<h4 class="text-primary">ACESSS URL</h4>
				<?php echo site_url('/?sub='.$coaching['reg_no']); ?>
			</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-6 ">

		<div class="card">
			<?php echo form_open ('coaching/setting_actions/update_account/'.$coaching_id, array('class'=>'form-horizontal row-border', 'id'=>'validate-1')); ?>
				<div class="card-body">
					<h4 class="text-primary">Coaching Details </h4>
					<div class="form-group">
						<label class="control-label">Coaching Name<span class="text-danger">*</span></label>
						<div class="">
							<input type="text" name="coaching_name" class="form-control required" value = "<?php echo set_value('coaching_name', $coaching['coaching_name']) ; ?>">
						</div>
					</div>
					
					<div class="form-group ">					
						<label class="control-label">Address<span class="text-danger">*</span></label>
						<div class="">
							<input type="text" name="address" class="form-control required" value = "<?php echo set_value('address', $coaching['address']) ; ?>">
						</div>
					</div>
					
					<div class="form-group ">					
						<label class="control-label">City<span class="text-danger">*</span></label>
						<div class="">
							<input type="text" name="city" class="form-control required" value = "<?php echo set_value('city', $coaching['city']) ; ?>">
						</div>
					</div> 

					<div class="form-group ">					
						<label class="control-label">State<span class="text-danger">*</span></label>
						<div class="">
							<input type="text" name="state" class="form-control required" value = "<?php echo set_value('state', $coaching['state']) ; ?>">
						</div>
					</div> 

					<div class="form-group ">
						<label class="control-label">PIN Code<span class="text-danger">*</span></label>
						<div class="">
							<input type="text" name="pin" class="form-control required" value = "<?php echo set_value('pin', $coaching['pin']) ; ?>">
						</div>
					</div>

					<div class="form-group ">
						<label class="control-label">Website</label>
						<div class="">
							<input type="text" name="website" class="form-control " value = "<?php echo set_value('website', $coaching['website']) ; ?>">
						</div>
					</div>
				</div>
				
				<div class="card-footer border-top-0 pt-0 bg-transparent">
					<input type="submit" name="submit" value="Save" class="btn btn-primary">
				</div>
			</form>
		</div>

		<div class="card mt-5">
            <div class="card-body">
                <h5 class="card-title">Classrooms</h5>
                <?php if (! empty ($classrooms)) { ?>
	                <div class="">
	                	<?php foreach ($classrooms as $row) { ?>
	                    <div class="d-flex flex-row mb-3 pb-3 border-bottom">
	                        <div class="pl-3">
	                            <a href="#">
	                                <p class="font-weight-medium mb-0"><?php echo $row['title']; ?></p>
	                                <p class="text-muted mb-0 text-small">Created On <?php echo date ('d-m-Y', $row['created_on']); ?></p>
	                            </a>
	                        </div>
	                    </div>
	                	<?php } ?>
	                </div>
                <?php } ?>

                <?php echo anchor ('coaching/settings/classrooms/'.$coaching_id, 'Manage Classrooms', ['class'=>'btn btn-primary ']); ?>
            </div>
        </div>


        <div class="card mt-5">
            <div class="card-body">
                <h5 class="card-title">Custom Messages</h5>
				<?php echo form_open ('coaching/setting_actions/save_custom_text/'.$coaching_id, array('class'=>'validate-form', 'id'=>'')); ?>
	                <div class="form-group">
	                	<label>Login page</label>
						<input type="text" class="form-control" name="custom_text_login" value="<?php echo set_value ('custom_text_login', $settings['custom_text_login']); ?>">
	                </div>
	                <div class="form-group">
	                	<label>Register page</label>
						<input type="text" class="form-control" name="custom_text_register" value="<?php echo set_value ('custom_text_register', $settings['custom_text_register']); ?>">
	                </div>

    	            <input type="submit" class="btn btn-primary" value="Save">
	            </form>
            </div>
        </div>

	</div>

	<div class="col-md-6 mt-3 mt-md-0">
        <div class="card card-primary">
			<div class="card-body">
				<h4 class="text-primary"><i class="fa fa-picture-o"></i> Logo </h4>
				<?php echo form_open_multipart('coaching/setting_actions/upload_logo/'.$coaching_id, array('class'=>'', 'id'=>'upload_image')); ?>
					<div class="form-group text-center">
						<?php if ($is_logo) { ?>
							<img src="<?php echo site_url('public/coaching/data/'.$coaching_id); ?>" alt="Logo" class="img-fluid" />
						<?php } ?>
					</div>
					<div class="form-group">
						<?php if ($is_logo) { ?>
							<?php echo form_label('Change Logo', '', array('class'=>'control-label')); ?>
						<?php } else { ?>
							<?php echo form_label('Upload Logo', '', array('class'=>'control-label')); ?>
						<?php } ?>
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<button class="btn btn-outline-danger default" type="button" data-toggle="tooltip" data-placement="right" title="Click to Remove Logo" onclick="show_confirm ('Are you sure?', '<?php echo site_url('coaching/setting_actions/remove_logo/'.$coaching_id); ?>')"><i class="simple-icon-trash"></i></button>
							</div>
							<div class="custom-file">
								<input type="file" class="custom-file-input" id="userfile" name="userfile" accept="image/*" size="20"/>
								<label class="custom-file-label" for="userfile">Select file to upload...</label>
							</div>
						</div>
						<small class="form-text text-muted">Desired Resolution 220X70 px, Aspect Ratio 22:7</small>
					</div>
					<div class="form-group">
						<input type="submit" name="upload" value="<?php echo ('Upload'); ?>" class="btn btn-info " />
					</div>
				<?php echo form_close(); ?>
			</div>

		</div>

		<div class="card card-primary py-3 my-2">
            <div class="card-body">
				<h4 class="text-primary">User Account Settings </h4>
				<?php echo form_open ('coaching/setting_actions/user_account/'.$coaching_id, array('class'=>'validate-form', 'id'=>'')); ?>				
					<div class="form-group">
						<div class="d-flex">
							<div class="flex-shrink-1 my-auto">
								<div class="custom-switch custom-switch-primary">
									<input class="custom-switch-input" id="approve_students" type="checkbox" name="approve_student" value="1" <?php if ($settings['approve_student'] == 1 ) echo 'checked';?> />
									<label class="custom-switch-btn" for="approve_students"></label>
								</div>
							</div>
							<div class="flex-gorw-1 pl-2 my-auto">
								<label for="approve_students" class="mb-0">Auto Approve New Students</label>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="d-flex">
							<div class="flex-shrink-1 my-auto">
								<div class="custom-switch custom-switch-primary">
									<input class="custom-switch-input" id="approve_teachers" type="checkbox" name="approve_teacher" value="1" <?php if ($settings['approve_teacher'] == 1 ) echo 'checked';?> />
									<label class="custom-switch-btn" for="approve_teachers"></label>
								</div>
							</div>
							<div class="flex-gorw-1 pl-2 my-auto">
								<label for="approve_teachers" class="mb-0">Auto Approve New Teachers</label>
							</div>
						</div>
					</div>
					<div class="form-group mt-4">
						<input type="submit" name="save" value="Save" class="btn btn-primary " />
					</div>

				</form>	
			</div>
		</div>

		<div class="card mt-5">
            <div class="card-body">
                <h5 class="card-title">EULA </h5>
				<?php echo form_open ('coaching/setting_actions/save_eula/'.$coaching_id, array('class'=>'validate-form', 'id'=>'')); ?>
	                <div class="form-group">
						<textarea class="tinyeditor" name="eula_text"><?php echo set_value ('eula_text', $settings['eula_text']); ?></textarea>
	                </div>

    	            <input type="submit" class="btn btn-primary">
	            </form>
            </div>
        </div>

	</div>

</div><!-- // row -->

