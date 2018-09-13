<!-- Modal Sercicio -->
<div class="modal fade" id="ModalServicio" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="title-servicio-edit">Añadir Nuevo Servicio</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div id="cuerpo-modal" class="modal-body">
                <form>
                    <div class="form-group row">
                        <div class="col-sm">
                            <input type="text"  id="codigo_servicio" class="form-control form-control-sm" style='display: none'>
                            <input type="text"  id="descripcion_servicio" class="form-control form-control-sm" placeholder="&#xf1b9; Servicio">
                          <!--<small id="emailHelp" class="form-text text-muted">Campo requerido.</small>-->
                        </div>
                        <div class="col-sm">
                            <input type="text"  id="precio_servicio" class="form-control form-control-sm" placeholder="&#xf155; Precio">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm">
                            <input type="time"  id="tiempo_servicio" class="form-control form-control-sm" value="00:02:30" max="23:59:59" min="00:00:00">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary cancelar" data-dismiss="modal" onClick="ResetModalServicio();">Cancelar</button>
                <button type="submit" class="btn btn-primary guardar" onClick="GuardarDatosServicio();">Guardar</button>
                <button type="submit" class="btn btn-primary modificar" onClick="ModificarDatosServicio();">Guardar Cambios</button>
            </div>
        </div>
    </div>
</div>


<!-- Modal eliminar Servicio -->
<div class="modal fade" id="ModalEliminarServicio" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Eliminar Servicio</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group row">
                        <div class="col-sm">
                            <input type="text" id="id_servicio_delete" class="form-control form-control-sm" style="display: none;">
                          <!--<small id="emailHelp" class="form-text text-muted">Campo requerido.</small>-->
                            <h4>¿Desea eliminar los datos?</h4>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button id="" type="button" class="btn btn-secondary no-delete" data-dismiss="modal" onClick="ResetModalServicio();">No</button>
                <button id="" type="submit" class="btn btn-primary yes-delete" onClick="EliminarDatosServicio();">Si</button>
            </div>
        </div>
    </div>
</div>