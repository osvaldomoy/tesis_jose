// ----------------------------- AÑADIR ----------------------------------------

$(document).on('click', '#btn-anhadir-cliente-automovil', function () {

    CargarClienteAutomovil();
    CargarAutoAutomovil();
    ResetModalClienteAutomovil();
});

// CARGAR NOMBRE DE LOS CLIENTES

function CargarClienteAutomovil() {

    var contenido = "";

    $.ajax({
        type: "POST",
        async: false,
        cache: false,
        url: "../controladores/ControladorCliente.php",
        data: "lista_cliente=1",
        success: function (datos) {
            contenido += datos;
        }
    });

    $("#cliente_automovil_nombre").html(contenido);
}

//CARGAR AUTOMOVILES

function CargarAutoAutomovil() {

    var contenido = "";

    $.ajax({
        type: "POST",
        async: false,
        cache: false,
        url: "../controladores/ControladorAutomovil.php",
        data: "lista_auto=1",
        success: function (datos) {
            contenido += datos;
        }
    });

    $("#cliente_automovil_auto").html(contenido);
}

function GuardarDatosClienteAutomovil() {

    var id_cliente_automovil = $("#id_cliente_automovil").val();
    var id_cliente = $("#cliente_automovil_nombre").val();
    var id_automovil = $("#cliente_automovil_auto").val();
    var chapa = $("#cliente_automovil_chapa").val();
    var b_chapa = dameChapa(chapa);

    if (id_cliente == null) {

        $("#cliente_automovil_nombre").focus();
        $("#cliente_automovil_nombre").addClass("is-invalid");

        $("#cliente_automovil_nombre").click(function () {
            $("#cliente_automovil_nombre").removeClass("is-invalid");
        });
        return;

    }

    if (id_automovil == null) {

        $("#cliente_automovil_auto").focus();
        $("#cliente_automovil_auto").addClass("is-invalid");

        $("#cliente_automovil_auto").click(function () {
            $("#cliente_automovil_auto").removeClass("is-invalid");
        });
        return;

    }

    if (chapa.length < 1) {

        $("#cliente_automovil_chapa").focus();
        $("#cliente_automovil_chapa").addClass("is-invalid");

        $("#cliente_automovil_chapa").keypress(function () {
            $("#cliente_automovil_chapa").removeClass("is-invalid");
        });
        return;

    }

    if (chapa == b_chapa) {

        alert('Ya hay un vehiculo con esa chapa');

        $("#cliente_automovil_chapa").focus();
        $("#cliente_automovil_chapa").addClass("is-invalid");

        $("#cliente_automovil_chapa").keypress(function () {
            $("#cliente_automovil_chapa").removeClass("is-invalid");
        });
        return;

    }

    var datos = "&id_cliente=" + id_cliente + "&id_automovil=" + id_automovil +
            "&chapa=" + chapa;

    $.ajax({
        type: "POST",
        async: false,
        cache: false,
        url: "../controladores/ControladorClienteAutomovil.php",
        data: datos,
        success: function (datos) {

        }
    });

    MostrarListaClientesAutomoviles();
    CerrarModalClienteAutomovil();
    ResetModalClienteAutomovil();

}

// BUSCAR CHAPA PARA COMPARAR CON LA CHAPA INGRESADA

function dameChapa(nombre) {

    var valor = 5;

    var datos = "nombre_chapa=" + nombre;

    //alert(datos);
    $.ajax({
        type: "POST",
        async: false,
        cache: false,
        url: "../controladores/ControladorClienteAutomovil.php",
        data: datos,
        success: function (datos) {
            valor = datos;
        }
    });

    return valor;
}

function CerrarModalClienteAutomovil() {
    $('#ModalClienteAutomovil').modal('hide');
    if ($('.modal-backdrop').is(':visible')) {
        $('body').removeClass('modal-open');
        $('.modal-backdrop').remove();
    }
}

function ResetModalClienteAutomovil() {
    $('#ModalClienteAutomovil').on('hidden.bs.modal', function () {
        $("#ModalClienteAutomovil").trigger('reset');
        $("#cliente_automovil_nombre").removeClass("is-invalid");
        $("#cliente_automovil_auto").removeClass("is-invalid");
        $("#cliente_automovil_chapa").removeClass("is-invalid");
        $("#cliente_automovil_nombre").attr("required", "required");
        $("#cliente_automovil_nombre option:selected").attr("value disabled selected");
        $("#cliente_automovil_auto").attr("required", "required");
        $("#cliente_automovil_auto option:selected").attr("value disabled selected");
    });
}

//------------------------- MODIFICAR --------------------------------------

