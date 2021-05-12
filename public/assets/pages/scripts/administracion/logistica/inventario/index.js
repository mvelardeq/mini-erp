$(document).ready(function(){
    $("#tabla-data2").DataTable({
        // order: [[0 ]],
        "ordering": false,
        language:{

            "lengthMenu": "Mostrar _MENU_ registros",
            "zeroRecords": "No se encontraron resultados",
            "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
            "sSearch": "Buscar:",
            "oPaginate":{
                "sFirst": "Primero",
                "sLast": "Último",
                "sNext": "Siguiente",
                "sPrevious": "Anterior",
            },
            "sProcessing": "Procesando..."
        },
        responsive: "true",
        dom: "Bftilp",
        buttons: [
            {
                extend: "excelHtml5",
                text: "<i class='fas fa-file-excel'></i>",
                titleAttr: "Exportar a Excel",
                className: "btn btn-success"
            },
            {
                extend: "pdf",
                text: "<i class='fas fa-file-pdf'></i>",
                titleAttr: "Exportar a PDF",
                className: "btn btn-danger"
            },
            {
                extend: "print",
                text: "<i class='fas fa-print'></i>",
                titleAttr: "Imprimir",
                className: "btn btn-info"
            }
        ]
    });

    $("#tabla-data3").DataTable({
        // order: [[0 ]],
        "ordering": false,
        language:{

            "lengthMenu": "Mostrar _MENU_ registros",
            "zeroRecords": "No se encontraron resultados",
            "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
            "sSearch": "Buscar:",
            "oPaginate":{
                "sFirst": "Primero",
                "sLast": "Último",
                "sNext": "Siguiente",
                "sPrevious": "Anterior",
            },
            "sProcessing": "Procesando..."
        },
        responsive: "true",
        dom: "Bftilp",
        buttons: [
            {
                extend: "excelHtml5",
                text: "<i class='fas fa-file-excel'></i>",
                titleAttr: "Exportar a Excel",
                className: "btn btn-success"
            },
            {
                extend: "pdf",
                text: "<i class='fas fa-file-pdf'></i>",
                titleAttr: "Exportar a PDF",
                className: "btn btn-danger"
            },
            {
                extend: "print",
                text: "<i class='fas fa-print'></i>",
                titleAttr: "Imprimir",
                className: "btn btn-info"
            }
        ]
    });

});
