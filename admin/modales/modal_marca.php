<!-- Modal Marca -->
<div class="modal fade" id="ModalMarca" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-marca-edit">Añadir Nueva Marca</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="ResetModalMarca();">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div id="cuerpo-modal" class="modal-body">
                <form>
                    <div class="form-group row">
                        <div class="col-sm">
                            <input type="text"  id="id_marca" class="form-control form-control-sm" style='display: none'>
                            <label for="colFormLabelSm" class="col-sm col-form-label col-form-label-sm">Marca</label>
                            <input type="text"  id="descripcion_marca" class="form-control form-control-sm" placeholder="&#xf007; Marca">
                          <!--<small id="emailHelp" class="form-text text-muted">Campo requerido.</small>-->
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary cancelar" data-dismiss="modal" onClick="ResetModalMarca();">Cancelar</button>
                <button type="submit" class="btn btn-primary guardar" onClick="GuardarDatosMarca();">Guardar</button>
                <button type="submit" class="btn btn-primary modificar" onClick="ModificarDatosMarca();">Guardar Cambios</button>
            </div>
        </div>
    </div>
</div>


<!-- Modal eliminar Marca -->
<div class="modal fade" id="ModalEliminarMarca" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Eliminar Marca</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group row">
                        <div class="col-sm">
                            <input type="text" id="id_marca_delete" class="form-control form-control-sm" style="display: none;">
                          <!--<small id="emailHelp" class="form-text text-muted">Campo requerido.</small>-->
                            <h4>¿Desea eliminar los datos?</h4>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button id="" type="button" class="btn btn-secondary no-delete" data-dismiss="modal" onClick="ResetModalMarca();">No</button>
                <button id="" type="submit" class="btn btn-primary yes-delete" onClick="EliminarDatosMarca();">Si</button>
            </div>
        </div>
    </div>
</div>