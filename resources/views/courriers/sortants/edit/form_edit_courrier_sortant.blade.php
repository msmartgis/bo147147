
{!! Form::model($courrier, ['route' => ['courriers-sortants.update', $courrier->id],'id'=>'form_courrier_edit','class'=>'form-edit','method' => 'PUT','enctype' => 'multipart/form-data']) !!}
<input type="hidden" name="courrier_id" value="{{$courrier->id}}" id="courrier_id_input">

<div class="row">
    <div class="col-lg-9">
        <div class="row">
            <div class="col-12">
                <div class="box" style="border-top: 0;border-bottom: 0">
                    <!-- /.box-header -->
                    <div class="box-body">
                    <!-- Tab panes -->
                        <div class="tab-content">                        
                           
                            <div class="tab-pane active" id="information_generale_tab" role="tabpanel">                                
                                <div class="pad">
                                    <div class="row" style="margin-top: 8px">
                                        <div class="col-lg-6 col-xl-6 col-md-6 col-12">
                                            <div class="form-group">
                                                <div class="controls">
                                                    {{Form::textarea('objet',$courrier->objet,['class'=>'form-control','rows'=>'2','style'=>'height: 52px !important' ,'disabled' => 'disabled'])}}
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-xl-6 col-md-6 col-12">
                                            
                                        </div>
                                    </div>

                                    <br>
                                    <h5>DESTINATAIRE</h5>
                                    <hr style="color:#2d353c;margin:0">

                                    <div class="row" style="margin-top: 8px">                                        
                                        @if($courrier->personne_physique_id != null)
                                            <h6><b>Nature : Personne Physique</b></h6> 
                                            <input type="hidden" name="personne_physique_id" value="{{$courrier->personne_physique_id}}">
                                            <div class="row col-12">

                                                <div class="col-lg-4">
                                                    {{Form::label('','Nom:')}}
                                                    <div class="form-group form-group-edit">                                                    
                                                        {{Form::text('nom_personne_physique',$courrier->personnePhysique()->first()->nom,['class'=>'form-control','disabled' => 'disabled'])}}
                                                    </div>
                                                </div>

                                                <div class="col-lg-4">
                                                    {{Form::label('','Prènom:')}}
                                                    <div class="form-group form-group-edit">                                                    
                                                        {{Form::text('prenom_personne_physique',$courrier->personnePhysique()->first()->prenom,['class'=>'form-control','disabled' => 'disabled'])}}
                                                    </div>
                                                </div>


                                                <div class="col-lg-4">
                                                    {{Form::label('','C.I.N.E:')}}
                                                    <div class="form-group form-group-edit">                                                    
                                                        {{Form::text('cine_personne_physique',$courrier->personnePhysique()->first()->cine,['class'=>'form-control','disabled' => 'disabled'])}}
                                                    </div>
                                                </div>                                             

                                            </div>

                                            <div class="row col-12" style="margin-top: 8px">
                                                <div class="col-lg-4">
                                                    {{Form::label('','Adresse:')}}
                                                    <div class="form-group form-group-edit">                                                    
                                                        {{Form::text('adresse_personne_physique',$courrier->personnePhysique()->first()->adresse,['class'=>'form-control','disabled' => 'disabled'])}}
                                                    </div>
                                                </div>

                                                <div class="col-lg-4">
                                                    {{Form::label('','Tel Mobile:')}}
                                                    <div class="form-group form-group-edit">                                                    
                                                        {{Form::text('tel_mobile_personne_physique',$courrier->personnePhysique()->first()->tel_mobile,['class'=>'form-control','disabled' => 'disabled'])}}
                                                    </div>
                                                </div>

                                                 <div class="col-lg-4">
                                                    {{Form::label('','Email:')}}
                                                    <div class="form-group form-group-edit">                                                    
                                                        {{Form::text('email_personne_physique',$courrier->personnePhysique()->first()->email,['class'=>'form-control','disabled' => 'disabled'])}}
                                                    </div>
                                                </div>

                                            </div>
                                            
                                        @endif

                                        @if($courrier->personne_morale_id != null)
                                            <h6><b>Nature : Personne Morale</b></h6>
                                            <div class="row col-12">
                                                <div class="col-lg-4">
                                                    {{Form::label('','Raison Social:')}}
                                                    <div class="form-group form-group-edit">  
                                                    <input type="hidden" name="personne_morale_id" value="{{$courrier->personneMorale()->first()->id}}">                                                  
                                                        {{Form::text('raison_social_personne_morale',$courrier->personneMorale()->first()->raison_social,['class'=>'form-control','disabled' => 'disabled'])}}
                                                    </div>
                                                </div>

                                                <div class="col-lg-4">
                                                    {{Form::label('','RC:')}}
                                                    <div class="form-group form-group-edit">                                                    
                                                        {{Form::text('rc_personne_morale',$courrier->personneMorale()->first()->rc,['class'=>'form-control','disabled' => 'disabled'])}}
                                                    </div>
                                                </div>


                                                <div class="col-lg-4">
                                                    {{Form::label('','Adresse:')}}
                                                    <div class="form-group form-group-edit">                                                    
                                                        {{Form::text('adresse_personne_morale',$courrier->personneMorale()->first()->adresse,['class'=>'form-control','disabled' => 'disabled'])}}
                                                    </div>
                                                </div>
                                            </div>



                                            <div class="row col-12" style="margin-top: 8px">
                                                <div class="col-lg-">
                                                    {{Form::label('','Tel fixe:')}}
                                                    <div class="form-group form-group-edit">                                                    
                                                        {{Form::text('tel_fix_personne_morale',$courrier->personneMorale()->first()->tel_fix,['class'=>'form-control','disabled' => 'disabled'])}}
                                                    </div>
                                                </div>

                                                <div class="col-lg-3">
                                                    {{Form::label('','Tel mobile:')}}
                                                    <div class="form-group form-group-edit">                                                    
                                                        {{Form::text('tel_mobile_personne_morale',$courrier->personneMorale()->first()->tel_mobile,['class'=>'form-control','disabled' => 'disabled'])}}
                                                    </div>
                                                </div>


                                                <div class="col-lg-3">
                                                    {{Form::label('','Fax:')}}
                                                    <div class="form-group form-group-edit">                                                    
                                                        {{Form::text('fax_personne_morale',$courrier->personneMorale()->first()->fax,['class'=>'form-control','disabled' => 'disabled'])}}
                                                    </div>
                                                </div>

                                                <div class="col-lg-3">
                                                    {{Form::label('','Email:')}}
                                                    <div class="form-group form-group-edit">                                                    
                                                        {{Form::text('email_personne_morale',$courrier->personneMorale()->first()->email,['class'=>'form-control','disabled' => 'disabled'])}}
                                                    </div>
                                                </div>
                                            </div>
                                           
                                            <h6 style="margin-top : 12px"><b>Informations de Représentant:</b></h6>
                                            @if ($courrier->personneMorale()->first()->representant != null)

                                                <div class="row col-12">
                                                    <input type="hidden" name="representant_id" value="{{$courrier->personneMorale()->first()->representant->id}}">     
                                                    <div class="col-lg-4">
                                                        {{Form::label('','Nom:')}}
                                                        <div class="form-group form-group-edit">  
                                                            {{Form::text('nom_representant',$courrier->personneMorale()->first()->representant->nom,['class'=>'form-control','disabled' => 'disabled'])}}
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-4">
                                                        {{Form::label('','Prènom:')}}
                                                        <div class="form-group form-group-edit">                                                    
                                                            {{Form::text('prenom_representant',$courrier->personneMorale()->first()->representant->prenom,['class'=>'form-control','disabled' => 'disabled'])}}
                                                        </div>
                                                    </div>


                                                    <div class="col-lg-4">
                                                        {{Form::label('','C.I.N.E:')}}
                                                        <div class="form-group form-group-edit">                                                    
                                                            {{Form::text('cine_representant',$courrier->personneMorale()->first()->representant->cine,['class'=>'form-control','disabled' => 'disabled'])}}
                                                        </div>
                                                    </div>                                             

                                                </div>

                                                <div class="row col-12" style="margin-top: 8px">
                                                    <div class="col-lg-4">
                                                        {{Form::label('','Adresse:')}}
                                                        <div class="form-group form-group-edit">                                                    
                                                            {{Form::text('adresse_representant',$courrier->personneMorale()->first()->representant->adresse,['class'=>'form-control','disabled' => 'disabled'])}}
                                                        </div>
                                                    </div>
                                                    

                                                    <div class="col-lg-4">
                                                        {{Form::label('','Tel Mobile:')}}
                                                        <div class="form-group form-group-edit">                                                    
                                                            {{Form::text('tel_mobile_representant',$courrier->personneMorale()->first()->representant->tel_mobile,['class'=>'form-control','disabled' => 'disabled'])}}
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-4">
                                                        {{Form::label('','Email:')}}
                                                        <div class="form-group form-group-edit">                                                    
                                                            {{Form::text('email_representant',$courrier->personneMorale()->first()->representant->email,['class'=>'form-control','disabled' => 'disabled'])}}
                                                        </div>
                                                    </div>

                                                </div>

                                            @else

                                            <div class="row col-12">
                                                    <div class="col-lg-4">
                                                        {{Form::label('','Nom:')}}
                                                        <div class="form-group form-group-edit">                                                    
                                                            {{Form::text('nom_representant','',['class'=>'form-control','disabled' => 'disabled'])}}
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-4">
                                                        {{Form::label('','Prènom:')}}
                                                        <div class="form-group form-group-edit">                                                    
                                                            {{Form::text('prenom_representant','',['class'=>'form-control','disabled' => 'disabled'])}}
                                                        </div>
                                                    </div>


                                                    <div class="col-lg-4">
                                                        {{Form::label('','C.I.N.E:')}}
                                                        <div class="form-group form-group-edit">                                                    
                                                            {{Form::text('cine_representant','',['class'=>'form-control','disabled' => 'disabled'])}}
                                                        </div>
                                                    </div>                                             

                                                </div>

                                                <div class="row col-12" style="margin-top: 8px">
                                                    <div class="col-lg-4">
                                                        {{Form::label('','Adresse:')}}
                                                        <div class="form-group form-group-edit">                                                    
                                                            {{Form::text('adresse_representant','',['class'=>'form-control','disabled' => 'disabled'])}}
                                                        </div>
                                                    </div>
                                                    

                                                    <div class="col-lg-4">
                                                        {{Form::label('','Tel Mobile:')}}
                                                        <div class="form-group form-group-edit">                                                    
                                                            {{Form::text('tel_mobile_representant','',['class'=>'form-control','disabled' => 'disabled'])}}
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-4">
                                                        {{Form::label('','Email:')}}
                                                        <div class="form-group form-group-edit">                                                    
                                                            {{Form::text('email_representant','',['class'=>'form-control','disabled' => 'disabled'])}}
                                                        </div>
                                                    </div>
                                                </div>                                                
                                            @endif  
                                        @endif
                                    </div>


                                     <br>
                                    <br>
                                    <h5>DOCUMENTS: </h5>
                                    <hr style="color:#2d353c;margin:0">
                                    <div class="row" style="margin: 0 !important;">
                                        <div class="table-responsive" style="margin-top: 12px">
                                            <table class="table table-piece">
                                                <thead class="create-table">
                                                    <tr style="text-align: center;">
                                                        <th>Type de document</th>
                                                        <th>Intitulé</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="piece_courrier_tbody">
                                                     @foreach ($courrier->piece as $item)
                                                        <tr>
                                                            <input type="hidden" name="documents_ids[]" value="{{$item->id}}">
                                                            {{-- <td>
                                                                <input style="text-align: center;" type="checkbox" id="documentFourni_{{$item->id}}" name="checkbox_document_fourni" class=" chk-col-green" value="{{$item->id}}"   data-id="{{$item->id}}" class="chk-col-green"><label for="documentFourni_{{$item->id}}" class="block" ></label>
                                                            </td> --}}
                                                            <td style="text-align: center">
                                                                {{$item->typeDocument()->first()->nom_type}}                                                               
                                                            </td>
                                                            <td style="text-align: center">
                                                                {{$item->nom_document}}                                                               
                                                            </td>
                                                          

                                                            <td style="text-align: center;">
                                                                @if($item->path != '')
                                                                    <a href="/files/download/courriers/sortants/{{$courrier->id}}/{{$item->path}}">
                                                                        <button type="button"  class="btn btn-success-table " >
                                                                            <i class="fa fa-download"></i>
                                                                            Télécharger</button>
                                                                    </a>
                                                                @endif
                                                                <button type="button" class="btn delete-row btn-danger-table m-hidden" > <i class="fa fa-close"></i> Supprimer</button>
                                                            </td> 
                                                        </tr>
                                                    @endforeach
                                                   
                                                </tbody>
                                            </table>

                                            <div style="text-align: center">
                                                <a href="#" id="add_piece_btn" class="m-hidden"> <i class="fa fa-plus"></i>
                                                    <b> Ajouter </b>
                                                </a>
                                            </div>
                                            
                                        </div>
                                    </div>

                                    <br>
                                    <h5>SERVICE/UNE DIVISION EMMETTEUR</h5>
                                    <hr style="color:#2d353c;margin:0">                                    

                                    <div class="row" style="margin: 0 !important;">
                                        <div class="table-responsive" style="margin-top: 12px">
                                            <table class="table table-service-assigne">
                                                <thead class="create-table">
                                                    <tr style="text-align: center;">
                                                        <th>Service</th>
                                                        <th>Ref</th>
                                                        <th>Responsable</th>
                                                        <th>Message</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody id="service_assigne_tbody">
                                                      @foreach ($courrier->services as $item)
                                                        <tr>
                                                            <input type="hidden" name="service_input_id[]" value="{{$item->id}}">
                                                            <input type="hidden" name="messages[]" value="{{$item->pivot->message}}">
                                                            {{-- <td>
                                                                <input style="text-align: center;" type="checkbox" id="service_division_{{$item->id}}" name="checkbox_service_division" class=" chk-col-green" value="{{$item->id}}"   data-id="{{$item->id}}" class="chk-col-green"><label for="service_division_{{$item->id}}" class="block" ></label>
                                                            </td> --}}
                                                            <td style="text-align: center">
                                                                {{$item->nom}}
                                                            </td>
                                                            <td style="text-align: center">
                                                                {{$item->ref}}
                                                               
                                                            </td>
                                                             <td style="text-align: center">
                                                                @foreach ($item->responsables as $item_repsonsable)
                                                                    {{$item_repsonsable->full_name}}
                                                                @endforeach
                                                            </td>
                                                           
                                                            <td style="text-align: center">
                                                                {{$item->pivot->message}}
                                                            </td>                                                           
                                                         
                                                            <td>
                                                                <button type="button" class="btn delete-row btn-danger-table m-hidden" id="delete_service_row_btn"> <i class="fa fa-close"></i> Supprimer</button>
                                                            </td>                                                       
                                                        </tr>
                                                    @endforeach 
                                                                                                 
                                                  

                                                
                                                </tbody>
                                            </table>

                                            <div style="text-align: center">
                                                <a href="#"  data-toggle="modal" data-target="#assigne_service_modal" class="m-hidden"> <i class="fa fa-plus"></i>
                                                    <b> Ajouter</b>
                                                </a>
                                            </div>
                                            
                                        </div>
                                    </div>    


                                    <br>
                                    <br>
                                    <h5>ACCUSE D'ENVOI (VERSION SCANNEE) : </h5>

                                    <div class="row" style="margin: 0 !important;">
                                        <div class="table-responsive" style="margin-top: 12px">
                                            <table class="table table-accuse-envoi">
                                                <thead class="create-table">
                                                    <tr style="text-align: center;">
                                                        <th>Date</th>
                                                        <th>Accusé</th>
                                                        <th>Code Archivage</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                            
                                                <tbody id="acusse_envoi_tbody">
                                                            @foreach ($courrier->accuse as $item)
                                                        <tr>
                                                            <input type="hidden" name="accuse_envoi_ids[]" value=" {{$item->id}}">
                                                            {{-- <td>
                                                                <input style="text-align: center;" type="checkbox" id="accuseenvoi_{{$item->id}}" name="checkbox_accuse_envoi" class=" chk-col-green" value="{{$item->id}}"   data-id="{{$item->id}}" class="chk-col-green"><label for="accuseenvoi_{{$item->id}}" class="block" ></label>
                                                            </td> --}}
                                                            <td style="text-align: center">
                                                                {{$item->date}}
                                                            </td>
                                                            <td style="text-align: center">
                                                                {{$item->path}}
                                                               
                                                            </td>
                                                            <td style="text-align: center">
                                                                {{$item->ref}}
                                                            </td>

                                                            <td style="text-align: center;">
                                                                @if($item->path != '')
                                                                    <a href="/files/download/courriers/sortants_accuses_envoi/{{$courrier->id}}/{{$item->path}}">
                                                                        <button type="button"  class="btn btn-success-table " >
                                                                            <i class="fa fa-download"></i>
                                                                            Télécharger</button>
                                                                    </a>
                                                                @endif

                                                                <button type="button" class="btn delete-row btn-danger-table m-hidden" > <i class="fa fa-close"></i> Supprimer</button>
                                                            </td>                                                           
                                                        </tr>
                                                    @endforeach                             
                                                
                                                </tbody>
                                            </table>

                                            <div style="text-align: center">
                                                <a href="#" id="add_accuse_envoi_btn" class="m-hidden"> <i class="fa fa-plus"></i>
                                                    <b> Ajouter </b>
                                                </a>
                                            </div>
                                           
                                        </div>
                                    </div>
                            
                                </div>
                            </div>

                            <div class="tab-pane" id="historiques_operations_tab" role="tabpanel">                               
                                <div class="pad">
                                    <br>
                                    <h5>HISTORIQUES</h5>
                                    <hr style="color:#2d353c;margin:0">

                                    
                                    <div class="row" style="margin: 0 !important;">
                                        <div class="table-responsive" style="margin-top: 12px">
                                            <table class="table table-historique">
                                                <thead class="create-table">
                                                    <tr style="text-align: center;">
                                                        <th>N°</th>
                                                        <th>Operation</th>
                                                        <th>Date de déclenchement</th>
                                                        <th>Distribué Par</th>
                                                        <th>Distribué à</th>
                                                    </tr>
                                                </thead>
                                                 <tbody id="historique_tbody">
                                                <tr></tr>
                                                @php
                                                    $history_item = 1;
                                                @endphp
                                                
                                                @foreach ($historique as $hitory_rec)
                                                <tr>
                                                    <td>{{$history_item}}</td>
                                                    <td>{{$hitory_rec->operation_type->type_operation_nom}}</td>
                                                    <td>{{$hitory_rec->created_at}}</td>
                                                    <td>{{$hitory_rec->user->full_name}}</td>
                                                    <td>{{$hitory_rec->created_at}}</td>
                                                </tr>
                                                    
                                                @php
                                                    $history_item++;
                                                @endphp
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>
    </div>
    <!-- /.col -->
    <div class="col-lg-3 m-min-hight">
        
        <div class="h-p100  bg-light bg-secondary-gradient" style="padding-right: 5px;height: 100%;">
            <div class="box bg-transparent no-border no-shadow ">
                <div class="box-body no-padding mailbox-nav ">

                    <h5 style="text-align: center;background-color: #686868;color: #fff !important;border-radius: 2px;padding: 4px">
                            {{$courrier->etat->etat_nom}}
                    </h5>
                    <br>

                    <div class="row row-edit">
                        <div class="col-lg-4">
                            {{Form::label('','Envoi : ',['style'=> 'font-size : 11px'])}}
                        </div>
                        <div class="col-lg-8">
                            <div class="form-group form-group-edit">
                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    {{Form::text('date_envoi',$courrier->date_envoie,['class'=>'form-control
                                    pull-right datepicker','disabled'])}}
                                </div>
                                <!-- /.input group -->
                            </div>
                        </div>
                    </div>



                    <div class="row row-edit">
                        <div class="col-lg-4">
                            {{Form::label('','Mode : ',['style'=> 'font-size : 11px,'])}}
                        </div>
                        <div class="col-lg-8">
                            <div class="form-group form-group-edit">                                 
                                {{Form::select('mode_reception_id', $modes_recpetion, $courrier->mode_reception_id,
                                    [
                                    'data-placeholder' => 'Selectionner mode de reception',
                                    'class'=>'form-control ',
                                    'name'=>'mode_reception_id',
                                    'style'=>'width:100%',
                                    'disabled'=> 'disabled'
                                    ]
                                )}}
                                <!-- /.input group -->
                            </div>
                        </div>
                    </div>


                    @if ($courrier->courrier_entrant_id != null)
                        <div class="row row-edit">
                            <div class="col-lg-4">
                                {{Form::label('','Entrant:',['style'=> 'font-size : 11px'])}}
                            </div>
                        
                            <div class="col-lg-8">
                                <div class="form-group form-group-edit">
                                    {{Form::text('ref_entrant',$courrier->ref_entrant,['class'=>'form-control','disabled'])}}
                                </div>
                            </div>                       
                           <a href="/courriers-entrants/{{$courrier->courrier_entrant_id}}/edit" style="margin-top: 8px"><i class="fa fa-arrow-right"></i><b>Basculer vers courrier entrant</b></a>                       
                            
                        </div>
                    @endif

                    <br>
                    <h5>Génération des documents : </h5>
                    <hr>

                    <button type="button" class="btn delete-row btn-danger-table"> <i class="fa fa-file" style="margin-right : 4px"></i> <b>Accusé de récéption</b> </button>
                    <br>
                    <button type="button" class="btn delete-row btn-danger-table" style="color : #f99830"> <i class="fa fa-file" style="margin-right : 4px"></i> <b>Fiche de courrier</b> </button>

                    <br>
                    <br>
                    <h5>Edition : </h5>
                    <hr>
                    <button type="button" id="activate_form_edit_btn" class="btn  btn-success activate-form-btn" style="width:90%;margin:auto auto 4px auto;display: block;" ><i class="fa fa-edit" style="margin-right: 8px;"></i>Activer la modification</button>

                    @if ($courrier->etat_id == "de4d5fe6-a384-4df0-abeb-6f953f4102f4")
                         <button type="button" id="valider_courrier_sortant_btn" class="btn  btn-success disabled" style="width:90%;margin:auto auto 4px auto;display: block;" disabled><i class="fa fa-edit" style="margin-right: 8px;"></i>Valider</button>
                    @endif


                     @if ($courrier->etat_id == "4eb0a1ba-a55e-40f0-bea1-bfc9b21cabc8")
                         <button type="button" id="cloture_courrier_edit_btn" class="btn  btn-success disabled" style="width:90%;margin:auto auto 4px auto;display: block;" disabled><i class="fa fa-edit" style="margin-right: 8px;"></i>Cloturer</button>
                    @endif
                   
                    
                    <button type="submit" id="save_edit_btn" class="btn  btn-success submit-btn-edit disabled" style="width:90%;margin-top:4x;margin:auto auto 4px auto;display: block;" ><i class="fa fa-save" style="margin-right: 8px;" disabled></i>Enregistrer</button>
{!! Form::close() !!}
                    {!! Form::open(['route' => ['courriers-delete'],'id'=>'delete_form','method' => 'POST']) !!}
                        <input type="hidden" name="type_courrier" value="sortant">
                        <input type="hidden" name="courrier_id" value="{{$courrier->id}}">
                        <button type="submit"  class="btn  btn-danger disabled" style="width:90%;margin:auto auto 4px auto;display: block;" disabled><i class="fa fa-trash" style="margin-right: 8px;"></i>Supprimer</button>
                    {!! Form::close() !!}
                </div>
                    
                <!-- /.box-body -->
            </div>
            <!-- /. box -->
        </div>
    </div>
    <!-- /.col -->
</div>
<!-- /.row -->

