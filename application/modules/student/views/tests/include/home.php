<div class="app-menu">
    <div class="p-4 h-100">
        <div class="scroll ps">
            <h4 class="mb-3"><?php echo $course['title']; ?></h4>
            <p class="text-muted text-small">Quick Links</p>
	            <ul class="list-unstyled mb-3">
	                <li>
	                    <?php echo anchor ('student/courses/home/'.$coaching_id.'/'.$member_id.'/'.$course_id, '<i class="fa fa-home"></i>Course Home'); ?>
	                </li>
	                <li>
	                    <?php echo anchor ('student/tests/index/'.$coaching_id.'/'.$member_id.'/'.$course_id, '<i class="fa fa-puzzle-piece"></i> Tests'); ?>
	                </li>
	                <li class="d-none">
	                    <?php echo anchor ('student/tests/index/'.$coaching_id.'/'.$member_id.'/'.$course_id, '<i class="fa fa-puzzle-piece"></i> Announcements'); ?>
	                </li>
	                <li class="d-none">
	                    <?php echo anchor ('student/courses/teachers/'.$coaching_id.'/'.$member_id.'/'.$course_id, '<i class="fa fa-user"></i> Instructors'); ?>
	                </li>
	                <li>
	                    <?php echo anchor ('student/courses/details/'.$coaching_id.'/'.$member_id.'/'.$course_id, '<i class="fa fa-book"></i> Curriculum'); ?>
	                </li>
	            </ul>
		    </div>
  	</div>
</div>