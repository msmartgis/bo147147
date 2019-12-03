<div class="tab-pane active" id="tous_tab" role="tabpanel">
    <div class="pad">  
        @include('courriers.entrants.show.filters.filters_tous')
        @include('courriers.entrants.show.inc.actions_buttons')

        <div class="table-responsive">
            <table class="table table-hover datatables dataTable no-footer" id="demandes_datatables" style="width:100% ;" >
                <thead >
                <th style="width: 1% !important"><input type="checkbox" id="demande_en_cours_th" name="checkbox"   class="chk-col-black" ><label for="demande_en_cours_th" class="block select-all-cb" ></label></th>
                <th style="width: 1% !important">N°</th>
                <th style="width: 1% !important">Réception</th>
                <th >Objet</th>
                <th >L(KM)</th>
                <th>Communes</th>
                <th>Porteur</th>
                <th>Interventions</th>
                <th>Partenaire</th>
                <th style="width: 1% !important">M.Total</th>
                <th style="width: 1% !important">M.CP</th>
                </thead>
            </table>
        </div>
    </div>
</div>