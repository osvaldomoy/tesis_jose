<?php 

class ControladorClienteObjeto{
	
	function __construct(){
		require_once "../conexion/conexion.php";
		
		
	}
	
	public function dameTablaDeAutos(){
		
		$conexion = new Conexion();
		$conexion->iniciarSesion();
		$consulta = mysqli_query($conexion->dameConexion(), "SELECT  au.chapa, m.descripcion, mar.descripcion
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
					 echo "</tr>";
				 
				 
				 
			}
			 echo "</tbody>";
		} else { 
		echo " <p>Aún no hay registros en la base de datos</p>"; 
		}
	}
	
	
}

?>