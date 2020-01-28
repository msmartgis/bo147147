$(document).ready(function() {
    var item_number = 0;
    let item_number_piece = 0;
    let item_number_accuse_receptions = 0;

    var markup_select_option = "";

    $(".datepicker").datepicker({
        format: "yyyy-mm-dd"
    });

    $(function() {
        $("#type_destinataire_select_id").change(function() {
            $(".expediteur").hide();
            $("#" + $(this).val()).show();
        });
    });

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
                "<td>" +
                '<div class = "form-group"> ' +
                '<div class = "checkbox"> ' +
                '<input type="checkbox" id="row_piece_' +
                item_number_piece +
                '"  name="record"> ' +
                '<label for="row_piece_' +
                item_number_piece +
                '"></label> ' +
                "</div>" +
                "</div>" +
                "</td>" +
                "<td> " +
                '<div class = "form-group"> ' +
                '<select name="types_documents[]" class="form-control">' +
                markup_select_option_document_types +
                "</select>" +
                "</div>" +
                "</td>" +
                "<td> " +
                '<div class = "form-group"> ' +
                '<input type="text" class="form-control"  name="intitules[]" value="document sans nom"> ' +
                "</div>" +
                "</td>" +
                "<td> " +
                '<div class = "form-group"> ' +
                '<select name="modes_envoi[]" class="form-control">' +
                markup_select_option +
                "</select>" +
                "</div>" +
                "</td>" +
                "<td> " +
                '<div class = "form-group"> ' +
                '<input type="text" class="form-control datepicker-documents-table" value="' +
                actueDate +
                '"   name="date_envoi_doc_input[]"> ' +
                "</div>" +
                "</td>" +
                "<td>" +
                '<div class="form-group">' +
                '<input type="file" name="documents_ulpoad_input[]" class="form-control-file">' +
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

    $("#delete_documents_row_btn").click(function() {
        removeRowFromTable("piece_courrier_tbody");
    });

    //add accuse reception courrier entrants
    $("#add_accuse_reception_btn").on("click", function() {
        if (item_number_accuse_receptions < 3) {
            $(".table-accuse-reception tr:last").after(
                "<tr>" +
                    "<td>" +
                    '<div class = "form-group"> ' +
                    '<div class = "checkbox"> ' +
                    '<input type="checkbox" id="row_accuse_reception_' +
                    item_number_accuse_receptions +
                    '"  name="record"> ' +
                    '<label for="row_accuse_reception_' +
                    item_number_accuse_receptions +
                    '"></label> ' +
                    "</div>" +
                    "</div>" +
                    "</td>" +
                    "<td> " +
                    '<div class = "form-group"> ' +
                    '<input type="text" class="form-control datepicker-table" value="' +
                    actueDate +
                    '"   name="date_accuse_envoi[]"> ' +
                    "</div>" +
                    "</td>" +
                    "<td>" +
                    '<div class="form-group">' +
                    '<input type="file" name="accuse_envoi_uploads[]" class="form-control-file">' +
                    "</div>" +
                    "</td>" +
                    "</tr>"
            );
        }
        item_number_accuse_receptions++;

        $(".datepicker-table").datepicker("destroy");
        $(".datepicker-table").datepicker({
            format: "yyyy-mm-dd"
        });
    });

    $("#delete_accuse_rception_row_btn").click(function() {
        removeRowFromTable("acusse_reception_tbody");
    });

    //ajouter personne physique show div
    $("#ajouter_personne_physique_btn").on("click", function() {
        var isDisabled = $("#personne_physique_select_id").prop("disabled");
        $("#personne_physique_select_id").prop("disabled", !isDisabled);
        $("#ajouter_nouveau_personne_phisique_div").toggle();
    });

    $("#ajouter_personne_morale_btn").on("click", function() {
        var isDisabled = $("#personne_morale_select_id").prop("disabled");
        $("#personne_morale_select_id").prop("disabled", !isDisabled);
        $("#ajouter_nouveau_personne_morale_div").toggle();
    });
});
