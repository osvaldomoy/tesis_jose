<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Administración - Mecánico</title>
        <link rel="stylesheet" href="../style.css">
        <script src="../js/bootstrap.min.js"></script>
        <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <script src="../js_eventos/jquery.js"></script>
        <script src="../js_eventos/vistas/VistaUsuario.js"></script>
        <script src="../js_eventos/ActualizarBoleta.js"></script>
        <script src="../js_eventos/vistas/VistaClienteEspera.js"></script>
        <script src="../js_eventos/vistas/VistaUsuario.js"></script>
        <link rel="stylesheet" href="../fontawesome-free-5.0.13/web-fonts-with-css/css/fontawesome-all.css">
        <link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
        <link rel="shortcut icon" href="../images/icono.png" />

    </head>


    <script>
        validarUsuarioLink();
    </script>   

    <body style="background-image: url(../img/fondo-espera.jpg); 
          background-repeat: no-repeat; 
          background-size: cover; 
          margin: 0px;
          padding: 0px;">
        <div class="container-fluid nombre-usuario"  style="width: 100%; 
             background: rgba(15,15,15,1.00);
             color: aliceblue;
             text-align: left;
             font-size: 25px;
             display: flex;
             justify-content: space-between;
             ">
            <div><i class="fas fa-user"></i><span class="nombreu" style="margin-left: 20px;">Nombre</span> </div>
            <div style="cursor: pointer;" onclick="cerrarSesion()"><i class="fas fa-sign-out-alt"></i><span class="cerrar-sesion" style="margin-left: 20px;">Cerrar Sesión</span> </div>


        </div>

        <script>dameNombreUsuario();</script>

        <script>actualizarListadeEspera();</script>


        <div class="container-fluid" style="padding: 0px;">
            <div class="row" style="margin: 0px;
                 padding: 0px;">
                <div class="col-xl-6" style="margin: 0px;
                     padding: 0px;">
                    <div class="container" style="width: 100%; 
                         background: rgba(26,26,26,1.00);
                         color: aliceblue;
                         font-size: 25px;
                         text-align: center;
                         padding:  10px 0px;
                         font-family: 'Josefin Sans', sans-serif;
                         margin: 0px;
                         ">Clientes en espera</div>
                    <table class="table" id="tabla-espera">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Posición</th>
                                <th scope="col">Boleta</th>
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
                <div class="col-xl-6" style="margin: 0px;
                     padding: 0px;
                     ">
                    <div class="container" style="width: 100%; 
                         background: rgba(26,26,26,1.00);
                         color: aliceblue;
                         font-size: 25px;
                         text-align: center;
                         padding:  10px 0px;
                         font-family: 'Josefin Sans', sans-serif;
                         margin: 0px;
                         ">Siguiente en Atención</div>

                    <div class="card col contenido-cliente-espera" style="background: rgba(255,255,255,0.45);">
                        <div class="card-body "> 
                            <!--<h5 class="card-title" style="font-size: 35px;">Luis Guzman</h5>
                            <p class="card-text"></p>
                                  <p><b>Servicio  Solicitado:</b> Nombre del servicio</p>
                                  <p><b>Vehículo:</b> 
                                          <ul>
                                                <li><b>Marca: </b><span>Marca</span></li>
                                                <li><b>Modelo: </b><span>Marca</span></li>
                                                <li><b>Chapa: </b><span>Marca</span></li>
                                          </ul>
                                  </p>
                                  
                            </div>
                         <button type="button" class="btn btn-primary" style="margin: 10px 0px;" onClick="atenderCliente(); return true;">ATENDER</button>-->
                            <script>
                                //obtiene el siguiente cliente en ser atendido
                                dameClienteEspera();
                            </script>
                        </div>


                    </div>
                </div>
            </div>




            <div class="container-fluid" style="padding: 0px;">
                <div class="row" style="margin: 0px;
                     padding: 0px;">
                    <div class="col-xl-6" style="margin: 0px;
                         padding: 0px;">
                        <div class="container" style="width: 100%; 
                             background: rgba(26,26,26,1.00);
                             color: aliceblue;
                             font-size: 25px;
                             text-align: center;
                             padding:  10px 0px;
                             font-family: 'Josefin Sans', sans-serif;
                             margin: 0px;
                             ">Estas Atendiendo a</div>


                        <div class="card col contenido-cliente-actual" style="background: rgba(255,255,255,0.45);">
                            <!--<div class="card-body contenido-cliente-actual">
                            <!--<h5 class="card-title" style="font-size: 35px;">Luis Guzman</h5>
                            <p class="card-text"></p>
                                  <p><b>Servicio  Solicitado:</b> Nombre del servicio</p>
                                  <p><b>Vehículo:</b> 
                                          <ul>
                                                <li><b>Marca: </b><span>Marca</span></li>
                                                <li><b>Modelo: </b><span>Marca</span></li>
                                                <li><b>Chapa: </b><span>Marca</span></li>
                                          </ul>
                                  </p>
                                  
                            </div>
                         <button type="button" class="btn btn-danger" style="margin: 10px 0px;" onClick="atenderCliente(); return true;">Terminar</button>-->

                            <script>
                                //obtiene el siguiente cliente en ser atendido
                                clienteAtencion();
                            </script>
                        </div>


                    </div>
                    <div class="col-xl-6" style="margin: 0px;
                         padding: 0px;
                         ">
                        <div class="container" style="width: 100%; 
                             background: rgba(26,26,26,1.00);
                             color: aliceblue;
                             font-size: 25px;
                             text-align: center;
                             padding:  10px 0px;
                             font-family: 'Josefin Sans', sans-serif;
                             margin: 0px;
                             ">Siguiente en Atención</div>



                    </div>
                </div>
            </div>





            <script>
                dameNombreUsuario();
            </script>
    </body>
</html>