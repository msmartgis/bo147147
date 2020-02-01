$(document).ready(function() {
    var item_service_number = 0;

    //add document to list
    $("#add_piece_btn").on("click", function() {
        data_modes_receptions = getModeReceptions();
        data_documents_types = getDocumentsTypes();

        let i = 0;
        let item_document_type = 0;

        let markup_select_option = "";
        let markup_select_option_document_types = "";

        for (i = 0; i < data_modes_receptions.length; i++) {
            markup_select_option +=
                '<option value="' +
                data_modes_receptions[i].id +
                '">' +
                data_modes_receptions[i].nom +
                "</option>";
        }

        for (
            item_document_type = 0;
            item_document_type < data_documents_types.length;
            item_document_type++
        ) {
            markup_select_option_document_types +=
                '<option value="' +
                data_documents_types[item_document_type].id +
                '">' +
                data_documents_types[item_document_type].nom +
                "</option>";
        }

        $(".table-piece tr:last").after(
            "<tr>" +
                "<td> " +
                '<div class = "form-group"> ' +
                '<select name="types_documents_fournis[]" class="form-control">' +
                markup_select_option_document_types +
                "</select>" +
                "</div>" +
                "</td>" +
                "<td> " +
                '<div class = "form-group"> ' +
                '<input type="text"   name="intitules_documents_fournis[]" class="form-control" value="document sans nom"> ' +
                "</div>" +
                "</td>" +
                "<td> " +
                '<div class = "form-group"> ' +
                '<select name="modes_receptions_documents_fournis[]" class="form-control">' +
                markup_select_option +
                "</select>" +
                "</div>" +
                "</td>" +
                "<td> " +
                '<div class = "form-group"> ' +
                '<input type="text" class="form-control datepicker-documents-table" value="' +
                actueDate +
                '"   name="date_reception_documents_fournis[]"> ' +
                "</div>" +
                "</td>" +
                "<td>" +
                '<div class="form-group">' +
                '<input type="file" name="documents_ulpoad_documents_fournis[]" class="form-control-file">' +
                "</div>" +
                "</td>" +
                "</tr>"
        );

        $(".datepicker-documents-table").datepicker("destroy");
        $(".datepicker-documents-table").datepicker({
            format: "yyyy-mm-dd"
        });
    });

    //add accuse reception courrier entrants
    $("#add_accuse_reception_btn").on("click", function() {
        $(".table-accuse-reception tr:last").after(
            "<tr>" +
                "<td> " +
                '<div class = "form-group"> ' +
                '<input type="text" class="form-control datepicker-table" value="' +
                actueDate +
                '"   name="date_accuse_receptions[]"> ' +
                "</div>" +
                "</td>" +
                "<td>" +
                '<div class="form-group">' +
                '<input type="file" name="accuse_reception_uploads[]" class="form-control-file">' +
                "</div>" +
                "</td>" +
                "<td>" +
                "</td>" +
                "<td>" +
                "</td>" +
                "</tr>"
        );

        $(".datepicker-table").datepicker("destroy");
        $(".datepicker-table").datepicker({
            format: "yyyy-mm-dd"
        });
    });

    //assigne service
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
                "<td></td>" +
                "<td></td>" +
                "<td></td>" +
                "</tr>"
        );

        $("#assigne_service_modal").modal("toggle");
        $("#service_modal_input_id")
            .children("option:selected")
            .remove();
        $("#assigne_service_form_id").trigger("reset");
        item_service_number++;
    });

    //remarque et consigne
    $("#add_remarque_consigne_id_btn").on("click", function() {
        var consigne_number = $("#remarque_item_max_id").val();
        var user_id = $("#user_id_input").val();
        var message = $("#message_remarque_consigne_modal_textarea").val();
        user = getUser(user_id);

        console.log(user);

        $(".remarque-consigne-table tr:last").after(
            "<tr>" +
                "<td>" +
                consigne_number +
                "</td>" +
                '<td> <input type="hidden" name="consignes_added_message[]" value="' +
                message +
                '"/>' +
                message +
                "</td>" +
                "<td></td>" +
                "<td> " +
                user.nom +
                " " +
                user.prenom +
                "</td>" +
                "<td></td>" +
                "</tr>"
        );

        $("#remarque_consigne_modal").modal("toggle");
        $("#remarque_consigne_form_id").trigger("reset");
        consigne_number++;
    });

    $("#valider_courrier_entrant_btn").click(function() {
        var courrier_id_input_array = [];

        courrier_id_input_array.push($("#courrier_id_input").val());

        changeStateCourrier(
            courrier_id_input_array,
            "4eb0a1ba-a55e-40f0-bea1-bfc9b21cabc8"
        );
    });

    $("#cloture_courrier_edit_btn").click(function() {
        var courrier_id_input_array = [];

        courrier_id_input_array.push($("#courrier_id_input").val());
        changeStateCourrier(
            courrier_id_input_array,
            "bfe54fe8-fc87-4fec-aaf0-1cb5beacf858"
        );
    });

    $(".visualize-file-btn").click(function() {
        var path = $(this).data("path");
        var courrierID = $(this).data("courrierid");
        var folder = $(this).data("folder");
        var subfolder = $(this).data("subfolder");

        visualizeFile(folder, subfolder, courrierID, path);
    });

    function visualizeFile(folder, subfolder, courrierID, path) {
        var ext = path.split(".").pop();
        console.log(ext);

        var url =
            "/storage/" +
            folder +
            "/" +
            subfolder +
            "/" +
            courrierID +
            "/" +
            path +
            "";

        $("#fileView").empty();
        if (ext === "pdf") {
            $("#fileView").prepend(
                "<object data='" +
                    url +
                    "' type = 'application/pdf' width ='100%' height = '100%'>"
            );
        } else {
            $("#fileView").prepend(
                "<img src='" + url + "'  width ='100%' height = '100%'>"
            );
        }

        $("#visualize_modal").modal("show");
    }
});
