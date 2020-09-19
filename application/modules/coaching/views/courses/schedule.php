<style>
.modal .select2-container{
	width: 100% !important;
}
</style>
<div class="card">
	<div class="card-body">
		<div class="form-group">
			<label class="form-label font-weight-bold">Title</label>
			<p class="form-control-static"><?php echo $batch['batch_name']; ?></p>
		</div>

		<div class="form-group row">
			<div class="col-md-6">
				<?php 
				if ($batch['start_date'] > 0) {
					$sd = date ('d M, Y', $batch['start_date']); 
				} else {
					$sd = '--/--';
				}
				?>
				<label class="form-label font-weight-bold">Start Date</label>
				<div class="form-control-static"><?php echo $sd; ?></div>
			</div>
			<div class="col-md-6">
				<?php
				if ($batch['end_date'] > 0) {
					$ed = date ('d M, Y', $batch['end_date']); 
				} else {
					$ed = '--/--';
				}
				?>
				<label class="form-label font-weight-bold">End Date</label>
				<div class="form-control-static"><?php echo $ed; ?></div>
			</div>
		</div>

	</div>
</div>

<div class="card">
	<div class="table-responsive">
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>Date</th>
					<?php
					$count = 0;
					$next = 0;
					$back = 0;
					for ($i=$start_date; $i<=$end_date; $i=$i+$interval) { 
						?>
						<th><?php echo date ('D, d M y', $i); ?></th>
						<?php 
						$count++;
						if ($count <= 1) {
							$back = $i - (7 * $interval);
						}
						if ($count >= 7) {
							$next = $i + $interval;
							break;
						}
					}
					?>
				</tr>
			</thead>
			<tbody>
				
				<tr>
					<th valign="middle">Timing</th>
					<?php
					unset ($i);
					$count = 0;
					for ($i=$start_date; $i<=$end_date; $i=$i+$interval) { 
						?>
						<td align="center">
							<?php 
							$scd = $schedule[$i]['scd'];
							$vc = $schedule[$i]['vc'];
							if (! empty ($scd)) {
								foreach ($scd as $row) {
									?>
									<div><?php echo $row['start_time']; ?>-<?php echo $row['end_time']; ?></div>
									<div><?php echo $row['name']; ?></div>
									<div><?php echo $row['room_name']; ?></div>
									<hr>
									<?php
								}
							}
							if (! empty ($vc)) {
								foreach ($vc as $row) {
									?>
									<div><?php echo $row['class_name']; ?></div>
									<div class="text-small text-muted"><?php echo date ('d-m-Y', $row['start_date']); ?></div>
									<div class="text-small text-muted">at <?php echo date ('H:I a', $row['start_date']); ?></div>
									<div class="mt-2">
										<span class="badge badge-primary">Virtual Classroom</span>
									</div>
									<?php
								}
							}
							?>
								
						</td>
						<?php 
						$count++;
						if ($count >= 7) {
							break;
						}
					}
					?>
				</tr>
			</tbody>
		</table>
	</div>
	<div class="card-body">
	</div>
	<div class="card-footer d-flex justify-content-between">
		<div>
			<button type="button" class="btn btn-outline-primary" data-toggle="modal" data-backdrop="static" data-target="#addSchedule">Add Schedule</button>
			<button type="button" class="btn btn-outline-info d-none" data-toggle="modal" data-backdrop="static" data-target="#addClassroom">Add Virtual Classroom</button>
		</div>
		<div class="align-item-center">
			<?php 
			if ($back < $batch['start_date'] ) {
				//echo anchor ('coaching/enrolments/schedule/'.$coaching_id.'/'.$course_id.'/'.$batch_id.'/'.$back, '<i class="fa fa-arrow-left"></i> Back', ['class'=>'btn btn-link ']);
			}
			if ($next < $batch['end_date']  ) {
				echo anchor ('coaching/enrolments/schedule/'.$coaching_id.'/'.$course_id.'/'.$batch_id.'/'.$next, 'Next <i class="fa fa-arrow-right"></i>', ['class'=>'btn btn-link ']);
			}
			?>
		</div>
	</div>
</div>


