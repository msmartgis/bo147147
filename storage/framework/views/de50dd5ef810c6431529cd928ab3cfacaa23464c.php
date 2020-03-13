<div class="row" >
        <div class="col-lg-6 col-xl-6 col-md-6 col-12">
            
        </div>

        <div class="col-lg-6 col-xl-6 col-md-6 col-12">            
            <?php echo e(Form::open(array('url' => 'ficheDemande','target'=>'print_popup', 'method' => 'poste','class' => 'fiche-word','onsubmit'=>'window.open("about:blank","print_popup","width=800,height=640");'))); ?>

                <button type="button" class="btn btn-default pull-right multiple-choice-en-cours" id="fiche_demande_en_cours_btn" style="margin-right : 6px" disabled><i class="fa fa-file" style="margin-right: 6px"></i>Fiche de courrier </button>
            <?php echo e(Form::close()); ?>

            <a href="<?php echo e(route('documents-entrants-create')); ?>" class="btn btn-default pull-right " style="margin-right:4px"><i class="fa fa-plus" style="margin-right: 6px"></i>Ajouter
                une entrée</a>
        </div>      
</div>

  <hr style="margin:4px"><?php /**PATH C:\xampp\htdocs\bureau_ordre\resources\views/courriers/entrants/show/inc/actions_buttons.blade.php ENDPATH**/ ?>