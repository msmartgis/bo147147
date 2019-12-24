function removeRowFromTable(tableBody) {
    $('#' + tableBody).find('input[name="record"]').each(function () {
        if ($(this).is(":checked")) {
            $(this).parents("tr").remove();
        }
    });
}


var d = new Date();

var month = d.getMonth() + 1;
var day = d.getDate();

var actueDate =
    d.getFullYear() + '-' +
    (('' + month).length < 2 ? '0' : '') + month + '-' +
    (('' + day).length < 2 ? '0' : '') + day;


$('.activate-form-btn').on('click', function () {
    $(".form-edit :input").prop("disabled", false);
    $("button,a").removeClass("m-hidden");
    $("button").removeClass("disabled");
});


function delete_courrier(courrier_id) {
    swal({
        title: "Vous êtes sûr?",
        text: 'Voulez vous vraiment supprimer le courrier',
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Confirmer",
        cancelButtonText: "Non",
        closeOnConfirm: false,
        closeOnCancel: false
    }, function (isConfirm) {
        if (isConfirm) {

            $.ajax({
                url: 'courriers-entrants/' + courrier_id,
                type: 'DELETE',
                data: {
                    _token: $('meta[name="_token"]').attr('content'),
                },
                dataType: 'JSON',
                success: function (data) {

                    if (data.length == 0) {
                        swal("Réussi!", 'L\'opération a été effectuée avec succès', "success");
                        setTimeout(location.reload.bind(location), 500);
                    }
                }
            });

            if (delete_btn.closest('tr').remove()) {
                swal("Réussi!", 'L\'opération a été effectuée avec succès', "success");
            }

        } else {
            swal("L'operation est annulée", "Aucun changement a été éffectué", "error");
        }
    });
}
