<?php
//------------------ LISTA DE SERVICIOS - INSUMOS -----------------------------------------

if (isset($_POST["dame_filtro"])) {
    $datos = $_POST["dame_filtro"];
}

if (!empty($datos)) {
    dameConsultaServicioInsumo();
}

function dameConsultaServicioInsumo() {

    require_once "../conexion/conexion.php";
    $conexion = new Conexion();
    $conexion->iniciarSesion();
    $consulta = mysqli_query($conexion->dameConexion(), "SELECT codigo_insumo, nombre, stock, stock_minimo,"
            . "precio FROM insumos LIMIT 20");

    if (mysqli_num_rows($consulta) > 0) {
        while ($row = mysqli_fetch_array($consulta)) {
            
        }
    } else {
        echo "No hay datos";
    }
}

//-------------------------- SELECCIONAR COLUMNAS DE LA TABLA SERVICIOS -----------------------------------------


if (isset($_POST["servicio"]) and isset($_POST["automovil"])) {
    $servicio = $_POST["servicio"];
    $automovil = $_POST["automovil"];
}

if (!empty($servicio)and !empty($automovil)) {
    dameTodoServicioInsumo($servicio, $automovil);
}

function dameTodoServicioInsumo($servicio, $automovil) {

    require_once "../conexion/conexion.php";
    $conexion = new Conexion();
    $conexion->iniciarSesion();
    $consulta = mysqli_query($conexion->dameConexion(), "SELECT dts.codigo_detalle, ins.nombre, dts.cantidad "
            . "FROM detalle_servicio_insumo dts "
            . "JOIN insumos ins ON ins.codigo_insumo = dts.codigo_insumo "
            . "JOIN servicios sr ON sr.codigo_servicio = dts.codigo_servicio "
            . "WHERE dts.codigo_servicio = (SELECT sr.codigo_servicio "
            . "FROM servicios sr WHERE sr.descripcion = '".$servicio."') "
            . "AND dts.codigo_automovil = (SELECT a.id_automovil "
            . "FROM automovil a "
            . "JOIN marca mr ON mr.id_marca = a.id_marca "
            . "JOIN modelo md ON md.id_modelo = a.id_modelo "
            . "WHERE CONCAT(mr.descripcion, ' ', md.descripcion) = '".$automovil."')");

    $cont = 1;
    if (mysqli_num_rows($consulta) > 0) {
        echo "<tbody>";
        while ($row = mysqli_fetch_array($consulta)) {
            echo "<tr>";
            echo "<th scope='row'>" . $cont . "</th>";
            echo "<td class='fila' style='display: none;'>" . $row[0] . "</td>";
            echo "<td class='fila'>" . $row[1] . "</td>";
            echo "<td class='fila'>" . $row[2] . "</td>";
            echo "<td style='display: flex; justify-content: space-around'>" .
            "<button class='btn btn-success modificar-datos-servicio-insumo'>Modificar</button>"
            . "<button class='btn btn-danger eliminar-datos-servicio-insumo'>Eliminar</button>"
            . "</td>";
            echo "</tr>";
            $cont++;
        }
        echo "</tbody></table>";
    }
}

// --------------------------- LISTAR DATOS SERVICIOS - INSUMOS ------------------
if (isset($_POST["lista"])) {
    $datos2 = $_POST["lista"];
}

if (!empty($datos2)) {
    dameTodoServicioInsumo2();
}

function dameTodoServicioInsumo2() {

    require_once "../conexion/conexion.php";
    $conexion = new Conexion();
    $conexion->iniciarSesion();
    $consulta = mysqli_query($conexion->dameConexion(), "SELECT dts.codigo_detalle, ins.nombre, dts.cantidad "
            . "FROM detalle_servicio_insumo dts "
            . "JOIN insumos ins ON ins.codigo_insumo = dts.codigo_insumo");

    $cont = 1;
    if (mysqli_num_rows($consulta) > 0) {
        echo "<tbody>";
        while ($row = mysqli_fetch_array($consulta)) {
            echo "<tr>";
            echo "<th scope='row'>" . $cont . "</th>";
            echo "<td class='fila' style='display: none;'>" . $row[0] . "</td>";
            echo "<td class='fila'>" . $row[1] . "</td>";
            echo "<td class='fila'>" . $row[2] . "</td>";
            echo "<td style='display: flex; justify-content: space-around'>" .
            "<button class='btn btn-success modificar-datos-servicio-insumo'>Modificar</button>"
            . "<button class='btn btn-danger eliminar-datos-servicio-insumo'>Eliminar</button>"
            . "</td>";
            echo "</tr>";
            $cont++;
        }
        echo "</tbody></table>";
    }
}

