//------------------------- AÑADIR --------------------------------------

function BorrarModificarEliminar(){
	$('.guardar').css('display', 'block');
	$(".modificar").css('display', 'none');
}

function GuardarDatosCliente(){
	
	var nombre = $("#nombre_cliente").val();
	var apellido = $("#apellido_cliente").val();
	var cedula = $("#cedula_cliente").val();
	var telefono = $("#telefono_cliente").val();
	var correo = $("#correo_cliente").val();
	
	if(nombre.length < 1){
		$("#nombre_cliente").focus();
		$("#nombre_cliente").addClass("is-invalid");
		
		$("#nombre_cliente").keypress(function(){
			$("#nombre_cliente").removeClass("is-invalid");
		});
		return;
	}
	
	if(apellido.length < 1){
		$("#apellido_cliente").focus();
		$("#apellido_cliente").addClass("is-invalid");
		
		$("#apellido_cliente").keypress(function(){
			$("#apellido_cliente").removeClass("is-invalid");
		});
		return;
	}
	
	if((cedula.length < 1)){
		$("#cedula_cliente").focus();
		$("#cedula_cliente").addClass("is-invalid");
		
		$("#cedula_cliente").keypress(function(){
			$("#cedula_cliente").removeClass("is-invalid");
		});
		return;
	}
	
	if(telefono.length < 1){
		$("#telefono_cliente").focus();
		$("#telefono_cliente").addClass("is-invalid");
		
		$("#telefono_cliente").keypress(function(){
			$("#telefono_cliente").removeClass("is-invalid");
		});
		return;
	}
	
	var caract = new RegExp(/^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i);
	
	if (caract.test(correo) == false){
		alert('correo invalido');
		$("#correo_cliente").focus();
		$("#correo_cliente").addClass("is-invalid");
		
		$("#correo_cliente").focusin(function(){
			$("#correo_cliente").keyup(function(){

			if($("#correo_cliente").val().length <= 0){
				$("#correo_cliente").removeClass("is-invalid");
			}
		});
	});
		return;
	}
	var datos = "nombre="+nombre+"&apellido="+apellido+"&cedula="+cedula+"&telefono="+telefono+"&correo="+correo;
	
	$.ajax({
		type: "POST",
		async: false,
		cache: false,
		url: "../controladores/ControladorCliente.php",
		data: datos,
		success: function(datos) {
			
		}
	});
	
	MostrarListaClientes();
	
	CerrarModal();
	
	ResetModal();
	 
}


function CerrarModal(){
	$('#ModalCliente').modal('hide');
	if ($('.modal-backdrop').is(':visible')) {
	  $('body').removeClass('modal-open'); 
	  $('.modal-backdrop').remove(); 
	};
}

function ResetModal(){
	$('#ModalCliente').on('hidden.bs.modal', function () {
		$(this).find('form').trigger('reset');
		$("#nombre_cliente").removeClass("is-invalid");
		$("#apellido_cliente").removeClass("is-invalid");
		$("#cedula_cliente").removeClass("is-invalid");
		$("#telefono_cliente").removeClass("is-invalid");
		$("#correo_cliente").removeClass("is-invalid");
	});
}


//------------------------- MODIFICAR --------------------------------------

$(document).on('click', '.modificar-datos-cliente', function(){
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
	var id_cliente = r[0];
	var nombre = r[1];
	var apellido = r[2];
	var cedula = r[3];
	var telefono = r[4];
	var correo = r[5];
	
	$(".modal-title").text('Modificar Cliente');
	$("#id_cliente").val(id_cliente);
	$("#nombre_cliente").val(nombre);
	$("#apellido_cliente").val(apellido);
	$("#cedula_cliente").val(cedula);
	$("#telefono_cliente").val(telefono);
	$("#correo_cliente").val(correo);
	
	
	
	
	$('.guardar').css('display', 'none');
	$(".modificar").css('display', 'block');
	
	$("#ModalCliente").modal('show');
});

