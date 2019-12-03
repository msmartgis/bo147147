{{--TODO add remove option when adding partner or document--}}

{!! Form::model($courrier,[
    'action' => 'CourrierController@store',
    'method'=>'POST',
    'class'=>'tab-wizard wizard-circle form-create',
    'id'=>'create_demande_form',
    'enctype' => 'multipart/form-data'
    ]) !!}
        <!-- Step 1 -->
        <h6>Information Général</h6>
        <section>
            <div class="row">
                {{-- the left side of step 1 --}}
                <div class="col-lg-6 col-md-6 col-sm-12" style="border-right-width: 1px;;border-right-style: solid;border-right-color: #d4d4d4;">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                {{Form::label('','Réf courrier :')}}
                                {{Form::text('ref','',['class'=>'form-control'])}}
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                 {{Form::label('','Mode de la reception :')}}
                                {{Form::select('modes_receptions', $modes_recpetion, null,
                                [
                                'data-placeholder' => 'Selectionner mode de reception',
                                'class'=>'form-control ',
                                'name'=>'modes_receptions[]',
                                'style'=>'width:100%'
                                ]
                                )}}
                            </div>
                            
                        </div>
                    </div>
 
                    <div class="row" style="margin-top: 10px">
                        <div class="col-lg-6">     
                             
                             <div class="form-group">
                                {{Form::label('','Date de récéption:')}}
                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    {{Form::text('date_reception','',['class'=>'form-control pull-right','id'=>'datepicker'])}}
                                </div>
                                <!-- /.input group -->
                             </div>
                         </div>
                    </div>

                    <div class="row" style="margin-top: 10px">
                        <div class="col-12">
                            <div class="form-group">
                                <h6>Objet (fr)</h6>
                                <div class="controls">
                                    {{Form::textarea('objet_fr','',['class'=>'form-control m-required-input','placeholder'=>'saisir l\'objet en francais','rows'=>'2','id'=>'objet_fr_input_id','required'=>'required'])}}
                                </div>
                            </div>
                        </div>
                    </div>                    

                </div>
                
                 {{-- the right side of step 1 --}}
                 <div class="col-lg-6 col-md-6 col-sm-12" style="padding-left : 15px">
                     <h5>Expediteur</h5>
                     <div class="row">                         
                         <div class="col-lg-6">
                             <div class="form-group">                               
                                {{Form::select('type_expediteur',
                                [
                                    'personne_physique' => 'Personne physique',
                                    'personne_morale' =>'Personne morale'
                                    
                                    
                                ],
                                'personne_physique',
                                [
                                    'data-placeholder' => 'Expediteur',
                                    'class'=>'form-control',
                                    'name'=>'type_expediteur',
                                    'id'=>'type_expediteur_select_id',
                                ])}}
                             </div>
                         </div>                         
                     </div>
                    

                     {{-- personne physique --}}
                     <div id="personne_physique" class="expediteur personne_physique" >
                         <div class="row" style="margin-top : 10px">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    {{Form::label('','Nom :')}}
                                    {{Form::text('raison_social','',['class'=>'form-control'])}}
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    {{Form::label('','Pernom :')}}
                                    {{Form::text('adresse','',['class'=>'form-control'])}}
                                </div>
                            </div>
                        </div>

                        <div class="row" style="margin-top : 10px">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    {{Form::label('','C.I.N.E :')}}
                                    {{Form::text('rc','',['class'=>'form-control'])}}
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    {{Form::label('','Adresse :')}}
                                    {{Form::text('tel_fix','',['class'=>'form-control'])}}
                                </div>
                            </div>
                        </div>

                        <div class="row" style="margin-top : 10px">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    {{Form::label('','Tel Fixe:')}}
                                    {{Form::text('fax','',['class'=>'form-control'])}}
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    {{Form::label('','Tél Mobile :')}}
                                    {{Form::text('tel_mobile','',['class'=>'form-control'])}}
                                </div>
                            </div>
                        </div> 


                        <div class="row" style="margin-top : 10px">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    {{Form::label('','Email :')}}
                                    {{Form::text('email','',['class'=>'form-control'])}}
                                </div>
                            </div>
                        </div>
                     </div>

                       {{-- personne morale --}}
                     <div id="personne_morale" class="expediteur personne_morale" style="display:none">
                         <div class="row" style="margin-top : 10px">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    {{Form::label('','Raison social :')}}
                                    {{Form::text('raison_social','',['class'=>'form-control'])}}
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    {{Form::label('','Adresse :')}}
                                    {{Form::text('adresse','',['class'=>'form-control'])}}
                                </div>
                            </div>
                        </div>

                        <div class="row" style="margin-top : 10px">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    {{Form::label('','R.C :')}}
                                    {{Form::text('rc','',['class'=>'form-control'])}}
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    {{Form::label('','Tél Fix :')}}
                                    {{Form::text('tel_fix','',['class'=>'form-control'])}}
                                </div>
                            </div>
                        </div>

                        <div class="row" style="margin-top : 10px">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    {{Form::label('','Fax :')}}
                                    {{Form::text('fax','',['class'=>'form-control'])}}
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    {{Form::label('','Tél Mobile :')}}
                                    {{Form::text('tel_mobile','',['class'=>'form-control'])}}
                                </div>
                            </div>
                        </div> 


                        <div class="row" style="margin-top : 10px">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    {{Form::label('','Email :')}}
                                    {{Form::text('email','',['class'=>'form-control'])}}
                                </div>
                            </div>      
                            
                            <div class="col-lg-6">
                                <div class="form-group">
                                    {{Form::label('','Representant :')}}
                                    {{Form::text('representant','',['class'=>'form-control'])}}
                                </div>
                            </div>    
                        </div>

                        <h6 style="margin-top : 10px"><b>Representant</b></h6>
                        <div class="row" style="margin-top : 10px">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    {{Form::label('','Nom :')}}
                                    {{Form::text('raison_social','',['class'=>'form-control'])}}
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    {{Form::label('','Pernom :')}}
                                    {{Form::text('adresse','',['class'=>'form-control'])}}
                                </div>
                            </div>
                        </div>

                        <div class="row" style="margin-top : 10px">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    {{Form::label('','C.I.N.E :')}}
                                    {{Form::text('rc','',['class'=>'form-control'])}}
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    {{Form::label('','Adresse :')}}
                                    {{Form::text('tel_fix','',['class'=>'form-control'])}}
                                </div>
                            </div>
                        </div>

                        <div class="row" style="margin-top : 10px">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    {{Form::label('','Tel Fixe:')}}
                                    {{Form::text('fax','',['class'=>'form-control'])}}
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    {{Form::label('','Tél Mobile :')}}
                                    {{Form::text('tel_mobile','',['class'=>'form-control'])}}
                                </div>
                            </div>
                        </div> 


                        <div class="row" style="margin-top : 10px">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    {{Form::label('','Email :')}}
                                    {{Form::text('email','',['class'=>'form-control'])}}
                                </div>
                            </div>
                        </div>
                     </div> 
                    
                 </div>
            </div>
        </section>
        <!-- Step 2 -->
        <h6>Acheminement et traitement</h6>
        <section>
            
            <div class="row">
                 <div class="col-lg-3">  
                    <div class="form-group">
                        {{Form::label('','Delai:')}}
                        <div class="input-group date">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            {{Form::text('delai','',['class'=>'form-control pull-right','id'=>'datepicker_delai_input_id'])}}
                        </div>
                    <!-- /.input group -->
                    </div>
                 </div>
            </div>
            <br>            

            <h5>ASSIGNER A UN SERVICE/UNE DVISION</h5>
            <hr>
            <div class="row" style="margin: 0 !important;">
                <div class="table-responsive" style="margin-top: 12px">
                    <table class="table table-service-assigne">
                        <tr style="text-align: center;">
                            <th></th>
                            <th>Service</th>
                            <th>Ref</th>
                            <th>Responsable</th>
                            <th>Message</th>
                        </tr>
                        <tbody id="service_assigne_tbody">
                        <tr></tr>
                        </tbody>
                    </table>

                    <div style="text-align: center">
                        <a href="#"  data-toggle="modal" data-target="#assigne_service_modal"> <i class="fa fa-plus"></i>
                            <b> Ajouter</b>
                        </a>
                    </div>
                    <button type="button" class="btn delete-row btn-danger-table" id="delete_elemtent_row_service_btn"> <i class="fa fa-close"></i> Supprimer</button>
                </div>
            </div>
            <br>


            <h5>AJOUTER LES DOCUMENTS FOURNIS</h5>
            <hr>
            <div class="row" style="margin: 0 !important;">
                <div class="table-responsive" style="margin-top: 12px">
                    <table class="table table-piece">
                        <tr style="text-align: center;">
                            <th></th>
                            <th>Type de document</th>
                            <th>Intitulé</th>
                            <th>Mode de réception</th>
                        </tr>
                        <tbody id="piece_courrier_tbody">
                        <tr>
                         
                        </tr>
                        </tbody>
                    </table>

                    <div style="text-align: center">
                        <a href="#" id="add_piece"> <i class="fa fa-plus"></i>
                            <b> Ajouter </b>
                        </a>
                    </div>
                    <button type="button" class="btn delete-row btn-danger-table" id="delete_elemtent_row_courrier_document_btn"> <i class="fa fa-close"></i> Supprimer</button>
                </div>
            </div>
            <br>

            <h5>ACCUSE DE RECEPTION</h5>
            <hr>

             <div class="row" style="margin: 0 !important;">
                <div class="table-responsive" style="margin-top: 12px">
                    <table class="table table-piece">
                        <tr style="text-align: center;">
                            <th></th>
                            <th>Date</th>
                            <th>Accusé</th>
                        </tr>
                        <tbody id="piece_courrier_tbody">
                        <tr>
                         
                        </tr>
                        </tbody>
                    </table>

                    <div style="text-align: center">
                        <a href="#" id="add_piece"> <i class="fa fa-plus"></i>
                            <b> Ajouter </b>
                        </a>
                    </div>
                    <button type="button" class="btn delete-row btn-danger-table" id="delete_elemtent_row_courrier_document_btn"> <i class="fa fa-close"></i> Supprimer</button>
                </div>
            </div>

         
        </section>

     

        {!! Form::close() !!}
