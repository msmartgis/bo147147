var delete_btn;

$(".delete-row").on("click", function () {
    delete_btn = $(this);
    swal({
            title: title_validation,
            text: "",
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
                delete_btn.closest("tr").remove();
                if (delete_btn.closest("tr").remove()) {
                    swal(m_reussi_title, m_reussi_subtitle, "success");
                }
            } else {
                swal(m_annul_title, m_annul_subtitle, "error");
            }
        }
    );
});

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
            title: title_validation,
            text: "",
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
                $("#delete_form")
                    .unbind("submit")
                    .submit();
                swal(m_reussi_title, m_reussi_subtitle, "success");
            } else {
                swal(m_annul_title, m_annul_subtitle, "error");
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

$(".visualize-file-btn").click(function () {
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
        "/storage/" + folder + "/" + subfolder + "/" + courrierID + "/" + path + "";

    $("#fileView").empty();
    if (ext === "pdf") {
        $("#fileView").prepend(
            "<object data='" +
            url +
            "' type = 'application/pdf' width ='100%' height = '100%'>"
        );
    } else {
        $("#fileView").prepend("<img src='" + url + "'  width ='100%' >");
    }

    $("#visualize_modal").modal("show");
}

//SETTING DATA
function getElementData(route, model, id) {
    $.ajax({
        url: route,
        type: "GET",
        data: {
            _token: $('meta[name="_token"]').attr("content"),
            model: model,
            id: id
        },
        dataType: "JSON",
        success: function (data) {
            console.log(data);
        }
    });
}



function deleteFromDb(ids, url, datatable) {
    if (
        ids.length > 0) {
        swal({
            title: title_validation,
            text: texte_validation_delete,
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
                    url: url,
                    type: 'get',
                    data: {
                        _token: $('meta[name="_token"]').attr('content'),
                        ids: ids,
                    },
                    dataType: 'JSON',
                    success: function (data) {
                        if (data == "success") {
                            swal(m_reussi_title, m_reussi_subtitle, "success");
                            datatable.ajax.reload();
                        } else {
                            swal("Erreur", "erreur", "error");
                        }
                    }
                });
            } else {
                swal(m_annul_title, m_annul_subtitle, "error");
            }
        });
    } else {
        setTimeout(function () {
            $.toast({
                heading: "notification",
                text: innerTextDelete,
                position: "bottom-left",
                loader: false,
                showHideTransition: "slide",
                icon: "error",
                hideAfter: 5000,
                stack: 10
            });
        }, 1000);
    }


}