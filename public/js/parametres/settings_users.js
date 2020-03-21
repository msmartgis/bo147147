var usersTable;
$(document).ready(function () {
    // USERS
    usersTable = $('#users_datatables').DataTable({
        processing: true,
        serverSide: true,
        pageLength: 10,
        bInfo: false,
        info: false,
        searching: false,
        bLengthChange: false,
        language: {
            url: 'http://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json',
            processing: '<img src="/images/loader/loader4.gif">'
        },

        ajax: {
            url: 'settings/users',
            type: 'GET',

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
                data: 'nom',
                name: 'users.nom',
                orderable: false,
                searchable: false
            },
            {
                data: 'prenom',
                name: 'users.prenom',
                orderable: false,
                searchable: false
            },
            {
                data: 'username',
                name: 'users.username',
                orderable: false,
                searchable: false
            },
            {
                data: 'service',
                name: 'service',
                orderable: false,
                searchable: false
            },
            {
                data: 'actions',
                name: 'actions',
                orderable: false,
                searchable: false
            }
        ],
        initComplete: function () {
            this.api().columns().every(function () {
                var column = this;
                var input = document.createElement("input");
                $(input).appendTo($(column.footer()).empty())
                    .on('change', function () {
                        column.search($(this).val(), false, false, true).draw();
                    });
            });
        }

    });


    usersTable.on('draw', function () {
        // $(".delete-user-btn").click(function () {
        //     var btn_id = this.id;
        //     var id = btn_id.split('_')[1];
        //     var route = '/user/delete';
        //     deleteElement(route, id);
        // });


        // $(".edit-setting-btn").click(function () {

        //     // var btn_id = this.id;
        //     // var id = btn_id.split('_')[1];
        //     // var route = '/settings/elementData/' + id;
        //     // var model = 'user';
        //     // var modalTitle = 'Modifier L\'utilisateur';
        //     // getElementData(route, model, modalTitle);
        // });


        $("#modal_submit_user").click(function () {
            $('.user-form').submit();
        });
    });



    //password confimation
    $('#pasword_inpt, #confirm_pasword_inpt').on('keyup', function () {
        if ($('#pasword_inpt').val() == $('#confirm_pasword_inpt').val()) {
            $('#message_password_confirmation').html('Identiques').css('color', 'green');
        } else
        if ($('#confirm_pasword_inpt').val() != '') {
            $('#message_password_confirmation').html('Non identiques').css('color', 'red');
        }

    });



    $('#add_user_btn').on('click', function () {
        if ($('#pasword_inpt').val() == $('#confirm_pasword_inpt').val() && ($('#pasword_inpt').val() != '' && $('#confirm_pasword_inpt').val() != '')) {
            $('#users_form').submit();
        } else {
            setTimeout(function () {
                $.toast({
                    heading: "notification",
                    text: 'Veuillez verifier les données saisies',
                    position: "bottom-left",
                    loader: false,
                    showHideTransition: "slide",
                    icon: "warning",
                    hideAfter: 5000,
                    stack: 10
                });
            }, 1000);
        }

    });




});