//------------------------------- AÑADIR -----------------------------------------

$(document).on('click', '#btn_new_usuario', function(){
	DameListaTiposUsuarios();
});

function DameListaTiposUsuarios(){
	
	var contenido = "";
	
	$.ajax({
		type: "POST",
		async: false,
		cache: false,
		url: "../controladores/ControladorTipoUsuario.php",
		data: 'lista=123',
		success: function(datos) {
			contenido += datos;
		}
	});
	
	$("#tipo_usuario").html(contenido);
	
}

function GuardarDatosUsuario(){
	
	var nombre = $("#nombre_usuario").val();
	var apellido = $("#apellido_usuario").val();
	var usuario = $("#usu_usuario").val();
	var password = $("#pass_usuario").val();
	var tipo = $("#tipo_usuario").val();
	var tipo_usuario = dameIdTipoUsuario(tipo);
	
	if(nombre.length < 1){
		$("#nombre_usuario").focus();
		$("#nombre_usuario").addClass("is-invalid");
		
		$("#nombre_usuario").keypress(function(){
			$("#nombre_usuario").removeClass("is-invalid");
		});
		return;
	}
	
	if(apellido.length < 1){
		$("#apellido_usuario").focus();
		$("#apellido_usuario").addClass("is-invalid");
		
		$("#apellido_usuario").keypress(function(){
			$("#apellido_usuario").removeClass("is-invalid");
		});
		return;
	}
	
	if(usuario.length < 1){
		$("#usu_usuario").focus();
		$("#usu_usuario").addClass("is-invalid");
		
		$("#usu_usuario").keypress(function(){
			$("#usu_usuario").removeClass("is-invalid");
		});
		return;
	}
	
	if((password.length < 1)){
		$("#pass_usuario").focus();
		$("#pass_usuario").addClass("is-invalid");
		
		$("#pass_usuario").keypress(function(){
			$("#pass_usuario").removeClass("is-invalid");
		});
		return;
	}
	
	var datos = "nombre="+nombre+"&apellido="+apellido+"&usuario="+usuario+"&pass="+password+"&tipo_usuario="+tipo_usuario;
	
	$.ajax({
		type: "POST",
		async: false,
		cache: false,
		url: "../controladores/ControladorUsuario.php",
		data: datos,
		success: function(datos) {
			
		}
	});
	
	MostrarListaUsuarios();
	
	CerrarModalUsuario();
	
	ResetModalUsuario();
	 
}

function CerrarModalUsuario(){
	$('#ModalUsuario').modal('hide');
	if ($('.modal-backdrop').is(':visible')) {
	  $('body').removeClass('modal-open'); 
	  $('.modal-backdrop').remove(); 
	};
}

function ResetModalUsuario(){
	$('#ModalUsuario').on('hidden.bs.modal', function () {
		$(this).find('form').trigger('reset');
		$("#nombre_usuario").removeClass("is-invalid");
		$("#apellido_usuario").removeClass("is-invalid");
		$("#usu_usuario").removeClass("is-invalid");
		$("#pass_usuario").removeClass("is-invalid");
	});
}

function dameIdTipoUsuario(nombre){
	
	var valor = 10;

    $.ajax({
        type: "POST",
        async:false, 
        cache:false,
        url: "../controladores/ControladorTipoUsuario.php",
        data: "nombre="+nombre,
        success: function(datos) {
             
        }
    });
	
	return valor;
	
}

//------------------------------------ MODIFICAR ---------------------------------------

$(document).on('click', '.modificar-datos-usuario', function(){
	DameListaTiposUsuarios();
	
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
	var id_usuario = r[0];
	var nombre = r[1];
	var apellido = r[2];
	var usuario = r[3];
	var password = r[4];
	var id_tipo_usuario = r[5];
	
	$("#title-usuario-edit").text('Modificar Usuario');
	$("#id_usuario").val(id_usuario);
	$("#nombre_usuario").val(nombre);
	$("#apellido_usuario").val(apellido);
	$("#usu_usuario").val(usuario);
	$("#pass_usuario").val(password);
	$("#tipo_usuario").text(id_tipo_usuario);
	
	
	$('.guardar').css('display', 'none');
	$(".modificar").css('display', 'block');
	
	$("#ModalUsuario").modal('show');
	
	/*$("#ModalUsuario").on('shown.bs.modal', function(){
		$("#nombre_usuario").focus();
	});*/
	
		
});

