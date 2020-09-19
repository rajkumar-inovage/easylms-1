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
                <h6 class="text-center">Reset Password</h6>
                <?php echo form_open ('login/login_actions/reset_password', array('id'=>'validate-1')); ?>
                	<div class="alert alert-info">
                		You will recieve new password on your registered mobile number and email (if given). Use that password to sign-in. Once you are logged-in change your password from "My Account" menu.
                	</div>
                    <label class="form-group has-float-label mb-4">
                        <input name="mobile" class="form-control required" placeholder="Enter Your Registered Mobile No" autofocus="autofocus" id="mobile" />
                        <span>Mobile No<span class="text-danger">*</span></span>
                    </label>
                    <label class="form-group has-float-label mb-4">
                    	<input name="access_code" class="form-control required" placeholder="Enter Your Access Code" id="access-code" />
                    	<span>Access Code</span>
                    	<p class="text-muted">Don't have access code? <a href="<?php echo site_url ('login/user/get_access_code'); ?>" class="text">Get Access Code</a></p>
                    </label>
                    <div class="d-flex justify-content-between align-items-center">
                        <button type="submit" class="btn btn-success" >Send OTP</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>