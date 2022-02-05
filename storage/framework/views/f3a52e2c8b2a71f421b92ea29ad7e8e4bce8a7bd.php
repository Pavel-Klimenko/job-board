<!-- catagory_area -->
<div class="catagory_area">

    <div class="container">
        <div class="row align-items-center mb-40">
            <div class="col-lg-6 col-md-6">
                <div class="section_title">
                    <h3>Find job:</h3>
                </div>
            </div>
        </div>
        <form action="<?php echo e(route('browse-job')); ?>">
            <?php echo csrf_field(); ?>
            <div class="row cat_search">
                <div class="col-lg-4 col-md-4">
                    <div class="single_input">
                        <select name="CITY" class="wide">
                            <option selected disabled>City</option>
                            <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($city->CITY); ?>"><?php echo e($city->CITY); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>
                <div class="col-lg-5 col-md-4">
                    <div class="single_input">
                        <select name="CATEGORY_ID" class="wide">
                            <option selected disabled>Base technology</option>
                            <?php $__currentLoopData = $jobCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($category->ID); ?>"><?php echo e($category->NAME); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>
                <div class="col-lg-3 col-md-12">
                    <div class="job_btn" id="find_job">
                        <button type="submit" class="boxed-btn3">Find Job</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<!--/ catagory_area --><?php /**PATH /var/www/job-board/resources/views/home_blocks/job_filter.blade.php ENDPATH**/ ?>