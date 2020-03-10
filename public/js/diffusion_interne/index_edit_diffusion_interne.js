$(document).ready(function() {
    var item_number = 0;

    //add document to list
    $("#add_piece_btn").on("click", function() {
        data_modes_receptions = getModeReceptions();
        data_documents_types = getDocumentsTypes();

        let i = 0;
        let item_document_type = 0;

        let markup_select_option = "";
        let markup_select_option_document_types = "";

        $(".table-piece tr:last").after(
            "<tr>" +
                "<td> " +
                '<div class = "form-group"> ' +
                '<input type="text"   name="ref_documents[]" class="form-control" value="sans reference"> ' +
                "</div>" +
                "</td>" +
                "<td> " +
                '<div class = "form-group"> ' +
                '<input type="text"   name="intitules_documents_fournis[]" class="form-control" value="document sans nom"> ' +
                "</div>" +
                "</td>" +
                "<td>" +
                '<div class="form-group">' +
                '<input type="file" name="documents_ulpoad_documents_fournis[]" class="form-control-file">' +
                "</div>" +
                "</td>" +
                "</tr>"
        );
    });

    //add service to list
    $("#add_service_id_btn").on("click", function() {
        let service_id = $("#service_modal_input_id").val();
        let message = $("#message_service__modal_textarea").val();

        data_service = getService(service_id);

        if (data_service[0].responsables[0] != null) {
            responsable_nom = data_service[0].responsables[0].nom;
        } else {
            responsable_nom = "";
        }

        $(".table-service-assigne tr:last").after(
            "<tr>" +
                '<td> <input type="hidden" name="service_input_id[]" value="' +
                data_service[0].id +
                '"/>' +
                data_service[0].nom +
                "</td>" +
                "<td> " +
                data_service[0].ref +
                "</td>" +
                "<td> " +
                responsable_nom +
                "</td>" +
                '<td> <input type="hidden" name="messages[]" value="' +
                message +
                '"/>' +
                message +
                "</td>" +
                "</tr>"
        );

        $("#assigne_service_modal").modal("toggle");

        $("#assigne_service_form_id").trigger("reset");
        item_number++;
    });

    $("#delete_service_row_btn").click(function() {
        removeRowFromTable("service_assigne_tbody");
    });
});
