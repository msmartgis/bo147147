<div class="tab-pane active" id="brouillons_tab" role="tabpanel">
    <div class="pad">  
        @include('courriers.entrants.show.filters.filters_brouillon')
        @include('courriers.entrants.show.inc.actions_buttons_brouillon')

        <div class="table-responsive">
            <table class="table table-hover datatables dataTable no-footer" id="courriers_entrant_brouillon_datatables" style="width:100% ;" >
                <thead >
                <th ></th>
                <th >Réf</th>
                <th >Date Réception</th>
                <th>Expediteur</th>
                <th>Objet</th>
                <th>Delai</th>
                <th>P.J</th>
                </thead>
            </table>
        </div>
    </div>
</div>