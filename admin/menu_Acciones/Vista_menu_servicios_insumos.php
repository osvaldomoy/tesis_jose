<div class="row">
    <div class="col-sm">
        <form style="margin-bottom: 20px;">
            <div class="row" style="max-width: 80%; justify-content: center; margin: 0 auto; position: relative">
                <div class="col-sm-10">
                    <div class="row align-items-center" style="margin: 0;">
                        <div class="col-sm">
                            <input type="text" id="buscador-servicio" class="form-control" 
                                   placeholder="Buscar servicio" style="border-radius: 0px;" 
                                   autofocus onkeyup="FiltrarServicio();">
                        </div>
                        <div class="col-sm">
                            <input type="text" id="buscador-automovil" class="form-control" 
                                   placeholder="Buscar Automovil" style="border-radius: 0px;"
                                   onkeyup="FiltrarAutomovil();">
                        </div>
                    </div>
                </div>
                <div id="resultados" style="display: none; 
                     position: absolute;
                     top: 40px;
                     left: 70px;
                     padding: 5px;
                     width: 350px;
                     cursor: auto" onmouseover="ValidarFiltroServicio();"
                     ></div>
                <div id="resultados-automovil" style="display: none; 
                     position: absolute;
                     top: 40px;
                     left: 460px;
                     padding: 5px;
                     width: 350px;
                     cursor: auto;" onmouseover="ValidarFiltroAutomovil();"
                     ></div>
                <div class="col-sm-1">
                    <button class="btn btn-primary" onClick="ValidarServicioInsumo(); return false;">
                        <i class="fas fa-search"></i> Verificar</button>
                </div>
            </div>

        </form>

        <button id="btn-anhadir-servicio-insumo" class="btn btn-primary" 
                data-toggle="modal" data-target="#ModalServicioInsumo" 
                style="display: none;
                       margin: 0 auto;
                       margin-bottom: 20px;" 
                onClick="BorrarModificarEliminar();">Añadir</button>
        <div class="auto_servicio_contenedor" style='display: none;'>
            
        </div>
            
        
        <table id="lista-insumo-servicio" class="table">

        </table>

    </div>
</div>
