<?php

	class ClientesAtendidos {
		
		private $codigo_clientes_atendidos;
		private $codigo_servicio;
		private $codigo_cliente;
		private $tiempo;
		private $tiempo_adicional;
		private $fecha;
		
				
		
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
		
		function __construct6($codigo_clientes_atendidos, $codigo_servicio, $codigo_cliente, $tiempo, $tiempo_adicional, $fecha){
			
			$this->codigo_clientes_atendidos = $codigo_clientes_atendidos;
			$this->codigo_servicio = $codigo_servicio;
			$this->codigo_cliente = $codigo_cliente;
			$this->tiempo = $tiempo;
			$this->tiempo_adicional = $tiempo_adicional;
			$this->fecha = $fecha;
			
		}
		
		//----------gets-----------------//
		
		public function getCodigoClientesAtendidos(){
			return($this->codigo_clientes_atendidos);
		}
		
		public function getCodigoServicio(){
			return($this->codigo_servicio);
		}
		
		public function getCodigoCliente(){
			return($this->codigo_cliente);
		}
		
		public function getTiempo(){
			return($this->tiempo);
		}
		
		public function getTiempoAdicional(){
			return($this->tiempo_adicional);
		}
		
		public function getFecha(){
			return($this->fecha);
		}
		
				
		
		//----------sets-----------------//
		
		/*function setICodigoArticulo($codigo_articulo){
			$this->codigo_articulo = $codigo_articulo;
    	}*/
		
		
	}

?>