$(function(){

    var init = function() {
        $('#email-datatable').DataTable( {
            "ajax": {
                "url": '/api/emails',
                "dataSrc": ""
            },
            "columns": [
                { data: 'id' },
                { data: 'username' },
                { data: 'email' },
                { data: 'created_at' },
            ],
            "columnDefs": [
                {
                    "render": function ( data, type, row ) {
                        return moment(data.date).format("YYYY/MM/DD hh:mm");
                    }, "targets": 3 
                },
                {
                    className: "text-right", targets: [0,3]
                }
            ]
        });
    };

    init();

});