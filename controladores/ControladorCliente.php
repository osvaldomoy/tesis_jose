<?php 

	//------------------------ LISTA DE CLIENTES ----------------------------------------------------

	if(isset($_POST["lista"])){
		$datos = $_POST["lista"];
	}
		
	if(!empty($datos)){
		dameTodoCliente();
	}
	
	
	function dameTodoCliente(){
		
		require_once "../conexion/conexion.php";
		$conexion = new Conexion();
		$conexion->iniciarSesion();
		$consulta = mysqli_query($conexion->dameConexion(), "SELECT codigo_cliente, nombre, apellido, cedula, telefono, correo FROM clientes");
		
		$cont = 1;
		if (mysqli_num_rows($consulta) > 0){
			echo "<tbody>";
			 while($row = mysqli_fetch_array($consulta)){
				echo "<tr>";
				echo "<th scope='row'>".$cont."</th>"; 
				echo "<td class='fila' style='display: none'>".$row[0]."</td>"; 
				echo "<td class='fila'>".$row[1]."</td>"; 
				echo "<td class='fila'>".$row[2]."</td>"; 
				echo "<td class='fila'>".$row[3]."</td>";
				echo "<td class='fila'>".$row[4]."</td>";
				echo "<td class='fila'>".$row[5]."</td>";
				echo "<td style='display: flex; justify-content: space-around'>".
					"<button class='btn btn-success modificar-datos-cliente'>Modificar</button>"
					."<button class='btn btn-danger eliminar-datos-cliente'>Eliminar</button>"
					."</td>";
				echo "</tr>";
				$cont++;
			 }
			echo "</tbody>";
			 
		} else { 
			echo "No hay datos"; 
		}
	}
	


	//-----------------------------------------------------------------------------------------------
	
	//--------------------------------------- GUARDAR NUEVO CLIENTE ---------------------------------
	
	require_once("../conexion/conexion.php");
	require_once("../modelos/clientes.php");

	if(isset($_POST["nombre"]) and isset($_POST["apellido"]) and isset($_POST["cedula"]) and isset($_POST["telefono"]) and isset($_POST["correo"])){
		
		$nombre = $_POST["nombre"];
		$apellido = $_POST["apellido"];
		$cedula = $_POST["cedula"];
		$telefono = $_POST["telefono"];
		$correo = $_POST["correo"];
		
		$guardarCliente = new Clientes($nombre, $apellido, $cedula, $telefono, $correo);
		
	}

	if(!empty($guardarCliente)){
		GuardarDatosCliente($guardarCliente);
	}

	function GuardarDatosCliente($guardarCliente){
		
		$sql = "INSERT INTO clientes (nombre, apellido, cedula, telefono, correo) VALUES ('"
            .$guardarCliente->getNombre()."','"
            .$guardarCliente->getApellido()."',"
            .$guardarCliente->getCedula().",'"
            .$guardarCliente->getTelefono()."','"
            .$guardarCliente->getCorreo()."')";
            
        echo $sql;
        
        $conexion = new Conexion();
        $conexion->iniciarSesion();
        $conexion->dameConexion()->query($sql);
		
	}

	//-----------------------------------------------------------------------------------------------

	//--------------------------------------- MODIFICAR CLIENTE ---------------------------------

	require_once("../conexion/conexion.php");
	require_once("../modelos/clientes.php");

	if(isset($_POST["up_id"]) and isset($_POST["up_nombre"]) and isset($_POST["up_apellido"]) and isset($_POST["up_cedula"]) and isset($_POST["up_telefono"]) and isset($_POST["up_correo"])){
		
		$codigo_cliente = $_POST["up_id"];
		$nombre = $_POST["up_nombre"];
		$apellido = $_POST["up_apellido"];
		$cedula = $_POST["up_cedula"];
		$telefono = $_POST["up_telefono"];
		$correo = $_POST["up_correo"];
		
		$modificarCliente = new Clientes($codigo_cliente, $nombre, $apellido, $cedula, $telefono, $correo);
		
	}

	if(!empty($modificarCliente)){
		ModificardatosClientes($modificarCliente);
	}

	function ModificardatosClientes($modificarCliente){
		
		$sql = "UPDATE clientes SET "
			."codigo_cliente=".$modificarCliente->getCodigoCliente().","
			."nombre='".$modificarCliente->getNombre()."',"
			."apellido='".$modificarCliente->getApellido()."',"
			."cedula=".$modificarCliente->getCedula().","
			."telefono='".$modificarCliente->getTelefono()."',"
			."correo='".$modificarCliente->getCorreo()."'"
			." WHERE codigo_cliente = ".$modificarCliente->getCodigoCliente()."";
            
        echo $sql;
        
        $conexion = new Conexion();
        $conexion->iniciarSesion();
        $conexion->dameConexion()->query($sql);
		
	}

	//--------------------------------------- ELIMINAR CLIENTE ---------------------------------
	
	require_once("../conexion/conexion.php");
	require_once("../modelos/clientes.php");

	if(isset($_POST["id_delete"])){
		
		$codigo_cliente = $_POST["id_delete"];
		
		$borrarCliente = new Clientes($codigo_cliente);
		
	}

	if(!empty($borrarCliente)){
		
		BorrarDatosCliente($borrarCliente);
	}
	else {
		echo 'no';
	}

	function BorrarDatosCliente($borrarCliente){
		
		$sql = "DELETE FROM clientes WHERE codigo_cliente = ".$borrarCliente->getCodigoCliente()."";
            
        echo $sql;
        
        $conexion = new Conexion();
        $conexion->iniciarSesion();
        $conexion->dameConexion()->query($sql);
		
	}

	//-----------------------------------------------------------------------------------------------
		
	if(isset($_POST["cedula"])){
		$cedula = $_POST["cedula"];
	}
		
	if(!empty($cedula)){
		existeCliente($cedula);
	}
	
	
	function existeCliente($cedula){
		
		require_once "../conexion/conexion.php";
		$conexion = new Conexion();
		$conexion->iniciarSesion();
		$consulta = mysqli_query($conexion->dameConexion(), "SELECT cedula FROM clientes WHERE cedula = ".$cedula);
		
		if (mysqli_num_rows($consulta) > 0){
			 echo 1;
			
			 
		} else { 
			echo 0; 
		}
	}

	if(isset($_POST["idc"])){
		$idc = $_POST["idc"];
	}
		
	if(!empty($idc)){
		dameTituloCliente($idc);
	}
	

	function dameTituloCliente($idc){
		require_once "../conexion/conexion.php";
		$conexion = new Conexion();
		$conexion->iniciarSesion();
		$consulta = mysqli_query($conexion->dameConexion(), "SELECT CONCAT(nombre, ' ', apellido) FROM clientes WHERE cedula = ".$idc);
		
		if (mysqli_num_rows($consulta) > 0){
			 while($row = mysqli_fetch_array($consulta)){
				 echo "<h1 style='display: inline-block;'>".$row[0]."</h1>";
			 }
			
			 
		}
	}

	if(isset($_POST["dameTablaDeAutos"])){
		$funcion_autos = $_POST["dameTablaDeAutos"];
	}
		
	if(!empty($funcion_autos)){
		dameTablaDeAutos();
	}


	function dameTablaDeAutos(){
		require_once "../conexion/conexion.php";
		$conexion = new Conexion();
		$conexion->iniciarSesion();
		$consulta = mysqli_query($conexion->dameConexion(), "SELECT au.chapa, m.descripcion, mar.descripcion
															FROM clientes c
															JOIN clientes_automoviles ca 
															ON ca.id_cliente = c.codigo_cliente 
															JOIN automovil au 
															ON au.id_automovil = ca.id_automovil
															JOIN modelo m 
															ON m.id_modelo = au.id_modelo 
															JOIN marca mar 
															ON mar.id_marca = au.id_marca");
		$cont = 1;
		if (mysqli_num_rows($consulta) > 0){
			 echo "<tbody>";
			 while($row = mysqli_fetch_array($consulta)) {
					 echo "<tr>";
					 echo "<th scope='row'>".$row[0]."</th>"; 
					 echo "<td>".$row[1]."</td>"; 
					 echo "<td>".$row[2]."</td>";
				 	 echo "<td><select name='servicios_lts' id='pr' class='opcion-servicio'>".
						 	"<option>Seleccione un servicio</option>".
						 	require_once('ControladorServicio.php');
				 			dameListaServicios();
					      "</select></td>";
					 echo "<td class='check' style='text-align: right;'><input type='checkbox' class='f1'></td>"; 
					 echo "</tr>";
				 
				 //$cont++;
				 
			}
			 echo "</tbody>";
		} else { 
		echo " <p>Aún no hay registros en la base de datos</p>"; 
		}
	}
	
	//--------------------- OBTENER ID DEL CLIENTE A PARTIR DE LA CÉDULA -------------------------------------

	if(isset($_POST["id"])){
		$id_cliente = $_POST["id"];
	}
		
	if(!empty($id_cliente)){
		dameIdCliente($id_cliente);
	}
	

	function dameIdCliente($id_cliente){
		require_once "../conexion/conexion.php";
		$conexion = new Conexion();
		$conexion->iniciarSesion();
		$consulta = mysqli_query($conexion->dameConexion(), "SELECT codigo_cliente FROM clientes WHERE cedula = ".$id_cliente);
		
		if (mysqli_num_rows($consulta) > 0){
			 while($row = mysqli_fetch_array($consulta)){
				 echo $row[0];
			 }
			
			 
		}
	}


?>
