<div class="row mb-4">
    <!-- Contents -->
    <div class="col-lg-12 col-md-12 mb-4">    	
    	<?php if ($page_id > 0) { ?>
    		<div class="card">
				<div class="card-body">
					<h3 class="card-title"><?php echo $lesson['title']; ?></h3>
					<h4><?php echo $page['title']; ?></h4>
					<div class="separator mb-4"></div>

					<?php echo $page['content']; ?>

				</div>

				<div class="card-body">
					<ul class="list-unstyled ">
					<?php
					//$attachments = $page['att'];
					if (! empty ($attachments)) {
						foreach ($attachments as $att) {
							?>
							<li class=" media">
								<div class="media-body">
									<?php if ($att['att_type'] == LESSON_ATT_YOUTUBE) { ?>
        	                    		<?php $youtubeURL = getYoutubeEmbedUrl($att['att_url']); ?>
        								<?php if ($youtubeURL !== null): ?>
        								<iframe class="w-100" src="<?php echo $youtubeURL; ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        								<?php else : ?>
        								<div class="alert alert-info">Invalid YouTube URL.</div>
        								<?php endif; ?>
										<?php echo $att['title']; ?>
									<?php } else if ($att['att_type'] == LESSON_ATT_EXTERNAL) { ?>
				                        <a href="<?php echo $att['att_url']; ?>" target="_blank">
				                            <?php echo $att['title']; ?>
				                        </a>
									<?php } else { ?>
				                        <a href="<?php echo $att['att_url']; ?>" target="_blank">
				                            <?php echo $att['title']; ?>
				                        </a>
									<?php } ?>
								</div>								
							</li>
							<?php
						}
					}
					?>
					</ul>
				</div>
			</div>

    	<?php } else if ($lesson_id > 0) { ?>
    		<div class="card mb-4">
				<div class="card-body">
					<h4 class="card-title"><?php echo $lesson['title']; ?></h4>
					<hr>
					<?php echo $lesson['description']; ?>
				</div>
			</div>

			
			<div class="card mt-4">
			    <div class="card-body">
			        <h5 class="card-title">Content</h5>
			        <div class="d-flex flex-row">
			            <div class="w-50">
			                <ul class="list-unstyled mb-0">
							<?php 
							$i = 1;
							if ( ! empty ($pages)) { 
								foreach ($pages as $row) { 
									?>
									<li class="mb-1">
				                        <a class="" href="<?php echo site_url ('student/courses/try_course/'.$coaching_id.'/'.$member_id.'/'.$course_id.'/'.$batch_id.'/'.$lesson_id.'/'.$row['page_id']); ?>" >
											<?php echo $row['title']; ?>
										</a>
				                    </li>
									<?php 
									$i++; 
								} 
							} else {
								?>
								<li class=" ">
									<span class="text-danger">No page found</span>
								</li>
								<?php
							}
							?>
							</ul>
			            </div>
			        </div>
			    </div>
			</div>	

    	<?php } else { ?>

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
			              	  <?php 
			              	  if ($row['for_demo'] == 1) {
			              	  	if ($row['resource_type'] == COURSE_CONTENT_TEST) { 
			              	  		$href = site_url ('student/tests/take_test/'.$coaching_id.'/'.$member_id.'/'.$course_id.'/'.$row['resource_id']); 
			              	  	} else { 
			              	  		$href = site_url ('student/courses/try_course/'.$coaching_id.'/'.$member_id.'/'.$course_id.'/'.$batch_id.'/'.$row['resource_id']);
			              	  	}
			              	  } else {
			              	  	$href = '#';
			              	  }
			              	  ?>
			                  <a class="list-item-heading mb-0 w-40 w-xs-100 mt-0" href="<?php echo $href; ?>">
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
			                    <span class="badge badge-light"></span>
			                  </p>
			                  <p class="mb-0 text-muted text-small w-15 w-xs-100">
			                    <?php 
			                    if ($row['resource_type'] == COURSE_CONTENT_TEST) {
				                    echo $row['time_min'] . 'mins';
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
			                  <div class="w-30 w-xs-100">
			                  	<?php if ($row['for_demo'] == 1) { ?>
				                    <?php if ($row['resource_type'] == COURSE_CONTENT_TEST) { ?>
										<a href="<?php echo site_url ('student/tests/take_test/'.$coaching_id.'/'.$member_id.'/'.$course_id.'/'.$row['resource_id']); ?>" class="btn btn-outline-danger shadow-sm float-right">Take Test <i class="fa fa-arrow-right"></i></a>
				                    <?php } else { ?>
										<a href="<?php echo site_url ('student/courses/try_course/'.$coaching_id.'/'.$member_id.'/'.$course_id.'/'.$batch_id.'/'.$row['resource_id']); ?>" class="btn btn-outline-primary shadow-sm float-right">View Chapter <i class="fa fa-arrow-right"></i></a>
				                    <?php } ?>
			                  	<?php } else { ?>
			                  		<span class="fa fa-lock float-right"></span>
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
    	<?php } ?>
	</div>
</div>