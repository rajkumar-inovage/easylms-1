<div class="row">
	<div class="col-md-9">
		<?php $i = 1; ?>
		<?php if (! empty ($courses)) { ?>
		<div class="card">
			<div class="card-body">
			  <div class="scroll" style="">
				<?php foreach($courses as $i=>$course) { ?>
			        <div class="d-flex pb-3 mb-3 border-bottom flex-column flex-lg-row">
			            <div class="flex-grow-1 my-auto">
			            	<div class="d-flex">
					            <?php /*if (is_file($course['feat_img'])): ?>
					              <a class="flex-shrink-1 pr-3 my-auto" href="<?php echo site_url ('student/courses/home/'.$coaching_id.'/'.$member_id.'/'.$course['course_id']); ?>">
					                <img src="<?php echo site_url( $course['feat_img'] ); ?>" class="border-0 list-thumbnail" />
					              </a>
					            <?php else: ?>
					              <a class="flex-shrink-1 pr-3 my-auto" href="<?php echo site_url ('student/courses/home/'.$coaching_id.'/'.$member_id.'/'.$course['course_id']); ?>"> 
					                <img src="<?php echo site_url('contents/system/default_course.jpg'); ?>" class="border-0 list-thumbnail" />
					              </a>
					            <?php endif;*/ ?>
			            		<div class="flex-grow-1 my-auto">
					            	<div class="d-flex flex-column flex-lg-row">
				            			<a href="<?php //echo site_url ('student/courses/home/'.$coaching_id.'/'.$member_id.'/'.$course['course_id']); ?>" class="flex-grow-1 my-auto">
				                            <h5 class="mb-lg-0 listing-heading ellipsis"><?php echo $course['title']; ?></h5>
				                            <p class="mb-0">
					            				<?php
					            				if (! empty ($course['batch'])) {
					            					$batch = $course['batch'];
					            					echo '<span class="badge badge-info">'.$batch['batch_name'].'</span>';
					            				} else {
					            					echo '<span class="badge badge-dark">Direct Enrolment</span>';
					            				}
					            				?>
					            			</p>
				                        </a>
					            		<div class="pr-3 px-lg-3 flex-shrink-1 my-auto">
					            			<?php
					            			if ($course['cp']) {
						                        $cp = $course['cp'];
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
					            	</div>
			            		</div>
			            	</div>
			            </div>
			            <div class="flex-shrink-1 my-lg-auto mt-3">
			            	<!--
			            	<a class="btn btn-primary" href="<?php echo site_url ('student/courses/home/'.$coaching_id.'/'.$member_id.'/'.$course['course_id'].'/'.$batch['batch_id']); ?>">Course Home <i class="fa fa-arrow-right"></i></a>
			            -->
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
			<p>Not enroled in any course yet</p>
		<?php } ?>
	</div>

	<div class="col-md-3">
		<?php $this->load->view('users/inc/user_menu', $data); ?>
	</div>


</div>
