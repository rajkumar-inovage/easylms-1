<div class="row justify-content-center">
	<div class="col-md-8">
		<div class="card">
			<?php echo form_open_multipart ('coaching/user_actions/import_from_csv/'.$coaching_id.'/'.$role_id, array ('class'=>'form-horizontal', 'id'=>'validate-1') ); ?>
                <div class="card-body">
                	<div class="form-row">
                		<div class="form-group col-md-3 mb-4">
                			<label class="control-label">Select Role</label>
							<select name="role" class="form-control select2-single" id="search-role">
								<?php foreach ($roles as $role) { ?>
									<option value="<?php echo $role['role_id']; ?>" <?php if ($role_id ==$role['role_id']) echo 'selected="selected"'; ?> ><?php echo $role['description']; ?></option>
								<?php } ?>
							</select>
						</div>
						<div class="form-group col-md-12 mb-4">
							<div class="custom-file">
								<input type="file" name="userfile" size="20" id="userfile" class="custom-file-input" accept=".csv" />
								<label class="custom-file-label" for="userfile">Browse CSV File</label>
							</div>
							<p class="text-muted mb-0">.csv files only</p>
						</div> 
                	</div>

					<div class="alert alert-info mb-0" role="alert">
						<span><i class="fa fa-exclamation"></i></span> Upload students list in given format. Contact No., First Name and Last Name should not be left blank.
					</div>
				</div>
				<div class="card-footer d-flex justify-content-between">
					<input type="submit" id="" class="btn btn-primary" value="Import" data-toggle="tooltip" data-placement="right" title="Click to Start Import" />
					<a href="<?php echo site_url ('coaching/users/download_file')?>" class="btn btn-outline-secondary" data-toggle="tooltip" data-placement="left" title="Download Sample File"><i class="fa fa-file-csv"></i> Sample File</a> 
				</div>
			<?php echo form_close (); ?>
		</div>
	</div>
</div>