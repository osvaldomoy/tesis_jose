<?php

	class Automovil {
		
		private $id_automovil;
		private $id_modelo;
		private $anho;
		private $id_marca;
		private $activo;
				
		
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
		
		function __construct1($id_automovil){
			
			$this->id_automovil = $id_automovil;
			
		}
		
				
		function __construct5($id_automovil, $id_modelo, $anho, $id_marca, $activo){
			
			$this->id_automovil = $id_automovil;
			$this->id_modelo = $id_modelo;
			$this->anho = $anho;
			$this->id_marca = $id_marca;;
			$this->activo = $activo;
			
		}
		
		//----------gets-----------------//
		
		public function getIdAutomovil(){
			return($this->id_automovil);
		}
		
		public function getIdModelo(){
			return($this->id_modelo);
		}
		
		public function getAnho(){
			return($this->anho);
		}
		
		public function getIdMarca(){
			return($this->id_marca);
		}
		
		public function getActivo(){
			return($this->activo);
		}
		
		
		
		//----------sets-----------------//
		
		/*function setICodigoArticulo($codigo_articulo){
			$this->codigo_articulo = $codigo_articulo;
    	}*/
		
		
	}

?>