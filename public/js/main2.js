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
        buttons: [],
        dom:
            // length, button and search
            "<'row'<'col-md-3'l><'col-md-4'B><'col-md-3'f>>" +
            "<'row'<'col-md-12'tr>>" +
            "<'row'<'my-4'thead>>" +
            "<'row'<'col-md-5'i><'col-md-7'p>>",
    });

    table.buttons().container().appendTo("#tes_wrapper .col-md-6:eq(0)");
});
