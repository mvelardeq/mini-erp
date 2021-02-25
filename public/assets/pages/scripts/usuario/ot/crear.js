$(document).ready(function(){

    $("#contrato_id").change(function(){
        var contrato_id=$("#contrato_id").val();
        var data = {
                  contrato_id: $(this).val(),
                  _token: $('input[name=_token]').val()
              };
        $.post("../combo/"+contrato_id,data,function (res) {
            $("#actividad1_id").html(res);
            $("#actividad2_id").html(res);
            $("#actividad3_id").html(res);
        })
  })

});
