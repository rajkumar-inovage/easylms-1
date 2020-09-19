<div class="row">
	<div class="col-12">
		<h2>My Courses</h2>
		<?php $i = 1; ?>
		<?php if (! empty ($courses)) { ?>
		<div class="card">
			<div class="card-body">
			  <div class="scroll" style="">
				<?php foreach($courses as $i=>$course) { ?>
			        <div class="d-flex pb-3 mb-3 border-bottom flex-column flex-lg-row">
			            <div class="flex-grow-1 my-auto">
			            	<div class="d-flex">
					            <?php if (is_file($course['feat_img'])): ?>
					              <a class="flex-shrink-1 pr-3 my-auto" href="<?php echo site_url ('student/courses/home/'.$coaching_id.'/'.$member_id.'/'.$course['course_id'].'/'.$course['batch_id']); ?>">
					                <img src="<?php echo site_url( $course['feat_img'] ); ?>" class="border-0 list-thumbnail" width="50px"/>
					              </a>
					            <?php else: ?>
					              <a class="flex-shrink-1 pr-3 my-auto" href="<?php echo site_url ('student/courses/home/'.$coaching_id.'/'.$member_id.'/'.$course['course_id'].'/'.$course['batch_id']); ?>"> 
					                <img src="<?php echo site_url('contents/system/default_course.jpg'); ?>" class="border-0 list-thumbnail" width="50px"/>
					              </a>
					            <?php endif; ?>
			            		<div class="flex-grow-1 my-auto">
					            	<div class="d-flex flex-column flex-lg-row">
				            			<a href="<?php echo site_url ('student/courses/home/'.$coaching_id.'/'.$member_id.'/'.$course['course_id'].'/'.$course['batch_id']); ?>" class="flex-grow-1 my-auto">
				                            <h5 class="mb-lg-0 listing-heading ellipsis"><?php echo $course['title']; ?></h5>
				                            <p class="mb-0">
					            				<?php
					            				if ($course['enrolment_type'] == COURSE_ENROLMENT_BATCH) {
				            						$batch = $course['batch'];
					            					echo '<span class="badge badge-info">'.$batch['batch_name'].'</span>';
					            				} else {
					            					echo '<span class="badge badge-dark">Direct Enrolment</span>';
					            				}
					            				?>
					            			</p>
				                        </a>
					            		<div class="pr-3 px-lg-3 flex-shrink-1 my-auto">
					            			<p class="mb-0">
					            				
					            			</p>
					            		</div>
					            	</div>
			            		</div>
			            	</div>
			            </div>
			            <div class="flex-shrink-1 my-lg-auto mt-3">
			            	<a class="btn btn-primary" href="<?php echo site_url ('student/courses/home/'.$coaching_id.'/'.$member_id.'/'.$course['course_id'].'/'.$course['batch_id']); ?>">Course Home <i class="fa fa-arrow-right"></i></a>
			            </div>
			        </div>
					<?php
					$i++;
					if ($i >= 3) {
						break;
					}
				}
				?>
			  </div>
			</div>
		</div>
		<?php } else { ?>
			<p>You are not enroled in any course yet</p>
		<?php } ?>
	</div>
</div>

