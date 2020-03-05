<div class="row">
    <div class="col-lg-6 col-xl-6 col-md-6 col-12">

    </div>

    <div class="col-lg-6 col-xl-6 col-md-6 col-12">
            {{Form::open(array('url' => 'registre-courrier-entrant','target'=>'print_popup', 'method' => 'poste','class' => 'fiche-word','onsubmit'=>'window.open("about:blank","print_popup","width=800,height=640");'))  }}
                <button type="submit" class="btn btn-default pull-right multiple-choice-en-cours"  style="margin-right : 6px" ><i class="fa fa-file" style="margin-right: 6px"></i>Registre des courriers  </button>
            {{Form::close()}}
        
        <button type="button" class="btn btn-default {{__('costum_css.pull-right')}} multiple-choice-en-cours"
             style="margin-right : 6px" disabled><i class="fa fa-file"
                style="margin-right: 6px;margin-left: 6px"></i>{{__('Fiche de courrier')}} </button>
    
    </div>
</div>

<hr style="margin:4px">