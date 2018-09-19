// JavaScript Document

function validarCliente() {
    var existe_cliente = 0;
    var cedula = $('#cedula_cliente').val();
    $.ajax({
        type: "POST",
        async: false,
        cache: false,
        url: "../controladores/ControladorCliente.php",
        data: "cedula=" + cedula,

        success: function (datos) {

            existe_cliente = datos;
        }
    });


    //en el caso que el cliente exista realizamos lo siguiente
    if (existe_cliente == 1) {
        var htmltext = "";
        //creamos una tabla
        htmltext += "<table class='table tabla_datos_usuario' style='width: 100%'>" +
                "<div style='display: flex; align-items: center; justify-content: space-between;'>" +
                "<div>";

        $.ajax({
            type: "POST",
            async: false,
            cache: false,
            url: "../controladores/ControladorCliente.php",
            data: "idc=" + cedula,

            success: function (datos) {

                htmltext += datos;
            }
        });


        htmltext += "<thead class='thead-dark'>" +
                "<tr>" +
                "<th scope='col'><div style='width:100px;'>CHAPA</div></th>" +
                "<th scope='col'><div style='width:100px;'>Modelo</div></th>" +
                "<th scope='col'><div style='width:100px;'>Marca</div></th>" +
                "<th scope='col'><div style='width:100px;'>Servicio</div></th>" +
                "<th scope='col'><div style='width:150px;'>" +
                "<div style='display: flex; align-items: center; justify-content: space-between'>" +
                "<div>" +
                "Seleccionar todo" +
                "</div>" +
                "<div>" +
                "<input type='checkbox' onclick='SeleccionarTodo(this);' >" +
                "</div>" +
                "</div>" +
                "</div></th>" +
                "</tr>" +
                "</thead>";

        //cargamos el contenido de la tabla con ayuda de una peticion ajax
        $.ajax({
            type: "POST",
            async: false,
            cache: false,
            url: "../controladores/ControladorCliente.php",
            data: "dameTablaDeAutos=" + cedula,

            success: function (datos) {

                htmltext += datos;
            }
        });

        htmltext += " </table>" +
                "<div style='display: flex; justify-content: flex-end;'>" +
                "<button type='button' id='holas' class='btn btn-primary' style='margin-bottom: 10px;' onclick='CargaDatosTabla();'>Cargar servicio</button>" +
                "</div>" +
                "<div class='contenido-otra-tabla'></div>" +
                "<div class='mensaje-stock'></div>";

        //cargamos el html en el modal
        $(".contenido-modal").html(htmltext);
        //borramos lo datos del html
        htmltext = "";

    } else {
        //cambiar contenido de modal para registrar con ese numero de cedula
        $(".contenido-modal").html("<p> No Existe<p>");
    }
}

function SeleccionarTodo(source) {
    var ch = document.getElementsByTagName('input');
    for (i = 0; i < ch.length; i++) {
        if (ch[i].type == "checkbox") {
            ch[i].checked = source.checked;
        }
    }

}

function CargaDatosTabla() {
    var contenido_stock = "";
    var tableDatos = "";
    var total = 0;
    var total_insumo = 0;
    tableDatos += "<table id='tabla2' class='table tabla-info-servicio'>" +
            "<thead class='thead-dark'>" +
            "<tr>" +
            "<th scope='col'>CHAPA</th>" +
            "<th scope='col'>Modelo</th>" +
            "<th scope='col'>Marca</th>" +
            "<th scope='col'>Servicio</th>" +
            "<th scope='col'>Tiempo</th>" +
            "<th scope='col'>" +
            "</th>" +
            "</tr>" +
            "</thead>" +
            "<tbody>";
    contenido_stock = "<h4>Insumos a Utilizar</h4>"

    $("input[class=f1]:checked").each(function () {

        var servicio = $(this).closest('tr').find('select').find(':selected').text();

        var r = [];
        if (servicio != 'Seleccione un servicio') {
            var result = [];
            var i = 0;

            // buscamos el td más cercano en el DOM hacia "arriba"
            // luego encontramos los td adyacentes a este
            $(this).closest('td').siblings().each(function () {

                // obtenemos el texto del td 
                result[i] = $(this).text();
                i++;

            });

            r = result;
            var d1 = r[0];//chapa
            var d2 = r[1];//modelo
            var d3 = r[2];//marca
            var nada = 'hola';
            contenido_stock += "<h5>" + servicio + " - " + d2 + " - " + d3 + "</h5><hr>";
            tableDatos += "<tr class='p columnas-servicio'>" +
                    "<th scope='row'>" + d1 + "</th>" +
                    "<td >" + d2 + "</td>" +
                    "<td >" + d3 + "</td>" +
                    "<td class='columna_servicio'>" + servicio + "</td>";

            $.ajax({
                type: "POST",
                async: false,
                cache: false,
                url: "../controladores/ControladorServicio.php",
                data: "dameTiempo=" + servicio,

                success: function (datos) {
                    nada = datos;
                    tableDatos += nada;
                }
            });

            tableDatos += "</tr>";

            //Calcular el stock a restar
            var temp = "";

            $.ajax({
                type: "POST",
                async: false,
                cache: false,
                url: "../controladores/ControladorTicket.php",
                data: "modelo=" + d2 + "&marca=" + d3 + "&servicio=" + servicio,

                success: function (datos) {

                    temp += datos.trim();

                }
            });



            var descripciones_stock = temp.split('-');
            //PRECIO DEL INSUMO
            contenido_stock += "<ul>";

            for (var i = 0; i < descripciones_stock.length - 1; i++) {

                contenido_stock += "<li>" + descripciones_stock[i].split(',')[0] + " <b>Cantidad </b>" + descripciones_stock[i].split(',')[1] + "</li>";


                $.ajax({
                    type: "POST",
                    async: false,
                    cache: false,
                    url: "../controladores/ControladorInsumo.php",
                    data: "precio_insumo_nombre=" + descripciones_stock[i].split(',')[0],

                    success: function (datos) {
//                        alert(datos);
                        total_insumo += parseInt(datos) * parseInt(descripciones_stock[i].split(',')[1]);
                    }
                });

            }

            contenido_stock += "</ul>";


            //PRECIO DEL SERVICIO


            $.ajax({
                type: "POST",
                async: false,
                cache: false,
                url: "../controladores/ControladorServicio.php",
                data: "nombre_precio=" + servicio,

                success: function (datos) {

                    total += parseInt(datos);
                }
            });




        } else {
            alert("Debes elegir un servicio para el auto seleccionado");
            return false;
        }

    });
    tableDatos += "</tbody>" +
            " ";
    //cargamos los datos de la otra tabla
    var total_info = "</table> <h3 style='width=100%; background-color: #333333; color : white;'>\n\
                Total a pagar: <span class='total-a-pagar'>0</span></h3>";
    $(".contenido-otra-tabla").html(tableDatos);
    contenido_stock += total_info;
    $(".mensaje-stock").html(contenido_stock);
    total += total_insumo;

//hola

    $(".total-a-pagar").text(formatNumber(total));
    //boramos los datos;
    tableDatos = "";

}


