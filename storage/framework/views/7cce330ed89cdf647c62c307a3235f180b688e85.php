<div class="job_filter white-bg">
    <div class="form_inner white-bg">
        <h3>Vacancy filter</h3>

        <?php if($filterSetFlag): ?>
            <a href="<?php echo e(route('browse-job')); ?>" class="btn btn-outline-danger">Reset filter</a>
            <br/><br/><br/>
        <?php endif; ?>

        <form action="<?php echo e(route('browse-job')); ?>">
            <div class="row">
                <?php if(count($cities) > 0): ?>
                    <div class="col-lg-12">
                        <div class="single_field">
                            <select class="cities-list" name="CITY" class="wide">
                                <option selected disabled>City</option>
                                <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($city->CITY); ?>"
                                            <?php if(isset($_GET['CITY'])): ?>
                                                <?php if($_GET['CITY'] == $city->CITY): ?>
                                                    selected
                                                <?php endif; ?>
                                            <?php endif; ?>
                                    >
                                        <?php echo e($city->CITY); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                <?php endif; ?>

                <?php if(count($jobCategories) > 0): ?>
                    <div class="col-lg-12">
                        <div class="single_field">
                            <select class="categories-list" name="CATEGORY_NAME" class="wide">
                                <option selected disabled>Base technology</option>
                                <?php $__currentLoopData = $jobCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($category->NAME); ?>"
                                            <?php if(isset($_GET['CATEGORY_NAME'])): ?>
                                                <?php if($_GET['CATEGORY_NAME'] == $category->NAME): ?>
                                                    selected
                                                <?php endif; ?>
                                            <?php endif; ?>
                                    >
                                        <?php echo e($category->NAME); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                <?php endif; ?>

                <div class="col-lg-12">
                    <div class="single_field">
                        <select class="sorting-list" name="SORT" class="wide">
                            <option selected disabled>Sorting</option>
                            <option value="highestSalary" <?php if(isset($_GET['SORT'])): ?> <?php if($_GET['SORT'] == 'highestSalary'): ?> selected <?php endif; ?> <?php endif; ?>>
                                Highest salary
                            </option>
                            <option value="newest" <?php if(isset($_GET['SORT'])): ?> <?php if($_GET['SORT'] == 'newest'): ?> selected <?php endif; ?> <?php endif; ?>>
                                Newest
                            </option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="reset_btn">
                <button class="boxed-btn3 w-100" type="submit">Filter results</button>
            </div>
            <br/>
        </form>
    </div>
</div><?php /**PATH /var/www/Laravel-projects/JobBoard/resources/views/components/vacanciesFilter.blade.php ENDPATH**/ ?>