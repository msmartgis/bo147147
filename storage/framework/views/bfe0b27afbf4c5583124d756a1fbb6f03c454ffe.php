<?php $__env->startSection('added_css'); ?>

<!-- Bootstrap time Picker -->
<link rel="stylesheet" href="<?php echo e(asset('vendor_plugins/timepicker/bootstrap-timepicker.min.css')); ?>" />

<!-- bootstrap datepicker -->
<link rel="stylesheet" href="<?php echo e(asset('vendor_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')); ?>" />
    <!-- toast CSS -->
<link href="<?php echo e(asset('vendor_components/jquery-toast-plugin-master/src/jquery.toast.css')); ?>" rel="stylesheet">
<style>

.nav-tabs
{
	    border-bottom: 1px solid #009dc5;
}
</style>
    
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

	<div class="row">
        <div class="col-12">
            <div class="box">

                <!-- /.box-header -->
                <div class="box-body wizard-content">
                    <?php echo $__env->make('diffusion_interne.create.form_add_diffusion_interne', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>               
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
    
    <?php echo $__env->make('diffusion_interne.create.modals', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('added_scripts'); ?>
    <!-- bootstrap datepicker -->
    <script src="<?php echo e(asset('vendor_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')); ?>"></script>
    
    <!-- steps -->
    <script src="<?php echo e(asset('vendor_components/jquery-steps-master/build/jquery.steps.js')); ?>"></script>

    <!-- wizard -->
    <script src="<?php echo e(asset('js/steps.js')); ?>"></script>

    	<!-- Fab Admin for advanced form element -->
    <script src="<?php echo e(asset('js/advanced-form-element.js')); ?>"></script>

    <!-- CK Editor -->
    <script src="<?php echo e(asset('vendor_components/ckeditor/ckeditor.js')); ?>"></script>

    <!-- Fab Admin for editor -->
    <script src="<?php echo e(asset('js/editor.js')); ?>"></script>
    <!-- Form validator JavaScript -->
    <script src="<?php echo e(asset('js/validation.js')); ?>"></script>
    <!-- toast -->
    <script src="<?php echo e(asset('vendor_components/jquery-toast-plugin-master/src/jquery.toast.js')); ?>"></script>
    <script src="<?php echo e(asset('js/toastr.js')); ?>"></script>

    <script src="<?php echo e(asset('js/diffusion_interne/index.js')); ?>"></script>
    <script src="<?php echo e(asset('js/services/index_services.js')); ?>"></script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\bureau_ordre\resources\views/diffusion_interne/create/index_create_di.blade.php ENDPATH**/ ?>