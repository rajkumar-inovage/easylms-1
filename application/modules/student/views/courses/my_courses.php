<div class="row">
  <?php if (!empty($courses)): ?>
    <?php foreach ($courses as $i => $course): 
      // Category
      $category_id = isset($course['cat_id']) ? $course['cat_id'] : $cat_id;
      // Course Batch
      if (! empty ($course['batch'])) {
        $batch = $course['batch'];
        $batch_id = $batch['batch_id'];
      } else {
        $batch_id = 0;
      }
      // Last Activity
      $last_activity = $course['la'];
      if (! empty($last_activity)) {
        $lesson_id = $last_activity['lesson_id'];
        $page_id = $last_activity['page_id'];
        $course_url = site_url ('student/courses/learn/'.$coaching_id.'/'.$member_id.'/'.$batch_id.'/'.$course['course_id'].'/'.$lesson_id.'/'.$page_id);
       } else {
        $course_url = site_url ('student/courses/learn/'.$coaching_id.'/'.$member_id.'/'.$batch_id.'/'.$course['course_id']);
       }
      ?>
      <div class="col-12 col-lg-12 mb-5">
        <div class="card flex-row listing-card-container">
            <div class="w-40 position-relative align-md-center text-center">
                <a href="<?php echo $course_url; ?>">
                  <?php if (is_file($course['feat_img'])): ?>
                    <img src="<?php echo site_url( $course['feat_img'] ); ?>" class="card-img-left" style="width: 100%; max-height: 250px" />
                  <?php else: ?>
                    <img src="<?php echo base_url( COURSE_DEFAULT_IMAGE); ?>" class="card-img-left" style="width: 100%; max-height: 250px"/>
                  <?php endif; ?> 
                  <?php 
                  $week_now = date ('W');
                  $week_crt = date ('W', $course['created_on']);
                  if (($week_now - $week_crt) == 0 || ($week_now - $week_crt) == 1) {
                    /*
                    ?>                     
                    <span class="badge badge-theme-1 position-absolute badge-top-left">NEW</span>
                    <?php
                    */
                  }
                  ?>
                  <?php 
                  if ($course['cat_id'] > 0) 
                    echo '<span class="badge badge-theme-1 position-absolute badge-top-left">'.$course['cat_title'].'</span>';
                  ?>
                </a>
            </div>

            <div class="w-60 d-flex align-items-center">
                <div class="card-body">
                    <a href="<?php echo site_url ('student/courses/home/'.$coaching_id.'/'.$member_id.'/'.$course['course_id'].'/'.$batch_id); ?>">
                        <h5 class="mb-1 listing-heading ellipsis"><?php echo $course['title']; ?></h5>
                    </a>
                    <div class="text-info">
                      <?php
                      if (! empty ($course['batch'])) {
                        $batch = $course['batch'];
                        echo '<span class="">'.$batch['batch_name'].'</span>';
                      } else {
                        echo '<span class="">Direct Enrolment</span>';
                      }
                      ?>
                    </div>
                    <div class="mb-4">
                        <?php
                        $cp = $course['cp'];
                        if ($cp['total_pages'] > 0) {
                            $cp_percent = ($cp['total_progress']/$cp['total_pages']) * 100;
                        } else {
                            $cp_percent = 0;
                        }
                        ?>
                        <p class="mb-2">
                            <span>Completed</span>
                            <span class="float-right text-muted"><?php echo $cp['total_progress']; ?>/<?php echo $cp['total_pages']; ?></span>
                        </p>
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo $cp_percent; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $cp_percent; ?>%;"></div>
                        </div>
                    </div>
                    <div class="">
                      <?php 
                      if (! empty($last_activity)) {
                        echo '<a href="'.$course_url.'" class="btn btn-primary ">Continue <i class="iconsminds-arrow-out-right"></i> </a>';
                       } else {
                        echo '<a href="'.$course_url.'" class="btn btn-primary ">Start <i class="iconsminds-arrow-out-right"></i> </a>';
                       }
                      ?>
                    </div>
                </div>
            </div>
        </div>
      </div>
    <?php endforeach;?>
  <?php else: ?>
     <div class="col-md-12">
      <div class="alert alert-danger" role="alert">
        You are not enroled in any course yet. Browse the <a href="<?php echo site_url('student/courses/index/'.$coaching_id.'/'.$member_id); ?>" class="btn btn-outline-primary btn-sm">Course Catalog</a> to enrol in courses.
      </div>
     </div>
  <?php endif;?>
</div>