<div class="row">
    <div class="col-lg-12">
        <div class="pagination_wrap">
            <ul>

                
                <?php if(!$paginator->onFirstPage()): ?>
                    <li><a href="<?php echo e($paginator->previousPageUrl()); ?>" rel="prev"
                           aria-label="<?php echo app('translator')->get('pagination.previous'); ?>"> <i class="ti-angle-left"></i> </a></li>
                <?php endif; ?>


                
                <?php $__currentLoopData = $elements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    
                    <?php if(is_array($element)): ?>
                        <?php $__currentLoopData = $element; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page => $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($page == $paginator->currentPage()): ?>
                                <li class="active" aria-current="page">
                                    <a href="javascript:void(0);">
                                        <span><b><?php echo e($page); ?></b></span>
                                    </a>
                                </li>
                            <?php else: ?>
                                <li><a href="<?php echo e($url); ?>"><span><?php echo e($page); ?></span></a></li>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                
                <?php if($paginator->hasMorePages()): ?>

                    <li><a href="<?php echo e($paginator->nextPageUrl()); ?>" rel="next" aria-label="<?php echo app('translator')->get('pagination.next'); ?>"> <i
                                    class="ti-angle-right"></i> </a></li>
                <?php endif; ?>


            </ul>
        </div>
    </div>
</div><?php /**PATH /var/www/job-board/resources/views/paginate.blade.php ENDPATH**/ ?>