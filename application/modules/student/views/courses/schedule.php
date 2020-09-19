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
	<?php if (! empty($schedule)) { ?>
	<div class="table-responsive">
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>Date</th>
					<?php
					$count = 0;
					$next = 0;
					for ($i=$start_date; $i<=$end_date; $i=$i+$interval) { 
						?>
						<th><?php echo date ('D, d M y', $i); ?></th>
						<?php 
						$count++;
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
									<div class="text-small text-muted"><?php echo date ('d-m-Y', $row['end_date']); ?></div>
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
			
		</div>
		<div class="align-item-center">
			<?php echo anchor ('student/courses/schedule/'.$coaching_id.'/'.$member_id.'/'.$course_id.'/'.$batch_id.'/'.$next, 'Next', ['class'=>'btn btn-primary ']); ?>
		</div>
	</div>
	<?php } else { ?>
		<div class="card-body">
			<div class="text-danger">
				Schedule for this batch has not been created yet
			</div>
		</div>
	<?php } ?>
</div>