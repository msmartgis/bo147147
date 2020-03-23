$(document).ready(function () {
    var item_number = 0;

    $(".datepicker").datepicker({
        format: "yyyy-mm-dd"
    });

    //add document to list
    $("#add_piece_btn").on("click", function () {
        let item_number_piece = 0;

        $(".table-piece tr:last").after(
            "<tr>" +
            "<td>" +
            '<div class = "form-group"> ' +
            '<div class = "checkbox"> ' +
            '<input type="checkbox" id="row_' +
            item_number_piece +
            '"  name="record"> ' +
            '<input type="hidden"   name="records_input[]" value="' +
            item_number_piece +
            '"> ' +
            '<label for="row_' +
            item_number_piece +
            '"></label> ' +
            "</div>" +
            "</div>" +
            "</td>" +
            "<td> " +
            '<div class = "form-group"> ' +
            '<input type="text" class="form-control"  name="ref_piece_input[]" value="sans référence"> ' +
            "</div>" +
            "</td>" +
            "<td> " +
            '<div class = "form-group"> ' +
            '<input type="text" class="form-control"  name="intitules[]" value="document sans nom"> ' +
            "</div>" +
            "</td>" +
            "<td>" +
            '<div class="form-group">' +
            '<input type="file" data-max-size="2048" accept="image/png, image/jpeg,application/pdf" name="documents_ulpoad_input[]" class="form-control-file">' +
            "</div>" +
            "</td>" +
            "</tr>"
        );

        item_number_piece++;
        $(".datepicker-documents-table").datepicker("destroy");
        $(".datepicker-documents-table").datepicker({
            format: "yyyy-mm-dd"
        });
    });

    $("#delete_documents_row_btn").click(function () {
        removeRowFromTable("piece_courrier_tbody");
    });

    //add service to list
    $("#add_service_id_btn").on("click", function () {
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
            "<td> " +
            '<div class = "form-group"> ' +
            '<div class = "checkbox"> ' +
            '<input type="checkbox" id="row_' +
            item_number +
            '"  name="record"> ' +
            '<label for="row_' +
            item_number +
            '"></label> ' +
            "</div>" +
            "</div>" +
            "</td>" +
            '<td> <input type="hidden" name="services_ids[]" value="' +
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

    $("#delete_service_row_btn").click(function () {
        removeRowFromTable("service_assigne_tbody");
    });
})