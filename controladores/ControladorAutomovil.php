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
            . "WHERE a.activo = 1");

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

//------------------------------- GUARDAR DATOS AUTOMOVIL -----------------------------------


require_once("../conexion/conexion.php");
require_once("../modelos/automovil.php");


if (isset($_POST["id_marca"]) and isset($_POST["id_modelo"]) and isset($_POST["anho"])) {

    $id_marca = $_POST["id_marca"];
    $id_modelo = $_POST["id_modelo"];
    $anho = $_POST["anho"];

    $guardarAutomovil = new Automovil($id_modelo, $anho, $id_marca);
}

$prueba = 'hola';

if (!empty($prueba)) {
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

?>