var servicesTable;
$(document).ready(function () {    
    // Services
    servicesTable = $('#services_datatables').DataTable({
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
            url: 'settings/services',
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
        columns: [
            {
                data: 'nom',
                name: 'services.nom',
                orderable: false,
                searchable: false,
                width: '2%'
            },
            {
                data: 'created_at',
                name: 'services.created_at',
                orderable: false,
                searchable: false,
                "visible": false,
                width: '2%'
            },

            {
                data: 'updated_at',
                name: 'services.updated_at',
                orderable: false,
                searchable: false,
                "visible": false,
                width: '2%'
            },
           
         
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

    servicesTable.on('draw', function () {
        $(".edit-setting-btn").click(function () {
            var id = ($(this).data('id')).split('_')[1];  
            var route = '/settings/elementData/' + id;
            var model = 'service';
            getElementData(route, model,id);
        });        


        $("#modal_submit_user").click(function () {
            $('.user-form').submit();
        });  
    });

});
