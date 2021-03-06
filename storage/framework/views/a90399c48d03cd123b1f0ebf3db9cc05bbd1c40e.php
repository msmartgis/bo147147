<?php $__env->startSection('added_css'); ?>

<!-- Bootstrap time Picker -->
<link rel="stylesheet" href="<?php echo e(asset('vendor_plugins/timepicker/bootstrap-timepicker.min.css')); ?>" />

<!-- bootstrap datepicker -->
<link rel="stylesheet"
    href="<?php echo e(asset('vendor_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')); ?>" />

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
            <h3 style="text-align : center; margin-top : 12px;font-weight: 700;"><?php echo e(__('Fiche détaillée')); ?> :
                <?php echo e(__('Courrier')); ?>

                <?php echo e($courrier->ref); ?>

            </h3>
            <!-- /.box-header -->
            <div id="tabs_courrier_edit" style="margin-left: 12px;">
                <?php echo $__env->make('courriers.entrants.edit.tabs_edit_courrier', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php echo $__env->make('courriers.entrants.edit.form_edit_courrier_entrant', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>

            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
</div>

<?php echo $__env->make('courriers.entrants.edit.modals', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('courriers.entrants.create.modals', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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


<script src="<?php echo e(asset('js/courriersEntrants/index_courriers_entrants_edit.js')); ?>"></script>
<script src="<?php echo e(asset('js/courriersEntrants/show/index_show_courrier_entrants.js')); ?>"></script>
<script src="<?php echo e(asset('js/services/index_services.js')); ?>"></script>
<script src="<?php echo e(asset('js/users/index_users.js')); ?>"></script>
<script src="<?php echo e(asset('js/modesRecepetion/index_mode_reception.js')); ?>"></script>
<script src="<?php echo e(asset('js/documentsTypes/index_documents_types.js')); ?>"></script>


<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\smartgis\bureau_ordre\resources\views/courriers/entrants/edit/index_edit_ce.blade.php ENDPATH**/ ?>