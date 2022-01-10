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
                            <div class="blog_details">
                                <?php if(count($candidatesRequests) > 0): ?>
                                    <?php $__currentLoopData = $candidatesRequests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $request): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <a class="d-inline-block"
                                           href="<?php echo e(route('show-vacancy', ['id' => $request->VACANCY_ID])); ?>">
                                            <h2><?php echo e($request->VACANCY_NAME); ?></h2>
                                        </a><br/>

                                        <h4>Status: <u><?php echo e(mb_strtoupper($request->STATUS)); ?></u></h4><br>
                                        <?php if($isCompanyFlag): ?>
                                            <ul class="blog-info-link">
                                                <li>
                                                    <a href="<?php echo e(route('show-candidate', ['id' => $request->CANDIDATE_ID])); ?>">
                                                        <p>Candidate: <b><?php echo e($request->CANDIDATE_NAME); ?></b></p>
                                                    </a>
                                                </li>
                                            </ul>

                                            <?php if($request->CANDIDATE_COVERING_LETTER): ?>
                                                <b>Candidate`s covering letter:</b>
                                                <p><?php echo e($request->CANDIDATE_COVERING_LETTER); ?></p>
                                            <?php endif; ?>

                                        <?php elseif($isCandidateFlag): ?>
                                            <?php
                                                $model = \App\Models\User::class;
                                                $company = \App\Services\Helper::getTableRow($model, 'id', $request->COMPANY_ID)
                                            ?>

                                            <?php if($request->STATUS == 'accepted'): ?>
                                                <?php echo $__env->make('personal.inc.acceptedInfo', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                            <?php elseif($request->STATUS == 'rejected'): ?>
                                                <?php echo $__env->make('personal.inc.rejectedInfo', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                            <?php endif; ?>

                                        <?php endif; ?>

                                        <?php if($isCompanyFlag): ?>
                                            <?php echo $__env->make('personal.inc.companyButtons', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                        <?php endif; ?>

                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php else: ?>
                                    <div class="col-lg-12 col-md-12">
                                        <p>There are not interview requests</p>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </article>

                        <!-- pagination  -->
                        <?php if($candidatesRequests->hasPages()): ?>
                            <?php echo e($candidatesRequests->links('paginate')); ?>

                        <?php endif; ?>

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



<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/job-board/resources/views/personal/InterviewRequests.blade.php ENDPATH**/ ?>