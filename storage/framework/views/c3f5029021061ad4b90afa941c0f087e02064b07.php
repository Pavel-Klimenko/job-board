<form class="form-contact contact_form" method="POST" action="<?php echo e(route('contact-us')); ?>">
    <?php echo csrf_field(); ?>
    <div class="row">
        <div class="col-12">
            <div class="form-group">
                <textarea class="form-control w-100" name="MESSAGE" id="message" cols="30"
                          rows="9" onfocus="this.placeholder = ''"
                          onblur="this.placeholder = 'Type your message'"
                          placeholder='Enter Message'><?php echo e(old('MESSAGE')); ?></textarea>
            </div>
            <?php $__errorArgs = ['MESSAGE'];
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


        <div class="col-sm-6">
            <div class="form-group">
                <input class="form-control" name="NAME" id="name" type="text"
                       onfocus="this.placeholder = ''"
                       value="<?php echo e(old('NAME')); ?>"
                       onblur="this.placeholder = 'Name'"
                       placeholder='Enter your name'>
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


        <div class="col-sm-6">
            <div class="form-group">
                <input class="form-control" name="EMAIL" id="email" type="email"
                       onfocus="this.placeholder = ''"
                       value="<?php echo e(old('EMAIL')); ?>"
                       onblur="this.placeholder = 'Email address'"
                       placeholder='Enter email address'>
            </div>
            <?php $__errorArgs = ['EMAIL'];
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

    </div>

    <div class="form-group mt-3">
        <button type="submit" class="button button-contactForm btn_4 boxed-btn send-data-form">
            Send Message
        </button>
    </div>
</form><?php /**PATH /var/www/job-board/resources/views/forms/contactUs.blade.php ENDPATH**/ ?>