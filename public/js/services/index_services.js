function getService(service_id) {
    var services = null;

    $.ajax({
        async: false,
        global: false,
        url: "/services/get_service",
        type: "GET",
        dataType: 'JSON',
        data: {
            service_id: service_id
        },
        success: function (res) {
            services = res;

            //console.log(res[0].responsables[0].ref);
            // let responsable_nom;
            // if (res[0].responsables[0] != null) {
            //     responsable_nom = res[0].responsables[0].nom;
            // } else {
            //     responsable_nom = '';
            // }

            // $('.table-service-assigne tr:last').after(

            //     '<tr>' +

            //     '<td> ' +
            //     '<div class = "form-group"> ' +
            //     '<div class = "checkbox"> ' +
            //     '<input type="checkbox" id="row_' + item_number + '"  name="record"> ' +
            //     '<label for="row_' + item_number + '"></label> ' +
            //     '</div>' +
            //     '</div>' +
            //     '</td>' +


            //     '<td> <input type="hidden" name="services_ids[]" value="' + res[0].id + '"/>' + res[0].nom + '</td>' +
            //     '<td> ' + res[0].ref + '</td>' +
            //     '<td> ' + responsable_nom + '</td>' +
            //     '<td> <input type="hidden" name="messages[]" value="' + message + '"/>' + message + '</td>' +

            //     '</tr>'

            // );

            // $("#assigne_service_modal").modal('toggle');

        }
    });

    return services;
}
