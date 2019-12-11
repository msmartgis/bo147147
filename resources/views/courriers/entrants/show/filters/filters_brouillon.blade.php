
<div class="filters" style="margin-bottom: 4px;margin-top: 6px">
    <div class="row">
        <div class="col-lg-2">
            <label >Nature de l'éxpiditeur :</label>
        </div>
        <div class="col-lg-2">
            <div class="form-group">
                <select class="form-control select2" style="width: 100%;" name="nature_expediteur_brouillon" id="nature_expediteur_brouillon_select_filter">
                    <option value="all" selected>Indifferent</option>                                      
                    <option value="personne_morale">Personne morale</option>               
                    <option value="personne_physique">Personne physique</option> 
                               
                </select>
            </div>
            <!-- /.form-group -->
        </div>


        <div class="col-lg-2">
            <label>Expediteur :</label>
        </div>
        <div class="col-lg-2">
            <div class="form-group">
                <select class="form-control select2" style="width: 100%;" name="expediteur_brouillon" id="expediteur_brouillon_select_filter">
                    <option value="all" selected>Indifferent</option>
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
            <label >Services concernés :</label>
        </div>
        <div class="col-lg-2">
            <div class="form-group">
                <select class="form-control select2" style="width: 100%;" name="services_concernes_brouillon" id="services_concernes_brouillon_select_filter">
                    <option value="all" selected>Indifferent</option>                   
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
            <label>Mode reception :</label>
        </div>
        <div class="col-lg-2">
            <div class="form-group">
                <select class="form-control select2" style="width: 100%;" name="mode_reception_brouillon" id="mode_reception_brouillon_select_filter">
                    <option value="all" selected>Indifferent</option>                   
                    @foreach($modes_recpetions as $mode_recpetion)
                        <option value="{{$mode_recpetion->id}}">{{$mode_recpetion->nom}}</option>
                    @endforeach                 
                </select>
            </div>
            <!-- /.form-group -->
        </div>

        <div class="col-lg-2">
            <label>Date de la réception :</label>
        </div>
        <div class="col-lg-2">
             <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" class="form-control pull-left" name="date_reception_brouillon_daterange" id="date_reception_brouillon_input" style="font-size: 0.94rem;" value="01/01/2000 - 01/01/2020">				
					 
                    </div>
                </div>
            <!-- /.form-group -->
        </div>       


        <div class="col-lg-2">
            <label>Avis :</label>
        </div>
        <div class="col-lg-2">
            <div class="form-group">
                <select class="form-control select2" style="width: 100%;" name="avis_brouillon" id="avis_brouillon_select_filter">
                    <option value="all" selected>Indifferent</option>                   
                    <option value="favorable">Favorable</option>               
                    <option value="defavorable">Defavorable</option>               
                </select>
            </div>
            <!-- /.form-group -->
        </div>


         
    </div>

    <div class="row" style="margin-top: 4px">       
       
    </div>
    <hr style="margin:4px">
</div>

