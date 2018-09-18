<?php
class ControladorClienteEspera{
	
}

////-------------------------------------------------------------------------------------------
////-------------------------------------------------------------------------------------------
//    if (isset($_POST['siguiente_espera'])){
//        $siguiente_espera = $_POST['siguiente_espera'];
//		
//    }
//
//    
//    if(!empty($siguiente_espera)){
//        dameClienteEspera();
//    }
//
//
//	function dameClienteEspera(){
//        
//        require_once "../conexion/conexion.php";
//		
//        
//        $conexion = new Conexion();
//        $conexion->iniciarSesion();
//        $consulta = mysqli_query($conexion->dameConexion(), "SELECT * FROM clientes_en_espera WHERE estado LIKE '%E%' LIMIT 1");
//        
//        if (mysqli_num_rows($consulta) > 0){
//            
//            while($row = mysqli_fetch_row($consulta)){
//					 echo 0;
//                     return;
//                
//            }
//             
//        } else { 
//            echo 1;
//        }
//        
//    }

//-------------------------------------------------------------------------------------------
//-------------------------------------------------------------------------------------------
//-------------------------------------------------------------------------------------------
//-------------------------------------------------------------------------------------------
    if (isset($_POST['siguiente_espera'])){
        $siguiente_espera = $_POST['siguiente_espera'];
		
    }

    
    if(!empty($siguiente_espera)){
        dameClienteEspera();
    }


	function dameClienteEspera(){
        
        require_once "../conexion/conexion.php";
		
        
        $conexion = new Conexion();
        $conexion->iniciarSesion();
        $consulta = mysqli_query($conexion->dameConexion(), "SELECT  CONCAT(c.nombre, ' ', c.apellido), s.descripcion, m.descripcion, ma.descripcion, cau.chapa
                                    FROM clientes_en_espera ce 
                                    JOIN clientes c
                                    ON c.codigo_cliente = ce.codigo_cliente 
                                    JOIN servicios s 
                                    ON s.codigo_servicio = ce.codigo_servicio
                                    JOIN clientes_automoviles cau
                                    ON cau.id_cliente = ce.codigo_cliente
                                    JOIN automovil a 
                                    ON a.id_automovil = cau.id_automovil
                                    JOIN modelo m 
                                    ON m.id_modelo = a.id_modelo
                                    JOIN marca ma
                                    ON ma.id_marca = a.id_marca
                                     WHERE ce.estado LIKE '%E%' LIMIT 1");
        
        if (mysqli_num_rows($consulta) > 0){
            
            while($row = mysqli_fetch_row($consulta)){
					 echo " <div class='card-body' ><h5 class='card-title' style='font-size: 35px;'>".$row[0]."</h5>";
					 echo "<p class='card-text'></p>";
					 echo "<p><b>Servicio  Solicitado: </b>".$row[1]."</p>
					  <p><b>Vehículo:</b> 
						  <ul>
							<li><b>Marca: </b><span>".$row[3]."</span></li>
							<li><b>Modelo: </b><span>".$row[2]."</span></li>
							<li><b>Chapa: </b><span>".$row[4]."</span></li>
						  </ul>
					  </p> </div>
			 <button type='button 'class='btn btn-success' style='margin: 10px 0px;' onClick='atenderCliente(); return true;'>ATENDER</button>";
                     
                
            }
             
        } else { 
            echo "No hay clientes en espera.";
        }
        
    }
//-------------------------------------------------------------------------------------------
//-------------------------------------------------------------------------------------------
    if (isset($_POST['atenderCliente'])){
        $atenderCliente = $_POST['atenderCliente'];
		
    }

    
    if(!empty($atenderCliente)){
        atenderClienteAhora();
    }


	function atenderClienteAhora(){
        
        require_once "../conexion/conexion.php";
		$conexion = new Conexion();
        $conexion->iniciarSesion();
        
		$identidadspm = 0;
		$consulta = mysqli_query($conexion->dameConexion(), "SELECT codigo_cliente_en_espera FROM clientes_en_espera WHERE estado LIKE '%E%' LIMIT 1");
        
        if (mysqli_num_rows($consulta) > 0){
            
            while($row = mysqli_fetch_row($consulta)){
					 $identidadspm = $row[0];
                     
                
            }
             
        } 
		
        session_start();
		$id_usuario = $_SESSION['id_usuario'];
        
        $sql =  "UPDATE clientes_en_espera  SET estado = 'A', id_usuario = ".$id_usuario." WHERE codigo_cliente_en_espera = ".$identidadspm."";
		
            
            $conexion->dameConexion()->query($sql);
        
    }


//-------------------------------------------------------------------------------------------
//-------------------------------------------------------------------------------------------
    if (isset($_POST['cliente_en_atencion'])){
        $cliente_en_atencion = $_POST['cliente_en_atencion'];
		
    }

    
    if(!empty($cliente_en_atencion)){
        clienteAtencion();
    }


	function clienteAtencion(){
        
        require_once "../conexion/conexion.php";
		session_start();
		$id_usuario = $_SESSION['id_usuario'];
        
        $conexion = new Conexion();
        $conexion->iniciarSesion();
        $consulta = mysqli_query($conexion->dameConexion(), "SELECT  CONCAT(c.nombre, ' ', c.apellido), s.descripcion, m.descripcion, ma.descripcion, cau.chapa
                FROM clientes_en_espera ce 
                JOIN clientes c
                ON c.codigo_cliente = ce.codigo_cliente 
                JOIN servicios s 
                ON s.codigo_servicio = ce.codigo_servicio
                JOIN clientes_automoviles cau
                ON cau.id_cliente = ce.codigo_cliente
                JOIN automovil a 
                ON a.id_automovil = cau.id_automovil
                JOIN modelo m 
                ON m.id_modelo = a.id_modelo
                JOIN marca ma
                ON ma.id_marca = a.id_marca
                 WHERE ce.estado LIKE '%A%'  and ce.id_usuario = ".$id_usuario." LIMIT 1");
        
        if (mysqli_num_rows($consulta) > 0){
            
            while($row = mysqli_fetch_row($consulta)){
					 echo " <div class='card-body contenido-cliente-actual'><h5 class='card-title' style='font-size: 35px;'>".$row[0]."</h5>";
					 echo "<p class='card-text'></p>";
					 echo "<p><b>Servicio  Solicitado: </b>".$row[1]."</p>
					  <p><b>Vehículo:</b> 
						  <ul>
							<li><b>Marca: </b><span>".$row[3]."</span></li>
							<li><b>Modelo: </b><span>".$row[2]."</span></li>
							<li><b>Chapa: </b><span>".$row[4]."</span></li>
						  </ul>
					  </p>  </div>
			 <button type='button' class='btn btn-danger' style='margin: 10px 0px;' onClick='terminarAtencion(); return true;'>Terminar</button>
				";
                     
                
            }
             
        } else { 
            echo "No estás atendiendo un cliente.";
        }
        
    }
//-------------------------------------------------------------------------------------------
//-------------------------------------------------------------------------------------------
//-------------------------------------------------------------------------------------------
//-------------------------------------------------------------------------------------------
    if (isset($_POST['validar_atencion'])){
        $validar_atencion = $_POST['validar_atencion'];
		
    }

    
    if(!empty($validar_atencion)){
        validarAtencion();
    }


	function validarAtencion(){
        
        require_once "../conexion/conexion.php";
		session_start();
		$id_usuario = $_SESSION['id_usuario'];
        
        $conexion = new Conexion();
        $conexion->iniciarSesion();
        $consulta = mysqli_query($conexion->dameConexion(), "SELECT  *
FROM clientes_en_espera ce 
 WHERE ce.estado LIKE '%A%'  and ce.id_usuario = ".$id_usuario." LIMIT 1");
        
        if (mysqli_num_rows($consulta) > 0){
            
            while($row = mysqli_fetch_row($consulta)){
					 echo 1;
                     
                
            }
             
        } else { 
            echo 0;
        }
        
    }
//-------------------------------------------------------------------------------------------
//-------------------------------------------------------------------------------------------
//-------------------------------------------------------------------------------------------
//-------------------------------------------------------------------------------------------
    if (isset($_POST['terminar_atencion'])){
        $terminar_atencion = $_POST['terminar_atencion'];
		
    }

    
    if(!empty($terminar_atencion)){
        terminarAtencion();
    }


	function terminarAtencion(){
        
        require_once "../conexion/conexion.php";
		$conexion = new Conexion();
        $conexion->iniciarSesion();
        session_start();
		$id_usuario = $_SESSION['id_usuario'];
		$identidadspm = 0;
		$consulta = mysqli_query($conexion->dameConexion(), "SELECT codigo_cliente_en_espera FROM clientes_en_espera  WHERE estado LIKE '%A%' and id_usuario = ".$id_usuario." LIMIT 1");
        
        if (mysqli_num_rows($consulta) > 0){
            
            while($row = mysqli_fetch_row($consulta)){
					 $identidadspm = $row[0];
                     
                
            }
             
        } 
		
        $sql =  "INSERT INTO   clientes_atendidos (codigo_cliente, codigo_servicio, boleta, tiempo, tiempo_adicional, fecha, estado, id_usuario)  
SELECT codigo_cliente, codigo_servicio, boleta, tiempo, tiempo_adicional, fecha, estado, id_usuario FROM clientes_en_espera WHERE codigo_cliente_en_espera = ".$identidadspm."";
         $conexion->dameConexion()->query($sql);
        
        $sql =  "DELETE FROM clientes_en_espera  WHERE codigo_cliente_en_espera = ".$identidadspm."";
		
            
        $conexion->dameConexion()->query($sql);
        
    }
//-------------------------------------------------------------------------------------------
//-------------------------------------------------------------------------------------------
//-------------------------------------------------------------------------------------------
//-------------------------------------------------------------------------------------------

	

?>