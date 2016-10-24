<form id="actualidarDatos">
<div class="modal fade" id="editar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Modificar Comprobante Contable</h4>
      </div>
      <div class="modal-body">
			<div id="datos_ajax"></div>
          <div class="form-group">
            <label for="ruc" class="control-label">Ruc:</label>
            <input type="text" class="form-control" id="ruc" name="ruc" required maxlength="10" required maxlength="13">
			<input type="hidden" class="form-control" id="id" name="id">
          </div>
		  <div class="form-group">
            <label for="nombres" class="control-label">Nombre:</label>
            <input type="text" class="form-control" id="nombres" name="nombres" required maxlength="200">
          </div>
		  <div class="form-group">
            <label for="retencion" class="control-label"># Retención:</label>
            <input type="text" class="form-control" id="retencion" name="retencion" required maxlength="100">
          </div>
		  <div class="form-group">
            <label for="concepto" class="control-label">Concepto:</label>
            <input type="text" class="form-control" id="concepto" name="concepto" required maxlength="600"> 
          </div>
		  <div class="form-group">
            <label for="fecha" class="control-label">Fecha:</label>
            <input type="text" class="form-control" id="fecha" name="fecha" required maxlength="10">
          </div>
          
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Actualizar</button>
      </div>
    </div>
  </div>
</div>
</form>