$(document).ready(function () {

    $("#tabla-data").on("submit", ".subir-plano", function (e) {
        e.preventDefault();
        id= $(this).parent().find('.subir-plano').attr("data-id");
        $("#modalSubirid").val(id);
        $("#modalSubir").modal("show");
    });

    $("#modalSubir").on("submit", ".form-subir", function (e) {
        e.preventDefault();
        console.log('hello');
        let id = $("#modalSubirid").val();
        var data = new FormData(document.getElementById('subirid'));

        $.ajax({
            url: "equipo/subir/"+id,
            type: "POST",
            data: data,
            processData: false,  // tell jQuery not to process the data
            contentType: false,
            success: function(response){

                // $("#plano" + response.id).html(
                    // `<a href="{{Storage::disk('s3')->url('files/planes/${response.plano}')}}"><i class="fas fa-file-pdf text-danger"></i></a>`
                    // );
                    // $("#pagocliente" + response.id).find('strong').html(response.pago);
                    $("#modalSubir").modal("hide");
                    location.reload();

                Biblioteca.notificaciones(
                    "El plano fue subido correctamente",
                    "Ascensores Industriales",
                    "success"
                );
            }
          });

    });

});
