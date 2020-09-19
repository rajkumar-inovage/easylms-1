<div class="app-menu">	
	<div class="p-4 h-100">
    	<div class="scroll">
        <div class="mb-2">
		  <div class="heading-icon pb-3">
		  	Questions
		  </div>
		  <div class="separator mb-2"></div>
		  <ul class="list-group">
			<?php 
			$i = 1;
			if (! empty ($questions)) {
				foreach ($questions as $q) {
					?>
					<li class="border-bottom d-flex my-2 pb-3">
						<div class="flex-shrink-1 pr-2<?php echo ($question_id == $q['question_id'])? ' text-primary': null; ?>">
							<?php echo $i; ?>-
						</div>
						<div class="flex-grow-1">
							<?php 
							$qn = strip_tags ($q['question']); 
							$qn = character_limiter ($qn, 100);
							?>
							<a class="py-0<?php echo ($question_id == $q['question_id'])? ' text-primary': null; ?>" href="<?php echo site_url ('coaching/tests/question_create/'.$coaching_id.'/'.$course_id.'/'.$test_id.'/'.$q['parent_id'].'/'.$q['question_id'].'/'.$q['type']); ?>" class="<?php if ($q['question_id'] == $question_id) echo 'text-danger'; ?>"><?php echo $qn; ?></a>
						</div>
						
					</li>
					<?php
					$i++;
				}
				
			} else {
				?>
				<li class="list-group-item ">
					<span class="text-danger">No questions found</span>
				</li>
				<?php
			}
			?>
		  </ul>
		</div>
		</div>
	</div>
	<a class="app-menu-button d-inline-block d-xl-none" href="#">
		<i class="simple-icon-options"></i>
	</a>
</div>