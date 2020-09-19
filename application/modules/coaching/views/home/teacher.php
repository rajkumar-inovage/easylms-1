<div class="row">
    <div class="col-lg-4">
        <div class="card mb-4 progress-banner">
            <a href="<?php echo site_url('coaching/courses/batch_courses/'.$coaching_id); ?>" class="card-body justify-content-between d-flex flex-row align-items-center">
                <div class="flex-grow-1">
                	<i class="iconsminds-library mr-2 text-white align-text-bottom d-inline-block"></i>
					<div>
                        <p class="lead text-white"><?php echo ($batch_courses > 1)? "$batch_courses Batch Courses": " $batch_courses Batch Course"; ?></p>
                    </div>
                </div>
                <div class="flex-shrink-0">
					<button class="btn btn-light btn-sm">View</button>
                </div>
            </a>
        </div>
        <div class="card mb-4 progress-banner">
            <a href="<?php echo site_url('coaching/courses/direct_courses/'.$coaching_id); ?>" class="card-body justify-content-between d-flex flex-row align-items-center">
                <div class="flex-grow-1">
                	<i class="iconsminds-books mr-2 text-white align-text-bottom d-inline-block"></i>
					<div>
                        <p class="lead text-white"><?php echo ($direct_courses > 1)? "$direct_courses Direct Courses": " $direct_courses Direct Course"; ?></p>
                    </div>
                </div>
                <div class="flex-shrink-0">
					<button class="btn btn-light btn-sm">View</button>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card mb-4 progress-banner">
            <a href="<?php echo site_url ('coaching/virtual_class/my_classes/'.$coaching_id); ?>" class="card-body justify-content-between d-flex flex-row align-items-center">
                <div class="flex-grow-1">
                	<i class="iconsminds-blackboard mr-2 text-white align-text-bottom d-inline-block"></i>
					<div>
                        <p class="lead text-white"><?php echo count($my_classrooms) . " Upcoming Virtual "; echo (count($my_classrooms)>1)?"Sessions":"Session"; ?></p>
                    </div>
                </div>
                <div class="flex-shrink-0">
					<button class="btn btn-light btn-sm">View All</button>
                </div>
            </a>
        </div>
        <div class="card mb-4 progress-banner">
            <a href="<?php echo site_url('coaching/courses/index/'.$coaching_id) ?>" class="card-body justify-content-between d-flex flex-row align-items-center">
                <div class="flex-grow-1">
                	<i class="iconsminds-notepad mr-2 text-white align-text-bottom d-inline-block"></i>
					<div>
                        <p class="lead text-white"><?php echo "Total Tests $count_tests";?></p>
                    </div>
                </div>
                <div class="flex-shrink-0">
					<button class="btn btn-light btn-sm">View All</button>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card mb-4 progress-banner">
            <a href="<?php echo site_url('coaching/plans/index/'.$coaching_id) ?>" class="card-body justify-content-between d-flex flex-row align-items-center">
                <div class="flex-grow-1">
                	<i class="iconsminds-tag-3 mr-2 text-white align-text-bottom d-inline-block"></i>
					<div>
                        <p class="lead text-white"><?php echo "$paid_resource Paid Resources"; ?></p>
                        <p class="text-small text-white"><?php echo "$free_resource Free Resources"; ?></p>
                    </div>
                </div>
                <div class="flex-shrink-0">
					<button class="btn btn-light btn-sm">Check EasyLMS</button>
                </div>
            </a>
        </div>
        <div class="card mb-4 progress-banner">
            <a href="javascript:void(0);" class="card-body justify-content-between d-flex flex-row align-items-center">
                <div class="flex-grow-1">
                	<i class="simple-icon-settings mr-2 text-white align-text-bottom d-inline-block"></i>
					<div>
                        <p class="lead text-white">Manage Resources</p>
                    </div>
                </div>
                <div class="flex-shrink-0">
					<button class="btn btn-light btn-sm" disabled>Comming Soon</button>
                </div>
            </a>
        </div>
    </div>
</div>
<div class="row justify-content-center d-none">
	<div class="col-md-12">
		<div class="card mb-4 shadow-sm">
			<div class="card-header ">
				<h4>My Classrooms</h4>
			</div>
			<ul class="list-group ">
				<?php 
				$i=1;
				if (! empty ($my_classrooms)) {
					foreach($my_classrooms as $row) { 
						?>
						<li class="list-group-item media">
							<div class="media-left">
								<?php if ($row['running'] == 'true') { ?>
									<span class="icon-block half rounded-circle bg-success">
										<i class="fa fa-video"></i>
									</span>
								<?php } else { ?>
									<span class="icon-block half rounded-circle bg-grey-200">
										<i class="fa fa-video"></i>									
									</span>
								<?php } ?>
							</div>
							<div class="media-body">
								<h4 class=""><?php echo $row['class_name']; ?></h4>
								<?php if ($row['running'] == 'true') { ?>
									<span class="badge badge-success">Class has started</span>
								<?php } else { ?>
									<span class="badge badge-default bg-grey-200">Class not started</span>
								<?php } ?>
								<?php if ($row['role'] == VM_PARTICIPANT_MODERATOR) { ?>
									<span class="badge badge-default bg-blue-200">Moderator</span>
								<?php } else { ?>
									<span class="badge badge-default bg-blue-200">Attendee</span>
								<?php } ?>
								<?php //echo anchor ('coaching/virtual_class/class_details/'.$coaching_id.'/'.$row['class_id'], $row['class_name']); ?>
								<div class="mt-2">
									<?php 
									if ($row['role'] == VM_PARTICIPANT_MODERATOR) {
										$button_text = 'Start and Join';
									} else {
										$button_text = 'Join';
									}
									if ($row['running'] == 'true') {
										$class = 'btn-success';
									} else {
										$class = 'btn-default';
									}
									echo anchor ('coaching/virtual_class/join_class/'.$coaching_id.'/'.$row['class_id'].'/'.$member_id, '<i class="fa fa-plus"></i> '.$button_text, ['class'=>'btn mr-1 '.$class]);
									echo anchor ('coaching/virtual_class/participants/'.$coaching_id.'/'.$row['class_id'].'/'.$member_id, '<i class="fa fa-plus"></i> Participants', ['class'=>'btn btn-info mr-1 ']);
									?>
								</div>
							</div>

							<div class="media-right">
							</div>
						</li>
						<?php
						$i++;
						if ($i >= 3) {
							break;
						}
					}
				} else {
		        	?>
		            <div class="text-danger my-4 mx-2">
		                You are not in any class
		            </div>
		            <?php
		        }
				?>
			</ul>
		</div>
	</div>
</div>
