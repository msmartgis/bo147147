{{-- assigne service modal  --}}
<div class="modal fade " id="remarque_consigne_modal" tabindex="-1">
        <div class="modal-dialog ">
            <div class="modal-content" style="border-radius: 6px;">
               
				<div class="modal-header">
					<h4 class="modal-title" id="modalTitleAccordAndAffect">Remarque/Consigne</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                
                <form action="" class="assigne-service-form" id="remarque_consigne_form_id">
                
                    <div class="modal-body">
                  

                        <div class="row" style="margin-top: 10px">
                            <div class="col-12">
                                <div class="form-group">
                                    <h6>Message</h6>
                                    <div class="controls">
                                        {{Form::textarea('message','',['class'=>'form-control m-required-input','placeholder'=>'saisir l\'objet','rows'=>'2','required'=>'required','id'=>'message_remarque_consigne_modal_textarea'])}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                
                <div class="modal-footer modal-footer-uniform">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" ><i class="fa fa-close" style="margin-right: 8px"></i>Annuler</button>
                    <button type="button" class="btn btn-success pull-right" id="add_remarque_consigne_id_btn"><i class="fa fa-check" style="margin-right: 8px"></i>Ajouter</button>
                </div>
          
            </div>
        </div>
    </div>