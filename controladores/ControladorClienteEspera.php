<?php
class ControladorClienteEspera{
	
}

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
        $consulta = mysqli_query($conexion->dameConexion(), "SELECT * FROM clientes_en_espera WHERE estado LIKE '%E%' LIMIT 1");
        
        if (mysqli_num_rows($consulta) > 0){
            
            while($row = mysqli_fetch_row($consulta)){
					 echo 0;
                     return;
                
            }
             
        } else { 
            echo 1;
        }
        
    }

//-------------------------------------------------------------------------------------------
//-------------------------------------------------------------------------------------------

//-------------------------------------------------------------------------------------------
//-------------------------------------------------------------------------------------------

	

?>