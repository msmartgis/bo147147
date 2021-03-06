$(".tab-wizard").steps({
    headerTag: "h6",
    bodyTag: "section",
    transitionEffect: "none",
    titleTemplate: '<span class="step">#index#</span> #title#',
    labels: {
        finish: enregistrer
    },
    onFinished: function (event, currentIndex) {


        var $nonempty = $('.m-required-input').filter(function () {
            return this.value != ''
        });

        if ($nonempty.length == 0) {
            swal(
                "Veuillez vérifier les champs obligés",
                "Les champs obligés encadrés en rouge"
            );
        }


        $('.form-create').submit();
        $(this).$("a").removeAttr('href');
    }
});

var form = $(".validation-wizard").show();

$(".validation-wizard").steps({
    headerTag: "h6",
    bodyTag: "section",
    transitionEffect: "none",
    titleTemplate: '<span class="step">#index#</span> #title#',
    labels: {
        finish: "Submit"
    },
    onStepChanging: function (event, currentIndex, newIndex) {
        return (
            currentIndex > newIndex ||
            (!(3 === newIndex && Number($("#age-2").val()) < 18) &&
                (currentIndex < newIndex &&
                    (form
                        .find(".body:eq(" + newIndex + ") label.error")
                        .remove(),
                        form
                        .find(".body:eq(" + newIndex + ") .error")
                        .removeClass("error")),
                    (form.validate().settings.ignore = ":disabled,:hidden"),
                    form.valid()))
        );
    },
    onFinishing: function (event, currentIndex) {
        return (form.validate().settings.ignore = ":disabled"), form.valid();
    },
    onFinished: function (event, currentIndex) {
        swal(
            "Your Form Submitted!",
            "Sed dignissim lacinia nunc. Curabitur tortor. Pellentesque nibh. Aenean quam. In scelerisque sem at dolor. Maecenas mattis. Sed convallis tristique sem. Proin ut ligula vel nunc egestas porttitor."
        );
    }
});
