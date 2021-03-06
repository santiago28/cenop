<div class="container col-xs-12" style="margin-top:40px;">
  <?= $this->getContent() ?>
  <?= $this->assets->outputCss() ?>
  <div style="list-style:none; width:100%" class="col-md-12">
    <?= $this->tag->form(['detalleingreso/save', 'method' => 'post', 'autocomplete' => 'off', 'class' => 'form-horizontal']) ?>
    <br>
    <?= $this->tag->hiddenField(['idIngreso']) ?>
    <div id="imprimir">
      <div class="seccion encabezado">

        <div class='fila col3'>
          <div style="width:15%;"><center><?= $this->tag->image(['img/logo.jpg', 'style' => 'width:100px;']) ?></certer>
          </div>
          <div style='width:70%;'><h3><center>CENOP ÓRTESIS & PRÓTESIS</certer></h3>
          </div>
          <div style="width:15%;">
            <?= $this->tag->textField(['codigo', 'class' => 'form-control', 'style' => 'height:25px; margin-top:2px;', 'placeholder' => 'Código']) ?>
            <?= $this->tag->textField(['version', 'class' => 'form-control', 'style' => 'height:25px; margin-top:2px;', 'placeholder' => 'Versión']) ?>
            <?= $this->tag->textField(['fecha', 'class' => 'form-control calendario', 'style' => 'height:25px; margin-top:2px;', 'placeholder' => 'Fecha']) ?>
          </div>
        </div>
        <div class='fila center'><div style="margin-left:38%;">Formato de ingreso materia prima y componentes</div></div>
        <div id="datosingreso">
          <?php foreach ($detalleingreso as $detalle) { ?>
          <input type="hidden" name="idDetalle[]" value="<?= $detalle->idDetalle ?>">
          <div class="fila col3 fil<?= $detalle->idDetalle ?>">
            <div><span class="titulo">NOMBRE DE MATERIALES</span><textarea class="form-control" name="nombreMaterial[]"><?= $detalle->nombreMaterial ?></textarea></div>
            <div><span class="titulo">FECHA DE INGRESO</span><input class="form-control" name="fechaIngreso[]" value="<?= $detalle->fechaIngreso ?>" /></div>
            <div><span class="titulo">LOTE DEL FABRICANTE</span><input class="form-control" name="lote[]" value="<?= $detalle->lote ?>" /></div>
            <div><span class="titulo">ESTADO DE CALIDAD DEL PRODUCTO</span><?= $this->tag->select(['estadoCalidad[]', $estadosCalidad, 'class' => 'form-control', 'value' => $detalle->estadoCalidad]) ?></div>
            <div><span class="titulo">FECHA  DE CADUCIDAD</span><input class="form-control" name="fechaCaducidad[]" value="<?= $detalle->fechaCaducidad ?>" /></div>
            <div><span class="titulo">N/A</span><input class="form-control" name="na[]" value="<?= $detalle->na ?>" /></div>
            <div style="width:5%;"><button class="btn btn-default glyphicon glyphicon-trash" onclick="eliminaringreso(<?= $detalle->idDetalle ?>); return false;"></div>
          </div>
          <div class="fila col3 fil<?= $detalle->idDetalle ?>">
            <div><span class="titulo">CANTIDAD DEL MATERIAL</span><input class="form-control" name="cantidadMateriales[]" value="<?= $detalle->cantidadMateriales ?>" /></div>
            <div><span class="titulo">CERTIFICADO Y/O FICHA TÉCNICA DE MP</span><input class="form-control" name="certificado[]" value="<?= $detalle->certificado ?>" /></div>
            <div><span class="titulo">INFORMACIÓN DEL PROVEEDOR</span><input class="form-control" name="informacionProveedor[]" value="<?= $detalle->informacionProveedor ?>" /></div>
            <div><span class="titulo">REFERENCIA</span><input class="form-control" name="referencia[]" value="<?= $detalle->referencia ?>"  /></div>
            <div><span class="titulo">RECIBE</span><input class="form-control" name="recibe[]" value="<?= $detalle->recibe ?>" /></div>
            <div><span class="titulo">OBSERVACIONES</span><textarea class="form-control" name="observaciones[]"><?= $detalle->observaciones ?></textarea></div>
            <div style="width:7.5%;"></div>
          </div>
          <?php } ?>
        </div>
        <div class='fila center'></div>
        <div class="quitar-vista" style="justify-content: center; align-content: center;">
          <button class="btn btn-default col-md-12" id="AgregarCampos">Agregar campos</button>
        </div>
        <div class="clear"></div>
      </div>
      <?= $this->tag->submitButton(['Guardar', 'class' => 'btn btn-primary']) ?>
      <br><br>
    </div>
  </form>
</div>
</div>
<div class="container col-xs-12" style="margin-top:20px;">
  <div>
    <div class="panel panel-default">
      <div class="panel-heading">
        <center><h4>Archivos Ingreso</h4></center>
      </div>
      <div class="panel-body">
        <table class="table table-bordered table-hover">
          <thead>
            <tr>
              <th style="text-align:center" colspan="4">CARGAS ARCHIVOS</th>
            </tr>
            <tr>
              <th>Nombre Archivo</th>
              <th>Fecha Carga</th>
              <th>Eliminar</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($archivos as $archivos) { ?>
            <tr>
              <td><?= $this->tag->linkTo(['files/' . $archivos->nombreArchivo, $archivos->nombreArchivo, 'target' => '_blank']) ?></td>
              <td><?= $archivos->fechaCarga ?></td>
              <td>
                <button class="btn btn-default btn-sm" onclick="eliminar(<?= $archivos->idCarga ?>)" type="button" title="Inhabilitar Registros" style="height: 34px;">
                  <i class="glyphicon glyphicon-trash"></i>
                </button>
              </td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
      <div class="panel-footer">
        <div class="form-group" style='overflow:hidden;text-align:right; padding-right:60px;'>
          <div class="col-sm-offset-2 col-sm-10">
            <button type="button" class="btn btn-primary" id="AbrirModalArchivo" name="button">Nuevo Archivo</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div id="ModalArchivos" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <?= $this->tag->form(['Detalleingreso/SubirArchivo', 'method' => 'post', 'autocomplete' => 'off', 'enctype' => 'multipart/form-data']) ?>
      <?= $this->tag->hiddenField(['idIngreso']) ?>
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Subir Archivo</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label>Archivo</label>
          <input type="file" class="form-control" name="files[]" multiple>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <input type="submit" class="btn btn-primary" value="Guardar">
      </div>
    </form>
  </div>
</div>
</div>
<?= $this->assets->outputJs() ?>
<script>
$("#AbrirModalArchivo").click(function(){
  $("#ModalArchivos").modal("show");
});

function eliminaringreso(idIngreso){
  if (idIngreso < 200000) {
    $.get("<?php echo $this->url->get('detalleingreso/EliminarIngreso'); ?>/", { "idIngreso": idIngreso}, function(data){
      if (data == "OK") {
        $('.fil'+idIngreso).remove();
      }
    });
  }else {
    $('.fil'+idIngreso).remove();
  }
}

function eliminar(idCarga){

  $.get("<?php echo $this->url->get('detalleingreso/EliminarCarga'); ?>/", { "idCarga": idCarga}, function(data){
    if (data == "OK") {
      location.reload();
    }
  });
}

</script>
