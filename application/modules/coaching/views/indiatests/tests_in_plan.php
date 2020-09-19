<?php if ($course_id == 0) { ?>
	<p class="text-danger">These tests can be added into any course, when you browse to this page from within a course</p>
<?php } ?>

<?php echo form_open ('coaching/indiatest_actions/import_tests/'.$coaching_id.'/'.$course_id.'/'.$plan_id, ['id'=>'validate-1']) ;?>
	<?php if ($course_id > 0) { ?>
		<div class="row mb-4">
			<div class="col-12 ">
				<input type="submit" name="" value="Add To Course" class="btn btn-primary btn-lg ">
			</div>
		</div>
	<?php } ?>
	<div class="row">
	    <div class="col-12 list" data-check-all="checkAll">
			<?php
			$i = 1;
			if ( ! empty($tests)) {
				foreach ($tests as $row) {
					$courses = $row['courses'];
					?>
		            <div class="card mb-3">
		                <div class="card-body d-flex flex-grow-1 min-width-zero">
		                    <span class="align-self-sm-center pr-4">
		                        <?php echo $i; ?>
		                    </span>
		                    <div class="flex-grow-1 d-flex flex-column flex-md-row justify-content-between min-width-zero align-self-center align-items-md-center overflow-hidden">
		                        <div class="list-item-heading mb-0 w-60 w-xs-100">
									<div class="">
										<?php echo $row['title']; ?>
									</div>
									<div class="w-xs-80">
										<?php
											if (! empty ($courses)) {
												foreach ($courses as $course) {
													echo '<span class="badge badge-secondary mr-2 pb-1 mt-1 truncate ellipsis">'.$course['title'].'</span>';
												}
											} 
										?>
									</div>
								</div>
		                        <p class="mb-0 text-muted text-small w-20 w-xs-100 mt-2 mt-md-0">
		                        	<?php echo $row['time_min'] . ' mins'; ?>
		                        </p>		                        
		                    </div>
		                    <?php if ($course_id > 0 ) { ?>
			                    <label class="custom-control custom-checkbox align-self-sm-center">
			                        <input type="checkbox" class="custom-control-input" name="tests[]" value="<?php echo $row['test_id']; ?>">
			                        <span class="custom-control-label">&nbsp;</span>
			                    </label>
		                    <?php } ?>
		                </div>
		            </div>
					<?php
					$i++;
				}
			} else {
				?>
				<div class="col-12">
					<div class="alert alert-danger ">
						<span class="">No tests found</span>
					</div>
				</div>
				<?php
			}
			?>
		</div>
	</div>

	<?php if ($course_id > 0) { ?>
		<div class="row my-3">
			<div class="col-12">
				<input type="submit" name="" value="Add To Course" class="btn btn-primary">
			</div>
		</div>
	<?php } ?>
<?php echo form_open (); ?>