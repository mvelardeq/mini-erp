$(document).ready(function () {

    $(document).on('click', '.imagenproducto', function(e){
        e.preventDefault();
        $("#modalProducto").modal('show');
        let src = $(this).attr('src');
        $(".imagenmodal").attr('src', src);
    });

});
