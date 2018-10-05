<!-- Modal Servicio - Insumo -->
<div class="modal fade" id="ModalServicioInsumo" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-servicio-insumo-edit">Añadir Nuevo Insumo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="ResetModalServicioInsumo();">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div id="cuerpo-modal" class="modal-body">
                <form>
                    <div class="form-group row">
                        <div class="col-sm">
                            <input type="text"  id="codigo_detalle_servicio_insumo" class="form-control form-control-sm" style='display: none'>
                            <input type="text"  id="id_automovil_detalle" class="form-control form-control-sm" style='display: none'>
                            <input type="text"  id="id_servicio_detalle" class="form-control form-control-sm" style='display: none'>
                            <label for="colFormLabelSm" class="col-sm col-form-label col-form-label-sm">Insumo</label>
                            <select id="descripcion_insumo_detalle" class="form-control form-control-sm" required>

                            </select>
                        </div>
                        <div class="col-sm">
                            <label for="colFormLabelSm" class="col-sm col-form-label col-form-label-sm">Cantidad</label>
                            <input type="text"  id="cantidad_insumo" class="form-control form-control-sm" placeholder="&#xf2bb; Cantidad">
                          <!--<small id="emailHelp" class="form-text text-muted">Campo requerido.</small>-->
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary cancelar" data-dismiss="modal" onClick="ResetModalServicioInsumo();">Cancelar</button>
                <button type="submit" class="btn btn-primary guardar" onClick="GuardarDatosServicioInsumo();">Guardar</button>
                <button type="submit" class="btn btn-primary modificar" onClick="ModificarDatosServicioInsumo();">Guardar Cambios</button>
            </div>
        </div>
    </div>
</div>


<!-- Modal eliminar Servicio - Insumo -->
<div class="modal fade" id="ModalEliminarServicioInsumo" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Eliminar Insumo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group row">
                        <div class="col-sm">
                            <input type="text" id="codigo_detalle_delete" class="form-control form-control-sm" style="display: none;">
                          <!--<small id="emailHelp" class="form-text text-muted">Campo requerido.</small>-->
                            <h4>¿Desea eliminar los datos?</h4>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button id="" type="button" class="btn btn-secondary no-delete" data-dismiss="modal" onClick="ResetModalServicioInsumo();">No</button>
                <button id="" type="submit" class="btn btn-primary yes-delete" onClick="EliminarDatosServicioInsumo();">Si</button>
            </div>
        </div>
    </div>
</div>