/**
 * Formateador de miles
 * 
 */
function formatNumber(num) {
    if (!num || num == 'NaN')
        return '-';
    if (num == 'Infinity')
        return '&#x221e;';
    num = num.toString().replace(/\$|\,/g, '');
    if (isNaN(num))
        num = "0";
    sign = (num == (num = Math.abs(num)));
    num = Math.floor(num * 100 + 0.50000000001);
    cents = num % 100;
    num = Math.floor(num / 100).toString();
//    if (cents < 0)
//        cents = "0" + cents;
    for (var i = 0; i < Math.floor((num.length - (1 + i)) / 3); i++)
        num = num.substring(0, num.length - (4 * i + 3)) + '.' + num.substring(num.length - (4 * i + 3));
    return (((sign) ? '' : '-') + num);
//    return (((sign) ? '' : '-') + num + ',' + cents);
}

//----------------------------- ENVIAR DATOS DE CLIENTE A LA TABLA CLIENTES_EN_EPSERA --------------------
//----------------------------- ENVIAR DATOS DE CLIENTE A LA TABLA CLIENTES_EN_EPSERA --------------------

function GuardarClienteEspera() {

    //obtiene la cedula del cliente para luego obtener su identidad
    var cedula = $('#cedula_cliente').val();
    var id_cliente = 0;
    var d = new Date();
    var strDate = d.getFullYear() + "-" + (d.getMonth() + 1) + "-" + d.getDate() + " " +
            d.getHours() + ":" + d.getMinutes() + ":" + d.getSeconds();


    $.ajax({
        type: "POST",
        async: false,
        cache: false,
        url: "../controladores/ControladorCliente.php",
        data: "id=" + cedula,
        success: function (datos) {
            id_cliente = datos; // codigo del cliente
            //alert('CODIGO CLIENTE: '+id_cliente);
        }
    });





    //recorremos las filas del servicio especificado
    $('.columnas-servicio').each(function () {
        //recorremos las columnas de la fila
        var arreglo = [];
        var i = 0;
        $(this).children("td").each(function () {

            //obtenemos el id del servicio
            arreglo[i] = $(this).text();
            i++;



        });


        var id_servicio = 0;
        $.ajax({
            type: "POST",
            async: false,
            cache: false,
            url: "../controladores/ControladorServicio.php",
            data: "nombre=" + arreglo[2],
            success: function (datos) {
                id_servicio = datos; // codigo del servicio
                //alert('CODIGO SERVICIO: '+id_servicio);
            }
        });
        //obtenemos el identida de servicio

        //obtenemos el id de servicio
        var identificador_servicio = "";
        $.ajax({
            type: "POST",
            async: false,
            cache: false,
            url: "../controladores/ControladorTicket.php",
            data: "modelo=" + arreglo[0] + "&marc=" + arreglo[1] + "&servicio=" +
                    arreglo[2] + "&iden=123",
            success: function (datos) {

                identificador_servicio = datos;

            }
        });

        


        var total = $('.total-a-pagar').text();
        total = total.replace(".", "");


        $.ajax({
            type: "POST",
            async: false,
            cache: false,
            url: "../controladores/ControladorTicket.php",
            data: "codigo_cliente=" + id_cliente + "&codigo_servicio=" +
                    id_servicio + "&fecha=" + strDate + "&total=" + total +
                    "&codigo_detalle_identidad=" + identificador_servicio,
            error: function (prueba) {
                alert("No guardado");
            },
            success: function (datos) {


                alert("Datos guardados");
            }


        });
    });

    location.reload();



    

}
















