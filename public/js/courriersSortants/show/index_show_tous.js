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
            url: "http://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/" + full_language + ".json ",
            processing: '<img src="/images/loader/loader4.gif">'
        },

        ajax: {
            url: "courriers-sortants/tous",
            type: "GET",
            data: function (d) {
                d.nature_expediteur = $("select[name=nature_expediteur_tous]").val();
                d.expediteur = $("select[name=expediteur_tous]").val();
                d.services = $("select[name=services_concernes_tous]").val();
                d.mode_reception = $("select[name=mode_reception_tous]").val();
                d.date_reception = $("select[name=date_reception_tous_daterange]").val();
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

    $('#nature_expediteur_tous_select_filter,#expediteur_tous_select_filter,#services_concernes_tous_select_filter,#mode_reception_tous_select_filter,#date_reception_tous_input').on('change paste keyup', function (e) {
        courriersSortantsTousTable.draw();
        e.preventDefault();
    });
});
