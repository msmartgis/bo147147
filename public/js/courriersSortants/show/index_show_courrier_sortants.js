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
        },
        function (isConfirm) {
            if (isConfirm) {
                $.ajax({
                    url: "/courriers-sortants/valider",
                    type: "POST",
                    data: {
                        _token: $('meta[name="_token"]').attr("content"),
                        courriers_ids: el,
                        state: state
                    },
                    dataType: "JSON",
                    success: function (data) {
                        if (data.length == 0) {
                            swal(
                                "Réussi!",
                                "L'opération a été effectuée avec succès",
                                "success"
                            );
                            courriersSortantsBrouillonTable.ajax.reload();
                            courriersSortantsClotureTable.ajax.reload();
                            courriersSortantsEnCoursTable.ajax.reload();
                            courriersSortantsTousTable.ajax.reload();
                        }
                    }
                });
            } else {
                swal(m_annul_title, m_annul_subtitle, "error");
            }
        }
    );
}