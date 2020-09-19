<div class="app-menu">
    <div class="p-4 h-100">
        <div class="scroll ps">
            <p class="mb-3"><?php echo anchor ('student/courses/home/'.$coaching_id.'/'.$member_id.'/'.$course_id.'/'.$batch_id, $course['title'], ['class'=>'text-primary font-weight-bold']); ?></p>             
            <div class="mb-4">
                <?php
                if ($cp['total_pages'] > 0) {
	                $cp_percent = ($cp['total_progress']/$cp['total_pages']) * 100;
                } else {
                    $cp_percent = 0;
                }
                ?>
                <p class="mb-2">
                    <span>Completed</span>
                    <span class="float-right text-muted"><?php echo $cp['total_progress']; ?>/<?php echo $cp['total_pages']; ?></span>
                </p>
                <div class="progress">
                    <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo $cp_percent; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $cp_percent; ?>%;"></div>
                </div>
            </div>
            <ul class="list-unstyled" data-link="menu" id="courseContent">
             	<?php 
             	if (! empty ($contents)) {
             		foreach ($contents as $row) {
             			if ($row['resource_type'] == COURSE_CONTENT_TEST) {
             				?>
             				<li>
			                    <a href="<?php echo site_url ('student/tests/take_test/'.$coaching_id.'/'.$member_id.'/'.$course_id.'/'.$row['resource_id']); ?>" class="d-flex justify-content-between font-weight-bold text-info">
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
			                    <a href="#" data-toggle="collapse" data-target="#chapter<?php echo $row['resource_id']; ?>" aria-expanded="true"
			                        aria-controls="chapter<?php echo $row['resource_id']; ?>" class="rotate-arrow-icon d-flex font-weight-bold justify-content-between">
			                        <span>
				                        <i class="simple-icon-arrow-down"></i> <span class="d-inline-block"><?php echo $row['title']; ?></span>
				                    </span>
				                    <span class="text-muted text-small ">
				                    	<?php
				                    	if ($row['lp']) {
				                    		$lp = $row['lp'];
					                    	echo $lp['total_progress'] .'/'.$lp['total_pages'];
				                    	}
				                    	?>
				                    </span>
			                    </a>
                                <div class="separator"></div>
			                    <?php if (! empty ($row['pages'])) { ?>
				                    <div id="chapter<?php echo $row['resource_id']; ?>" class="collapse show ml-1" data-parent="#courseContent">
				                        <ul class="list-unstyled inner-level-menu">
				                        	<?php foreach ($row['pages'] as $page) { ?>
				                            <li class="border-bottom d-flex">
			                                	<?php 
			                                	if ($page['page_id'] == $page_id) {
			                                		echo '<i class="far fa-circle text-success mt-1"></i>';
			                                	} else if ($page['is_viewed'] == true) {
			                                		echo '<i class="fa fa-circle text-success mt-1"></i>';
			                                	} else {
			                                		echo '<i class="far fa-circle text-muted mt-1"></i>';
			                                	}
			                                	?>
				                                <a href="<?php echo site_url ('student/courses/learn/'.$coaching_id.'/'.$member_id.'/'.$batch_id.'/'.$course_id.'/'.$row['resource_id'].'/'.$page['page_id']); ?>">
				                                    <span class="d-inline-block <?php if ($page_id == $page['page_id']) echo 'text-primary font-weight-bold'; ?>">
				                                    	<?php echo $page['title']; ?>
			                                    	</span>
				                                </a>
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