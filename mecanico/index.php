<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Administración - Mecánico</title>

	<link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="../style.css">
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js_eventos/jquery.js"></script>
	<script src="../js_eventos/vistas/VistaUsuario.js"></script>
        <link rel="shortcut icon" href="../images/icono.png" />
</head>
                                                                                         
<body style="background-image: url(../img/fondo-espera.jpg); 
			 background-repeat: no-repeat; 
			 background-size: cover; 
			 margin: 0px;
			 padding: 0px; 
			 display: flex;
			 justify-content: center;
			 align-items: center;
			 align-content: center;
			 height: 100%;
			 ">
	<div class="card text-center col-md-4" style="margin: 100px auto;">
		<div class="card-header" style="font-size: 50px;
										font-weight: 600;
										">Mecánico</div>
		<div class="card-body">
			<h5 class="card-title">Usuario</h5>
			<p class="card-text">
				<div class="row">
					<div class="col-xl">
						<input type="text" id="usuario">
					</div>
				</div>
			</p>
		<h5 class="card-title">Contraseña</h5>
			<p class="card-text">
				<div class="row">
					<div class="col-xl">
						<input type="password" id="pass">
					</div>
				</div>
			</p>
		<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" onClick="validarUsuario(); return false;">
  Ingresar
</button>
			
	</div>
		<div class="card-footer text-muted">Si olvidaste tu contraseña contacta con el administrador</div>
	</div>



	
	
	
</body>
<script src="../js/bootstrap.min.js"></script>
	<script src="../js_eventos/jquery.js"></script>
</html>