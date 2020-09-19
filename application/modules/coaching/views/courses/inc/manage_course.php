<div class="app-menu">
    <div class="p-4 h-100">
        <div class="scroll ps">
             <?php if( is_file($course['feat_img'])): ?>
                <img src="<?php echo site_url( $course['feat_img'] ); ?>" class="responsive border-0 card-img-top mb-3" />
            <?php else: ?>
                <img src="<?php echo site_url('contents/system/default_course.jpg'); ?>" class="responsive border-0 card-img-top mb-3" />
            <?php endif; ?>
            <p> 
                <div class="text-muted text-small">Course Title</div>
                <div><?php echo $course['title']; ?></div>
            </p>
            
            <p>
                <div class="text-muted text-small">Enrolment Type</div>
                <div>
                    <?php 
                        if ($course['enrolment_type'] == COURSE_ENROLMENT_DIRECT) 
                            echo 'Direct Enrolment';
                        else 
                            echo 'Batch Enrolment';
                    ?>
                </div>
            </p>

            <p>
                <div class="text-muted text-small">Status</div>
                <div>
                    <?php 
                        if ($course['status'] == COURSE_STATUS_ACTIVE) 
                            echo '<span class="badge badge-success">Published</span>';
                        else 
                            echo '<span class="badge badge-danger">Unpublished</span>';
                    ?>
                </div>
            </p>
            
            <hr>

            <p class="text-muted text-small">Quick Links</p>
            <ul class="list-unstyled mb-3">
                <li>
                    <?php echo anchor ('coaching/courses/manage/'.$coaching_id.'/'.$course_id, '<i class="simple-icon-settings heading-icon"></i> Manage'); ?>
                </li>
                <li>
                    <?php echo anchor ('coaching/lessons/index/'.$coaching_id.'/'.$course_id, '<i class="simple-icon-book-open heading-icon"></i> Chapters'); ?>
                </li>
                <li>
                    <?php echo anchor ('coaching/tests/index/'.$coaching_id.'/'.$course_id, '<i class="simple-icon-puzzle heading-icon"></i> Tests'); ?>
                </li>
                
                <?php if ($is_admin == true) { ?>
                    <li>
                        <?php echo anchor ('coaching/courses/teachers/'.$coaching_id.'/'.$course_id, '<i class="iconsminds-business-man-woman heading-icon"></i> Teachers'); ?>
                    </li>
                <?php } ?>

                    <li>
                        <?php echo anchor ('coaching/courses/organize/'.$coaching_id.'/'.$course_id, '<i class="simple-icon-calendar heading-icon"></i> Organize'); ?>
                    </li>
                    <li>
                        <?php echo anchor ('coaching/courses/preview/'.$coaching_id.'/'.$course_id, '<i class="simple-icon-eye heading-icon"></i> Preview'); ?>
                    </li>
                <?php if ($course['enrolment_type'] == COURSE_ENROLMENT_DIRECT) { ?>
                    <li>
                        <?php echo anchor ('coaching/enrolments/course_users/'.$coaching_id.'/'.$course_id, '<i class="iconsminds-student-male-female heading-icon"></i> Users And Reports'); ?>
                        </a>
                    </li>
                <?php } else { ?>
                    <li>
                        <?php echo anchor ('coaching/enrolments/batches/'.$coaching_id.'/'.$course_id, '<i class="simple-icon-calendar heading-icon"></i> Batches And Schedule'); ?>
                        </a>
                    </li>
                <?php } ?>
            </ul>


        </div>
    </div>
    <a class="app-menu-button d-inline-block d-xl-none" href="#">
        <i class="simple-icon-options"></i>
    </a>
</div>