//------------------------------- AÑADIR -----------------------------------------

$(document).on('click', '#btn-anhadir-automovil', function() {
    
    CargarMarcaAutomovil();
    CargarModeloAutomovil();
    AnhoAutomovil();
    
});

function GuardarDatosAutomovil() {

    var marca = $("#marca_automovil").val();
    var id_marca = dameIdMarca(marca);
    var modelo = $("#modelo_automovil").val();
    var id_modelo = dameIdModelo(modelo);
    var anho = $("#anho_automovil").val();
    
    if (marca == "") {
        $("#marca_automovil").focus();
        $("#marca_automovil").addClass("is-invalid");

        $("#marca_automovil").click(function () {
            $("#marca_automovil").removeClass("is-invalid");
        });
        return;
    }
    
    if (modelo == "") {
        $("#modelo_automovil").focus();
        $("#modelo_automovil").addClass("is-invalid");

        $("#modelo_automovil").click(function () {
            $("#modelo_automovil").removeClass("is-invalid");
        });
        return;
    }
    
    if (anho == "") {
        $("#anho_automovil").focus();
        $("#anho_automovil").addClass("is-invalid");

        $("#anho_automovil").click(function () {
            $("#anho_automovil").removeClass("is-invalid");
        });
        return;
    }

    var datos = "id_marca=" + id_marca + "&_id_modelo=" + id_modelo + "&anho=" + anho;

    alert(datos);

    $.ajax({
        type: "POST",
        async: false,
        cache: false,
        url: "../controladores/ControladorModelo.php",
        data: datos,
        success: function (datos) {
            //alert(datos);
        }
    });

    MostrarListaAutomoviles();
    CerrarModalAutomovil();
    ResetModalAutomovil();

}

// CARGAR MARCA DE AUTOMOVIL EN EL SELECT

function CargarMarcaAutomovil() {

    var contenido = "";

    $.ajax({
        type: "POST",
        async: false,
        cache: false,
        url: "../controladores/ControladorMarca.php",
        data: "marca=1",
        success: function (datos) {
            contenido += datos;
        }
    });
    
    $("#marca_automovil").html(contenido);
}

//OBTENER ID DE MARCA

function dameIdMarca(nombre) {
    
    var valor = 2;
    $.ajax({
        type: "POST",
        async: false,
        cache: false,
        url: "../controladores/ControladorMarca.php",
        data: "nombre=" + nombre,
        success: function (datos) {
            valor = datos;
        }
    });
    
    return valor;
}

// CARGAR MODELO DE AUTOMOVIL EN EL SELECT

function CargarModeloAutomovil() {

    var contenido = "";

    $.ajax({
        type: "POST",
        async: false,
        cache: false,
        url: "../controladores/ControladorModelo.php",
        data: "modelo=1",
        success: function (datos) {
            contenido += datos;
        }
    });
    
    $("#modelo_automovil").html(contenido);
}

//OBTENER ID DE MODELO

function dameIdModelo(nombre) {
    
    var valor = 2;
    $.ajax({
        type: "POST",
        async: false,
        cache: false,
        url: "../controladores/ControladorModelo.php",
        data: "nombre=" + nombre,
        success: function (datos) {
            valor = datos;
        }
    });
    
    return valor;
}

// ANHO AUTOMOVIL

function AnhoAutomovil() {
    
    var contenido = "<option value=''>Año</option>";
    
    var d = new Date();
    var anho = d.getFullYear();
    
    for(var i=1990; i < anho + 1; i++) {
        
        contenido += "<option>" + i + "</option>";
        
    }
    
    $("#anho_automovil").html(contenido);
    
}

//CERRAR MODAL AUTOMOVIL

function CerrarModalAutomovil() {
    $('#ModalAutomovil').modal('hide');
    if ($('.modal-backdrop').is(':visible')) {
        $('body').removeClass('modal-open');
        $('.modal-backdrop').remove();
    };
}

//RESETEAR MODAL AUTOMOVIL

function ResetModalAutomovil() {
    $('#ModalAutomovil').on('hidden.bs.modal', function () {
        $(this).find('form').trigger('reset');
        $("#id_automovil").removeClass("is-invalid");
        $("#id_marca").removeClass("is-invalid");
        $("#id_modelo").removeClass("is-invalid");
    });
}


//------------------------------------ MODIFICAR ---------------------------------------

$(document).on('click', '.modificar-datos-modelo', function () {

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
    var id_modelo = r[0];
    var descripcion = r[1];

    $("#modal-modelo-edit").text('Modificar Modelo');
    $("#id_modelo").val(id_modelo);
    $("#descripcion_modelo").val(descripcion);


    $('.guardar').css('display', 'none');
    $(".modificar").css('display', 'block');

    $("#ModalModelo").modal('show');

    /*$("#ModalUsuario").on('shown.bs.modal', function(){
     $("#nombre_usuario").focus();
     });*/


});

function ModificarDatosModelo() {

    //alert('hola');

    var id_modelo = $("#id_modelo").val();
    var descripcion = $("#descripcion_modelo").val();


    if (descripcion.length < 1) {
        $("#descripcion_modelo").focus();
        $("#descripcion_modelo").addClass("is-invalid");

        $("#descripcion_modelo").keypress(function () {
            $("#descripcion_modelo").removeClass("is-invalid");
        });
        return;
    }


    var datos = "up_id=" + id_modelo + "&up_descripcion=" + descripcion;

    //alert(datos);

    $.ajax({
        type: "POST",
        async: false,
        cache: false,
        url: "../controladores/ControladorModelo.php",
        data: datos,
        success: function (datos) {
            //alert(datos);
        }
    });

    MostrarListaModelos();
    CerrarModalModelo();
    ResetModalModelo();

}


//---------------------------------------- ELIMINAR DATOS DEL USUARIO --------------------------------------------

$(document).on('click', '.eliminar-datos-modelo', function () {

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

    var id_modelo = r[0];
    var descripcion = r[1];


    $('#id_modelo_delete').val(id_modelo);
    $('#ModalEliminarModelo').modal('show');

});

function EliminarDatosModelo() {

//	alert('hola');

    var id_modelo = $("#id_modelo_delete").val();

    var datos = "id_delete=" + id_modelo;

//	alert(datos);

    $.ajax({
        type: "POST",
        async: false,
        cache: false,
        url: "../controladores/ControladorModelo.php",
        data: datos,
        success: function (datos) {
            //alert(datos);
        }
    });

    MostrarListaModelos();

    $('#ModalEliminarModelo').modal('hide');
    if ($('.modal-backdrop').is(':visible')) {
        $('body').removeClass('modal-open');
        $('.modal-backdrop').remove();
    }

    ResetModalModelo();

}










