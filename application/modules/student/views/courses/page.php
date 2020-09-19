<div class="row">
    <div class="col-12 list">
		<div class="card">
			<div class="card-body">
				<h3 class="card-title"><?php echo $lesson['title']; ?></h3>
				<h4><?php echo $page['title']; ?></h4>
				<div class="separator mb-4"></div>
				<?php echo $page['content']; ?>
			</div>

			<div class="card-body">
				<?php
				if (! empty ($attachments)) {
					foreach ($attachments as $att) {
						?>
						<div class="d-flex flex-row mb-3 border-bottom justify-content-between">
		                    <div class="flex-grow-1">
		                    	<span class="img-thumbnail border-0 rounded-circle list-thumbnail align-self-center xsmall">
								</span>
		                    	<?php if ($att['att_type'] == LESSON_ATT_YOUTUBE) { ?>
		                    		<h3 class="mb-2 flex-grow-1"><?php echo $att['title']; ?></h3>
    	                    		<?php $youtubeURL = getYoutubeEmbedUrl($att['att_url']); ?>
    								<?php if ($youtubeURL !== null): ?>
    								<iframe class="w-100" src="<?php echo $youtubeURL; ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    								<?php else : ?>
    								<div class="alert alert-info">Invalid YouTube URL.</div>
    								<?php endif; ?>
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
		                </div>
						<?php
					}
				}
				?>
			</div>
		</div>
	</div>
</div>