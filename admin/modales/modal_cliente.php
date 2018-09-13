<!-- Modal Cliente -->
<div class="modal fade" id="ModalCliente" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Añadir Nuevo Cliente</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div id="cuerpo-modal" class="modal-body">
        <form>
		  <div class="form-group row">
			  <div class="col-sm">
				  <input type="text"  id="id_cliente" class="form-control form-control-sm" style='display: none'>
				  <input type="text"  id="nombre_cliente" class="form-control form-control-sm" placeholder="&#xf007; Nombre">
				<!--<small id="emailHelp" class="form-text text-muted">Campo requerido.</small>-->
			  </div>
			  <div class="col-sm">
				  <input type="text" id="apellido_cliente" class="form-control form-control-sm" placeholder="&#xf007; Apellido">
				<!--<small id="emailHelp" class="form-text text-muted">Campo requerido.</small>-->
			  </div>
		  </div>
		  <div class="form-group row">
			  <div class="col-sm">
				  <input type="number" id="cedula_cliente" class="form-control form-control-sm" placeholder="&#xf2bb; Cédula">
				<!--<small id="emailHelp" class="form-text text-muted">Campo requerido.</small>-->
			  </div>
			  <div class="col-sm">
				  <input type="text" id="telefono_cliente" class="form-control form-control-sm" placeholder="&#xf3cd; Teléfono">
				<!--<small id="emailHelp" class="form-text text-muted">Campo requerido.</small>-->
			  </div>
		  </div>
			<div class="form-group row">
			  <div class="col-sm">
				  <input type="email" id="correo_cliente" class="form-control form-control-sm" placeholder="&#xf0e0; Correo electrónico">
			  </div>
		  </div>
		</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary cancelar" data-dismiss="modal" onClick="ResetModal();">Cancelar</button>
        <button type="submit" class="btn btn-primary guardar" onClick="GuardarDatosCliente();">Guardar</button>
        <button type="submit" class="btn btn-primary modificar" onClick="ModificarDatosCliente();">Guardar Cambios</button>
      </div>
    </div>
  </div>
</div>


<!-- Modal eliminar Cliente -->
<div class="modal fade" id="ModalEliminarCliente" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Eliminar Cliente</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
		  <div class="form-group row">
			  <div class="col-sm">
				  <input type="text" id="id_cliente_delete" class="form-control form-control-sm" style="display: none;">
				<!--<small id="emailHelp" class="form-text text-muted">Campo requerido.</small>-->
				  <h4>¿Desea eliminar los datos?</h4>
			  </div>
		  </div>
		</form>
      </div>
      <div class="modal-footer">
        <button id="" type="button" class="btn btn-secondary no-delete" data-dismiss="modal" onClick="ResetModal();">No</button>
        <button id="" type="submit" class="btn btn-primary yes-delete" onClick="EliminarDatosCliente();">Si</button>
      </div>
    </div>
  </div>
</div>