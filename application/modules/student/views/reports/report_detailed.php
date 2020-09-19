<div class="card">
    <div class="card-header pl-0 pr-0">
        <ul class="nav nav-tabs card-header-tabs  ml-0 mr-0" role="tablist">
            <li class="nav-item w-30 text-center">
                <a class="nav-link active" id="first-tab" data-toggle="tab"
                    href="#firstFull" role="tab" aria-controls="first"
                    aria-selected="true">Correct <span class="badge badge-success"><?php echo $brief['correct']; ?></span></a>
            </li>
            <li class="nav-item w-30 text-center">
                <a class="nav-link" id="second-tab" data-toggle="tab" href="#secondFull"
                    role="tab" aria-controls="second" aria-selected="false">Wrong <span class="badge badge-danger"><?php echo $brief['wrong']; ?></span></a>
            </li>
            <li class="nav-item w-30 text-center">
                <a class="nav-link" id="third-tab" data-toggle="tab" href="#thirdFull"
                    role="tab" aria-controls="third" aria-selected="false">Not Answered <span class="badge badge-light"><?php echo $brief['not_answered']; ?></span></a>
            </li>
        </ul>
    </div>


    <div class="tab-content">
        <div class="tab-pane fade show active" id="firstFull" role="tabpanel" aria-labelledby="first-tab">        
            <?php
            if (isset($response[TQ_CORRECT_ANSWERED])) {
                $answered = $response[TQ_CORRECT_ANSWERED];
                $i = 1;
                if (! empty ($answered)) {
                    foreach ($answered as $question) {
                        ?>
                        <div class=" d-flex flex-row mb-3">
                            <div class="d-flex flex-grow-1 min-width-zero">
                                <div class="card-body align-self-center d-flex flex-column flex-md-row justify-content-between min-width-zero align-items-md-center">
                                    <p class="list-item-heading mb-0 truncate w-40 w-xs-100">
                                        <span class="float-left mr-2"><?php echo $i; ?>. </span>
                                        <?php echo strip_tags($question['question']); ?>
                                    </p>
                                    <p class="mb-0 text-primary w-20 w-xs-100 text-center">
                                        
                                    </p>
                                    <p class="mb-0 w-20 w-xs-100 text-center">
                                        <?php 
                                        echo $question['marks'].'/'.$question['marks'];
                                        /*
                                        if ($type == TQ_CORRECT_ANSWERED) {
                                            echo $question['marks'].'/'.$question['marks'];
                                        } else if ($type == TQ_WRONG_ANSWERED) {
                                            echo '0/'.$question['marks'];
                                        } else {
                                            echo '0/'.$question['marks'];
                                        }
                                        */
                                        ?>
                
                                    </p>
                                    <p class="mb-0 text-primary w-20 w-xs-100 text-center">
                                        <i class="simple-icon-check text-success"></i>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <?php
                        $i++;
                    }
                }
            } else {
                echo '<p class="text-danger">Nothing here</p>';
            }
            ?>
        </div>
        <div class="tab-pane fade" id="secondFull" role="tabpanel"
            aria-labelledby="second-tab">
            <?php
            if (isset($response[TQ_WRONG_ANSWERED])) {
                $answered = $response[TQ_WRONG_ANSWERED];
                $i = 1;
                if (! empty ($answered)) {
                    foreach ($answered as $question) {
                        ?>
                        <div class=" d-flex flex-row mb-3">
                            <div class="d-flex flex-grow-1 min-width-zero">
                                <div class="card-body align-self-center d-flex flex-column flex-md-row justify-content-between min-width-zero align-items-md-center">
                                    <p class="list-item-heading mb-0 truncate w-40 w-xs-100">
                                        <span class="float-left mr-2"><?php echo $i; ?>. </span>
                                        <?php echo strip_tags($question['question']); ?>
                                    </p>
                                    <p class="mb-0 text-primary w-20 w-xs-100 text-center">
                                        
                                    </p>
                                    <p class="mb-0 text-primary w-20 w-xs-100 text-center">
                                        <?php 
                                        echo '0/'.$question['marks'];
                                        ?>            
                                    </p>
                                    <p class="mb-0 text-primary w-20 w-xs-100 text-center">
                                        <i class="simple-icon-close text-danger"></i>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <?php
                        $i++;
                    }
                }
            } else {
                echo '<p class="text-danger">Nothing here</p>';
            }
            ?>

        </div>
        <div class="tab-pane fade show " id="thirdFull" role="tabpanel"
            aria-labelledby="third-tab">
            <?php
            if (isset($response[TQ_NOT_ANSWERED])) {
                $answered = $response[TQ_NOT_ANSWERED];
                $i = 1;
                if (! empty ($answered)) {
                    foreach ($answered as $question) {
                        ?>
                        <div class=" d-flex flex-row mb-3">
                            <div class="d-flex flex-grow-1 min-width-zero">
                                <div class="card-body align-self-center d-flex flex-column flex-md-row justify-content-between min-width-zero align-items-md-center">
                                    <p class="list-item-heading mb-0 truncate w-40 w-xs-100">
                                        <span class="float-left mr-2"><?php echo $i; ?>. </span>
                                        <?php echo strip_tags($question['question']); ?>
                                    </p>
                                    <p class="mb-0 text-primary w-20 w-xs-100 text-center">
                                        
                                    </p>
                                    <p class="mb-0 text-primary w-20 w-xs-100 text-center">
                                        <?php 
                                        echo '0/'.$question['marks'];
                                        /*
                                        if ($type == TQ_CORRECT_ANSWERED) {
                                            echo $question['marks'].'/'.$question['marks'];
                                        } else if ($type == TQ_WRONG_ANSWERED) {
                                            echo '0/'.$question['marks'];
                                        } else {
                                            echo '0/'.$question['marks'];
                                        }
                                        */
                                        ?>
                
                                    </p>
                                    <p class="mb-0 text-primary w-20 w-xs-100 text-center">
                                        <i class="simple-icon-exclamation "></i>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <?php
                        $i++;
                    }
                }
            } else {
                echo '<p class="text-danger">Nothing here</p>';                
            }
            ?>
        </div>
    </div>
