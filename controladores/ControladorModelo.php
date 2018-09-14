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
    $consulta = mysqli_query($conexion->dameConexion(), "SELECT id_modelo, id_marca, descripcion FROM modelo WHERE activo = 1");

    $cont = 1;
    if (mysqli_num_rows($consulta) > 0) {
        echo "<tbody>";
        while ($row = mysqli_fetch_array($consulta)) {
            echo "<tr>";
            echo "<th scope='row'>" . $cont . "</th>";
            echo "<td class='fila' style='display: none;'>" . $row[0] . "</td>";
            echo "<td class='fila' style='display: none;'>" . $row[1] . "</td>";
            echo "<td class='fila'>" . $row[2] . "</td>";
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
require_once("../modelos/modelo.php");

if (isset($_POST["id_marca"]) and isset($_POST["descripcion"])) {

    $id_marca = $_POST["id_marca"];
    $descripcion = $_POST["descripcion"];
    $guardarModelo = new Modelo($id_marca, $descripcion);
}

if (!empty($guardarModelo)) {
    GuardarDatosModelo($guardarModelo);
}

function GuardarDatosModelo($guardarModelo) {

    $sql = "INSERT INTO modelo (id_marca, descripcion, activo) VALUES (" 
            . $guardarModelo->getIdMarca() . ",'"
            . $guardarModelo->getDescripcion() . "',"
            . " 1)";

    echo $sql;

    $conexion = new Conexion();
    $conexion->iniciarSesion();
    $conexion->dameConexion()->query($sql);
}

//------------------------------- MODIFICAR DATOS MODELO -----------------------------------

require_once("../conexion/conexion.php");
require_once("../modelos/modelo.php");

if (isset($_POST["up_id"]) and isset($_POST["up_id_marca"]) and isset($_POST["up_descripcion"])) {

    $up_id_modelo = $_POST["up_id"];
    $up_id_marca = $_POST["up_id_marca"];
    $up_descripcion = $_POST["up_descripcion"];


    $modificarModelo = new Modelo($up_id_modelo, $up_id_marca, $up_descripcion);
}

if (!empty($modificarModelo)) {
    ModificardatosModelo($modificarModelo);
}

function ModificardatosModelo($modificarModelo) {

    $sql = "UPDATE modelo SET "
            . "id_modelo=" . $modificarModelo->getIdModelo() . ","
            . "id_marca=" . $modificarModelo->getIdMarca() . ","
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
        echo "<option value='' disabled selected>Modelo</option>";
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
//----------------------- OBTENER ID MODELO POR EL ID MARCA -------------------------------------

if (isset($_POST["id_mara_modelo"])) {
    $modelo_n = $_POST["id_mara_modelo"];
}

if (!empty($modelo_n)) {
    dameIdModeloN($modelo_n);
}

function dameIdModeloN($modelo_n) {

    require_once "../conexion/conexion.php";
    $conexion = new Conexion();
    $conexion->iniciarSesion();
    $consulta = mysqli_query($conexion->dameConexion(), "SELECT descripcion FROM modelo "
            . "WHERE id_marca = '" . $modelo_n . "'");

    if (mysqli_num_rows($consulta) > 0) {
        while ($row = mysqli_fetch_array($consulta)) {
            echo "<option>" . $row[0] . "</option>";
        }
    } else {
        echo "No hay datos";
    }
}

?>