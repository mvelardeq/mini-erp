// const { data } = require("jquery");

$(document).ready(function () {
    $("#botonModalContrasenia").click(function(){
        console.log('click boton');
        // $("#modalCambiarContrasenia").find('form').reset();
        $("#modalCambioContrasenia").modal("show");

    });
    $("#modalCambioContrasenia").on('submit','.form-password',function(e){
        e.preventDefault();
        const form = $(this);
        const data = form.serialize();
        $.post("configurar/cambiar-password", data, function (response) {

            // console.log(response);
            if(response.errors)
                  	{
                  		$('.alert-danger').html('');
                  		$.each(response.errors, function(key, value){
                  			$('.alert-danger').show();
                  			$('.alert-danger').append('<li>'+value+'</li>');
                  		});
                  	}
                  	else
                  	{
                  		$('.alert-danger').hide();
                  		$('#modalCambioContrasenia').modal('hide');
                          $("#mensaje").html(`
                          <div class="alert alert-success alert-dismissible" data-auto-dismiss="3000">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h5><i class="icon fas fa-check"></i> Mensaje Sistema Ascensores Industriales</h5>
                            <ul>
                                <li>Se cambió la contraseña exitosamente</li>
                            </ul>
                        </div>
                          `);
                  	}
        });
    });
});
