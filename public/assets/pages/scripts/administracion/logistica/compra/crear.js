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

        let item;

        if ($("#table-form tr:last").find('td')[0]) {
            item =parseInt($("#compraBody tr:last").find('td').eq(0).html());
            item = item+1;
        }else{
            item = 1;
        }


        $("#compraBody").append(`<tr>

        <input type="hidden" name="id[]" value="${idproductoc}">
        <td class="item">${item}</td>
        <td>${productoc}</td>
        <td>${cantidad}</td>
        <td>${precio}</td>
        <td class="sum">${cantidad*precio}</td>

        </tr>`);

        // Hallar el total de la compra
        let total=0;
        $("#table-form .sum").each(function () {
            total += parseFloat($(this).text());
        });
        $('input[name="total"]').attr('value', total);

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

        let item;

        if ($("#table-form tr:last").find('td')[0]) {
            item =parseInt($("#table-form tr:last").find('td').eq(0).html());
            item = item+1;
        }else{
            item = 1;
        }

        $("#compraBody").append(`<tr>

        <input type="hidden" name="${id}" value="${idproductop}">
        <td class="item">${item}</td>
        <td>${productop}</td>
        <td>${cantidad}</td>
        <td>${precio}</td>
        <td>${cantidad*precio}</td>

        </tr>`);
        $("#formproductop").trigger("reset");
        $("#modalProductop").modal('hide');

    });
});
