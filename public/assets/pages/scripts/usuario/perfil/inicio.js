$(document).ready(function () {

$("#muro").on("submit", ".form-like", function (e) {
    e.preventDefault();
    const form = $(this);
    let id= $(this).parent().find('.form-like').attr("data-id");
    let data = {
        id: id,
        _token: $("input[name=_token]").val(),
    };

    $.post("../../social/like/guardar/" + id, data, function (response) {
        form.find('button').addClass("text-primary");
        form.removeClass('form-like').addClass('form-dislike');
        let meGusta =form.parent().find(".me-gusta").html().split(' ');
        if (parseInt(meGusta[0])) {
            form.parent().find(".me-gusta").html((parseInt(meGusta[0])+1)+' me gusta');
        }else{
            form.parent().find(".me-gusta").html('1 me gusta');
        }
    });

});

$("#muro").on("submit", ".form-dislike", function (e) {
    e.preventDefault();
    const form = $(this);
    let id= $(this).parent().find('.form-dislike').attr("data-id");
    let data = {
        id: id,
        _token: $("input[name=_token]").val(),
    };

    $.post("../../social/like/eliminar/" + id, data, function (response) {
        form.find('button').removeClass("text-primary");
        form.removeClass('form-dislike').addClass('form-like');
        let meGusta =form.parent().find(".me-gusta").html().split(' ');
        if (parseInt(meGusta[0])==1) {
            form.parent().find(".me-gusta").empty();
        }else{
            form.parent().find(".me-gusta").html((parseInt(meGusta[0])-1)+' me gusta');
        }
    });

});


$("#muro .me-gusta").on('click', function(e){
    e.preventDefault();
    let id = $(this).attr("data-id");
    let data ={id};
    $.get("../../social/like/listar/"+id, data, function(response){
        $("#modalMegusta").find("div .modal-body").html(response);
    });
    $("#modalMegusta").modal("show");
    // console.log(id);
});


});
