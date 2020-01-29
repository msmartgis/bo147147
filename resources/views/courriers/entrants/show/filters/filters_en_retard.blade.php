<div class="filters" style="margin-bottom: 4px;margin-top: 6px">
    <div class="row">
        <div class="col-lg-2">
            <label>{{__('Nature éxpiditeur')}} :</label>
        </div>
        <div class="col-lg-2">
            <div class="form-group">
                <select class="form-control select2 en-retard-select" style="width: 100%;"
                    name="nature_expediteur_en_retard">
                    <option value="all" selected>{{__('Indifferent')}}</option>
                    <option value="personne_morale">{{__('Personne morale')}}</option>
                    <option value="personne_physique">{{__('Personne physique')}}</option>

                </select>
            </div>
            <!-- /.form-group -->
        </div>


        <div class="col-lg-2">
            <label>{{__('Expediteur')}} :</label>
        </div>
        <div class="col-lg-2">
            <div class="form-group">
                <select class="form-control select2 en-retard-select" style="width: 100%;" name="expediteur_en_retard">
                    <option value="all" selected>{{__('Indifferent')}}</option>
                    @foreach($personne_physiques as $p_physique)
                    <option value="personnePhysique_{{$p_physique->id}}">{{$p_physique->full_name}}</option>
                    @endforeach

                    @foreach($personne_morales as $p_morale)
                    <option value="personneMorale_{{$p_morale->id}}">{{$p_morale->raison_social}}</option>
                    @endforeach
                </select>
            </div>
            <!-- /.form-group -->
        </div>


        <div class="col-lg-2">
            <label>{{__('Services concernés')}} :</label>
        </div>
        <div class="col-lg-2">
            <div class="form-group">
                <select class="form-control select2 en-retard-select" style="width: 100%;"
                    name="services_concernes_en_retard">
                    <option value="all" selected>{{__('Indifferent')}}</option>
                    @foreach($services as $service)
                    <option value="{{$service->id}}">{{$service->nom}}</option>
                    @endforeach
                </select>
            </div>
            <!-- /.form-group -->
        </div>

    </div>


    <!--Row-->
    <div class="row" style="margin-top: 6px">
        <div class="col-lg-2">
            <label>{{__('Mode reception')}} :</label>
        </div>
        <div class="col-lg-2">
            <div class="form-group">
                <select class="form-control select2 en-retard-select" style="width: 100%;"
                    name="mode_reception_en_retard">
                    <option value="all" selected>{{__('Indifferent')}}</option>
                    @foreach($modes_recpetions as $mode_recpetion)
                    <option value="{{$mode_recpetion->id}}">{{$mode_recpetion->nom}}</option>
                    @endforeach
                </select>
            </div>
            <!-- /.form-group -->
        </div>

        <div class="col-lg-2">
            <label>{{__('Date de la réception')}} :</label>
        </div>
        <div class="col-lg-2">
            <div class="form-group {{__('costum_css.date-style-m')}}">
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text" class="form-control pull-left" name="date_reception_en_retard_daterange"
                        id="date_reception_en_retard_input" style="font-size: 0.94rem;" value="01/01/2000 - 01/01/2020">

                </div>
            </div>
            <!-- /.form-group -->
        </div>


        <div class="col-lg-2">
            <label>{{__('Priorité')}} :</label>
        </div>
        <div class="col-lg-2">
            <div class="form-group">
                <select class="form-control select2 en-retard-select" style="width: 100%;" name="priorite_en_retard">
                    <option value="all" selected>{{__('Indifferent')}}</option>
                    @foreach($priorites as $priorite)
                    <option value="{{$priorite->id}}">{{$priorite->nom}}</option>
                    @endforeach
                </select>
            </div>
            <!-- /.form-group -->
        </div>

    </div>


    <div class="row" style="margin-top: 6px">
        <div class="col-lg-2">
            <label>{{__('Catégorie')}} :</label>
        </div>
        <div class="col-lg-2">
            <div class="form-group">
                <select class="form-control select2 en-retard-select" style="width: 100%;"
                    name="categorie_courrier_en_retard">
                    <option value="all" selected>{{__('Indifferent')}}</option>
                    @foreach($categorie_courrier as $categorie)
                    <option value="{{$categorie->id}}">{{$categorie->nom}}</option>
                    @endforeach
                </select>
            </div>
            <!-- /.form-group -->
        </div>
    </div>

    <div class="row" style="margin-top: 4px">

    </div>
    <hr style="margin:4px">
</div>