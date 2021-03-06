<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>TURNOS</title>

        <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="../style.css">
        <script src="../js/bootstrap.min.js"></script>
        <script src="../js_eventos/jquery.js"></script>
        <script src="../js_eventos/vistas/VistaCliente.js"></script>
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
                 "> Pida turno aquí </div>
            <div class="card-body">
                <h5 class="card-title">Nº de Cédula</h5>
                <p class="card-text">
                <div class="row">
                    <div class="col-xl">
                        <input type="text" id="cedula_cliente">
                    </div>
                </div>
                </p>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter"  onClick="validarCliente(); return false;">
                    Aceptar
                </button>

            </div>
            <div class="card-footer text-muted">Turno para Servicios</div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document" style="justify-content: center;">
                <div class="modal-content" style="width: 800px;">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Solicite servicio</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    
                    <div class="modal-body contenido-modal">
                       


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-primary" onClick="GuardarClienteEspera();">Listo</button>
                    </div>
                    
<!--                    <div >
                        <h4 style="text-align:  center; width: 100%; margin-bottom: 50px;">Vistas General de Ticket</h4>
                        <div style="display: flex;
                             align-content: center;
                             width: 100%;
                             justify-content: center;
                             font-family: monospace;"><img src="../images/logo.png" alt=""></div>
                             <p style="text-align: center; font-family: monospace;">SMART MACHINE</p>
                             <p style="text-align: center; font-family: monospace;">
                             <ul class="info-ticket">
                                 <li >Sucursal - Itauguá</li>
                                 <li >Ruc: 5431319-8 
                                      Tel.: 0971 120 612</li>
                                 <li>Fecha: <span  class="fecha">26-09-2018</span>  -  
                                     Hora: <span  class="hora">21:20</span> </li>
                                 

                             </ul>

                             </p>
                             
                    </div>-->
                </div>
            </div>
        </div>
    </body>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js_eventos/jquery.js"></script>
</html>