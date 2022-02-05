<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>JobBoard - <?php echo $__env->yieldContent('title'); ?></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- <link rel="manifest" href="site.webmanifest"> -->
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo e(asset('img/favicon.png')); ?>">
    <!-- Place favicon.ico in the root directory -->

    <!-- CSS here -->
    <link rel="stylesheet" href="<?php echo e(asset('css/bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/owl.carousel.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/magnific-popup.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/font-awesome.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/themify-icons.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/nice-select.css')); ?>">

    <link rel="stylesheet" href="<?php echo e(asset('css/flaticon.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/gijgo.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/animate.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/slicknav.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>">
    <!-- <link rel="stylesheet" href="css/responsive.css"> -->

    <link rel="stylesheet" href="<?php echo e(asset('css/custom_css/general.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/custom_css/popups.css')); ?>">


    <script src="https://code.jquery.com/jquery-3.6.0.js"
            integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
            crossorigin="anonymous"></script>


</head>


<body>
<?php echo $__env->make('inc.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php if (isset($component)) { $__componentOriginal01b4f1dbbb3b5a01d5176c6f051164cd2951e8ee = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Slider::class, []); ?>
<?php $component->withName('slider'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginal01b4f1dbbb3b5a01d5176c6f051164cd2951e8ee)): ?>
<?php $component = $__componentOriginal01b4f1dbbb3b5a01d5176c6f051164cd2951e8ee; ?>
<?php unset($__componentOriginal01b4f1dbbb3b5a01d5176c6f051164cd2951e8ee); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>

<?php echo $__env->yieldContent('content'); ?>

<?php echo $__env->make('inc.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<!-- link that opens popup -->
<!-- JS here -->

<script src="<?php echo e(asset('js/vendor/jquery-1.12.4.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/vendor/modernizr-3.5.0.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/popper.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/bootstrap.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/owl.carousel.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/isotope.pkgd.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/ajax-form.js')); ?>"></script>
<script src="<?php echo e(asset('js/waypoints.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/jquery.counterup.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/imagesloaded.pkgd.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/scrollIt.js')); ?>"></script>
<script src="<?php echo e(asset('js/jquery.scrollUp.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/wow.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/nice-select.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/jquery.slicknav.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/jquery.magnific-popup.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/plugins.js')); ?>"></script>
<script src="<?php echo e(asset('js/gijgo.min.js')); ?>"></script>


<!--contact js-->
<script src="<?php echo e(asset('js/contact.js')); ?>"></script>
<script src="<?php echo e(asset('js/jquery.ajaxchimp.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/jquery.form.js')); ?>"></script>
<script src="<?php echo e(asset('js/jquery.validate.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/mail-script.js')); ?>"></script>
<script src="<?php echo e(asset('js/main.js')); ?>"></script>



<script src="<?php echo e(asset('js/custom_js/general.js')); ?>"></script>
<script src="<?php echo e(asset('js/custom_js/personal.js')); ?>"></script>



<?php if(Route::current()->getName() == 'register'): ?>
    <script src="<?php echo e(asset('js/custom_js/register.js')); ?>"></script>
<?php endif; ?>


</body>
</html>
<?php /**PATH /var/www/job-board/resources/views/layouts/app.blade.php ENDPATH**/ ?>