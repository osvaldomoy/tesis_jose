<?php


	// ------------------------------------- DAME LISTA TIPOS DE USUARIOS --------------------------------

	if(isset($_POST["lista"])){
		$datos = $_POST["lista"];
	}
		
	if(!empty($datos)){
		dameTodoTipoUsuario();
	}
	
	
	function dameTodoTipoUsuario(){
		
		require_once "../conexion/conexion.php";
		$conexion = new Conexion();
		$conexion->iniciarSesion();
		$consulta = mysqli_query($conexion->dameConexion(), "SELECT descripcion FROM tipos_de_usuarios ORDER BY descripcion DESC");
		
		if (mysqli_num_rows($consulta) > 0){
			 while($row = mysqli_fetch_array($consulta)){
		
				echo "<option>".$row[0]."</option>";
			 }
		} else { 
			echo "No hay datos"; 
		}
	}

 //------------------------------------ DAME ID USUARIO ------------------------------------------------

	if(isset($_POST["nombre"])){
		$nombre = $_POST["nombre"];
	}
		
	if(!empty($nombre)){
		dameIdTipoUsuario($nombre);
	}
	
	
	function dameIdTipoUsuario($nombre){
		
		require_once "../conexion/conexion.php";
		$conexion = new Conexion();
		$conexion->iniciarSesion();
		$consulta = mysqli_query($conexion->dameConexion(), "SELECT id_tipo_de_usuario FROM tipos_de_usuarios WHERE descripcion LIKE '%".$nombre."%'");
		
		if (mysqli_num_rows($consulta) > 0){
			 while($row = mysqli_fetch_array($consulta)){
		
				echo $row['id_tipo_de_usuario'];
			 }
		} else { 
			echo "No hay datos"; 
		}
	}


?>