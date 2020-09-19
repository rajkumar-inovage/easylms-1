<div class="mb-2">
    <a class="btn pt-0 pl-0 d-inline-block d-md-none" data-toggle="collapse" href="#displayOptions"
        role="button" aria-expanded="true" aria-controls="displayOptions">
        Display Options
        <i class="simple-icon-arrow-down align-middle"></i>
    </a>
    <div class="collapse d-md-block" id="displayOptions">
        <div class="d-sm-flex align-items-end">
            <?php echo form_open('coaching/tests_actions/search_tests/'.$coaching_id, array('class'=>"mt-3", 'id'=>'search-form')); ?>
            <div class="search-sm d-block d-sm-inline-block float-md-left mr-1 mb-1 align-top">
                <input type="hidden" name="course_id" value="<?php echo $course_id; ?>" />
                <input type="hidden" name="status" value="<?php echo $status; ?>" />
                <input type="search" name="search_text" placeholder="Search..." id="search-text" />
            </div>
            <?php echo form_close(); ?>
            <div class="d-inline-block">
                <small class="d-block text-center">Status</small>
                <div class="btn-group float-md-left mr-1 mb-1">
                    <button class="btn btn-outline-dark btn-xs dropdown-toggle" type="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?php echo $status_label; ?>
                    </button>
                    <div class="dropdown-menu">
                        <a class="status dropdown-item <?php if ($status == -1) echo ' active'; ?>" href="<?php echo site_url ('coaching/tests/index/'.$coaching_id.'/'.$course_id.'/'.-1); ?>">All</a>
                        <a class="status dropdown-item <?php if ($status == TEST_STATUS_PUBLISHED) echo ' active'; ?>" href="<?php echo site_url ('coaching/tests/index/'.$coaching_id.'/'.$course_id.'/'.TEST_STATUS_PUBLISHED); ?>">Published</a>
                        <a class="status dropdown-item <?php if ($status == TEST_STATUS_UNPUBLISHED) echo ' active'; ?>" href="<?php echo site_url ('coaching/tests/index/'.$coaching_id.'/'.$course_id.'/'.TEST_STATUS_UNPUBLISHED); ?>">Unpublished</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>