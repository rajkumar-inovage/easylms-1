<div class="row justify-content-center">
	<div class="col-md-12">
		<div class="card">
			
			<div class="card-body">
				<?php echo form_open('coaching/announcement_action/create/'.$coaching_id.'/'.$announcement_id, array('class'=>'form-horizontal row-border', 'class'=>'validate-form')); ?>		
					<div class="form-group">
						<input type="hidden" class="form-control" name="coaching_id" value="" />
					</div>
					<div class="form-group">
						<?php echo form_label('Title<span class="required">*</span>', '', array('class'=>'control-label')); ?>
						<input type="text" class="form-control required" name="title" value="<?php echo set_value('title', $result['title']); ?>" />
					</div>

					<div class="form-group row">
						<div class="col-md-12 overflow-hidden">
							<?php echo form_label('Description', '', array('class'=>'control-label')); ?>
							<textarea class="form-control required tinyeditor" name="description" placeholder="" rows="6"><?php echo set_value('description', $result['description']); ?></textarea>
						</div>
					</div>

					<div class="form-group row">
						<div class="col-md-6">
							<?php echo form_label('Start Date', '', array('class'=>'control-label')); ?>
							<?php 
								if ($result['start_date'] != '') {
									$start_date = date ('d-m-Y', $result['start_date']);
								} else {
									$start_date = date("d-m-Y");
								}
							?>
							<input type="text" name="start_date" value="<?php echo set_value('start_date', $start_date); ?>" data-date-orientation="bottom" data-date-format="dd-mm-yyyy" class="form-control datepicker" />
						</div>
						<div class="col-md-6">
							<?php echo form_label('End Date', '', array('class'=>'control-label')); ?>
							<?php 
								if ($result['end_date'] != '') {
									$end_date = date ('d-m-Y', $result['end_date']);
								} else {
									$end_date = date("d-m-Y", time ()+86400);
								}
							?>
							<input type="text" name="end_date" value="<?php echo set_value('end_date', $end_date); ?>" data-date-orientation="bottom" data-date-format="dd-mm-yyyy" class="form-control datepicker" />
						</div>
					</div>

					<div class="form-group row d-flex">
						<div class="col-md-6 mt-3">
						  <?php echo form_label('Status', '', array('class'=>'control-label pr-5')); ?>
       					  <div class="custom-control custom-switch pl-4 ml-2">
							  <input type="checkbox" name="status" class="custom-control-input" id="status" value="1" <?php if ($result['status'] == 1 ) echo 'checked';?> checked >
							  <label class="custom-control-label" for="status">Publish </label>
						  </div>

						</div>
						
					</div>					
				</div>

				<div class="card-footer">					
						<input type="submit" name="submit" value="<?php echo ('Save'); ?>" class="btn btn-primary " accesskey="s" />
					</div>
				</form>
			</div>
		</div>
	</div>
</div>