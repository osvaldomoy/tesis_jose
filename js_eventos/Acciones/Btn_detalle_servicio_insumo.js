//-------------------- VALIDADR Y LISTAR DATOS --------------------------------

function ValidarServicioInsumo() {

    var servicio = $('#buscador-servicio').val();
    var automovil = $('#buscador-automovil').val();
    var detalle_identidad = "";
    
    
//    alert(servicio + ' ' + automovil);
    if (servicio.length < 1) {
        alert('No se seleccionó el servicio');
        $('#buscador-servicio').focus();
        return;
    }

    if (automovil.length < 1) {
        alert('No se selecciono el automovil');
        $('#buscador-automovil').focus();
        return;
    }

    var datos = 'servicio=' + servicio + '&automovil=' + automovil;
//    alert(datos);

    
    var contenido = "<table>" +
            "<thead class='thead-dark'>" +
            "<tr>" +
            "<th scope='col'>Posición</th>" +
            "<th scope='col'>Insumo</th>" +
            "<th scope='col'>Cantidad</th>" +
            "<th scope='col' style='width: 20%;'>Opciones</th>" +
            "</tr>" +
            "</thead>";

    $.ajax({
        type: "POST",
        async: false,
        cache: false,
        url: "../controladores/ControladorServicioInsumo.php",
        data: datos,
        success: function (datos) {
//            alert(datos);
            contenido += datos;
        }
    });
    $("#lista-insumo-servicio").html(contenido);

    $.ajax({
        type: "POST",
        async: false,
        cache: false,
        url: "../controladores/ControladorServicioInsumo.php",
        data: "servicio_cod=" + servicio + "&automovil_cod=" + automovil,
        success: function (datos) {
            //alert(datos);
            detalle_identidad = datos;
        }
    });
    
    $("#btn-anhadir-servicio-insumo").css('display', 'block');
    $(".auto_servicio_contenedor").css('display', 'block');
    $(".auto_servicio_contenedor").css('text-align', 'left');
    //$(".auto_servicio_contenedor").css('justify-content', 'space-around');
    $(".auto_servicio_contenedor").html("<h3>Automovil: <b id='auto-text'>" + automovil + "</b></h3>\n\
    <h3>Servicio: <b id='servicio-text'>" + servicio + "</b></h3>\n\
    <h3>Código de identidad: <b id='identidad-text'>"+ detalle_identidad +"</b></h3>");

}

$(document).on('click', '#btn-anhadir-servicio-insumo', function () {
    //alert('hola');

    var servicio = $('#servicio-text').text();
    var automovil = $('#auto-text').text();
    var id_servicio = dameIdServicio(servicio);
    var id_automovil = dameIdAutomovil(automovil);

    CargarInsumo();
});

function dameIdServicio(nombre) {
    var valor = 'tres';
    $.ajax({
        type: "POST",
        async: false,
        cache: false,
        url: "../controladores/ControladorServicio.php",
        data: 'nombre=' + nombre,
        success: function (datos) {
            valor = datos;
        }
    });

    $('#id_servicio_detalle').val(valor);
    return valor;
}

function dameIdAutomovil(nombre) {
    var valor = 'tres';
    $.ajax({
        type: "POST",
        async: false,
        cache: false,
        url: "../controladores/ControladorAutomovil.php",
        data: 'nombre=' + nombre,
        success: function (datos) {
            valor = datos;
        }
    });

    $('#id_automovil_detalle').val(valor);
    return valor;
}

function CargarInsumo() {

    var contenido = "";

    $.ajax({
        type: "POST",
        async: false,
        cache: false,
        url: "../controladores/ControladorInsumo.php",
        data: "insumo=1",
        success: function (datos) {
            contenido += datos;
        }
    });

    $("#descripcion_insumo_detalle").html(contenido);
}

