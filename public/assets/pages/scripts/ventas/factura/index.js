$(document).ready(function () {
    $("#tabla-data").on('submit', '.form-procesar', function () {
        event.preventDefault();
        const form = $(this);
        swal({
            title: '¿ Está seguro que desea procesar la factura ?',
            content: {
                element: "input",
                attributes: {
                  placeholder: "Type your date",
                  type: "date",
                },
              },
        }).then((value) => {
            if (value) {
                ajaxRequest2(form);
            }
        });
    });
/*
$(document).ready(function () {
    $("#tabla-data").on('submit', '.form-procesar', function () {
        event.preventDefault();
        const form = $(this);
        swal({
            title: '¿ Está seguro que desea procesar la factura ?',
            text: "Esta acción se realiza cuando la factura es recepcionada",
            icon: 'warning',
            buttons: {
                cancel: "Cancelar",
                confirm: "Aceptar"
            },
        }).then((value) => {
            if (value) {
                ajaxRequest2(form);
            }
        });
    });
    */
    function ajaxRequest2(form) {
        if (form.parents('tr').find('span').html()=='Emitida') {
            $.ajax({
                url: form.attr('action'),
                type: 'POST',
                data: form.serialize(),
                success: function (respuesta) {
                        if (respuesta.mensaje == "ok") {
                            $("#estado"+respuesta.id).html('<span class="badge bg-info">Por cobrar</span>');
                            form.attr('action',window.location+"/procesar/"+respuesta.id);

                            Biblioteca.notificaciones('La factura fue procesada correctamente', 'Ascensores Industriales', 'success');
                        } else {
                            Biblioteca.notificaciones('La factura no pudo ser procesada, hay recursos usándola', 'Ascensores Industriales', 'error');
                        }
                },
                error: function () {
            console.log(nn);
                }
            });
        } else {
            Biblioteca.notificaciones('La factura no pudo ser procesada debido a su estado actual', 'Ascensores Industriales', 'error');
        }
    }





    $("#tabla-data").on('submit', '.form-pagar', function () {
        event.preventDefault();
        const form2 = $(this);
        swal({
            title: '¿ Está seguro que desea realizar el pago de la factura ?',
            text: "Con esta acción la factura es pagada",
            icon: 'warning',
            buttons: {
                cancel: "Cancelar",
                confirm: "Aceptar"
            },
        }).then((value) => {
            if (value) {
                ajaxRequest3(form2);
            }
        });
    });
    function ajaxRequest3(form) {
        if (form.parents('tr').find('span').html()=='Por cobrar') {
            $.ajax({
                url: form.attr('action'),
                type: 'POST',
                data: form.serialize(),
                success: function (respuesta) {
                        if (respuesta.mensaje == "ok") {
                            $("#estado"+respuesta.id).html( '<span class="badge bg-success">Cobrada</span>');
                            form.attr('action',window.location+"/pagar/"+respuesta.id);

                            Biblioteca.notificaciones('La factura fue pagada correctamente', 'Ascensores Industriales', 'success');
                        } else {
                            Biblioteca.notificaciones('La factura no pudo ser pagada, hay recursos usándolo', 'Ascensores Industriales', 'error');
                        }
                },
                error: function () {
                }
            });
        } else {
            Biblioteca.notificaciones('La factura no pudo ser pagada debido a su estado actual', 'Ascensores Industriales', 'error');
        }
    }






    $("#tabla-data").on('submit', '.form-anular', function () {
        event.preventDefault();
        const form3 = $(this);
        swal({
            title: '¿ Está seguro que desea anular el pago de la factura ?',
            text: "Con esta acción anula completamente la factura",
            icon: 'warning',
            buttons: {
                cancel: "Cancelar",
                confirm: "Aceptar"
            },
        }).then((value) => {
            if (value) {
                ajaxRequest4(form3);
            }
        });
    });
    function ajaxRequest4(form) {
        if ((form.parents('tr').find('span').html() == 'Emitida') || (form.parents('tr').find('span').html() == 'Por cobrar')) {
            $.ajax({
                url: form.attr('action'),
                type: 'POST',
                data: form.serialize(),
                success: function (respuesta) {
                        if (respuesta.mensaje == "ok") {
                            $("#estado"+respuesta.id).html( '<span class="badge bg-danger">Anulada</span>');
                            form.attr('action',window.location+"/anular/"+respuesta.id);

                            Biblioteca.notificaciones('La factura fue anulada correctamente', 'Ascensores Industriales', 'success');
                        } else {
                            Biblioteca.notificaciones('La factura no pudo ser anulada, hay recursos usándolo', 'Ascensores Industriales', 'error');
                        }
                },
                error: function () {

                }
            });
        } else {
            Biblioteca.notificaciones('La factura ya se encuentra anulada o cobrada', 'Ascensores Industriales', 'error');
        }
    }
});

