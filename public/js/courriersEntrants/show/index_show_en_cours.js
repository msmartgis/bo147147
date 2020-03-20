var courriersEntrantsEnCoursTable;
var checkedelementsCourrierEntrantEnCours = [];
var boxes;

$(document).ready(function () {
    courriersEntrantsEnCoursTable = $(
        "#courriers_entrant_en_cours_datatables"
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
            // {
            //     extend: "pdfHtml5",
            //     exportOptions: {
            //         modifer: {
            //             page: "all"
            //         }
            //     },
            //     orientation: "landscape",
            //     title: "",
            //     text: '<i style="font-size:14px;" class="mdi mdi-file-pdf"></i>&nbspFichier PDF',
            //     init: function (api, node, config) {
            //         $(node).removeClass("btn-secondary");
            //         $(node).addClass("btn-success");
            //     }
            // },
            {
                extend: "excel",
                exportOptions: {
                    modifer: {
                        page: "all"
                    },
                    columns: [2, 3, 4, 5, 6, 7, 9]
                },
                customize: function (xlsx) {
                    var sheet = xlsx.xl.worksheets['sheet1.xml'];
                    // jQuery selector to add a border
                    $('row c[r*="1"]', sheet).attr('s', '22');
                },
                orientation: "landscape",
                title: "",
                text: '<i style="font-size:14px;" class="mdi mdi-file-excel"></i>&nbsp Excel',
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
            url: "courriers-entrants/en-cours",
            type: "GET",
            data: function (d) {
                d.nature_expediteur = $(
                    "select[name=nature_expediteur_en_cours]"
                ).val();
                d.expediteur = $("select[name=expediteur_en_cours]").val();
                d.services = $(
                    "select[name=services_concernes_en_cours]"
                ).val();
                d.mode_reception = $(
                    "select[name=mode_reception_en_cours]"
                ).val();
                d.priorite = $("select[name=priorite_en_cours]").val();
                d.categorie_courrier = $(
                    "select[name=categorie_courrier_en_cours]"
                ).val();

                d.date_reception = $(
                    "input[name=date_reception_en_cours_daterange]"
                ).val();
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
                width: "3%"
            },
            {
                data: "priorite",
                name: "priorite",
                searchable: false,
                width: "5%"
            },

            {
                data: "ref",
                name: "ref",
                searchable: true,
                width: "10%"
            }, {
                data: "categorie",
                name: "categorie",
                searchable: false,
                width: "10%"
            }, {
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
                width: "28%"
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

        //     $('#courriers_entrant_en_cours_datatables tbody tr').click(function () {

        //         // get position of the selected row
        //         var position = courriersEntrantsTousTable.fnGetPosition(this);

        //         // value of the first column (can be hidden)
        //         var id = courriersEntrantsTousTable.fnGetData(position).id

        //         // redirect
        //         document.location.href = 'courriers-entrants/' + id + '/edit'
        //     })

        // }
    });

    $(".en-cours-select").on("change paste keyup", function (e) {
        courriersEntrantsEnCoursTable.draw();
        e.preventDefault();
    });

    courriersEntrantsEnCoursTable.on("draw", function () {
        for (i = 0; i < checkedelementsCourrierEntrantEnCours.length; i++) {
            $(
                "#courriersEntrantEnCours_" +
                checkedelementsCourrierEntrantEnCours[i]
            ).prop("checked", true);
        }

        $(
            '#courriers_entrant_en_cours_datatables :input[type="checkbox"]'
        ).change(function () {
            boxes = $(":checkbox:checked");

            if (this.checked) {
                checkedelementsCourrierEntrantEnCours.push($(this).val());
            } else {
                checkedelementsCourrierEntrantEnCours.splice(
                    checkedelementsCourrierEntrantEnCours.indexOf(
                        $(this).val()
                    ),
                    1
                );
            }

            //get the right button activated
            number_checked = checkedelementsCourrierEntrantEnCours.length;

            if (number_checked === 0) {
                $(".multiple-choice-en-cours").attr("disabled", true);
            }

            if (number_checked === 0 || number_checked > 1) {
                $(".unique-choice-en-cours").attr("disabled", true);
            } else {
                $(".unique-choice-en-cours").removeAttr("disabled");
            }

            if (number_checked > 0) {
                $(".multiple-choice-en-cours").removeAttr("disabled");
            }
        });
        $('[data-toggle="tooltip"]').tooltip();
    });

    //a traiter
    $("#cloturer_courrier_entrant_btn").click(function () {
        changeStateCourrier(checkedelementsCourrierEntrantEnCours, "cloturer");
    });

    //create sortant
    $("#create_courrier_sortant_en_cours_btn").click(function () {
        createOutputCourrierFromInput(
            checkedelementsCourrierEntrantEnCours,
            "sortant"
        );
    });
});