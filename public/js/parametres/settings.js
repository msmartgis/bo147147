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
                searchable: false,
                width: '2%'
            },
            {
                data: 'prenom',
                name: 'users.prenom',
                orderable: false,
                searchable: false,
                width: '2%'
            },
            {
                data: 'username',
                name: 'users.username',
                orderable: false,
                searchable: false,
                width: '2%'
            },
            // {
            //     data: 'service',
            //     name: 'service',
            //     orderable: false,
            //     searchable: false,
            //     width: '2%'
            // },
            {
                data: 'actions',
                name: 'actions',
                orderable: false,
                searchable: false,
                width: '2%'
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
        $(".delete-user-btn").click(function () {
            var btn_id = this.id;
            var id = btn_id.split('_')[1];
            var route = '/user/delete';
            deleteElement(route, id);
        });


        $(".edit-user-btn").click(function () {
            var btn_id = this.id;
            var id = btn_id.split('_')[1];
            var route = '/settings/elementData/' + id;
            var model = 'user';
            var modalTitle = 'Modifier L\'utilisateur';
            getElementData(route, model, modalTitle);
        });


        $("#modal_submit_user").click(function () {
            $('.user-form').submit();
        });
    });


});
