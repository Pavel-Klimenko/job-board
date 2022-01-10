<?php $__env->startSection('title'); ?>
    Candidates
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <!-- job_listing_area_start  -->
    <div class="job_listing_area plus_padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    
                    <?php if (isset($component)) { $__componentOriginalb6da92829f64baa0c3c7f71fe67c0b3ded7210f9 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\CandidatesFilter::class, []); ?>
<?php $component->withName('candidatesFilter'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginalb6da92829f64baa0c3c7f71fe67c0b3ded7210f9)): ?>
<?php $component = $__componentOriginalb6da92829f64baa0c3c7f71fe67c0b3ded7210f9; ?>
<?php unset($__componentOriginalb6da92829f64baa0c3c7f71fe67c0b3ded7210f9); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
                </div>
                <div class="col-lg-9">
                    <div class="recent_joblist_wrap">
                        <div class="recent_joblist white-bg ">
                            <div class="row align-items-center">
                                <div class="col-md-6">
                                    <h4>List of candidates</h4>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="job_lists m-0">
                        <div class="row">

                            <?php if(count($candidates) > 0): ?>
                                <?php $__currentLoopData = $candidates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $candidate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                    <?php
                                    $model = \App\Models\JobCategories::class;
                                    $catedory = \App\Services\Helper::getTableRow($model, 'ID', $candidate->CATEGORY_ID);
                                    ?>


                                    <div class="col-lg-12 col-md-12">
                                        <div class="single_jobs white-bg d-flex justify-content-between">

                                            <div class="jobs_left d-flex align-items-center">
                                                <div class="thumb">
                                                    <img src="<?php echo e($candidate->ICON); ?>" width="48" height="48" alt="">
                                                </div>
                                                <div class="jobs_conetent">
                                                    <a href="<?php echo e(route('show-candidate', ['id' => $candidate->id])); ?>">
                                                        <h4><?php echo e($candidate->NAME); ?></h4></a>
                                                    <div class="links_locat d-flex align-items-center">

                                                        <div class="location">
                                                                <?php echo e($candidate->LEVEL); ?>

                                                                <?php echo e(ucfirst($catedory->NAME)); ?>

                                                                developer
                                                            <p>
                                                                <b><?php echo e($candidate->YEARS_EXPERIENCE); ?> years experience</b>
                                                            </p>

                                                        </div>

                                                        <div class="location">
                                                            <p>
                                                                <i class="fa fa-clock-o"></i>
                                                                <?php echo e($candidate->COUNTRY); ?>,
                                                                <?php echo e($candidate->CITY); ?>

                                                            </p>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>

                                            <div class="jobs_right">
                                                <div class="apply_now">
                                                    <a href="<?php echo e(route('show-candidate', ['id' => $candidate->id])); ?>" class="boxed-btn3">
                                                        Look more
                                                    </a>
                                                </div>
                                                <div class="date">
                                                    <p>updated at <?php echo e($candidate->updated_at->format('d.m.Y')); ?></p>
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
                        <?php if($candidates->hasPages()): ?>
                            <?php echo e($candidates->links('paginate')); ?>

                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- job_listing_area_end  -->
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/Laravel-projects/JobBoard/resources/views/lists/candidates.blade.php ENDPATH**/ ?>