<?php

//------------------------ LISTA DE CLIENTES - AUTOMOVILES ----------------------------------------------------

if (isset($_POST["lista"])) {
    $datos = $_POST["lista"];
}

if (!empty($datos)) {
    dameTodoClienteAutomovil();
}

function dameTodoClienteAutomovil() {

    require_once "../conexion/conexion.php";
    $conexion = new Conexion();
    $conexion->iniciarSesion();
    $consulta = mysqli_query($conexion->dameConexion(), "SELECT 
        ca.id_cliente_automovil, CONCAT(ci.nombre, ' ', ci.apellido), 
        CONCAT(mr.descripcion, ' ', md.descripcion, ' ', a.anho), ca.chapa
        FROM clientes_automoviles ca 
        JOIN clientes ci
        ON ci.codigo_cliente = ca.id_cliente
        JOIN automovil a
        ON a.id_automovil = ca.id_automovil
        JOIN marca mr
        ON mr.id_marca = a.id_marca
        JOIN modelo md
        ON md.id_modelo = a.id_modelo
        WHERE ca.activo = 1");

    $cont = 1;
    if (mysqli_num_rows($consulta) > 0) {
        echo "<tbody>";
        while ($row = mysqli_fetch_array($consulta)) {
            echo "<tr>";
            echo "<th scope='row'>" . $cont . "</th>";
            echo "<td class='fila' style='display: none'>" . $row[0] . "</td>";
            echo "<td class='fila'>" . $row[1] . "</td>";
            echo "<td class='fila'>" . $row[2] . "</td>";
            echo "<td class='fila'>" . $row[3] . "</td>";
            echo "<td style='display: flex; justify-content: space-around'>" .
            "<button class='btn btn-success modificar-datos-cliente-automovil'>Modificar</button>"
            . "<button class='btn btn-danger eliminar-datos-cliente-automovil'>Eliminar</button>"
            . "</td>";
            echo "</tr>";
            $cont++;
        }
        echo "</tbody>";
    } else {
        echo "No hay datos";
    }
}

//------------------------ PROPORCIONAR CHAPA ----------------------------------------------------

if (isset($_POST["nombre_chapa"])) {
    $datos_chapa = $_POST["nombre_chapa"];
}

if (!empty($datos_chapa)) {
    dameChapaClienteAutomovil($datos_chapa);
}

function dameChapaClienteAutomovil($datos_chapa) {

    require_once "../conexion/conexion.php";
    $conexion = new Conexion();
    $conexion->iniciarSesion();
    $consulta = mysqli_query($conexion->dameConexion(), "SELECT chapa FROM clientes_automoviles "
            . "WHERE chapa = '" . $datos_chapa . "'");

    if (mysqli_num_rows($consulta) > 0) {
        while ($row = mysqli_fetch_array($consulta)) {
            echo $row[0];
        }
    } else {
        echo "No hay datos";
    }
}

//------------------------ PROPORCIONAR CHAPA POR ID CLIENTE AUTOMOVIL ----------------------------------------------------

if (isset($_POST["id_chapa"])) {
    $datos_chapa_id = $_POST["id_chapa"];
}

if (!empty($datos_chapa_id)) {
    dameChapaClienteAutomovilId($datos_chapa_id);
}

function dameChapaClienteAutomovilId($datos_chapa_id) {

    require_once "../conexion/conexion.php";
    $conexion = new Conexion();
    $conexion->iniciarSesion();
    $consulta = mysqli_query($conexion->dameConexion(), "SELECT chapa FROM clientes_automoviles "
            . "WHERE id_cliente_automovil = " . $datos_chapa_id . "");

    if (mysqli_num_rows($consulta) > 0) {
        while ($row = mysqli_fetch_array($consulta)) {
            echo $row[0];
        }
    } else {
        echo "No hay datos";
    }
}

//------------------------ PROPORCIONAR ID CLIENTE POR ID CLIENTE AUTOMOVIL ----------------------------------------------------

if (isset($_POST["id_cliente_automovil"])) {
    $datos_id_cliente = $_POST["id_cliente_automovil"];
}

if (!empty($datos_id_cliente)) {
    proporcionaIdcliente($datos_id_cliente);
}

function proporcionaIdcliente($datos_id_cliente) {

    require_once "../conexion/conexion.php";
    $conexion = new Conexion();
    $conexion->iniciarSesion();
    $consulta = mysqli_query($conexion->dameConexion(), "SELECT id_cliente FROM clientes_automoviles "
            . "WHERE id_cliente_automovil = " . $datos_id_cliente . "");

    if (mysqli_num_rows($consulta) > 0) {
        while ($row = mysqli_fetch_array($consulta)) {
            echo $row[0];
        }
    } else {
        echo "No hay datos";
    }
}


//------------------------ PROPORCIONAR ID CLIENTE POR ID CLIENTE AUTOMOVIL ----------------------------------------------------

if (isset($_POST["id_cliente_automovil_auto"])) {
    $datos_id_automovil = $_POST["id_cliente_automovil_auto"];
}

if (!empty($datos_id_automovil)) {
    proporcionaIdautomovil($datos_id_automovil);
}

function proporcionaIdautomovil($datos_id_automovil) {

    require_once "../conexion/conexion.php";
    $conexion = new Conexion();
    $conexion->iniciarSesion();
    $consulta = mysqli_query($conexion->dameConexion(), "SELECT id_automovil FROM clientes_automoviles "
            . "WHERE id_cliente_automovil = " . $datos_id_automovil . "");

    if (mysqli_num_rows($consulta) > 0) {
        while ($row = mysqli_fetch_array($consulta)) {
            echo $row[0];
        }
    } else {
        echo "No hay datos";
    }
}

//--------------------------------------- GUARDAR CLIENTE - AUTOMOVIL ---------------------------------

require_once("../conexion/conexion.php");
require_once("../modelos/clientes_automoviles.php");

if (isset($_POST["id_cliente"]) and isset($_POST["id_automovil"]) and isset($_POST["chapa"])) {

    $id_cliente = $_POST["id_cliente"];
    $id_automovil = $_POST["id_automovil"];
    $chapa = $_POST["chapa"];

    $guardarClienteAutomovil = new ClientesAutomoviles($id_cliente, $id_automovil, $chapa);
}

if (!empty($guardarClienteAutomovil)) {
    GuardarDatosClienteAutomovil($guardarClienteAutomovil);
}

function GuardarDatosClienteAutomovil($guardarClienteAutomovil) {

    $sql = "INSERT INTO clientes_automoviles (id_cliente, id_automovil, chapa, activo) VALUES ("
            . $guardarClienteAutomovil->getIdCliente() . ","
            . $guardarClienteAutomovil->getIdAutomovil() . ",'"
            . $guardarClienteAutomovil->getChapa() . "', 1)";

    echo $sql;

    $conexion = new Conexion();
    $conexion->iniciarSesion();
    $conexion->dameConexion()->query($sql);
}

//--------------------------------------- MODIFICAR CLIENTE ---------------------------------

require_once("../conexion/conexion.php");
require_once("../modelos/clientes_automoviles.php");

if (isset($_POST["up_id"]) and isset($_POST["up_id_cliente"]) and isset($_POST["up_id_automovil"]) 
        and isset($_POST["up_chapa"])) {

    $up_id_cliente_automovil = $_POST["up_id"];
    $up_id_cliente = $_POST["up_id_cliente"];
    $up_id_automovil = $_POST["up_id_automovil"];
    $up_chapa = $_POST["up_chapa"];

    $modificarClienteAutomovil = new ClientesAutomoviles($up_id_cliente_automovil, 
            $up_id_cliente, $up_id_automovil, $up_chapa);
}

if (!empty($modificarClienteAutomovil)) {
    modificarDatosClienteAutomovil($modificarClienteAutomovil);
}

function modificarDatosClienteAutomovil($modificarClienteAutomovil) {

    $sql = "UPDATE clientes_automoviles SET "
            . "id_cliente_automovil= " . $modificarClienteAutomovil->getIdClienteAutomovil() . ","
            . "id_cliente= " . $modificarClienteAutomovil->getIdCliente() . ","
            . "id_automovil= " . $modificarClienteAutomovil->getIdAutomovil() . ","
            . "chapa= '" . $modificarClienteAutomovil->getChapa() . "'"
            . " WHERE id_cliente_automovil = " . $modificarClienteAutomovil->getIdClienteAutomovil() . "";

    echo $sql;

    $conexion = new Conexion();
    $conexion->iniciarSesion();
    $conexion->dameConexion()->query($sql);
}

//------------------------------ ELIMINAR DATOS CLIENTE AUTOMOVIL -------------------------------------

require_once("../conexion/conexion.php");
require_once("../modelos/clientes_automoviles.php");

if (isset($_POST["id_delete"])) {

    $delete_id_cliente_automovil = $_POST["id_delete"];

    $borrarClienteAutomovil = new ClientesAutomoviles($delete_id_cliente_automovil);
}

if (!empty($borrarClienteAutomovil)) {

    BorrarDatosClienteAutomovil($borrarClienteAutomovil);
}

function BorrarDatosClienteAutomovil($borrarClienteAutomovil) {

    $sql = "DELETE FROM clientes_automoviles WHERE id_cliente_automovil = " 
            . $borrarClienteAutomovil->getIdClienteAutomovil() . "";

    echo $sql;

    $conexion = new Conexion();
    $conexion->iniciarSesion();
    $conexion->dameConexion()->query($sql);
}
