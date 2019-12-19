function changeStateCourrier(el, state) {
    swal({
        title: "Vous êtes sûr?",
        text: 'Validation des courriers',
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
                url: '/courriers/valider',
                type: 'POST',
                data: {
                    _token: $('meta[name="_token"]').attr('content'),
                    courriers_ids: el,
                    state: state
                },
                dataType: 'JSON',
                success: function (data) {

                    if (data.length == 0) {
                        swal("Réussi!", 'L\'opération a été effectuée avec succès', "success");
                        setTimeout(location.reload.bind(location), 500);
                    }
                }
            });
        } else {
            swal("L'operation est annulée", "Aucun changement a été éffectué", "error");
        }
    });


}
