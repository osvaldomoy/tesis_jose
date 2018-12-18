
function mostrarAtendidos(){
    var info = "<thead class='thead-dark'>"+
                            "<tr>"+
                                "<th scope='col'>Posición</th>"+
                                "<th scope='col'>Nombre  y Apellido</th>"+
                                "<th scope='col'>Cédula</th>"+
                                "<th scope='col'>Servicio</th>"+
                                "<th scope='col'>Costo</th>"+
                           " </tr>"+
                        "</thead>";
		$.ajax({
		type: "POST",
			async: false,
			cache: false,
			url: "../../controladores/ControladorReportes.php",
			data: "dame_atendidos_hoy="+$("#fecha").html()+"",

			success: function(datos) {
				info += datos;
				//$('.nombre_usuario').html(datos);
			}
		});
    
	$('#tabla-informe').html(info);
}
function mostrarInsumos(){
    var info = "<thead class='thead-dark'>"+
                            "<tr>"+
                                "<th scope='col'>Posición</th>"+
                                "<th scope='col'>Codigo</th>"+
                                "<th scope='col'>Nombre</th>"+
                                "<th scope='col'>Stock</th>"+
                                "<th scope='col'>Precio</th>"+
                           " </tr>"+
                        "</thead>";
		$.ajax({
		type: "POST",
			async: false,
			cache: false,
			url: "../../controladores/ControladorReportes.php",
			data: "dame_insumos=123",

			success: function(datos) {
                            
				info += datos;
				//$('.nombre_usuario').html(datos);
			}
		});
    
	$('#tabla-informe').html(info);
}
function mostrarServiciosCompleto(){
    var info = "<thead class='thead-dark'>"+
                            "<tr>"+
                                "<th scope='col'>Posición</th>"+
                                "<th scope='col'>Cliente</th>"+
                                "<th scope='col'>Servicio</th>"+
                                "<th scope='col'>Insumo</th>"+
                                "<th scope='col'>Usuario</th>"+
                           " </tr>"+
                        "</thead>";
		$.ajax({
		type: "POST",
			async: false,
			cache: false,
			url: "../../controladores/ControladorReportes.php",
			data: "dame_servicios_del_dia="+$("#fecha").html(),

			success: function(datos) {
                            
				info += datos;
				//$('.nombre_usuario').html(datos);
			}
		});
    
	$('#tabla-informe').html(info);
}
function mostrarServicios(){
    var info = "<thead class='thead-dark'>"+
                            "<tr>"+
                                "<th scope='col'>Posición</th>"+
                                "<th scope='col'>Cliente</th>"+
                                "<th scope='col'>Servicio</th>"+
                                "<th scope='col'>Usuario</th>"+
                           " </tr>"+
                        "</thead>";
		$.ajax({
		type: "POST",
			async: false,
			cache: false,
			url: "../../controladores/ControladorReportes.php",
			data: "dame_servicios="+$("#fecha").html(),

			success: function(datos) {
                            
				info += datos;
				//$('.nombre_usuario').html(datos);
			}
		});
    
	$('#tabla-informe').html(info);
}



