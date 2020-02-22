<div class="row">
    <div class="col-lg-6 col-xl-6 col-md-6 col-12">
        @if (Auth::user()->role->first()->role_name == "admin" || Auth::user()->role->first()->role_name ==
        "bureau_ordre")
        <button type="button" class="btn btn-default  {{__('costum_css.pull-left')}}   multiple-choice-brouillon"
            id="valider_courrier_entrant_btn" style="margin-right : 6px" disabled><i class="fa fa-thumbs-up"
                style="margin-right: 6px;margin-left: 6px"></i>{{ __('Valider')}} </button>
        @endif
    </div>

    <div class="col-lg-6 col-xl-6 col-md-6 col-12">
        {{Form::open(array('url' => 'ficheDemande','target'=>'print_popup', 'method' => 'poste','class' => 'fiche-word','onsubmit'=>'window.open("about:blank","print_popup","width=800,height=640");'))  }}
        <button type="button" class="btn btn-default {{__('costum_css.pull-right')}}  multiple-choice-en-cours"
            style="margin-right : 6px" disabled><i class="fa fa-file"
                style="margin-right: 6px;margin-left: 6px"></i>{{__('Fiche de courrier')}} </button>
        {{Form::close()}}

        @if (Auth::user()->role->first()->role_name == "admin" || Auth::user()->role->first()->role_name ==
        "bureau_ordre")
        <a href="{{ route('documents-entrants-create') }}" class="btn btn-default {{__('costum_css.pull-right')}}  "
            style="margin-right:4px;margin-left: 4px"><i class="fa fa-plus" style="margin-right: 6px"></i>
            {{__('Ajouter une entrée')}}
        </a>
        @endif

    </div>
</div>

<hr style="margin:4px">