//------------------------------- AÑADIR -----------------------------------------

$(document).on('click', '#btn-anhadir-automovil', function() {
    
    //$("#modelo_automovil").attr("required");
    $("#marca_automovil").change(function() {
        
        var marca = $("#marca_automovil").val();
        var id_marca = dameIdMarca(marca);

        CargarIdModeloPorIdMarca(id_marca);
        
    });
    
    CargarMarcaAutomovil();
    AnhoAutomovil();
    
});

function GuardarDatosAutomovil() {
    
    var marca = $("#marca_automovil").val();
    var id_marca = dameIdMarca(marca);
    var modelo = $("#modelo_automovil").val();
    var id_modelo = dameIdModelo(modelo);
    var anho = $("#anho_automovil").val();
    
    if (marca == null) {
        $("#marca_automovil").focus();
        $("#marca_automovil").addClass("is-invalid");

        $("#marca_automovil").click(function () {
            $("#marca_automovil").removeClass("is-invalid");
        });
        return;
    }
    
    if (modelo == null) {
        $("#modelo_automovil").focus();
        $("#modelo_automovil").addClass("is-invalid");

        $("#modelo_automovil").click(function () {
            $("#modelo_automovil").removeClass("is-invalid");
        });
        return;
    }
    
    if (anho == null) {
        $("#anho_automovil").focus();
        $("#anho_automovil").addClass("is-invalid");

        $("#anho_automovil").click(function () {
            $("#anho_automovil").removeClass("is-invalid");
        });
        return;
    }

    var datos = "id_marca=" + id_marca + "&id_modelo=" + id_modelo + "&anho=" + anho;

    //alert(datos);

    $.ajax({
        type: "POST",
        async: false,
        cache: false,
        url: "../controladores/ControladorAutomovil.php",
        data: datos,
        success: function (datos) {
            //alert(datos);
        }
    });

    MostrarListaAutomoviles();
    CerrarModalAutomovil();
    ResetModalAutomovil();

}

// CARGAR ID MODELO EN FUNCION AL ID MARCA

function CargarIdModeloPorIdMarca(modelo_n) {
    
    var contenido = "";

    $.ajax({
        type: "POST",
        async: false,
        cache: false,
        url: "../controladores/ControladorModelo.php",
        data: "id_mara_modelo=" +modelo_n,
        success: function (datos) {
            contenido += datos;
        }
    });
    
    $("#modelo_automovil").html(contenido);
}

function CargarIdModeloPorIdMarca2(modelo_n_2) {
    
    var contenido = "";

    $.ajax({
        type: "POST",
        async: false,
        cache: false,
        url: "../controladores/ControladorModelo.php",
        data: "id_mara_modelo2=" +modelo_n_2,
        success: function (datos) {
            contenido += datos;
        }
    });
    
    $("#modelo_automovil").html(contenido);
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
    $("#marca_automovil_modelo").html(contenido);
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
    
    var contenido = "<option value='' disabled selected>Año</option>";
    
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
        $("#marca_automovil").removeClass("is-invalid");
        $("#marca_automovil").attr("required");
        $("#marca_automovil").attr("disabled selected");
        $("#modelo_automovil").removeClass("is-invalid");
        $("#anho_automovil").removeClass("is-invalid");
        contenido = "<option class='valor' value='' disabled selected>Modelo</option>";
        $("#modelo_automovil").html(contenido);
        $("#modelo_automovil").attr("required");
    });
}


//------------------------------------ MODIFICAR ---------------------------------------

$(document).on('click', '.modificar-datos-automovil', function () {

//    alert('hola');
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
    var id_automovil = r[0];
    var descripcion_marca = r[1];
    var descripcion_modelo = r[2];
    var anho = r[3];
    CargarMarcaAutomovil();
    var id_marca = dameIdMarca(descripcion_marca);
    CargarIdModeloPorIdMarca2(id_marca);
    AnhoAutomovil();
      
    $("#modal-automovil-edit").text('Modificar Automovil');
    $("#id_automovil").val(id_automovil);
    $("#marca_automovil option:selected").text(descripcion_marca);
    $("#marca_automovil").removeAttr("required");
    $("#modelo_automovil").attr("disabled selected");
    $("#modelo_automovil option:selected").text(descripcion_modelo);
    $("#modelo_automovil").removeAttr("required");
    $("#anho_automovil option:selected").text(anho);
    $("#anho_automovil").removeAttr("required");
    
    $("#marca_automovil").change(function() {
        
        var marca = $("#marca_automovil").val();
        var id_marca = dameIdMarca(marca);

        CargarIdModeloPorIdMarca(id_marca);
        
    });
    
    $('.guardar').css('display', 'none');
    $(".modificar").css('display', 'block');

    $("#ModalAutomovil").modal('show');

    /*$("#ModalUsuario").on('shown.bs.modal', function(){
     $("#nombre_usuario").focus();
     });*/
//
//
});

// CARGAR MODELO POR ID_MODELO
function CargarModeloMdf(dato) {
    
    valor = 10;
    
     $.ajax({
        type: "POST",
        async: false,
        cache: false,
        url: "../controladores/ControladorModelo.php",
        data: "dato=" + dato,
        success: function (datos) {
            //alert(datos);
            valor = datos;
        }
    });
    
    return valor;
    
}
 

function ModificarDatosAutomovil() {

//    alert('hola');

    var id_automovil = $("#id_automovil").val();
    var descripcion_marca = $("#marca_automovil option:selected").text();
    var id_marca = dameIdMarca(descripcion_marca);
    var descripcion_modelo = $("#modelo_automovil option:selected").text();
    var id_modelo = dameIdModelo(descripcion_modelo);
    var anho_automovil = $("#anho_automovil option:selected").text();

    //alert(id_automovil + " " + id_marca + " " + id_modelo + " " + anho_automovil);
    
    

    var datos = "up_id=" + id_automovil + "&up_id_marca=" + id_marca + "&up_id_modelo=" + id_modelo
    + "&up_anho=" + anho_automovil;

    //alert(datos);

    $.ajax({
        type: "POST",
        async: false,
        cache: false,
        url: "../controladores/ControladorAutomovil.php",
        data: datos,
        success: function (datos) {
            //alert(datos);
        }
    });

    MostrarListaAutomoviles();
    CerrarModalAutomovil();
    ResetModalAutomovil();

}


//---------------------------------------- ELIMINAR --------------------------------------------

$(document).on('click', '.eliminar-datos-automovil', function () {

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

    var id_automovil = r[0];


    $('#id_automovil_delete').val(id_automovil);
    $('#ModalEliminarAutomovil').modal('show');

});

function EliminarDatosAutomovil() {

    //alert('hola');

    var id_automovil = $("#id_automovil_delete").val();

    var datos = "id_delete=" + id_automovil;

    //alert(datos);

    $.ajax({
        type: "POST",
        async: false,
        cache: false,
        url: "../controladores/ControladorAutomovil.php",
        data: datos,
        success: function (datos) {
            //alert(datos);
        }
    });

    MostrarListaAutomoviles();

    $('#ModalEliminarAutomovil').modal('hide');
    if ($('.modal-backdrop').is(':visible')) {
        $('body').removeClass('modal-open');
        $('.modal-backdrop').remove();
    }

    ResetModalAutomovil();

}