</div>
    

<div class="row d-none">
    <div class="col-12 list" >
		<?php
		$i = 1;
		if ( ! empty($response)) {
			foreach ($response as $type=>$row) {
				foreach ($row as $question) {
					?>
                    <div class="card d-flex flex-row mb-1">
                        <div class="d-flex flex-grow-1 min-width-zero">
                            <div class="card-body align-self-center d-flex flex-column flex-md-row justify-content-between min-width-zero align-items-md-center">
                                <p class="list-item-heading mb-0 truncate w-40 w-xs-100" href="">
                                    <?php echo $question['question']; ?>
                                </p>
                                <p class="mb-0 text-muted text-small w-15 w-xs-100">
                                </p>
                                <p class="mb-0 text-muted text-small w-15 w-xs-100">
                                    <?php 
                                    if ($type == TQ_CORRECT_ANSWERED) {
                                        echo $question['marks'].'/'.$question['marks'];
                                    } else if ($type == TQ_WRONG_ANSWERED) {
                                        echo '0/'.$question['marks'];
                                    } else {
                                        echo '0/'.$question['marks'];
                                    }
                                    ?>
                                </p>
                                <div class="w-15 w-xs-100">
                                </div>
                            </div>
                            <label class="custom-control custom-checkbox mb-1 align-self-center pr-4">
                                <?php
                                    if ($type == TQ_CORRECT_ANSWERED) {
                                        echo '<span class="badge badge-success"><i class="fa fa-check fa-1x"></i></span>';
                                    } else if ($type == TQ_WRONG_ANSWERED) {
                                        echo '<span class="badge badge-danger"><i class="fa fa-times fa-1x"></i></span>';
                                    } else {
                                        echo '<span class="badge badge-secondary">Not Answered</span>';
                                    }
                                ?>
                            </label>
                        </div>
                    </div>

					<?php
					$i++;
				}
			}
		} 
		?>
	</div>
</div>