//------------------------------- GUARDAR DATOS SERVICIO - INSUMO -----------------------------------


require_once("../conexion/conexion.php");
require_once("../modelos/detalle_servicio_insumo.php");

if (isset($_POST["id_insumo"]) and isset($_POST["id_automovil"]) and isset($_POST["id_servicio"])
        and isset($_POST["cantidad"])) {

    $id_insumo = $_POST["id_insumo"];
    $id_automovil = $_POST["id_automovil"];
    $id_servicio = $_POST["id_servicio"];
    $cantidad = $_POST["cantidad"];

    $guardarServicioInsumo = new DetalleServicioInsumo($id_insumo, $id_servicio, $id_automovil, $cantidad);
}

if (!empty($guardarServicioInsumo)) {
    GuardarDatosServicioInsumo($guardarServicioInsumo);
}

function GuardarDatosServicioInsumo($guardarServicioInsumo) {

    $sql = "INSERT INTO detalle_servicio_insumo (codigo_insumo, codigo_servicio, codigo_automovil, cantidad) VALUES ("
            . $guardarServicioInsumo->getCodigoInsumo() . ","
            . $guardarServicioInsumo->getCodigoServicio() . ","
            . $guardarServicioInsumo->getCodigoAutomovil() . ","
            . $guardarServicioInsumo->getCantidad() . ")";

    echo $sql;

    $conexion = new Conexion();
    $conexion->iniciarSesion();
    $conexion->dameConexion()->query($sql);
}

//------------------------------------ MODIFICAR SERVICIO - INSUMO --------------------------------------

require_once("../conexion/conexion.php");
require_once("../modelos/detalle_servicio_insumo.php");

if (isset($_POST["id_detalle"]) and isset($_POST["up_id_insumo"]) and isset($_POST["up_cantidad"])) {

    $id_detalle = $_POST["id_detalle"];
    $up_id_insumo = $_POST["up_id_insumo"];
    $up_cantidad = $_POST["up_cantidad"];
    
    $modificarServicioInsumo = new DetalleServicioInsumo($id_detalle, $up_id_insumo, $up_cantidad);
}

if (!empty($modificarServicioInsumo)) {
    ModificardatosServicioInsumo($modificarServicioInsumo);
}

function ModificardatosServicioInsumo($modificarServicioInsumo) {

    $sql = "UPDATE detalle_servicio_insumo SET "
            . "codigo_insumo=" . $modificarServicioInsumo->getCodigoInsumo() . ","
            . "cantidad=" . $modificarServicioInsumo->getCantidad() . ""
            . " WHERE codigo_detalle = " . $modificarServicioInsumo->getCodigoDetalle() . "";

    echo $sql;

    $conexion = new Conexion();
    $conexion->iniciarSesion();
    $conexion->dameConexion()->query($sql);
}

//------------------------------ ELIMINAR DATOS INSUMO -SERVICIO -------------------------------------

require_once("../conexion/conexion.php");
require_once("../modelos/detalle_servicio_insumo.php");

if (isset($_POST["delete_codigo_detalle"])) {

    $delete_codigo_detalle = $_POST["delete_codigo_detalle"];

    $borrarServicioInsumo = new DetalleServicioInsumo($delete_codigo_detalle);
}

if (!empty($borrarServicioInsumo)) {

    BorrarDatosServicioInsumo($borrarServicioInsumo);
}

function BorrarDatosServicioInsumo($borrarServicioInsumo) {

    $sql = "DELETE FROM detalle_servicio_insumo WHERE codigo_detalle = " . $borrarServicioInsumo->getCodigoDetalle() . "";

    echo $sql;

    $conexion = new Conexion();
    $conexion->iniciarSesion();
    $conexion->dameConexion()->query($sql);
}