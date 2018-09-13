//------------------------------- AÑADIR -----------------------------------------


function GuardarDatosModelo(){
	
	var descripcion = $("#descripcion_modelo").val();
		
	if(descripcion.length < 1){
		$("#descripcion_modelo").focus();
		$("#descripcion_modelo").addClass("is-invalid");
		
		$("#descripcion_modelo").keypress(function(){
			$("#descripcion_modelo").removeClass("is-invalid");
		});
		return;
	}
	
	
	
	var datos = "descripcion="+descripcion;
	
	//alert(datos);
	
	$.ajax({
		type: "POST",
		async: false,
		cache: false,
		url: "../controladores/ControladorModelo.php",
		data: datos,
		success: function(datos) {
			//alert(datos);
		}
	});
	
	MostrarListaModelos();
	
	CerrarModalModelo();
	
	ResetModalModelo();
	 
}

function CerrarModalModelo(){
	$('#ModalModelo').modal('hide');
	if ($('.modal-backdrop').is(':visible')) {
	  $('body').removeClass('modal-open'); 
	  $('.modal-backdrop').remove(); 
	};
}

function ResetModalModelo(){
	$('#ModalModelo').on('hidden.bs.modal', function () {
		$(this).find('form').trigger('reset');
		$("#descripcion_modelo").removeClass("is-invalid");
	});
}


//------------------------------------ MODIFICAR ---------------------------------------

$(document).on('click', '.modificar-datos-modelo', function(){
	
	//alert('hola');
	var r = [];
	var valores=[];
	var i = 0;
    // Obtenemos todos los valores contenidos en los <td> de la fila
    // seleccionada
    $(this).parents("tr").find("td").each(function(){
		
		$(this).closest('tr').find("td").text();
		
		if($(this).is('.fila')){
			valores[i] =$(this).text();
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

function ModificarDatosModelo(){
	
	//alert('hola');
	
	var id_modelo = $("#id_modelo").val();
	var descripcion = $("#descripcion_modelo").val();
	
	
	if(descripcion.length < 1){
		$("#descripcion_modelo").focus();
		$("#descripcion_modelo").addClass("is-invalid");
		
		$("#descripcion_modelo").keypress(function(){
			$("#descripcion_modelo").removeClass("is-invalid");
		});
		return;
	}
	
	
	var datos = "up_id="+id_modelo+"&up_descripcion="+descripcion;
	
	//alert(datos);
	
	$.ajax({
		type: "POST",
		async: false,
		cache: false,
		url: "../controladores/ControladorModelo.php",
		data: datos,
		success: function(datos) {
			//alert(datos);
		}
	});
	
	MostrarListaModelos();
	CerrarModalModelo();
	ResetModalModelo();
	
}


//---------------------------------------- ELIMINAR DATOS DEL USUARIO --------------------------------------------

$(document).on('click', '.eliminar-datos-modelo', function(){
	
	var r = [];
	var valores=[];
	var i = 0;
    // Obtenemos todos los valores contenidos en los <td> de la fila
    // seleccionada
    $(this).parents("tr").find("td").each(function(){
		
		$(this).closest('tr').find("td").text();
		
		if($(this).is('.fila')){
			valores[i] =$(this).text();
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

function EliminarDatosModelo(){
	
//	alert('hola');
	
	var id_modelo = $("#id_modelo_delete").val();
	
	var datos = "id_delete="+id_modelo;
	
//	alert(datos);
	
	$.ajax({
		type: "POST",
		async: false,
		cache: false,
		url: "../controladores/ControladorModelo.php",
		data: datos,
		success: function(datos) {
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










