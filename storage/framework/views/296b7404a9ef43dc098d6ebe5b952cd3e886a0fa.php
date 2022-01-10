<!-- footer start -->
<footer class="footer">
    <div class="footer_top">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-md-6 col-lg-3">
                    <div class="footer_widget wow fadeInUp" data-wow-duration="1s" data-wow-delay=".3s">
                        <div class="footer_logo">
                            <a href="<?php echo e(route('homepage')); ?>">
                                <img src="/img/logo.png" alt="">
                            </a>
                        </div>

                        
                        <?php if (isset($component)) { $__componentOriginal46efd3e02680b3b6975c5416bb89a503caecb9fb = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\ContactInfo::class, []); ?>
<?php $component->withName('contact-info'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginal46efd3e02680b3b6975c5416bb89a503caecb9fb)): ?>
<?php $component = $__componentOriginal46efd3e02680b3b6975c5416bb89a503caecb9fb; ?>
<?php unset($__componentOriginal46efd3e02680b3b6975c5416bb89a503caecb9fb); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>

                    </div>
                </div>

                <div class="col-xl-2 col-md-3 col-lg-5">
                    <div class="footer_widget wow fadeInUp" data-wow-duration="1.1s" data-wow-delay=".4s">
                        <h3 class="footer_title">
                            <a href="<?php echo e(route('homepage')); ?>">Home</a>
                        </h3>
                    </div>
                </div>
                <div class="col-xl-2 col-md-3 col-lg-5">
                    <div class="footer_widget wow fadeInUp" data-wow-duration="1.1s" data-wow-delay=".4s">
                        <h3 class="footer_title">
                            <a href="<?php echo e(route('browse-job')); ?>">Browse Job</a>
                        </h3>
                    </div>
                </div>
                <div class="col-xl-2 col-md-3 col-lg-5">
                    <div class="footer_widget wow fadeInUp" data-wow-duration="1.2s" data-wow-delay=".5s">
                        <h3 class="footer_title">
                            <a href="<?php echo e(route('candidates')); ?>">Candidates</a>
                        </h3>
                    </div>
                </div>

                <div class="col-xl-2 col-md-3 col-lg-5 main-menu-contact">
                    <div class="footer_widget wow fadeInUp" data-wow-duration="1.3s" data-wow-delay=".6s">
                        <h3 class="footer_title">
                            <a href="<?php echo e(route('contact')); ?>">Contact</a>
                        </h3>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="copy-right_text wow fadeInUp" data-wow-duration="1.4s" data-wow-delay=".3s">
        <div class="container">
            <div class="footer_border"></div>
            <div class="row">
                <div class="col-xl-12">
                    <p class="copy_right text-center">
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy;<script>document.write(new Date().getFullYear());</script>
                        All rights reserved | This template is made with <i class="fa fa-heart-o"
                                                                            aria-hidden="true"></i> by <a
                                href="https://colorlib.com" target="_blank">Colorlib</a>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </p>
                </div>
            </div>
        </div>
    </div>


    <!--Modals -->
    <?php echo $__env->make('inc.popups.formSent', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

</footer>
<!--/ footer end  -->

<?php /**PATH /var/www/Laravel-projects/JobBoard/resources/views/inc/footer.blade.php ENDPATH**/ ?>