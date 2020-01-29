<div class="tab-pane " id="tous_tab" role="tabpanel">
    <div class="pad">
        @include('courriers.sortants.show_sortant.filters_sortant.filters_tous_sortant')
        @include('courriers.sortants.show_sortant.inc_sortant.actions_buttons_tous_sortant')

        <div class="table-responsive">
            <table class="table table-hover datatables dataTable no-footer" id="courriers_sortant_tous_datatables"
                style="width:100% ;">
                <thead>
                    <th></th>
                    <th>{{__('Réf')}}</th>
                    <th>{{__('Catégorie')}}</th>
                    <th>{{__('Date envoi')}}</th>
                    <th>{{__('Destinataire')}}</th>
                    <th>{{__('Objet')}}</th>
                    <th>{{__('P.J')}}</th>
                    <th>{{__('Etat')}}</th>
                    <th>{{__('Entrant')}}</th>
                </thead>
            </table>
        </div>
    </div>
</div>