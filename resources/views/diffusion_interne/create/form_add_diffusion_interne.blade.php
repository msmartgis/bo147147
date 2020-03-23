{{--TODO add remove option when adding partner or document--}}

{!! Form::model($diffusion_interne,[
'action' => 'DiffusionInterneController@store',
'method'=>'POST',
'class'=>'tab-wizard wizard-circle form-create',
'enctype' => 'multipart/form-data'
]) !!}
<!-- Step 1 -->
<h6>{{__('Information Général')}}</h6>
<section>
    <div class="row">
        <div class="row col-12">
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="form-group">
                    {{Form::label('',trans('Réf').' :')}}
                    {{Form::text('ref','',['class'=>'form-control','required'=>'required'])}}
                </div>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="form-group ">
                    {{Form::label('',trans('Nature de diffusion').' :')}}
                    {{Form::select('nature_diffusion', $natures_diffusions, null,
                            [
                            'data-placeholder' => 'Selectionner mode de reception',
                            'class'=>'form-control ',
                            'name'=>'nature_diffusion',
                            'style'=>'width:100%'
                            ]
                            )}}
                </div>
            </div>

            <div class="col-lg-4">
                <div class="form-group {{__('costum_css.date-style-m')}}">
                    {{Form::label('',trans('Date envoi').' :')}}
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


        <div class="row col-12" style="margin-top: 10px">
            <div class="col-lg-6">
                <div class="form-group">
                    <h6 class="{{__('costum_css.float-right-m')}}">{{__('Objet')}}</h6>
                    <div class="controls">
                        {{Form::textarea('objet','',['class'=>'form-control m-required-input','placeholder'=>trans('saisir objet'),'rows'=>'2','id'=>'objet_fr_input_id','required'=>'required'])}}
                    </div>
                </div>
            </div>
        </div>

        <br>
        <h5 class="{{__('costum_css.float-right-m')}}" style="margin-top:8px">{{__('AJOUTER LES DOCUMENTS FOURNIS')}}
        </h5>
        <hr>
        <div class="row col-12" style="margin: 0 !important;">
            <div class="table-responsive" style="margin-top: 12px">
                <table class="table table-piece">
                    <thead class="create-table">
                        <tr style="text-align: center;">
                            <th></th>
                            <th>{{__('Réf')}}</th>
                            <th>{{__('Intitulé')}}</th>
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
                        class="fa fa-close"></i>{{__('Supprimer')}} </button>
            </div>
        </div>

    </div>
</section>
<!-- Step 2 -->
<h6>{{__('Acheminement et traitement')}}</h6>
<section>

    <h5 class="{{__('costum_css.float-right-m')}}">
        {{__('ASSIGNER A UN SERVICE/UNE DIVISION')}}
    </h5>
    <hr>
    <div class="row" style="margin: 0 !important;">
        <div class="table-responsive" style="margin-top: 12px">
            <table class="table table-service-assigne">
                <thead class="create-table">
                    <tr style="text-align: center;">
                        <th></th>
                        <th>{{__('Service')}}</th>
                        <th>{{__('Réf')}}</th>
                        <th>{{__('Responsable')}}</th>
                        <th>{{__('Message')}}</th>
                    </tr>
                </thead>
                <tbody id="service_assigne_tbody">
                    <tr></tr>
                </tbody>
            </table>

            <div style="text-align: center">
                <a href="#" data-toggle="modal" data-target="#assigne_service_modal"> <i class="fa fa-plus"></i>
                    <b> {{__('Ajouter')}}</b>
                </a>
            </div>
            <button type="button" class="btn delete-row btn-danger-table" id="delete_service_row_btn"> <i
                    class="fa fa-close"></i>{{__('Supprimer')}} </button>
        </div>
    </div>
    <br>

    <h5 class="{{__('costum_css.float-right-m')}}">{{__('OBSERVATIONS ET REMARQUES')}}</h5>
    <hr>

    <div class="row">
        <div class="col-12">
            <div class="form-group">
                {{Form::textarea('observation','',['id'=>'editor1','placeholder'=>'saisir vos
                        obsérvations','rows'=>'10','cols'=>'80'])}}
            </div>
        </div>
    </div>

</section>



{!! Form::close() !!}