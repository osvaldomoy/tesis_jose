<?php

	class ClientesEnEspera {
		
		private $codigo_cliente_en_espera;
		private $codigo_cliente;
		private $codigo_servicio;
		private $boleta;
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
		
		function __construct3($codigo_cliente, $codigo_servicio, $fecha){
			$this->codigo_cliente = $codigo_cliente;
			$this->codigo_servicio = $codigo_servicio;
			$this->fecha = $fecha;
		}
		
		function __construct7($codigo_cliente_en_espera, $codigo_cliente, $codigo_servicio, $boleta, $tiempo, $tiempo_adicional, $fecha){
			
			$this->codigo_cliente_en_espera = $codigo_cliente_en_espera;
			$this->codigo_cliente = $codigo_cliente;
			$this->codigo_servicio = $codigo_servicio;
			$this->boleta = $boleta;
			$this->tiempo = $tiempo;
			$this->tiempo_adicional = $tiempo_adicional;
			$this->fecha = $fecha;
			
		}
		
		//----------gets-----------------//
		
		public function getCodigoClienteEspera(){
			return($this->codigo_cliente_en_espera);
		}
		
		public function getCodigoCliente(){
			return($this->codigo_cliente);
		}
		
		public function getCodigoServicio(){
			return($this->codigo_servicio);
		}
		
		public function getBoleta(){
			return($this->boleta);
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
		
	}

?>