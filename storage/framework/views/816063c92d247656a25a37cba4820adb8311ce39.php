<?php $__env->startSection('title'); ?>
    <?php echo e($vacancy->NAME); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="job_details_area">
        <div class="container">
            <div class="row">

                <div class="col-lg-8">
                    <div class="blog_item_img">
                        <img class="card-img rounded-0" width="750" src="<?php echo e($vacancy->IMAGE); ?>" alt="">
                    </div><br/><br/>

                    <div class="blog_item_img">
                        <h3>About company:</h3>
                        <?php echo e($company->DESCRIPTION); ?>

                    </div><br/><br/>

                    <div class="job_details_header">
                        <div class="single_jobs white-bg d-flex justify-content-between">
                            <div class="jobs_left d-flex align-items-center">
                                <div class="thumb">
                                    <img src="<?php echo e($vacancy->ICON); ?>" alt="">
                                </div>

                                <div class="jobs_conetent">
                                    <a href="#"><h4><?php echo e($vacancy->NAME); ?></h4></a>
                                    <div class="links_locat d-flex align-items-center">
                                        <div class="location">
                                            <p><i class="fa fa-map-marker"></i>
                                                <?php echo e($vacancy->COUNTRY); ?>,
                                                <?php echo e($vacancy->CITY); ?>

                                            </p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="descript_wrap white-bg">
                        <div class="single_wrap">
                            <h4>Job description</h4>
                            <p><?php echo e($vacancy->DESCRIPTION); ?></p>
                        </div>
                        <div class="single_wrap">
                            <h4>Responsibility</h4>
                            <ul>
                                <?php $__currentLoopData = json_decode($vacancy->RESPONSIBILITY); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $point): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><?php echo e($point); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                        <div class="single_wrap">
                            <h4>Qualifications</h4>
                            <ul>
                                <?php $__currentLoopData = json_decode($vacancy->QUALIFICATIONS); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $point): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><?php echo e($point); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                        <div class="single_wrap">
                            <h4>Benefits</h4>
                            <p><?php echo e($vacancy->BENEFITS); ?></p>
                        </div>
                    </div>

                    <?php if($isCandidateFlag ?? ''): ?>
                        <?php echo $__env->make('forms.jobApply', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php endif; ?>

                </div>

                <div class="col-lg-4">
                    <div class="job_sumary">
                        <div class="summery_header">
                            <h3>Job Summery:</h3>
                        </div>
                        <div class="job_content">
                            <ul>
                                <li>Updated at: <span><?php echo e($vacancy->updated_at->format('d.m.Y')); ?></span></li>
                                <li>Salary from: <span><b><?php echo e($vacancy->SALARY_FROM); ?>$</b></span></li>
                                <li>Base technology: <span><b><?php echo e(ucfirst($category->NAME)); ?></b></span></li>
                                <br/>

                                <li>Company: <span><b><?php echo e($company->NAME); ?></b></span></li>
                                <li>Number of employees: <span><b><?php echo e($company->EMPLOYEE_CNT); ?></b></span></li>
                                <li>Company Website:
                                    <span>
                                            <a href="<?php echo e($company->WEB_SITE); ?>"><b><?php echo e($company->WEB_SITE); ?></b></a>
                                    </span>
                                </li>

                                <br/>
                                <li>Phone:
                                    <span>
                                            <a href="tel:<?php echo e($company->PHONE); ?>"><b><?php echo e($company->PHONE); ?></b></a>
                                    </span>
                                </li>
                                <li>Email:
                                    <span>
                                            <a href="mailto:<?php echo e($company->EMAIL); ?>"><b><?php echo e($company->EMAIL); ?></b></a>
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
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/Laravel-projects/JobBoard/resources/views/detail_pages/vacancy.blade.php ENDPATH**/ ?>