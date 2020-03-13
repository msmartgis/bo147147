<div class="row">
    <div class="col-lg-6 col-xl-6 col-md-6 col-12">
        <?php if(Auth::user()->role->first()->role_name == "admin" || Auth::user()->role->first()->role_name ==
        "bureau_ordre"): ?>
        <button type="button" class="btn btn-default <?php echo e(__('costum_css.pull-left')); ?> multiple-choice-brouillon"
            id="valider_courrier_sortant_btn" style="margin-right : 6px" disabled><i class="fa fa-thumbs-up"
                style="margin-right: 6px;margin-left: 6px"></i><?php echo e(__('Valider')); ?> </button>
        <?php endif; ?>
    </div>

    <div class="col-lg-6 col-xl-6 col-md-6 col-12">
        <?php echo e(Form::open(array('url' => 'ficheDemande','target'=>'print_popup', 'method' => 'poste','class' => 'fiche-word','onsubmit'=>'window.open("about:blank","print_popup","width=800,height=640");'))); ?>

        <button type="button" class="btn btn-default <?php echo e(__('costum_css.pull-right')); ?> multiple-choice-en-cours"
            id="fiche_demande_en_cours_btn" style="margin-right : 6px" disabled><i class="fa fa-file"
                style="margin-right: 6px;margin-left: 6px"></i><?php echo e(__('Fiche de courrier')); ?> </button>
        <?php echo e(Form::close()); ?>

        <?php if(Auth::user()->role->first()->role_name == "admin" || Auth::user()->role->first()->role_name ==
        "bureau_ordre"): ?>
        <a href="<?php echo e(route('documents-sortants-create')); ?>" class="btn btn-default <?php echo e(__('costum_css.pull-right')); ?> "
            style="margin-right:4px"><i class="fa fa-plus"
                style="margin-right: 6px;margin-left: 6px"></i><?php echo e(__('Ajouter une sortie')); ?></a>
        <?php endif; ?>
    </div>
</div>

<hr style="margin:4px"><?php /**PATH C:\xampp\htdocs\bureau_ordre\resources\views/courriers/sortants/show_sortant/inc_sortant/actions_buttons_brouillon_sortant.blade.php ENDPATH**/ ?>