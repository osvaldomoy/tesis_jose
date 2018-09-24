<!-- Modal Cliente - Automovil -->
<div class="modal fade" id="ModalClienteAutomovil" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-automovil-edit">Añadir Nuevo Cliente - Automovil</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="ResetModalClienteAutomovil();">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div id="cuerpo-modal" class="modal-body">
                <form>
                    <div class="form-group row">
                        <div class="col-sm">
                            <input type="text"  id="id_cliente_automovil" class="form-control form-control-sm" style='display: none'>
                            <label for="colFormLabelSm" class="col-sm col-form-label col-form-label-sm">Cliente</label>
                            <select id="cliente_automovil_nombre" class="form-control form-control-sm" required>

                            </select>
                          <!--<small id="emailHelp" class="form-text text-muted">Campo requerido.</small>-->
                        </div>
                        <div class="col-sm">
                            <label for="colFormLabelSm" class="col-sm col-form-label col-form-label-sm">Automovil</label>
                            <select id="cliente_automovil_auto" class="form-control form-control-sm" required>
                                <option class='valor' value='' disabled selected>Automovil</option>
                            </select>
                          <!--<small id="emailHelp" class="form-text text-muted">Campo requerido.</small>-->
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm">
                            <label for="colFormLabelSm" class="col-sm col-form-label col-form-label-sm">Chapa</label>
                            <input type="text"  id="cliente_automovil_chapa" class="form-control form-control-sm" placeholder="&#xf2bb; Chapa">
                          <!--<small id="emailHelp" class="form-text text-muted">Campo requerido.</small>-->
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary cancelar" data-dismiss="modal" onClick="ResetModalClienteAutomovil();">Cancelar</button>
                <button type="submit" class="btn btn-primary guardar" onClick="GuardarDatosClienteAutomovil();">Guardar</button>
                <button type="submit" class="btn btn-primary modificar" onClick="ModificarDatosClienteAutomovil();">Guardar Cambios</button>
            </div>
        </div>
    </div>
</div>


<!-- Modal eliminar Cliente - Automovil -->
<div class="modal fade" id="ModalEliminarClienteAutomovil" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Eliminar Cliente - Automovil</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group row">
                        <div class="col-sm">
                            <input type="text" id="id_cliente_automovil_delete" class="form-control form-control-sm" style="display: none;">
                          <!--<small id="emailHelp" class="form-text text-muted">Campo requerido.</small>-->
                            <h4>¿Desea eliminar los datos?</h4>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button id="" type="button" class="btn btn-secondary no-delete" data-dismiss="modal" onClick="ResetModalClienteAutomovil();">No</button>
                <button id="" type="submit" class="btn btn-primary yes-delete" onClick="EliminarDatosClienteAutomovil();">Si</button>
            </div>
        </div>
    </div>
</div>