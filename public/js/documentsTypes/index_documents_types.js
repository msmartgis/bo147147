function getDocumentsTypes() {
    var documents_types = null;
    $.ajax({
        async: false,
        global: false,
        url: "/type-documents/get-all-documents-types",
        type: "GET",
        dataType: 'JSON',
        data: {},
        success: function (res) {
            documents_types = res;
        }
    });

    return documents_types;
}
