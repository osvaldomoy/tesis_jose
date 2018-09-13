//------------------------------- AÑADIR -----------------------------------------


function GuardarDatosServicio() {

    //alert('hola');
    var servicio = $("#descripcion_servicio").val();
    var precio = $("#precio_servicio").val();
    var tiempo_servicio = $("#tiempo_servicio").val();

    if (servicio.length < 1) {
        $("#descripcion_servicio").focus();
        $("#descripcion_servicio").addClass("is-invalid");

        $("#descripcion_servicio").keypress(function () {
            $("#descripcion_servicio").removeClass("is-invalid");
        });
        return;
    }

    if (precio.length < 1) {
        $("#precio_servicio").focus();
        $("#precio_servicio").addClass("is-invalid");

        $("#precio_servicio").keypress(function () {
            $("#precio_servicio").removeClass("is-invalid");
        });
        return;
    }

    if (tiempo_servicio.length < 1) {
        $("#tiempo_servicio").focus();
        $("#tiempo_servicio").addClass("is-invalid");

        $("#tiempo_servicio").keypress(function () {
            $("#tiempo_servicio").removeClass("is-invalid");
        });
        return;
    }

    var datos = "servicio=" + servicio + "&precio=" + precio + "&tiempo_servicio=" + tiempo_servicio;

    // alert(datos);

    $.ajax({
        type: "POST",
        async: false,
        cache: false,
        url: "../controladores/ControladorServicio.php",
        data: datos,
        success: function (datos) {
            //alert(datos);
        }
    });

    MostrarListaServicios();
    CerrarModalServicio();
    ResetModalServicio();

}

function CerrarModalServicio() {
    $('#ModalServicio').modal('hide');
    if ($('.modal-backdrop').is(':visible')) {
        $('body').removeClass('modal-open');
        $('.modal-backdrop').remove();
    }
    ;
}

function ResetModalServicio() {
    $('#ModalServicio').on('hidden.bs.modal', function () {
        $(this).find('form').trigger('reset');
        $("#descripcion_servicio").removeClass("is-invalid");
    });
}


//------------------------------------ MODIFICAR ---------------------------------------

$(document).on('click', '.modificar-datos-servicio', function () {

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
    var codigo_servicio = r[0];
    var descripcion = r[1];
    var precio = r[2];
    var tiempo_servicio = r[3];

    $("#title-servicio-edit").text('Modificar Servicio');
    $("#codigo_servicio").val(codigo_servicio);
    $("#descripcion_servicio").val(descripcion);
    $("#precio_servicio").val(precio);
    $("#tiempo_servicio").val(tiempo_servicio);
    
    $('.guardar').css('display', 'none');
    $(".modificar").css('display', 'block');

    $("#ModalServicio").modal('show');

    /*$("#ModalUsuario").on('shown.bs.modal', function(){
     $("#nombre_usuario").focus();
     });*/


});

function ModificarDatosServicio() {

    //alert('hola');

    var codigo_servicio = $("#codigo_servicio").val();
    var descripcion = $("#descripcion_servicio").val();
    var precio = $("#precio_servicio").val();
    var tiempo_servicio = $("#tiempo_servicio").val();


    if (descripcion.length < 1) {
        $("#descripcion_servicio").focus();
        $("#descripcion_servicio").addClass("is-invalid");

        $("#descripcion_servicio").keypress(function () {
            $("#descripcion_servicio").removeClass("is-invalid");
        });
        return;
    }
    
    if (precio.length < 1) {
        $("#precio_servicio").focus();
        $("#precio_servicio").addClass("is-invalid");

        $("#precio_servicio").keypress(function () {
            $("#precio_servicio").removeClass("is-invalid");
        });
        return;
    }
    
    if (tiempo_servicio.length < 1) {
        $("#tiempo_servicio").focus();
        $("#tiempo_servicio").addClass("is-invalid");

        $("#tiempo_servicio").keypress(function () {
            $("#tiempo_servicio").removeClass("is-invalid");
        });
        return;
    }


    var datos = "up_id=" + codigo_servicio + "&up_descripcion=" + descripcion + "&up_precio=" +
            precio + "&up_tiempo=" + tiempo_servicio;

    //alert(datos);

    $.ajax({
        type: "POST",
        async: false,
        cache: false,
        url: "../controladores/ControladorServicio.php",
        data: datos,
        success: function (datos) {
            //alert(datos);
        }
    });

    MostrarListaServicios();
    CerrarModalServicio();
    ResetModalServicio();

}


//---------------------------------------- ELIMINAR DATOS DE SERVICIO --------------------------------------------

$(document).on('click', '.eliminar-datos-servicio', function () {

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

    var codigo_servicio = r[0];


    $('#id_servicio_delete').val(codigo_servicio);
    $('#ModalEliminarServicio').modal('show');

});

function EliminarDatosServicio() {

//	alert('hola');

    var codigo_servicio = $("#id_servicio_delete").val();

    var datos = "id_delete=" + codigo_servicio;

//	alert(datos);

    $.ajax({
        type: "POST",
        async: false,
        cache: false,
        url: "../controladores/ControladorServicio.php",
        data: datos,
        success: function (datos) {
            //alert(datos);
        }
    });

    MostrarListaServicios();

    $('#ModalEliminarServicio').modal('hide');
    if ($('.modal-backdrop').is(':visible')) {
        $('body').removeClass('modal-open');
        $('.modal-backdrop').remove();
    }

    ResetModalServicio();

}










