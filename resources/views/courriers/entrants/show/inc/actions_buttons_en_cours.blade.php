<div class="row" >
        <div class="col-lg-6 col-xl-6 col-md-6 col-12">
            <button type="button" class="btn btn-default pull-left multiple-choice-en-cours" id="cloturer_courrier_entrant_btn" style="margin-right : 6px" disabled><i class="fa fa-calendar-check-o" style="margin-right: 6px"></i>Cloturer </button>

        </div>

        <div class="col-lg-6 col-xl-6 col-md-6 col-12">            
            {{Form::open(array('url' => 'ficheDemande','target'=>'print_popup', 'method' => 'poste','class' => 'fiche-word','onsubmit'=>'window.open("about:blank","print_popup","width=800,height=640");'))  }}
                <button type="button" class="btn btn-default pull-right multiple-choice-en-cours" id="fiche_demande_en_cours_btn" style="margin-right : 6px" disabled><i class="fa fa-file" style="margin-right: 6px"></i>Fiche de courrier </button>
            {{Form::close()}}
          <button type="button" class="btn btn-default pull-right unique-choice-en-cours" id="create_courrier_sortant_en_cours_btn" style="margin-right : 6px" disabled><i class="fa fa-arrow-right" style="margin-right: 6px"></i>Créer un courrier sortant </button>
        </div>      
</div>

  <hr style="margin:4px">