<div class="filters" style="margin-bottom: 4px;margin-top: 6px">
    <div class="row">
        <div class="col-lg-2">
            <label><?php echo e(__('Nature éxpiditeur')); ?> :</label>
        </div>
        <div class="col-lg-2">
            <div class="form-group">
                <select class="form-control select2 cloture-select" style="width: 100%;"
                    name="nature_expediteur_cloture">
                    <option value="all" selected><?php echo e(__('Indifferent')); ?></option>
                    <option value="personne_morale"><?php echo e(__('Personne morale')); ?></option>
                    <option value="personne_physique"><?php echo e(__('Personne physique')); ?></option>

                </select>
            </div>
            <!-- /.form-group -->
        </div>


        <div class="col-lg-2">
            <label><?php echo e(__('Expediteur')); ?> :</label>
        </div>
        <div class="col-lg-2">
            <div class="form-group">
                <select class="form-control select2 cloture-select" style="width: 100%;" name="expediteur_cloture">
                    <option value="all" selected><?php echo e(__('Indifferent')); ?></option>
                    <?php $__currentLoopData = $personne_physiques; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p_physique): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="personnePhysique_<?php echo e($p_physique->id); ?>"><?php echo e($p_physique->full_name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    <?php $__currentLoopData = $personne_morales; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p_morale): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="personneMorale_<?php echo e($p_morale->id); ?>"><?php echo e($p_morale->raison_social); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <!-- /.form-group -->
        </div>


        <div class="col-lg-2">
            <label><?php echo e(__('Services concernés')); ?> :</label>
        </div>
        <div class="col-lg-2">
            <div class="form-group">
                <select class="form-control select2 cloture-select" style="width: 100%;"
                    name="services_concernes_cloture">
                    <option value="all" selected><?php echo e(__('Indifferent')); ?></option>
                    <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($service->id); ?>"><?php echo e($service->nom); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <!-- /.form-group -->
        </div>

    </div>


    <!--Row-->
    <div class="row" style="margin-top: 6px">
        <div class="col-lg-2">
            <label><?php echo e(__('Mode reception')); ?> :</label>
        </div>
        <div class="col-lg-2">
            <div class="form-group">
                <select class="form-control select2 cloture-select" style="width: 100%;" name="mode_reception_cloture">
                    <option value="all" selected><?php echo e(__('Indifferent')); ?></option>
                    <?php $__currentLoopData = $modes_recpetions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mode_recpetion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($mode_recpetion->id); ?>"><?php echo e($mode_recpetion->nom); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <!-- /.form-group -->
        </div>

        <div class="col-lg-2">
            <label><?php echo e(__('Date de la réception')); ?> :</label>
        </div>
        <div class="col-lg-2">
            <div class="form-group <?php echo e(__('costum_css.date-style-m')); ?>">
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text" class="form-control pull-left" name="date_reception_cloture_daterange"
                        id="date_reception_cloture_input" style="font-size: 0.94rem;" value="01/01/2000 - 01/01/2020">

                </div>
            </div>
            <!-- /.form-group -->
        </div>


        <div class="col-lg-2">
            <label><?php echo e(__('Priorité')); ?> :</label>
        </div>
        <div class="col-lg-2">
            <div class="form-group">
                <select class="form-control select2 cloture-select" style="width: 100%;" name="priorite_cloture">
                    <option value="all" selected><?php echo e(__('Indifferent')); ?></option>
                    <?php $__currentLoopData = $priorites; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $priorite): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($priorite->id); ?>"><?php echo e($priorite->nom); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <!-- /.form-group -->
        </div>
    </div>

    <div class="row" style="margin-top: 6px">
        <div class="col-lg-2">
            <label><?php echo e(__('Catégorie')); ?> :</label>
        </div>
        <div class="col-lg-2">
            <div class="form-group">
                <select class="form-control select2 cloture-select" style="width: 100%;"
                    name="categorie_courrier_cloture">
                    <option value="all" selected><?php echo e(__('Indifferent')); ?></option>
                    <?php $__currentLoopData = $categorie_courrier; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categorie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($categorie->id); ?>"><?php echo e($categorie->nom); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <!-- /.form-group -->
        </div>
    </div>

    <div class="row" style="margin-top: 4px">

    </div>
    <hr style="margin:4px">
</div><?php /**PATH C:\xampp\htdocs\bureau_ordre\resources\views/courriers/entrants/show/filters/filters_cloture.blade.php ENDPATH**/ ?>