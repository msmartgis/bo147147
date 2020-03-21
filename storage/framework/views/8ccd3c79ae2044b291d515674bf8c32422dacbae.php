<div class="row">
    <div class="col-lg-6 col-xl-6 col-md-6 col-12">
        <?php if(Auth::user()->is('admin') || Auth::user()->is('bureau_ordre')): ?>
        <button type="button" class="btn btn-default <?php echo e(__('costum_css.pull-left')); ?> multiple-choice-brouillon"
            id="valider_courrier_sortant_btn" style="margin-right : 6px" disabled><i class="fa fa-thumbs-up"
                style="margin-right: 6px;margin-left: 6px"></i><?php echo e(__('Valider')); ?> </button>
        <?php endif; ?>
    </div>

    <div class="col-lg-6 col-xl-6 col-md-6 col-12">

        <?php if(Auth::user()->is('admin') || Auth::user()->is('bureau_ordre')): ?>
        <button type="button" class="btn btn-danger  <?php echo e(__('costum_css.pull-right')); ?>   multiple-choice-brouillon"
            id="supprimer_courrier_sortant_btn" style="margin-right : 6px" disabled><i class="fa fa-trash"
                style="margin-right: 6px;margin-left: 6px"></i><?php echo e(__('Supprimer')); ?>

        </button>
        <?php endif; ?>

        <?php if(Auth::user()->is('admin') || Auth::user()->is('bureau_ordre')): ?>
        <a href="<?php echo e(route('documents-sortants-create')); ?>" class="btn btn-default <?php echo e(__('costum_css.pull-right')); ?> "
            style="margin-right:4px"><i class="fa fa-plus"
                style="margin-right: 6px;margin-left: 6px"></i><?php echo e(__('Ajouter une sortie')); ?></a>
        <?php endif; ?>
    </div>
</div>

<hr style="margin:4px"><?php /**PATH E:\xampp\htdocs\smartgis\bureau_ordre\resources\views/courriers/sortants/show_sortant/inc_sortant/actions_buttons_brouillon_sortant.blade.php ENDPATH**/ ?>