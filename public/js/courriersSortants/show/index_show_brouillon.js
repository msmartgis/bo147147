var courriersSortantsBrouillonTable;
var checkedelementsCourrierSortantBrouillon = [];
var boxes;

$(document).ready(function() {
    courriersSortantsBrouillonTable = $(
        "#courriers_sortant_brouillon_datatables"
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
            url: "courriers-sortants/brouillon",
            type: "GET",
            data: function(d) {
                d.nature_expediteur = $(
                    "select[name=nature_expediteur_brouillon]"
                ).val();
                d.expediteur = $("select[name=expediteur_brouillon]").val();
                d.services = $(
                    "select[name=services_concernes_brouillon]"
                ).val();
                d.mode_reception = $(
                    "select[name=mode_reception_brouillon]"
                ).val();

                d.categorie_courrier = $(
                    "select[name=categorie_courrier_brouillon]"
                ).val();

                d.date_reception = $(
                    "select[name=date_reception_brouillon_daterange]"
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
                data: "date_envoie",
                name: "courriers.date_envoie",
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
                data: "pj",
                name: "pj",
                searchable: true,
                width: "10%"
            },
            {
                data: "courrier_entrant",
                name: "courrier_entrant",
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

    $(".brouillon-select").on("change paste keyup", function(e) {
        courriersSortantsBrouillonTable.draw();
        e.preventDefault();
    });

    courriersSortantsBrouillonTable.on("draw", function() {
        for (i = 0; i < checkedelementsCourrierSortantBrouillon.length; i++) {
            $(
                "#courriersSortantBrouillon_" +
                    checkedelementsCourrierSortantBrouillon[i]
            ).prop("checked", true);
        }

        $(
            '#courriers_sortant_brouillon_datatables :input[type="checkbox"]'
        ).change(function() {
            boxes = $(":checkbox:checked");

            if (this.checked) {
                checkedelementsCourrierSortantBrouillon.push($(this).val());
            } else {
                checkedelementsCourrierSortantBrouillon.splice(
                    checkedelementsCourrierSortantBrouillon.indexOf(
                        $(this).val()
                    ),
                    1
                );
            }

            //get the right button activated
            number_checked = checkedelementsCourrierSortantBrouillon.length;

            if (number_checked === 0) {
                $(".multiple-choice-brouillon").attr("disabled", true);
            }

            if (number_checked > 0) {
                $(".multiple-choice-brouillon").removeAttr("disabled");
            }
        });
        $('[data-toggle="tooltip"]').tooltip();
    });

    //a traiter
    $("#valider_courrier_sortant_btn").click(function() {
        changeStateCourrier(
            checkedelementsCourrierSortantBrouillon,
            "en_cours"
        );
    });
});
