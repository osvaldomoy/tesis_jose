/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

// JavaScript Document
function dameClienteEspera(){
	//cargamos el contenido de la tabla con ayuda de una peticion ajax
	
	
		var info = "";
			$.ajax({
			type: "POST",
				async: false,
				cache: false,
				url: "../controladores/ControladorClienteEspera.php",
				data: "siguiente_espera='dame'",

				success: function(datos) {

					info = datos;
					//$('.nombre_usuario').html(datos);
				}
			});
		$('.contenido-cliente-espera').html(info);
	
		

		

	
	
	
	
}
function atenderCliente(){
	//cargamos el contenido de la tabla con ayuda de una peticion ajax
	
	
	var validacion = 0;
		$.ajax({
		type: "POST",
			async: false,
			cache: false,
			url: "../controladores/ControladorClienteEspera.php",
			data: "validar_atencion='lapm'",

			success: function(datos) {
				
				validacion = datos;
				
			}
		});
	
	if(validacion == 0){
		$.ajax({
		type: "POST",
			async: false,
			cache: false,
			url: "../controladores/ControladorClienteEspera.php",
			data: "atenderCliente='atender'",

			success: function(datos) {
				
				
				//$('.nombre_usuario').html(datos);
			}
		});
	
		
	}else if(validacion == 1){
		alert("No puedes atender a otro cliente, tienes un cliente en atención \nPrimero termina de atender el actual");
	}
	
	
		
	
	dameClienteEspera();
	clienteAtencion();
	
}


function clienteAtencion(){
	//cargamos el contenido de la tabla con ayuda de una peticion ajax
	
		var info = "";
		$.ajax({
		type: "POST",
			async: false,
			cache: false,
			url: "../controladores/ControladorClienteEspera.php",
			data: "cliente_en_atencion='atender'",

			success: function(datos) {
				
				
				info = datos;
			}
		});
	
	$('.contenido-cliente-actual').html(info);
	
}

function terminarAtencion(){
	//cargamos el contenido de la tabla con ayuda de una peticion ajax
		alert("hola");
		var info = "";
		$.ajax({
		type: "POST",
			async: false,
			cache: false,
			url: "../controladores/ControladorClienteEspera.php",
			data: "terminar_atencion='atender'",

			success: function(datos) {
				
				
				info = datos;
			}
		});
	
	clienteAtencion();
	
}



