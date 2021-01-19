$(document).ready(function () {
    Biblioteca.validacionGeneral('form-general');

    $("#contrato_id").change(function(){
          var id=$("#contrato_id").val();
          var data = {
                    contrato_id: $(this).val(),
                    _token: $('input[name=_token]').val()
                };
          $.post("combo/"+id,data,function (res) {
              $("#concepto_pago_id").html(res);
          })
    })

    $("#concepto_pago_id").change(function(){
        // var idObra=$("#contrato_id").val();
        var id=$("#concepto_pago_id").val();
        var data = {
            concepto_pago_id: $(this).val(),
            _token: $('input[name=_token]').val()
        };
        $.post("costofac/"+id,data,function (res) {

          $("#holders").html(res);

        })

  })

});
