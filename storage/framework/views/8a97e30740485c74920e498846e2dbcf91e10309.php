<!-- header-start -->
<header>
    <div class="header-area ">
        <div id="sticky-header" class="main-header-area">
            <div class="container-fluid ">
                <div class="header_bottom_border">
                    <div class="row align-items-center">
                        <div class="col-xl-3 col-lg-2">
                            <div class="logo">
                                <a href="<?php echo e(route('homepage')); ?>">
                                    <img src="/img/logo.png" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-7">
                            <div class="main-menu  d-none d-lg-block">
                                <nav>
                                    <ul id="navigation">
                                        <li><a href="<?php echo e(route('homepage')); ?>">home</a></li>
                                        <li><a href="<?php echo e(route('browse-job')); ?>">Browse Job</a></li>
                                        <li><a href="<?php echo e(route('candidates')); ?>">Candidates</a></li>

                                        <li><a href="<?php echo e(route('contact')); ?>">Contact <i class="ti-angle-down"></i></a>
                                            <ul class="submenu">
                                                <li class="main-menu-contact"><a href="<?php echo e(route('contact')); ?>">Contact</a></li>
                                                <li><a href="<?php echo e(route('form-add-review')); ?>">Leave review</a></li>
                                            </ul>
                                        </li>

                                        <?php if(Auth::guest()): ?>
                                            <li><a href="/login/">Login</a></li>
                                        <?php else: ?>
                                            <li><a href="<?php echo e(route('personal-info')); ?>">Personal area</a></li>
                                        <?php endif; ?>
                                    </ul>
                                </nav>
                            </div>
                        </div>

                        <?php if(Auth::guest()): ?>
                        <div class="col-xl-3 col-lg-3 d-none d-lg-block">
                            <div class="Appointment">
                                <div class="phone_num d-none d-xl-block">
                                    <a href="/login/">Login</a>
                                </div>
                                <div class="d-none d-lg-block">
                                    <a class="boxed-btn3" href="/register/">Register</a>
                                </div>
                            </div>
                        </div>
                        <?php else: ?>
                            <?php
                                $userName = Auth::user()->NAME;
                            ?>
                            <div class="col-xl-3 col-lg-3 d-none d-lg-block">
                                <div class="Appointment">
                                    <div class="phone_num d-none d-xl-block">
                                        <a href="<?php echo e(route('logout')); ?>">Logout</a>
                                    </div>
                                    <div class="phone_num d-none d-xl-block">
                                        <a href="<?php echo e(route('personal-info')); ?>">You are logged as <u><?php echo e($userName); ?></u></a>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>

                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</header>
<!-- header-end -->




<?php /**PATH /var/www/Laravel-projects/JobBoard/resources/views/inc/header.blade.php ENDPATH**/ ?>