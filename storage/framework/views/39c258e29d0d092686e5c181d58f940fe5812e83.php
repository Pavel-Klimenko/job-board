<?php $__env->startSection('title'); ?>
    Add your review
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="job_details_area">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="apply_job_form white-bg">
                        <h4>Add review about <b>JobBoard</b></h4>
                        <form method="POST" action="<?php echo e(route('create-review')); ?>" id="rForm" enctype='multipart/form-data'>
                            <?php echo csrf_field(); ?>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="input_field">
                                        <input type="text" name="NAME" value="<?php echo e(old('NAME')); ?>" placeholder="Your name">
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

                                <div class="col-md-12">
                                    <div class="input_field">
                                        <textarea name="REVIEW" id="" cols="30" rows="10"
                                                  placeholder="Type your review"><?php echo e(old('REVIEW')); ?></textarea>
                                    </div>
                                    <?php $__errorArgs = ['REVIEW'];
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
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <button type="button" id="inputGroupFileAddon03"><i
                                                        class="fa fa-cloud-upload" aria-hidden="true"></i>
                                            </button>
                                        </div>
                                        <div class="custom-file">
                                            <input name="PHOTO" type="file" class="custom-file-input" id="inputGroupFile03"
                                                   aria-describedby="inputGroupFileAddon03">
                                            <label class="custom-file-label" for="inputGroupFile03">Upload your photo</label>
                                        </div>
                                    </div>
                                    <?php $__errorArgs = ['PHOTO'];
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
                                    <p class="uploaded-file"></p>
                                </div>

                                <div class="col-md-12">
                                    <div class="submit_btn">
                                        <button class="boxed-btn3 w-100 send-data-form" type="submit">Add review</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $( document ).ready(function() {
            $('#inputGroupFile03').change(function() {
                let filename = $('#inputGroupFile03').val();
                $('.uploaded-file').html('File added: ' + filename);
            });
        });

    </script>

<?php $__env->stopSection(); ?>




<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/job-board/resources/views/forms/addReview.blade.php ENDPATH**/ ?>