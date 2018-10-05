<?php

class DetalleServicioInsumo {

    private $codigo_detalle;
    private $codigo_insumo;
    private $codigo_servicio;
    private $codigo_automovil;
    private $cantidad;

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
    
    function __construct1($codigo_detalle) {
        
        $this->codigo_detalle = $codigo_detalle;
        
    }

    function __construct3($codigo_detalle, $codigo_insumo, $cantidad) {

        $this->codigo_detalle = $codigo_detalle;
        $this->codigo_insumo = $codigo_insumo;
        $this->cantidad = $cantidad;
    }
    
    function __construct4($codigo_insumo, $codigo_servicio, $codigo_automovil, $cantidad) {

        $this->codigo_insumo = $codigo_insumo;
        $this->codigo_servicio = $codigo_servicio;
        $this->codigo_automovil = $codigo_automovil;
        $this->cantidad = $cantidad;
    }
    
    function __construct5($codigo_detalle, $codigo_insumo, $codigo_servicio, $codigo_automovil, $cantidad) {

        $this->codigo_detalle = $codigo_detalle;
        $this->codigo_insumo = $codigo_insumo;
        $this->codigo_servicio = $codigo_servicio;
        $this->codigo_automovil = $codigo_automovil;
        $this->cantidad = $cantidad;
    }

    //----------gets-----------------//

    public function getCodigoDetalle() {
        return($this->codigo_detalle);
    }

    public function getCodigoInsumo() {
        return($this->codigo_insumo);
    }

    public function getCodigoServicio() {
        return($this->codigo_servicio);
    }

    public function getCodigoAutomovil() {
        return($this->codigo_automovil);
    }
    
    public function getCantidad() {
        return($this->cantidad);
    }

    //----------sets-----------------//

    /* function setICodigoArticulo($codigo_articulo){
      $this->codigo_articulo = $codigo_articulo;
      } */
}

?>
