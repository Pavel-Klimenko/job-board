<aside class="single_sidebar_widget post_category_widget">
    <h4 class="widget_title"><?php echo e($title); ?></h4>
    <?php
    $isCompanyFlag = \App\Services\Helper::isCompany();
    $isCandidateFlag = \App\Services\Helper::isCandidate();
    ?>
    <ul class="list cat-list">
        <li>
            <a href="<?php echo e(route('personal-info')); ?>" class="d-flex">
                <?php if($title == 'Personal info'): ?>
                    <p><b><?php echo e($title); ?></b></p>
                <?php else: ?>
                    <p>Personal info</p>
                <?php endif; ?>
            </a>
        </li>
        <?php if($isCompanyFlag): ?>
            <li>
                <a href="<?php echo e(route('personal-vacancies')); ?>" class="d-flex">
                    <?php if($title == 'Company vacancies'): ?>
                        <p><b><?php echo e($title); ?></b></p>
                    <?php else: ?>
                        <p>Company vacancies</p>
                    <?php endif; ?>
                </a>
            </li>
        <?php endif; ?>
        <li>
            <a href="<?php echo e(route('interview-requests', ['type' => 'all'])); ?>" class="d-flex">
                <?php if($title == 'All interview requests'): ?>
                    <p><b><?php echo e($title); ?></b></p>
                <?php else: ?>
                    <p>All interview requests</p>
                <?php endif; ?>

            </a>
        </li>
        <li>
            <a href="<?php echo e(route('interview-requests', ['type' => 'accepted'])); ?>" class="d-flex">
                <?php if($title == 'Accepted interview requests'): ?>
                    <p><b><?php echo e($title); ?></b></p>
                <?php else: ?>
                    <p>Accepted interview requests</p>
                <?php endif; ?>
            </a>
        </li>
        <?php if($isCompanyFlag): ?>
            <li>
                <a href="<?php echo e(route('interview-requests', ['type' => 'rejected'])); ?>" class="d-flex">
                    <?php if($title == 'Rejected interview requests'): ?>
                        <p><b><?php echo e($title); ?></b></p>
                    <?php else: ?>
                        <p>Rejected interview requests</p>
                    <?php endif; ?>
                </a>
            </li>
        <?php endif; ?>
    </ul>

</aside>

<?php /**PATH /var/www/job-board/resources/views/personal/aside.blade.php ENDPATH**/ ?>