function ModificarDatosCliente(){
	
	var id_cliente = $("#id_cliente").val();
	var nombre = $("#nombre_cliente").val();
	var apellido = $("#apellido_cliente").val();
	var cedula = $("#cedula_cliente").val();
	var telefono = $("#telefono_cliente").val();
	var correo = $("#correo_cliente").val();
	
	if(nombre.length < 1){
		$("#nombre_cliente").focus();
		$("#nombre_cliente").addClass("is-invalid");
		
		$("#nombre_cliente").keypress(function(){
			$("#nombre_cliente").removeClass("is-invalid");
		});
		return;
	}
	
	if(apellido.length < 1){
		$("#apellido_cliente").focus();
		$("#apellido_cliente").addClass("is-invalid");
		
		$("#apellido_cliente").keypress(function(){
			$("#apellido_cliente").removeClass("is-invalid");
		});
		return;
	}
	
	if((cedula.length < 1)){
		$("#cedula_cliente").focus();
		$("#cedula_cliente").addClass("is-invalid");
		
		$("#cedula_cliente").keypress(function(){
			$("#cedula_cliente").removeClass("is-invalid");
		});
		return;
	}
	
	if(telefono.length < 1){
		$("#telefono_cliente").focus();
		$("#telefono_cliente").addClass("is-invalid");
		
		$("#telefono_cliente").keypress(function(){
			$("#telefono_cliente").removeClass("is-invalid");
		});
		return;
	}
	
	var caract = new RegExp(/^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i);
	
	if (caract.test(correo) == false){
		alert('correo invalido');
		$("#correo_cliente").focus();
		$("#correo_cliente").addClass("is-invalid");
		
		$("#correo_cliente").focusin(function(){
			$("#correo_cliente").keyup(function(){

			if($("#correo_cliente").val().length <= 0){
				$("#correo_cliente").removeClass("is-invalid");
			}
		});
	});
		return;
	}
	
	var datos = "up_id="+id_cliente+"&up_nombre="+nombre+"&up_apellido="+apellido+"&up_cedula="+cedula+"&up_telefono="+telefono+"&up_correo="+correo;
	
	$.ajax({
		type: "POST",
		async: false,
		cache: false,
		url: "../controladores/ControladorCliente.php",
		data: datos,
		success: function(datos) {

		}
	});
	
	MostrarListaClientes();
	
	$('#ModalCliente').modal('hide');
	if ($('.modal-backdrop').is(':visible')) {
	  $('body').removeClass('modal-open'); 
	  $('.modal-backdrop').remove(); 
	}
	
	ResetModal();
	
}
	

//------------------------- ELIMINAR --------------------------------------

function MostrarYesNo(){
	$('.cancelar').css('display', 'none');
	$('.guardar').css('display', 'none');
	$(".modificar").css('display', 'none');
	$('.no-delete').css('display', 'block');
	$('.yes-delete').css('display', 'block');
}


$(document).on('click', '.eliminar-datos-cliente', function(){
	
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
	var id_cliente = r[0];
	var nombre = r[1];
	var apellido = r[2];
	var cedula = r[3];
	var telefono = r[4];
	var correo = r[5];
	
	$('#id_cliente_delete').val(id_cliente);
	$('#ModalEliminarCliente').modal('show');
	
});

function EliminarDatosCliente(){
	
	var id_cliente = $("#id_cliente_delete").val();
	
	var datos = "id_delete="+id_cliente;
	
	//alert(datos);
	
	$.ajax({
		type: "POST",
		async: false,
		cache: false,
		url: "../controladores/ControladorCliente.php",
		data: datos,
		success: function(datos) {
			//alert(datos);
		}
	});
	
	MostrarListaClientes();
	
	$('#ModalEliminarCliente').modal('hide');
	if ($('.modal-backdrop').is(':visible')) {
	  $('body').removeClass('modal-open'); 
	  $('.modal-backdrop').remove(); 
	}
	
	ResetModal();
	
}






















