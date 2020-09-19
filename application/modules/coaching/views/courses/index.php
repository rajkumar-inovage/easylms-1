<div class="row ">
    <div class="col-12" data-check-all="checkAll"> 
    <?php 
    $i = 1;
    if ( ! empty ($courses)) { 
      foreach ($courses as $row) { 
        ?>
        <div class="card d-flex flex-row mb-3">
          <div class="d-flex flex-grow-1 min-width-zero">
              <div class="card-body align-self-center d-flex flex-column flex-md-row justify-content-between min-width-zero align-items-md-center">
                <div class="flex-grow-1">
                  <div class="align-self-center d-flex flex-column flex-md-row justify-content-between min-width-zero align-items-md-center">
					<?php /*if (is_file($row['feat_img'])): ?>
					  <a class="flex-shrink-1 my-auto" href="<?php //echo site_url ('student/courses/view/'.$coaching_id.'/'.$member_id.'/'.$row['course_id']); ?>">
						<img src="<?php echo site_url( $row['feat_img'] ); ?>" class="border-0 list-thumbnail" />
					  </a>
					<?php else: ?>
					  <a class="flex-shrink-1 my-auto" href="<?php //echo site_url ('student/courses/view/'.$coaching_id.'/'.$member_id.'/'.$row['course_id']); ?>"> 
						<img src="<?php echo site_url('contents/system/default_course.jpg'); ?>" class="border-0 list-thumbnail" />
					  </a>
					<?php endif; */ ?>
                    <a class="list-item-heading mb-0 w-40 w-xs-100 mt-0" href="<?php echo site_url ('coaching/courses/manage/'.$coaching_id.'/'.$row['course_id']); ?>">
                        <div class="d-flex">
                          <span class="mr-2"><?php echo $i; ?>.</span>
                          <div class="flex-grow-1 my-auto truncate">
                            <?php echo $row['title']; ?>
                            <div class="text-muted text-small">
                              <?php
                                if ($row['cat_id'] == 0)
                                  echo 'Uncategorized';
                                else
                                  echo $row['cat_title'];
                              ?>
                              </div>
                          </div>
                        </div>
                    </a>
                    <p class="my-2 my-md-0 text-muted text-small w-15 w-xs-100">
                      <?php 
                        if ($row['status'] == COURSE_STATUS_ACTIVE) {
                          echo '<span class="badge badge-success">Published</span>';
                        } else {
                          echo '<span class="badge badge-danger">Unpublished</span>';
                        }
                        ?>
                    </p>
                    <p class="mb-2 mb-md-0 text-muted text-small w-15 w-xs-100">
                        <?php 
                        if ($row['enrolment_type'] == COURSE_ENROLMENT_DIRECT) {
                          echo '<span class="badge badge-primary">Direct</span>';
                        } else {
                          echo '<span class="badge badge-secondary">Batch</span>';
                        }
                        ?>
                    </p>
                  </div>
                </div>
                  <div class="flex-shrink-0">
                    <a class="btn btn-primary" href="<?php echo site_url ('coaching/courses/manage/'.$coaching_id.'/'.$row['course_id']); ?>"><i class="fa fa-cog"></i> Manage </a>

                  </div>
                </div>
            </div>
        </div>
        <?php 
        $i++; 
      } 
    } else {
      ?>
      <div class="alert alert-danger" role="alert">
        No courses found. <?php echo anchor ('coaching/courses/create/'.$coaching_id.'/'.$cat_id, 'Create a new course'); ?>
      </div>
      <?php
    }
    ?>
  </div>
</div>
<?php if($is_admin): ?>
<div class="modal fade" id="editCategories" data-backdrop="static" data-keyboard="true" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <?php echo form_open('', array('class' => 'modal-content', 'id' => 'validate-1')); ?>
      <div class="modal-header relative">
        <h5 class="modal-title mx-auto">Edit Course Cetegory</h5>
      </div>
      <div class="modal-body">
        <div class="form-row">
          <div class="col-12 form-group">
            <label for="title">Category Title</label>
            <input type="text" class="form-control" name="title" id="title" placeholder="Title of the Course Category" />
          </div>
        </div>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-secondary text-white" data-dismiss="modal" data-toggle="tooltip" data-placement="top" data-html="true" title="Click to Cancel"><i class="fa fa-times"></i> Cancel</button>        
        <button type="submit" name="submit" class="btn btn-primary" data-toggle="tooltip" data-placement="top" data-html="true" title="Click to Update"><i class="fa fa-database"></i> Update</button>
        <button type="button" class="btn btn-danger" data-toggle="tooltip" data-placement="top" data-html="true" title="Click to Delete" id="delete-cat" data-id=""><i class="fa fa-trash-alt"></i> Delete</button>
      </div>
    <?php echo form_close(); ?>
  </div>
</div>
<?php endif; ?>
