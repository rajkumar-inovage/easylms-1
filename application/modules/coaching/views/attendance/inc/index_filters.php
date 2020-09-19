<div class="mb-2">
    <a class="btn pt-0 pl-0 d-inline-block d-md-none" data-toggle="collapse" href="#displayOptions"
        role="button" aria-expanded="true" aria-controls="displayOptions">
        Display Options
        <i class="simple-icon-arrow-down align-middle"></i>
    </a>
    <div class="collapse d-md-block" id="displayOptions">
        <div class="d-block d-md-inline-block">
            <div class="btn-group float-md-left mr-1 mb-1">
                <button class="btn btn-outline-dark btn-xs dropdown-toggle" type="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Status
                </button>
                <div class="dropdown-menu">
                    <a href="<?php echo site_url ('coaching/attendance/index/'.$coaching_id.'/'.$role_id.'/-1/'.$batch_id.'/'.$date); ?>" class="dropdown-item<?php echo ($status == -1)? ' active':null; ?>">All Status</a>
                    <a href="<?php echo site_url ('coaching/attendance/index/'.$coaching_id.'/'.$role_id.'/'.USER_STATUS_DISABLED.'/'.$batch_id.'/'.$date); ?>" class="dropdown-item<?php echo ($status==USER_STATUS_DISABLED)? ' active':null; ?>">Disabled</a>
                    <a href="<?php echo site_url ('coaching/attendance/index/'.$coaching_id.'/'.$role_id.'/'.USER_STATUS_ENABLED.'/'.$batch_id.'/'.$date); ?>" class="dropdown-item<?php echo ($status==USER_STATUS_ENABLED)? ' active':null; ?>">Enabled</a>
                    <a href="<?php echo site_url ('coaching/attendance/index/'.$coaching_id.'/'.$role_id.'/'.USER_STATUS_UNCONFIRMED.'/'.$batch_id.'/'.$date); ?>" class="dropdown-item<?php echo ($status==USER_STATUS_UNCONFIRMED)? ' active':null; ?>">Pending</a>
                </div>
            </div>
            <div class="btn-group float-md-left mr-1 mb-1">
                <button class="btn btn-outline-dark btn-xs dropdown-toggle" type="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Roles
                </button>
                <div class="dropdown-menu">
                    <a href="<?php echo site_url ('coaching/attendance/index/'.$coaching_id.'/0/'.$status.'/'.$batch_id.'/'.$date); ?>" class="dropdown-item <?php echo ($this->session->userdata ('is_admin')==false)? "disabled":""; ?> <?php echo ($role_id == -1)? ' active':null; ?>">All Roles</a>
                    <?php foreach ($roles as $role) { ?>
                    <a href="<?php echo site_url ('coaching/attendance/index/'.$coaching_id.'/'.$role['role_id'].'/'.$status.'/'.$batch_id.'/'.$date); ?>" class="dropdown-item <?php echo ($this->session->userdata ('is_admin')==false)? "disabled":""; ?> <?php echo ($role_id==$role['role_id'])? ' active':null; ?>"><?php echo $role['description']; ?></a>
                    <?php } ?>
                </div>
            </div>
            <div class="btn-group float-md-left mr-1 mb-1">
                <button class="btn btn-outline-dark btn-xs dropdown-toggle" type="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Batches
                </button>
                <div class="dropdown-menu">
                    <a href="<?php echo site_url ('coaching/attendance/index/'.$coaching_id.'/'.$role_id.'/'.$status.'/0/'.$date); ?>" class="dropdown-item<?php echo ($batch_id == -1)? ' active':null; ?>">All Batches</a>
                    <?php /* foreach ($batches as $batch) { ?>
                    <a href="<?php echo site_url ('coaching/attendance/index/'.$coaching_id.'/'.$role['role_id'].'/'.$status.'/'.$batch['id'].'/'.$date); ?>" class="dropdown-item <?php echo ($this->session->userdata ('is_admin')==false)? "disabled":""; ?> <?php echo ($batch_id==$batch['id'])? ' active':null; ?>"><?php echo $batch['title']; ?></a>
                    <?php } */ ?>
                </div>
            </div>
            <div class="search-sm calendar-sm d-inline-block float-md-left mr-1 mb-1 align-top">
                <input type="text" class="form-control datepicker" placeholder="Search by day" data-date-format="dd-mm-yyyy" data-date-end-date="0d" value="<?php echo $date; ?>" id="search-date" />
            </div>
        </div>
    </div>
</div>