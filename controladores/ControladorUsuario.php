<?php

//---------------------------------- MOSTRAR LISTA DE USUARIOS -----------------------------------------

if (isset($_POST["lista"])) {
    $datos = $_POST["lista"];
}

if (!empty($datos)) {
    dameTodoUsuario();
}

function dameTodoUsuario() {

    require_once "../conexion/conexion.php";
    $conexion = new Conexion();
    $conexion->iniciarSesion();
    $consulta = mysqli_query($conexion->dameConexion(), "SELECT id_usuario, nombre, apellido, usuario FROM usuarios WHERE activo = 1");

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
            "<button class='btn btn-success modificar-datos-usuario'>Modificar</button>"
            . "<button class='btn btn-danger eliminar-datos-usuario'>Eliminar</button>"
            . "</td>";
            echo "</tr>";
            $cont++;
        }
        echo "</tbody>";
    } else {
        echo "No hay datos";
    }
}

//---------------------------------------- GUARDAR USUARIO -----------------------------------

require_once("../conexion/conexion.php");
require_once("../modelos/usuarios.php");


if ((isset($_POST["nombre"])) and ( isset($_POST["apellido"])) and ( isset($_POST["pass"])) and ( isset($_POST["tipo_usuario"]))) {

    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $usuario = $_POST["usuario"];
    $contra = $_POST["pass"];
    $pass = password_hash($contra, PASSWORD_DEFAULT);
    $id_tipo_de_usuario = $_POST["tipo_usuario"];

    $guardarUsuario = new Usuarios($nombre, $apellido, $usuario, $pass, $id_tipo_de_usuario);
}

if (!empty($guardarUsuario)) {
    GuardarDatosUsuario($guardarUsuario);
}

function GuardarDatosUsuario($guardarUsuario) {

    $sql = "INSERT INTO usuarios (nombre, apellido, usuario, pass, id_tipo_de_usuario, activo) VALUES ('"
            . $guardarUsuario->getNombre() . "','"
            . $guardarUsuario->getApellido() . "','"
            . $guardarUsuario->getUsuario() . "','"
            . $guardarUsuario->getPass() . "',"
            . $guardarUsuario->getIdTipoUsuario() . ",1)";

    echo $sql;

    $conexion = new Conexion();
    $conexion->iniciarSesion();
    $conexion->dameConexion()->query($sql);
}

//------------------------------------ MODIFICAR USUARIO -------------------------------------------------------

require_once("../conexion/conexion.php");
require_once("../modelos/usuarios.php");

if (isset($_POST["up_id"]) and isset($_POST["up_nombre"]) and isset($_POST["up_apellido"]) and isset($_POST["up_usuario"]) and isset($_POST["up_pass"]) and isset($_POST["up_id_tipo_usuario"])) {

    $id_usuario = $_POST["up_id"];
    $nombre = $_POST["up_nombre"];
    $apellido = $_POST["up_apellido"];
    $usuario = $_POST["up_usuario"];
    $contra = $_POST["up_pass"];
    $pass = password_hash($contra, PASSWORD_DEFAULT);
    $id_tipo_de_usuario = $_POST["up_id_tipo_usuario"];

    $modificarUsuario = new Usuarios($id_usuario, $nombre, $apellido, $usuario, $pass, $id_tipo_de_usuario);
}

if (!empty($modificarUsuario)) {
    ModificardatosUsuarios($modificarUsuario);
}

function ModificardatosUsuarios($modificarUsuario) {

    $sql = "UPDATE usuarios SET "
            . "id_usuario=" . $modificarUsuario->getIdUsuario() . ","
            . "nombre='" . $modificarUsuario->getNombre() . "',"
            . "apellido='" . $modificarUsuario->getApellido() . "',"
            . "usuario='" . $modificarUsuario->getUsuario() . "',"
            . "pass='" . $modificarUsuario->getPass() . "',"
            . "id_tipo_de_usuario=" . $modificarUsuario->getIdTipoUsuario() . ""
            . " WHERE id_usuario = " . $modificarUsuario->getIdUsuario() . "";

    echo $sql;

    $conexion = new Conexion();
    $conexion->iniciarSesion();
    $conexion->dameConexion()->query($sql);
}

