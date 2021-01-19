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

    function ajaxRequest2(form) {
        $.ajax({
            url: form.attr('action'),
            type: 'POST',
            data: form.serialize(),
            success: function (respuesta) {

                if ($("#estado"+respuesta.id+" span").html()=='Emitida') {
                    if (respuesta.mensaje == "ok") {
                        $("#estado"+respuesta.id).html('<span class="badge bg-info">Por cobrar</span>');
                        form.attr('action',window.location+"/procesar/"+respuesta.id);

                        Biblioteca.notificaciones('La factura fue procesada correctamente', 'Ascensores Industriales', 'success');
                    } else {
                        Biblioteca.notificaciones('La factura no pudo ser procesada, hay recursos usándola', 'Ascensores Industriales', 'error');
                    }
                }else{
                    Biblioteca.notificaciones('La factura no pude ser procesada debido a su estado actual', 'Ascensores Industriales', 'error');
                }

            },
            error: function () {
        console.log(nn);
            }
        });
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
        $.ajax({
            url: form.attr('action'),
            type: 'POST',
            data: form.serialize(),
            success: function (respuesta) {
                if ($("#estado"+respuesta.id+" span").html()=='Por cobrar') {
                    if (respuesta.mensaje == "ok") {
                        $("#estado"+respuesta.id).html( '<span class="badge bg-success">Cobrada</span>');
                        form.attr('action',window.location+"/pagar/"+respuesta.id);

                        Biblioteca.notificaciones('La factura fue pagada correctamente', 'Ascensores Industriales', 'success');
                    } else {
                        Biblioteca.notificaciones('La factura no pudo ser pagada, hay recursos usándolo', 'Ascensores Industriales', 'error');
                    }
                } else {
                    Biblioteca.notificaciones('La factura no pudo ser pagada debido a su estado actual', 'Ascensores Industriales', 'error');
                }


            },
            error: function () {

            }
        });
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
        $.ajax({
            url: form.attr('action'),
            type: 'POST',
            data: form.serialize(),
            success: function (respuesta) {
                if (($("#estado"+respuesta.id+" span").html()!='Anulada')||($("#estado"+respuesta.id+" span").html()!='Cobrada')) {
                    if (respuesta.mensaje == "ok") {
                        $("#estado"+respuesta.id).html( '<span class="badge bg-success">Cobrada</span>');
                        form.attr('action',window.location+"/anular/"+respuesta.id);

                        Biblioteca.notificaciones('La factura fue anulada correctamente', 'Ascensores Industriales', 'success');
                    } else {
                        Biblioteca.notificaciones('La factura no pudo ser anulada, hay recursos usándolo', 'Ascensores Industriales', 'error');
                    }
                } else {
                    Biblioteca.notificaciones('La factura ya se encuentra anulada o cobrada', 'Ascensores Industriales', 'error');
                }


            },
            error: function () {

            }
        });
    }

});

