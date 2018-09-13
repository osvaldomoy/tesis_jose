<!-- Modal Modelo -->
<div class="modal fade" id="ModalModelo" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modal-modelo-edit">Añadir Nuevo Modelo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div id="cuerpo-modal" class="modal-body">
        <form>
		  <div class="form-group row">
			  <div class="col-sm">
				  <input type="text"  id="id_modelo" class="form-control form-control-sm" style='display: none'>
				  <input type="text"  id="descripcion_modelo" class="form-control form-control-sm" placeholder="&#xf007; Modelo">
				<!--<small id="emailHelp" class="form-text text-muted">Campo requerido.</small>-->
			  </div>
		  </div>
		</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary cancelar" data-dismiss="modal" onClick="ResetModalModelo();">Cancelar</button>
        <button type="submit" class="btn btn-primary guardar" onClick="GuardarDatosModelo();">Guardar</button>
        <button type="submit" class="btn btn-primary modificar" onClick="ModificarDatosModelo();">Guardar Cambios</button>
      </div>
    </div>
  </div>
</div>


<!-- Modal eliminar Modelo -->
<div class="modal fade" id="ModalEliminarModelo" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Eliminar Modelo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
		  <div class="form-group row">
			  <div class="col-sm">
				  <input type="text" id="id_modelo_delete" class="form-control form-control-sm" style="display: none;">
				<!--<small id="emailHelp" class="form-text text-muted">Campo requerido.</small>-->
				  <h4>¿Desea eliminar los datos?</h4>
			  </div>
		  </div>
		</form>
      </div>
      <div class="modal-footer">
        <button id="" type="button" class="btn btn-secondary no-delete" data-dismiss="modal" onClick="ResetModalModelo();">No</button>
        <button id="" type="submit" class="btn btn-primary yes-delete" onClick="EliminarDatosModelo();">Si</button>
      </div>
    </div>
  </div>
</div>