//--------------------------------------- ELIMINAR USUARIO ---------------------------------


require_once("../conexion/conexion.php");
require_once("../modelos/usuarios.php");

if (isset($_POST["id_delete"])) {

    $id_usuario = $_POST["id_delete"];

    $borrarUsuario = new Usuarios($id_usuario);
}

if (!empty($borrarUsuario)) {

    BorrarDatosUsuario($borrarUsuario);
} 

function BorrarDatosUsuario($borrarUsuario) {

    $sql = "DELETE FROM usuarios WHERE id_usuario = " . $borrarUsuario->getIdUsuario() . "";

    echo $sql;

    $conexion = new Conexion();
    $conexion->iniciarSesion();
    $conexion->dameConexion()->query($sql);
}

//-------------------------------------------------------------------------------------------
if (isset($_POST['usuario']) and ( isset($_POST['pass']))) {
    $usuario = $_POST['usuario'];
    $pass = $_POST['pass'];
}

//------------------------------------------------------------------------
//------------------------------------------------------------------------
if (!empty($usuario) and ( !empty($pass))) {
    validar($usuario, $pass);
}

function validar($usuario, $pass) {

    require_once "../conexion/conexion.php";


    $conexion = new Conexion();
    $conexion->iniciarSesion();
    $consulta = mysqli_query($conexion->dameConexion(), "SELECT id_usuario, "
            . "pass FROM usuarios WHERE usuario LIKE '" . $usuario . "'");

    if (mysqli_num_rows($consulta) > 0) {

        while ($row = mysqli_fetch_row($consulta)) {
            if (password_verify($pass, $row[1])) {
                session_start();
                $_SESSION['id_usuario'] = $row[0];
                echo 0;
                return;
            }
        }
    }
}


//-------------------------------------------------------------------------------------------
//-------------------------------------------------------------------------------------------
//------------------------------------------------------------------------
//------------------------------------------------------------------------
if (isset($_POST['usua']) and ( isset($_POST['pass'])) and ( isset($_POST['admin']))) {
    $usuario = $_POST['usua'];
    $pass = $_POST['pass'];
    validarAdministrador($usuario, $pass);
}

function validarAdministrador($usuario, $pass) {

    require_once "../conexion/conexion.php";


    $conexion = new Conexion();
    $conexion->iniciarSesion();
    $consulta = mysqli_query($conexion->dameConexion(), "SELECT id_usuario, "
            . "pass FROM usuarios WHERE usuario LIKE '" . $usuario . "' and id_tipo_de_usuario = 1");

    if (mysqli_num_rows($consulta) > 0) {

        while ($row = mysqli_fetch_row($consulta)) {
            if (password_verify($pass, $row[1])) {
                session_start();
                $_SESSION['id_usuario'] = $row[0];
                echo 0;
                return;
            }
        }
    }
}


//-------------------------------------------------------------------------------------------
//-------------------------------------------------------------------------------------------

if (isset($_POST['sesion'])) {
    $sesion = $_POST['sesion'];
}

if (!empty($sesion)) {
    cerrarSesion();
}

function cerrarSesion() {


    //Reanudamos la sesión
    session_start();

    //Des-establecemos todas las sesiones
    unset($_SESSION);

    //Destruimos las sesiones
    session_destroy();

    session_start();
    echo $_SESSION['id_usuario'];
}

//-------------------------------------------------------------------------------------------
//-------------------------------------------------------------------------------------------
if (isset($_POST['nombre_usuario'])) {
    $nombre_usuario = $_POST['nombre_usuario'];
}

if (!empty($nombre_usuario)) {
    dameNombreUsuarioActivo();
}

function dameNombreUsuarioActivo() {
    session_start();
    $id = $_SESSION['id_usuario'];
    require_once "../conexion/conexion.php";
    $conexion = new Conexion();
    $conexion->iniciarSesion();
    $consulta = mysqli_query($conexion->dameConexion(), "SELECT CONCAT(nombre, ' ', apellido) FROM usuarios WHERE id_usuario = " . $id);

    if (mysqli_num_rows($consulta) > 0) {

        while ($row = mysqli_fetch_row($consulta)) {
            echo $row[0];
        }
    } else {
        echo "Desconocido";
    }
}

?>
