{{--TODO add remove option when adding partner or document--}}

{!! Form::model($courrier,[
'action' => 'CourrierSortantController@store',
'method'=>'POST',
'class'=>'tab-wizard wizard-circle form-create',
'id'=>'create_demande_form',
'enctype' => 'multipart/form-data'
]) !!}
<!-- Step 1 -->
<h6>{{__('Information Général')}}</h6>
<section>
    <div class="row">
        {{-- the left side of step 1 --}}
        <div class="col-lg-6 col-md-6 col-sm-12 {{__('costum_css.border-style-m')}}">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="form-group">
                        {{Form::label('',trans('Réf courrier').' :')}}
                        {{Form::text('ref','',['class'=>'form-control','required'=>'required'])}}
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="form-group {{__('costum_css.date-style-m')}}">
                        {{Form::label('',trans('Date envoie').' :')}}
                        <div class="input-group date">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            {{Form::text('date_envoi',$actu_date,['class'=>'form-control pull-right datepicker'])}}
                        </div>
                        <!-- /.input group -->
                    </div>

                </div>
            </div>

            <div class="row" style="margin-top: 10px">
                <div class="col-lg-6">
                    <div class="form-group">
                        {{Form::label('',trans('Catégorie'). ' :')}}
                        {{Form::select('categorie_courrier', $categorie_courrier, null,
                                [
                                'data-placeholder' => 'Selectionner mode de reception',
                                'class'=>'form-control ',
                                'name'=>'categorie_courrier_id',
                                'style'=>'width:100%'
                                ]
                                )}}
                    </div>
                </div>
            </div>


            <div class="row" style="margin-top: 10px">
                <div class="col-12">
                    <div class="form-group">
                        <h6 class="{{__('costum_css.float-right-m')}}">{{__('Objet')}}</h6>
                        <div class="controls">
                            {{Form::textarea('objet','',['class'=>'form-control m-required-input','placeholder'=>trans('objet...'),'rows'=>'2','id'=>'objet_fr_input_id','required'=>'required'])}}
                        </div>
                    </div>
                </div>
            </div>

        </div>

        {{-- the right side of step 1 --}}
        <div class="col-lg-6 col-md-6 col-sm-12" style="padding-left : 15px">
            <div class="row">
                <div class="col-lg-6">
                    <h5 class="{{__('costum_css.float-right-m')}}">{{__('Destinataire')}}</h5>
                    <div class="form-group">
                        {{Form::select('type_destinataire',
                                [
                                    'personne_physique' => trans('Personne physique') ,
                                    'personne_morale' =>trans('Personne morale')
                                ],
                                'personne_physique',
                                [
                                    'data-placeholder' => 'Destinataire',
                                    'class'=>'form-control',
                                    'name'=>'type_destinataire',
                                    'id'=>'type_destinataire_select_id',
                                ])}}
                    </div>
                </div>

                <div class="col-lg-6">
                    <h5> Mode d'envoi</h5>
                    <div class="form-group">
                        {{Form::select('modes_envoi', $modes_recpetion, null,
                                [
                                'data-placeholder' => 'Selectionner mode de reception',
                                'class'=>'form-control ',
                                'name'=>'mode_envoi_id',
                                'style'=>'width:100%'
                                ]
                                )}}
                    </div>
                </div>
            </div>


            {{-- personne physique --}}
            <div id="personne_physique" class="expediteur personne_physique">
                <div class="row" style="margin-top : 8px">
                    <div class="row col-12">
                        {{Form::label('',trans('Recherche dans la base des données'),['style'=>'margin-top : 12px'])}}
                    </div>

                    <div class="col-lg-6">
                        <div class="form-group">
                            <select name="personne_physique_id_from_db" class="form-control select2"
                                id="personne_physique_select_id">
                                @foreach ($personne_physiques as $pers_phys)
                                <option value="{{$pers_phys->id}}">{{$pers_phys->nom}} {{$pers_phys->prenom}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <a href="#" id="ajouter_personne_physique_btn"> <i class="fa fa-plus"></i>
                        <b>{{__('Ajouter un nouveau destinataire')}} </b>
                    </a>
                </div>


                <div id="ajouter_nouveau_personne_phisique_div" style="display:none">

                    <div class="row" style="margin-top : 10px">
                        <div class="col-lg-6">
                            <div class="form-group">
                                {{Form::label('',trans('Nom') .' :')}}
                                {{Form::text('nom_personne_physique','',['class'=>'form-control'])}}
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                {{Form::label('',trans('Prènom') .' :')}}
                                {{Form::text('prenom_personne_physique','',['class'=>'form-control'])}}
                            </div>
                        </div>
                    </div>

                    <div class="row" style="margin-top : 10px">
                        <div class="col-lg-6">
                            <div class="form-group">
                                {{Form::label('',trans('C.I.N.E') .' :')}}
                                {{Form::text('cine_personne_physique','',['class'=>'form-control'])}}
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                {{Form::label('',trans('Adresse') .' :')}}
                                {{Form::text('adresse_personne_physique','',['class'=>'form-control'])}}
                            </div>
                        </div>
                    </div>

                    <div class="row" style="margin-top : 10px">
                        <div class="col-lg-6">
                            <div class="form-group">
                                {{Form::label('',trans('Tel Fixe') .' :')}}
                                {{Form::text('tel_fixe_personne_physique','',['class'=>'form-control'])}}
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                {{Form::label('',trans('Tel Mobile') .' :')}}
                                {{Form::text('tel_mobile_personne_physique','',['class'=>'form-control'])}}
                            </div>
                        </div>
                    </div>


                    <div class="row" style="margin-top : 10px">
                        <div class="col-lg-6">
                            <div class="form-group">
                                {{Form::label('',trans('Email') .' :')}}
                                {{Form::text('email_personne_physique','',['class'=>'form-control'])}}
                            </div>
                        </div>
                    </div>

                </div>

            </div>

            {{-- personne morale --}}
            <div id="personne_morale" class="expediteur personne_morale" style="display:none">
                {{Form::label('',trans('Recherche dans la base des données'))}}
                <div class="row" style="margin-top : 8px">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <select name="personne_morale_id_from_db" class="form-control select2"
                                id="personne_morale_select_id">

                                @foreach ($personne_morales as $pers_moral)
                                <option value="{{$pers_moral->id}}">{{$pers_moral->raison_social}} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-lg-2">
                        <b>OU</b>
                    </div>

                    <div class="col-lg-4">
                        <a href="#" id="ajouter_personne_morale_btn"> <i class="fa fa-plus"></i>
                            <b>{{__('Ajouter un nouveau destinataire')}} </b>
                        </a>
                    </div>


                </div>



                <div id="ajouter_nouveau_personne_morale_div" style="display:none">
                    <div class="row" style="margin-top : 10px">
                        <div class="col-lg-6">
                            <div class="form-group">
                                {{Form::label('',trans('Raison social') .' :')}}
                                {{Form::text('raison_social','',['class'=>'form-control'])}}
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                {{Form::label('',trans('Adresse') .' :')}}
                                {{Form::text('adresse','',['class'=>'form-control'])}}
                            </div>
                        </div>
                    </div>

                    <div class="row" style="margin-top : 10px">
                        <div class="col-lg-6">
                            <div class="form-group">
                                {{Form::label('',trans('RC') .' :')}}
                                {{Form::text('rc','',['class'=>'form-control'])}}
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                {{Form::label('',trans('Tel Fixe') .' :')}}
                                {{Form::text('tel_fix_personne_morale','',['class'=>'form-control'])}}
                            </div>
                        </div>
                    </div>

                    <div class="row" style="margin-top : 10px">
                        <div class="col-lg-6">
                            <div class="form-group">
                                {{Form::label('',trans('Fax') .' :')}}
                                {{Form::text('fax_personne_morale','',['class'=>'form-control'])}}
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                {{Form::label('',trans('Tel Mobile') .' :')}}
                                {{Form::text('tel_mobile_personne_morale','',['class'=>'form-control'])}}
                            </div>
                        </div>
                    </div>


                    <div class="row" style="margin-top : 10px">
                        <div class="col-lg-6">
                            <div class="form-group">
                                {{Form::label('',trans('Email') .' :')}}
                                {{Form::text('email_personne_morale','',['class'=>'form-control'])}}
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                {{Form::label('',trans('Représentant') .' :')}}
                                {{Form::text('representant','',['class'=>'form-control'])}}
                            </div>
                        </div>
                    </div>

                    <h6 style="margin-top : 10px"><b>{{__('Representant')}}</b></h6>
                    <div class="row" style="margin-top : 10px">
                        <div class="col-lg-6">
                            <div class="form-group">
                                {{Form::label('',trans('Nom') .' :')}}
                                {{Form::text('nom_representant','',['class'=>'form-control'])}}
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                {{Form::label('',trans('Prènom') .' :')}}
                                {{Form::text('prenom_representant','',['class'=>'form-control'])}}
                            </div>
                        </div>
                    </div>

                    <div class="row" style="margin-top : 10px">
                        <div class="col-lg-6">
                            <div class="form-group">
                                {{Form::label('',trans('C.I.N.E') .' :')}}
                                {{Form::text('cine_representant','',['class'=>'form-control'])}}
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                {{Form::label('',trans('Status') .' :')}}
                                {{Form::text('role_representant','',['class'=>'form-control'])}}
                            </div>
                        </div>
                    </div>

                    <div class="row" style="margin-top : 10px">
                        <div class="col-lg-6">
                            <div class="form-group">
                                {{Form::label('',trans('Tel Fixe') .' :')}}
                                {{Form::text('tel_fix_representant','',['class'=>'form-control'])}}
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                {{Form::label('',trans('Tel Mobile') .' :')}}
                                {{Form::text('tel_mobile_representant','',['class'=>'form-control'])}}
                            </div>
                        </div>
                    </div>


                    <div class="row" style="margin-top : 10px">
                        <div class="col-lg-6">
                            <div class="form-group">
                                {{Form::label('',trans('Email') .' :')}}
                                {{Form::text('email_representant','',['class'=>'form-control'])}}
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                {{Form::label('',trans('Adresse') .' :')}}
                                {{Form::text('adresse_representant','',['class'=>'form-control'])}}
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </div>
</section>
<!-- Step 2 -->
<h6>{{__('Acheminement et traitement')}}</h6>
<section>





    <h5 class="{{__('costum_css.float-right-m')}}">{{__('AJOUTER LES DOCUMENTS FOURNIS')}}</h5>
    <hr>
    <div class="row" style="margin: 0 !important;">
        <div class="table-responsive" style="margin-top: 12px">
            <table class="table table-piece">
                <thead class="create-table">
                    <tr style="text-align: center;">
                        <th></th>
                        <th>{{__('Type de document')}}</th>
                        <th>{{__('Intitulé')}}</th>
                        <th>{{__('Mode envoi')}}</th>
                        <th>{{__('Date envoi')}}</th>
                        <th>{{__('Charger')}}</th>
                    </tr>
                </thead>
                <tbody id="piece_courrier_tbody">
                    <tr>

                    </tr>
                </tbody>
            </table>

            <div style="text-align: center">
                <a href="#" id="add_piece_btn"> <i class="fa fa-plus"></i>
                    <b> {{__('Ajouter')}} </b>
                </a>
            </div>
            <button type="button" class="btn delete-row btn-danger-table" id="delete_documents_row_btn"> <i
                    class="fa fa-close"></i> {{__('Supprimer')}}</button>
        </div>
    </div>
    <br>

    <h5 class="{{__('costum_css.float-right-m')}}">{{__('ACCUSE ENVOI')}}</h5>

    <hr>

    <div class="row" style="margin: 0 !important;">
        <div class="table-responsive" style="margin-top: 12px">
            <table class="table table-accuse-reception">
                <thead class="create-table">
                    <tr style="text-align: center;">
                        <th></th>
                        <th>{{__('Date')}}</th>
                        <th>{{__('Accusé')}}</th>
                    </tr>
                </thead>

                <tbody id="acusse_reception_tbody">
                    <tr>

                    </tr>
                </tbody>
            </table>

            <div style="text-align: center">
                <a href="#" id="add_accuse_reception_btn"> <i class="fa fa-plus"></i>
                    <b> {{__('Ajouter')}} </b>
                </a>
            </div>
            <button type="button" class="btn delete-row btn-danger-table" id="delete_accuse_rception_row_btn"> <i
                    class="fa fa-close"></i> {{__('Supprimer')}}</button>
        </div>
    </div>


</section>



{!! Form::close() !!}