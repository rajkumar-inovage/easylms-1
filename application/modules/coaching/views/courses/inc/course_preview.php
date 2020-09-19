<div class="app-menu">
    <div class="p-4 h-100">
        <div class="scroll ps">
            <p class="mb-3"><?php echo anchor ('coaching/courses/manage/'.$coaching_id.'/'.$course_id, $course['title'], ['class'=>'text-primary font-weight-bold']); ?></p>             
            <p class="text-muted text-small">Content</p>
            <ul class="list-unstyled" data-link="menu" id="courseContent">
              <?php 
              if (! empty ($contents)) {
                foreach ($contents as $row) {
                  if ($row['resource_type'] == COURSE_CONTENT_TEST) { 
                    ?>
                    <li>
                          <a href="<?php echo site_url ('coaching/tests/preview_test/'.$coaching_id.'/'.$course_id.'/'.$row['resource_id']); ?>" class="d-flex justify-content-between font-weight-bold text-info">
                             <span class="d-inline-block"><?php echo $row['title']; ?></span>
                             <div>
                               <span class="badge badge-danger mr-2">Test</span>
                             </div>
                          </a>
                          <div class="separator"></div>
                      </li>
                      <?php
                  } else {
                    ?>
                      <li>
                          <a href="#" data-toggle="collapse" data-target="#chapter<?php echo $row['resource_id']; ?>" aria-expanded="true"
                              aria-controls="chapter<?php echo $row['resource_id']; ?>" class="rotate-arrow-icon font-weight-bold ">
                              <i class="simple-icon-arrow-down"></i> <span class="d-inline-block"><?php echo $row['title']; ?></span>
                          </a>
                          <div class="separator"></div>
                          <?php if (! empty ($row['pages'])) { ?>
                            <div id="chapter<?php echo $row['resource_id']; ?>" class="collapse show ml-1" data-parent="#courseContent">
                                <ul class="list-unstyled inner-level-menu">
                                  <?php foreach ($row['pages'] as $page) { ?>
                                    <li class="border-bottom d-flex">
                                        <a href="<?php echo site_url ('coaching/courses/preview/'.$coaching_id.'/'.$course_id.'/'.$row['resource_id'].'/'.$page['page_id']); ?>">
                                            <span class="d-inline-block <?php if ($page_id == $page['page_id']) echo 'text-primary font-weight-bold'; ?>">
                                              <i class="far fa-circle"></i> <?php echo $page['title']; ?>
                                            </span>
                                        </a>
                                    </li>
                                  <?php } ?>
                                </ul>
                            </div>
                          <?php } ?>
                      </li>
                    <?php
                  }
                }
              }
              ?>

            </ul>
      </div>
    </div>
</div>