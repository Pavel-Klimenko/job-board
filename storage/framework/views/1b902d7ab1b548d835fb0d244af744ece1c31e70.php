<div class="job_details_area">
    <div class="apply_job_form white-bg">
        <form action="<?php echo e(route('update-user-info')); ?>" method="post">
            <?php echo csrf_field(); ?>
            <div class="row">
                <div class="col-md-12">
                    <h5>Name:</h5>
                    <div class="input_field">
                        <input type="text" required name="NAME" value="<?php echo e($user->NAME); ?>">
                    </div>
                </div>

                <div class="col-md-6">
                    <h5>Country:</h5>
                    <div class="input_field">
                        <input type="text" required name="COUNTRY" value="<?php echo e($user->COUNTRY); ?>">
                    </div>
                </div>

                <div class="col-md-6">
                    <h5>City:</h5>
                    <div class="input_field">
                        <input type="text" required name="CITY" value="<?php echo e($user->CITY); ?>">
                    </div>
                </div>

                <div class="col-md-12">
                    <h5>Phone:</h5>
                    <div class="input_field">
                        <input type="tel" required name="PHONE" value="<?php echo e($user->PHONE); ?>">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="single_field input_field">
                        <select required name="CATEGORY_ID" class="wide">
                            <?php $__currentLoopData = $jobCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($category->ID); ?>" <?php if($category->ID == $user->CATEGORY_ID): ?> selected <?php endif; ?>>
                                    <?php echo e($category->NAME); ?>

                                </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div><br /><br /><br />

                <div class="col-md-6">
                    <div class="single_field input_field">
                        <select required name="LEVEL" class="wide">
                            <option value="Junior" <?php if($user->LEVEL == 'Junior'): ?> selected <?php endif; ?>>
                                Junior
                            </option>
                            <option value="Middle" <?php if($user->LEVEL == 'Middle'): ?> selected <?php endif; ?>>
                                Middle
                            </option>
                            <option value="Senior" <?php if($user->LEVEL == 'Senior'): ?> selected <?php endif; ?>>
                                Senior
                            </option>
                            <option value="Team-lead" <?php if($user->LEVEL == 'Team-lead'): ?> selected <?php endif; ?>>
                                Team-lead
                            </option>
                        </select>
                    </div>
                </div><br /><br /><br />

                <div class="col-md-6">
                    <h5>Years experience:</h5>
                    <div class="input_field">
                        <input type="number" required name="YEARS_EXPERIENCE"
                                max="80" value="<?php echo e($user->YEARS_EXPERIENCE); ?>">
                    </div>
                </div>

                <div class="col-md-6">
                    <h5>Desired salary:</h5>
                    <div class="input_field">
                        <input type="number" required name="SALARY"
                               max="99999999999" value="<?php echo e($user->SALARY); ?>">
                    </div>
                </div>

                <div class="col-md-12">
                    <h5>Experience:</h5>
                    <div class="input_field">
                        <textarea required name="EXPERIENCE"><?php echo e($user->EXPERIENCE); ?></textarea>
                    </div>
                </div>

                <div class="col-md-12">
                    <h5>Education:</h5>
                    <div class="input_field">
                        <textarea required name="EDUCATION"><?php echo e($user->EDUCATION); ?></textarea>
                    </div>
                </div>

                <div class="col-md-12">
                    <h5>Technical skills: </h5>
                    <div class="input_field">
                        <textarea required name="SKILLS"><?php echo e($user->SKILLS); ?></textarea>
                    </div>
                </div>

                <div class="col-md-12">
                    <h5>Languages:</h5>
                    <div class="input_field">
                        <textarea required name="LANGUAGES"><?php echo e($user->LANGUAGES); ?></textarea>
                    </div>
                </div>

                <div class="col-md-12">
                    <h5>About me:</h5>
                    <div class="input_field">
                        <textarea required name="ABOUT_ME"><?php echo e($user->ABOUT_ME); ?></textarea>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="submit_btn">
                        <button class="boxed-btn3 w-100" type="submit">Save</button>
                    </div>
                </div>
            </div>


        </form>
    </div>
</div>

<?php /**PATH /var/www/Laravel-projects/JobBoard/resources/views/personal/inc/edit-forms/editCandidate.blade.php ENDPATH**/ ?>