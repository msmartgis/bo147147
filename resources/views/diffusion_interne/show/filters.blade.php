
<div class="filters" style="margin-bottom: 4px;margin-top: 6px">
    <div class="row">
   
        <div class="col-lg-2">
            <label >{{__('Services concernés')}} :</label>
        </div>
        <div class="col-lg-2">
            <div class="form-group">
                <select class="form-control select2" style="width: 100%;" name="services_concernes" id="services_concernes_select_filter">
                    <option value="all" selected>{{__('Indifferent')}}</option>                   
                    @foreach($services as $service)
                        <option value="{{$service->id}}">{{$service->nom}}</option>
                    @endforeach                
                </select>
            </div>
            <!-- /.form-group -->
        </div>


        <div class="col-lg-2">
            <label >{{__('Responsable')}}  :</label>
        </div>
        <div class="col-lg-2">
            <div class="form-group">
                <select class="form-control select2" style="width: 100%;" name="responsable" id="responsable_select_filter">
                    <option value="all" selected>Indifferent</option>                   
                    @foreach($responsables as $res)
                        <option value="{{$res->id}}">{{$res->full_name}}</option>
                    @endforeach                
                </select>
            </div>
            <!-- /.form-group -->
        </div>



        <div class="col-lg-2">
            <label >{{__('Nature diffusion')}}  :</label>
        </div>
        <div class="col-lg-2">
            <div class="form-group">
                <select class="form-control select2" style="width: 100%;" name="nature_diffusion" id="nature_diffusion_select_filter">
                    <option value="all" selected>Indifferent</option>                   
                    @foreach($nature_diffusion as $nature_diff)
                        <option value="{{$nature_diff->id}}">{{$nature_diff->nom}}</option>
                    @endforeach                
                </select>
            </div>
            <!-- /.form-group -->
        </div>
         
    </div>


    <!--Row-->
    <div class="row" style="margin-top: 6px">
        <div class="col-lg-2">
            <label>{{__('Date envoi')}}  :</label>
        </div>
        <div class="col-lg-2">
             <div class="form-group {{__('costum_css.date-style-m')}}">
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" class="form-control pull-left" name="date_envoi_daterange" id="date_envoi_input" style="font-size: 0.94rem;" value="01/01/2000 - 01/01/2020">				
					 
                    </div>
                </div>
            <!-- /.form-group -->
        </div>
       
         
    </div>

    <div class="row" style="margin-top: 4px">       
       
    </div>
    <hr style="margin:4px">
</div>

