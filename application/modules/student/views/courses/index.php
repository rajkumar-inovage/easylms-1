<div class="card mb-4">
    <div class="card-body">
      <h5 class="mb-2">Filter</h5>
      <?php echo form_open ('student/courses_actions/search/'.$coaching_id.'/'.$member_id, ['id'=>'search-form']); ?>
        <div class="row">
            <div class="col-sm-6">
                <label>Category</label>
                <select class="form-control" data-width="100%" id="categories" name="category" onchange="search_status()">
                  <option value="-1">All Courses</option>
                  <?php
                  if (! empty ($categories)) {
                    foreach ($categories as $cat) {
                      ?>
                      <option value="<?php echo $cat['cat_id']; ?>"><?php echo $cat['title']; ?></option>
                      <?php
                    }
                  }
                  ?>
                  <option value="0">Uncategorized</option>
                </select>
            </div>

            <div class="col-sm-6">
                <label>Search</label>
                 <div class="input-group">
                    <input type="text" class="form-control " name="search" id="search-text"
                        placeholder="Start typing something to search..." >
                </div>
            </div>

        </div>
      </form>

  </div>
</div>
      
<div id="courses-list">
  <?php $this->load->view ('courses/inc/index', $data); ?>
</div>