function GuardarDatosServicioInsumo() {

    var id_insumo = $('#descripcion_insumo_detalle').val();
    var automovil = $('#auto-text').text();
    var servicio = $('#servicio-text').text();
    var id_automovil = $('#id_automovil_detalle').val();
    var id_servicio = $('#id_servicio_detalle').val();
    var cantidad = $('#cantidad_insumo').val();
    var codigo_detalle = $('#identidad-text').text();
    //alert(codigo_detalle);
    
    if(codigo_detalle == 'Sin código'){
        var ulti_cod = obtenerUltimoCodigoDetalle();
        var srt = ulti_cod;
        var res = srt.substring(1);
        var new_codigo_detalle = 'A' + (parseInt(res) + 1);
        codigo_detalle = new_codigo_detalle;
        //alert(codigo_detalle);
    }/*else{
        alert(codigo_detalle);
    }*/

    if (id_insumo == null) {
        alert('Seleccione el insumo');
        $("#descripcion_insumo_detalle").addClass("is-invalid");

        $("#descripcion_insumo_detalle").click(function () {
            $("#descripcion_insumo_detalle").removeClass("is-invalid");
        });
        return;
    }

    if (cantidad == "") {
        $("#cantidad_insumo").focus();
        $("#cantidad_insumo").addClass("is-invalid");

        $("#cantidad_insumo").click(function () {
            $("#cantidad_insumo").removeClass("is-invalid");
        });
        return;
    }

    var datos = "id_insumo=" + id_insumo + "&id_automovil=" + id_automovil +
            "&id_servicio=" + id_servicio + "&cantidad=" + cantidad + "&codigo_identidad=" + codigo_detalle;
    
    
    $.ajax({
        type: "POST",
        async: false,
        cache: false,
        url: "../controladores/ControladorServicioInsumo.php",
        data: datos,
        success: function (datos) {
            //alert(datos);
        }
    });

    actualizarCodigoIdentidad(id_automovil, id_servicio);
    MostrarListaServicioInsumo(automovil, servicio);
    CerrarModalServicioInsumo();
    ResetModalServicioInsumo();

}

function obtenerUltimoCodigoDetalle() {
    
    var ultimo_cod = "";
    
    $.ajax({
        type: "POST",
        async: false,
        cache: false,
        url: "../controladores/ControladorServicioInsumo.php",
        data: 'ultimo=1',
        success: function (datos) {
            ultimo_cod = datos;
        }
    });
    
    return ultimo_cod;
}

function MostrarListaServicioInsumo(auto, servicio) {

    var datos = "automovil=" + auto + "&servicio=" + servicio;

    var contenido = "<table>" +
            "<thead class='thead-dark'>" +
            "<tr>" +
            "<th scope='col'>Posición</th>" +
            "<th scope='col'>Insumo</th>" +
            "<th scope='col'>Cantidad</th>" +
            "<th scope='col' style='width: 20%;'>Opciones</th>" +
            "</tr>" +
            "</thead>";

    $.ajax({
        type: "POST",
        async: false,
        cache: false,
        url: "../controladores/ControladorServicioInsumo.php",
        data: datos,
        success: function (datos) {
//            alert(datos);
            contenido += datos;
        }
    });
    $("#lista-insumo-servicio").html(contenido);

}

function actualizarCodigoIdentidad(id_automovil, id_servicio) {
    
    var contenido = "";
    var datos = "id_auto=" + id_automovil + "&id_servicio=" + id_servicio;

    $.ajax({
        type: "POST",
        async: false,
        cache: false,
        url: "../controladores/ControladorServicioInsumo.php",
        data: datos,
        success: function (datos) {
           contenido = datos;
        }
    });
    $("#identidad-text").html(contenido);
}

function CerrarModalServicioInsumo() {
    $('#ModalServicioInsumo').modal('hide');
    if ($('.modal-backdrop').is(':visible')) {
        $('body').removeClass('modal-open');
        $('.modal-backdrop').remove();
    }
    ;
}

