<div class="row">
    <div class="col-lg-6 col-xl-6 col-md-6 col-12">

    </div>

    <div class="col-lg-6 col-xl-6 col-md-6 col-12">

        <?php if(Auth::user()->is('admin') || Auth::user()->is('bureau_ordre')): ?>
        <button type="button" class="btn btn-default <?php echo e(__('costum_css.pull-right')); ?> unique-choice-cloture"
            id="create_courrier_sortant_cloture_btn" style="margin-right : 6px" disabled><i class="fa fa-arrow-right"
                style="margin-right: 6px;margin-left: 6px"></i><?php echo e(__('Créer un courrier sortant')); ?></button>
        <?php endif; ?>
    </div>
</div>

<hr style="margin:4px"><?php /**PATH E:\xampp\htdocs\smartgis\bureau_ordre\resources\views/courriers/entrants/show/inc/actions_buttons_cloture.blade.php ENDPATH**/ ?>