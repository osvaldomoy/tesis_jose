//--------------------------- CLIENTES -------------------------------------------------

function MostrarMenuClientes() {

    document.getElementById("contenedor-tablas").style.display = "block";
    var contenido = "";
    $.ajax({
        type: "POST",
        async: false,
        cache: false,
        url: "menu_Acciones/Vista_menu_clientes.php",
        success: function (datos) {
            contenido += datos;
        }
    });

    $("#contenedor-tablas").html(contenido);
    MostrarListaClientes();


}

function MostrarListaClientes() {

    var contenido = "<thead class='thead-dark'>" +
            "<tr>" +
            "<th scope='col'>Posición</th>" +
            "<th scope='col'>Nombre</th>" +
            "<th scope='col'>Apellido</th>" +
            "<th scope='col'>Cédula</th>" +
            "<th scope='col'>Teléfono</th>" +
            "<th scope='col'>Correo</th>" +
            "<th scope='col' style='width: 20%;'>Opciones</th>" +
            "</tr>" +
            "</thead>";
    $.ajax({
        type: "POST",
        async: false,
        cache: false,
        url: "../controladores/ControladorCliente.php",
        data: "lista=123",

        success: function (datos) {

            contenido += datos;
        }
    });

    $("#lista-clientes").html(contenido);

}

//------------------------------------ USUARIO ------------------------------------------------

function MostrarMenuUsuarios() {

    document.getElementById("contenedor-tablas").style.display = "block";
    var contenido = "";
    $.ajax({
        type: "POST",
        async: false,
        cache: false,
        url: "menu_Acciones/Vista_menu_usuarios.php",
        success: function (datos) {
            contenido += datos;
        }
    });

    $("#contenedor-tablas").html(contenido);
    MostrarListaUsuarios();

}


function MostrarListaUsuarios() {

    var contenido = "<thead class='thead-dark'>" +
            "<tr>" +
            "<th scope='col'>Posición</th>" +
            "<th scope='col'>Nombre</th>" +
            "<th scope='col'>Apellido</th>" +
            "<th scope='col'>Usuario</th>" +
            "<th scope='col' style='width: 20%;'>Opciones</th>" +
            "</tr>" +
            "</thead>";
    $.ajax({
        type: "POST",
        async: false,
        cache: false,
        url: "../controladores/ControladorUsuario.php",
        data: "lista=123",

        success: function (datos) {

            contenido += datos;
        }
    });

    $("#lista-usuario").html(contenido);

}

//--------------------------------- AUTOMOVILES -----------------------------------

function MostrarMenuAutomoviles() {

    document.getElementById("contenedor-tablas").style.display = "block";
    var contenido = "";
    $.ajax({
        type: "POST",
        async: false,
        cache: false,
        url: "menu_Acciones/Vista_menu_automovil.php",
        success: function (datos) {
            contenido += datos;
        }
    });

    $("#contenedor-tablas").html(contenido);
    MostrarListaAutomoviles();

}

function MostrarListaAutomoviles() {

    var contenido = "<thead class='thead-dark'>" +
            "<tr>" +
            "<th scope='col'>Posición</th>" +
            "<th scope='col'>Marca</th>" +
            "<th scope='col'>Modelo</th>" +
            "<th scope='col'>Año</th>" +
            "<th scope='col' style='width: 20%;'>Opciones</th>" +
            "</tr>" +
            "</thead>";
    $.ajax({
        type: "POST",
        async: false,
        cache: false,
        url: "../controladores/ControladorAutomovil.php",
        data: "lista=123",

        success: function (datos) {
            contenido += datos;
        }
    });

    $("#lista-automovil").html(contenido);

}

//--------------------------------- CLIENTES - AUTOMOVILES -----------------------------------

function MostrarMenuClientesAutomoviles() {

    document.getElementById("contenedor-tablas").style.display = "block";
    var contenido = "";
    $.ajax({
        type: "POST",
        async: false,
        cache: false,
        url: "menu_Acciones/Vista_menu_clientes_automovil.php",
        success: function (datos) {
            contenido += datos;
        }
    });

    $("#contenedor-tablas").html(contenido);
    MostrarListaClientesAutomoviles();

}

