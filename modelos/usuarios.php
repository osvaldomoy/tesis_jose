<?php

class Usuarios {

    private $id_usuario;
    private $nombre;
    private $apellido;
    private $usuario;
    private $pass;
    private $id_tipo_de_usuario;
    private $activo;

    function __construct() {
        //obtengo un array con los parámetros enviados a la función
        $params = func_get_args();
        //saco el número de parámetros que estoy recibiendo
        $num_params = func_num_args();
        //cada constructor de un número dado de parámtros tendrá un nombre de
        //función
        //atendiendo al siguiente modelo __construct1() __construct2()...
        $funcion_constructor = '__construct' . $num_params;
        //compruebo si hay un constructor con ese número de parámetros
        if (method_exists($this, $funcion_constructor)) {
            //si existía esa función, la invoco, reenviando los parámetros que recibí en el constructor original
            call_user_func_array(array($this, $funcion_constructor), $params);
        }
    }

    function __construct0() {
        
    }

    function __construct1($id_usuario) {

        $this->id_usuario = $id_usuario;
    }

    function __construct5($nombre, $apellido, $usuario, $pass, $id_tipo_de_usuario) {

        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->usuario = $usuario;
        $this->pass = $pass;
        $this->id_tipo_de_usuario = $id_tipo_de_usuario;
    }

    function __construct6($id_usuario, $nombre, $apellido, $usuario, $pass, $id_tipo_de_usuario) {

        $this->id_usuario = $id_usuario;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->usuario = $usuario;
        $this->pass = $pass;
        $this->id_tipo_de_usuario = $id_tipo_de_usuario;
    }

    function __construct7($id_usuario, $nombre, $apellido, $usuario, $pass, $id_tipo_de_usuario, $activo) {

        $this->id_usuario = $id_usuario;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->usuario = $usuario;
        $this->pass = $pass;
        $this->id_tipo_de_usuario = $id_tipo_de_usuario;
        $this->activo = $activo;
    }

    //----------gets-----------------//

    public function getIdUsuario() {
        return($this->id_usuario);
    }

    public function getNombre() {
        return($this->nombre);
    }

    public function getApellido() {
        return($this->apellido);
    }

    public function getUsuario() {
        return($this->usuario);
    }

    public function getPass() {
        return($this->pass);
    }

    public function getIdTipoUsuario() {
        return($this->id_tipo_de_usuario);
    }

    public function getActivo() {
        return($this->activo);
    }

    //----------sets-----------------//

    /* function setICodigoArticulo($codigo_articulo){
      $this->codigo_articulo = $codigo_articulo;
      } */
}

?>