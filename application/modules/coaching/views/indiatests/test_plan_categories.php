<div class="row equal-height-container">
	<?php 
	$i = 1;
	if ( ! empty ($categories)) {
		foreach ($categories as $row) {
			//$plan_exists = $this->plans_model->its_test_plan_cat_exists ($row['id']);
			?>
		  	<div class="col-md-6 col-lg-4 mb-4 col-item">
			  	<div class="card shadow-sm">
				  	<div class="card-body">
						<h4 class="card-title heading-icon">
							<?php echo $row['title']; ?>
						</h4>
						<?php 
							$description = strip_tags($row['description']); 
							echo character_limiter ($description, 150);
						?>
						<hr>
						<a href="<?php echo site_url('coaching/indiatests/test_plans/'.$coaching_id.'/'.$course_id.'/'.$row['id'].'/'.$amount); ?>" class="btn btn-outline-danger btn-sm">Tests
						</a>
						<a href="<?php echo site_url('coaching/indiatests/lesson_plans/'.$coaching_id.'/'.$course_id.'/'.$row['id'].'/'.$amount); ?>" class="btn btn-outline-warning btn-sm">Lessons
						</a>
					</div>
				</div>
			</div>
			<?php 
			$i++;
		}
	} else { 
		?>
		<div class="alert alert-danger ">
			<div class="">No plans found</div>
		</div>
	<?php } // if result ?>		
</div>

<div class="row text-center mt-4 mx-0">
	<div class="mb-3">
		<?php //echo anchor ('coaching/plans/index/'.$coaching_id.'/'.$course_id, 'Purchased Plans', ['class'=>'btn btn-info']); ?>
	</div>
</div>