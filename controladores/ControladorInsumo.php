<?php

if (isset($_POST["lista"])) {
    $datos = $_POST["lista"];
}

if (!empty($datos)) {
    dameTodoInsumos();
}

function dameTodoInsumos() {

    require_once "../conexion/conexion.php";
    $conexion = new Conexion();
    $conexion->iniciarSesion();
    $consulta = mysqli_query($conexion->dameConexion(), "SELECT codigo_insumo, nombre, stock, stock_minimo,"
            . "precio FROM insumos");

    $cont = 1;
    if (mysqli_num_rows($consulta) > 0) {
        echo "<tbody>";
        while ($row = mysqli_fetch_array($consulta)) {
            echo "<tr>";
            echo "<th scope='row'>" . $cont . "</th>";
            echo "<td class='fila' style='display: none;'>" . $row[0] . "</td>";
            echo "<td class='fila'>" . $row[1] . "</td>";
            echo "<td class='fila'>" . $row[2] . "</td>";
            echo "<td class='fila'>" . $row[3] . "</td>";
            echo "<td class='fila'>" . $row[4] . "</td>";
            echo "<td style='display: flex; justify-content: space-around'>" .
            "<button class='btn btn-success modificar-datos-insumo'>Modificar</button>"
            . "<button class='btn btn-danger eliminar-datos-insumo'>Eliminar</button>"
            . "</td>";
            echo "</tr>";
            $cont++;
        }
        echo "</tbody>";
    } else {
        echo "No hay datos";
    }
}

//------------------------------- GUARDAR DATOS INSUMO -----------------------------------


require_once("../conexion/conexion.php");
require_once("../modelos/insumos.php");

if (isset($_POST["nombre"]) and isset($_POST["stock"]) and isset($_POST["stock_minimo"])
        and isset($_POST["precio"])) {

    $nombre = $_POST["nombre"];
    $stock = $_POST["stock"];
    $stock_minimo = $_POST["stock_minimo"];
    $precio = $_POST["precio"];
    
    $guardarInsumo = new Insumos($nombre, $stock, $stock_minimo, $precio);
}

if (!empty($guardarInsumo)) {
    GuardarDatosInsumo($guardarInsumo);
}

function GuardarDatosInsumo($guardarInsumo) {

    $sql = "INSERT INTO insumos (nombre, stock, stock_minimo, precio) VALUES ('"
            . $guardarInsumo->getNombre() . "',"
            . $guardarInsumo->getStock() . ","
            . $guardarInsumo->getStockMinimo() . ","
            . $guardarInsumo->getPrecio() . ")";

    echo $sql;

    $conexion = new Conexion();
    $conexion->iniciarSesion();
    $conexion->dameConexion()->query($sql);
}

//------------------------------- MODIFICAR DATOS INSUMO -----------------------------------

require_once("../conexion/conexion.php");
require_once("../modelos/insumos.php");

if (isset($_POST["up_id"]) and isset($_POST["up_nombre"]) and isset($_POST["up_stock"])
        and isset($_POST["up_stock_minimo"]) and isset($_POST["up_precio"])) {

    $up_id_insumo = $_POST["up_id"];
    $up_nombre = $_POST["up_nombre"];
    $up_stock = $_POST["up_stock"];
    $up_stock_minimo = $_POST["up_stock_minimo"];
    $up_precio = $_POST["up_precio"];


    $modificarInsumo = new Insumos($up_id_insumo, $up_nombre, $up_stock, $up_stock_minimo,
            $up_precio);
}

if (!empty($modificarInsumo)) {
    ModificardatosInsumo($modificarInsumo);
}

function ModificardatosInsumo($modificarInsumo) {

    $sql = "UPDATE insumos SET "
            . "nombre='" . $modificarInsumo->getNombre() . "',"
            . "stock=" . $modificarInsumo->getStock() . ","
            . "stock_minimo=" . $modificarInsumo->getStockMinimo() . ","
            . "precio=" . $modificarInsumo->getPrecio() . ""
            . " WHERE codigo_insumo = " . $modificarInsumo->getCodigoInsumo() . "";

    echo $sql;

    $conexion = new Conexion();
    $conexion->iniciarSesion();
    $conexion->dameConexion()->query($sql);
}

//------------------------------ ELIMINAR DATOS INSUMO -------------------------------------

require_once("../conexion/conexion.php");
require_once("../modelos/insumos.php");

if (isset($_POST["id_delete"])) {

    $delete_codigo_insumo = $_POST["id_delete"];

    $borrarInsumo = new Insumos($delete_codigo_insumo);
}

if (!empty($borrarInsumo)) {

    BorrarDatosModelo($borrarInsumo);
} else {
    echo 'no';
}

function BorrarDatosModelo($borrarInsumo) {

    $sql = "DELETE FROM insumos WHERE codigo_insumo = " . $borrarInsumo->getCodigoInsumo() . "";

    echo $sql;

    $conexion = new Conexion();
    $conexion->iniciarSesion();
    $conexion->dameConexion()->query($sql);
}

//-----------------------------------------------------------------------------------------------------------
	//-----------------------------------------------------------------------------------------------------------
	if(isset($_POST['precio_insumo_nombre'])  
	 ){
		
		
		$nombre = $_POST['precio_insumo_nombre'];
		
		
		damePrecioInsumoPorNombre($nombre);
		
	}

	

	function damePrecioInsumoPorNombre($nombre){
		
		require_once "../conexion/conexion.php";
		$conexion = new Conexion();
		$conexion->iniciarSesion();
		
		$consulta = mysqli_query($conexion->dameConexion(), "SELECT precio FROM insumos WHERE nombre LIKE '".$nombre."'");

		
		if (mysqli_num_rows($consulta) > 0){
			
			 while($row = mysqli_fetch_array($consulta)){
				echo  $row[0];
			 }
			
			 
		}else{
			echo 0;
		}
		
		
		
		
	}

?>