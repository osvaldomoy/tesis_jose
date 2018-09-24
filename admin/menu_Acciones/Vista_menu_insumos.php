<div class="row">
    <div class="col-sm">
        <form>
            <div class="row" style="max-width: 80%; justify-content: center; margin: 0 auto;">
                <div class="col-sm-1">
                    <input type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalInsumo" 
                           style="margin-bottom: 20px;" onClick="BorrarModificarEliminar();" value="Añadir">
                </div>
                <div class="col-sm-10">
                    <input type="text" id="buscador-insumo" class="form-control" 
                           placeholder="Buscar insumo" style="border-radius: 0px;">
                </div>
            </div>
        </form>
        

        <table id="lista-insumo" class="table">

        </table>

    </div>
</div>
