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


$(document).ready(function () {


    $("#muro").on('submit', '.form-like', function (e) {
        e.preventDefault();
        const form = $(this);
        ajaxRequest(form);
    });

    function ajaxRequest(form) {
        $.ajax({
            url: form.attr('action'),
            type: 'POST',
            data: form.serialize(),
            success: function (respuesta) {
                if (respuesta.mensaje == "ok") {
                    form.find('button').addClass("text-primary");
                } else {
                    Biblioteca.notificaciones('El registro no pudo ser eliminado, hay recursos usandolo', 'Ascensores Industriales', 'error');
                }
            },
            error: function () {

            }
        });
    }



    $("#muro").on('submit', '.form-dislike', function (e) {
        e.preventDefault();
        const form = $(this);
        ajaxRequest2(form);
    });

    function ajaxRequest2(form) {
        $.ajax({
            url: form.attr('action'),
            type: 'POST',
            data: form.serialize(),
            success: function (respuesta) {
                if (respuesta.mensaje == "ok") {
                    form.find('button').removeClass("text-primary");
                } else {
                    Biblioteca.notificaciones('El registro no pudo ser eliminado, hay recursos usandolo', 'Ascensores Industriales', 'error');
                }
            },
            error: function () {

            }
        });
    }



});
