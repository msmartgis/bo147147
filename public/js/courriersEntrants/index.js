$(document).ready(function () {
    $(function () {
        $('#type_expediteur_select_id').change(function () {
            $('.expediteur').hide();
            $('#' + $(this).val()).show();
        });
    });

})
