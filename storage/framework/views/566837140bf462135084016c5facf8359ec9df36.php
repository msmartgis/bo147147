<?php $__env->startSection('added_css'); ?>

<!-- Bootstrap time Picker -->
<link rel="stylesheet" href="<?php echo e(asset('vendor_plugins/timepicker/bootstrap-timepicker.min.css')); ?>" />

<!-- bootstrap datepicker -->
<link rel="stylesheet"
    href="<?php echo e(asset('vendor_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')); ?>" />
<!-- toast CSS -->
<link href="<?php echo e(asset('vendor_components/jquery-toast-plugin-master/src/jquery.toast.css')); ?>" rel="stylesheet">
<!--alerts CSS -->
<link href="<?php echo e(asset('vendor_components/sweetalert/sweetalert.css')); ?>" rel="stylesheet" type="text/css">
<style>
    .nav-tabs {
        border-bottom: 1px solid #009dc5;
    }

    .table>thead>tr>th {
        text-align: center;
        background-color: #0b2942 !important;
        color: #F3F3F3 !important;
        border: 1px solid #dbe1e6;
    }

    .m-hidden {
        display: none !important;
    }
</style>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-12">
        <div class="box">
            <h3 style="text-align : center; margin-top : 12px"><?php echo e(__('Fiche détaillée')); ?> : <?php echo e(__('Courrier')); ?>

                <?php echo e($courrier->ref); ?>

            </h3>
            <!-- /.box-header -->

            <div id="tabs_courrier_edit" style="margin-left: 12px;">
                <?php echo $__env->make('courriers.sortants.edit.tabs_edit_courrier', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php echo $__env->make('courriers.sortants.edit.form_edit_courrier_sortant', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>

            <!-- /.box-body -->
        </div>
        <!-- /.box -->
        <?php echo $__env->make('courriers.sortants.edit.modals', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
</div>


<?php $__env->stopSection(); ?>

<?php $__env->startPush('added_scripts'); ?>
<!-- bootstrap datepicker -->
<script src="<?php echo e(asset('vendor_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')); ?>"></script>

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

<!-- Sweet-Alert  -->
<script src="<?php echo e(asset('vendor_components/sweetalert/sweetalert.min.js')); ?>"></script>
<script src="<?php echo e(asset('vendor_components/sweetalert/jquery.sweet-alert.custom.js')); ?>"></script>

<script src="<?php echo e(asset('js/courriersSortants/index_courriers_sortants_edit.js')); ?>"></script>
<script src="<?php echo e(asset('js/courriersSortants/show/index_show_courrier_sortants.js')); ?>"></script>
<script src="<?php echo e(asset('js/services/index_services.js')); ?>"></script>
<script src="<?php echo e(asset('js/users/index_users.js')); ?>"></script>
<script src="<?php echo e(asset('js/modesRecepetion/index_mode_reception.js')); ?>"></script>
<script src="<?php echo e(asset('js/documentsTypes/index_documents_types.js')); ?>"></script>


<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\smartgis\bureau_ordre\resources\views/courriers/sortants/edit/index_edit_cs.blade.php ENDPATH**/ ?>