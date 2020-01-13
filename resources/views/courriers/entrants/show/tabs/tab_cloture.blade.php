<div class="tab-pane " id="cloture_tab" role="tabpanel">
    <div class="pad">
        @include('courriers.entrants.show.filters.filters_cloture')
        @include('courriers.entrants.show.inc.actions_buttons_cloture')

        <div class="table-responsive">
            <table class="table table-hover datatables dataTable no-footer" id="courriers_entrant_cloture_datatables"
                style="width:100% ;">
                <thead>
                    <th></th>
                    <th>Priorité</th>
                    <th>Réf</th>
                    <th>Date Réception</th>
                    <th>Expediteur</th>
                    <th>Objet</th>
                    <th>Delai</th>
                    <th>P.J</th>
                    <th>Sortant</th>
                </thead>
            </table>
        </div>
    </div>
</div>