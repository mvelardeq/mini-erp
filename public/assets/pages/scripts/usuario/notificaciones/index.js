$(document).ready(function () {

    $("#notificaciones_ot").on('submit', '.form-eliminar', function () {
        event.preventDefault();
        const form = $(this);
        swal({
            title: '¿ Está seguro que desea eliminar el registro ?',
            text: "Esta acción no se puede deshacer!",
            icon: 'warning',
            buttons: {
                cancel: "Cancelar",
                confirm: "Aceptar"
            },
        }).then((value) => {
            if (value) {
                ajaxRequestdelete(form);
            }
        });
    });

    function ajaxRequestdelete(form) {
        $.ajax({
            url: form.attr('action'),
            type: 'POST',
            data: form.serialize(),
            success: function (respuesta) {
                if (respuesta.mensaje == "ok") {
                    form.parents('tr').remove();
                    Biblioteca.notificaciones('El registro fue eliminado correctamente', 'Ascensores Industriales', 'success');
                } else {
                    Biblioteca.notificaciones('El registro no pudo ser eliminado, hay recursos usandolo', 'Ascensores Industriales', 'error');
                }

            },
            error: function () {

            }
        });
    }






    $("#notificaciones_ot").on('submit', '.form-aprobar', function () {
        event.preventDefault();
        const form = $(this);
        swal({
            title: '¿ Está seguro que desea aprobar la OT ?',
            text: "Con esta acción la OT no podrá cambiar",
            icon: 'warning',
            buttons: {
                cancel: "Cancelar",
                confirm: "Aceptar"
            },
        }).then((value) => {
            if (value) {
                ajaxRequest(form);
            }
        });
    });
    function ajaxRequest(form) {
            $.ajax({
                url: form.attr('action'),
                type: 'POST',
                data: form.serialize(),
                success: function (respuesta) {
                        if (respuesta.mensaje == "ok") {
                            $("#filaot"+respuesta.id).addClass("table-success");
                            form.attr('action',window.location+"/aprobar/"+respuesta.id);
                            form.remove();
                            location.reload();

                            Biblioteca.notificaciones('La OT fue aprobada correctamente', 'Ascensores Industriales', 'success');
                        } else {
                            Biblioteca.notificaciones('La OT no pudo ser aprobada, hay recursos usándolo', 'Ascensores Industriales', 'error');
                        }
                },
                error: function () {
                }
            });
        }


        $("#notificaciones_ot").on("submit", ".adelanto", function (e) {
            e.preventDefault();
            let id= $(this).parent().find('.adelanto').attr("data-id");
            $("#modalAdelantoid").val(id);
            let estado = $(this).parent().find(".adelanto>span").html();
            if (estado == "") {
                $("#modalAdelanto").modal("show");
            }
        });

        $("#modalAdelanto").on("submit", ".form-adelanto", function (e) {
            e.preventDefault();
            let id = $("#modalAdelantoid").val();
            let data = {
                id: $("#modalAdelantoid").val(),
                _token: $("input[name=_token]").val(),
                pago: $("#adelantoModal").val(),
            };
            $.post("notificaciones/adelanto/" + id, data, function (response) {
                $("#modalAdelanto").find("form").trigger("reset");
                $("#modalAdelanto").modal("hide");
                location.reload();
                Biblioteca.notificaciones(
                    "El adelanto fue aplicado correctamente",
                    "Ascensores Industriales",
                    "success"
                );
            });

        });




        $("#notificaciones_ot").on("submit", ".descuento", function (e) {
            e.preventDefault();
            let id= $(this).parent().find('.descuento').attr("data-id");
            $("#modalDescuentoid").val(id);
            let estado = $(this).parent().find(".descuento>span").html();
            if (estado == "") {
                $("#modalDescuento").modal("show");
            }
        });

        $("#modalDescuento").on("submit", ".form-descuento", function (e) {
            e.preventDefault();
            let id = $("#modalDescuentoid").val();
            let data = {
                id: $("#modalDescuentoid").val(),
                _token: $("input[name=_token]").val(),
                descuento: $("#descuentoModal").val(),
                motivo_descuento: $("#motivo_descuentoModal").val(),
            };
            $.post("notificaciones/descuento/" + id, data, function (response) {
                $("#modalDescuento").find("form").trigger("reset");
                $("#modalDescuento").modal("hide");
                location.reload();
                Biblioteca.notificaciones(
                    "El descuento fue aplicado correctamente",
                    "Ascensores Industriales",
                    "success"
                );
            });

        });


        $("#notificaciones_ot").on("submit", ".gastoi", function (e) {
            e.preventDefault();
            let id= $(this).parent().find('.gastoi').attr("data-id");
            $("#modalGastoiid").val(id);
            let estado = $(this).parent().find(".gastoi>span").html();
            console.log(estado);
            if (estado == "") {
                $("#modalGastoi").modal("show");
            }
        });

        $("#modalGastoi").on("submit", ".form-gastoi", function (e) {
            e.preventDefault();
            let id = $("#modalGastoiid").val();
            let data = {
                id: $("#modalGastoiid").val(),
                _token: $("input[name=_token]").val(),
                tipogasto_id: $("#tipogasto_id").val(),
                gastoi: $("#gastoiModal").val(),
            };
            $.post("notificaciones/gastoi/" + id, data, function (response) {
                $("#modalGastoi").find("form").trigger("reset");
                $("#modalGastoi").modal("hide");
                location.reload();
                Biblioteca.notificaciones(
                    "El gasto fue aplicado correctamente",
                    "Ascensores Industriales",
                    "success"
                );
            });

        });




        $("#notificaciones_ot").on("submit", ".gastom", function (e) {
            e.preventDefault();
            let id= $(this).parent().find('.gastom').attr("data-id");
            $("#modalGastomid").val(id);
            let estado = $(this).parent().find(".gastom>span").html();
            console.log(estado);
            if (estado == "") {
                $("#modalGastom").modal("show");
            }
        });

        $("#modalGastom").on("submit", ".form-gastom", function (e) {
            e.preventDefault();
            let id = $("#modalGastomid").val();
            let data = {
                id: $("#modalGastomid").val(),
                _token: $("input[name=_token]").val(),
                tipogasto_id: $("#tipogastom_id").val(),
                gastom: $("#gastomModal").val(),
            };
            $.post("notificaciones/gastom/" + id, data, function (response) {
                $("#modalGastom").find("form").trigger("reset");
                $("#modalGastom").modal("hide");
                location.reload();
                Biblioteca.notificaciones(
                    "El gasto fue aplicado correctamente",
                    "Ascensores Industriales",
                    "success"
                );
            });

        });


});