function MostrarListaClientesAutomoviles() {


    var contenido = "<thead class='thead-dark'>" +
            "<tr>" +
            "<th scope='col'>Posición</th>" +
            "<th scope='col'>Cliente</th>" +
            "<th scope='col'>Automovil</th>" +
            "<th scope='col'>Chapa</th>" +
            "<th scope='col' style='width: 20%;'>Opciones</th>" +
            "</tr>" +
            "</thead>";
    $.ajax({
        type: "POST",
        async: false,
        cache: false,
        url: "../controladores/ControladorClienteAutomovil.php",
        data: "lista=123",

        success: function (datos) {
            contenido += datos;
        }
    });

    $("#lista-cliente-automovil").html(contenido);

}

//--------------------------------- MARCA -------------------------------------

function MostrarMenuMarcas() {

    document.getElementById("contenedor-tablas").style.display = "block";
    var contenido = "";
    $.ajax({
        type: "POST",
        async: false,
        cache: false,
        url: "menu_Acciones/Vista_menu_marca.php",
        success: function (datos) {
            contenido += datos;
        }
    });

    $("#contenedor-tablas").html(contenido);
    MostrarListaMarcas();

}


function MostrarListaMarcas() {

    var contenido = "<thead class='thead-dark'>" +
            "<tr>" +
            "<th scope='col'>Posición</th>" +
            "<th scope='col'>Marca</th>" +
            "<th scope='col' style='width: 20%;'>Opciones</th>" +
            "</tr>" +
            "</thead>";
    $.ajax({
        type: "POST",
        async: false,
        cache: false,
        url: "../controladores/ControladorMarca.php",
        data: "lista=123",

        success: function (datos) {

            contenido += datos;
        }
    });

    $("#lista-marca").html(contenido);

}

//-------------------------------- MODELO ----------------------------------------

function MostrarMenuModelos() {

    document.getElementById("contenedor-tablas").style.display = "block";
    var contenido = "";
    $.ajax({
        type: "POST",
        async: false,
        cache: false,
        url: "menu_Acciones/Vista_menu_modelo.php",
        success: function (datos) {
            contenido += datos;
        }
    });

    $("#contenedor-tablas").html(contenido);
    MostrarListaModelos();

}

function MostrarListaModelos() {

    var contenido = "<thead class='thead-dark'>" +
            "<tr>" +
            "<th scope='col'>Posición</th>" +
            "<th scope='col'>Modelo</th>" +
            "<th scope='col' style='width: 20%;'>Opciones</th>" +
            "</tr>" +
            "</thead>";
    $.ajax({
        type: "POST",
        async: false,
        cache: false,
        url: "../controladores/ControladorModelo.php",
        data: "lista=123",

        success: function (datos) {
            contenido += datos;
        }
    });

    $("#lista-modelo").html(contenido);

}

//------------------------------- SERVICIOS ---------------------------------------------

function MostrarMenuServicios() {

    document.getElementById("contenedor-tablas").style.display = "block";
    var contenido = "";
    $.ajax({
        type: "POST",
        async: false,
        cache: false,
        url: "menu_Acciones/Vista_menu_servicio.php",
        success: function (datos) {
            contenido += datos;
        }
    });

    $("#contenedor-tablas").html(contenido);
    MostrarListaServicios();

}

function MostrarListaServicios() {

    var contenido = "<thead class='thead-dark'>" +
            "<tr>" +
            "<th scope='col'>Posición</th>" +
            "<th scope='col'>Descripción</th>" +
            "<th scope='col'>Precio</th>" +
            "<th scope='col'>Tiempo</th>" +
            "<th scope='col' style='width: 20%;'>Opciones</th>" +
            "</tr>" +
            "</thead>";
    $.ajax({
        type: "POST",
        async: false,
        cache: false,
        url: "../controladores/ControladorServicio.php",
        data: "lista_servicio=123",

        success: function (datos) {
            contenido += datos;
        }
    });

    $("#lista-servicio").html(contenido);

}

//------------------------------- INSUMOS ------------------------------------------------

