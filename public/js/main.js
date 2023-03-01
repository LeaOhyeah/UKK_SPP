// $(document).ready(function () {
//     $('#example').DataTable();
// });

$(document).ready(function () {
    $("#btn-print").click(function () {
        window.print();
    });
});

$(document).ready(function () {
    var table = $("#tes").DataTable({
        columnDefs: [
            {
                targets: '_all',
                visible: true,
            }
        ],
        buttons: [
            {
                extend: 'print',
                exportOptions: {
                    columns: ':visible',
                }
            },
            {
                extend: 'excelHtml5',
                exportOptions: {
                    columns: ':visible',
                }
            },
            {
                extend: 'copy',
                exportOptions: {
                    columns: ':visible',
                }
            },
            {
                extend: 'colvis',
                exportOptions: {
                    columns: ':visible',
                }
            },
        ],
        // buttons: ["print", "excel", "pdf", "colvis"],
        dom:
            // length, button and search
            "<'row'<'col-md-3'l><'col-md-4'B><'col-md-3'f>>" +
            "<'row'<'col-md-12'tr>>" +
            "<'row'<'my-4'thead>>" +
            "<'row'<'col-md-5'i><'col-md-7'p>>",
    });

    table.buttons().container().appendTo("#tes_wrapper .col-md-6:eq(0)");
});


