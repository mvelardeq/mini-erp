document.getElementById("foto").onchange = function(e) {
	let reader = new FileReader();

  reader.onload = function(){
    let preview = document.getElementById('preview'),
    		image = document.createElement('img');

    image.src = reader.result;

    preview.innerHTML = '';
    preview.append(image);
    image.style.maxWidth = '90%';
    image.style.display = 'block';
    image.style.margin = 'auto';
  };

  reader.readAsDataURL(e.target.files[0]);
}

$(function () {
    $("#muro").on('submit', '.form-eliminar', function (event) {
        event.preventDefault();
        const form = $(this);
        swal({
            title: '¿ Está seguro que desea eliminar el post ?',
            text: "Esta acción no se puede deshacer!",
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
        $.ajax({
            url: form.attr('action'),
            type: 'POST',
            data: form.serialize(),
            success: function (respuesta) {
                if (respuesta.mensaje == "ok") {
                    form.parents('.card').remove();
                    Biblioteca.notificaciones('El post fue eliminado correctamente', 'Ascensores Industriales', 'success');
                } else {
                    Biblioteca.notificaciones('El registro no pudo ser eliminado, hay recursos usandolo', 'Ascensores Industriales', 'error');
                }

            },
            error: function () {

            }
        });
    }


$("#muro").on("submit", ".form-like", function (e) {
    e.preventDefault();
    const form = $(this);
    let id= $(this).parent().find('.form-like').attr("data-id");
    let data = {
        id: id,
        _token: $("input[name=_token]").val(),
    };

    $.post("social/like/guardar/" + id, data, function (response) {
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

    $.post("social/like/eliminar/" + id, data, function (response) {
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
    $.get("social/like/listar/"+id, data, function(response){
        $("#modalMegusta").find("div .modal-body").html(response);
    });
    $("#modalMegusta").modal("show");
    // console.log(id);
});
});

// $(document).ready(function () {



//     $("#muro").on('submit', '.form-eliminar', function (event) {
//         event.preventDefault();
//         const form = $(this);
//         swal({
//             title: '¿ Está seguro que desea eliminar el post ?',
//             text: "Esta acción no se puede deshacer!",
//             icon: 'warning',
//             buttons: {
//                 cancel: "Cancelar",
//                 confirm: "Aceptar"
//             },
//         }).then((value) => {
//             if (value) {
//                 ajaxRequest(form);
//             }
//         });
//     });

//     function ajaxRequest(form) {
//         $.ajax({
//             url: form.attr('action'),
//             type: 'POST',
//             data: form.serialize(),
//             success: function (respuesta) {
//                 if (respuesta.mensaje == "ok") {
//                     form.parents('.card').remove();
//                     Biblioteca.notificaciones('El post fue eliminado correctamente', 'Ascensores Industriales', 'success');
//                 } else {
//                     Biblioteca.notificaciones('El registro no pudo ser eliminado, hay recursos usandolo', 'Ascensores Industriales', 'error');
//                 }

//             },
//             error: function () {

//             }
//         });
//     }


// $("#muro").on("submit", ".form-like", function (e) {
//     e.preventDefault();
//     const form = $(this);
//     let id= $(this).parent().find('.form-like').attr("data-id");
//     let data = {
//         id: id,
//         _token: $("input[name=_token]").val(),
//     };

//     $.post("social/like/guardar/" + id, data, function (response) {
//         form.find('button').addClass("text-primary");
//         form.removeClass('form-like').addClass('form-dislike');
//         let meGusta =form.parent().find(".me-gusta").html().split(' ');
//         if (parseInt(meGusta[0])) {
//             form.parent().find(".me-gusta").html((parseInt(meGusta[0])+1)+' me gusta');
//         }else{
//             form.parent().find(".me-gusta").html('1 me gusta');
//         }
//     });

// });

// $("#muro").on("submit", ".form-dislike", function (e) {
//     e.preventDefault();
//     const form = $(this);
//     let id= $(this).parent().find('.form-dislike').attr("data-id");
//     let data = {
//         id: id,
//         _token: $("input[name=_token]").val(),
//     };

//     $.post("social/like/eliminar/" + id, data, function (response) {
//         form.find('button').removeClass("text-primary");
//         form.removeClass('form-dislike').addClass('form-like');
//         let meGusta =form.parent().find(".me-gusta").html().split(' ');
//         if (parseInt(meGusta[0])==1) {
//             form.parent().find(".me-gusta").empty();
//         }else{
//             form.parent().find(".me-gusta").html((parseInt(meGusta[0])-1)+' me gusta');
//         }
//     });

// });


// $("#muro .me-gusta").on('click', function(e){
//     e.preventDefault();
//     let id = $(this).attr("data-id");
//     let data ={id};
//     $.get("social/like/listar/"+id, data, function(response){
//         $("#modalMegusta").find("div .modal-body").html(response);
//     });
//     $("#modalMegusta").modal("show");
//     // console.log(id);
// });


// });
