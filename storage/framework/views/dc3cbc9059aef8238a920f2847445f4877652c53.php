<p>
    Company <u><?php echo e($company->NAME); ?></u> invited you for an interview!
    Please contact us for details:
</p>
<ul>
    <li>Email: <a href="mailto:<?php echo e($company->EMAIL); ?>"><?php echo e($company->EMAIL); ?></a></li>
    <li>Phone: <a href="tel:<?php echo e($company->PHONE); ?>"><?php echo e($company->PHONE); ?></a></li>
    <li>Website: <a href="<?php echo e($company->WEB_SITE); ?>"><?php echo e($company->WEB_SITE); ?></a></li>
</ul><br/><br/><?php /**PATH /var/www/Laravel-projects/JobBoard/resources/views/personal/inc/acceptedInfo.blade.php ENDPATH**/ ?>