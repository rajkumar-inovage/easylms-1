<div class="row">
	<div class="col-12">
		<?php
		$i = 0 ;
		if ( ! empty ($results)) {
			foreach ($results as $i => $row) {
				?>
				<div class="card mb-3">
					<div class="card-body d-flex flex-column flex-xs-row ">
						<div class="flex-grow-1 my-auto">
							<div class="d-flex mb-3 mb-xs-0">
								<div class="flex-shrink-0 my-auto">
									<div class="heading-icon" style="font-size:0.8rem;"><?php echo $i + 1; ?> - </div>
								</div>
								<div class="flex-shrink-0 my-xs-auto px-2">
									<?php
									echo ($row['gender'] == 'm')?
										'<i class="iconsminds-student-male fa-2x"></i>' :
										'<i class="iconsminds-student-female fa-2x"></i>';
									?>
								</div>
								<div class="flex-grow-1 my-auto">
									<p class="mb-0">
										<?php echo ($row['first_name']) .' '. ($row['second_name']) .' '. ($row['last_name']); ?>
										<br> 
										<?php echo $row['adm_no']; ?>
									</p>
								</div>
							</div>
						</div>
						<div class="flex-shrink-0  my-auto text-center">
							<div class="btn-group">
								<button type="button" onclick="mark_attendance (this.id, <?php echo $row['member_id']; ?>, <?php echo ATTENDANCE_PRESENT; ?>);" class="btn default btn-att-<?php echo $row['member_id']; ?> <?php if ($attendance[$row['member_id']]['attendance'] == ATTENDANCE_PRESENT) echo 'btn-success'; else echo 'btn-light' ?>" id="present<?php echo $row['member_id']; ?>" >Present</button>
								
								<button type="button" onclick="mark_attendance (this.id, <?php echo $row['member_id']; ?>, <?php echo ATTENDANCE_LEAVE; ?>);" class="btn default btn-att-<?php echo $row['member_id']; ?> <?php if ($attendance[$row['member_id']]['attendance'] == ATTENDANCE_LEAVE) echo 'btn-success'; else echo 'btn-light' ?>" id="leave<?php echo $row['member_id']; ?>" >Leave</button>
								
								<button type="button" onclick="mark_attendance (this.id, <?php echo $row['member_id']; ?>, <?php echo ATTENDANCE_ABSENT; ?>);" class="btn default btn-att-<?php echo $row['member_id']; ?> <?php if ($attendance[$row['member_id']]['attendance'] == ATTENDANCE_ABSENT) echo 'btn-success'; else echo 'btn-light' ?>" id="absent<?php echo $row['member_id']; ?>" >Absent</button>
								
								<a href="<?php echo site_url ('attendance/reports/member_report/'.$row['member_id']); ?>" class="btn default btn-dark text-white d-none">Report</a>
							</div>
						</div>
					</div>
				</div>
				<?php 
			} // foreach 
		} else {
			?>
			<div class="alert alert-danger">
				<p class="mb-0">No users found</p>
			</div>
			<?php
		}
		?>
	</div>
</div>