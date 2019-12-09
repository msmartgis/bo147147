function getService(service_id, item_number, message) {
    $.ajax({
        url: "/services/get_service",
        type: "GET",
        dataType: 'JSON',
        data: {
            service_id: service_id
        },
        success: function (res) {

            //console.log(res[0].responsables[0].ref);

            $('.table-service-assigne tr:last').after(

                '<tr>' +

                '<td> ' +
                '<div class = "form-group"> ' +
                '<div class = "checkbox"> ' +
                '<input type="checkbox" id="row_' + item_number + '"  name="record"> ' +
                '<label for="row_' + item_number + '"></label> ' +
                '</div>' +
                '</div>' +
                '</td>' +


                '<td> <input type="hidden" name="services_ids[]" value="' + res[0].id + '"/>' + res[0].nom + '</td>' +
                '<td> ' + res[0].ref + '</td>' +
                '<td> ' + res[0].responsables[0].nom + '</td>' +
                '<td> <input type="hidden" name="messages[]" value="' + message + '"/>' + message + '</td>' +

                '</tr>'

            );

            $("#assigne_service_modal").modal('toggle');

        }
    });
}
