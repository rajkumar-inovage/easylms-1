<div class="row h-100">
    <div class="col-12 col-md-10 mx-auto my-auto">
        <div class="card auth-card shadow">
            <div class="position-relative image-side text-center">
            	<div class="d-flex flex-column h-100 align-items-center justify-content-center">
                    <?php if ( is_file ($logo)) { ?>
                        <img src="<?php echo $logo; ?>" height="50" title="<?php echo $page_title; ?>" class="text-center mb-4" alt="<?php echo $page_title; ?>">
                    <?php } else { ?>
                        <h2 class="text-white text-center mb-4"><?php echo $page_title; ?></h2>
                    <?php } ?>
                    <p class=" text-white h6">
	                   ALREADY HAVE AN ACCOUNT? <br>SIGN-IN
                   </p>
	                <p class="white mb-0">
	                    <a href="<?php echo site_url('login/user/index')?>" class="btn btn-light ">Sign In</a>
	                </p>
            	</div>
            </div>
            <div class="form-side">
               
                <h4 class="text-center mb-4">Reset Password</h4>
                <?php echo form_open ('login/login_actions/reset_password', array('id'=>'validate-1')); ?>
                	<div class="alert alert-info">
                		You will recieve new password on your registered mobile number and email (if given). Use that password to sign-in. Once you are logged-in change your password from "My Account" menu.
                	</div>
                    <div class="form-group mb-4">
                        <label class="">
                            <span>Mobile No<span class="text-danger">*</span></span>
                        </label>
                        <input name="mobile" class="form-control required" placeholder="Enter Your Registered Mobile No" autofocus="autofocus" id="mobile" />
                    </div>

                    <?php if ($access_code != '' && $found == true) { ?>
                        <label class="form-group has-float-label mb-4">
                          <input class="form-control" placeholder="Access Code" type="hidden" name="access_code" value="<?php echo $access_code; ?>" readonly>
                        </label>
                    <?php } else { ?>
                        <label class="form-group has-float-label mb-4">
                            <input class="form-control" placeholder="Access Code" type="text" name="access_code" value="<?php echo $access_code; ?>" >
                            <span>Access Code</span>
                            <p class="text-muted">If you don't have access code, contact your coaching-center/institution</p>
                        </label>
                    <?php } ?>


                    <div class="d-flex justify-content-between align-items-center">
                        <button type="submit" class="btn btn-primary" >Send OTP</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>