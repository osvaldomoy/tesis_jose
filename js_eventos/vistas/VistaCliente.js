// JavaScript Document

function validarCliente(){
	var existe_cliente = 0;
	var cedula = $('#cedula_cliente').val();
	$.ajax({
		type: "POST",
		async: false,
		cache: false,
		url: "../controladores/ControladorCliente.php",
		data: "cedula="+cedula,
		
		success: function(datos) {
			
			existe_cliente = datos;
		}
	});
	
	//en el caso que el cliente exista realizamos lo siguiente
	if(existe_cliente == 1){
		var htmltext = "";
		//creamos una tabla
		htmltext +="<table class='table tabla_datos_usuario' style='width: 100%'>"+
					"<div style='display: flex; align-items: center; justify-content: space-between;'>"+
					"<div>";
		
		$.ajax({
		type: "POST",
			async: false,
			cache: false,
			url: "../controladores/ControladorCliente.php",
			data: "idc="+cedula,

			success: function(datos) {
				
				htmltext += datos;
			}
		});
			
		
					  htmltext +="<thead class='thead-dark'>"+
					"<tr>"+
					  "<th scope='col'><div style='width:100px;'>CHAPA</div></th>"+
					  "<th scope='col'><div style='width:100px;'>Modelo</div></th>"+
					  "<th scope='col'><div style='width:100px;'>Marca</div></th>"+
					  "<th scope='col'><div style='width:100px;'>Servicio</div></th>"+
					  "<th scope='col'><div style='width:150px;'>"+
					  "<div style='display: flex; align-items: center; justify-content: space-between'>"+
						  "<div>"+
						  "Seleccionar todo"+
						  "</div>"+
						  "<div>"+
						  "<input type='checkbox' onclick='SeleccionarTodo(this);' >"+
						  "</div>"+
						  "</div>"+
					  "</div></th>"+
					"</tr>"+
				  "</thead>";
		
		//cargamos el contenido de la tabla con ayuda de una peticion ajax
		$.ajax({
		type: "POST",
			async: false,
			cache: false,
			url: "../controladores/ControladorCliente.php",
			data: "dameTablaDeAutos='hola'",

			success: function(datos) {
				
				htmltext += datos;
			}
		});
		
		htmltext +="</table>"+
		"<div style='display: flex; justify-content: flex-end;'>"+
		"<button type='button' id='holas' class='btn btn-primary' style='margin-bottom: 10px;' onclick='CargaDatosTabla();'>Cargar servicio</button>"+
		"</div>"+
		"<div class='contenido-otra-tabla'></div>";
		
		//cargamos el html en el modal
		$(".contenido-modal").html(htmltext);
		//borramos lo datos del html
		htmltext = "";
		
	}else{
		//cambiar contenido de modal para registrar con ese numero de cedula
		$(".contenido-modal").html("<p> No Existe<p>");
	}
}

function SeleccionarTodo(source){
	var ch = document.getElementsByTagName('input');
	for(i=0; i<ch.length; i++){
		if(ch[i].type == "checkbox"){
			ch[i].checked = source.checked;
		}
	}
	
}

