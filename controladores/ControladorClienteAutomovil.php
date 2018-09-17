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
