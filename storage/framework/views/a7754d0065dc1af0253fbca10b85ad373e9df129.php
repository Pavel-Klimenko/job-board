<div class="job_details_area">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="apply_job_form white-bg">
                    <h4>Add new vacancy</h4>
                    <form action="<?php echo e(route('create-vacancy')); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="input_field">
                                    <input type="text" name="NAME" value="<?php echo e(old('NAME')); ?>" placeholder="Vacancy title">
                                </div>
                                <?php $__errorArgs = ['NAME'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="alert alert-danger"><?php echo e(mb_strtoupper($message)); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <div class="col-md-6">
                                <div class="input_field">
                                    <input type="text" name="COUNTRY" value="<?php echo e(old('COUNTRY')); ?>" placeholder="Country">
                                </div>
                                <?php $__errorArgs = ['COUNTRY'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="alert alert-danger"><?php echo e(mb_strtoupper($message)); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <div class="col-md-6">
                                <div class="input_field">
                                    <input type="text" name="CITY" value="<?php echo e(old('CITY')); ?>" placeholder="City">
                                </div>
                                <?php $__errorArgs = ['CITY'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="alert alert-danger"><?php echo e(mb_strtoupper($message)); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <div class="col-md-12">
                                <div class="single_field input_field">
                                    <select required name="CATEGORY_ID" class="wide">
                                        <option selected disabled>Programming language</option>
                                        <?php $__currentLoopData = $jobCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($category->ID); ?>">
                                                <?php echo e($category->NAME); ?>

                                            </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div><br /><br /><br />

                            <div class="col-md-6">
                                <div class="input_field">
                                    <input type="number" max="9999999" name="SALARY_FROM" value="<?php echo e(old('SALARY_FROM')); ?>" placeholder="Salary from (USD)">
                                </div>
                                <?php $__errorArgs = ['SALARY_FROM'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="alert alert-danger"><?php echo e(mb_strtoupper($message)); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>


                            <div class="col-md-12">
                                <div class="input_field">
                                        <textarea name="DESCRIPTION" id="" cols="30" rows="10"
                                                  placeholder="Vacancy description"><?php echo e(old('DESCRIPTION')); ?></textarea>
                                </div>
                                <?php $__errorArgs = ['DESCRIPTION'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="alert alert-danger"><?php echo e(mb_strtoupper($message)); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <div class="col-md-12">
                                <div class="input_field">
                                        <textarea name="RESPONSIBILITY" id="" cols="30" rows="10"
                                                  placeholder="Responsibilities. Every responsibility on a new line"><?php echo e(old('RESPONSIBILITY')); ?></textarea>
                                </div>
                                <?php $__errorArgs = ['RESPONSIBILITY'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="alert alert-danger"><?php echo e(mb_strtoupper($message)); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <div class="col-md-12">
                                <div class="input_field">
                                        <textarea name="QUALIFICATIONS" id="" cols="30" rows="10"
                                                  placeholder="Qualifications. Every qualification on a new line"><?php echo e(old('QUALIFICATIONS')); ?></textarea>
                                </div>
                                <?php $__errorArgs = ['QUALIFICATIONS'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="alert alert-danger"><?php echo e(mb_strtoupper($message)); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <div class="col-md-12">
                                <div class="input_field">
                                        <textarea name="BENEFITS" id="" cols="30" rows="10"
                                                  placeholder="Vacancy benefits"><?php echo e(old('BENEFITS')); ?></textarea>
                                </div>
                                <?php $__errorArgs = ['BENEFITS'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="alert alert-danger"><?php echo e(mb_strtoupper($message)); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <div class="col-md-12">
                                <div class="submit_btn">
                                    <button class="boxed-btn3 w-100 send-data-form" type="submit">Add vacancy</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div><?php /**PATH /var/www/Laravel-projects/JobBoard/resources/views/components/add-vacancy-form.blade.php ENDPATH**/ ?>