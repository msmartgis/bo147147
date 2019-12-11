function getModeReceptions() {
    var modes_receptions = null;
    $.ajax({
        async: false,
        global: false,
        url: "/modes-receptions/get-all-mode-reception",
        type: "GET",
        dataType: 'JSON',
        data: {},
        success: function (res) {
            modes_receptions = res;
        }
    });

    return modes_receptions;
}
