<div class="row">
	<div class="col-md-9">
	  <?php
		$i = 0;
		if ( ! empty ($test_taken)) {
			foreach ($test_taken as $row) {
				$i++;
				?>
				<div class="card d-flex flex-row mb-3">
		            <div class="d-flex flex-grow-1 min-width-zero">
		                <div class="card-body align-self-center d-flex flex-column flex-md-row justify-content-between min-width-zero align-items-md-center">
		                    <p class="list-item-heading mb-0 truncate w-40 w-xs-100" >
						 		<?php echo $row['title']; ?>		                        
		                    </p>
		                    <p class="mb-0 text-muted text-small w-15 w-xs-100">
								Taken On: <?php echo date('d M, Y', $row['loggedon']); ?> at 
								<?php echo date('H:i A', $row['loggedon']); ?>
							</p>
		                    <div class="w-15 w-xs-100">
		                    	<?php 
								if ($row['submitted'] == 1 || ($row['submitted'] == 0 && $row['submit_time'] > 0)) {
									if ($row['release_result'] == RELEASE_EXAM_IMMEDIATELY) {
										$pass_marks = ($row['pass_marks'] * $row['test_marks']) / 100;
										
										if ($row['obtained_marks'] < $pass_marks) {
											$result_class = 'text-danger';
											$result_text = 'Fail';
										} else {
											$result_class = 'text-success';
											$result_text = 'pass';
										}
										?>
										<div class="text-display-1 <?php echo $result_class; ?>"><?php echo $row['obtained_marks']; ?></div>
										<span class="caption <?php echo $result_class; ?>"><?php echo $result_text; ?></span>
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
		                <div class=" mb-1 align-self-center pr-4">
							<p class="_btn-group">
								<?php 
								if ($row['submitted'] == 1 || ($row['submitted'] == 0 && $row['submit_time'] > 0)) {
									if ($row['release_result'] == RELEASE_EXAM_IMMEDIATELY) {
										//echo anchor ('student/reports/test_report/'.$coaching_id.'/'.$member_id.'/'.$course_id.'/'.$row['attempt_id'].'/'.$row['test_id'], 'Report', array ('class'=>'btn btn-primary btn-sm '));
									}
									if ($row['attempts'] == 0  || $row['num_attempts'] < $row['attempts'] ) {
										//echo anchor ('student/tests/take_test/'.$coaching_id.'/'.$member_id.'/'.$course_id.'/'.$row['test_id'], 'Re-Take Test ', array('class'=>'btn btn-sm btn-outline-primary ml-2'));
									}
								}
								?>
							</p>
		                </div>
		            </div>
		        </div>
				<?php
			}
		}
		if ($i == 0) {
			?>
			<div class="card-body">
				<div class="alert alert-danger">
					<p>User has not taken any tests yet</p>
				</div>
			</div>
			<?php
		}
		?>
	</div>
	
	<div class="col-md-3">
		<?php $this->load->view('users/inc/user_menu', $data); ?>
	</div>

</div>