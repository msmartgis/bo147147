var courriersSortantsTousTable;

$(document).ready(function () {
    courriersSortantsTousTable = $(
        "#courriers_sortant_tous_datatables"
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
                extend: "excel",
                exportOptions: {
                    modifer: {
                        page: "all"
                    }
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
            url: "courriers-sortants/tous",
            type: "GET",
            data: function (d) {
                d.nature_expediteur = $(
                    "select[name=nature_expediteur_tous]"
                ).val();
                d.expediteur = $("select[name=expediteur_tous]").val();
                d.services = $("select[name=services_concernes_tous]").val();
                d.mode_reception = $("select[name=mode_reception_tous]").val();
                d.categorie_courrier = $(
                    "select[name=categorie_courrier_tous]"
                ).val();
                d.date_envoie = $(
                    "input[name=date_envoie_tous_daterange]"
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
                data: "ref",
                name: "ref",
                searchable: true,
                width: "10%"
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
                data: "etat",
                name: "etat",
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

        //     $('#courriers_sortant_tous_datatables tbody tr').click(function () {

        //         // get position of the selected row
        //         var position = courrierssortantsTousTable.fnGetPosition(this);

        //         // value of the first column (can be hidden)
        //         var id = courrierssortantsTousTable.fnGetData(position).id

        //         // redirect
        //         document.location.href = 'courriers-sortants/' + id + '/edit'
        //     })

        // }
    });

    $(".tous-select").on("change paste keyup", function (e) {
        courriersSortantsTousTable.draw();
        e.preventDefault();
    });
});