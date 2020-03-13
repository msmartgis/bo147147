<?php $__env->startSection('js-localization.head'); ?>
    <script src="<?php echo e(url('/js-localization/localization.js')); ?>"></script>
    <script src="<?php echo e(url('/js-localization/messages')); ?>"></script>

    <?php if(Config::get('js-localization.config')): ?>
        <script src="<?php echo e(url('/js-localization/config')); ?>"></script>
    <?php endif; ?>

    <script>
        Lang.setLocale("<?php echo e(App::getLocale()); ?>");
    </script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js-localization.head.all_in_one'); ?>
    <script src="<?php echo e(url('/js-localization/all.js')); ?>"></script>
    <script>
        Lang.setLocale("<?php echo e(App::getLocale()); ?>");
    </script>
<?php $__env->stopSection(); ?>
<?php /**PATH C:\xampp\htdocs\bureau_ordre\vendor\andywer\js-localization\src/../resources/views/head.blade.php ENDPATH**/ ?>