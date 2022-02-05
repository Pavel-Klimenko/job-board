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
                                <?php if(count($vacancies) > 0): ?>
                                    <?php $__currentLoopData = $vacancies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vacancy): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <a class="d-inline-block"
                                           href="<?php echo e(route('show-vacancy', ['id' => $vacancy->ID])); ?>">
                                            <h2><?php echo e($vacancy->NAME); ?></h2>
                                        </a><br/>
                                        <ul class="blog-info-link">
                                            <li><a href="javascript:void(0);"><i class="fa fa-user"></i><?php echo e($vacancy->COUNTRY); ?></a></li>
                                            <li><a href="javascript:void(0);"><i class="fa fa-comments"></i><?php echo e($vacancy->CITY); ?></a></li>
                                        </ul><br/>



                                        <p>
                                            <a class="btn btn-outline-danger" href="<?php echo e(route('delete-vacancy', ['VACANCY_ID' => $vacancy->ID])); ?>">Delete</a>
                                            <a class="btn btn-outline-success edit_vacancy">Edit vacancy</a>
                                            
                                        </p>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php else: ?>
                                    <div class="col-lg-12 col-md-12">
                                        <p>Vacancy list is empty</p>
                                    </div>
                                <?php endif; ?>
                            </div><br/>
                            <a href="<?php echo e(route('add-vacancy')); ?>" class="btn btn-outline-success add_vacancy_button">Add new vacancy</a>


                            <div class="blog_details edit-form" style="display: none">
                                <?php echo $__env->make('personal.inc.edit-forms.editVacancy', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>


                        </article>

                        <!-- pagination  -->
                        <?php if($vacancies->hasPages()): ?>
                            <?php echo e($vacancies->links('paginate')); ?>

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


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/job-board/resources/views/personal/vacancies.blade.php ENDPATH**/ ?>