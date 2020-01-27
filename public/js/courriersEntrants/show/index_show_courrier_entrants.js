function changeStateCourrier(el, state) {
    swal({
        title: title_validation,
        text: texte_validation,
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: m_confirmButtonText,
        cancelButtonText: m_cancelButtonText,
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
                        swal(m_reussi_title, m_reussi_subtitle, "success");
                        setTimeout(location.reload.bind(location), 500);
                    }
                }
            });
        } else {
            swal(m_annul_title, m_annul_subtitle, "error");
        }
    });

}


function createOutputCourrierFromInput(el, output_type) {
    swal({
        title: "Vous êtes sûr?",
        text: 'Voulez vous vraiment créer un courrier',
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Confirmer",
        cancelButtonText: "Non",
        closeOnConfirm: false,
        closeOnCancel: false
    }, function (isConfirm) {
        if (isConfirm) {
            if (output_type == "sortant") {
                window.location.replace("courriers-sortants/" + el + "/create-sortant");
            }

        } else {
            swal("L'operation est annulée", "Aucun changement a été éffectué", "error");
        }
    });

}
