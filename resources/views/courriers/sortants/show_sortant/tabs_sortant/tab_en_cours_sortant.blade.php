<div class="tab-pane " id="en_cours_tab" role="tabpanel">
    <div class="pad">  
        @include('courriers.sortants.show_sortant.filters_sortant.filters_en_cours_sortant')
        @include('courriers.sortants.show_sortant.inc_sortant.actions_buttons_en_cours_sortant')

        <div class="table-responsive">
            <table class="table table-hover datatables dataTable no-footer" id="courriers_sortant_en_cours_datatables" style="width:100% ;" >
                <thead >
                <th ></th>
                <th >Réf</th>
                <th >Date Envoi</th>
                <th>Destinataire</th>
                <th>Objet</th>
                <th>P.J</th>
                <th>Entrant</th>
                </thead>
            </table>
        </div>
    </div>
</div>