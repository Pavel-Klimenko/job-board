<?php if($request->STATUS == 'accepted'): ?>
    <p>
        <a href="<?php echo e(route('change-advice-status', ['ADVICE_ID' => $request->ID, 'STATUS' => 'rejected'])); ?>"
           type="button" class="btn btn-outline-warning">Reject</a>
    </p>
<?php elseif($request->STATUS == 'rejected'): ?>
    <p>
        <a href="<?php echo e(route('change-advice-status', ['ADVICE_ID' => $request->ID, 'STATUS' => 'accepted'])); ?>"
           type="button" class="btn btn-outline-success">Accept</a>
    </p>
<?php else: ?>
    <p>
        <a href="<?php echo e(route('change-advice-status', ['ADVICE_ID' => $request->ID, 'STATUS' => 'accepted'])); ?>"
           type="button" class="btn btn-outline-success">Accept</a>
        <a href="<?php echo e(route('change-advice-status', ['ADVICE_ID' => $request->ID, 'STATUS' => 'rejected'])); ?>"
           type="button" class="btn btn-outline-warning">Reject</a>
    </p>
<?php endif; ?><?php /**PATH /var/www/job-board/resources/views/personal/inc/companyButtons.blade.php ENDPATH**/ ?>