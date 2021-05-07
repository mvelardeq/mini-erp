$(document).ready(function () {


    $("#addproductc").on('click',function(e){
        e.preventDefault();
        $("#modalProductoc").modal('show');
    });

    $("#guardarc").on('click', function(e){
        e.preventDefault();
        let idproductoc = $("#productoc_id").children(":selected").attr('value');
        let productoc = $("#productoc_id").children(":selected").text();
        let precio = $("#costo_con_igvcModal").val();
        let cantidad = $("#cantidadcModal").val();

        // Calcular Item
        let item;
        if ($("#table-form tr:last").find('td')[0]) {
            item =parseInt($("#compraBody tr:last").find('td').eq(0).html());
            item = item+1;
        }else{
            item = 1;
        }

        // Llenado de Tabla
        $("#compraBody").append(`<tr>
        <input type="hidden" name="producto_id[]" value="${idproductoc}">
        <input type="hidden" name="costo_con_igv[]" value="${precio}">
        <input type="hidden" name="cantidad[]" value="${cantidad}">
        <input type="hidden" name="capacidad[]" value="">
        <input type="hidden" name="numero_serie[]" value="">
        <input type="hidden" name="marca[]" value="">
        <input type="hidden" name="modelo[]" value="">
        <td class="item">${item}</td>
        <td>${productoc}</td>
        <td>${cantidad}</td>
        <td>${precio}</td>
        <td class="sum">${cantidad*precio}</td>
        <td>
            <button class="eliminar-producto btn-accion-tabla eliminar tooltipsC"><i class="fa fa-fw fa-trash text-danger"></i></button>
        </td>
        </tr>`);

        // Hallar el total de la compra
        let total=0;
        $("#table-form .sum").each(function () {
            total += parseFloat($(this).text());
        });
        $('input[name="total"]').attr('value', total);

        // Ingresar total en la tabla
        $("#compraFoot").html(`<tr>
        <td></td>
        <td></td>
        <td></td>
        <td><strong>Total</strong></td>
        <td>${total}</td>
        </tr>`);

        $("#formproductoc").trigger("reset");
        $("#modalProductoc").modal('hide');

    });





    $('#addproductp').on('click', function(e){
        e.preventDefault();
        $('#modalProductop').modal('show');
    });

    $("#guardarp").on('click', function(e){
        e.preventDefault();
        let idproductop = $("#productop_id").children(":selected").attr('value');
        let productop = $("#productop_id").children(":selected").text();
        let precio = $("#costo_con_igvpModal").val();
        let cantidad = $("#cantidadpModal").val();
        let capacidad = $("#capacidadpModal").val();
        let numero_serie = $("#numero_seriepModal").val();
        let marca = $("#marcapModal").val();
        let modelo = $("#modelopModal").val();


        // Calcular Item
        let item;
        if ($("#table-form tr:last").find('td')[0]) {
            item =parseInt($("#compraBody tr:last").find('td').eq(0).html());
            item = item+1;
        }else{
            item = 1;
        }

        // Llenado de Tabla
        $("#compraBody").append(`<tr>
        <input type="hidden" name="producto_id[]" value="${idproductop}">
        <input type="hidden" name="costo_con_igv[]" value="${precio}">
        <input type="hidden" name="cantidad[]" value="${cantidad}">
        <input type="hidden" name="capacidad[]" value="${capacidad}">
        <input type="hidden" name="numero_serie[]" value="${numero_serie}">
        <input type="hidden" name="marca[]" value="${marca}">
        <input type="hidden" name="modelo[]" value="${modelo}">
        <td class="item">${item}</td>
        <td>${productop}</td>
        <td>${cantidad}</td>
        <td>${precio}</td>
        <td class="sum">${cantidad*precio}</td>
        <td>
            <button class="eliminar-producto btn-accion-tabla eliminar tooltipsC"><i class="fa fa-fw fa-trash text-danger"></i></button>
        </td>
        </tr>`);

        // Hallar el total de la compra
        let total=0;
        $("#table-form .sum").each(function () {
            total += parseFloat($(this).text());
        });
        $('input[name="total"]').attr('value', total);


        // Ingresar total en la tabla
        $("#compraFoot").html(`<tr>
        <td></td>
        <td></td>
        <td></td>
        <td><strong>Total</strong></td>
        <td>${total}</td>
        </tr>`);

        $("#formproductop").trigger("reset");
        $("#modalProductop").modal('hide');

    });
});




$(document).on('click','.eliminar-producto', function(e){
            e.preventDefault();
            swal({
                title: '¿ Está seguro que desea eliminar el registro ?',
                text: "Esta acción no se puede deshacer!",
                icon: 'warning',
                buttons: {
                    cancel: "Cancelar",
                    confirm: "Aceptar"
                },
            }).then((value) => {
                if (value) {
                    let element = $(this)[0].parentElement.parentElement;
                    $(element).remove();



            $("#table-form .item").each(function (i) {
                $(this).html(i+1);
            });

            // Hallar el total de la compra
            let total=0;
            $("#table-form .sum").each(function () {
                total += parseFloat($(this).text());
            });
            $('input[name="total"]').attr('value', total);

            // Ingresar total en la tabla
            $("#compraFoot").html(`<tr>
            <td></td>
            <td></td>
            <td></td>
            <td><strong>Total</strong></td>
            <td>${total}</td>
            </tr>`);
        }
    });
});