<!-- Add Schedule Modal -->
<div class="modal fade modal-right" id="addSchedule" tabindex="-1" role="dialog" aria-labelledby="addSchedule" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
			<?php echo form_open ('coaching/enrolment_actions/add_schedule/'.$coaching_id.'/'.$course_id.'/'.$batch_id, ['id'=>'validate-1']); ?>
	            <div class="modal-header">
	                <h5 class="modal-title">Add Schedule</h5>
	                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	                    <span aria-hidden="true">&times;</span>
	                </button>
	            </div>
	            <div class="modal-body">
					<div class="form-group">
						<label class="form-label">Instructors</label>
						<select class="form-control select2-single" name="instructor">
							<?php
							if (! empty ($instructors)) {
								foreach ($instructors as $row) {
									$name = $row['first_name'] . ' ' . $row['last_name'];
									?>
									<option value="<?php echo $row['member_id']; ?>"><?php echo $name; ?></option>
									<?php
								}
							}
							?>
						</select>
					</div>

					<div class="form-group">
						<label class="form-label">Classrooms</label>
						<select class="form-control select2-single" name="classroom">
							<?php
							if (! empty ($classrooms)) {
								foreach ($classrooms as $row) {
									?>
									<option value="<?php echo $row['id']; ?>"><?php echo $row['title']; ?></option>
									<?php
								}
							}
							?>
						</select>
					</div>					

					<div class="form-group row">
					  <div class="col-md-6">
						<?php echo form_label('Start Time', '', array('class'=>'control-label')); ?>
							<?php 
							$start_time = date ("H:00");
							?>
							<?php echo form_input ( array('name'=>'start_time', 'class'=>'form-control', 'value'=>set_value('start_time', $start_time), 'type'=>'time') );?>   
					  </div>
					  <div class="col-md-6">
						<?php echo form_label('End Time', '', array('class'=>'control-label')); ?>
							<?php
							$end_time = "00:00";
							$end_time = date ("H:00");
							?>
							<?php echo form_input ( array('name'=>'end_time', 'class'=>'form-control', 'value'=>set_value ('end_time', $end_time), 'type'=>'time') );?>
					  </div>
					</div>

					<div class="form-group">
						<h4>Repeat</h4>
						<div class="custom-control custom-radio">
							<input type="radio" name="repeat" id="repeat-daily" value="<?php echo SCHEDULE_REPEAT_DAILY; ?>" class="custom-control-input" checked />
							<label class="custom-control-label" for="repeat-daily">Repeat Daily</label>
						</div>

						<div class="custom-control custom-radio">
							<input type="radio" name="repeat" id="repeat-weekly" value="<?php echo SCHEDULE_REPEAT_WEEKLY; ?>" class="custom-control-input" />
							<label class="custom-control-label" for="repeat-weekly">Repeat Weekly</label>
						</div>
						<div class="ml-3">
							<div class="custom-control custom-checkbox custom-control-inline">
								<input type="checkbox" name="dow[]" value="1" id="monday" class="custom-control-input repeat-w"/>
							  <label class="custom-control-label" for="monday">Monday</label>
							</div>
							<div class="custom-control custom-checkbox custom-control-inline">
								<input type="checkbox" name="dow[]" value="2" id="tuesday" class="custom-control-input repeat-w"/>
							  <label class="custom-control-label" for="tuesday">Tuesday</label>
							</div>
							<div class="custom-control custom-checkbox custom-control-inline">
								<input type="checkbox" name="dow[]" value="3" id="wednesday" class="custom-control-input repeat-w"/>
							  <label class="custom-control-label" for="wednesday">Wednesday</label>
							</div>
							<div class="custom-control custom-checkbox custom-control-inline">
								<input type="checkbox" name="dow[]" value="4" id="thursday" class="custom-control-input repeat-w"/>
							  <label class="custom-control-label" for="thursday">Thursday</label>
							</div>
							<div class="custom-control custom-checkbox custom-control-inline">
								<input type="checkbox" name="dow[]" value="5" id="friday" class="custom-control-input repeat-w"/>
							  <label class="custom-control-label" for="friday">Friday</label>
							</div>
							<div class="custom-control custom-checkbox custom-control-inline">
								<input type="checkbox" name="dow[]" value="6" id="saturday" class="custom-control-input repeat-w"/>
							  <label class="custom-control-label" for="saturday">Saturday</label>
							</div>
							<div class="custom-control custom-checkbox custom-control-inline">
								<input type="checkbox" name="dow[]" value="7" id="sunday" class="custom-control-input repeat-w"/>
							  <label class="custom-control-label" for="sunday">Sunday</label>
							</div>
						</div>
					</div>

					<div class="form-group row">
					  <div class="col-md-6">
						<?php echo form_label('Start repeat from', '', array('class'=>'control-label')); ?>
						<?php 
							$repeat_start = date ('d-m-Y', $start_date);
						?>
						<input type="text" name="repeat_start" class="form-control datepicker" value="<?php echo $repeat_start; ?>" data-date-format="dd-mm-yyyy" data-date-start-date="<?php echo date ('d-m-Y', $batch['start_date']); ?>" data-date-end-date="<?php echo date ('d-m-Y', $batch['end_date']); ?>">
					  </div>
					  <div class="col-md-6">
						<?php echo form_label('End repeat on', '', array('class'=>'control-label')); ?>
						<?php 
							$repeat_end = date ('d-m-Y', $end_date);
						?>
						<input type="text" name="repeat_end" class="form-control datepicker" value="<?php echo $repeat_end; ?>" data-date-format="dd-mm-yyyy" data-date-start-date="<?php echo date ('d-m-Y', $batch['start_date']); ?>" data-date-end-date="<?php echo date ('d-m-Y', $batch['end_date']); ?>">
					  </div>
					</div>
			
            	</div>
	
	            <div class="modal-footer">
	                <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cancel</button>
	                <button type="submit" class="btn btn-primary">Submit</button>
	            </div>
	        </form>
        </div>
    </div>
