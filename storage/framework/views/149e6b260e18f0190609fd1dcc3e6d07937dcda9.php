<?php $__env->startSection('content'); ?>
    <div class="job_details_area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header"><?php echo e(__('Register')); ?></div>

                        <div class="card-body">
                            <form method="POST" action="<?php echo e(route('register')); ?>">
                                <?php echo csrf_field(); ?>

                                <div class="row mb-3">
                                    <label for="name"
                                           class="col-md-4 col-form-label text-md-right"><?php echo e(__('Name')); ?></label>

                                    <div class="col-md-6">
                                        <input id="name" type="text"
                                               class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="name"
                                               value="<?php echo e(old('name')); ?>" required autocomplete="name" autofocus>
                                        <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="email"
                                           class="col-md-4 col-form-label text-md-right"><?php echo e(__('E-Mail Address')); ?></label>

                                    <div class="col-md-6">
                                        <input id="email" type="email"
                                               class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="email"
                                               value="<?php echo e(old('email')); ?>" required autocomplete="email">
                                        <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="phone"
                                           class="col-md-4 col-form-label text-md-right"><?php echo e(__('Phone')); ?></label>
                                    <div class="col-md-6">
                                        <input id="phone" type="text"
                                               class="form-control <?php $__errorArgs = ['PHONE'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="PHONE"
                                               value="<?php echo e(old('PHONE')); ?>">
                                        <?php $__errorArgs = ['PHONE'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="country"
                                           class="col-md-4 col-form-label text-md-right"><?php echo e(__('Country')); ?></label>
                                    <div class="col-md-6">
                                        <input id="country" type="text"
                                               class="form-control <?php $__errorArgs = ['COUNTRY'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="COUNTRY"
                                               value="<?php echo e(old('COUNTRY')); ?>">
                                            <?php $__errorArgs = ['COUNTRY'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="invalid-feedback" role="alert">
                                            <strong><?php echo e($message); ?></strong>
                                        </span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="city"
                                           class="col-md-4 col-form-label text-md-right"><?php echo e(__('City')); ?></label>
                                    <div class="col-md-6">
                                        <input id="city" type="text"
                                               class="form-control <?php $__errorArgs = ['CITY'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="CITY"
                                               value="<?php echo e(old('CITY')); ?>">
                                           <?php $__errorArgs = ['CITY'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="invalid-feedback" role="alert">
                                            <strong><?php echo e($message); ?></strong>
                                        </span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>




                                <div class="row mb-3">
                                    <label for="account_type"
                                           class="col-md-4 col-form-label text-md-right"><?php echo e(__('Account type')); ?></label>
                                    <div class="col-md-6">
                                        <select id="account_type" name="role_name" class="wide">
                                            <option value="company">Company</option>
                                            <option value="candidate">Candidate</option>
                                        </select>
                                    </div>
                                </div>


                                

                                <div class="row mb-3" id="EMPLOYEE_CNT_INPUT">
                                        <label for="website"
                                               class="col-md-4 col-form-label text-md-right"><?php echo e(__('Amount of workers')); ?> </label>
                                        <div class="col-md-6">
                                            <input id="website" type="number"
                                                   class="form-control <?php $__errorArgs = ['EMPLOYEE_CNT'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                   name="EMPLOYEE_CNT"
                                                   value="<?php echo e(old('EMPLOYEE_CNT')); ?>"
                                                   autocomplete="website" autofocus>
                                            <?php $__errorArgs = ['EMPLOYEE_CNT'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="invalid-feedback" role="alert">
                                            <strong><?php echo e($message); ?></strong>
                                        </span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>

                                <div class="row mb-3" id="WEB_SITE_INPUT">
                                    <label for="website"
                                           class="col-md-4 col-form-label text-md-right"><?php echo e(__('Website')); ?></label>

                                    <div class="col-md-6">
                                        <input id="website" type="text"
                                               class="form-control <?php $__errorArgs = ['WEB_SITE'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                               name="WEB_SITE"
                                               value="<?php echo e(old('WEB_SITE')); ?>"
                                               autocomplete="website" autofocus>
                                        <?php $__errorArgs = ['WEB_SITE'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>

                                <div class="row mb-3" id="DESCRIPTION_INPUT">
                                    <label for="account_type"
                                           class="col-md-4 col-form-label text-md-right"><?php echo e(__('Company description')); ?></label>
                                    <div class="col-md-6">
                                <textarea name="DESCRIPTION" id="" cols="26" rows="15"
                                          placeholder="Company description"><?php echo e(old('DESCRIPTION')); ?></textarea>
                                    </div>
                                    <?php $__errorArgs = ['DESCRIPTION'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>


                                
                                <div class="row mb-3" id="CATEGORY_ID_INPUT">
                                    <label for="account_type"
                                           class="col-md-4 col-form-label text-md-right"><?php echo e(__('Base technology')); ?></label>
                                    <div class="col-md-6">
                                        <?php $jobCategories = \App\Models\JobCategories::all();?>
                                        <select id="account_type" name="CATEGORY_ID" class="wide">
                                            <?php $__currentLoopData = $jobCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($category->ID); ?>"><?php echo e($category->NAME); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-3" id="LEVEL_INPUT">
                                    <label for="account_type"
                                           class="col-md-4 col-form-label text-md-right"><?php echo e(__('Your level')); ?></label>
                                    <div class="col-md-6">
                                        <select id="account_type" name="LEVEL" class="wide">
                                            <option value="Junior" selected>Junior</option>
                                            <option value="Middle">Middle</option>
                                            <option value="Senior">Senior</option>
                                            <option value="Team-lead">Team-lead</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-3" id="YEARS_EXPERIENCE_INPUT">
                                    <label for="website"
                                           class="col-md-4 col-form-label text-md-right"><?php echo e(__('Years experience')); ?></label>

                                    <div class="col-md-6">
                                        <input id="website" type="number"
                                               class="form-control <?php $__errorArgs = ['YEARS_EXPERIENCE'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                               name="YEARS_EXPERIENCE"
                                               value="<?php echo e(old('YEARS_EXPERIENCE')); ?>"
                                               autocomplete="website" autofocus>
                                        <?php $__errorArgs = ['YEARS_EXPERIENCE'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>

                                <div class="row mb-3" id="SALARY_INPUT">
                                    <label for="website"
                                           class="col-md-4 col-form-label text-md-right"><?php echo e(__('Desired salary')); ?></label>

                                    <div class="col-md-6">
                                        <input id="website" type="number"
                                               class="form-control <?php $__errorArgs = ['SALARY'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                               name="SALARY"
                                               value="<?php echo e(old('SALARY')); ?>"
                                               autocomplete="website" autofocus>
                                        <?php $__errorArgs = ['SALARY'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>

                                <div class="row mb-3" id="EXPERIENCE_INPUT">
                                    <label for="account_type"
                                           class="col-md-4 col-form-label text-md-right"><?php echo e(__('Experience')); ?></label>
                                    <div class="col-md-6">
                                <textarea name="EXPERIENCE" id="" cols="26" rows="15"
                                          placeholder="Describe your experience"></textarea>
                                    </div>
                                    <?php $__errorArgs = ['EXPERIENCE'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>

                                <div class="row mb-3" id="EDUCATION_INPUT">
                                    <label for="account_type"
                                           class="col-md-4 col-form-label text-md-right"><?php echo e(__('Education')); ?></label>
                                    <div class="col-md-6">
                                <textarea name="EDUCATION" id="" cols="26" rows="15"
                                          placeholder="Describe your education"></textarea>
                                    </div>
                                    <?php $__errorArgs = ['EDUCATION'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>

                                <div class="row mb-3" id="SKILLS_INPUT">
                                    <label for="account_type"
                                           class="col-md-4 col-form-label text-md-right"><?php echo e(__('Skills')); ?></label>
                                    <div class="col-md-6">
                                <textarea name="SKILLS" id="" cols="26" rows="15"
                                          placeholder="Every skill on a new line"></textarea>
                                    </div>
                                    <?php $__errorArgs = ['SKILLS'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                                </div>

                                <div class="row mb-3" id="LANGUAGES_INPUT">
                                    <label for="account_type"
                                           class="col-md-4 col-form-label text-md-right"><?php echo e(__('Languages')); ?></label>
                                    <div class="col-md-6">
                                <textarea name="LANGUAGES" id="" cols="26" rows="15"
                                          placeholder="Every language on a new line"></textarea>
                                    </div>
                                    <?php $__errorArgs = ['LANGUAGES'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>

                                <div class="row mb-3" id="ABOUT_ME_INPUT">
                                    <label for="account_type"
                                           class="col-md-4 col-form-label text-md-right"><?php echo e(__('About me')); ?></label>
                                    <div class="col-md-6">
                                <textarea name="ABOUT_ME" id="" cols="26" rows="15"
                                          placeholder="Describe you interests, hobbies and etc."></textarea>
                                    </div>
                                    <?php $__errorArgs = ['ABOUT_ME'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>


                                <div class="row mb-3">
                                    <label for="password"
                                           class="col-md-4 col-form-label text-md-right"><?php echo e(__('Password')); ?></label>

                                    <div class="col-md-6">
                                        <input id="password" type="password"
                                               class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                               name="password"
                                               required autocomplete="new-password">

                                        <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="password-confirm"
                                           class="col-md-4 col-form-label text-md-right"><?php echo e(__('Confirm Password')); ?></label>

                                    <div class="col-md-6">
                                        <input id="password-confirm" type="password" class="form-control"
                                               name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                </div>

                                <div class="row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-success">
                                            <?php echo e(__('Register')); ?>

                                        </button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/Laravel-projects/JobBoard/resources/views/auth/register.blade.php ENDPATH**/ ?>