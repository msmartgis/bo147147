<div class="row" >
        <div class="col-lg-6 col-xl-6 col-md-6 col-12">
            @if (Auth::user()->role->id == 2 || Auth::user()->role->id == 1)
                <button type="button" class="btn btn-default pull-left multiple-choice-brouillon" id="valider_courrier_sortant_btn" style="margin-right : 6px" disabled><i class="fa fa-thumbs-up" style="margin-right: 6px"></i>Valider </button>
            @endif 
        </div>

        <div class="col-lg-6 col-xl-6 col-md-6 col-12">            
            {{Form::open(array('url' => 'ficheDemande','target'=>'print_popup', 'method' => 'poste','class' => 'fiche-word','onsubmit'=>'window.open("about:blank","print_popup","width=800,height=640");'))  }}
                <button type="button" class="btn btn-default pull-right multiple-choice-en-cours" id="fiche_demande_en_cours_btn" style="margin-right : 6px" disabled><i class="fa fa-file" style="margin-right: 6px"></i>Fiche de courrier </button>
            {{Form::close()}}
            @if (Auth::user()->role->id == 2 || Auth::user()->role->id == 1)
                <a href="{{ route('documents-sortants-create') }}" class="btn btn-default pull-right " style="margin-right:4px"><i class="fa fa-plus" style="margin-right: 6px"></i>Ajouter
                    une sortie</a>
            @endif
        </div>      
</div>

  <hr style="margin:4px">