<?php

	class Producto {
		private $id_producto;
		private $nombre_producto;
		private $stock;
		private $precio_anterior;
		private $precio_actual;
		private $descuento;
		private $descripcion_corta;
		private $descripcion_larga;
		private $valoracion;
		private $tags;
		private $imagen;
        private $marca;
		
		
		function __construct()
		{
			//obtengo un array con los parámetros enviados a la función
			$params = func_get_args();
			//saco el número de parámetros que estoy recibiendo
			$num_params = func_num_args();
			//cada constructor de un número dado de parámtros tendrá un nombre de
			//función
			//atendiendo al siguiente modelo __construct1() __construct2()...
			$funcion_constructor ='__construct'.$num_params;
			//compruebo si hay un constructor con ese número de parámetros
			if (method_exists($this,$funcion_constructor)) {
				//si existía esa función, la invoco, reenviando los parámetros que recibí en el constructor original
				call_user_func_array(array($this,$funcion_constructor),$params);
			}
		}
		
		function __construct0(){
			
		}
		
		function __construct12($id_producto, $nombre_producto, $stock, $precio_anterior, $precio_actual, $descuento, $descripcion_corta, $descripcion_larga, $valoracion, $tags, $imagen, $marca){
			
			$this -> id_producto = $id_producto;
			$this -> nombre_producto = $nombre_producto;
			$this -> stock = $stock;
			$this -> precio_anterior = $precio_anterior;
			$this -> precio_actual = $precio_actual;
			$this -> descuento = $descuento;
			$this -> descripcion_corta = $descripcion_corta;
			$this -> descripcion_larga = $descripcion_larga;
			$this -> valoracion = $valoracion;
			$this -> tags = $tags;
			$this -> imagen = $imagen;
            $this -> marca = $marca;
			
		}
		
		//----------gets-----------------//
		
		public function getIdProducto(){
			return($this -> id_producto);
		}
		
		public function getNombreProducto(){
			return($this -> nombre_producto);
		}
		
		public function getStock(){
			return($this -> stock);
		}
		
		public function getPrecioAnterior(){
			return($this -> precio_anterior);
		}
		
		public function getPrecioActual(){
			return($this -> precio_actual);
		}
		
		public function getDescuento(){
			return($this -> descuento);
		}
		
		public function getDescripcionCorta(){
			return($this -> descripcion_corta);
		}
		
		public function getDescripcionLarga(){
			return($this -> descripcion_larga);
		}
		
		public function getValoracion(){
			return($this -> valoracion);
		}
		
		public function getTags(){
			return($this -> tags);
		}
		
		public function getImagen(){
			return($this -> imagen);
		}
        
        public function getMarca(){
			return($this -> marca);
		}
		
		//----------sets-----------------//
		
		function setIdProducto($id_producto){
			$this->id_producto = $id_producto;
    	}
		function setNombreProducto($nombre_producto){
			$this->nombre_producto = $nombre_producto;
    	}
		
	}

?>