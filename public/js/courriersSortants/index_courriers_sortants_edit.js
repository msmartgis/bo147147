$(document).ready(function () {

    var delete_btn;
    var item_service_number = 0;
    $('.delete-row').on('click', function () {
        delete_btn = $(this);
        swal({
            title: "Vous êtes sûr?",
            text: 'Voulez vous vraiment supprimer cette ligne',
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Confirmer",
            cancelButtonText: "Non",
            closeOnConfirm: false,
            closeOnCancel: false
        }, function (isConfirm) {
            if (isConfirm) {

                delete_btn.closest('tr').remove();
                if (delete_btn.closest('tr').remove()) {
                    swal("Réussi!", 'L\'opération a été effectuée avec succès', "success");
                }

            } else {
                swal("L'operation est annulée", "Aucun changement a été éffectué", "error");
            }
        });
    })



    //add document to list
    $('#add_piece_btn').on('click', function () {
        data_documents_types = getDocumentsTypes();

        let i = 0;
        let item_document_type = 0;

        let markup_select_option = '';
        let markup_select_option_document_types = '';



        for (item_document_type = 0; item_document_type < data_documents_types.length; item_document_type++) {

            markup_select_option_document_types += '<option value="' + data_documents_types[item_document_type].id + '">' + data_documents_types[item_document_type].nom + '</option>'

        }

        $('.table-piece tr:last').after(

            '<tr>' +

            '<td> ' +
            '<div class = "form-group"> ' +
            '<select name="types_documents_fournis[]" class="form-control">' + markup_select_option_document_types +
            '</select>' +
            '</div>' +
            '</td>' +


            '<td> ' +
            '<div class = "form-group"> ' +
            '<input type="text"   name="intitules_documents_fournis[]" class="form-control" value="document sans nom"> ' +
            '</div>' +
            '</td>' +



            '<td>' +
            '<div class="form-group">' +
            '<input type="file" name="documents_ulpoad_documents_fournis[]" class="form-control-file">' +
            '</div>' +
            '</td>' +

            '</tr>'

        );


        $(".datepicker-documents-table").datepicker("destroy");
        $(".datepicker-documents-table").datepicker({
            format: 'yyyy-mm-dd'
        });

    })


    //add accuse envoi courrier entrants
    $('#add_accuse_envoi_btn').on('click', function () {

        $('.table-accuse-envoi tr:last').after(

            '<tr>' +

            '<td> ' +
            '<div class = "form-group"> ' +
            '<input type="text" class="form-control datepicker-table" value="' + actueDate + '"   name="date_accuse_envois[]"> ' +
            '</div>' +
            '</td>' +


            '<td>' +
            '<div class="form-group">' +
            '<input type="file" name="accuse_envoi_uploads[]" class="form-control-file">' +
            '</div>' +
            '</td>' +

            '<td>' +
            '</td>' +

            '<td>' +
            '</td>' +

            '</tr>'
        );


        $(".datepicker-table").datepicker("destroy");
        $(".datepicker-table").datepicker({
            format: 'yyyy-mm-dd'
        });

    })



    //assigne service
    //add service to list
    $('#add_service_id_btn').on('click', function () {



        let service_id = $('#service_modal_input_id').val();
        let message = $('#message_service__modal_textarea').val();

        data_service = getService(service_id);



        if (data_service[0].responsables[0] != null) {
            responsable_nom = data_service[0].responsables[0].nom;
        } else {
            responsable_nom = '';
        }

        $('.table-service-assigne tr:last').after(
            '<tr>' +

            '<td> <input type="hidden" name="service_input_id[]" value="' + data_service[0].id + '"/>' + data_service[0].nom + '</td>' +

            '<td> ' + data_service[0].ref + '</td>' +

            '<td> ' + responsable_nom + '</td>' +

            '<td> <input type="hidden" name="messages[]" value="' + message + '"/>' + message + '</td>' +

            '<td></td>' +
            '<td></td>' +

            '</tr>'

        );

        $("#assigne_service_modal").modal('toggle');
        $("#service_modal_input_id").children("option:selected").remove();
        $('#assigne_service_form_id').trigger("reset");
        item_service_number++;
    })
})
