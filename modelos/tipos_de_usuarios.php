<?php

	class TiposdeUsuarios {
		
		private $id_tipo_de_usuario;
		private $descripcion;
		private $nivel;
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
		
		function __construct1($id_tipo_de_usuario){
			
			$this->id_tipo_de_usuario = $id_tipo_de_usuario;
			
		}
		
				
		function __construct4($id_tipo_de_usuario, $descripcion, $nivel, $activo){
			
			$this->id_tipo_de_usuario = $id_tipo_de_usuario;
			$this->descripcion = $descripcion;
			$this->nivel = $nivel;
			$this->activo = $activo;
			
		}
		
		//----------gets-----------------//
		
		public function getIdTipoUsuario(){
			return($this->id_tipo_de_usuario);
		}
		
		public function getDescripcion(){
			return($this->descripcion);
		}
		
		public function getNivel(){
			return($this->anho);
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