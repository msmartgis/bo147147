<div class="tab-pane " id="cloture_tab" role="tabpanel">
    <div class="pad">
        @include('courriers.sortants.show_sortant.filters_sortant.filters_cloture_sortant')
        @include('courriers.sortants.show_sortant.inc_sortant.actions_buttons_cloture_sortant')

        <div class="table-responsive">
            <table class="table table-hover datatables dataTable no-footer" id="courriers_sortant_cloture_datatables"
                style="width:100% ;">
                <thead>
                    <th></th>
                    <th>{{__('Réf')}}</th>
                    <th>{{__('Date envoi')}}</th>
                    <th>{{__('Destinataire')}}</th>
                    <th>{{__('Objet')}}</th>
                    <th>{{__('P.J')}}</th>
                    <th>{{__('Entrant')}}</th>
                </thead>
            </table>
        </div>
    </div>
</div>