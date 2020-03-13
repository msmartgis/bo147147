<?php $__env->startSection('added_css'); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/datatable/datatables.min.css')); ?>" />
<link rel="stylesheet" href="<?php echo e(asset('css/datatable/select.dataTables.min.css')); ?>" />
<style>


.nav-tabs
{
	    border-bottom: 1px solid #009dc5;
}


.en-retard-line{
	background-color: #ff3200;
}

.cloturer-line{
	background-color: #9fd037;
}

.en-cours-line{
	background-color: #009dc5;
}

.brouillon-line{
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
                    <?php echo $__env->make('diffusion_interne.show.filters', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    <div class="row" >
                            <div class="col-lg-6 col-xl-6 col-md-6 col-12">
                               
                            </div>

                            <div class="col-lg-6 col-xl-6 col-md-6 col-12">            
                                <?php echo e(Form::open(array('url' => 'ficheDemande','target'=>'print_popup', 'method' => 'poste','class' => 'fiche-word','onsubmit'=>'window.open("about:blank","print_popup","width=800,height=640");'))); ?>

                                    <button type="button" class="btn btn-default <?php echo e(__('costum_css.pull-right')); ?> multiple-choice-en-cours" id="fiche_demande_en_cours_btn" style="margin-right : 6px" disabled><i class="fa fa-file" style="margin-right: 6px;margin-left: 6px"></i><?php echo e(__('Fiche de diffusion interne')); ?> </button>
                                <?php echo e(Form::close()); ?>


                                <?php if(Auth::user()->role->first()->role_name == "bureau_ordre" || Auth::user()->role->first()->role_name == "admin"): ?>
                                    <a href="<?php echo e(route('diffusions-internes-create')); ?>" class="btn btn-default <?php echo e(__('costum_css.pull-right')); ?> " style="margin-right:4px"><i class="fa fa-plus" style="margin-right: 6px;margin-left: 6px"></i><?php echo e(__('Nouvelle diffusion')); ?></a>
                                <?php endif; ?>                    
                            </div>      
                    </div>

                    <hr style="margin:4px">
                    <div class="table-responsive">
                        <table class="table table-hover datatables dataTable no-footer" id="diffusion_interne_datatables" style="width:100% ;" >
                            <thead>
                                <th></th>
                                <th><?php echo e(__('Réf')); ?></th>
                                <th><?php echo e(__('Objet')); ?></th>
                                <th><?php echo e(__('Date envoi')); ?></th>                                
                                <th><?php echo e(__('P.J')); ?></th>
                            </thead>
                        </table>
                    </div>             
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
	

<?php $__env->stopSection(); ?>

<?php $__env->startPush('added_scripts'); ?>
 <script src="<?php echo e(asset('css/datatable/datatables.min.js')); ?>"></script>
 <script src="<?php echo e(asset('js/diffusion_interne/index.js')); ?>"></script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\bureau_ordre\resources\views/diffusion_interne/show/index_diffusion_interne.blade.php ENDPATH**/ ?>