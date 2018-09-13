<!-- Modal Automovil -->
<div class="modal fade" id="ModalAutomovil" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modal-automovil-edit">Añadir Nuevo Automovil</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div id="cuerpo-modal" class="modal-body">
        <form>
		  <div class="form-group row">
			  <div class="col-sm">
				  <input type="text"  id="id_automovil" class="form-control form-control-sm" style='display: none'>
                                  <select id="marca_automovil" class="form-control form-control-sm placeholder">
                                      
                                  </select>
				<!--<small id="emailHelp" class="form-text text-muted">Campo requerido.</small>-->
			  </div>
			  <div class="col-sm">
                                  <select id="modelo_automovil" class="form-control form-control-sm placeholder">
                                      
                                  </select>
				<!--<small id="emailHelp" class="form-text text-muted">Campo requerido.</small>-->
			  </div>
		  </div>
		  <div class="form-group row">
			  <div class="col-sm">
                                  <select id="anho_automovil" class="form-control form-control-sm placeholder">
                                      
                                  </select>
				<!--<small id="emailHelp" class="form-text text-muted">Campo requerido.</small>-->
			  </div>
		  </div>
		</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary cancelar" data-dismiss="modal" onClick="ResetModalAutomovil();">Cancelar</button>
        <button type="submit" class="btn btn-primary guardar" onClick="GuardarDatosAutomovil();">Guardar</button>
        <button type="submit" class="btn btn-primary modificar" onClick="ModificarDatosAutomovil();">Guardar Cambios</button>
      </div>
    </div>
  </div>
</div>


<!-- Modal eliminar Automovil -->
<div class="modal fade" id="ModalEliminarAutomovil" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Eliminar Automovil</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
		  <div class="form-group row">
			  <div class="col-sm">
				  <input type="text" id="id_automovil_delete" class="form-control form-control-sm" style="display: none;">
				<!--<small id="emailHelp" class="form-text text-muted">Campo requerido.</small>-->
				  <h4>¿Desea eliminar los datos?</h4>
			  </div>
		  </div>
		</form>
      </div>
      <div class="modal-footer">
        <button id="" type="button" class="btn btn-secondary no-delete" data-dismiss="modal" onClick="ResetModalAutomovil();">No</button>
        <button id="" type="submit" class="btn btn-primary yes-delete" onClick="EliminarDatosAutomovil();">Si</button>
      </div>
    </div>
  </div>
</div>