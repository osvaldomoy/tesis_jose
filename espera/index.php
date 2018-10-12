<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>SALA DE ESPERA</title>
<link href="../css/bootstrap.css" rel="stylesheet" type="text/css">
<script src="../js/jquery-3.2.1.min.js"></script>
<link rel="stylesheet" href="../style.css">
<link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
<link rel="shortcut icon" href="../images/icono.png" />
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
			<!--<h5 class="card-title" style="text-align: center; font-size: 60px;">Boleta</h5>-->
			<h5 class="card-title" style="text-align: center; font-size: 60px;">Información</h5>
                        <ul>
                            <li style="display: flex;">Los Clientes en color   <div style="width: 20px; 
                                                            height: 20px;
                                                            margin-left: 20px; margin-right: 20px;" class="color-verde"></div> están siendo atendidos actualmente.</li>
                            <li style="display: flex;">Los Clientes en color   <div style="width: 20px; 
                                                            height: 20px;
                                                            margin-left: 20px;  margin-right: 20px;" class="color-amarilo"></div> están en espera.</li>
                            

                        </ul>
                        
                        <div><img src="../images/logo.png" alt=""></div>

			<?php 
//				require_once "../controladores/ControladorServicio.php";
//				$controlador_servicio = new ControladorServicio();
//				$controlador_servicio->dameBoleta();
//				?>
<!--			<h5 class="card-title" style="text-align: center; font-size: 60px;">Tiempo Restante</h5>
			<h5 class="card-title" style="font-size: 100px; text-align: center;" id="countdown"></h5>-->

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
    
   <!-- Modal -->
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document" style="justify-content: center;">
                <div class="modal-content" style="width: 800px;">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">SERVICIO TERMINADO</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    
                    <div class="modal-body terminado-info">
                       


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-primary" onClick="GuardarClienteEspera();">Listo</button>
                    </div>
                    

                </div>
            </div>
        </div> 
    



<script async="true" src="../js_eventos/ActualizarBoleta.js"></script>
</body>
</html>