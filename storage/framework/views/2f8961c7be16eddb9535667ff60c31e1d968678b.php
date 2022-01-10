<?php $__env->startSection('title'); ?>
    <?php echo e($title); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <!--================Blog Area =================-->
    <section class="blog_area section-padding">
        <div class="container">
            <div class="row">

                <div class="col-lg-8 mb-5 mb-lg-0">
                    <div class="blog_left_sidebar">

                        <article class="blog_item">
                            <?php if($user->IMAGE): ?>
                                <div class="blog_item_img">
                                    <img class="card-img rounded-0" width="750" src="<?php echo e(asset($user->IMAGE)); ?>" alt="">
                                </div>
                            <?php endif; ?>

                            <div class="blog_details">
                                <?php echo $__env->make('forms.uploadImage', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>


                            <div class="blog_details user-info">
                                    <h2>Company : <b><?php echo e($user->NAME); ?></b></h2>
                                    <h2>Country: <b><?php echo e($user->COUNTRY); ?></b></h2>
                                    <h2>City: <b><?php echo e($user->CITY); ?></b></h2>
                                    <h2>Email: <b><a href="mailto:<?php echo e($user->EMAIL); ?>"><?php echo e($user->EMAIL); ?></a></b></h2>
                                    <h2>Phone: <b><a href="tel:<?php echo e($user->PHONE); ?>"><?php echo e($user->PHONE); ?></a></b></h2>
                                    <h2>Website: <b><a href="<?php echo e($user->WEB_SITE); ?>"><?php echo e($user->WEB_SITE); ?></a></b></h2>
                                    <br/><br/>
                                    <h4>Number of staff: <b><?php echo e($user->EMPLOYEE_CNT); ?></b> people</h4>
                                    <br/><br/>
                                    <h2>About company: </h2>
                                    <p><?php echo e($user->DESCRIPTION); ?></p>
                            </div>


                            <div class="blog_details edit-form" style="display: none">
                                <?php echo $__env->make('personal.inc.edit-forms.editCompany', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>


                            <div class="blog_details" id="edit_personal_info">
                                <a href="javascript:void(0);" type="button" class="btn btn-outline-success">Edit personal info</a>
                            </div>
                        </article>
                    </div>
                </div>


                <div class="col-lg-4">
                    <div class="blog_right_sidebar">
                        <?php echo $__env->make('personal.aside', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!--================Blog Area =================-->

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/job-board/resources/views/personal/companyInfo.blade.php ENDPATH**/ ?>