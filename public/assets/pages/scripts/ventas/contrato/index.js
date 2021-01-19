$(document).ready(function () {
    $("#tabla-data").on('submit', '.form-finalizar', function () {
        event.preventDefault();
        const form = $(this);
        swal({
            title: '¿ Está seguro que desea finalizar el contrato ?',
            text: "Esta acción culmina toda acción sobre el contrato",
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
                if (respuesta.mensaje == "ok") {
                    $("#estado"+respuesta.id).html('<span class="badge bg-warning">cerrado</span>');
                    $("#accion"+respuesta.id).html('Retomar');
                    form.attr('action',window.location+"/retomar/"+respuesta.id);
                    form.removeClass("form-finalizar");
                    form.addClass("form-retomar");

                    // $('.estado').html('cerrado');
                    // $('.accion').html('Retomar');
                    // form.parents('tr').html(respuesta);
                    Biblioteca.notificaciones('El contrato fue finalizado correctamente', 'Ascensores Industriales', 'success');
                } else {
                    Biblioteca.notificaciones('El contrato no pudo ser finalizado, hay recursos usándolo', 'Ascensores Industriales', 'error');
                }

            },
            error: function () {
        console.log(nn);
            }
        });
    }

    $("#tabla-data").on('submit', '.form-retomar', function () {
        event.preventDefault();
        const form2 = $(this);
        swal({
            title: '¿ Está seguro que desea retomar el contrato ?',
            text: "Con esto puedes retomar cualquier acción sobre el contrato",
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
                if (respuesta.mensaje == "ok") {
                    $("#estado"+respuesta.id).html( '<span class="badge bg-success">abierto</span>');
                    $("#accion"+respuesta.id).html('Finalizar');
                    form.attr('action',window.location+"/finalizar/"+respuesta.id);
                    form.removeClass("form-retomar");
                    form.addClass("form-finalizar");

                    Biblioteca.notificaciones('El contrato fue retomado correctamente', 'Ascensores Industriales', 'success');
                } else {
                    Biblioteca.notificaciones('El contrato no pudo ser retomado, hay recursos usándolo', 'Ascensores Industriales', 'error');
                }

            },
            error: function () {

            }
        });
    }

});

