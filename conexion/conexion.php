<?php

    class Conexion{
        static $conexion = null;

        function iniciarSesion(){

              $mysqli = new mysqli("localhost", "root", "", "tesis_jose");
              

                if ($mysqli->connect_errno) {
                    echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
                }else{
                    $mysqli->set_charset("utf8");
                    self::$conexion =  $mysqli;

                }
              return null;
          }

        function dameConexion(){
            return self::$conexion;
        }
        
        function cerrarConexion(){
            mysqli_close(self::$conexion);
            echo "cerrado";
        }
    }
    
     


   
?>