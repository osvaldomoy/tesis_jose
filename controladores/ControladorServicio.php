<?php

//-------------------------- SELECCIONAR COLUMNAS DE LA TABLA SERVICIOS -----------------------------------------


if (isset($_POST["lista_servicio"])) {
    $datos = $_POST["lista_servicio"];
}

if (!empty($datos)) {
    dameTodoServicio();
}

function dameTodoServicio() {

    require_once "../conexion/conexion.php";
    $conexion = new Conexion();
    $conexion->iniciarSesion();
    $consulta = mysqli_query($conexion->dameConexion(), "SELECT codigo_servicio, descripcion, precio, tiempo_servicio FROM servicios");

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
            "<button class='btn btn-success modificar-datos-servicio'>Modificar</button>"
            . "<button class='btn btn-danger eliminar-datos-servicio'>Eliminar</button>"
            . "</td>";
            echo "</tr>";
            $cont++;
        }
        echo "</tbody>";
    } else {
        echo "No hay datos";
    }
}

//------------------------------- GUARDAR DATOS SERVICIO -----------------------------------


require_once("../conexion/conexion.php");
require_once("../modelos/servicios.php");

if ((isset($_POST["servicio"])) and ( isset($_POST["precio"]))and ( isset($_POST["tiempo_servicio"]))) {

    $descripcion = $_POST["servicio"];
    $precio = $_POST["precio"];
    $tiempo_servicio = $_POST["tiempo_servicio"];

    $guardarServicio = new Servicios($descripcion, $precio, $tiempo_servicio);
}

if (!empty($guardarServicio)) {
    GuardarDatosServicio($guardarServicio);
}

function GuardarDatosServicio($guardarServicio) {

    $sqls = "INSERT INTO servicios (descripcion, precio, tiempo_servicio) VALUES ('"
            . $guardarServicio->getDescripcion() . "','"
            . $guardarServicio->getPrecio() . "','"
            . $guardarServicio->getTiempoServicio() . "')";

    echo $sqls;

    $conexion = new Conexion();
    $conexion->iniciarSesion();
    $conexion->dameConexion()->query($sqls);
}

//------------------------------------ MODIFICAR SERVICIO -------------------------------------------------------

require_once("../conexion/conexion.php");
require_once("../modelos/servicios.php");

if (isset($_POST["up_id"]) and isset($_POST["up_descripcion"]) and isset($_POST["up_precio"]) 
        and isset($_POST["up_tiempo"])) {

    $id_servicio = $_POST["up_id"];
    $up_descripcion_servicio = $_POST["up_descripcion"];
    $up_precio_servicio = $_POST["up_precio"];
    $up_tiempo = $_POST["up_tiempo"];
    
    $modificarServicio = new Servicios($id_servicio, $up_descripcion_servicio, $up_precio_servicio,
            $up_tiempo);
}

if (!empty($modificarServicio)) {
    ModificardatosServicio($modificarServicio);
}

function ModificardatosServicio($modificarServicio) {

    $sql = "UPDATE servicios SET "
            . "codigo_servicio=" . $modificarServicio->getCodigoServicio() . ","
            . "descripcion='" . $modificarServicio->getDescripcion() . "',"
            . "precio=" . $modificarServicio->getPrecio() . ","
            . "tiempo_servicio='" . $modificarServicio->getTiempoServicio() . "'"
            . " WHERE codigo_servicio = " . $modificarServicio->getCodigoServicio() . "";

    echo $sql;

    $conexion = new Conexion();
    $conexion->iniciarSesion();
    $conexion->dameConexion()->query($sql);
}

//--------------------------------------- ELIMINAR USUARIO ---------------------------------


require_once("../conexion/conexion.php");
require_once("../modelos/servicios.php");

if (isset($_POST["id_delete"])) {

    $codigo_servicio_delete = $_POST["id_delete"];

    $borrarServicio = new Servicios($codigo_servicio_delete);
}

if (!empty($borrarServicio)) {

    BorrarDatosServicio($borrarServicio);
} else {
    echo 'no';
}

function BorrarDatosServicio($borrarServicio) {

    $sql = "DELETE FROM servicios WHERE codigo_servicio = " . $borrarServicio->getCodigoServicio() . "";

    echo $sql;

    $conexion = new Conexion();
    $conexion->iniciarSesion();
    $conexion->dameConexion()->query($sql);
}

//---------------------------------------------------------------------------------------------------------------

class ControladorServicio {

    function __construct() {
        require_once "../conexion/conexion.php";
    }

