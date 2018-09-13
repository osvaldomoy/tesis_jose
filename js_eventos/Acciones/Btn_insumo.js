//------------------------------- AÑADIR -----------------------------------------


function GuardarDatosInsumo() {

    var nombre = $("#nombre_insumo").val();
    var stock = $("#stock_insumo").val();
    var stock_minimo = $("#stock_min_insumo").val();
    var precio = $("#precio_insumo").val();

    if (nombre.length < 1) {
        $("#nombre_insumo").focus();
        $("#nombre_insumo").addClass("is-invalid");

        $("#nombre_insumo").keypress(function () {
            $("#nombre_insumo").removeClass("is-invalid");
        });
        return;
    }

    if (stock.length < 1) {
        $("#stock_insumo").focus();
        $("#stock_insumo").addClass("is-invalid");

        $("#stock_insumo").keypress(function () {
            $("#stock_insumo").removeClass("is-invalid");
        });
        return;
    }

    if (stock_minimo.length < 1) {
        $("#stock_min_insumo").focus();
        $("#stock_min_insumo").addClass("is-invalid");

        $("#stock_min_insumo").keypress(function () {
            $("#stock_min_insumo").removeClass("is-invalid");
        });
        return;
    }

    if (precio.length < 1) {
        $("#precio_insumo").focus();
        $("#precio_insumo").addClass("is-invalid");

        $("#precio_insumo").keypress(function () {
            $("#precio_insumo").removeClass("is-invalid");
        });
        return;
    }



    var datos = "nombre=" + nombre + "&stock=" + stock + "&stock_minimo=" + stock_minimo + "&precio=" + precio;

//    alert(datos);

    $.ajax({
        type: "POST",
        async: false,
        cache: false,
        url: "../controladores/ControladorInsumo.php",
        data: datos,
        success: function (datos) {
//            alert(datos);
        }
    });

    MostrarListaInsumos();
    CerrarModalInsumo();
    ResetModalInsumo();

}

function CerrarModalInsumo() {
    $('#ModalInsumo').modal('hide');
    if ($('.modal-backdrop').is(':visible')) {
        $('body').removeClass('modal-open');
        $('.modal-backdrop').remove();
    };
}

function ResetModalInsumo() {
    $('#ModalInsumo').on('hidden.bs.modal', function () {
        $(this).find('form').trigger('reset');
        $("#nombre_insumo").removeClass("is-invalid");
        $("#stock_insumo").removeClass("is-invalid");
        $("#stock_min_insumo").removeClass("is-invalid");
        $("#precio_insumo").removeClass("is-invalid");
    });
}


//------------------------------------ MODIFICAR ---------------------------------------

$(document).on('click', '.modificar-datos-insumo', function () {

    //alert('hola');
    var r = [];
    var valores = [];
    var i = 0;
    // Obtenemos todos los valores contenidos en los <td> de la fila
    // seleccionada
    $(this).parents("tr").find("td").each(function () {

        $(this).closest('tr').find("td").text();

        if ($(this).is('.fila')) {
            valores[i] = $(this).text();
            i++;
        }
    });

    r = valores;
    //alert(r);
    var codigo_insumo = r[0];
    var nombre = r[1];
    var stock = r[2];
    var stock_minimo = r[3];
    var precio = r[4];
    

    $("#modal-insumo-edit").text('Modificar Insumo');
    $("#codigo_insumo").val(codigo_insumo);
    $("#nombre_insumo").val(nombre);
    $("#stock_insumo").val(stock);
    $("#stock_min_insumo").val(stock_minimo);
    $("#precio_insumo").val(precio);


    $('.guardar').css('display', 'none');
    $(".modificar").css('display', 'block');

    $("#ModalInsumo").modal('show');

    /*$("#ModalUsuario").on('shown.bs.modal', function(){
     $("#nombre_usuario").focus();
     });*/


});

function ModificarDatosInsumo() {

    //alert('hola');

    var codigo_insumo = $("#codigo_insumo").val();
    var nombre = $("#nombre_insumo").val();
    var stock = $("#stock_insumo").val();
    var stock_minimo = $("#stock_min_insumo").val();
    var precio = $("#precio_insumo").val();


    if (nombre.length < 1) {
        $("#nombre_insumo").focus();
        $("#nombre_insumo").addClass("is-invalid");

        $("#nombre_insumo").keypress(function () {
            $("#nombre_insumo").removeClass("is-invalid");
        });
        return;
    }

    if (stock.length < 1) {
        $("#stock_insumo").focus();
        $("#stock_insumo").addClass("is-invalid");

        $("#stock_insumo").keypress(function () {
            $("#stock_insumo").removeClass("is-invalid");
        });
        return;
    }

    if (stock_minimo.length < 1) {
        $("#stock_min_insumo").focus();
        $("#stock_min_insumo").addClass("is-invalid");

        $("#stock_min_insumo").keypress(function () {
            $("#stock_min_insumo").removeClass("is-invalid");
        });
        return;
    }

    if (precio.length < 1) {
        $("#precio_insumo").focus();
        $("#precio_insumo").addClass("is-invalid");

        $("#precio_insumo").keypress(function () {
            $("#precio_insumo").removeClass("is-invalid");
        });
        return;
    }


    var datos = "up_id=" + codigo_insumo + "&up_nombre=" + nombre + "&up_stock=" + stock
    + "&up_stock_minimo=" + stock_minimo + "&up_precio=" + precio;

    //alert(datos);

    $.ajax({
        type: "POST",
        async: false,
        cache: false,
        url: "../controladores/ControladorInsumo.php",
        data: datos,
        success: function (datos) {
//            alert(datos);
        }
    });

    MostrarListaInsumos();
    CerrarModalInsumo();
    ResetModalInsumo();

}


//---------------------------------------- ELIMINAR DATOS DEL USUARIO --------------------------------------------

$(document).on('click', '.eliminar-datos-insumo', function () {

    var r = [];
    var valores = [];
    var i = 0;
    // Obtenemos todos los valores contenidos en los <td> de la fila
    // seleccionada
    $(this).parents("tr").find("td").each(function () {

        $(this).closest('tr').find("td").text();

        if ($(this).is('.fila')) {
            valores[i] = $(this).text();
            i++;
        }
    });

    r = valores;
//	alert(r);

    var codigo_insumo = r[0];


    $('#id_insumo_delete').val(codigo_insumo);
    $('#ModalEliminarInsumo').modal('show');

});

function EliminarDatosInsumo() {

//	alert('hola');

    var codigo_insumo = $("#id_insumo_delete").val();

    var datos = "id_delete=" + codigo_insumo;

	//alert(datos);

    $.ajax({
        type: "POST",
        async: false,
        cache: false,
        url: "../controladores/ControladorInsumo.php",
        data: datos,
        success: function (datos) {
            //alert(datos);
        }
    });

    MostrarListaInsumos();

    $('#ModalEliminarInsumo').modal('hide');
    if ($('.modal-backdrop').is(':visible')) {
        $('body').removeClass('modal-open');
        $('.modal-backdrop').remove();
    }

}










