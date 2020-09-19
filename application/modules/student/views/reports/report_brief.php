<div class="card"> 
	<div class="card-body">
		<div class="row">
			<div class="col-md-9">
				<canvas id="briefChart" width="100%" ></canvas>
			</div>
			<div class="col-md-3 align-self-center">

				<div class="mb-4">
                    <p class="mb-2">
                        <span>Correct</span>
                        <span class="float-right text-dark"><?php echo $brief['correct'].'/'.$num_questions; ?></span>
                    </p>
                    <div class="progress">
						<?php $correct_pc = ($brief['correct']/$num_questions) * 100; ?>
                        <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo $correct_pc; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
				<div class="mb-4">
                    <p class="mb-2">
                        <span>Wrong</span>
                        <span class="float-right text-danger"><?php echo $brief['wrong'].'/'.$num_questions; ?></span>
                    </p>
                    <div class="progress">
						<?php $wrong_pc = ($brief['wrong']/$num_questions) * 100; ?>
                        <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo $wrong_pc; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
				<div class="mb-4">
                    <p class="mb-2">
                        <span>Not Answered</span>
                        <span class="float-right "><?php echo $brief['not_answered'].'/'.$num_questions; ?></span>
                    </p>
                    <div class="progress">
						<?php $na_pc = ($brief['not_answered']/$num_questions) * 100; ?>
                        <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo $na_pc; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>

				<div class="mb-4">
                    <p class="mb-2">
                        <span>Obtained Marks</span>
                        <span class="float-right "><?php echo $ob_marks[$attempt_id]['obtained']; ?></span>
                    </p>
                </div>

				<div class="mb-4">
                    <p class="mb-2">
			            <?php 
							if ($brief['ob_perc'] >= $test['pass_marks']) {
								$result = '<span class="badge badge-success">Pass</span>';
							} else {
								$result = '<span class="badge badge-danger">Fail</span>';
							}
						?>
                        <span>Result</span>
                        <span class="float-right "><?php echo $result; ?></span>
                    </p>
                </div>

				<div class="mb-4">
		            <div class="d-flex justify-content-between ">
                        <span>Accuracy</span>
	                    <div role="progressbar" class="progress-bar-circle position-relative" data-color="#922c88"
		                    data-trailColor="#d7d7d7" aria-valuemax="100" aria-valuenow="<?php echo $brief['accuracy']; ?>" data-show-percent="true">
		                </div>
                    </div>
                </div>

			</div>
		</div>		
	</div>
</div>