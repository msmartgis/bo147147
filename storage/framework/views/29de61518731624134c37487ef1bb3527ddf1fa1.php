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

    .ref-show {
        font-weight: bold;
        text-decoration: underline;
        background-color: rgb(192, 222, 248);
        border-radius: 4px;
        text-align: center;
        padding: 1px;
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
                    <?php if(Auth::user()->role->first()->role_name == "bureau_ordre" ||
                    Auth::user()->role->first()->role_name == "admin"): ?>
                    <?php echo $__env->make('courriers.entrants.show.tabs.tab_brouillons', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php endif; ?>
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
    $('.date-range-input').daterangepicker({
        locale: {
        format: '<?php echo e(config('app.date_format_javascript')); ?>'
        }
    });


    $('#registre_generate_btn').on('click',function(){
        var date_range = $('#date_reception_daterange_id').val();
        $('.registre-word').append('<input type="hidden" name="date_reception_tous_daterange" value="'+date_range+'" />');  
        $('.registre-word').submit();
        
    })
</script>


<script src="<?php echo e(asset('css/datatable/datatables.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/courriersEntrants/show/index_show_tous.js')); ?>"></script>
<script src="<?php echo e(asset('js/courriersEntrants/show/index_show_brouillon.js')); ?>"></script>
<script src="<?php echo e(asset('js/courriersEntrants/show/index_show_en_cours.js')); ?>"></script>
<script src="<?php echo e(asset('js/courriersEntrants/show/index_show_en_retard.js')); ?>"></script>
<script src="<?php echo e(asset('js/courriersEntrants/show/index_show_cloture.js')); ?>"></script>
<script src="<?php echo e(asset('js/courriersEntrants/show/index_show_courrier_entrants.js')); ?>"></script>

<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\smartgis\bureau_ordre\resources\views/courriers/entrants/show/index.blade.php ENDPATH**/ ?>