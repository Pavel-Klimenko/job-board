<?php $__env->startSection('title'); ?>
    Browse Job
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <!-- job_listing_area_start  -->
    <div class="job_listing_area plus_padding">
        <div class="container">

            <div class="row">
                <div class="col-lg-3">
                    
                    <?php if (isset($component)) { $__componentOriginal6576a38d5ed70c71c0e7b14810c30c28a74efb34 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\VacanciesFilter::class, []); ?>
<?php $component->withName('vacanciesFilter'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginal6576a38d5ed70c71c0e7b14810c30c28a74efb34)): ?>
<?php $component = $__componentOriginal6576a38d5ed70c71c0e7b14810c30c28a74efb34; ?>
<?php unset($__componentOriginal6576a38d5ed70c71c0e7b14810c30c28a74efb34); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
                </div>
                <div class="col-lg-9">
                    <div class="recent_joblist_wrap">
                        <div class="recent_joblist white-bg ">
                            <div class="row align-items-center">
                                <div class="col-md-6">
                                    <h4>List of vacancies</h4>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="job_lists m-0">
                        <div class="row">

                            <?php if(count($vacancies) > 0): ?>
                                <?php $__currentLoopData = $vacancies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vacancy): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php
                                        $model = \App\Models\JobCategories::class;
                                        $catedory = \App\Services\Helper::getTableRow($model, 'ID', $vacancy->CATEGORY_ID);
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
                                                            Category: <u><?php echo e(ucfirst($catedory->NAME)); ?></u><br/>
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
                            <?php else: ?>
                                <div class="col-lg-12 col-md-12">
                                    <p>Vacancy list is empty</p>
                                </div>
                            <?php endif; ?>
                        </div>
                        <!-- pagination  -->
                        <?php if($vacancies->hasPages()): ?>
                            <?php echo e($vacancies->links('paginate')); ?>

                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- job_listing_area_end  -->
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/job-board/resources/views/lists/browse_job.blade.php ENDPATH**/ ?>