<!-- Modal Insumo -->
<div class="modal fade" id="ModalInsumo" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-insumo-edit">Añadir Nuevo Insumo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="ResetModalInsumo();">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div id="cuerpo-modal" class="modal-body">
                <form>
                    <div class="form-group row">
                        <div class="col-sm">
                            <input type="text"  id="codigo_insumo" class="form-control form-control-sm" style='display: none'>
                            <label for="colFormLabelSm" class="col-sm col-form-label col-form-label-sm">Nombre</label>
                            <input type="text"  id="nombre_insumo" class="form-control form-control-sm" placeholder="&#xf007; Nombre">
                          <!--<small id="emailHelp" class="form-text text-muted">Campo requerido.</small>-->
                        </div>
                        <div class="col-sm">
                            <label for="colFormLabelSm" class="col-sm col-form-label col-form-label-sm">Stock actual</label>
                            <input type="text"  id="stock_insumo" class="form-control form-control-sm" placeholder="&#xf0cb; Stock actual">
                          <!--<small id="emailHelp" class="form-text text-muted">Campo requerido.</small>-->
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm">
                            <label for="colFormLabelSm" class="col-sm col-form-label col-form-label-sm">Stock mínimo</label>
                            <input type="text"  id="stock_min_insumo" class="form-control form-control-sm" placeholder="&#xf0cb; Stock mínimo">
                          <!--<small id="emailHelp" class="form-text text-muted">Campo requerido.</small>-->
                        </div>
                        <div class="col-sm">
                            <label for="colFormLabelSm" class="col-sm col-form-label col-form-label-sm">Precio</label>
                            <input type="text"  id="precio_insumo" class="form-control form-control-sm" placeholder="&#xf0cb; Precio">
                          <!--<small id="emailHelp" class="form-text text-muted">Campo requerido.</small>-->
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary cancelar" data-dismiss="modal" onClick="ResetModalInsumo();">Cancelar</button>
                <button type="submit" class="btn btn-primary guardar" onClick="GuardarDatosInsumo();">Guardar</button>
                <button type="submit" class="btn btn-primary modificar" onClick="ModificarDatosInsumo();">Guardar Cambios</button>
            </div>
        </div>
    </div>
</div>


<!-- Modal eliminar Insumo -->
<div class="modal fade" id="ModalEliminarInsumo" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                            <input type="text" id="id_insumo_delete" class="form-control form-control-sm" style="display: none;">
                          <!--<small id="emailHelp" class="form-text text-muted">Campo requerido.</small>-->
                            <h4>¿Desea eliminar los datos?</h4>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button id="" type="button" class="btn btn-secondary no-delete" data-dismiss="modal" onClick="ResetModalInsumo();">No</button>
                <button id="" type="submit" class="btn btn-primary yes-delete" onClick="EliminarDatosInsumo();">Si</button>
            </div>
        </div>
    </div>
</div>