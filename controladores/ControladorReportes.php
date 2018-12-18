<?php

    if (isset($_POST["dame_atendidos_hoy"])) {
       dameAtendidosHoy($_POST["dame_atendidos_hoy"]);
    }

    function dameAtendidosHoy($fecha){
        require_once "../conexion/conexion.php";
        $conexion = new Conexion();
        $conexion->iniciarSesion();
        $consulta = mysqli_query($conexion->dameConexion(), "SELECT CONCAT(c.nombre, ' ' , c.apellido), c.cedula, s.descripcion, s.precio
        FROM clientes_atendidos ca
        JOIN clientes c 
        ON c.codigo_cliente = ca.codigo_cliente
        JOIN servicios s 
        ON s.codigo_servicio = ca.codigo_servicio
        WHERE ca.fecha = '".$fecha."'");
//        $consulta = mysqli_query($conexion->dameConexion(), "SELECT CONCAT(c.nombre, ' ' , c.apellido), c.cedula, s.descripcion, s.precio
//        FROM clientes_atendidos ca
//        JOIN clientes c 
//        ON c.codigo_cliente = ca.codigo_cliente
//        JOIN servicios s 
//        ON s.codigo_servicio = ca.codigo_servicio
//        WHERE ca.fecha = ".$fecha."");

        $cont = 1;
        $total = 0;
        if (mysqli_num_rows($consulta) > 0) {
            echo "<tbody>";
            while ($row = mysqli_fetch_array($consulta)) {
                echo "<tr>";
                echo "<th scope='row'>" . $cont . "</th>";
                echo "<td class='fila' >" . $row[0] . "</td>";
                echo "<td class='fila'>" . $row[1] . "</td>";
                echo "<td class='fila'>" . $row[2] . "</td>";
                echo "<td class='fila'>" . $row[3] . "</td>";
                echo "</tr>";
                $cont++;
                $total = $total +  $row[3];
            }
            echo "</tbody>";
            echo " TOTAL GENERAL ".$total."";
        } else {
            echo "No hay datos";
        }
    }
    
    
    
    
    if (isset($_POST["dame_insumos"])) {
       dameInsumos();
    }

    function dameInsumos(){
        require_once "../conexion/conexion.php";
        $conexion = new Conexion();
        $conexion->iniciarSesion();
        $consulta = mysqli_query($conexion->dameConexion(), "SELECT i.codigo_insumo, i.nombre, i.stock, i.precio
        FROM insumos i");

        $cont = 1;
        if (mysqli_num_rows($consulta) > 0) {
            echo "<tbody>";
            while ($row = mysqli_fetch_array($consulta)) {
                echo "<tr>";
                echo "<th scope='row'>" . $cont . "</th>";
                echo "<td class='fila' >" . $row[0] . "</td>";
                echo "<td class='fila'>" . $row[1] . "</td>";
                echo "<td class='fila'>" . $row[2] . "</td>";
                echo "<td class='fila'>" . $row[3] . "</td>";
                echo "</tr>";
                $cont++;
            }
            echo "</tbody>";
            
        } else {
            echo "No hay datos";
        }
    }
    
    if (isset($_POST["dame_servicios_del_dia"])) {
       dameServiciosDelDia($_POST["dame_servicios_del_dia"]);
    }

    function dameServiciosDelDia($fecha){
        require_once "../conexion/conexion.php";
        $conexion = new Conexion();
        $conexion->iniciarSesion();
        $consulta = mysqli_query($conexion->dameConexion(), "SELECT CONCAT(c.nombre, ' ', c.apellido),  
            s.descripcion, i.nombre, Concat(u.nombre,' ',u.apellido)
        FROM clientes_atendidos ca
        JOIN servicios s 
        ON s.codigo_servicio = ca.codigo_servicio
        JOIN detalle_servicio_insumo dsi
        ON dsi.codigo_servicio = s.codigo_servicio
        JOIN insumos i 
        ON i.codigo_insumo = dsi.codigo_insumo
        JOIN usuarios u
        ON u.id_usuario = ca.id_usuario
        JOIN clientes c 
        ON c.codigo_cliente = ca.codigo_cliente
        WHERE ca.fecha = '".$fecha."'");

        $cont = 1;
        if (mysqli_num_rows($consulta) > 0) {
            echo "<tbody>";
            while ($row = mysqli_fetch_array($consulta)) {
                echo "<tr>";
                echo "<th scope='row'>" . $cont . "</th>";
                echo "<td class='fila' >" . $row[0] . "</td>";
                echo "<td class='fila'>" . $row[1] . "</td>";
                echo "<td class='fila'>" . $row[2] . "</td>";
                echo "<td class='fila'>" . $row[3] . "</td>";
                echo "</tr>";
                $cont++;
            }
            echo "</tbody>";
            
        } else {
            echo "No hay datos";
        }
    }
    if (isset($_POST["dame_servicios"])) {
       dameServicios($_POST["dame_servicios"]);
    }

    function dameServicios($fecha){
        require_once "../conexion/conexion.php";
        $conexion = new Conexion();
        $conexion->iniciarSesion();
        $consulta = mysqli_query($conexion->dameConexion(), "SELECT CONCAT(c.nombre, ' ', c.apellido),  
            s.descripcion,  Concat(u.nombre,' ',u.apellido)
        FROM clientes_atendidos ca
        JOIN servicios s 
        ON s.codigo_servicio = ca.codigo_servicio
        JOIN detalle_servicio_insumo dsi
        ON dsi.codigo_servicio = s.codigo_servicio
        JOIN insumos i 
        ON i.codigo_insumo = dsi.codigo_insumo
        JOIN usuarios u
        ON u.id_usuario = ca.id_usuario
        JOIN clientes c 
        ON c.codigo_cliente = ca.codigo_cliente
        WHERE ca.fecha = '".$fecha."'");

        $cont = 1;
        if (mysqli_num_rows($consulta) > 0) {
            echo "<tbody>";
            while ($row = mysqli_fetch_array($consulta)) {
                echo "<tr>";
                echo "<th scope='row'>" . $cont . "</th>";
                echo "<td class='fila' >" . $row[0] . "</td>";
                echo "<td class='fila'>" . $row[1] . "</td>";
                echo "<td class='fila'>" . $row[2] . "</td>";
                echo "</tr>";
                $cont++;
            }
            echo "</tbody>";
            
        } else {
            echo "No hay datos";
        }
    }
?>