function MostrarMenuInsumos() {

    document.getElementById("contenedor-tablas").style.display = "block";
    var contenido = "";
    $.ajax({
        type: "POST",
        async: false,
        cache: false,
        url: "menu_Acciones/Vista_menu_insumos.php",
        success: function (datos) {
            contenido += datos;
        }
    });

    $("#contenedor-tablas").html(contenido);
    MostrarListaInsumos();

}

function MostrarListaInsumos() {


    var contenido = "<thead class='thead-dark'>" +
            "<tr>" +
            "<th scope='col'>Posición</th>" +
            "<th scope='col'>Nombre</th>" +
            "<th scope='col'>Stock</th>" +
            "<th scope='col'>Stock Mínimo</th>" +
            "<th scope='col'>Precio</th>" +
            "<th scope='col' style='width: 20%;'>Opciones</th>" +
            "</tr>" +
            "</thead>";
    $.ajax({
        type: "POST",
        async: false,
        cache: false,
        url: "../controladores/ControladorInsumo.php",
        data: "lista=123",

        success: function (datos) {
            contenido += datos;
        }
    });

    $("#lista-insumo").html(contenido);

}

//------------------------------- INSUMOS - SERVICIOS ------------------------------------------------

function MostrarMenuInsumos_Servicios() {

    document.getElementById("contenedor-tablas").style.display = "block";
    var contenido = "";
    $.ajax({
        type: "POST",
        async: false,
        cache: false,
        url: "menu_Acciones/Vista_menu_servicios_insumos.php",
        success: function (datos) {
            contenido += datos;
        }
    });

    $("#contenedor-tablas").html(contenido);
    MostrarListaServiciosInsumos();

}

//----------------- FILTRAR SERVICIO -----------------------------

function FiltrarServicio() {
    //alert('hola');

    var filtroInput = $('#buscador-servicio').val();
    filtroInput = filtroInput.trim();
    if (filtroInput.length > 0) {
        $('#resultados').css('display', 'block');
        var datos = "dame_filtro=" + filtroInput;
        $.ajax({
            type: 'POST',
            async: false,
            url: '../controladores/ControladorServicio.php',
            data: datos,
            success: function (data) {
                $('#resultados').html(data);
            }
        });
    } else {
        $('#resultados').css('display', 'none');
    }

}

function ValidarFiltroServicio() {
    
    var f_servicio = $('.caja_filtro_servicio').text();
    
    if (f_servicio == '') {
        $('#resultados').attr('disabled', 'disabled');
        $('#resultados').onclick = null;
    } else {
        $('.caja_filtro_servicio').css('cursor', 'pointer');
        $('.caja_filtro_servicio').removeAttr('disabled');
    }

}

$(document).on('click', '.caja_filtro_servicio', () => {
    var filtro = $(event.target).closest('div').text();
    if (filtro != 'No hay datos') {
        $('#buscador-servicio').val(filtro);
        $('#resultados').css('display', 'none');
    }
});

//----------------- FILTRAR AUTOMOVIL -----------------------------

function FiltrarAutomovil() {
    //alert('hola');

    var filtroInput = $('#buscador-automovil').val();
    filtroInput = filtroInput.trim();
    if (filtroInput.length > 0) {
        $('#resultados-automovil').css('display', 'block');
        var datos = "dame_filtro_auto=" + filtroInput;
        $.ajax({
            type: 'POST',
            async: false,
            url: '../controladores/ControladorAutomovil.php',
            data: datos,
            success: function (data) {
                $('#resultados-automovil').html(data);
            }
        });
    } else {
        $('#resultados-automovil').css('display', 'none');
    }

}

function ValidarFiltroAutomovil() {
    
    var f_automovil = $('.caja_filtro_automovil').text();
    
    if (f_automovil == '') {
        $('#resultados-automovil').attr('disabled', 'disabled');
        $('#resultados-automovil').onclick = null;
    } else {
        $('#caja_filtro_automovil').css('cursor', 'pointer');
        $('#caja_filtro_automovil').removeAttr('disabled');
    }

}

$(document).on('click', '.caja_filtro_automovil', () => {
    var filtro = $(event.target).closest('div').text();
    if (filtro != 'No hay datos') {
        $('#buscador-automovil').val(filtro);
        $('#resultados-automovil').css('display', 'none');
    }
});








