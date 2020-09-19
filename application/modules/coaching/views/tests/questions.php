<div class="row">
  <div class="col-12 mb-5">
	<?php 
	if ( ! empty ($results) ) {
  		echo form_open('coaching/tests_actions/remove_questions/'.$course_id.'/'.$test_id, array('class'=>'form-horizontol', 'id'=>'validate-1') );

		$num_parent = 1;
		foreach ( $results as $parent_id=>$all_questions) {
			$parent 	= $all_questions['parent'];
			$questions 	= $all_questions['questions'];
			?>
			<div class="card mb-3">
	            
	            <div class="w-100 card-body align-self-center border-bottom pb-2 d-flex flex-column flex-md-row justify-content-between min-width-zero align-items-md-center">
	            	<div>
						<span class="badge badge-primary">Section <?php echo $num_parent; ?></span>
						<div class="text-primary pt-2">
		            		<?php echo $parent['question']; ?>
		            	</div>
					</div>
					<?php if ($test['finalized'] == 0) : ?>
					<div class="text-right">
		            	<div class="">
		            		<div class="btn-group">
								<button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                    Add New
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
									<?php
									echo anchor ('coaching/tests/question_group_create/'.$coaching_id.'/'.$course_id.'/'.$test_id, '<i class="fa fa-plus"></i> Add Section', array('class'=>'dropdown-item'));
									echo anchor ('coaching/tests/question_create/'.$coaching_id.'/'.$course_id.'/'.$test_id.'/'.$parent_id, '<i class="fa fa-plus"></i> Add Question', array('class'=>'dropdown-item'));
									?>
                                </div>
                            </div>
		            	</div>
					</div>
					<?php endif; ?>
	            </div>

	            <!------ // Sub Questions // ------>
				<?php 
				$num_question = 1;
				if ( ! empty($questions)) {
					foreach ($questions as $id=>$row) {
						$index = $id + 1;
						?>
			            <div class="card-body border-bottom d-flex flex-column flex-lg-row">
			                <div class="list-item-heading flex-grow-1 my-auto">
			                    <span class="mr-3 float-left"><?php echo $num_question; ?>.</span>
			                    <div>
			                    	<?php echo $row['question']; ?>
			                    </div>
			                    <div>
			                    	<?php
										$template = 'view_'.$row['type'];
										$data['result'] = $row;
										$this->load->view (ANSWER_TEMPLATE . $template, $data);
			                    	?>
			                    </div>
			                </div>
			                <?php if ($test['finalized'] == 0) : ?>
			                <div class="flex-shrink-1 my-auto text-right">
			                    <div class="btn-group">
                            <a href="<?php echo site_url ('coaching/tests/question_create/'.$coaching_id.'/'.$course_id.'/'.$test_id.'/'.$row['parent_id'].'/'.$row['question_id'].'/'.$row['type']); ?>" class="btn btn-info"><i class="simple-icon-pencil "></i></a>			                    	
                            <a href="javascript:void(0)" class="btn btn-danger" onclick="show_confirm('Delete this question?', '<?php echo site_url ('coaching/tests_actions/remove_question/'.$coaching_id.'/'.$course_id.'/'.$test_id.'/'.$row['parent_id'].'/'.$row['question_id']); ?>')"><i class="simple-icon-trash"></i></a>
			                    </div>
			                </div>
			            	<?php endif; ?>
			            </div>
			            <?php
			            $num_question++;
					}
				}
				?>                
	        </div>
			
			<?php 
			$num_parent++;
		}
	} else { 
		?>
		<div class="alert alert-danger">
			<h4> <?php echo 'No questions added in test'; ?></h4>
			<p>You can <?php echo anchor ('coaching/tests/question_group_create/'.$coaching_id.'/'.$course_id.'/'.$test_id, 'Create Questions', array ('class'=>'btn btn-sm btn-primary') ); ?>  in this test.
			</p>
		</div>
	<?php } ?>
	</form>
  </div>
</div>