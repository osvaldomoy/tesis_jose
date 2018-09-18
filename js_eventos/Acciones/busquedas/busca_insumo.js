

$(document).on('keyup', '#buscador-insumo', function () {
    var text_insumo = $("#buscador-insumo").val();
    //alert(text_insumo);

    if ($(this).val().trim() != "") {

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
            data: "insumo=" + text_insumo,
            success: function (datos) {
                contenido += datos;
            }
        });

        $("#lista-insumo").html(contenido);

    } else {

        MostrarListaInsumos();
    }


});


