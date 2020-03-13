
<div class="filters" style="margin-bottom: 4px;margin-top: 6px">
    <div class="row">
   
        <div class="col-lg-2">
            <label ><?php echo e(__('Services concernés')); ?> :</label>
        </div>
        <div class="col-lg-2">
            <div class="form-group">
                <select class="form-control select2" style="width: 100%;" name="services_concernes" id="services_concernes_select_filter">
                    <option value="all" selected><?php echo e(__('Indifferent')); ?></option>                   
                    <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($service->id); ?>"><?php echo e($service->nom); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                
                </select>
            </div>
            <!-- /.form-group -->
        </div>


        <div class="col-lg-2">
            <label ><?php echo e(__('Responsable')); ?>  :</label>
        </div>
        <div class="col-lg-2">
            <div class="form-group">
                <select class="form-control select2" style="width: 100%;" name="responsable" id="responsable_select_filter">
                    <option value="all" selected>Indifferent</option>                   
                    <?php $__currentLoopData = $responsables; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $res): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($res->id); ?>"><?php echo e($res->full_name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                
                </select>
            </div>
            <!-- /.form-group -->
        </div>



        <div class="col-lg-2">
            <label ><?php echo e(__('Nature diffusion')); ?>  :</label>
        </div>
        <div class="col-lg-2">
            <div class="form-group">
                <select class="form-control select2" style="width: 100%;" name="nature_diffusion" id="nature_diffusion_select_filter">
                    <option value="all" selected>Indifferent</option>                   
                    <?php $__currentLoopData = $nature_diffusion; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $nature_diff): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($nature_diff->id); ?>"><?php echo e($nature_diff->nom); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                
                </select>
            </div>
            <!-- /.form-group -->
        </div>
         
    </div>


    <!--Row-->
    <div class="row" style="margin-top: 6px">
        <div class="col-lg-2">
            <label><?php echo e(__('Date envoi')); ?>  :</label>
        </div>
        <div class="col-lg-2">
             <div class="form-group <?php echo e(__('costum_css.date-style-m')); ?>">
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" class="form-control pull-left" name="date_envoi_daterange" id="date_envoi_input" style="font-size: 0.94rem;" value="01/01/2000 - 01/01/2020">				
					 
                    </div>
                </div>
            <!-- /.form-group -->
        </div>
       
         
    </div>

    <div class="row" style="margin-top: 4px">       
       
    </div>
    <hr style="margin:4px">
</div>

<?php /**PATH C:\xampp\htdocs\bureau_ordre\resources\views/diffusion_interne/show/filters.blade.php ENDPATH**/ ?>