
<link rel="stylesheet" href="<?php echo e(asset('css/language/ar.css')); ?>">
<!-- Bootstrap 4.0-->
<link rel="stylesheet" href="<?php echo e(asset('css/bootstrap.min.css')); ?>">


<!-- theme style -->
<link rel="stylesheet" href="<?php echo e(asset('css/master_style.css')); ?>">


<!-- Fab Admin skins -->
<link rel="stylesheet" href="<?php echo e(asset('css/skins/_all-skins.css')); ?>">

<link rel="stylesheet" href="<?php echo e(asset('css/someCss.css')); ?>">

<?php if( Config::get('app.locale') == 'ar'): ?>
<link rel="stylesheet" href="<?php echo e(asset('css/arabic-css.css')); ?>">
<?php endif; ?>
<!-- Select2 -->
<link rel="stylesheet" href="<?php echo e(asset('vendor_components/select2/dist/css/select2.min.css')); ?>" />
<link rel="stylesheet" href="<?php echo e(asset('css/font-awesome.css')); ?>" />
<!-- horizontal menu style -->
<link rel="stylesheet" href="<?php echo e(asset('css/horizontal_menu_style.css')); ?>">

<!--alerts CSS -->
<link href="<?php echo e(asset('vendor_components/sweetalert/sweetalert.css')); ?>" rel="stylesheet" type="text/css">


<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<link rel="stylesheet" href="//cdn.materialdesignicons.com/3.2.89/css/materialdesignicons.min.css">

<link rel="stylesheet" type="text/css"
    href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons" />

<link href="https://fonts.googleapis.com/css?family=Markazi+Text&display=swap" rel="stylesheet">

<!-- daterange picker -->
<link rel="stylesheet" href="<?php echo e(asset('vendor_components/bootstrap-daterangepicker/daterangepicker.css')); ?>">


<link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/daterangepicker.css')); ?>" />

<!-- toast CSS -->
<link href="<?php echo e(asset('vendor_components/jquery-toast-plugin-master/src/jquery.toast.css')); ?>" rel="stylesheet">

<?php echo $__env->yieldContent('added_css'); ?><?php /**PATH E:\xampp\htdocs\smartgis\bureau_ordre\resources\views/inc/css_links.blade.php ENDPATH**/ ?>