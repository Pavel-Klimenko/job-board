<div class="top_companies_area">
    <div class="container">
        <div class="row align-items-center mb-40">
            <div class="col-lg-6 col-md-6">
                <div class="section_title">
                    <h3>Companies</h3>
                </div>
            </div>
        </div>
        <div class="row">
            <?php $__currentLoopData = $companies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $company): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                $vacancyModel = \App\Models\Vacancies::class;
                $companyVacanciesQuantity = \App\Services\Helper::countTableRow($vacancyModel, 'COMPANY_ID', $company->id);
                ?>
                    <?php if($companyVacanciesQuantity > 0): ?>
                        <div class="col-lg-4 col-xl-3 col-md-6">
                            <div class="single_company">
                                <div class="thumb">
                                    <img src="<?php echo e($company->ICON); ?>" alt="">
                                </div>
                                <a href="/browse-job?COMPANY_ID=<?php echo e($company->id); ?>"><h3><?php echo e($company->NAME); ?></h3></a>
                                <p><span><?php echo e($companyVacanciesQuantity); ?></span> Available position</p>
                            </div>
                        </div>
                    <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </div>
    </div>
</div><?php /**PATH /var/www/Laravel-projects/JobBoard/resources/views/home_blocks/companies.blade.php ENDPATH**/ ?>