/* Boton Borrar Campos De Formulario*/
$(document).ready(function () {


    $("#tabla-data").DataTable({
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

    //Cerrar Las Alertas Automaticamente
    $('.alert[data-auto-dismiss]').each(function (index, element) {
        const $element = $(element),
            timeout = $element.data('auto-dismiss') || 5000;
        setTimeout(function () {
            $element.alert('close');
        }, timeout);
    });
    //TOOLTIPS
    $('body').tooltip({
        trigger: 'hover',
        selector: '.tooltipsC',
        placement: 'top',
        html: true,
        container: 'body'
    });
    // $('ul.nav-sidebar').find('a.active').parentsUntil('li').addClass('menu-open');

    // Trabajo con Ventana de Roles.
    const modal = $('#modal-seleccionar-rol');
    if (modal.length && modal.data('rol-set') == 'NO') {
        $('#modal-seleccionar-rol').modal('show');
    }

    $('.asignar-rol').on('click', function (event) {
        event.preventDefault();
        const data = {
            rol_id: $(this).data('rolid'),
            rol_nombre: $(this).data('rolnombre'),
            _token: $('input[name=_token]').val()
        }
        ajaxRequest(data, '/ajax-sesion', 'asignar-rol');
    });

    $('.cambiar-rol').on('click', function (event) {
        event.preventDefault();
        modal.modal('show');
    });

    function ajaxRequest(data, url, funcion) {
        $.ajax({
            url: url,
            type: 'POST',
            data: data,
            success: function (respuesta) {
                if (funcion == 'asignar-rol' && respuesta.mensaje == 'ok') {
                    $('#modal-seleccionar-rol').hide();
                    location.reload();
                }
            }
        });
    }

});
