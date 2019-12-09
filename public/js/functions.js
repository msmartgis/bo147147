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
