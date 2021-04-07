$(document).ready(function () {
    $("#tabla-data").on('submit', '.form-procesar', function (e) {
        e.preventDefault();
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


    $("#tabla-data").on('submit','.pagar-factura',function(e){
        e.preventDefault();
        $("#modalPagar").modal('show');
        $('#modalPagarid').val(this.id);
        console.log(this.id);
    });


    // function pagar_factura(id) {
    //     $('#modalPagarid').val(id);
    //     console.log($('#modalPagarid').val());
    // }

    $('#modalPagar').on('submit','.form-pagar',function (e) {
        e.preventDefault();
        // console.log('hello');
        let id = $('#modalPagarid').val();
        let data = {
            id: $('#modalPagarid').val(),
            _token: $('input[name=_token]').val(),
            pago: $('#pagoModal').val(),
            fecha_pago : $('#fecha_pagoModal').val()
        };

        $.post("factura/pagar/"+id,data,function (response) {
            // $("#concepto_pago_id").html(res);
            $("#estado"+response.id).html( '<span class="badge bg-success">Cobrada</span>');
                $("#pagocliente"+response.id).html("hello");
                // $("#pagocliente"+response.id).html( `
                //     Pago: <strong>'${pago}'</strong> <br>
                //     Detr: '${fecha_pago}' <br>
                // `);
        });

        // $.ajax({
        //     type: "POST",
        //     url: "pagar/" + id,
        //     data: data,
        //     // dataType: "dataType",
        //     success: function (response) {
        //         $("#estado"+response.id).html( '<span class="badge bg-success">Cobrada</span>');
        //         $("#pagocliente"+response.id).html( `
        //             Pago: <strong>'${pago}'</strong> <br>
        //             Detr: '${fecha_pago}' <br>
        //         `);
        //     }
        // });
    });
/*
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
*/


$("#modalAnular").on('submit', '.form-anular', function(e){
    e.preventDefault();
    const form = $(this);
    var id = form.data('id');
    // var data = {
    //     adelanto = form.find("#adelanto").val(),
    //     _token: $('input[name=_token]').val()
    // }
    ajaxRequestAnular(form);
    // $.post("../adelanto/"+id,data,function (res) {
    //     $("#modalAdelanto").hide();
    //     $("#filaot"+id).find('span #adelanto').html(res);
    // })
});

function ajaxRequestAnular(form){
    $.ajax({
        url: form.attr('action'),
        type: 'POST',
        data: form.serialize(),
        success: function (respuesta) {
            $("#modalAnular").hide();
            $("#estado"+respuesta.id).html( '<span class="badge bg-danger">Anulada</span>');
            Biblioteca.notificaciones('La factura fue anulada correctamente', 'Ascensores Industriales', 'success');

            // location.reload();
            // $("#filaot"+id).find('span #adelanto').html(res);
        },
        error: function () {

        }
    })
}





    $("#tabla-data").on('submit', '.form-anular', function (e) {
        e.preventDefault();
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

// let element =document.getElementByClassName('pagar-factura');
// element.addEventListener("click",function(){
//     console.log(this.id);
// }, false);
