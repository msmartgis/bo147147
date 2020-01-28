var courriersEntrantsClotureTable;
var checkedelementsCourrierEntrantCloture = [];
var boxes;

$(document).ready(function() {
    courriersEntrantsClotureTable = $(
        "#courriers_entrant_cloture_datatables"
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
        buttons: [
            {
                extend: "pdfHtml5",
                exportOptions: {
                    modifer: {
                        page: "all"
                    }
                },
                orientation: "landscape",
                title: "",
                text:
                    '<i style="font-size:14px;" class="mdi mdi-file-pdf"></i>&nbspFichier PDF',
                init: function(api, node, config) {
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
                text:
                    '<i style="font-size:14px;" class="mdi mdi-file-excel"></i>&nbspFichier Excel',
                init: function(api, node, config) {
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
            url: "courriers-entrants/cloture",
            type: "GET",
            data: function(d) {
                d.nature_expediteur = $(
                    "select[name=nature_expediteur_cloture]"
                ).val();
                d.expediteur = $("select[name=expediteur_cloture]").val();
                d.services = $("select[name=services_concernes_cloture]").val();
                d.mode_reception = $(
                    "select[name=mode_reception_cloture]"
                ).val();
                d.priorite = $("select[name=priorite_cloture]").val();
                d.date_reception = $(
                    "select[name=date_reception_cloture_daterange]"
                ).val();
            }
        },
        columnDefs: [
            {
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
        columns: [
            {
                data: "checkbox",
                name: "checkbox",
                searchable: true,
                width: "10%"
            },
            {
                data: "priorite",
                name: "priorite",
                searchable: false
            },

            {
                data: "ref",
                name: "ref",
                searchable: true
            },
            {
                data: "categorie",
                name: "categorie",
                searchable: false
            },
            {
                data: "date_reception",
                name: "courriers.date_reception",
                searchable: true,
                width: "10%"
            },

            {
                data: "expediteur",
                name: "expediteur",
                searchable: true,
                width: "10%"
            },

            {
                data: "objet",
                name: "courriers.objet",
                searchable: true,
                width: "30%"
            },

            {
                data: "delai",
                name: "courriers.delai",
                searchable: true,
                width: "10%"
            },

            {
                data: "pj",
                name: "pj",
                searchable: true,
                width: "10%"
            },
            {
                data: "courrier_sortant",
                name: "courrier_sortant",
                searchable: true,
                width: "8%"
            }
        ],
        initComplete: function() {
            this.api()
                .columns()
                .every(function() {
                    var column = this;
                    var input = document.createElement("input");
                    $(input)
                        .appendTo($(column.footer()).empty())
                        .on("change", function() {
                            column
                                .search($(this).val(), false, false, true)
                                .draw();
                        });
                });
        }

        // fnDrawCallback: function () {

        //     $('#courriers_entrant_cloture_datatables tbody tr').click(function () {

        //         // get position of the selected row
        //         var position = courriersEntrantsTousTable.fnGetPosition(this);

        //         // value of the first column (can be hidden)
        //         var id = courriersEntrantsTousTable.fnGetData(position).id

        //         // redirect
        //         document.location.href = 'courriers-entrants/' + id + '/edit'
        //     })

        // }
    });

    $(
        "#nature_expediteur_cloture_select_filter,#expediteur_cloture_select_filter,#services_concernes_cloture_select_filter,#mode_reception_cloture_select_filter,#priorite_cloture_select_filter,#date_reception_cloture_input"
    ).on("change paste keyup", function(e) {
        courriersEntrantsClotureTable.draw();
        e.preventDefault();
    });

    courriersEntrantsClotureTable.on("draw", function() {
        $('[data-toggle="tooltip"]').tooltip();
    });

    courriersEntrantsClotureTable.on("draw", function() {
        for (i = 0; i < checkedelementsCourrierEntrantCloture.length; i++) {
            $(
                "#courriersEntrantCloture_" +
                    checkedelementsCourrierEntrantCloture[i]
            ).prop("checked", true);
        }

        $(
            '#courriers_entrant_cloture_datatables :input[type="checkbox"]'
        ).change(function() {
            boxes = $(":checkbox:checked");

            if (this.checked) {
                checkedelementsCourrierEntrantCloture.push($(this).val());
            } else {
                checkedelementsCourrierEntrantCloture.splice(
                    checkedelementsCourrierEntrantCloture.indexOf(
                        $(this).val()
                    ),
                    1
                );
            }

            //get the right button activated
            number_checked = checkedelementsCourrierEntrantCloture.length;

            if (number_checked === 0 || number_checked > 1) {
                $(".unique-choice-cloture").attr("disabled", true);
            } else {
                $(".unique-choice-cloture").removeAttr("disabled");
            }
        });
        $('[data-toggle="tooltip"]').tooltip();
    });

    //create sortant
    $("#create_courrier_sortant_cloture_btn").click(function() {
        createOutputCourrierFromInput(
            checkedelementsCourrierEntrantCloture,
            "sortant"
        );
    });
});
