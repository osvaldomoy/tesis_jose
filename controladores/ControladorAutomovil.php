<?php

if (isset($_POST["lista"])) {
    $datos = $_POST["lista"];
}

if (!empty($datos)) {
    dameTodoAuto();
}

function dameTodoAuto() {

    require_once "../conexion/conexion.php";
    $conexion = new Conexion();
    $conexion->iniciarSesion();
    $consulta = mysqli_query($conexion->dameConexion(), "SELECT a.id_automovil, "
            . "mr.descripcion, md.descripcion,"
            . " a.anho FROM automovil a "
            . "JOIN marca mr ON mr.id_marca = a.id_marca "
            . "JOIN modelo md ON md.id_modelo = a.id_modelo "
            . "WHERE a.activo = 1 ORDER BY a.id_automovil ASC");

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
            echo "<td style='display: flex; justify-content: space-around'>" .
            "<button class='btn btn-success modificar-datos-automovil'>Modificar</button>"
            . "<button class='btn btn-danger eliminar-datos-automovil'>Eliminar</button>"
            . "</td>";
            echo "</tr>";
            $cont++;
        }
        echo "</tbody>";
    } else {
        echo "No hay datos";
    }
}

//-------------------------- FILTRAR AUTOMOVIL -----------------------------------------


if (isset($_POST["dame_filtro_auto"])) {
    $filtro_automovil = $_POST["dame_filtro_auto"];
}

if (!empty($filtro_automovil)) {
    dameFiltroAutomovil($filtro_automovil);
}

