<div class="row justify-content-center">
    <div class="col-xl-6 col-lg-6 mb-4">
        <div class="card mb-4 ">
            <div class="card-body align-items-center d-flex justify-content-between ">
                <h6 class="mb-0">Progress</h6>
                <?php
                if ($cp['total_pages'] > 0) {
                    $cp_percent = ($cp['total_progress']/$cp['total_pages']) * 100;
                } else {
                    $cp_percent = 0;
                }
                ?>
                <div role="progressbar" class="progress-bar-circle position-relative" data-color="#922c88"
                    data-trailColor="#d7d7d7" aria-valuemax="100" aria-valuenow="<?php echo $cp_percent; ?>"
                    data-show-percent="true">
                </div>                
            </div>

            <div class="card-body align-items-center ">
                <p class="mb-4 align-center">
                    <?php 
                    if (! empty($last_activity)) {
                        $lesson_id = $last_activity['lesson_id'];
                        $page_id = $last_activity['page_id'];
                        echo anchor ('student/courses/learn/'.$coaching_id.'/'.$member_id.'/'.$batch_id.'/'.$course_id.'/'.$lesson_id.'/'.$page_id, 'Continue Learning <i class="iconsminds-arrow-out-right"></i>', ['class'=>'btn btn-primary btn-lg']);
                     } else {
                        echo anchor ('student/courses/learn/'.$coaching_id.'/'.$member_id.'/'.$batch_id.'/'.$course_id, 'Start Learning <i class="iconsminds-arrow-out-right"></i>', ['class'=>'btn btn-primary btn-lg']);
                     }
                    ?>
                </p>
            </div>
        </div>
    </div>

    <div class="col-xl-6 col-lg-6 mb-4">
        <div class="card">            
            <div class="card-body align-items-center ">
            	<h4 class="card-title">Course Links</h4>
            	<div class="separator"></div>
				<a href="<?php echo site_url ('student/tests/tests_taken/'.$coaching_id.'/'.$member_id.'/'.$course_id.'/'.$batch_id); ?>" class="link-streched d-flex justify-content-between border-bottom py-2">
	                <h6 class="mb-0">Tests Taken</h6>
	                <div>
	                	<?php //echo count ($tests); ?>
	                </div>
	            </a>
                <?php if ($course['enrolment_type'] == COURSE_ENROLMENT_BATCH) { ?>
    				<a href="<?php echo site_url ('student/virtual_class/index/'.$coaching_id.'/'.$member_id.'/'.$course_id.'/'.$batch_id); ?>" class="link-streched d-flex justify-content-between border-bottom py-2">
    	                <h6 class="mb-0">Virtual Classrooms</h6>
    	                <div>
    	                	<?php //echo count ($classrooms); ?>
    	                </div>
    	            </a>
                    <a href="<?php echo site_url ('student/courses/schedule/'.$coaching_id.'/'.$member_id.'/'.$course_id.'/'.$batch_id); ?>" class="link-streched d-flex justify-content-between border-bottom py-2">
                        <h6 class="mb-0">Schedule</h6>
                        <div>
                            <?php //echo count ($tests); ?>
                        </div>
                    </a>
                <?php } ?>
            </div>
        </div>
    </div>
</div>