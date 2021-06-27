$(document).ready(function () {

    $("#botonModalContrasenia").click(function(){
        $("#modalCambioContrasenia").find('form')[0].reset();
        $("#modalCambioContrasenia").find('.alert-danger').hide();
        $("#modalCambioContrasenia").modal("show");

    });
    $("#modalCambioContrasenia").on('submit','.form-password',function(e){
        e.preventDefault();
        const form = $(this);
        const data = form.serialize();
        $.post("configurar/cambiar-password", data, function (response) {

            if(response.errors)
            {
                $('.alert-danger').html('');
                $.each(response.errors, function(key, value){
                    $('.alert-danger').show();
                    $('.alert-danger').append('<li>'+value+'</li>');
                });
            }else{
                if (response.mensaje == "ok") {
                    Biblioteca.notificaciones('La contraseña fue actualizada correctamente', 'Ascensores Industriales', 'success');
                } else {
                    Biblioteca.notificaciones('La contraseña no pudo ser actualizada, hay recursos usandolo', 'Ascensores Industriales', 'error');
                }
                $('.alert-danger').hide();
                $('#modalCambioContrasenia').modal('hide');
            }
        });
    });



    $("#botonModalInformacion").click(function(){
        $("#modalEditarInformacion").find('form')[0].reset();
        $("#modalEditarInformacion").find('.alert-danger').hide();
        $.get('configurar/informacion',function(response){
            $("#direccion").attr('value',response.direccion);
            $("#botas").attr('value',response.botas);
            $("#overol").attr('value',response.overol);
            $("#celular").attr('value',response.celular);
            $("#correo").attr('value',response.correo);
        });
        $("#modalEditarInformacion").modal("show");
    });
    $("#modalEditarInformacion").on('submit','.form-informacion',function(e){
        e.preventDefault();
        const form = $(this);
        const data = form.serialize();
        $.post("configurar/cambiar-informacion", data, function (response) {

            if(response.errors)
            {
                $('.alert-danger').html('');
                $.each(response.errors, function(key, value){
                    $('.alert-danger').show();
                    $('.alert-danger').append('<li>'+value+'</li>');
                });
            }else{
                if (response.mensaje == "ok") {
                    $("#direccion-info").html(response.direccion);
                    $("#botas-info").html(response.botas);
                    $("#overol-info").html(response.overol);
                    $("#celular-info").html(response.celular);
                    $("#correo-info").html(response.correo);
                    Biblioteca.notificaciones('La información fue actualizada correctamente', 'Ascensores Industriales', 'success');
                } else {
                    Biblioteca.notificaciones('La información no pudo ser actualizada, hay recursos usandolo', 'Ascensores Industriales', 'error');
                }
                $('.alert-danger').hide();
                $('#modalEditarInformacion').modal('hide');
            }
        });
    });



});
