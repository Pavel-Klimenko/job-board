<!-- featured_candidates_area_start  -->
<div class="featured_candidates_area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section_title text-center mb-40">
                    <h3>Featured Candidates</h3>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="candidate_active owl-carousel">
                    <?php $__currentLoopData = $candidates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $candidate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            $model = \App\Models\JobCategories::class;
                            $category = \App\Services\Helper::getTableRow($model, 'ID', $candidate->CATEGORY_ID);
                        ?>
                        <div class="single_candidates text-center">
                            <div class="thumb">
                                <img src="<?php echo e($candidate->IMAGE); ?>" height="110" alt="">
                            </div>
                            <a href="<?php echo e(route('show-candidate', ['id' => $candidate->id])); ?>"><h4><?php echo e($candidate->NAME); ?></h4></a>
                            <b><?php echo e(ucfirst($category->NAME)); ?> developer</b>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- featured_candidates_area_end  --><?php /**PATH /var/www/Laravel-projects/JobBoard/resources/views/home_blocks/candidates.blade.php ENDPATH**/ ?>