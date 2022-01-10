<?php $__env->startSection('title'); ?>
    <?php echo e($candidate->NAME); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="job_details_area">
        <div class="container">
            <div class="row">

                <div class="col-lg-8">
                    <div class="blog_item_img">
                        <img class="card-img rounded-0" width="750" src="<?php echo e($candidate->IMAGE); ?>" alt="">
                    </div>
                    <br/><br/>
                    <div class="job_details_header">
                        <div class="single_jobs white-bg d-flex justify-content-between">
                            <div class="jobs_left d-flex align-items-center">
                                <div class="thumb">
                                    <img src="<?php echo e($candidate->ICON); ?>" alt="">
                                </div>
                                <div class="jobs_conetent">
                                    <a href="javascript:void(0);"><h4>
                                            <?php echo e($candidate->NAME); ?>

                                        </h4></a>
                                    <div class="links_locat d-flex align-items-center">
                                        <div class="location">
                                            <p><i class="fa fa-map-marker"></i>
                                                <?php echo e($candidate->COUNTRY); ?>,
                                                <?php echo e($candidate->CITY); ?>

                                            </p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="descript_wrap white-bg">

                        <div class="single_wrap">
                            <h4>Level:</h4>
                            <p>
                                <?php echo e($candidate->LEVEL); ?>

                                <?php echo e(ucfirst($category->NAME)); ?>

                                developer
                            </p>
                        </div>

                        <div class="single_wrap">
                            <h4>Experience:</h4>
                            <p><?php echo e($candidate->EXPERIENCE); ?></p>
                        </div>
                        <div class="single_wrap">
                            <h4>Education:</h4>
                            <p><?php echo e($candidate->EDUCATION); ?></p>
                        </div>
                        <div class="single_wrap">
                            <h4>Skills:</h4>
                            <?php $__currentLoopData = json_decode($candidate->SKILLS); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $skill): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <b><?php echo e($skill); ?>&nbsp;&nbsp;&nbsp;</b>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                        <div class="single_wrap">
                            <h4>Languages:</h4>
                            <ul>
                                <?php $__currentLoopData = json_decode($candidate->LANGUAGES); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><?php echo e($lang); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                        <div class="single_wrap">
                            <h4>About me:</h4>
                            <p><?php echo e($candidate->ABOUT_ME); ?></p>
                        </div>
                    </div>
                    <?php if($isCompanyFlag ?? ''): ?>
                        <?php echo $__env->make('forms.inviteCandidate', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php endif; ?>
                </div>

                <div class="col-lg-4">
                    <div class="job_sumary">
                        <div class="summery_header">
                            <h3>Candidate Summery:</h3>
                        </div>
                        <div class="job_content">
                            <ul>
                                <li>Updated at: <span><?php echo e($candidate->updated_at->format('d.m.Y')); ?></span></li>
                                <li>Desired salary: <span><b><?php echo e($candidate->SALARY); ?>$</b></span></li>
                                <li>Base technology: <span><b><?php echo e(ucfirst($category->NAME)); ?></b></span></li>
                                <li><span><b><?php echo e($candidate->YEARS_EXPERIENCE); ?> years experience</b></span></li>
                                <br/>
                                <li>Phone:
                                    <span>
                                            <a href="tel:<?php echo e($candidate->PHONE); ?>"><b><?php echo e($candidate->PHONE); ?></b></a>
                                    </span>
                                </li>
                                <li>Email:
                                    <span>
                                            <a href="mailto:<?php echo e($candidate->EMAIL); ?>"><b><?php echo e($candidate->EMAIL); ?></b></a>
                                    </span>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/Laravel-projects/JobBoard/resources/views/detail_pages/candidate.blade.php ENDPATH**/ ?>