<?php

class Servicios {

    private $codigo_servicio;
    private $descripcion;
    private $precio;
    private $tiempo_servicio;

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

    function __construct1($codigo_servicio) {

        $this->codigo_servicio = $codigo_servicio;
    }

    function __construct3($descripcion, $precio, $tiempo_servicio) {

        $this->descripcion = $descripcion;
        $this->precio = $precio;
        $this->tiempo_servicio = $tiempo_servicio;
        
    }
    function __construct4($codigo_servicio, $descripcion, $precio, $tiempo_servicio) {

        $this->codigo_servicio = $codigo_servicio;
        $this->descripcion = $descripcion;
        $this->precio = $precio;
        $this->tiempo_servicio = $tiempo_servicio;
        
    }


    //----------gets-----------------//

    public function getCodigoServicio() {
        return($this->codigo_servicio);
    }

    public function getDescripcion() {
        return($this->descripcion);
    }
    
    public function getPrecio() {
        return($this->precio);
    }

    public function getTiempoServicio() {
        return($this->tiempo_servicio);
    }


    //----------sets-----------------//

    /* function setICodigoArticulo($codigo_articulo){
      $this->codigo_articulo = $codigo_articulo;
      } */
}

?>