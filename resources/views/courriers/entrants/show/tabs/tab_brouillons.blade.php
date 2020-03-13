<div class="tab-pane @if (Auth::user()->role->first()->role_name == 'bureau_ordre') active @endif" id="brouillons_tab"
    role="tabpanel">
    <div class="pad">
        @include('courriers.entrants.show.filters.filters_brouillon')
        @include('courriers.entrants.show.inc.actions_buttons_brouillon')

        <div class="table-responsive">
            <table class="table table-hover datatables dataTable no-footer" id="courriers_entrant_brouillon_datatables"
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
                </thead>
            </table>
        </div>
    </div>
</div>