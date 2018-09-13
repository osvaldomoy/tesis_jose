<?php

if (isset($_POST["lista"])) {
    $datos = $_POST["lista"];
}

if (!empty($datos)) {
    dameTodoModelo();
}

function dameTodoModelo() {

    require_once "../conexion/conexion.php";
    $conexion = new Conexion();
    $conexion->iniciarSesion();
    $consulta = mysqli_query($conexion->dameConexion(), "SELECT id_modelo, descripcion FROM modelo WHERE activo = 1");

    $cont = 1;
    if (mysqli_num_rows($consulta) > 0) {
        echo "<tbody>";
        while ($row = mysqli_fetch_array($consulta)) {
            echo "<tr>";
            echo "<th scope='row'>" . $cont . "</th>";
            echo "<td class='fila' style='display: none;'>" . $row[0] . "</td>";
            echo "<td class='fila'>" . $row[1] . "</td>";
            echo "<td style='display: flex; justify-content: space-around'>" .
            "<button class='btn btn-success modificar-datos-modelo'>Modificar</button>"
            . "<button class='btn btn-danger eliminar-datos-modelo'>Eliminar</button>"
            . "</td>";
            echo "</tr>";
            $cont++;
        }
        echo "</tbody>";
    } else {
        echo "No hay datos";
    }
}

//------------------------------- GUARDAR DATOS MODELO -----------------------------------


require_once("../conexion/conexion.php");

if (isset($_POST["descripcion"])) {

    $descripcion = $_POST["descripcion"];
}

if (!empty($descripcion)) {
    GuardarDatosModelo($descripcion);
}

function GuardarDatosModelo($descripcion) {

    $sql = "INSERT INTO modelo (descripcion, activo) VALUES ('" . $descripcion . "', 1)";

    echo $sql;

    $conexion = new Conexion();
    $conexion->iniciarSesion();
    $conexion->dameConexion()->query($sql);
}

//------------------------------- MODIFICAR DATOS MODELO -----------------------------------

require_once("../conexion/conexion.php");
require_once("../modelos/modelo.php");

if (isset($_POST["up_id"]) and isset($_POST["up_descripcion"])) {

    $up_id_modelo = $_POST["up_id"];
    $up_descripcion = $_POST["up_descripcion"];


    $modificarModelo = new Modelo($up_id_modelo, $up_descripcion);
}

if (!empty($modificarModelo)) {
    ModificardatosModelo($modificarModelo);
}

function ModificardatosModelo($modificarModelo) {

    $sql = "UPDATE modelo SET "
            . "id_modelo=" . $modificarModelo->getIdModelo() . ","
            . "descripcion='" . $modificarModelo->getDescripcion() . "'"
            . " WHERE id_modelo = " . $modificarModelo->getIdModelo() . "";

    echo $sql;

    $conexion = new Conexion();
    $conexion->iniciarSesion();
    $conexion->dameConexion()->query($sql);
}

//------------------------------ ELIMINAR DATOS MODELO -------------------------------------

require_once("../conexion/conexion.php");
require_once("../modelos/modelo.php");

if (isset($_POST["id_delete"])) {

    $delete_id_modelo = $_POST["id_delete"];

    $borrarModelo = new Modelo($delete_id_modelo);
}

if (!empty($borrarModelo)) {

    BorrarDatosModelo($borrarModelo);
}

function BorrarDatosModelo($borrarModelo) {

    $sql = "DELETE FROM modelo WHERE id_modelo = " . $borrarModelo->getIdModelo() . "";

    echo $sql;

    $conexion = new Conexion();
    $conexion->iniciarSesion();
    $conexion->dameConexion()->query($sql);
}

//----------------------- MOSTRAR MODELO-------------------------------------

if (isset($_POST["modelo"])) {
    $datos = $_POST["modelo"];
}

if (!empty($datos)) {
    dameModelo();
}

function dameModelo() {

    require_once "../conexion/conexion.php";
    $conexion = new Conexion();
    $conexion->iniciarSesion();
    $consulta = mysqli_query($conexion->dameConexion(), "SELECT descripcion FROM modelo WHERE activo = 1");

    if (mysqli_num_rows($consulta) > 0) {
        echo "<option value=''>Modelo</option>";
        while ($row = mysqli_fetch_array($consulta)) {
            echo "<option>$row[0]</option>";
      
        }
        
    } else {
        echo "No hay datos";
    }
}

//----------------------- OBTENER ID MODELO-------------------------------------

if (isset($_POST["nombre"])) {
    $nombre = $_POST["nombre"];
}

if (!empty($nombre)) {
    dameIdModelo($nombre);
}

function dameIdModelo($nombre) {

    require_once "../conexion/conexion.php";
    $conexion = new Conexion();
    $conexion->iniciarSesion();
    $consulta = mysqli_query($conexion->dameConexion(), "SELECT id_modelo FROM modelo "
            . "WHERE descripcion = '" . $nombre . "'");

    if (mysqli_num_rows($consulta) > 0) {
        while ($row = mysqli_fetch_array($consulta)) {
            echo $row[0];
        }
    } else {
        echo "No hay datos";
    }
}

?>