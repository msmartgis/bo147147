<div class="tab-pane " id="cloture_tab" role="tabpanel">
    <div class="pad">
        @include('courriers.entrants.show.filters.filters_cloture')
        @include('courriers.entrants.show.inc.actions_buttons_cloture')

        <div class="table-responsive">
            <table class="table table-hover datatables dataTable no-footer" id="courriers_entrant_cloture_datatables"
                style="width:100% ;">
                <thead>
                    <th></th>
                    <th>{{__('Priorité')}}</th>
                    <th>{{__('Réf')}}</th>
                     <th>{{__('Catégorie')}}</th>
                    <th>{{__('Date Réception')}}</th>
                    <th>{{__('Expediteur')}}</th>
                    <th>{{__('Objet')}}</th>
                    <th>{{__('Delai')}}</th>
                    <th>{{__('P.J')}}</th>
                    <th>{{__('Sortant')}}</th>
                </thead>
            </table>
        </div>
    </div>
</div>