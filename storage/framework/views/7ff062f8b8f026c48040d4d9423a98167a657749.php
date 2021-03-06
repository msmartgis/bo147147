
<div class="modal fade " id="assigne_service_modal" tabindex="-1">
    <div class="modal-dialog ">
        <div class="modal-content" style="border-radius: 6px;">

            <div class="modal-header">
                <h4 class="modal-title" id="modalTitleAccordAndAffect">
                    <?php echo e(__('ASSIGNER A UN SERVICE/UNE DIVISION')); ?></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>

            <form action="" class="assigne-service-form" id="assigne_service_form_id">

                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 col-lg-6 col-xl-6 col-12">
                            <div class="form-group">
                                <?php echo e(Form::label('',trans('Service/Division').' :')); ?>

                                <?php echo e(Form::select('service_select', $services, null,
                                    [
                                    'data-placeholder' => 'Selectionner un service',
                                    'class'=>'form-control select2',
                                    'multiple'=>'multiple',
                                    'name'=>'service',
                                    'id'=>'service_modal_input_id',
                                    'style'=>'width:100%'
                                    ]
                                    )); ?>

                            </div>
                        </div>
                    </div>

                    <div class="row" style="margin-top: 10px">
                        <div class="col-12">
                            <div class="form-group">
                                <h6 class="<?php echo e(__('costum_css.float-right-m')); ?>"><?php echo e(__('Message')); ?></h6>
                                <div class="controls">
                                    <?php echo e(Form::textarea('message','',['class'=>'form-control m-required-input','placeholder'=>trans('Message...'),'rows'=>'2','required'=>'required','id'=>'message_service__modal_textarea'])); ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

            <div class="modal-footer modal-footer-uniform">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-close"
                        style="margin-right: 8px"></i><?php echo e(__('Annuler')); ?></button>
                <button type="button" class="btn btn-success pull-right" id="add_service_id_btn"><i class="fa fa-check"
                        style="margin-right: 8px"></i><?php echo e(__('Ajouter')); ?></button>
            </div>

        </div>
    </div>
</div><?php /**PATH E:\xampp\htdocs\smartgis\bureau_ordre\resources\views/courriers/entrants/create/modals.blade.php ENDPATH**/ ?>