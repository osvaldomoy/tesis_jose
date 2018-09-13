<?php

class Insumos {

    private $codigo_insumo;
    private $nombre;
    private $stock;
    private $stock_minimo;
    private $precio;

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
    
    function __construct1($codigo_insumo) {
        
        $this->codigo_insumo = $codigo_insumo;
        
    }

    function __construct4($nombre, $stock, $stock_minimo, $precio) {

        $this->nombre = $nombre;
        $this->stock = $stock;
        $this->stock_minimo = $stock_minimo;
        $this->precio = $precio;
    }
    
    function __construct5($codigo_insumo, $nombre, $stock, $stock_minimo, $precio) {

        $this->codigo_insumo = $codigo_insumo;
        $this->nombre = $nombre;
        $this->stock = $stock;
        $this->stock_minimo = $stock_minimo;
        $this->precio = $precio;
    }

    //----------gets-----------------//

    public function getCodigoInsumo() {
        return($this->codigo_insumo);
    }

    public function getNombre() {
        return($this->nombre);
    }

    public function getStock() {
        return($this->stock);
    }

    public function getStockMinimo() {
        return($this->stock_minimo);
    }
    
    public function getPrecio() {
        return($this->precio);
    }

    //----------sets-----------------//

    /* function setICodigoArticulo($codigo_articulo){
      $this->codigo_articulo = $codigo_articulo;
      } */
}

?>