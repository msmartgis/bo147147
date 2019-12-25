<div class="tab-pane " id="tous_tab" role="tabpanel">
    <div class="pad">  
        @include('courriers.sortants.show_sortant.filters_sortant.filters_tous_sortant')
        @include('courriers.sortants.show_sortant.inc_sortant.actions_buttons_tous_sortant')

        <div class="table-responsive">
            <table class="table table-hover datatables dataTable no-footer" id="courriers_sortant_tous_datatables" style="width:100% ;" >
                <thead >
                <th ></th>
                <th >Réf</th>
                <th >Date d'envoi</th>
                <th>Destinataire</th>
                <th>Objet</th>
                <th>P.J</th>
                <th>Etat</th>
                </thead>
            </table>
        </div>
    </div>
</div>