<div class="row mt-5">
	<div class="col-md-8 ">

		<h2>Popular Courses</h2>
		<h5>Try our demo lessons and tests for each course</h5>
		<?php 
		$i = 0;
		if (! empty ($catalog)) { ?>
			<div class="card">
				<div class="card-body">
				  <div class="scroll" style="">
					<?php foreach($catalog as $course) { ?>
					<div class="d-flex border-bottom pb-3 mb-3 flex-column flex-md-row">
			            <div class="flex-grow-1 my-auto">
				          <div class="d-flex">
							<?php if (is_file($course['feat_img'])): ?>
							  <a class="flex-shrink-1 my-auto text-center w-25" href="<?php echo site_url ('student/courses/view/'.$coaching_id.'/'.$member_id.'/'.$course['course_id']); ?>">
								<img src="<?php echo site_url( $course['feat_img'] ); ?>" class="border-0 list-thumbnail" style="max-width:100%;" />
							  </a>
							<?php else: ?>
							  <a class="flex-shrink-1 my-auto" href="<?php echo site_url ('student/courses/view/'.$coaching_id.'/'.$member_id.'/'.$course['course_id']); ?>"> 
								<img src="<?php echo site_url('contents/system/default_course.jpg'); ?>" class="border-0 list-thumbnail" />
							  </a>
							<?php endif; ?>
					          <div class="flex-grow-1 my-auto pl-3 px-md-3">
					          	<a href="<?php echo site_url ('student/courses/view/'.$coaching_id.'/'.$member_id.'/'.$course['course_id']); ?>" class="link-streched">
					          		<div>
					          			<?php 
					          			if ($course['cat_id'] > 0) 
					          				echo $course['cat_title']; 
					          			else 
					          				echo 'Uncategorized';
					          			?>
					          		</div>
					          		<h5 class="mb-0 listing-heading ellipsis"><?php echo $course['title']; ?></h5>
					          	</a>
					          </div>
				          </div>
			            </div>
			            <div class="flex-shrink-0 my-lg-auto mt-3">
			            	<a class="btn btn-outline-primary" href="<?php echo site_url ('student/courses/view/'.$coaching_id.'/'.$member_id.'/'.$course['course_id']); ?>">Details <i class="fa fa-arrow-right"></i>
			            	</a>
			            </div>
			        </div>
				  <?php 
				  $i++;
				  if ($i >= 3) {
				  	//break;
				  } ?>
				<?php } ?>
				  </div>
				</div>
			</div>
		<?php } ?>

	</div>


	<div class="col-md-4 ">

		<h2 class="">My Tests</h2>
		<h3></h3>
		<div class="card mb-4 shadow-sm">
			<div class="card-body">
				<?php 
				$i = 0;
				if (! empty ($my_tests)) {
					foreach ($my_tests as $row) {
						$tests = $row['tests'];
						if (! empty ($tests)) {
							foreach ($tests as $test) {
								?>
								<div class="d-flex pb-3 mb-3 border-bottom flex-column flex-sm-row">
									<div class="flex-grow-1 my-auto">
										<h3><?php echo $test['title']; ?></h3>
										<h6><?php echo $row['title']; ?></h6>
										<div>
											<i class="simple-icon-chart"></i>
											<strong class="mx-2">Duration:</strong>
											<span><?php echo $test['time_min']; ?> min</span>
										</div>
										<div>
											<i class="simple-icon-graph"></i>
											<strong class="mx-2">Pass Percent:</strong>
											<span><?php echo $test['pass_marks']; ?>%</span>
										</div>
									</div>
									<div class="flex-shrink-0 my-auto">
										<a href="<?php echo site_url ('student/tests/take_test/'.$coaching_id.'/'.$member_id.'/'.$row['course_id'].'/'.$test['test_id']); ?>" class="btn btn-outline-primary">
											<i class="iconsminds-notepad"></i>
											<span class="ml-2">Take Tests</span>
										</a>
									</div>
								</div>
								<?php
								$i++;

								if ($i >= 3) {
									break;
								}
							}
							if ($i >= 3) {
								break;
							}
						}
						?>
						<?php
					}
				}
				if ($i == 0) {
					echo '<span class="text-danger">No tests right now</span>';
				}
				?>					
			</div>
		</div>
		<!--// My Tests ------------------>

		<h2 class="mt-4">Virtual Sessions</h2>
		<div class="card mb-4 shadow-sm">
			<div class="card-body">
				<div class="scroll" style="">
					<?php
					$i = 1;
					if (! empty ($classrooms)) {
						foreach ($classrooms as $class) {
							$course = $class['course'];
							?>
							<div class="d-flex pb-3 mb-3 border-bottom flex-column flex-sm-row">
								<div class="flex-grow-1 my-auto">
									<h3><?php echo $course['title']; ?></h3>
									<h6><?php echo $class['class_name']; ?></h6>
								</div>
								<div class="flex-shrink-0 my-auto">
	                            	<?php 
									if ($class['running'] == 'true') {
										echo anchor ('student/virtual_class/join_class/'.$coaching_id.'/'.$class['class_id'].'/'.$member_id.'/'.$class['course_id'].'/'.$class['batch_id'], '<i class="fa fa-plus"></i> Join ', ['class'=>'btn btn-primary mr-1']);
									} else {
										echo anchor ('student/virtual_class/join_class/'.$coaching_id.'/'.$class['class_id'].'/'.$member_id.'/'.$class['course_id'].'/'.$class['batch_id'], '<i class="fa fa-plus"></i> Join ', ['class'=>'btn btn-outline-primary mr-1']);
									}
									?>
								</div>
							</div>
							<?php
							$i++;
							if ($i > 3) {
								break;
							}
						}
					} else { 
						echo '<span class="text-danger">No virtual sessions</span>';
					}
					?>
				</div>
			</div>
		</div>
		<!--// My Classes ------------------>

		<h4 class="mt-4">Announcements</h4>

		<div class="card mb-4 shadow-sm ">
			<div class="card-body">
				<?php $i = 0; ?>
				<?php if (! empty ($annc)) { ?>
				<div class="scroll" style="height: 250px;">
					<?php foreach($annc as $row) { ?>
						<div class="flex-row justify-content-between">
							<div class="pr-3 flex-grow-1">
								<a href="<?php echo site_url ('student/announcements/view/'.$coaching_id.'/'.$member_id.'/'.$row['announcement_id']); ?>">
									<h4 class="text-left"><?php echo $row['title']; ?></h4>
									<p class="text-justify text-muted">
										<?php echo character_limiter ($row['description'], 80); ?>
									</p>
								</a>
							</div>
						</div>
						<div class="separator mb-2"></div>
						<?php 
						$i++;
						if ($i >= 3) {
							break;
						}
						?>
					<?php } ?>
				</div>
				<?php
				} else {
		        	?>
		            <div class="alert alert-info mb-0">There are no announcements.</div>
		            <?php
		        }
				?>
			</div>
			<div class="card-footer text-right">
				<?php echo anchor ('student/announcements/index/'.$coaching_id.'/'.$member_id, 'Show All', ['class'=>'btn btn-primary mr-1']); ?>
			</div>
		</div>
		<!--// Announcements ------------------>

</div>