<div class="row mb-4">
    <!-- Contents -->
    <div class="col-lg-12 col-md-12 mb-4">
    	<?php
    	$num = 1;
    	$li = 1;
		$ti = 1;
		if ( ! empty ($contents)) { 
			foreach ($contents as $row) { 
				?>
				<div class="card d-flex flex-row mb-3">
		          <div class="d-flex flex-grow-1 min-width-zero">
		              <div class="card-body align-self-center d-flex flex-column flex-md-row justify-content-between min-width-zero align-items-md-center">

		                  <a class="list-item-heading mb-0 w-40 w-xs-100 mt-0" href="<?php if ($row['resource_type'] == COURSE_CONTENT_TEST) { echo site_url ('student/tests/take_test/'.$coaching_id.'/'.$member_id.'/'.$course_id.'/'.$row['resource_id']); } else { echo site_url ('student/courses/learn/'.$coaching_id.'/'.$member_id.'/'.$batch_id.'/'.$course_id.'/'.$row['resource_id']); } ?>">
		                      <div class="d-flex">
		                        <span class="mr-2"><?php echo $num; ?>.</span>
		                        <div class="flex-grow-1 my-auto truncate">
		                        	<?php if ($row['resource_type'] == COURSE_CONTENT_TEST) { ?>
		                          		<div class="text-danger text-small font-weight-bold">Test <?php echo $ti; ?></div>
					                    <p class="mb-0 text-muted text-small w-15 w-xs-100">
				                    		<span class="badge badge-danger "></span>
					                    </p>
				                    <?php } else { ?>
		                          		<div class="text-muted text-small">Chapter <?php echo $li; ?></div>
					                    <p class="mb-0 text-muted text-small w-15 w-xs-100">
				                    		<span class="badge badge-primary"></span>
				                    	</p>
				                    <?php } ?>
		                          	<?php echo $row['title']; ?>                         
		                        </div>
		                      </div>
		                  </a>
		                  
		                  <p class="mb-0 text-muted text-small w-15 w-xs-100">
		                    <?php
		                      if ($row['resource_type'] == COURSE_CONTENT_TEST) {
		                      	echo $row['time_min'] .' min';
		                      } else {
		                      	echo $row['duration'];
                            	if ($row['duration_type'] == LESSON_DURATION_MIN) {
                            		echo ' mins';
                            	} else if ($row['duration_type'] == LESSON_DURATION_HOUR) {
                            		echo ' hours';
                            	} else if ($row['duration_type'] == LESSON_DURATION_WEEK) {
                            		echo ' weeks';
                            	}
                            }
                            ?>
		                  </p>
		                  <p class="mb-0 text-muted text-small w-15 w-xs-100">
				            <div class="mb-4">
				                <?php
		                      	if ($row['resource_type'] == COURSE_CONTENT_CHAPTER ) {
					                $lp = $row['lp'];
					                if ($lp['total_pages'] > 0) {
						                $lp_percent = ($lp['total_progress']/$lp['total_pages']) * 100;
					                } else {
					                    $lp_percent = 0;
					                }
					                ?>
					                <p class="mb-2">
					                    <span>Completed</span>
					                    <span class="float-right text-muted"><?php echo $lp['total_progress']; ?>/<?php echo $lp['total_pages']; ?></span>
					                </p>
					                <div class="progress">
					                    <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo $lp_percent; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $lp_percent; ?>%;"></div>
					                </div>
					                <?php
					            }
					            ?>
				            </div>
		                  </p>
		                  <div class="w-30 w-xs-100">
		                    <?php if ($row['resource_type'] == COURSE_CONTENT_TEST) { ?>
								<a href="<?php echo site_url ('student/tests/take_test/'.$coaching_id.'/'.$member_id.'/'.$course_id.'/'.$row['resource_id']); ?>" class="btn btn-outline-danger shadow-sm float-right">Take Test <i class="fa fa-arrow-right"></i></a>
		                    <?php } else { ?>
								<a href="<?php echo site_url ('student/courses/learn/'.$coaching_id.'/'.$member_id.'/'.$batch_id.'/'.$course_id.'/'.$row['resource_id']); ?>" class="btn btn-outline-primary shadow-sm float-right">View Chapter <i class="fa fa-arrow-right"></i></a>
		                    <?php } ?>
		                  </div>
		                </div>
		            </div>
		        </div>				

				<?php
				if ($row['resource_type'] == COURSE_CONTENT_TEST) {
					$ti++;;
                } else {
                	$li++;
                }
                $num++;
			}
		} else {
			?>
			<div class="alert alert-danger">
				No content in this course
			</div>
			<?php
		}
		?>
	</div>
</div>
