$(document).ready(function () {
    var item_number = 0;
    var diffusionInterneTable;


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
        // for (i = 0; i < checkedelementsCourrierEntrantBrouillon.length; i++) {
        //     $("#courriersEntrantBrouillon_" + checkedelementsCourrierEntrantBrouillon[i]).prop('checked', true);
        // }

        // $('#courriers_entrant_brouillon_datatables :input[type="checkbox"]').change(function () {

        //     boxes = $(":checkbox:checked");

        //     if (this.checked) {
        //         checkedelementsCourrierEntrantBrouillon.push($(this).val());
        //     } else {
        //         checkedelementsCourrierEntrantBrouillon.splice(checkedelementsCourrierEntrantBrouillon.indexOf($(this).val()), 1);
        //     }


        //     //get the right button activated
        //     number_checked = checkedelementsCourrierEntrantBrouillon.length;


        //     if (number_checked === 0) {
        //         $('.multiple-choice-brouillon').attr('disabled', true);
        //     }

        //     if (number_checked > 0) {
        //         $('.multiple-choice-brouillon').removeAttr("disabled");
        //     }

        // });
        $('[data-toggle="tooltip"]').tooltip();


    });






    $(".datepicker").datepicker({
        format: "yyyy-mm-dd"
    });

    //add document to list
    $("#add_piece_btn").on("click", function () {
        let item_number_piece = 0;

        $(".table-piece tr:last").after(
            "<tr>" +
            "<td>" +
            '<div class = "form-group"> ' +
            '<div class = "checkbox"> ' +
            '<input type="checkbox" id="row_' +
            item_number_piece +
            '"  name="record"> ' +
            '<input type="hidden"   name="records_input[]" value="' +
            item_number_piece +
            '"> ' +
            '<label for="row_' +
            item_number_piece +
            '"></label> ' +
            "</div>" +
            "</div>" +
            "</td>" +
            "<td> " +
            '<div class = "form-group"> ' +
            '<input type="text" class="form-control"  name="ref_piece_input[]" value="sans référence"> ' +
            "</div>" +
            "</td>" +
            "<td> " +
            '<div class = "form-group"> ' +
            '<input type="text" class="form-control"  name="intitules[]" value="document sans nom"> ' +
            "</div>" +
            "</td>" +
            "<td>" +
            '<div class="form-group">' +
            '<input type="file" name="documents_ulpoad_input[]" class="form-control-file">' +
            "</div>" +
            "</td>" +
            "</tr>"
        );

        item_number_piece++;
        $(".datepicker-documents-table").datepicker("destroy");
        $(".datepicker-documents-table").datepicker({
            format: "yyyy-mm-dd"
        });
    });

    $("#delete_documents_row_btn").click(function () {
        removeRowFromTable("piece_courrier_tbody");
    });

    //add service to list
    $("#add_service_id_btn").on("click", function () {
        let service_id = $("#service_modal_input_id").val();
        let message = $("#message_service__modal_textarea").val();

        data_service = getService(service_id);

        if (data_service[0].responsables[0] != null) {
            responsable_nom = data_service[0].responsables[0].nom;
        } else {
            responsable_nom = "";
        }

        $(".table-service-assigne tr:last").after(
            "<tr>" +
            "<td> " +
            '<div class = "form-group"> ' +
            '<div class = "checkbox"> ' +
            '<input type="checkbox" id="row_' +
            item_number +
            '"  name="record"> ' +
            '<label for="row_' +
            item_number +
            '"></label> ' +
            "</div>" +
            "</div>" +
            "</td>" +
            '<td> <input type="hidden" name="services_ids[]" value="' +
            data_service[0].id +
            '"/>' +
            data_service[0].nom +
            "</td>" +
            "<td> " +
            data_service[0].ref +
            "</td>" +
            "<td> " +
            responsable_nom +
            "</td>" +
            '<td> <input type="hidden" name="messages[]" value="' +
            message +
            '"/>' +
            message +
            "</td>" +
            "</tr>"
        );

        $("#assigne_service_modal").modal("toggle");

        $("#assigne_service_form_id").trigger("reset");
        item_number++;
    });

    $("#delete_service_row_btn").click(function () {
        removeRowFromTable("service_assigne_tbody");
    });
});
