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
                                <h2>Name: <b><?php echo e($user->NAME); ?></b></h2>
                                <h2>Country: <b><?php echo e($user->COUNTRY); ?></b></h2>
                                <h2>City: <b><?php echo e($user->CITY); ?></b></h2>
                                <h2>Email: <b><?php echo e($user->EMAIL); ?></b></h2>
                                <h2>Phone: <b><?php echo e($user->PHONE); ?></b></h2>
                                <h2>Specialization: <b><?php echo e(ucfirst($category->NAME)); ?> developer</b></h2>
                                <h2>Level: <b><?php echo e(ucfirst($user->LEVEL)); ?></b></h2>
                                <h2><u><?php echo e($user->YEARS_EXPERIENCE); ?> years experience</u></h2>
                                <h2>Salary: <b><?php echo e($user->SALARY); ?>$</b></h2>
                                <br/>
                                <h2>Experience: </h2>
                                <h4><?php echo e($user->EXPERIENCE); ?></h4>
                                <br/>
                                <h2>Education: </h2>
                                <h4><?php echo e($user->EDUCATION); ?></h4>
                                <br/><br/>
                                <h2>Technical skills: </h2>
                                <?php $__currentLoopData = json_decode($user->SKILLS); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $point): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <b><?php echo e($point); ?>&nbsp;&nbsp;</b>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <br/><br/>
                                <h2>Languages: </h2>
                                <?php $__currentLoopData = json_decode($user->LANGUAGES); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $point): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <b><?php echo e($point); ?>&nbsp;&nbsp;</b>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <br/><br/>
                                <h2>About me: </h2>
                                <h4><?php echo e($user->ABOUT_ME); ?></h4>
                            </div>

                            <div class="blog_details edit-form" style="display: none">
                                <?php echo $__env->make('personal.inc.edit-forms.editCandidate', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/Laravel-projects/JobBoard/resources/views/personal/candidateInfo.blade.php ENDPATH**/ ?>