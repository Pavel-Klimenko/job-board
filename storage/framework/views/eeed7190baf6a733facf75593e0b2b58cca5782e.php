<div class="job_filter white-bg">
    <div class="form_inner white-bg">
        <h3>Candidate filter</h3>

        <?php if($filterSetFlag): ?>
            <a href="<?php echo e(route('candidates')); ?>" class="btn btn-outline-danger">Reset filter</a>
            <br/><br/><br/>
        <?php endif; ?>

        <form action="<?php echo e(route('candidates')); ?>">
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

                    <div class="col-lg-12">
                        <div class="single_field">
                            <select class="sorting-list" name="LEVEL" class="wide">
                                <option selected disabled>Level</option>
                                <option value="Junior" <?php if(isset($_GET['LEVEL'])): ?> <?php if($_GET['LEVEL'] == 'Junior'): ?> selected <?php endif; ?> <?php endif; ?>>
                                    Junior
                                </option>
                                <option value="Middle" <?php if(isset($_GET['LEVEL'])): ?> <?php if($_GET['LEVEL'] == 'Middle'): ?> selected <?php endif; ?> <?php endif; ?>>
                                    Middle
                                </option>
                                <option value="Senior" <?php if(isset($_GET['LEVEL'])): ?> <?php if($_GET['LEVEL'] == 'Senior'): ?> selected <?php endif; ?> <?php endif; ?>>
                                    Senior
                                </option>
                                <option value="Team-lead" <?php if(isset($_GET['LEVEL'])): ?> <?php if($_GET['LEVEL'] == 'Team-lead'): ?> selected <?php endif; ?> <?php endif; ?>>
                                    Team-lead
                                </option>
                            </select>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="single_field">
                            <select class="sorting-list" name="SORT" class="wide">
                                <option selected disabled>Sorting</option>
                                <option value="maxExperience" <?php if(isset($_GET['SORT'])): ?> <?php if($_GET['SORT'] == 'maxExperience'): ?> selected <?php endif; ?> <?php endif; ?>>
                                    Most experienced
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
</div><?php /**PATH /var/www/Laravel-projects/JobBoard/resources/views/components/candidatesFilter.blade.php ENDPATH**/ ?>