</div>

<!-- Add Virtual Classroom -->
<div class="modal fade modal-right" id="addClassroom" tabindex="-1" role="dialog" aria-labelledby="addSchedule" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
			<?php echo form_open('coaching/virtual_class_actions/create_classroom/'.$coaching_id.'/0/'.$course_id.'/'.$batch_id.'?page=schedule', array('class'=>'form-horizontal row-border', 'class'=>'validate-form')); ?>

				<div class="modal-header">
	                <h5 class="modal-title">Add Virtual Class</h5>
	                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	                    <span aria-hidden="true">&times;</span>
	                </button>
	            </div>
				
	            <div class="modal-body">
					<div class="form-group ">
						<?php echo form_label('Classroom Name<span class="required">*</span>', '', array('class'=>'control-label')); ?>
						<input type="text" class="form-control required" name="class_name" value="<?php echo set_value('class_name', $class['class_name']); ?>" />
					</div>					
					
					<div class="form-group row ">
						<?php
							if ($class['start_date']) {
								$class_start_date = date ('d-m-Y', $class['start_date']);
							} else {
								$class_start_date = date ('d-m-Y', $start_date);
							}
						?>
						<div class="col-md-6">
							<label class="control-label">
								Class start on
							</label>
							<input type="text" class="form-control required datepicker" name="start_date" value="<?php echo $class_start_date; ?>" data-date-format="dd-mm-yyyy" data-date-start-date="<?php echo date ('d-m-Y', $start_date); ?>" data-date-end-date="<?php echo date ('d-m-Y', $end_date); ?>" />
						</div>

						<div class="col-md-3">
							<?php echo form_label('Hour', '', array('class'=>'control-label')); ?>
							<select name="start_time_hh " id="start_time_hh" class="form-control select2-single">
								<option value="-1">HH</option>
								<?php for ($i=0; $i<=23; $i++) { ?>
									<option value="<?php echo $i; ?>" <?php if ($i == date ('H', $class['start_date'])) echo 'selected="selected"'; ?> ><?php echo str_pad($i, 1, '0', STR_PAD_LEFT); ?></option>
								<?php } ?>
							</select>
						</div>

						<div class="col-md-3">
							<?php echo form_label('Minute', '', array('class'=>'control-label')); ?>
							<select name="start_time_mm " id="start_time_mm" class="form-control select2-single">
								<option value="-1">MM</option>
								<?php for ($i=0; $i<=59; $i++) { ?>
									<option value="<?php echo $i; ?>" <?php if ($i == date('i', $class['start_date'])) echo 'selected="selected"'; ?>><?php echo $i; ?></option>
								<?php } ?>
							</select>
						</div>
					</div>

					<div class="form-group row ">
						<div class="col-md-6">
							<label class="control-label">
								Duration (minutes)
							</label>
							<?php 
							if ($class['duration']) {
								$duration = $class['duration'];
							} else {
								$duration = VC_DURATION;
							}
							?>
							<input type="number" class="form-control required" name="duration" value="<?php echo set_value ('duration', $duration); ?>" min="0" max="300" placeholder="Duration (in minutes)" />
						</div>
					</div>
					
				</div>

				<div class="modal-footer">
	                <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cancel</button>
	                <button type="submit" class="btn btn-primary">Submit</button>
	                <a href="<?php echo site_url ('coaching/virtual_class/create_class/'.$coaching_id.'/0/'.$course_id.'/'.$batch_id); ?>" class="btn btn-link d-none">Show Full Form</a>
	            </div>				
	        </form>
        </div>
    </div>
</div>