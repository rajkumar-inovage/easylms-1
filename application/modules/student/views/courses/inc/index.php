<div class="row">
    <?php if (!empty($courses)): ?>
      <?php foreach ($courses as $i => $course): ?>
         <div class="col-12 col-lg-12 mb-5">
          <div class="card flex-row listing-card-container">
              <div class="w-40 position-relative">
                  <a href="<?php echo site_url ('student/courses/home/'.$coaching_id.'/'.$member_id.'/'.$course['course_id']); ?>">
                    <?php if (is_file($course['feat_img'])): ?>
                      <img src="<?php echo site_url( $course['feat_img'] ); ?>" class="card-img-left img-responsive" style="width: 100%; max-height: 250px"/>
                    <?php else: ?>
                      <img src="<?php echo base_url( COURSE_DEFAULT_IMAGE); ?>" class="card-img-left img-responsive" style="width: 100%; max-height: 250px"/>
                    <?php endif; ?> 
                    <?php 
                    $week_now = date ('W');
                    $week_crt = date ('W', $course['created_on']);
                    if (($week_now - $week_crt) == 0 || ($week_now - $week_crt) == 1) {                      
                      ?>                     
                      <span class="badge badge-theme-1 position-absolute badge-top-left">NEW</span>
                      <?php                      
                    }
                    ?>
                  </a>
              </div>

              <div class="w-60 d-flex align-items-center">
                  <div class="card-body">
                      <a href="<?php echo site_url ('student/courses/home/'.$coaching_id.'/'.$member_id.'/'.$course['course_id']); ?>">
                          <h5 class="listing-heading ellipsis"><?php echo $course['title']; ?></h5>
                      </a>
                      <div class="text-danger">
                        <?php 
                        if ($course['cat_id'] > 0) {
                          echo '<span class="">'.$course['cat_title'].'</span>';
                        } else {
                          echo '<span class="">Uncategorized</span>';                          
                        }
                        ?>
                      </div>
                      <div class="text-info">
                        <?php
                        if ($course['enrolment_type'] == COURSE_ENROLMENT_DIRECT) {
                          echo '<span class="badge badge-secondary">Direct Enrolment</span>';
                        } else {
                          echo '<span class="badge badge-primary">Batch Enrolment</span>';
                        }
                        ?>
                      </div>
                      <div class="mt-2">
                        <?php
                        if ($course['price'] > 0) {
                          echo '<span class="badge badge-outline-danger">&#8377 '.$course['price'].'</span>';
                        } else {
                          echo '<span class="badge badge-outline-primary">-</span>';
                        }
                        ?>
                      </div>
                      <div class="listing-desc text-muted ellipsis mt-1">
                        <?php 
                          $desc = strip_tags($course['description']);
                          $desc = character_limiter ($desc, 100);
                          echo $desc;
                        ?>
                      </div>                      
                      <div class="">
                        <a href="<?php echo site_url ('student/courses/view/'.$coaching_id.'/'.$member_id.'/'.$course['course_id']); ?>" class="btn btn-primary align-self-center">Course Details</a>
                      </div>
                  </div>
              </div>
          </div>
        </div>


        <div class="card shadow mb-4 d-none">
          <div class="card-body d-flex flex-row">
            <?php if (is_file($course['feat_img'])): ?>
              <a class="d-flex" href="<?php echo site_url ('student/courses/view/'.$coaching_id.'/'.$member_id.'/'.$course['course_id']); ?>">
                <img src="<?php echo site_url( $course['feat_img'] ); ?>" class="img-thumbnail border-0  m-4 list-thumbnail align-self-center" />
              </a>
            <?php else: ?>
              <a class="d-flex" href="<?php echo site_url ('student/courses/view/'.$coaching_id.'/'.$member_id.'/'.$course['course_id']); ?>">
                <!--
                <img src="<?php echo site_url('contents/system/default_course.jpg'); ?>" class="img-thumbnail border-0 m-4 list-thumbnail align-self-center" />
                -->
                <span><i class="iconsminds-book heading-icon"></i></span>
              </a>
            <?php endif; ?>
            <div class=" d-flex flex-grow-1 min-width-zero">
                <div class=" pl-0 align-self-center d-flex flex-column flex-lg-row justify-content-between min-width-zero w-80">
                    <div class="min-width-zero">
                        <a href="<?php echo site_url ('student/courses/view/'.$coaching_id.'/'.$member_id.'/'.$course['course_id']); ?>" class="link-streched">
                            <div>
                              <?php 
                              if ($course['cat_id'] > 0) 
                                echo $course['cat_title']; 
                              else 
                                echo 'Uncategorized';
                              ?>
                                
                              </div>
                            <h5 class="mb-3 listing-heading ellipsis"><?php echo $course['title']; ?></h5>
                        </a>
                        <p class="w-15 w-sm-100">
                          <?php 
                          if ($course['enrolment_type'] == COURSE_ENROLMENT_DIRECT) 
                            echo '<span class="badge  badge-info">Direct Enrolment</span>';
                          else 
                            echo '<span class="badge  badge-dark">Batch Enrolment</span>';
                          ?>
                        </p>
                        <div class="text-muted">Course Details</div>
                        <p class="listing-desc ellipsis">
                          <?php
                            $description = strip_tags ($course['description']);
                            $description = character_limiter ($description, 250);
                            echo $description;
                          ?>
                        </p>
                        
                    </div>
                </div>
                <div class="d-flex flex-column align-self-center">
                  <a href="<?php echo site_url ('student/courses/view/'.$coaching_id.'/'.$member_id.'/'.$course['course_id']); ?>" class="btn btn-primary align-self-center">Course Details</a>
                </div>
            </div>
          </div>
          
          <div class="seperator "></div>

          <div class="px-4">
            <div class="d-flex justify-content-between">
                <a class="btn btn-link mb-1" data-toggle="collapse" href="#curriculum<?php echo $course['course_id']; ?>"
                  role="button" aria-expanded="true" aria-controls="curriculum<?php echo $course['course_id']; ?>">
                  Curriculum <i class="fa fa-arrow-right"></i>
                </a>
            </div>
          </div>

          <div class="collapse card-footer" id="curriculum<?php echo $course['course_id']; ?>">

            <div class="">
                <?php 
                 if ($course['curriculum']) {
                  $curriculum = strip_tags($course['curriculum']);
                  echo character_limiter ($curriculum, 250); 
                  ?>
                  <a href="<?php echo site_url ('student/courses/view/'.$coaching_id.'/'.$member_id.'/'.$course['course_id']); ?>" class="btn btn-xs btn-outline-primary">Details</a>
                    <?php
                  }
                  ?>
            </div>

          </div>
        </div>       
      <?php endforeach;?>
    <?php else: ?>
      <div class="alert alert-danger" role="alert">There are no courses for you right now.</div>
    <?php endif;?>
  </div> 
</div>