<div class="row h-100">
    <div class="col-12 col-md-10 mx-auto my-auto">
        <div class="card shadow">
            <div class="d-flex flex-column h-100 align-items-center justify-content-center pt-2">
                 <?php if ( is_file ($logo)) { ?>
                    <img src="<?php echo $logo; ?>" height="50" title="<?php echo $page_title; ?>" class="text-center mb-4" alt="<?php echo $page_title; ?>">
                <?php } else { ?>
                    <h2 class=" text-center mb-4"><?php echo $page_title; ?></h2>
                <?php } ?>
            </div>
            <div class="card-body">
                <?php echo $coaching['eula_text']; ?>
            </div>
            <div class="py-3 text-center align-items-center">
                <?php echo anchor ('login/user/register', 'Back To Register', ['class'=>'btn btn-light']); ?>                    
            </div>
        </div>
    </div>
</div>