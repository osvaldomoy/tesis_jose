<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Documento sin título</title>
<link href="../css/bootstrap.css" rel="stylesheet" type="text/css">
<script src="../js/jquery-3.2.1.min.js"></script>
<link rel="stylesheet" href="../style.css">
<link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
</head>
<body style="background-image: url(../img/fondo-espera.jpg); 
			 background-repeat: no-repeat; 
			 background-size: cover; 
			 margin: 0px;
			 padding: 0px;">
	
  <div class="container-fluid" style="width: 100%; 
									  padding: 5px;
									  background: rgba(10,10,10,0.9);
									  text-align: center;
									  color: aliceblue;
									  font-size: 35px;
									  font-family: 'Josefin Sans', sans-serif;
									  ">
	  SALA DE ESPERA - SMART MACHINE

	</div>
<div class="row" style="padding: 20px; 
						  box-sizing: border-box;">
    <div class="col-xl">
		  <div class="card col" style=" box-shadow: 0px 0px 5px 5px #cecece; background: rgba(255,255,255,0.44) "> 
		  <div class="card-body" >
			<h5 class="card-title" style="text-align: center; font-size: 60px;">Boleta</h5>
			<?php 
				require_once "../controladores/ControladorServicio.php";
				$controlador_servicio = new ControladorServicio();
				$controlador_servicio->dameBoleta();
				?>
			<h5 class="card-title" style="text-align: center; font-size: 60px;">Tiempo Restante</h5>
			<h5 class="card-title" style="font-size: 100px; text-align: center;" id="countdown">5:00</h5>

			<p class="card-text"></p>

		</div>
	  </div>
	  </div>
	  
	  <div class="col-xl">
		  <div class="container-fluid" >
	
			  <table class="table" id="tabla-espera">
				  <thead class="thead-dark">
					<tr>
					  <th scope="col">Posición</th>
					  <th scope="col">Cliente</th>
					  <th scope="col">Servicio</th>
					  <th scope="col">Tiempo</th>
					</tr>
				  </thead>
				  <?php 
					require_once "../controladores/ControladorServicio.php";
					$controlador_servicio = new ControladorServicio();
					$controlador_servicio->dameListaEspera();
					?>
			  </table>
			</div>
		  
	  </div>
  </div>



<script async="true" src="../js_eventos/ActualizarBoleta.js"></script>
</body>
</html>