function ResetModalServicioInsumo() {
    $('#ModalServicioInsumo').on('hidden.bs.modal', function () {
        $(this).find('form').trigger('reset');
        $("#descripcion_insumo_detalle").removeClass("is-invalid");
        $("#cantidad_insumo").removeClass("is-invalid");
        $('#descripcion_insumo_detalle :option selected').attr('value disabled selected');
        $('#descripcion_insumo_detalle').attr('required', 'required');
    });
}

//------------------------------------ MODIFICAR ---------------------------------------

$(document).on('click', '.modificar-datos-servicio-insumo', function () {

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
//    alert(r);
    var codigo_detalle = r[0];
    var insumo = r[1];
    var cantidad = r[2];
    CargarInsumo();

    $("#modal-servicio-insumo-edit").text('Modificar Insumo');
    $("#codigo_detalle_servicio_insumo").val(codigo_detalle);
    $("#cantidad_insumo").val(cantidad);
    $("#descripcion_insumo_detalle option:selected").text(insumo);
    $("#descripcion_insumo_detalle").removeAttr("required");

    $('.guardar').css('display', 'none');
    $(".modificar").css('display', 'block');

    $("#ModalServicioInsumo").modal('show');

    /*$("#ModalUsuario").on('shown.bs.modal', function(){
     $("#nombre_usuario").focus();
     });*/


});

function ModificarDatosServicioInsumo() {

    var id_detalle = $('#codigo_detalle_servicio_insumo').val();
    var id_insumo = $('#descripcion_insumo_detalle').val();
    var automovil = $('#auto-text').text();
    var servicio = $('#servicio-text').text();
    var cantidad = $('#cantidad_insumo').val();

    if (id_insumo == null) {
        alert('Seleccione el insumo');
        $("#descripcion_insumo_detalle").addClass("is-invalid");

        $("#descripcion_insumo_detalle").click(function () {
            $("#descripcion_insumo_detalle").removeClass("is-invalid");
        });
        return;
    }

    if (cantidad == "") {
        $("#cantidad_insumo").focus();
        $("#cantidad_insumo").addClass("is-invalid");

        $("#cantidad_insumo").click(function () {
            $("#cantidad_insumo").removeClass("is-invalid");
        });
        return;
    }

    var datos = "id_detalle=" + id_detalle + "&up_id_insumo=" + id_insumo + "&up_cantidad=" + cantidad;

    $.ajax({
        type: "POST",
        async: false,
        cache: false,
        url: "../controladores/ControladorServicioInsumo.php",
        data: datos,
        success: function (datos) {
//            alert(datos);
        }
    });

    MostrarListaServicioInsumo(automovil, servicio);
    CerrarModalServicioInsumo();
    ResetModalServicioInsumo();

}

//------------------------------------ ELIMINAR ---------------------------------------

$(document).on('click', '.eliminar-datos-servicio-insumo', function () {

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

    var codigo_detalle = r[0];
//    alert(codigo_detalle);

    $('#codigo_detalle_delete').val(codigo_detalle);
    $('#ModalEliminarServicioInsumo').modal('show');

});

function EliminarDatosServicioInsumo() {

    var codigo_detalle = $("#codigo_detalle_delete").val();
    var automovil = $('#auto-text').text();
    var servicio = $('#servicio-text').text();
    var id_automovil = dameIdAutomovil(automovil);
    var id_servicio = dameIdServicio(servicio);
    var datos = "delete_codigo_detalle=" + codigo_detalle;

    $.ajax({
        type: "POST",
        async: false,
        cache: false,
        url: "../controladores/ControladorServicioInsumo.php",
        data: datos,
        success: function (datos) {
//            alert(datos);
        }
    });

    MostrarListaServicioInsumo(automovil, servicio);
    $('#ModalEliminarServicioInsumo').modal('hide');
    if ($('.modal-backdrop').is(':visible')) {
        $('body').removeClass('modal-open');
        $('.modal-backdrop').remove();
    }
    ResetModalServicioInsumo();
    actualizarCodigoIdentidad(id_automovil, id_servicio);
}