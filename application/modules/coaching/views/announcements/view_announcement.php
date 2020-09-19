<div class="row justify-content-center">
	<div class="col-md-12">
		<div class="card">
			
			<div class="card-body">
					<div class="form-group font-weight-bold">
						<h2><?php echo ($result['title']); ?></h2>
					</div>

					<div class="form-group ">
						<?php echo $result['description']; ?>
					</div>

					<div class="form-group">
						<div class="d-flex justify-content-between">
							<h3 class="badge badge-info mb-1">
								<?php echo form_label('Start Date', '', array('class'=>'control-label font-weight-bold mb-0')); ?>
								<?php 
									if ($result['start_date'] != '') {
										$start_date = date ('d-m-Y', $result['start_date']);
									} else {
										$start_date = date("d-m-Y");
									}
								?>
								<?php echo ($start_date); ?>
							</h3>
							<h3 class="badge badge-info mb-1">
								<?php echo form_label('End Date', '', array('class'=>'control-label font-weight-bold mb-0')); ?>
								<?php 
									if ($result['end_date'] != '') {
										$end_date = date ('d-m-Y', $result['end_date']);
									} else {
										$end_date = date("d-m-Y", time ()+86400);
									}
								?>
								<?php echo ($end_date); ?>
							</h3>
						</div>
					</div>
					<?php if( USER_ROLE_COACHING_ADMIN === intval($this->session->userdata('role_id')) ):?>
					<div class="form-group row d-flex">
						<div class="col-md-6 mt-3">
							<?php if ($result['status'] == 1 ) echo 'Published'; else 'Unpublished'; ?>
						</div>
					</div>
					<?php endif; ?>
					</div>					
				</div>
			</div>
		</div>
	</div>
</div>