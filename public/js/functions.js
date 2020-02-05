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
            "<img src='" + url + "'  width ='100%' >"
        );
    }

    $("#visualize_modal").modal("show");
}
