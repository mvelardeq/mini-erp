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

                            Biblioteca.notificaciones('La OT fue aprobada correctamente', 'Ascensores Industriales', 'success');
                        } else {
                            Biblioteca.notificaciones('La OT no pudo ser aprobada, hay recursos usándolo', 'Ascensores Industriales', 'error');
                        }
                },
                error: function () {
                }
            });
        }


        $("#modalAdelanto").on('submit', '.form-adelanto', function(){
            event.preventDefault();
            const form = $(this);
            var id = form.data('id');
            // var data = {
            //     adelanto = form.find("#adelanto").val(),
            //     _token: $('input[name=_token]').val()
            // }
            ajaxRequestAdelanto(form);
            // $.post("../adelanto/"+id,data,function (res) {
            //     $("#modalAdelanto").hide();
            //     $("#filaot"+id).find('span #adelanto').html(res);
            // })
        });

        function ajaxRequestAdelanto(form){
            $.ajax({
                url: form.attr('action'),
                type: 'POST',
                data: form.serialize(),
                success: function (respuesta) {
                    $("#modalAdelanto").hide();
                    location.reload();
                    // $("#filaot"+id).find('span #adelanto').html(res);
                },
                error: function () {

                }
            })
        }



        $("#modalDescuento").on('submit', '.form-descuento', function(){
            event.preventDefault();
            const form = $(this);
            var id = form.data('id');
            // var data = {
            //     adelanto = form.find("#adelanto").val(),
            //     _token: $('input[name=_token]').val()
            // }
            ajaxRequestDescuento(form);
            // $.post("../adelanto/"+id,data,function (res) {
            //     $("#modalAdelanto").hide();
            //     $("#filaot"+id).find('span #adelanto').html(res);
            // })
        });

        function ajaxRequestDescuento(form){
            $.ajax({
                url: form.attr('action'),
                type: 'POST',
                data: form.serialize(),
                success: function (respuesta) {
                    $("#modalDescuento").hide();
                    location.reload();
                    // $("#filaot"+id).find('span #adelanto').html(res);
                },
                error: function () {

                }
            })
        }

});

