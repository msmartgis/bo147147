<div class="tab-pane " id="cloture_tab" role="tabpanel">
     <div class="pad">  
        @include('courriers.sortants.show_sortant.filters_sortant.filters_cloture_sortant')
        @include('courriers.sortants.show_sortant.inc_sortant.actions_buttons_cloture_sortant')

        <div class="table-responsive">
            <table class="table table-hover datatables dataTable no-footer" id="courriers_sortant_cloture_datatables" style="width:100% ;" >
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