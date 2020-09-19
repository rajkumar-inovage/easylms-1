<div class="row h-100">
    <div class="col-12 col-md-10 mx-auto my-auto">
        <div class="card auth-card shadow">
            <div class="position-relative image-side text-center">
            	<div class="d-flex flex-column h-100 align-items-center justify-content-center">
	                <p class=" text-white h2">ALREADY HAVE<br>AN ACCOUNT? <br>SIGN-IN</p>
	                <p class="white mb-0">
	                    <a href="<?php echo site_url('login/user/index')?>" class="btn btn-light ">Sign In</a>
	                </p>
            	</div>
            </div>
            <div class="form-side">
                <?php if ( is_file ($logo)) { ?>
                    <img src="<?php echo $logo; ?>" height="50" title="<?php echo $page_title; ?>" class="text-center">
                <?php } else { ?>
                    <h4 class="text-center"><?php echo $page_title; ?></h4>
                <?php } ?>
                <h6 class="text-center">Get Access Code</h6>
                <?php echo form_open ('login/login_actions/get_access_code', array('id'=>'validate-1')); ?>
                	<div class="alert alert-info">
                		You will recieve Access Code on your registered mobile number and email (if given).
                	</div>
                    <label class="form-group has-float-label mb-4">
                        <input name="mobile" class="form-control required" placeholder="Enter Your Registered Mobile No" autofocus="autofocus" id="mobile" />
                        <span>Mobile No<span class="text-danger">*</span></span>
                    </label>
                    <div class="d-flex justify-content-between align-items-center">
                        <button type="submit" class="btn btn-success" >Send Access Code</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>