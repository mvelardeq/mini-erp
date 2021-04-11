$(document).ready(function () {
    $("#tabla-data").on("submit", ".form-procesar", function (e) {
        e.preventDefault();
        const form = $(this);
        swal({
            title: "¿ Está seguro que desea procesar la factura ?",
            text: "Esta acción se realiza cuando la factura es recepcionada",
            icon: "warning",
            buttons: {
                cancel: "Cancelar",
                confirm: "Aceptar",
            },
        }).then((value) => {
            if (value) {
                ajaxRequest2(form);
            }
        });
    });

    function ajaxRequest2(form) {
        if (form.parents("tr").find("span").html() == "Emitida") {
            $.ajax({
                url: form.attr("action"),
                type: "POST",
                data: form.serialize(),
                success: function (respuesta) {
                    if (respuesta.mensaje == "ok") {
                        $("#estado" + respuesta.id).html(
                            '<span class="badge bg-info">Por cobrar</span>'
                        );
                        form.attr(
                            "action",
                            window.location + "/procesar/" + respuesta.id
                        );

                        Biblioteca.notificaciones(
                            "La factura fue procesada correctamente",
                            "Ascensores Industriales",
                            "success"
                        );
                    } else {
                        Biblioteca.notificaciones(
                            "La factura no pudo ser procesada, hay recursos usándola",
                            "Ascensores Industriales",
                            "error"
                        );
                    }
                },
                error: function () {
                    console.log(nn);
                },
            });
        } else {
            Biblioteca.notificaciones(
                "La factura no pudo ser procesada debido a su estado actual",
                "Ascensores Industriales",
                "error"
            );
        }
    }



    $("#tabla-data").on("submit", ".pagar-factura", function (e) {
        e.preventDefault();
        id= $(this).parent().find('.pagar-factura').attr("data-id");
        $("#modalPagarid").val(id);
        estado = $(this).parent().parent().find('span').html();
        if (estado == "Por cobrar") {
            $("#modalPagar").modal("show");
        }
    });

    $("#modalPagar").on("submit", ".form-pagar", function (e) {
        e.preventDefault();
        console.log('hello');
        let id = $("#modalPagarid").val();
        let data = {
            id: $("#modalPagarid").val(),
            _token: $("input[name=_token]").val(),
            pago: $("#pagoModal").val(),
            fecha_pago: $("#fecha_pagoModal").val(),
        };

        $.post("factura/pagar/" + id, data, function (response) {
            $("#estado" + response.id).html(
                '<span class="badge bg-success">Cobrada</span>'
            );
            $("#pagocliente" + response.id).find('strong').html(response.pago);
            $("#modalPagar").modal("hide");
            Biblioteca.notificaciones(
                "La factura fue pagada correctamente",
                "Ascensores Industriales",
                "success"
            );
        });

    });





    $("#tabla-data").on("submit", ".detraer-factura", function (e) {
        e.preventDefault();
        id= $(this).parent().find('.detraer-factura').attr("data-id");
        $("#modalDetraerid").val(id);
        estado = $(this).parent().parent().find('span').html();
        detraccion = $(this).parent().parent().find('.detraccion').html();
        float_detraccion = parseFloat(detraccion);
        if ((estado == "Por cobrar" || estado == "Cobrada") && isNaN(float_detraccion)) {
            $("#modalDetraer").modal("show");
        }
    });

    $("#modalDetraer").on("submit", ".form-detraer", function (e) {
        e.preventDefault();
        let id = $("#modalDetraerid").val();
        let data = {
            id: $("#modalDetraerid").val(),
            _token: $("input[name=_token]").val(),
            pago_detraccion: $("#pago_detraccionModal").val(),
            fecha_detraccion: $("#fecha_detraccionModal").val(),
        };

        $.post("factura/detraer/" + id, data, function (response) {

            $("#pagocliente" + response.id).find('.detraccion').html(response.pago_detraccion);
            // $("#pagocliente" + response.id).html(`<strong>${response.pago}</strong>`);
            $("#modalDetraer").modal("hide");
            Biblioteca.notificaciones(
                "La factura fue detraida correctamente",
                "Ascensores Industriales",
                "success"
            );
        });

    });



    $("#tabla-data").on("submit", ".anular-factura", function (e) {
        e.preventDefault();
        id= $(this).parent().find('.anular-factura').attr("data-id");
        $("#modalAnularid").val(id);
        estado = $(this).parent().parent().find('span').html();
        if (estado == "Por cobrar" || estado == "Emitida") {
            $("#modalAnular").modal("show");
        }
    });

    $("#modalAnular").on("submit", ".form-anular", function (e) {
        e.preventDefault();
        let id = $("#modalAnularid").val();
        let data = {
            id: $("#modalAnularid").val(),
            _token: $("input[name=_token]").val(),
            fecha_anulacion: $("#fecha_anulacionModal").val(),
            motivo_anulacion: $("#motivo_anulacionModal").val(),
        };

        $.post("factura/anular/" + id, data, function (response) {
            $("#estado" + response.id).html(
                '<span class="badge bg-danger">Anulada</span>'
            );
            $("#modalAnular").modal("hide");
            Biblioteca.notificaciones(
                "La factura fue anulada correctamente",
                "Ascensores Industriales",
                "success"
            );
        });

    });
});
