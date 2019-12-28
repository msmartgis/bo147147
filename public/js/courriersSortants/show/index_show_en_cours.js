var courriersSortantsEnCoursTable;
var checkedelementsCourrierSortantEnCours = [];
var boxes;

$(document).ready(function () {
    courriersSortantsEnCoursTable = $(
        "#courriers_sortant_en_cours_datatables"
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
            url: "http://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json",
            processing: '<img src="/images/loader/loader4.gif">'
        },

        ajax: {
            url: "courriers-sortants/en-cours",
            type: "GET",
            data: function (d) {
                d.nature_expediteur = $("select[name=nature_expediteur_en_cours]").val();
                d.expediteur = $("select[name=expediteur_en_cours]").val();
                d.services = $("select[name=services_concernes_en_cours]").val();
                d.mode_reception = $("select[name=mode_reception_en_cours]").val();
                d.date_reception = $("select[name=date_reception_en_cours_daterange]").val();
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

        //     $('#courriers_sortant_en_cours_datatables tbody tr').click(function () {

        //         // get position of the selected row
        //         var position = courrierssortantsTousTable.fnGetPosition(this);


        //         // value of the first column (can be hidden)
        //         var id = courrierssortantsTousTable.fnGetData(position).id

        //         // redirect
        //         document.location.href = 'courriers-sortants/' + id + '/edit'
        //     })

        // }
    });

    $('#nature_expediteur_en_cours_select_filter,#expediteur_en_cours_select_filter,#services_concernes_en_cours_select_filter,#mode_reception_en_cours_select_filter,#date_reception_en_cours_input').on('change paste keyup', function (e) {
        courriersSortantsEnCoursTable.draw();
        e.preventDefault();
    });


    courriersSortantsEnCoursTable.on('draw', function () {
        for (i = 0; i < checkedelementsCourrierSortantEnCours.length; i++) {
            $("#courriersSortantEnCours_" + checkedelementsCourrierSortantEnCours[i]).prop('checked', true);
        }

        $('#courriers_sortant_en_cours_datatables :input[type="checkbox"]').change(function () {

            boxes = $(":checkbox:checked");

            if (this.checked) {
                checkedelementsCourrierSortantEnCours.push($(this).val());
            } else {
                checkedelementsCourrierSortantEnCours.splice(checkedelementsCourrierSortantEnCours.indexOf($(this).val()), 1);
            }


            //get the right button activated
            number_checked = checkedelementsCourrierSortantEnCours.length;


            if (number_checked === 0) {
                $('.multiple-choice-en-cours').attr('disabled', true);
            }

            if (number_checked > 0) {
                $('.multiple-choice-en-cours').removeAttr("disabled");
            }

        });
        $('[data-toggle="tooltip"]').tooltip();

    });

    //a traiter
    $("#cloturer_courrier_sortant_btn").click(function () {
        changeStateCourrier(checkedelementsCourrierSortantEnCours, 'bfe54fe8-fc87-4fec-aaf0-1cb5beacf858');
    });

});
