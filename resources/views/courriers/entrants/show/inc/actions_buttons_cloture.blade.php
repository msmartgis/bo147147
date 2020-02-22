<div class="row">
    <div class="col-lg-6 col-xl-6 col-md-6 col-12">

    </div>

    <div class="col-lg-6 col-xl-6 col-md-6 col-12">
        {{Form::open(array('url' => 'ficheDemande','target'=>'print_popup', 'method' => 'poste','class' => 'fiche-word','onsubmit'=>'window.open("about:blank","print_popup","width=800,height=640");'))  }}
        <button type="button" class="btn btn-default {{__('costum_css.pull-right')}} multiple-choice-en-cours"
            style="margin-right : 6px" disabled><i class="fa fa-file"
                style="margin-right: 6px;margin-left: 6px"></i>{{__('Fiche de courrier')}} </button>
        {{Form::close()}}
        @if (Auth::user()->role->first()->role_name == "admin" || Auth::user()->role->first()->role_name ==
        "bureau_ordre")
        <button type="button" class="btn btn-default {{__('costum_css.pull-right')}} unique-choice-cloture"
            id="create_courrier_sortant_cloture_btn" style="margin-right : 6px" disabled><i class="fa fa-arrow-right"
                style="margin-right: 6px;margin-left: 6px"></i>{{__('Créer un courrier sortant')}}</button>
        @endif
    </div>
</div>

<hr style="margin:4px">