<div class="app-menu">
    <div class="p-4 h-100">
        <div class="scroll ps">
            <p class="mb-3"><?php echo anchor ('student/courses/view/'.$coaching_id.'/'.$member_id.'/'.$course_id, $course['title'], ['class'=>'text-primary font-weight-bold']); ?></p>             
            <p class="text-muted text-small">Content</p>
            <ul class="list-unstyled" data-link="menu" id="courseContent">
             	<?php 
             	if (! empty ($contents)) {
             		foreach ($contents as $row) {
             			if ($row['resource_type'] == COURSE_CONTENT_TEST) {
             				?>
             				<li>
			                    <a href="<?php echo site_url ('student/tests/take_test/'.$coaching_id.'/'.$member_id.'/'.$course_id.'/'.$row['test_id']); ?>" class="d-flex justify-content-between font-weight-bold text-info">
			                       <span class="d-inline-block"><?php echo $row['title']; ?></span>
			                       <div>
			                       	 <span class="badge badge-danger mr-2">Test</span>
			                       </div>
			                    </a>
			                    <div class="separator"></div>
			                </li>
			                <?php
             			} else {
	             			?>
			                <li>
			                    <a href="#" data-toggle="collapse" data-target="#chapter<?php echo $row['lesson_id']; ?>" aria-expanded="true"
			                        aria-controls="chapter<?php echo $row['lesson_id']; ?>" class="rotate-arrow-icon d-flex font-weight-bold">
			                        <i class="simple-icon-arrow-down"></i> <span class="d-inline-block"><?php echo $row['title']; ?></span>
			                    </a>
                                <div class="separator"></div>
			                    <?php if (! empty ($row['pages'])) { ?>
				                    <div id="chapter<?php echo $row['lesson_id']; ?>" class="collapse show ml-4" data-parent="#courseContent">
				                        <ul class="list-unstyled inner-level-menu">
				                        	<?php foreach ($row['pages'] as $page) { ?>
				                            <li class="border-bottom d-flex">
				                            	<?php if ($row['for_demo'] == 1) { ?>
					                            	<i class="far fa-circle mt-1 "></i>
					                                <a href="<?php echo site_url ('student/courses/try_course/'.$coaching_id.'/'.$member_id.'/'.$course_id.'/'.$batch_id.'/'.$row['lesson_id'].'/'.$page['page_id']); ?>">
					                                    <span class="d-inline-block <?php if ($page_id == $page['page_id']) echo 'text-primary font-weight-bold'; ?>">
					                                    	<?php echo $page['title']; ?>
				                                    	</span>
					                                </a>
				                            	<?php } else { ?>
					                            	<i class="fa fa-lock text-muted "></i>
				                            		<span class="text-muted mt-1">
				                                    	<?php echo $page['title']; ?>
			                                    	</span>
				                            	<?php } ?>
				                            </li>
				                        	<?php } ?>
				                        </ul>
				                    </div>
			                    <?php } ?>
			                </li>
	             			<?php
             			}
             		}
             	}
             	?>

            </ul>
	    </div>
  	</div>
  	<a class="app-menu-button d-inline-block d-xl-none" href="#">
	    <i class="simple-icon-options"></i>
	</a>
</div>