<?php

	require_once("../conexion/conexion.php");
	require_once("../modelos/clientes_en_espera.php");

	if(isset($_POST['codigo_cliente']) and 
                (isset($_POST['codigo_servicio'])) and 
                (isset($_POST['fecha'])) and 
                (isset($_POST['total'])) and
                (isset($_POST['codigo_detalle_identidad']))){
		
		$codigo_cliente = $_POST['codigo_cliente'];
		$codigo_servicio = $_POST['codigo_servicio'];
		$fecha = $_POST['fecha'];
		$total = $_POST['total'];
		$codigo_detalle_identidad = $_POST['codigo_detalle_identidad'];
		
		$guardarCliente = new ClientesEnEspera($codigo_cliente, $codigo_servicio, $fecha);
	}

	if(!empty($guardarCliente)){
		
		GuardarTurno($guardarCliente);
	}

	function GuardarTurno($guardarCliente){
		
		
		
		$sql = "INSERT INTO clientes_en_espera (codigo_cliente, codigo_servicio, tiempo, fecha, estado, id_usuario) VALUES ("
            .$guardarCliente->getCodigoCliente().","
            .$guardarCliente->getCodigoServicio().", "
			."(SELECT tiempo_servicio FROM servicios WHERE codigo_servicio = ".$guardarCliente->getCodigoServicio()."), '"
            .$guardarCliente->getFecha()."', 'E', 0)";
            
        echo $sql;
        
        $conexion = new Conexion();
        $conexion->iniciarSesion();
        $conexion->dameConexion()->query($sql);
		
	}


	if(isset($_POST['modelo']) and (isset($_POST['marca'])) and (isset($_POST['servicio'])) 
	 ){
		
		
		$servicio = $_POST['servicio'];
		$marca = $_POST['marca'];
		$modelo = $_POST['modelo'];
		
		dameIdentidadInsumoServicio($modelo, $marca, $servicio);
		
	}

	

	function dameIdentidadInsumoServicio($modelo, $marca, $servicio){
		
		require_once "../conexion/conexion.php";
		$conexion = new Conexion();
		$conexion->iniciarSesion();
		$codigo_identidad;
		$consulta = mysqli_query($conexion->dameConexion(), "SELECT dsi.codigo_detalle_identidad 
		FROM detalle_servicio_insumo dsi 
		JOIN automovil au 
		ON au.id_automovil = dsi.codigo_automovil
		JOIN servicios s 
		ON s.codigo_servicio = dsi.codigo_servicio
		JOIN modelo m 
		ON m.id_modelo = au.id_modelo
		JOIN marca mar 
		ON mar.id_marca  = au.id_marca
		WHERE m.descripcion LIKE '".$modelo."' AND  mar.descripcion LIKE '".$marca."' AND s.descripcion LIKE '".$servicio."' LIMIT 1");

		$identidad_descripcion = "";
		if (mysqli_num_rows($consulta) > 0){
			
			 while($row = mysqli_fetch_array($consulta)){
				$codigo_identidad =  $row[0];
			 }
			
			 
		}else{
			echo "NPI";
		}
		
		$consulta = mysqli_query($conexion->dameConexion(), "SELECT i.nombre, dsi.cantidad
			FROM detalle_servicio_insumo dsi
			 JOIN insumos i 
			 ON i.codigo_insumo = dsi.codigo_insumo
			WHERE dsi.codigo_detalle_identidad LIKE '".$codigo_identidad."'");

		$identidad_descripcion = "";
		if (mysqli_num_rows($consulta) > 0){
			
			 while($row = mysqli_fetch_array($consulta)){
				echo   $row[0].",".$row[1]."-";
			 }
			
			 
		}else{
			echo "NPI2";
		}
		
		
		
	}


?>