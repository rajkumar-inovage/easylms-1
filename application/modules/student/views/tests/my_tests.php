<div class="row">
	<div class="col-12">
	  <?php
		$i = 1;
		if ( ! empty ($test_taken)) {
			foreach ($test_taken as $tests) {
			  if ( ! empty ($tests)) {
			  	$num_attempts = count($tests);
				foreach ($tests as $loggedon=>$row) {
					?>
					<div class="card d-flex flex-row mb-3">
			            <div class="d-flex flex-grow-1 min-width-zero">
			                <div class="card-body align-self-center d-flex flex-column flex-md-row justify-content-between min-width-zero align-items-md-center">
			                    <p class="list-item-heading mb-0 truncate w-40 w-xs-100" >
							 		<?php echo $row['title']; ?>
			                    </p>
			                    <p class="mb-0 text-muted text-small w-15 w-xs-100">
									Attempted: <br><?php echo $num_attempts; ?> time(s)
								</p>
			                    <p class="mb-0 text-muted text-small w-15 w-xs-100">
									Last attempt on: <br>
									<?php echo date('d M, Y', $loggedon); ?> at 
									<?php echo date('h:i A', $loggedon); ?>
								</p>
			                    <div class="w-15 w-xs-100 text-center">
			                    	<?php 
									if ($row['submitted'] == 1 || ($row['submitted'] == 0 && $row['submit_time'] > 0)) {
										if ($row['release_result'] == RELEASE_EXAM_IMMEDIATELY) {
											$pass_marks = ($row['pass_marks'] * $row['test_marks']) / 100;
											
											if ($row['obtained_marks'] <= $pass_marks) {
												$result_class = 'danger';
												$result_text = 'Fail';
											} else {
												$result_class = 'success';
												$result_text = 'pass';
											}
											?>
											<!--
											<div role="progressbar" class="progress-bar-circle position-relative" data-color="#922c88" data-trailColor="#d7d7d7" aria-valuemax="100" aria-valuenow="<?php echo $pass_marks; ?>" data-show-percent="true">
							                </div>
											-->

											<div class="text-display-1 text-<?php echo $result_class; ?>"><?php echo $row['obtained_marks'].'/'.$row['test_marks']; ?></div>
											<span class="badge badge-<?php echo $result_class; ?>"><?php echo $result_text; ?></span>
											<?php
										} else {
											echo '<span class="badge badge-danger">Result will be released later</span>';
										}
									} else {
										echo '<span class="badge badge-danger">Not Submitted</span>';
									}
									?>
								</div>
			                </div>
			                <div class=" mb-1 align-self-center align-items-md-center pr-4">
								<p class="_btn-group">
									<?php 
									if ($row['submitted'] == 1 || ($row['submitted'] == 0 && $row['submit_time'] > 0)) {
										if ($row['release_result'] == RELEASE_EXAM_IMMEDIATELY) {
											echo anchor ('student/reports/test_report/'.$coaching_id.'/'.$member_id.'/'.$course_id.'/'.$row['attempt_id'].'/'.$row['test_id'], 'Report', array ('class'=>'btn btn-primary btn-sm mr-1 mb-1'));
										}
										if ($row['attempts'] == 0  || $num_attempts < $row['attempts'] ) {
											echo anchor ('student/tests/take_test/'.$coaching_id.'/'.$member_id.'/'.$course_id.'/'.$row['test_id'], 'Retake Test ', array('class'=>'btn btn-sm btn-outline-primary'));
										}
									} else {
										?>	
										<button disabled="disabled" class="btn btn-sm btn-primary">Report</button>
										<button disabled="disabled" class="btn btn-sm btn-outline-primary">Retake Test</button>
										<?php
									}
									?>
								</p>
			                </div>
			            </div>
			        </div>
					<?php
					$i++;
					if ($i > 1) {
						break;
					}
				}
			  }
			}
		} else {
			?>
			<p class="text-danger">You have not taken any tests yet</p>
			<?php
		}
		?>
	</div>
</div>