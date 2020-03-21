
<div class="modal fade " id="remarque_consigne_modal" tabindex="-1">
    <div class="modal-dialog ">
        <div class="modal-content" style="border-radius: 6px;">

            <div class="modal-header">
                <h4 class="modal-title" id="modalTitleAccordAndAffect"><?php echo e(__('Remarque/Consigne')); ?></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>

            <form action="" class="assigne-service-form" id="remarque_consigne_form_id">

                <div class="modal-body">


                    <div class="row" style="margin-top: 10px">
                        <div class="col-12">
                            <div class="form-group">
                                <h6><?php echo e(__('Message')); ?></h6>
                                <div class="controls">
                                    <?php echo e(Form::textarea('message','',['class'=>'form-control m-required-input','placeholder'=>'saisir l\'objet','rows'=>'2','required'=>'required','id'=>'message_remarque_consigne_modal_textarea'])); ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

            <div class="modal-footer modal-footer-uniform">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-close"
                        style="margin-right: 8px"></i><?php echo e(__('Annuler')); ?></button>
                <button type="button" class="btn btn-success pull-right" id="add_remarque_consigne_id_btn"><i
                        class="fa fa-check" style="margin-right: 8px"></i><?php echo e(__('Ajouter')); ?></button>
            </div>

        </div>
    </div>
</div>



<div class="modal fade modal-right" id="visualize_modal" tabindex="-1">
    <div class="modal-dialog modal-lg" style="width : 500px ">
        <div class="modal-content" style="border-radius: 6px">


            <div class="modal-body">
                <div id="fileView" style="height: 100%;">
                </div>

            </div>

            <div class="modal-footer modal-footer-uniform" style="padding : 0 !important">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"
                    style="margin-left: 4px;margin-bottom: 6px;"><i class="fa fa-close"
                        style="margin-right: 8px"></i><?php echo e(__('Fermer')); ?></button>


            </div>

        </div>
    </div>
</div><?php /**PATH E:\xampp\htdocs\smartgis\bureau_ordre\resources\views/courriers/entrants/edit/modals.blade.php ENDPATH**/ ?>