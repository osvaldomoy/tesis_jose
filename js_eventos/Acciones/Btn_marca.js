//------------------------------- AÑADIR -----------------------------------------


function GuardarDatosMarca(){
	
	var descripcion = $("#descripcion_marca").val();
		
	if(descripcion.length < 1){
		$("#descripcion_marca").focus();
		$("#descripcion_marca").addClass("is-invalid");
		
		$("#descripcion_marca").keypress(function(){
			$("#descripcion_marca").removeClass("is-invalid");
		});
		return;
	}
	
	
	
	var datos = "descripcion="+descripcion;
	
	//alert(datos);
	
	$.ajax({
		type: "POST",
		async: false,
		cache: false,
		url: "../controladores/ControladorMarca.php",
		data: datos,
		success: function(datos) {
			//alert(datos);
		}
	});
	
	MostrarListaMarcas();
	
	CerrarModalMarca();
	
	ResetModalMarca();
	 
}

function CerrarModalMarca(){
	$('#ModalMarca').modal('hide');
	if ($('.modal-backdrop').is(':visible')) {
	  $('body').removeClass('modal-open'); 
	  $('.modal-backdrop').remove(); 
	};
}

function ResetModalMarca(){
	$('#ModalMarca').on('hidden.bs.modal', function () {
		$(this).find('form').trigger('reset');
		$("#descripcion_marca").removeClass("is-invalid");
	});
}


//------------------------------------ MODIFICAR ---------------------------------------

$(document).on('click', '.modificar-datos-marca', function(){
	
	//alert('hola');
	var r = []
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
	var id_marca = r[0];
	var descripcion = r[1];
	
	
	$("#modal-marca-edit").text('Modificar Marca');
	$("#id_marca").val(id_marca);
	$("#descripcion_marca").val(descripcion);
	
	
	$('.guardar').css('display', 'none');
	$(".modificar").css('display', 'block');
	
	$("#ModalMarca").modal('show');
	
	/*$("#ModalUsuario").on('shown.bs.modal', function(){
		$("#nombre_usuario").focus();
	});*/
	
		
});

function ModificarDatosMarca(){
	
	//alert('hola');
	
	var id_marca = $("#id_marca").val();
	var descripcion = $("#descripcion_marca").val();
	
	
	if(descripcion.length < 1){
		$("#descripcion_marca").focus();
		$("#descripcion_marca").addClass("is-invalid");
		
		$("#descripcion_marca").keypress(function(){
			$("#descripcion_marca").removeClass("is-invalid");
		});
		return;
	}
	
	
	var datos = "up_id="+id_marca+"&up_descripcion="+descripcion;
	
	//alert(datos);
	
	$.ajax({
		type: "POST",
		async: false,
		cache: false,
		url: "../controladores/ControladorMarca.php",
		data: datos,
		success: function(datos) {
			//alert(datos);
		}
	});
	
	MostrarListaMarcas();
	CerrarModalMarca();
	ResetModalMarca();
	
}


//---------------------------------------- ELIMINAR DATOS DEL USUARIO --------------------------------------------

$(document).on('click', '.eliminar-datos-marca', function(){
	
	var r = []
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
	
	var id_marca = r[0];
	var descripcion = r[1];
	
	
	$('#id_marca_delete').val(id_marca);
	$('#ModalEliminarMarca').modal('show');
	
});

function EliminarDatosMarca(){
	
	//alert('hola');
	
	var id_marca = $("#id_marca_delete").val();
	
	var datos = "id_delete="+id_marca;
	
	//alert(datos);
	
	$.ajax({
		type: "POST",
		async: false,
		cache: false,
		url: "../controladores/ControladorMarca.php",
		data: datos,
		success: function(datos) {
			//alert(datos);
		}
	});
	
	MostrarListaMarcas();
	
	$('#ModalEliminarMarca').modal('hide');
	if ($('.modal-backdrop').is(':visible')) {
	  $('body').removeClass('modal-open'); 
	  $('.modal-backdrop').remove(); 
	}
	
	ResetModalMarca();
	
}










