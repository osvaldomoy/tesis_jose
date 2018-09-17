<?php

	class ClientesAutomoviles {
		
		private $id_cliente_automovil;
		private $id_cliente;
		private $id_automovil;
		private $chapa;
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
		
		function __construct1($id_cliente_automovil){
			
			$this->id_cliente_automovil = $id_cliente_automovil;
			
		}
		
				
		function __construct3($id_cliente, $id_automovil, $chapa){
			
			$this->id_cliente = $id_cliente;
			$this->id_automovil = $id_automovil;
			$this->chapa = $chapa;
			
		}
                
		function __construct4($id_cliente_automovil, $id_cliente, $id_automovil, $chapa){
			
			$this->id_cliente_automovil = $id_cliente_automovil;
			$this->id_cliente = $id_cliente;
			$this->id_automovil = $id_automovil;
			$this->chapa = $chapa;
			
		}
		
		//----------gets-----------------//
		public function getIdClienteAutomovil(){
			return($this->id_cliente_automovil);
		}
		
                public function getIdCliente(){
			return($this->id_cliente);
		}
		
		public function getIdAutomovil(){
			return($this->id_automovil);
		}
		
		public function getChapa(){
			return($this->chapa);
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