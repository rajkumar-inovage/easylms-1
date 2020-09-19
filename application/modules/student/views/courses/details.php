<div class="row">
	<div class="col-12 col-md-12 col-xl-12 ">
		<div class="card mb-4">
		    <div class="lightbox align-center text-center">
		    <?php if ( is_file($course['feat_img'])): ?>
		    	<a href="<?php echo site_url( $course['feat_img'] ); ?>">
		    		<img src="<?php echo site_url( $course['feat_img'] ); ?>" class="responsive border-0 card-img-top mb-3" style="max-height:400px; width:auto; max-width:100%"/>
		    	</a>
		    <?php else: ?>
		    	<a href="<?php echo site_url('contents/system/default_course.jpg'); ?>">
		    		<img src="<?php echo site_url('contents/system/default_course.jpg'); ?>" class="responsive border-0 card-img-top mb-3" />
		    	</a>
			<?php endif; ?>
		    </div>
		    <div class="card-body">
		    	<div class="mb-5">
		    		<div class="card-title">
		    			<div class="d-sm-flex">
		    				<div class="flex-grow-1">
		    					<h5 class=""><?php echo $course['title']; ?></h5>
		    				</div>
		    			</div>
		    		</div>
		    		<div class="description d-flex flex-column flex-grow-1 flex-shrink-1">
			        	<?php echo ($course['description']); ?>
			        </div>
			    </div>
			    <?php if ($course['curriculum']): ?>
				    <div class="mb-5">
				    	<h5 class="card-title">Curriculum</h5>
				    	<?php echo $course['curriculum']; ?>
				    </div>
				<?php endif; ?>
			</div>
		</div>

	</div>	
</div>