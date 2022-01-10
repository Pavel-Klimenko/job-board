<?php $__env->startSection('title'); ?>
    Add new vacancy
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php if (isset($component)) { $__componentOriginala6876be9f9c79b217d36a4d356eda8af9afcdca0 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\AddVacancyForm::class, []); ?>
<?php $component->withName('add-vacancy-form'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginala6876be9f9c79b217d36a4d356eda8af9afcdca0)): ?>
<?php $component = $__componentOriginala6876be9f9c79b217d36a4d356eda8af9afcdca0; ?>
<?php unset($__componentOriginala6876be9f9c79b217d36a4d356eda8af9afcdca0); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/Laravel-projects/JobBoard/resources/views/forms/addVacancy.blade.php ENDPATH**/ ?>