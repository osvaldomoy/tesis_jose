<?php

	class Clientes {
		
		private $codigo_cliente;
		private $nombre;
		private $apellido;
		private $cedula;
		private $telefono;
		private $correo;
		private $automovil;
				
		
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
		
		function __construct1($codigo_cliente){
			
			$this->codigo_cliente = $codigo_cliente;
			
		}
		
		function __construct5($nombre, $apellido, $cedula, $telefono, $correo){
			
			$this->nombre = $nombre;
			$this->apellido = $apellido;
			$this->cedula = $cedula;
			$this->telefono = $telefono;
			$this->correo = $correo;
			/*$this->automovil = $automovil;*/
			
		}
		
		function __construct6($codigo_cliente, $nombre, $apellido, $cedula, $telefono, $correo){
			
			$this->codigo_cliente = $codigo_cliente;
			$this->nombre = $nombre;
			$this->apellido = $apellido;
			$this->cedula = $cedula;
			$this->telefono = $telefono;
			$this->correo = $correo;
			/*$this->automovil = $automovil;*/
			
		}
		
		function __construct7($codigo_cliente, $nombre, $apellido, $cedula, $telefono, $correo, $automovil){
			
			$this->codigo_cliente = $codigo_cliente;
			$this->nombre = $nombre;
			$this->apellido = $apellido;
			$this->cedula = $cedula;
			$this->telefono = $telefono;
			$this->correo = $correo;
			$this->automovil = $automovil;
			
		}
		
		//----------gets-----------------//
		
		public function getCodigoCliente(){
			return($this->codigo_cliente);
		}
		
		public function getNombre(){
			return($this->nombre);
		}
		
		public function getApellido(){
			return($this->apellido);
		}
		
		public function getCedula(){
			return($this->cedula);
		}
		
		public function getTelefono(){
			return($this->telefono);
		}
		
		public function getCorreo(){
			return($this->correo);
		}
		
		public function getAutomovil(){
			return($this->automovil);
		}
		
		
		
		//----------sets-----------------//
		
		/*function setICodigoArticulo($codigo_articulo){
			$this->codigo_articulo = $codigo_articulo;
    	}*/
		
		
	}

?>