function dameFiltroAutomovil($filtro_automovil) {

    require_once "../conexion/conexion.php";
    $conexion = new Conexion();
    $conexion->iniciarSesion();
    $consulta = mysqli_query($conexion->dameConexion(), "SELECT CONCAT(mr.descripcion, ' ',md.descripcion) 
    FROM automovil a 
    JOIN marca mr 
    ON mr.id_marca = a.id_marca 
    JOIN modelo md 
    ON md.id_modelo = a.id_modelo 
    WHERE concat(mr.descripcion, ' ', md.descripcion) LIKE '".$filtro_automovil."%' 
    OR CONCAT(md.descripcion, ' ', mr.descripcion) LIKE '".$filtro_automovil."%'");

    if (mysqli_num_rows($consulta) > 0) {
        while ($row = mysqli_fetch_array($consulta)) {
            echo "<div class='caja_filtro_automovil'>".$row[0]."</div>";
        }
    } else {
        echo "No hay datos";
    }
}

//----------------------------- CARGAR LOS AUTOMOVILES ------------------------
if (isset($_POST["lista_auto"])) {
    $datos_auto = $_POST["lista_auto"];
}

if (!empty($datos_auto)) {
    dameNombreAuto();
}

function dameNombreAuto() {

    require_once "../conexion/conexion.php";
    $conexion = new Conexion();
    $conexion->iniciarSesion();
    $consulta = mysqli_query($conexion->dameConexion(), "SELECT id_automovil, CONCAT(mr.descripcion, ' ', md.descripcion, ' ', a.anho)
FROM automovil a
JOIN marca mr
ON mr.id_marca = a.id_marca
JOIN modelo md
ON md.id_modelo = a.id_modelo
WHERE a.activo = 1
ORDER BY mr.descripcion ASC");


    if (mysqli_num_rows($consulta) > 0) {
        echo "<option class='valor' value disabled selected>Automovil</option>";
        while ($row = mysqli_fetch_array($consulta)) {
            echo "<option value='" . $row[0] . "'>" . $row[1] . "</option>";
        }
    } else {
        echo "No hay datos";
    }
}

//------------------------------- GUARDAR DATOS AUTOMOVIL -----------------------------------


require_once("../conexion/conexion.php");
require_once("../modelos/automovil.php");


if (isset($_POST["id_marca"]) and isset($_POST["id_modelo"]) and isset($_POST["anho"])) {

    $id_marca = $_POST["id_marca"];
    $id_modelo = $_POST["id_modelo"];
    $anho = $_POST["anho"];

    $guardarAutomovil = new Automovil($id_modelo, $anho, $id_marca);
}


if (!empty($guardarAutomovil)) {
    GuardarDatosAutomovil($guardarAutomovil);
}

function GuardarDatosAutomovil($guardarAutomovil) {

    $sql = "INSERT INTO automovil (id_marca, id_modelo, anho, activo) VALUES ("
            . $guardarAutomovil->getIdMarca() . ", "
            . $guardarAutomovil->getIdModelo() . ", "
            . $guardarAutomovil->getAnho() . ", "
            . "1)";

    echo $sql;

    $conexion = new Conexion();
    $conexion->iniciarSesion();
    $conexion->dameConexion()->query($sql);
}

//------------------------------- MODIFICAR DATOS AUTOMOVIL -----------------------------------


require_once("../conexion/conexion.php");
require_once("../modelos/automovil.php");


if (isset($_POST["up_id"]) and isset($_POST["up_id_marca"]) and isset($_POST["up_id_modelo"])
        and isset($_POST["up_anho"])) {

    $id_automovil = $_POST["up_id"];
    $id_marca = $_POST["up_id_marca"];
    $id_modelo = $_POST["up_id_modelo"];
    $anho = $_POST["up_anho"];

    $modificarAutomovil = new Automovil($id_automovil, $id_modelo, $anho, $id_marca);
}

if (!empty($modificarAutomovil)) {
    ModificarDatosAutomovil($modificarAutomovil);
}

function ModificarDatosAutomovil($modificarAutomovil) {

    $sql = "UPDATE automovil SET "
            . "id_marca=" . $modificarAutomovil->getIdMarca() . ","
            . "id_modelo=" . $modificarAutomovil->getIdModelo() . ","
            . "anho=" . $modificarAutomovil->getAnho() . ""
            . " WHERE id_automovil = " . $modificarAutomovil->getIdAutomovil() . "";

    echo $sql;

    $conexion = new Conexion();
    $conexion->iniciarSesion();
    $conexion->dameConexion()->query($sql);
}

//------------------------------ ELIMINAR DATOS AUTOMOVIL -------------------------------------

require_once("../conexion/conexion.php");
require_once("../modelos/automovil.php");

if (isset($_POST["id_delete"])) {

    $delete_id_automovil = $_POST["id_delete"];

    $borrarAutomovil = new Automovil($delete_id_automovil);
}

if (!empty($borrarAutomovil)) {

    BorrarDatosAutomovil($borrarAutomovil);
}

function BorrarDatosAutomovil($borrarAutomovil) {

    $sql = "DELETE FROM automovil WHERE id_automovil = " . $borrarAutomovil->getIdAutomovil() . "";

    echo $sql;

    $conexion = new Conexion();
    $conexion->iniciarSesion();
    $conexion->dameConexion()->query($sql);
}


//----------------------- OBTENER ID DE AUTOMOVIL POR MEDIO DE LA DESCRIPCIÓN --------------------------------------------


require_once "../conexion/conexion.php";

if (isset($_POST["nombre"])) {
    $id_automovil = $_POST["nombre"];
}

if (!empty($id_automovil)) {
    dameIdAutomovil($id_automovil);
}

function dameIdAutomovil($id_automovil) {
    $conexion = new Conexion();
    $conexion->iniciarSesion();
    $consulta = mysqli_query($conexion->dameConexion(), "SELECT a.id_automovil "
            . "FROM automovil a "
            . "JOIN marca mr ON mr.id_marca = a.id_marca "
            . "JOIN modelo md ON md.id_modelo = a.id_modelo "
            . "WHERE CONCAT (mr.descripcion, ' ', md.descripcion) = '".$id_automovil."'");
    if (mysqli_num_rows($consulta) > 0) {

        while ($row = mysqli_fetch_array($consulta)) {
            echo $row[0];
        }
    } else {
        echo "No hay datos";
    }
}

