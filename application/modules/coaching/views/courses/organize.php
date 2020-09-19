<div id="list"></div>

<div class="row">
    <div class="col-md-12 " >
		<?php if ( ! empty ($contents)) { ?>
			<ul class="list-group" id="simpleList">
			<?php 
			$i = 1;
			$x = 1;
			foreach ($contents as $position=>$row) { 
				?>
				<li class="list-group-item d-flex justify-content-between" data-id="<?php echo $row['resource_type']; ?>-<?php echo $row['resource_id']; ?>">
					<div class="w-60">
						<span class="mr-2"><i class="simple-icon-cursor-move"></i></span>
						<span><?php echo $row['title']; ?></span>
					</div>
					<div class="">
	                    <?php if ($row['resource_type'] == COURSE_CONTENT_CHAPTER) { ?>
							<span class="badge badge-primary">Chapter</span>
						<?php } else { ?>
							<span class="badge badge-danger">Test</span>
						<?php } ?>
					</div>
					<div class="ml-3">
					</div>
				</li>
				<?php 
				$i++; 
				$x++;
			} 
			?>
			</ul>
		<?php } else { ?>
			<div class="alert alert-danger">No content in this course</div>
		<?php } ?>
	</div>
</div>