<?php

if (isset($_POST["lista"])) {
    $datos = $_POST["lista"];
}

if (!empty($datos)) {
    dameTodoMarca();
}

function dameTodoMarca() {

    require_once "../conexion/conexion.php";
    $conexion = new Conexion();
    $conexion->iniciarSesion();
    $consulta = mysqli_query($conexion->dameConexion(), "SELECT id_marca, descripcion FROM marca WHERE activo = 1");

    $cont = 1;
    if (mysqli_num_rows($consulta) > 0) {
        echo "<tbody>";
        while ($row = mysqli_fetch_array($consulta)) {
            echo "<tr>";
            echo "<th scope='row'>" . $cont . "</th>";
            echo "<td class='fila' style='display: none;'>" . $row[0] . "</td>";
            echo "<td class='fila'>" . $row[1] . "</td>";
            echo "<td style='display: flex; justify-content: space-around'>" .
            "<button class='btn btn-success modificar-datos-marca'>Modificar</button>"
            . "<button class='btn btn-danger eliminar-datos-marca'>Eliminar</button>"
            . "</td>";
            echo "</tr>";
            $cont++;
        }
        echo "</tbody>";
    } else {
        echo "No hay datos";
    }
}

//------------------------------- GUARDAR DATOS MARCA -----------------------------------


require_once("../conexion/conexion.php");

if (isset($_POST["descripcion"])) {

    $descripcion = $_POST["descripcion"];

}

if (!empty($descripcion)) {
    GuardarDatosMarca($descripcion);
}

function GuardarDatosMarca($descripcion) {

    $sql = "INSERT INTO marca (descripcion, activo) VALUES ('" . $descripcion . "', 1)";

    echo $sql;

    $conexion = new Conexion();
    $conexion->iniciarSesion();
    $conexion->dameConexion()->query($sql);
}

//------------------------------- MODIFICAR DATOS MARCA -----------------------------------

require_once("../conexion/conexion.php");
require_once("../modelos/marca.php");

if (isset($_POST["up_id"]) and isset($_POST["up_descripcion"])) {

    $up_id_marca = $_POST["up_id"];
    $up_descripcion = $_POST["up_descripcion"];


    $modificarMarca = new Marca($up_id_marca, $up_descripcion);
}

if (!empty($modificarMarca)) {
    ModificardatosMarca($modificarMarca);
}

function ModificardatosMarca($modificarMarca) {

    $sql = "UPDATE marca SET "
            . "id_marca=" . $modificarMarca->getIdMarca() . ","
            . "descripcion='" . $modificarMarca->getDescripcion() . "'"
            . " WHERE id_marca = " . $modificarMarca->getIdMarca() . "";

    echo $sql;

    $conexion = new Conexion();
    $conexion->iniciarSesion();
    $conexion->dameConexion()->query($sql);
}

//------------------------------ ELIMINAR DATOS MARCA -------------------------------------

require_once("../conexion/conexion.php");
require_once("../modelos/marca.php");

if (isset($_POST["id_delete"])) {

    $delete_id_marca = $_POST["id_delete"];

    $borrarMarca = new Marca($delete_id_marca);
}

if (!empty($borrarMarca)) {

    BorrarDatosMarca($borrarMarca);
}

function BorrarDatosMarca($borrarMarca) {

    $sql = "DELETE FROM marca WHERE id_marca = " . $borrarMarca->getIdMarca() . "";

    echo $sql;

    $conexion = new Conexion();
    $conexion->iniciarSesion();
    $conexion->dameConexion()->query($sql);
}

//----------------------- MOSTRAR MARCA-------------------------------------

if (isset($_POST["marca"])) {
    $datos = $_POST["marca"];
}

if (!empty($datos)) {
    dameMarca();
}

function dameMarca() {

    require_once "../conexion/conexion.php";
    $conexion = new Conexion();
    $conexion->iniciarSesion();
    $consulta = mysqli_query($conexion->dameConexion(), "SELECT descripcion FROM marca WHERE activo = 1 "
            . "ORDER BY descripcion ASC");

    if (mysqli_num_rows($consulta) > 0) {
        echo "<option class='valor' value='' disabled selected>Marca</option>";
        while ($row = mysqli_fetch_array($consulta)) {
            echo "<option>$row[0]</option>";
        }
    } else {
        echo "No hay datos";
    }
}

//----------------------- MOSTRAR NOMBRE MARCA-------------------------------------

if (isset($_POST["dato"])) {
    $dato = $_POST["dato"];
}

if (!empty($dato)) {
    dameDescripcionMarca($dato);
}

function  dameDescripcionMarca($dato) {

    require_once "../conexion/conexion.php";
    $conexion = new Conexion();
    $conexion->iniciarSesion();
    $consulta = mysqli_query($conexion->dameConexion(), "SELECT descripcion FROM marca WHERE id_marca = "
            ." ". $dato ." AND activo = 1");

    if (mysqli_num_rows($consulta) > 0) {
        while ($row = mysqli_fetch_array($consulta)) {
            echo $row[0];
        }
    } else {
        echo "No hay datos";
    }
}

//----------------------- OBTENER ID MARCA-------------------------------------

if (isset($_POST["nombre"])) {
    $nombre = $_POST["nombre"];
}

if (!empty($nombre)) {
    dameIdMarca($nombre);
}

function dameIdMarca($nombre) {

    require_once "../conexion/conexion.php";
    $conexion = new Conexion();
    $conexion->iniciarSesion();
    $consulta = mysqli_query($conexion->dameConexion(), "SELECT id_marca FROM marca "
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