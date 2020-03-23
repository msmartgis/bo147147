$(document).ready(function () {

    var diffusionInterneTable;
    var checkedelementsDiffusionInterneBrouillon = [];


    diffusionInterneTable = $(
        "#diffusion_interne_datatables"
    ).DataTable({
        processing: true,
        serverSide: true,
        pageLength: 100,
        bInfo: false,
        info: false,
        bLengthChange: false,
        targets: "no-sort",
        bSort: false,
        order: [],

        dom: "lBfrtip",
        buttons: [{
                extend: "pdfHtml5",
                exportOptions: {
                    modifer: {
                        page: "all"
                    }
                },
                orientation: "landscape",
                title: "",
                text: '<i style="font-size:14px;" class="mdi mdi-file-pdf"></i>&nbspFichier PDF',
                init: function (api, node, config) {
                    $(node).removeClass("btn-secondary");
                    $(node).addClass("btn-success");
                }
            },
            {
                extend: "excel",
                exportOptions: {
                    modifer: {
                        page: "all"
                    }
                },
                orientation: "landscape",
                title: "",
                text: '<i style="font-size:14px;" class="mdi mdi-file-excel"></i>&nbspFichier Excel',
                init: function (api, node, config) {
                    $(node).removeClass("btn-secondary");
                    $(node).addClass("btn-success");
                }
            }
        ],

        language: {
            search: "",
            searchPlaceholder: "Recherche...",
            url: "/js/datatables_languages/" + full_language + ".json ",
            processing: '<img src="/images/loader/loader4.gif">'
        },

        ajax: {
            url: "diffusions-internes/tous",
            type: "GET",
            data: function (d) {
                d.date_envoi = $("select[name=date_envoi_daterange]").val();
                d.nature_diffusion = $("select[name=nature_diffusion]").val();
                d.responsable = $("select[name=responsable]").val();
                d.services = $("select[name=services_concernes]").val();
            }
        },
        columnDefs: [{
                width: 20,
                targets: 1
            },
            {
                width: 30,
                targets: 2
            },
            {
                width: 300,
                targets: 3
            }
        ],
        columns: [{
                data: "checkbox",
                name: "checkbox",
                searchable: true,
                width: "10%"
            },

            {
                data: "ref",
                name: "ref",
                searchable: true
            },



            {
                data: "objet",
                name: "courriers.objet",
                searchable: true,
                width: "30%"
            },

            {
                data: "objet",
                name: "courriers.objet",
                searchable: true,
                width: "30%"
            },




            {
                data: "pj",
                name: "pj",
                searchable: true,
                width: "10%"
            }

        ],
        initComplete: function () {
            this.api()
                .columns()
                .every(function () {
                    var column = this;
                    var input = document.createElement("input");
                    $(input)
                        .appendTo($(column.footer()).empty())
                        .on("change", function () {
                            column
                                .search($(this).val(), false, false, true)
                                .draw();
                        });
                });
        }

        // fnDrawCallback: function () {

        //     $('#courriers_entrant_brouillon_datatables tbody tr').click(function () {

        //         // get position of the selected row
        //         var position = courriersEntrantsTousTable.fnGetPosition(this);


        //         // value of the first column (can be hidden)
        //         var id = courriersEntrantsTousTable.fnGetData(position).id

        //         // redirect
        //         document.location.href = 'courriers-entrants/' + id + '/edit'
        //     })

        // }
    });

    $('#date_envoi_brouillon_input,#nature_diffusion_select_filter,#responsable_select_filter,#services_concernes_select_filter').on('change paste keyup', function (e) {
        diffusionInterneTable.draw();
        e.preventDefault();
    });


    diffusionInterneTable.on('draw', function () {
        for (i = 0; i < checkedelementsDiffusionInterneBrouillon.length; i++) {
            $(
                "#courriersEntrantBrouillon_" +
                checkedelementsDiffusionInterneBrouillon[i]
            ).prop("checked", true);
        }

        $('#courriers_entrant_brouillon_datatables :input[type="checkbox"]').change(
            function () {
                boxes = $(":checkbox:checked");

                if (this.checked) {
                    checkedelementsDiffusionInterneBrouillon.push($(this).val());
                } else {
                    checkedelementsDiffusionInterneBrouillon.splice(
                        checkedelementsDiffusionInterneBrouillon.indexOf($(this).val()),
                        1
                    );
                }

                //get the right button activated
                number_checked = checkedelementsDiffusionInterneBrouillon.length;

                if (number_checked === 0) {
                    $(".multiple-choice-brouillon").attr("disabled", true);
                }

                if (number_checked > 0) {
                    $(".multiple-choice-brouillon").removeAttr("disabled");
                }
            }
        );
        $('[data-toggle="tooltip"]').tooltip();
        $('[data-toggle="tooltip"]').tooltip();


    });



    $("#supprimer_diffusion_interne_btn").click(function () {
        //deleteFromDb(checkedelementsDiffusionInterneBrouillon, "/courriers/delete", "courriers_entrant_brouillon_datatables");
        deleteFromDb(
            checkedelementsDiffusionInterneBrouillon,
            "/diffusions-internes/delete",
            diffusionInterneTable
        );
    });

});