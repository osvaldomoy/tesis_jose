<!-- Modal Usuario -->
<div class="modal fade" id="ModalUsuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="title-usuario-edit">Añadir Nuevo Usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="ResetModalUsuario();">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div id="cuerpo-modal" class="modal-body">
                <form>
                    <div class="form-group row">
                        <div class="col-sm">
                            <input type="text"  id="id_usuario" class="form-control form-control-sm" style='display: none'>
                            <label for="colFormLabelSm" class="col-sm col-form-label col-form-label-sm">Nombre</label>
                            <input type="text"  id="nombre_usuario" class="form-control form-control-sm" placeholder="&#xf007; Nombre">
                          <!--<small id="emailHelp" class="form-text text-muted">Campo requerido.</small>-->
                        </div>
                        <div class="col-sm">
                            <label for="colFormLabelSm" class="col-sm col-form-label col-form-label-sm">Apellido</label>
                            <input type="text" id="apellido_usuario" class="form-control form-control-sm" placeholder="&#xf007; Apellido">
                          <!--<small id="emailHelp" class="form-text text-muted">Campo requerido.</small>-->
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm">
                            <label for="colFormLabelSm" class="col-sm col-form-label col-form-label-sm">Usuario</label>
                            <input type="text" id="usu_usuario" class="form-control form-control-sm" placeholder="&#xf007; Usuario">
                          <!--<small id="emailHelp" class="form-text text-muted">Campo requerido.</small>-->
                        </div>
                        <div class="col-sm">
                            <label for="colFormLabelSm" class="col-sm col-form-label col-form-label-sm">Contraseña</label>
                            <input type="password" id="pass_usuario" class="form-control form-control-sm" placeholder="&#xf023; Contraseña">
                          <!--<small id="emailHelp" class="form-text text-muted">Campo requerido.</small>-->
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm">
                            <label for="colFormLabelSm" class="col-sm col-form-label col-form-label-sm">Tipo de usuario</label>
                            <select id="tipo_usuario" class="form-control form-control-sm">

                            </select>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary cancelar" data-dismiss="modal" onClick="ResetModalUsuario();">Cancelar</button>
                <button type="submit" class="btn btn-primary guardar" onClick="GuardarDatosUsuario();">Guardar</button>
                <button type="submit" class="btn btn-primary modificar" onClick="ModificarDatosUsuario();">Guardar Cambios</button>
            </div>
        </div>
    </div>
</div>


<!-- Modal eliminar Usuario -->
<div class="modal fade" id="ModalEliminarUsuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Eliminar Usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group row">
                        <div class="col-sm">
                            <input type="text" id="id_usuario_delete" class="form-control form-control-sm" style="display: none;">
                          <!--<small id="emailHelp" class="form-text text-muted">Campo requerido.</small>-->
                            <h4>¿Desea eliminar los datos?</h4>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button id="" type="button" class="btn btn-secondary no-delete" data-dismiss="modal" onClick="ResetModalUsuario();">No</button>
                <button id="" type="submit" class="btn btn-primary yes-delete" onClick="EliminarDatosUsuario();">Si</button>
            </div>
        </div>
    </div>
</div>