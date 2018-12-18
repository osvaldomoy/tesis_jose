<!doctype html>
<html>
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Administración</title>

        <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="../style.css">
        <script src="../js_eventos/jquery.js"></script>
        <script src="../js/bootstrap.min.js"></script>
        <script src="../js_eventos/vistas/VistaTablas.js"></script>
        <script src="../js_eventos/Acciones/Btn_cliente.js"></script>
        <script src="../js_eventos/Acciones/Btn_usuario.js"></script>
        <script src="../js_eventos/Acciones/Btn_automovil.js"></script>
        <script src="../js_eventos/Acciones/Btn_cliente_automovil.js"></script>
        <script src="../js_eventos/Acciones/Btn_marca.js"></script>
        <script src="../js_eventos/Acciones/Btn_modelo.js"></script>
        <script src="../js_eventos/Acciones/Btn_servicio.js"></script>
        <script src="../js_eventos/Acciones/Btn_insumo.js"></script>
        <script src="../js_eventos/Acciones/Btn_detalle_servicio_insumo.js"></script>
        <script src="../js_eventos/Acciones/Busquedas/busca_insumo.js"></script>
        <script src="../js_eventos/vistas/VistaUsuario.js"></script>
        <link rel="stylesheet" href="../fontawesome-free-5.0.13/web-fonts-with-css/css/fontawesome-all.css">
        <link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
        <style>

            .btn-menu {
                width: 120px;
                height: 120px;
                border-radius: 50%;
            }

            .menu-icon h1, .menu-text {
                margin: 0px;
                padding: 0px;
            }

            .modal-body form input, .modal-body form select{
                font-family: 'Font Awesome 5 Free', 'Josefin Sans', Arial; 
                font-style: normal;
                color: black;
            }

            .yes-delete, .no-delete {
                padding-right: 40px;
                padding-left: 40px;
            }

            select:required:invalid {
                color: gray;
            }

            option[value=""][disabled] {
                display: none;
            }

            option {
                color: black;
            }

            .modal-body form label {
                text-align: left;
                padding: 5px 0;
            }
            
            .row {
                margin-top: 20px;
            }
            
            #resultados {
                text-align: left;
                background-color: white;
            }
            
            #resultados-automovil {
                text-align: left;
                background-color: white;
            }
            
            #resultados div {
                padding: 5px;
            }
            
            #resultados-automovil div {
                padding: 5px;
            }
            
            #resultados >div:hover {
                background-color: #ccd9e5 !important;
            }
            
            #resultados-automovil >div:hover {
                background-color: #ccd9e5 !important;
            }

        </style>
        <script>
            validarUsuarioLink();
        </script>
    </head>


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
        <div class="contenedor-menu" style="display: flex;
             justify-content: center;">
            <div class="text-center" style="margin: 50px auto; width: 90%;">
                <div class="card-header" style="font-size: 50px;
                     font-weight: 600;
                     ">Menú</div>




                <div class="card-body" style="padding: 0">
                    <!--Contenedor Menú-->

                    <div class="container" style="margin: 20px auto 50px auto; max-width: 100%">
                        <div class="row">
                            <div class="col-sm">
                                <button class="btn btn-primary btn-menu" type="submit" onClick="MostrarMenuClientes();">
                                    <div class="menu-icon"><h1><i class="fas fa-user"></i></h1></div>
                                    <div class="menu-text">Cliente</div>
                                </button>
                            </div>
                            <div class="col-sm">
                                <button class="btn btn-primary btn-menu" type="submit" onClick="MostrarMenuUsuarios();">
                                    <div class="menu-icon"><h1><i class="fas fa-user-cog"></i></h1></div>
                                    <div class="menu-text">Usuarios</div>
                                </button>
                            </div>
                            <div class="col-sm">
                                <button class="btn btn-primary btn-menu" type="submit" onClick="MostrarMenuAutomoviles();">
                                    <div class="menu-icon"><h1><i class="fas fa-car"></i></h1></div>
                                    <div class="menu-text">Automóvil</div>
                                </button>
                            </div>
                            <div class="col-sm">
                                <button class="btn btn-primary btn-menu" type="submit" onClick="MostrarMenuClientesAutomoviles();">
                                    <div class="menu-icon"><h1><i class="fas fa-user"></i></h1></div>
                                    <div class="menu-text">Cliente - <br>Automóvil</div>
                                </button>
                            </div>
                            <div class="col-sm">
                                <button class="btn btn-primary btn-menu" type="submit" onClick="MostrarMenuMarcas();">
                                    <div class="menu-icon"><h1><i class="fas fa-user"></i></h1></div>
                                    <div class="menu-text">Marca</div>
                                </button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm">
                                <button class="btn btn-primary btn-menu" type="submit" onClick="MostrarMenuModelos();">
                                    <div class="menu-icon"><h1><i class="fas fa-user"></i></h1></div>
                                    <div class="menu-text">Modelo</div>
                                </button>
                            </div>
                            <div class="col-sm">
                                <button class="btn btn-primary btn-menu" type="submit" onClick="MostrarMenuServicios();">
                                    <div class="menu-icon"><h1><i class="fas fa-car"></i></h1></div>
                                    <div class="menu-text">Servicio</div>
                                </button>
                            </div>
                            <div class="col-sm">
                                <button class="btn btn-primary btn-menu" type="submit" onClick="MostrarMenuInsumos();">
                                    <div class="menu-icon"><h1><i class="fas fa-car"></i></h1></div>
                                    <div class="menu-text">Insumos</div>
                                </button>
                            </div>
                            <div class="col-sm">
                                <button class="btn btn-primary btn-menu" type="submit" onClick="MostrarMenuInsumos_Servicios();">
                                    <div class="menu-icon"><h1><i class="fas fa-car"></i></h1></div>
                                    <div class="menu-text">Insumos - <br>Servicios</div>
                                </button>
                            </div>
                            <div class="col-sm">
                                <button class="btn btn-primary btn-menu" type="submit" onClick="MostrarInformes();">
                                    <div class="menu-icon"><h1><i class="fas fa-paperclip"></i></h1></div>
                                    <div class="menu-text">Informes</div>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!--Contenedor Tablas - Acciones-->

                    <div id="contenedor-tablas" class="container" style=" display: none; max-width: 100%; background-color: rgba(252,252,252,0.70); padding: 20px 0px;">

                    </div>

                    <!--MODALES-->

                    <?php
                    //Llamada a Modal Cliente
                    require_once("modales/modal_cliente.php");

                    //Llamada a Modal Usuario
                    require_once("modales/modal_usuario.php");

                    //Llamada a Modal Automovil
                    require_once("modales/modal_automovil.php");

                    //Llamada a Modal Cliente - Automovil
                    require_once("modales/modal_cliente_automovil.php");

                    //Llamada a Modal Marca
                    require_once("modales/modal_marca.php");

                    //Llamada a Modal Modelo
                    require_once("modales/modal_modelo.php");

                    //Llamada a Modal Servicio
                    require_once("modales/modal_servicio.php");

                    //Llamada a Modal Insumo
                    require_once("modales/modal_insumo.php");
                    
                    //Llamada a Modal Servicio - Insumo
                    require_once("modales/modal_servicio_insumo.php");
                    ?>

                </div>
            </div>
        </div>
        <script src="../js_eventos/jquery.js"></script>
        <script src="../js/bootstrap.min.js"></script>

    </body>
</html>
