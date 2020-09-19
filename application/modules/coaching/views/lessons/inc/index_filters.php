 <div class="mb-2">
    <a class="btn pt-0 pl-0 d-inline-block d-md-none" data-toggle="collapse" href="#displayOptions"
        role="button" aria-expanded="true" aria-controls="displayOptions">
        Display Options
        <i class="simple-icon-arrow-down align-middle"></i>
    </a>
    <div class="collapse d-md-block" id="displayOptions">
        <div class="d-sm-flex align-items-end">
            <?php echo form_open('coaching/lesson_actions/search/'.$coaching_id.'/'.$course_id, array('class'=>"mt-3", 'id'=>'search-form')); ?>
            <div class="search-sm d-inline-block float-md-left mr-1 mb-1 align-top">
                <input name="search_text" placeholder="Search..." id="search-text">
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
                        <a class="status dropdown-item <?php if ($status == -1) echo ' active'; ?>" href="javascript:void(0);" onclick="search_status (<?php echo LESSON_STATUS_ALL; ?>)">All</a>
                        <a class="status dropdown-item <?php if ($status == LESSON_STATUS_PUBLISHED) echo ' active'; ?>" href="javascript:void(0);" onclick="search_status (<?php echo LESSON_STATUS_PUBLISHED; ?>)">Published</a>
                        <a class="status dropdown-item <?php if ($status == LESSON_STATUS_UNPUBLISHED) echo ' active'; ?>" href="javascript:void(0);" onclick="search_status (<?php echo LESSON_STATUS_UNPUBLISHED; ?>)">Unpublished</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>