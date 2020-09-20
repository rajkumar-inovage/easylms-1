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
                        DON'T HAVE AN ACCOUNT? <br>SIGN-UP</p>
                    <p class="white mb-0">
                        <br> 
                        <a href="<?php echo site_url('login/user/register')?>" class="btn btn-light ">Register as a student</a>
                    </p>
                </div>
            </div>
            <div class="form-side">
               
                <h4 class="text-center mb-4">Sign in with your credentials</h4>
                <?php echo form_open ('login/login_actions/validate_login', array('id'=>'login-form')); ?>
                    <label class="form-group has-float-label mb-4">
                        <input class="form-control" placeholder="Mobile No/Email-id/User-ID" type="text" name="username">
                        <span>Mobile/Email/User-id</span>
                    </label>

                    <label class="form-group has-float-label mb-4">
                        <input class="form-control" placeholder="Password" type="password" name="password">
                        <span>Password</span>
                        <a href="<?php echo site_url ('login/user/reset_password'); ?>" class="text">Reset password</a>
                    </label>
                    <?php if ($access_code != '' && $found == true) { ?>
                        <label class="form-group has-float-label mb-4">
                          <input class="form-control" placeholder="Access Code" type="hidden" name="access_code" value="<?php echo $access_code; ?>" readonly>
                        </label>
                    <?php } else { ?>
                        <label class="form-group has-float-label mb-4">
                            <input class="form-control" placeholder="Access Code" type="text" name="access_code" value="<?php echo $access_code; ?>" >
                            <span>Access Code</span>
                            <a href="<?php echo site_url ('login/user/get_access_code'); ?>" class="text">Get Access Code</a>
                        </label>
                    <?php } ?>

                    <div class="d-flex justify-content-between align-items-center">
                        <button class="btn btn-primary btn-lg btn-shadow" type="submit">LOGIN</button>
                    </div>

                </form>
            </div>
        </div>

        <div class="mt-4 text-center ">
            <?php if (isset($coaching['custom_text_login'])) { echo $coaching['custom_text_login']; } ?>
        </div>
    </div>
</div>