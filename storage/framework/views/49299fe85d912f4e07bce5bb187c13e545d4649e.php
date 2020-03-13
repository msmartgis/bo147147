<?php $__env->startSection('added_css'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('css/datatable/datatables.min.css')); ?>" />
    <!-- Select2 -->
    <link rel="stylesheet" href="<?php echo e(asset('vendor_components/select2/dist/css/select2.min.css')); ?>" />
    <!-- bootstrap datepicker -->
    <link rel="stylesheet" href="<?php echo e(asset('vendor_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')); ?>" />

    <!--alerts CSS -->
    <link href="<?php echo e(asset('vendor_components/sweetalert/sweetalert.css')); ?>" rel="stylesheet" type="text/css">

    <!-- toast CSS -->
    <link href="<?php echo e(asset('vendor_components/jquery-toast-plugin-master/src/jquery.toast.css')); ?>" rel="stylesheet">
<style>


</style>
    
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

	 <div class="row ">
        <div class="col-12">
            <div class="box ">
                <!-- /.box-header -->
                <div class="box-body" style="padding : 10px">

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-12">
                                    <div class="box" style="border-top: 0;border-bottom: 0">
                                        <!-- /.box-header -->
                                        <div class="box-body">
											<div class="vtabs  col-lg-12" style="padding: 0;" id="tabs_demande_lg">		
												<ul class="nav nav-tabs tabs-vertical  tabs-warning" role="tablist" style="width:300px;" >
													<li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#users" role="tab" aria-expanded="true" style="display: flex;" > <span><i style="font-size:18px;" class="mdi mdi-account-settings"></i></span><span style="margin: auto; margin-left: 8px;" class="hidden-xs-down">&nbspUtilisateurs</span> </a> </li>
													<li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#services" role="tab" aria-expanded="false" style="display: flex;"> <span><i style="font-size:18px;" class="mdi mdi-contact-mail"></i></span><span style="margin: auto; margin-left: 8px;"  class="hidden-xs-down">&nbspServices</span> </a> </li>
													<li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#modes_receptions" role="tab" aria-expanded="false" style="display: flex;"> <span><i style="font-size:18px;" class="mdi mdi-mailbox"></i></span><span style="margin: auto; margin-left: 8px;"  class="hidden-xs-down">&nbspModes Réceptions/Envoi</span> </a> </li>
													<li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#categories" role="tab" aria-expanded="false" style="display: flex;"> <span><i style="font-size:18px;" class="mdi mdi-group"></i></span><span style="margin: auto; margin-left: 8px;"  class="hidden-xs-down">&nbspCatégories</span> </a> </li>
											
												</ul>
												<div class="tab-content" style="margin : 0 !important;margin-top: 0 !important;">
													<div class="tab-pane active" id="users" role="tabpanel" aria-expanded="true" >
													   <?php echo $__env->make('parametres.users', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
													</div>
													<div class="tab-pane pad" id="services" role="tabpanel" aria-expanded="false" >
														   <?php echo $__env->make('parametres.services', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                    </div>	
                                                    
                                                    <div class="tab-pane pad" id="modes_receptions" role="tabpanel" aria-expanded="false" >
                                                        <?php echo $__env->make('parametres.modes_receptions', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                    </div>	

                                                    <div class="tab-pane pad" id="categories" role="tabpanel" aria-expanded="false" >
                                                        <?php echo $__env->make('parametres.categories', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                    </div>	
													 
												</div>
													 
											</div>
                                     
											
                                        </div>
                                        <!-- /.box-body -->
                                    </div>
                                    <!-- /.box -->
                                </div>
                            </div>
                        </div>
                        <!-- /.col -->
                        
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->

                    <?php echo $__env->make('parametres.modal_setting', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
                <!-- /.box-body -->
            </div>

            <!-- /.box -->
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('added_scripts'); ?>

<script src="<?php echo e(asset('css/datatable/datatables.min.js')); ?>"></script>

<!-- iCheck 1.0.1 -->
<script src="<?php echo e(asset('vendor_plugins/iCheck/icheck.min.js')); ?>"></script>

<!-- bootstrap time picker -->
<script src="<?php echo e(asset('vendor_plugins/timepicker/bootstrap-timepicker.min.js')); ?>"></script>


<!-- date-range-picker -->
<script src="<?php echo e(asset('vendor_components/moment/min/moment.min.js')); ?>"></script>
<script src="<?php echo e(asset('vendor_components/bootstrap-daterangepicker/daterangepicker.js')); ?>"></script>
<!-- bootstrap datepicker -->
<script src="<?php echo e(asset('vendor_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')); ?>"></script>
<!-- Form validator JavaScript -->
<script src="<?php echo e(asset('js/validation.js')); ?>"></script>

<!-- toast -->
<script src="<?php echo e(asset('vendor_components/jquery-toast-plugin-master/src/jquery.toast.js')); ?>"></script>
<script src="<?php echo e(asset('js/toastr.js')); ?>"></script>
<!-- Formatter -->
<script src="<?php echo e(asset('vendor_components/formatter/formatter.js')); ?>"></script>
<script src="<?php echo e(asset('vendor_components/formatter/jquery.formatter.js')); ?>"></script>
<script src="<?php echo e(asset('js/formatter.js')); ?>"></script>


<script src="<?php echo e(asset('js/parametres/settings_modes_receptions.js')); ?>"></script>
<script src="<?php echo e(asset('js/parametres/settings_categories.js')); ?>"></script>
<script src="<?php echo e(asset('js/parametres/settings_services.js')); ?>"></script>
<script src="<?php echo e(asset('js/parametres/settings_users.js')); ?>"></script>


<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\smartgis\bureau_ordre\resources\views/parametres/index.blade.php ENDPATH**/ ?>