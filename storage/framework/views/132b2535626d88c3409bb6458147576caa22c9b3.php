<?php $__env->startSection('added_css'); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/datatable/datatables.min.css')); ?>" />
<link rel="stylesheet" href="<?php echo e(asset('css/datatable/select.dataTables.min.css')); ?>" />
<style>
    .nav-tabs {
        border-bottom: 1px solid #009dc5;
    }


    .en-retard-line {
        background-color: #ff3200;
    }

    .cloturer-line {
        background-color: #9fd037;
    }

    .en-cours-line {
        background-color: #009dc5;
    }

    .brouillon-line {
        background-color: #7dd8fb;
    }
</style>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="row">
    <div class="col-12">
        <div class="box">

            <!-- /.box-header -->
            <div class="box-body">
                <?php echo $__env->make('courriers.entrants.show.tabs', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <!-- Tab panes -->
                <div class="tab-content" style="margin-top: 15px">

                    <?php echo $__env->make('courriers.entrants.show.tabs.tab_brouillons', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php echo $__env->make('courriers.entrants.show.tabs.tab_en_cours', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php echo $__env->make('courriers.entrants.show.tabs.tab_en_retard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php echo $__env->make('courriers.entrants.show.tabs.tab_cloture', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php echo $__env->make('courriers.entrants.show.tabs.tab_tous', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
</div>


<?php $__env->stopSection(); ?>




<?php $__env->startPush('added_scripts'); ?>

<script>
    $('#date_reception_brouillon_input').daterangepicker({
        locale: {
        format: '<?php echo e(config('app.date_format_javascript')); ?>'
        }
    });
</script>


<script src="<?php echo e(asset('css/datatable/datatables.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/courriersEntrants/show/index_show_tous.js')); ?>"></script>
<script src="<?php echo e(asset('js/courriersEntrants/show/index_show_brouillon.js')); ?>"></script>
<script src="<?php echo e(asset('js/courriersEntrants/show/index_show_en_cours.js')); ?>"></script>
<script src="<?php echo e(asset('js/courriersEntrants/show/index_show_en_retard.js')); ?>"></script>
<script src="<?php echo e(asset('js/courriersEntrants/show/index_show_cloture.js')); ?>"></script>
<script src="<?php echo e(asset('js/courriersEntrants/show/index_show_courrier_entrants.js')); ?>"></script>

<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\bureau_ordre\resources\views/courriers/entrants/show/index.blade.php ENDPATH**/ ?>