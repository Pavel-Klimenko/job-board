<!-- job_listing_area_start  -->
<div class="job_listing_area">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="section_title">
                    <h3>Job Listing</h3>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="brouse_job text-right">
                    <a href="<?php echo e(route('browse-job')); ?>" class="boxed-btn4">Browse More Job</a>
                </div>
            </div>
        </div>
        <div class="job_lists">
            <div class="row">
                <?php $__currentLoopData = $vacancies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vacancy): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $model = \App\Models\JobCategories::class;
                        $category = \App\Services\Helper::getTableRow($model, 'ID', $vacancy->CATEGORY_ID);
                    ?>
                    <div class="col-lg-12 col-md-12">
                        <div class="single_jobs white-bg d-flex justify-content-between">

                            <div class="jobs_left d-flex align-items-center">
                                <div class="thumb">
                                    <img src="<?php echo e($vacancy->ICON); ?>" alt="">
                                </div>
                                <div class="jobs_conetent">
                                    <a href="<?php echo e(route('show-vacancy', ['id' => $vacancy->ID])); ?>">
                                        <h4><?php echo e($vacancy->NAME); ?></h4></a>
                                    <div class="links_locat d-flex align-items-center">

                                        <div class="location">
                                            Category: <u><?php echo e(ucfirst($category->NAME)); ?></u><br/>
                                            Salary from: <b><?php echo e($vacancy->SALARY_FROM); ?>$</b>
                                        </div>

                                        <div class="location">
                                            <p>
                                                <i class="fa fa-map-marker"></i>
                                                <?php echo e($vacancy->CITY); ?>,
                                                <?php echo e($vacancy->COUNTRY); ?>

                                            </p>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="jobs_right">
                                <div class="apply_now">
                                    <a href="<?php echo e(route('show-vacancy', ['id' => $vacancy->ID])); ?>"
                                       class="boxed-btn3">Look more</a>
                                </div>
                                <div class="date">
                                    <p>updated at <?php echo e($vacancy->updated_at->format('d.m.Y')); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
</div>
<!-- job_listing_area_end  --><?php /**PATH /var/www/Laravel-projects/JobBoard/resources/views/home_blocks/job_listing.blade.php ENDPATH**/ ?>