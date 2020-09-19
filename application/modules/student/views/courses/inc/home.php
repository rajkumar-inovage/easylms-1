<div class="app-menu">
    <div class="p-4 h-100">
        <div class="scroll ps">
            <h4 class="mb-3"><?php echo $course['title']; ?></h4>

			<?php
			if ($course['enrolment_type'] == COURSE_ENROLMENT_BATCH && ! empty($batch)) {
				echo '<p class="text-muted text-small">Batch';
					echo '<br>';
					echo $batch['batch_name'];
				echo '</p>';
			}
			?>
            <p class="mb-4">
             	<?php 
                /*
             	if (! empty($last_activity)) {
	             	$lesson_id = $last_activity['lesson_id'];
	             	$page_id = $last_activity['page_id'];
	             	echo anchor ('student/courses/learn/'.$coaching_id.'/'.$member_id.'/'.$batch_id.'/'.$course_id.'/'.$lesson_id.'/'.$page_id, 'Continue Learning <i class="iconsminds-arrow-out-right"></i>', ['class'=>'btn btn-primary btn-block']);
	             } else {
	             	echo anchor ('student/courses/learn/'.$coaching_id.'/'.$member_id.'/'.$batch_id.'/'.$course_id, 'Start Learning <i class="iconsminds-arrow-out-right"></i>', ['class'=>'btn btn-primary btn-block']);
	             }
                */
             	?>
            </p>

            <p class="text-muted text-small">Course Links</p>
            <ul class="list-unstyled mb-3">
                <li>
                    <?php echo anchor ('student/courses/home/'.$coaching_id.'/'.$member_id.'/'.$course_id.'/'.$batch_id, '<i class="fa fa-home"></i>Course Home'); ?>
                </li>
                <li>
                    <?php echo anchor ('student/tests/index/'.$coaching_id.'/'.$member_id.'/'.$course_id.'/'.$batch_id, '<i class="fa fa-puzzle-piece"></i> Tests'); ?>
                </li>
                <li class="d-none">
                    <?php echo anchor ('student/tests/index/'.$coaching_id.'/'.$member_id.'/'.$course_id.'/'.$batch_id, '<i class="fa fa-puzzle-piece"></i> Announcements'); ?>
                </li>
                <li class="d-none">
                    <?php echo anchor ('student/courses/teachers/'.$coaching_id.'/'.$member_id.'/'.$course_id.'/'.$batch_id, '<i class="fa fa-user"></i> Instructors'); ?>
                </li>
                <li>
                    <?php echo anchor ('student/courses/details/'.$coaching_id.'/'.$member_id.'/'.$course_id.'/'.$batch_id, '<i class="fa fa-book"></i> Curriculum'); ?>
                </li>
				<?php if ($course['enrolment_type'] == COURSE_ENROLMENT_BATCH) { ?>
                    <li>
                        <?php echo anchor ('student/virtual_class/index/'.$coaching_id.'/'.$member_id.'/'.$course_id.'/'.$batch_id, '<i class="fa fa-video"></i> Virtual Classrooms'); ?>
                    </li>
					<li>
						<?php echo anchor ('student/courses/schedule/'.$coaching_id.'/'.$member_id.'/'.$course_id.'/'.$batch_id, '<i class="fa fa-calendar"></i> Schedule'); ?>
					</li>
				<?php } ?>
            </ul>
	    </div>
  	</div>
  	<a class="app-menu-button d-inline-block d-xl-none" href="#">
	    <i class="simple-icon-options"></i>
	</a>
</div>