function ModificarDatosUsuario(){
	
	var id_usuario = $("#id_usuario").val();
	var nombre = $("#nombre_usuario").val();
	var apellido = $("#apellido_usuario").val();
	var usuario = $("#usu_usuario").val();
	var password = $("#pass_usuario").val();
	var tipo = $("#tipo_usuario").val();
	var tipo_usuario = dameIdTipoUsuario(tipo);
	
	if(nombre.length < 1){
		$("#nombre_usuario").focus();
		$("#nombre_usuario").addClass("is-invalid");
		
		$("#nombre_usuario").keypress(function(){
			$("#nombre_usuario").removeClass("is-invalid");
		});
		return;
	}
	
	if(apellido.length < 1){
		$("#apellido_usuario").focus();
		$("#apellido_usuario").addClass("is-invalid");
		
		$("#apellido_usuario").keypress(function(){
			$("#apellido_usuario").removeClass("is-invalid");
		});
		return;
	}
	
	if(usuario.length < 1){
		$("#usu_usuario").focus();
		$("#usu_usuario").addClass("is-invalid");
		
		$("#usu_usuario").keypress(function(){
			$("#usu_usuario").removeClass("is-invalid");
		});
		return;
	}
	
	if((password.length < 1)){
		$("#pass_usuario").focus();
		$("#pass_usuario").addClass("is-invalid");
		
		$("#pass_usuario").keypress(function(){
			$("#pass_usuario").removeClass("is-invalid");
		});
		return;
	}

	
	var datos = "up_id="+id_usuario+"&up_nombre="+nombre+"&up_apellido="+apellido+"&up_usuario="+usuario+"&up_pass="+password+"&up_id_tipo_usuario="+tipo_usuario;
	
	//alert(datos);
	
	$.ajax({
		type: "POST",
		async: false,
		cache: false,
		url: "../controladores/ControladorUsuario.php",
		data: datos,
		success: function(datos) {
			//alert(datos);
		}
	});
	
	MostrarListaUsuarios();
	CerrarModalUsuario();
	ResetModalUsuario();
	
}


//---------------------------------------- ELIMINAR DATOS DEL USUARIO --------------------------------------------

$(document).on('click', '.eliminar-datos-usuario', function(){
	
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
	var id_usuario = r[0];
	var nombre = r[1];
	var apellido = r[2];
	var usuario = r[3];
	var password = r[4];
	var id_tipo_usuario = r[5];
	
	
	$("#id_usuario").val(id_usuario);
	$("#nombre_usuario").val(nombre);
	$("#apellido_usuario").val(apellido);
	$("#usu_usuario").val(usuario);
	$("#pass_usuario").val(password);
	$("#tipo_usuario").text(id_tipo_usuario);
	
	
	$('#id_usuario_delete').val(id_usuario);
	$('#ModalEliminarUsuario').modal('show');
	
});

function EliminarDatosUsuario(){
	
	var id_usuario = $("#id_usuario_delete").val();
	
	var datos = "id_delete="+id_usuario;
	
	//alert(datos);
	
	$.ajax({
		type: "POST",
		async: false,
		cache: false,
		url: "../controladores/ControladorUsuario.php",
		data: datos,
		success: function(datos) {
			//alert(datos);
		}
	});
	
	MostrarListaUsuarios();
	
	$('#ModalEliminarUsuario').modal('hide');
	if ($('.modal-backdrop').is(':visible')) {
	  $('body').removeClass('modal-open'); 
	  $('.modal-backdrop').remove(); 
	}
	
	ResetModalUsuario();
	
}










