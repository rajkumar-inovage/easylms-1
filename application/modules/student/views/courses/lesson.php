<div class="row">
    <div class="col-12 " >
		<div class="card mb-4">
			<div class="card-body">
				<h4 class="card-title"><?php echo $lesson['title']; ?></h4>
				<hr>
				<?php echo $lesson['description']; ?>
			</div>
		</div>

		
		<div class="card mt-4 ">
		    <div class="card-body">
		        <h5 class="card-title">Pages</h5>
                <ul class="list-unstyled mb-0">
					<?php 
					$i = 1;
					if ( ! empty ($pages)) { 
						foreach ($pages as $row) { 
							?>
							<li class="mb-1">
		                        <a class="text-info " href="<?php echo site_url ('student/courses/learn/'.$coaching_id.'/'.$member_id.'/'.$batch_id.'/'.$course_id.'/'.$lesson_id.'/'.$row['page_id']); ?>" >
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
			