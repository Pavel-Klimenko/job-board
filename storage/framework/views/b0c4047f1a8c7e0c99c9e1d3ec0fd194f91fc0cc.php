<div class="job_details_area">
    <div class="apply_job_form white-bg">
        <form action="<?php echo e(route('update-user-info')); ?>" method="post">
            <?php echo csrf_field(); ?>

            <div class="row">

                <div class="col-md-12">
                    <h5>Name:</h5>
                    <div class="input_field">
                        <input type="text" required name="NAME" value="<?php echo e($user->NAME); ?>">
                    </div>
                </div>

                <div class="col-md-6">
                    <h5>Country:</h5>
                    <div class="input_field">
                        <input type="text" required name="COUNTRY" value="<?php echo e($user->COUNTRY); ?>">
                    </div>
                </div>

                <div class="col-md-6">
                    <h5>City:</h5>
                    <div class="input_field">
                        <input type="text" required name="CITY" value="<?php echo e($user->CITY); ?>">
                    </div>
                </div>

                <div class="col-md-12">
                    <h5>Phone:</h5>
                    <div class="input_field">
                        <input type="tel" required name="PHONE" value="<?php echo e($user->PHONE); ?>">
                    </div>
                </div>

                <div class="col-md-6">
                    <h5>Number of staff:</h5>
                    <div class="input_field">
                        <input type="number" max="9999999" required name="EMPLOYEE_CNT" value="<?php echo e($user->EMPLOYEE_CNT); ?>">
                    </div>
                </div>

                <div class="col-md-6">
                    <h5>Website:</h5>
                    <div class="input_field">
                        <input type="text" required name="WEB_SITE" value="<?php echo e($user->WEB_SITE); ?>">
                    </div>
                </div>

                <div class="col-md-12">
                    <h5>About company:</h5>
                    <div class="input_field">
                        <textarea required name="DESCRIPTION" id="" cols="30" rows="10"
                                  placeholder="Vacancy description"><?php echo e($user->DESCRIPTION); ?></textarea>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="submit_btn">
                        <button class="boxed-btn3 w-100 send-data-form" type="submit">Save</button>
                    </div>
                </div>
            </div>


        </form>
    </div>
</div>

<?php /**PATH /var/www/Laravel-projects/JobBoard/resources/views/personal/inc/edit-forms/editCompany.blade.php ENDPATH**/ ?>