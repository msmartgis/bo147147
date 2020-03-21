{{-- assigne service modal  --}}
<div class="modal fade " id="assigne_service_modal" tabindex="-1">
    <div class="modal-dialog ">
        <div class="modal-content" style="border-radius: 6px;">

            <div class="modal-header">
                <h4 class="modal-title" id="modalTitleAccordAndAffect">{{__('Assigne à un service/ou division')}}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>

            <form action="" class="assigne-service-form" id="assigne_service_form_id">

                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 col-lg-6 col-xl-6 col-12">
                            <div class="form-group">
                                {{Form::label('','Services/Division :')}}
                                {{Form::select('service_select', $services, null,
                                    [
                                    'data-placeholder' => 'Selectionner un service',
                                    'class'=>'form-control ',
                                    'name'=>'service',
                                    'id'=>'service_modal_input_id',
                                    'style'=>'width:100%'
                                    ]
                                    )}}
                            </div>
                        </div>
                    </div>

                    <div class="row" style="margin-top: 10px">
                        <div class="col-12">
                            <div class="form-group">
                                <h6>{{__('Message')}}</h6>
                                <div class="controls">
                                    {{Form::textarea('message','',['class'=>'form-control m-required-input','placeholder'=>'saisir l\'objet','rows'=>'2','required'=>'required','id'=>'message_service__modal_textarea'])}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

            <div class="modal-footer modal-footer-uniform">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-close"
                        style="margin-right: 8px"></i>{{__('Annuler')}}</button>
                <button type="button" class="btn btn-success pull-right" id="add_service_id_btn"><i class="fa fa-check"
                        style="margin-right: 8px"></i>{{__('Ajouter')}}</button>
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
                        style="margin-right: 8px"></i>{{__('Fermer')}}</button>


            </div>

        </div>
    </div>
</div>