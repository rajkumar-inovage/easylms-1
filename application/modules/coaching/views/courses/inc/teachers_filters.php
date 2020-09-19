<div class="mb-2 d-flex">
    <a class="btn pt-0 pl-0 d-inline-block d-md-none" data-toggle="collapse" href="#displayOptions"
        role="button" aria-expanded="true" aria-controls="displayOptions">
        Display Options
        <i class="simple-icon-arrow-down align-middle"></i>
    </a>
    <div class="collapse d-md-block" id="displayOptions">
        
      <?php echo form_open('coaching/courses_actions/search_teachers/'.$coaching_id.'/'.$course_id.'/'.$type, array('class'=>"mt-3", 'id'=>'search-form')); ?>
        <div class="search-sm d-inline-block float-md-left mr-1 mb-1 align-top">
            <input type="hidden" name="filter_status" id="filter-status" value="<?php echo $status; ?>" />
            <input type="search" name="search_text" placeholder="Search..." id="search-text" />
        </div>
      <?php echo form_close(); ?>

        <div class="d-block d-md-inline-block">
            <div class="d-none btn-group float-md-left mr-1 mb-1">
                <button class="btn btn-outline-dark btn-xs dropdown-toggle" type="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Status
                </button>
                <div class="dropdown-menu">
                    <a href="javascript:void(0);" class="status dropdown-item<?php echo ($status == -1)? ' active':null; ?>" data-value="<?php echo -1; ?>">All Status</a>
                    <a href="javascript:void(0);" class="status dropdown-item<?php echo ($status==USER_STATUS_DISABLED)? ' active':null; ?>" data-value="<?php echo USER_STATUS_DISABLED; ?>">Disabled</a>
                    <a href="javascript:void(0);" class="status dropdown-item<?php echo ($status==USER_STATUS_ENABLED)? ' active':null; ?>" data-value="<?php echo USER_STATUS_ENABLED; ?>">Enabled</a>
                    <a href="javascript:void(0);" class="status dropdown-item<?php echo ($status==USER_STATUS_UNCONFIRMED)? ' active':null; ?>" data-value="<?php echo USER_STATUS_UNCONFIRMED; ?>">Pending</a>
                </div>
            </div>
        </div>
    </div>
</div>