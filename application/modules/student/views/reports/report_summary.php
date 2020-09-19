<div class="card"> 
	<div class="card-body">
		<div class="row">
			<div class="col-md-9">
				<canvas id="briefChart" width="100%" ></canvas>
			</div>

			<div class="col-md-3 align-self-center">

				<h4>Score</h4>
				
				<div class="mb-4 border-bottom">
                    <p class="mb-2">
                        <span>Test Marks</span>
                        <span class="float-right text-dark"><?php echo $testMarks; ?></span>
                    </p>
                </div>
				<div class="mb-4 border-bottom">
                    <p class="mb-2">
                        <span>Obtained Score</span>
                        <span class="float-right text-dark"><?php echo $ob_marks[$attempt_id]['obtained']; ?></span>
                    </p>
                </div>
				<div class="mb-4 border-bottom">
                    <p class="mb-2">
                        <span>Max Score</span>
                        <span class="float-right text-dark"><?php echo $max_marks; ?></span>
                    </p>
                </div>
            </div>
		</div>
	</div>
</div>
