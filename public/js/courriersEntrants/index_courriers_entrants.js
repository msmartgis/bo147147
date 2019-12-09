$(document).ready(function () {
    var item_number = 0;
    let item_number_piece = 0;
    let item_number_accuse_receptions = 0;


    $('.datepicker').datepicker({
        format: 'yyyy-mm-dd'
    });



    $(function () {
        $('#type_expediteur_select_id').change(function () {
            $('.expediteur').hide();
            $('#' + $(this).val()).show();
        });
    });


    //add service to list
    $('#add_service_id_btn').on('click', function () {

        let service_id = $('#service_modal_input_id').val();
        let message = $('#message_service__modal_textarea').val();

        getService(service_id, item_number, message);

        $('#assigne_service_form_id').trigger("reset");
        item_number++;
    })


    $("#delete_service_row_btn").click(function () {
        removeRowFromTable('service_assigne_tbody');
    });



    //add document to list
    $('#add_piece_btn').on('click', function () {
        $.ajax({
            url: "/modes-receptions/get-all-mode-reception",
            type: "GET",
            dataType: 'JSON',
            data: {},
            success: function (res) {
                let i = 0;
                let markup_select_option = '';

                for (i = 0; i < res.length; i++) {
                    markup_select_option += '<option value="' + res[i].id + '">' + res[i].nom + '</option>'
                }


                $('.table-piece tr:last').after(

                    '<tr>' +

                    '<td>' +
                    '<div class = "form-group"> ' +
                    '<div class = "checkbox"> ' +
                    '<input type="checkbox" id="row_' + item_number_piece + '"  name="record"> ' +
                    '<label for="row_' + item_number_piece + '"></label> ' +
                    '</div>' +
                    '</div>' +
                    '</td>' +

                    '<td> ' +
                    '<div class = "form-group"> ' +
                    '<input type="text"   name="types_documents[]"> ' +
                    '</div>' +
                    '</td>' +


                    '<td> ' +
                    '<div class = "form-group"> ' +
                    '<input type="text"   name="intitules[]"> ' +
                    '</div>' +
                    '</td>' +

                    '<td> ' +
                    '<div class = "form-group"> ' +
                    '<select name="modes_receptions[]" class="form-control">' + markup_select_option +
                    '</select>' +
                    '</div>' +
                    '</td>' +

                    '<td>' +
                    '<label class="btn btn-default">' +
                    '<i class="fa fa-upload" style="margin-right:4px !important"></i>Ajouter un fichier  <input type="file" name="documents_uploads[]" hidden>' +
                    '</label>' +
                    '</td>' +

                    '</tr>'

                );

                item_number_piece++;
            }
        });

    })


    //add accuse reception courrier entrants
    $('#add_accuse_reception_btn').on('click', function () {
        if (item_number_accuse_receptions < 3) {
            $('.table-accuse-reception tr:last').after(

                '<tr>' +

                '<td>' +
                '<div class = "form-group"> ' +
                '<div class = "checkbox"> ' +
                '<input type="checkbox" id="row_' + item_number_accuse_receptions + '"  name="record"> ' +
                '<label for="row_' + item_number_accuse_receptions + '"></label> ' +
                '</div>' +
                '</div>' +
                '</td>' +

                '<td> ' +
                '<div class = "form-group"> ' +
                '<input type="text" class="form-control datepicker-table" value="' + actueDate + '"   name="date_accuse_receptions[]"> ' +
                '</div>' +
                '</td>' +


                '<td>' +
                '<label class="btn btn-default">' +
                '<i class="fa fa-upload" style="margin-right:4px !important"></i>Ajouter un fichier  <input type="file" name="accuse_reception_uploads[]" hidden>' +
                '</label>' +
                '</td>' +

                '</tr>'

            );

        }
        item_number_accuse_receptions++;


        $(".datepicker-table").datepicker("destroy");
        $(".datepicker-table").datepicker({
            dateFormat: "yyyy-mm-dd'"
        });


    })


    $("#delete_accuse_rception_row_btn").click(function () {
        removeRowFromTable('acusse_reception_tbody');
    });


    //ajouter personne physique show div
    $('#ajouter_personne_physique_btn').on('click', function () {
        var isDisabled = $('#personne_physique_select_id').prop('disabled');
        $("#personne_physique_select_id").prop('disabled', !isDisabled);
        $("#ajouter_nouveau_personne_phisique_div").toggle();
    })


    $('#ajouter_personne_morale_btn').on('click', function () {
        var isDisabled = $('#personne_morale_select_id').prop('disabled');
        $("#personne_morale_select_id").prop('disabled', !isDisabled);
        $("#ajouter_nouveau_personne_morale_div").toggle();
    })
})
