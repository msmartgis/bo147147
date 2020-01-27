var delete_btn;


$('.delete-row').on('click', function () {
    delete_btn = $(this);
    swal({
        title: "Vous êtes sûr?",
        text: 'Voulez vous vraiment supprimer cette ligne',
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Confirmer",
        cancelButtonText: "Non",
        closeOnConfirm: false,
        closeOnCancel: false
    }, function (isConfirm) {
        if (isConfirm) {

            delete_btn.closest('tr').remove();
            if (delete_btn.closest('tr').remove()) {
                swal("Réussi!", 'L\'opération a été effectuée avec succès', "success");
            }

        } else {
            swal("L'operation est annulée", "Aucun changement a été éffectué", "error");
        }
    });
})


function removeRowFromTable(tableBody) {
    $("#" + tableBody)
        .find('input[name="record"]')
        .each(function () {
            if ($(this).is(":checked")) {
                $(this)
                    .parents("tr")
                    .remove();
            }
        });
}

var d = new Date();

var month = d.getMonth() + 1;
var day = d.getDate();

var actueDate =
    d.getFullYear() +
    "-" +
    (("" + month).length < 2 ? "0" : "") +
    month +
    "-" +
    (("" + day).length < 2 ? "0" : "") +
    day;

$(".activate-form-btn").on("click", function () {
    $(".form-edit :input").prop("disabled", false);
    $("button,a").removeClass("m-hidden");
    $("button").removeClass("disabled");
});

$("#delete_form").on("submit", function (e) {
    e.preventDefault();
    swal({
            title: "Vous êtes sûr?",
            text: "Voulez vous vraiment supprimer le courrier",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Confirmer",
            cancelButtonText: "Non",
            closeOnConfirm: false,
            closeOnCancel: false
        },
        function (isConfirm) {
            if (isConfirm) {
                $("#delete_form")
                    .unbind("submit")
                    .submit();
                swal(
                    "Réussi!",
                    "L'opération a été effectuée avec succès",
                    "success"
                );
            } else {
                swal(
                    "L'operation est annulée",
                    "Aucun changement a été éffectué",
                    "error"
                );
            }
        }
    );
});

if ($(".alert-success").length > 0) {
    setTimeout(function () {
        $.toast({
            heading: "notification",
            text: $(".alert-success")[0].innerText,
            position: "bottom-left",
            loader: false,
            showHideTransition: "slide",
            icon: "success",
            hideAfter: 5000,
            stack: 10
        });
    }, 1000);
}