    public function dameListaEspera() {

        $conexion = new Conexion();
        $conexion->iniciarSesion();
        $consulta = mysqli_query($conexion->dameConexion(), "SELECT  ce.codigo_cliente_en_espera, CONCAT(c.nombre, ' ',c.apellido), s.descripcion,  ce.tiempo, ce.boleta , ce.estado FROM clientes_en_espera ce 
                                                            JOIN clientes c 
                                                            ON c.codigo_cliente = ce.codigo_cliente 
                                                            JOIN servicios s 
                                                            ON s.codigo_servicio = ce.codigo_servicio");
        $cont = 1;
        if (mysqli_num_rows($consulta) > 0) {
            echo "<tbody>";
            while ($row = mysqli_fetch_array($consulta)) {
                if ($row[5] == 'A') {
                    echo "<tr class='color-verde'>";
                    echo "<th scope='row'>" . $cont . "</th>";
                    echo "<td>" . $row[4] . "</td>";
                    echo "<td>" . $row[1] . "</td>";
                    echo "<td>" . $row[2] . "</td>";
                    echo "<td id='time'>" . $row[3] . "</td>";
                    echo "</tr>";
                    $cont++;
                } elseif ($row[5] == 'E') {
                    echo "<tr class='color-amarilo'>";
                    echo "<th scope='row'>" . $cont . "</th>";
                    echo "<td>" . $row[4] . "</td>";
                    echo "<td>" . $row[1] . "</td>";
                    echo "<td>" . $row[2] . "</td>";
                    echo "<td id='time'>" . $row[3] . "</td>";
                    echo "</tr>";
                    $cont++;
                } else {
                    echo "<tr>";
                    echo "<th scope='row'>" . $cont . "</th>";
                    echo "<td>" . $row[4] . "</td>";
                    echo "<td>" . $row[1] . "</td>";
                    echo "<td>" . $row[2] . "</td>";
                    echo "<td id='time'>" . $row[3] . "</td>";
                    echo "</tr>";
                    $cont++;
                }
            }
            echo "</tbody>";
        } else {
            echo " <p>Aún no hay registros en la base de datos</p>";
        }
    }

    public function dameBoleta() {

        $conexion = new Conexion();
        $conexion->iniciarSesion();
        $consulta = mysqli_query($conexion->dameConexion(), "SELECT  ce.codigo_cliente_en_espera, CONCAT(c.nombre, ' ', c.apellido, ' - ', s.descripcion), 															ce.tiempo  FROM clientes_en_espera ce 
                                                            JOIN clientes c 
                                                            ON c.codigo_cliente = ce.codigo_cliente 
                                                            JOIN servicios s 
                                                            ON s.codigo_servicio = ce.codigo_servicio LIMIT 1");
        if (mysqli_num_rows($consulta) > 0) {

            while ($row = mysqli_fetch_array($consulta)) {
                echo "<h5 class='card-title' style='font-size: 120px; text-align: center;'>S" . $row[0] . "</h5>" .
                "<p class='card-text' style='font-size: 20px; text-align: center;'>" . $row[1] . "</p>";
            }
        } else {
            echo " <p>Aún no hay registros en la base de datos</p>";
        }
    }

}

// ------------------------------------

require_once "../conexion/conexion.php";

if (isset($_POST["servicio"])) {
    $s = $_POST["servicio"];
}

if (!empty($s)) {
    dameListaServicios();
}

function dameListaServicios() {
    $conexion = new Conexion();
    $conexion->iniciarSesion();
    $consulta = mysqli_query($conexion->dameConexion(), "SELECT  descripcion FROM servicios");
    if (mysqli_num_rows($consulta) > 0) {

        while ($row = mysqli_fetch_array($consulta)) {
            echo "<option>" . $row[0] . "</option>";
        }
    } else {
        echo "<option>No hay servicios</option>";
    }
}

require_once "../conexion/conexion.php";

if (isset($_POST["dameTiempo"])) {
    $service = $_POST["dameTiempo"];
}

if (!empty($service)) {
    dameListaServicios2($service);
}

function dameListaServicios2($service) {
    $conexion = new Conexion();
    $conexion->iniciarSesion();
    $consulta = mysqli_query($conexion->dameConexion(), "SELECT  tiempo_servicio FROM servicios WHERE descripcion = '" . $service . "'");
    if (mysqli_num_rows($consulta) > 0) {

        while ($row = mysqli_fetch_array($consulta)) {
            echo "<td>" . $row[0] . "</td>";
        }
    } else {
        echo "<option>No hay servicios</option>";
    }
}

//----------------------------------


if (isset($_POST["lista"])) {
    $lista = $_POST["lista"];
}

if (!empty($lista)) {
    dameListaEsperaActual();
}

function dameListaEsperaActual() {
    $ob = new ControladorServicio();
    $ob->dameListaEspera();
}

//----------------------- OBTENER ID DE SERVICIO POR MEDIO DE LA DESCRIPCIÓN --------------------------------------------


require_once "../conexion/conexion.php";

if (isset($_POST["nombre"])) {
    $id_servicio = $_POST["nombre"];
}

if (!empty($id_servicio)) {
    dameIdServicio($id_servicio);
}

function dameIdServicio($id_servicio) {
    $conexion = new Conexion();
    $conexion->iniciarSesion();
    $consulta = mysqli_query($conexion->dameConexion(), "SELECT codigo_servicio FROM servicios WHERE descripcion = '" . $id_servicio . "'");
    if (mysqli_num_rows($consulta) > 0) {

        while ($row = mysqli_fetch_array($consulta)) {
            echo $row[0];
        }
    } else {
        echo "No hay datos";
    }
}

?>