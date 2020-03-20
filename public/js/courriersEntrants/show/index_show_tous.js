var courriersEntrantsTousTable;

$(document).ready(function () {
    courriersEntrantsTousTable = $(
        "#courriers_entrant_tous_datatables"
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
            //     text:
            //         '<i style="font-size:14px;" class="mdi mdi-file-pdf"></i>&nbspFichier PDF',
            //     init: function(api, node, config) {
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
            url: "courriers-entrants/tous",
            type: "GET",
            data: function (d) {
                d.nature_expediteur = $(
                    "select[name=nature_expediteur_tous]"
                ).val();
                d.expediteur = $("select[name=expediteur_tous]").val();
                d.services = $("select[name=services_concernes_tous]").val();
                d.mode_reception = $("select[name=mode_reception_tous]").val();
                d.priorite = $("select[name=priorite_tous]").val();
                d.categorie_courrier = $(
                    "select[name=categorie_courrier_tous]"
                ).val();
                d.date_reception = $(
                    "input[name=date_reception_tous_daterange]"
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
                width: "2%"
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
                width: "5%"
            },

            {
                data: "categorie",
                name: "categorie",
                searchable: false,
                width: "10%"
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
                width: "38%"
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
                width: "5%"
            },
            {
                data: "etat",
                name: "etat",
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

        //     $('#courriers_entrant_tous_datatables tbody tr').click(function () {

        //         // get position of the selected row
        //         var position = courriersEntrantsTousTable.fnGetPosition(this);

        //         // value of the first column (can be hidden)
        //         var id = courriersEntrantsTousTable.fnGetData(position).id

        //         // redirect
        //         document.location.href = 'courriers-entrants/' + id + '/edit'
        //     })

        // }
    });

    $(".tous-select").on("change paste keyup", function (e) {
        courriersEntrantsTousTable.draw();
        e.preventDefault();
    });
});