$(document).on('click', '.modificar-datos-cliente-automovil', function () {
    var r = []
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
    var id_cliente_automovil = r[0];
    var cliente = r[1];
    var automovil = r[2];
    var chapa = r[3];
    CargarClienteAutomovil();
    CargarAutoAutomovil();

    $(".modal-title").text('Modificar Cliente - Automovil');
    $("#id_cliente_automovil").val(id_cliente_automovil);
    var id_cliente = proporcionaIdCliente(id_cliente_automovil);
    var id_automovil = proporcionaIdAutomovil(id_cliente_automovil);
    $("#cliente_automovil_nombre option:selected").removeAttr("value disabled selected");
    $("#cliente_automovil_auto option:selected").removeAttr("value disabled selected");
    $("#cliente_automovil_nombre").removeAttr("required");
    $("#cliente_automovil_auto").removeAttr("required");
    $("#cliente_automovil_nombre option:selected").text(cliente);
    $("#cliente_automovil_nombre option:selected").val(id_cliente);
    $("#cliente_automovil_auto option:selected").text(automovil);
    $("#cliente_automovil_auto option:selected").val(id_automovil);
    $("#cliente_automovil_chapa").val(chapa);


    $('.guardar').css('display', 'none');
    $(".modificar").css('display', 'block');

    $("#ModalClienteAutomovil").modal('show');
});

//PROPORCIONAR ID_CLIENTE EN BASE A ID_CIENTE_AUTOMOVIL

function proporcionaIdCliente(id) {
    
    var valor = 5;

    var datos = "id_cliente_automovil=" + id;

    $.ajax({
        type: "POST",
        async: false,
        cache: false,
        url: "../controladores/ControladorClienteAutomovil.php",
        data: datos,
        success: function (datos) {
            valor = datos;
        }
    });

    return valor;
    
}

//PROPORCIONAR ID_AUTOMOVIL EN BASE A ID_CIENTE_AUTOMOVIL

function proporcionaIdAutomovil(id) {
    
    var valor = 5;

    var datos = "id_cliente_automovil_auto=" + id;

    $.ajax({
        type: "POST",
        async: false,
        cache: false,
        url: "../controladores/ControladorClienteAutomovil.php",
        data: datos,
        success: function (datos) {
            valor = datos;
        }
    });

    return valor;
    
}

function ModificarDatosClienteAutomovil() {

    var id_cliente_automovil = $("#id_cliente_automovil").val();
    var id_cliente = $("#cliente_automovil_nombre").val();
    var id_automovil = $("#cliente_automovil_auto").val();
    var chapa = $("#cliente_automovil_chapa").val();
    var b_chapa_fila = dameChapaFila(id_cliente_automovil);
        
    if (chapa != b_chapa_fila) {

        var b_chapa = dameChapa(chapa);

        if (chapa == b_chapa) {

            alert('Ya hay un vehiculo con esa chapa');

            $("#cliente_automovil_chapa").focus();
            $("#cliente_automovil_chapa").addClass("is-invalid");

            $("#cliente_automovil_chapa").keypress(function () {
                $("#cliente_automovil_chapa").removeClass("is-invalid");
            });
            return;
        }
    }

    var datos = "up_id=" + id_cliente_automovil + "&up_id_cliente=" + id_cliente +
            "&up_id_automovil=" + id_automovil + "&up_chapa=" + chapa;

    //alert(datos);

    $.ajax({
        type: "POST",
        async: false,
        cache: false,
        url: "../controladores/ControladorClienteAutomovil.php",
        data: datos,
        success: function (datos) {
            //alert(datos);
        }
    });

    MostrarListaClientesAutomoviles();
    CerrarModalClienteAutomovil();
    ResetModalClienteAutomovil();

}

//BUSCAR SI LA CHAPA INGRESADA ES IGUAL A LA CHAPA DE LA FILA EN LA BD

function dameChapaFila(nombre) {
    
    var valor = 5;

    var datos = "id_chapa=" + nombre;

    //alert(datos);
    $.ajax({
        type: "POST",
        async: false,
        cache: false,
        url: "../controladores/ControladorClienteAutomovil.php",
        data: datos,
        success: function (datos) {
            valor = datos;
        }
    });

    return valor;
    
}

//---------------------------------------- ELIMINAR --------------------------------------------

$(document).on('click', '.eliminar-datos-cliente-automovil', function () {

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

    var id_cliente_automovil = r[0];


    $('#id_cliente_automovil_delete').val(id_cliente_automovil);
    $('#ModalEliminarClienteAutomovil').modal('show');

});

function EliminarDatosClienteAutomovil() {

    //alert('hola');

    var id_automovil_cliente = $("#id_cliente_automovil_delete").val();

    var datos = "id_delete=" + id_automovil_cliente;

    //alert(datos);

    $.ajax({
        type: "POST",
        async: false,
        cache: false,
        url: "../controladores/ControladorClienteAutomovil.php",
        data: datos,
        success: function (datos) {
            //alert(datos);
        }
    });

    MostrarListaClientesAutomoviles();

    $('#ModalEliminarClienteAutomovil').modal('hide');
    if ($('.modal-backdrop').is(':visible')) {
        $('body').removeClass('modal-open');
        $('.modal-backdrop').remove();
    }

    ResetModalClienteAutomovil();
}