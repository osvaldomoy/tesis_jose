<?php

	require_once("../conexion/conexion.php");
	require_once("../modelos/clientes_en_espera.php");

	if(isset($_POST['codigo_cliente']) and (isset($_POST['codigo_servicio'])) and (isset($_POST['fecha']))){
		
		$codigo_cliente = $_POST['codigo_cliente'];
		$codigo_servicio = $_POST['codigo_servicio'];
		$fecha = $_POST['fecha'];
		
		$guardarCliente = new ClientesEnEspera($codigo_cliente, $codigo_servicio, $fecha);
	}

	if(!empty($guardarCliente)){
		
		GuardarTurno($guardarCliente);
	}

	function GuardarTurno($guardarCliente){
		
		$sql = "INSERT INTO clientes_en_espera (codigo_cliente, codigo_servicio, tiempo, fecha) VALUES ("
            .$guardarCliente->getCodigoCliente().","
            .$guardarCliente->getCodigoServicio().", "
			."(SELECT tiempo_servicio FROM servicios WHERE codigo_servicio = ".$guardarCliente->getCodigoServicio()."), '"
            .$guardarCliente->getFecha()."')";
            
        echo $sql;
        
        $conexion = new Conexion();
        $conexion->iniciarSesion();
        $conexion->dameConexion()->query($sql);
		
	}


?>