function CargaDatosTabla(){
	
		var tableDatos = "";
		tableDatos += "<table id='tabla2' class='table'>"+
					  "<thead class='thead-dark'>"+
						"<tr>"+
						  "<th scope='col'>CHAPA</th>"+
						  "<th scope='col'>Modelo</th>"+
						  "<th scope='col'>Marca</th>"+
						  "<th scope='col'>Servicio</th>"+
						  "<th scope='col'>Tiempo</th>"+
						  "<th scope='col'>"+
						  "</th>"+
						"</tr>"+
					  "</thead>"+
						"<tbody>";
	
	 $("input[class=f1]:checked").each(function(){

		 var servicio = $(this).closest('tr').find('select').find(':selected').text();
		
		 var r = [];
		 if(servicio != 'Seleccione un servicio'){
			 		var result = [];
    				var i = 0;

					// buscamos el td más cercano en el DOM hacia "arriba"
					// luego encontramos los td adyacentes a este
					$(this).closest('td').siblings().each(function(){

					  // obtenemos el texto del td 
					  	result[i] = $(this).text();
						i++;
						
					});
					 
					 r = result;
					 var d1 = r[0];
					 var d2 = r[1];
					 var d3 = r[2];
			 		 var nada = 'hola';
			 		tableDatos += "<tr class='p'>"+
								  "<th scope='row'>"+d1+"</th>"+
								  "<td>"+d2+"</td>"+
								  "<td>"+d3+"</td>"+
			 					  "<td class='columna_servicio'>"+servicio+"</td>";

									$.ajax({
										type: "POST",
										async: false,
										cache: false,
										url: "../controladores/ControladorServicio.php",
										data: "dameTiempo="+servicio,

										success: function(datos) {
											nada = datos;
											tableDatos += nada;
										}
									});
			 
			 					tableDatos += "</tr>";
		 }else{
			 alert("Debes elegir un servicio para el auto seleccionado");
			 return false;
		 }
	
	 });
		tableDatos+= "</tbody>"+
						"</table>"+
				
			//cargamos los datos de la otra tabla
		$(".contenido-otra-tabla").html(tableDatos);
		//boramos los datos;
		tableDatos ="";
	
}


//----------------------------- ENVIAR DATOS DE CLIENTE A LA TABLA CLIENTES_EN_EPSERA --------------------


function GuardarClienteEspera(){

	var cedula = $('#cedula_cliente').val();
	var id_cliente = 0;
	//var info = "";
	
	$.ajax({
		type: "POST",
		async: false,
		cache: false,
		url: "../controladores/ControladorCliente.php",
		data: "id="+cedula,
		success: function(datos) {
			id_cliente = datos; // codigo del cliente
			//alert('CODIGO CLIENTE: '+id_cliente);
		}
	});
	//info += id_cliente+"\n";
	var datecap = 1;
		var valdate;

		Object.defineProperty(Date.prototype, 'YYYYMMDDHHMMSS', {
    	value: function() {
			function pad2(n) {  // always returns a string
				return (n < 10 ? '0' : '') + n;
			}

        	return this.getFullYear() +':'+ // OBTENER ANHO
            pad2(this.getMonth() + 1) +':'+ // OBTENER MES
            pad2(this.getDate()) +':'+ // OBTENER DIA
            pad2(this.getHours()) +':'+ // OBTENER HORA
            pad2(this.getMinutes()) +':'+ // OBTENER MINUTO
            pad2(this.getSeconds()); // OBTENER SEGUNDO
    	}
			
		});
	
	$("td[class=columna_servicio]").each(function(){
		
		var id_servicio = 'hola';
		var servicio = $(this).text();
		
		$.ajax({
			type: "POST",
			async: false,
			cache: false,
			url: "../controladores/ControladorServicio.php",
			data: "nombre="+servicio,
			success: function(datos) {
				id_servicio = datos; // codigo del servicio
				//alert('CODIGO SERVICIO: '+id_servicio);
			}
		});
		
		//info += id_servicio+"\n";
		//-------------------- OBTENER YYYY:MM:DD:HH:MM:SS ---------------------------------
		

		valdate = datecap.text = new Date().YYYYMMDDHHMMSS(); //fecha
		//alert('FECHA: '+valdate);
		
		//info += valdate+"\n";
		
		$.ajax({
			type: "POST",
			async: false,
			cache: false,
			url: "../controladores/ControladorTicket.php",
			data: "codigo_cliente="+id_cliente+"&codigo_servicio="+id_servicio+"&fecha="+valdate,
			error: function(prueba){
				alert("No guardado");
			},
			success: function(datos) {
				
				//alert("Datos guardados");
			}
		});
		
	});
	
	
	
	
	
}

//-------------------------------------------------------------------------------------------
















