<?php

	class Modelo {
		
		private $id_modelo;
                private $id_marca;
		private $descripcion;
				
		
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
		
		function __construct1($id_modelo){
			
			$this->id_modelo = $id_modelo;
			
		}
		
		function __construct3($id_modelo, $id_marca, $descripcion){
			
			$this->id_modelo = $id_modelo;
			$this->id_marca = $id_marca;
			$this->descripcion = $descripcion;
			
		}
		
		//----------gets-----------------//
		
		public function getIdModelo(){
			return($this->id_modelo);
		}
                
		public function getIdMarca(){
			return($this->id_marca);
		}
		
		public function getDescripcion(){
			return($this->descripcion);
		}
		
		
		//----------sets-----------------//
		
		/*function setICodigoArticulo($codigo_articulo){
			$this->codigo_articulo = $codigo_articulo;
    	}*/
		
		
	}

?>