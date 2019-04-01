<div class="container col-xs-12" style="margin-top:40px;">
  <div>
    <?= $this->tag->form(['paciente/create', 'method' => 'post', 'autocomplete' => 'off', 'class' => 'form-horizontal']) ?>
    <?= $this->tag->hiddenField(['codfirma']) ?>
    <div class="panel panel-default">
      <div class="panel-heading">
        <center><h4>Datos Paciente</h4></center>
      </div>
      <div class="panel-body">
        <?= $this->getContent() ?>
        <div style="list-style:none; width:100%" class="col-md-12">
          <div class="col-md-6">
            <div class="form-group col-md-12">
              <label for="fieldNombre" class="">Nombres</label>
              <div>
                <?= $this->tag->textField(['nombre', 'size' => 30, 'class' => 'form-control', 'id' => 'fieldNombre']) ?>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group col-md-12">
              <label for="fieldApellido">Apellidos</label>
              <div>
                <?= $this->tag->textField(['apellido', 'size' => 30, 'class' => 'form-control', 'id' => 'fieldApellido']) ?>
              </div>
            </div>
          </div>
        </div>
        <div style="list-style:none; width:100%" class="col-md-12">
          <div class="col-md-6">
            <div class="form-group col-md-12">
              <label for="fieldNombre" class="">Tipo Documento</label>
              <div>
                <select class="form-control" name="tipoDocumento">
                  <option value="1">Registro Civil</option>
                  <option value="2">Tarjeta de Identidad</option>
                  <option value="3">Cédula de Ciudadanía</option>
                </select>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group col-md-12">
              <label for="fieldApellido">Número Documento</label>
              <div>
                <?= $this->tag->textField(['numeroDocumento', 'size' => 30, 'class' => 'form-control', 'id' => 'fieldNumerodocumento']) ?>
              </div>
            </div>
          </div>
        </div>
        <div style="list-style:none; width:100%" class="col-md-12">
          <div class="col-md-6">
            <div class="form-group col-md-12">
              <label for="fieldNombre" class="">Teléfono</label>
              <div>
                <?= $this->tag->textField(['telefono', 'size' => 30, 'class' => 'form-control', 'id' => 'fieldTelefono']) ?>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group col-md-12">
              <label for="fieldApellido">Celular</label>
              <div>
                <?= $this->tag->textField(['celular', 'size' => 30, 'class' => 'form-control', 'id' => 'fieldCelular']) ?>
              </div>
            </div>
          </div>
        </div>
        <div style="list-style:none; width:100%" class="col-md-12">
          <div class="col-md-6">
            <div class="form-group col-md-12">
              <label for="fieldNombre" class="">Departamento</label>
              <div>
                <select id="idDepartamento" name="idDepartamento" class="form-control">
                  <?php foreach ($departamentos as $departamento) { ?>
                  <option value="<?= $departamento->idDepartamento ?>"><?= $departamento->nombre ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group col-md-12">
              <label for="fieldApellido">Municipio</label>
              <select id="municipios" class="form-control" name="idMunicipio">

              </select>
            </div>
          </div>
        </div>
        <div style="list-style:none; width:100%" class="col-md-12">
          <div class="col-md-6">
            <div class="form-group col-md-12">
              <label for="fieldNombre" class="">Dirección</label>
              <div>
                <?= $this->tag->textField(['direccion', 'size' => 30, 'class' => 'form-control', 'id' => 'fieldDireccion']) ?>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group col-md-12">
              <label for="fieldApellido">Edad</label>
              <div>
                <?= $this->tag->textField(['edad', 'type' => 'numeric', 'class' => 'form-control', 'id' => 'fieldEdad']) ?>
              </div>
            </div>
          </div>
        </div>
        <div style="list-style:none; width:100%" class="col-md-12">
          <div class="col-md-6">
            <div class="form-group col-md-12">
              <label for="fieldNombre" class="">Estatura</label>
              <div>
                <?= $this->tag->textField(['estatura', 'size' => 30, 'class' => 'form-control', 'id' => 'fieldEstatura']) ?>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group col-md-12">
              <label for="fieldApellido">Peso</label>
              <div>
                <?= $this->tag->textField(['peso', 'size' => 30, 'class' => 'form-control', 'id' => 'fieldPeso']) ?>
              </div>
            </div>
          </div>
          <div style="list-style:none; width:100%; display:none" class="col-md-12" id="divfotofirma">
            <div class="col-md-6">
              <div class="form-group">
                <label>Foto Firma</label>
                <div class="">
                  <img src="" class="col-md-6" id="fotofirma" name="fotofirma">
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6" style="display:none;">
            <div class="form-group col-md-12">
              <label>Firma</label>
              <div class="input-group">
                <?= $this->tag->textField(['firma', 'class' => 'form-control', 'id' => 'fieldFirma']) ?>
                <span class="input-group-btn">
                  <button class="btn btn-primary" type="button">Firmar</button>
                </span>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <button type="button" name="button" class="btn btn-primary" id="AgregarFirma">Agregar Firma</button>
          </div>
          <div class="col-md-12">
            <br>
            <div id="canvas" style="display:none; border: 1px solid #c4caac;">
              <canvas class="roundCorners" id="newSignature"
              style="width: 1000; height:180;"></canvas>
            </div>
          </div>
          <div class="col-md-12" id="divboton" style="display:none;">
            <br>
            <button type="button" name="button" class="btn btn-primary" id="CargarFirma">Cargar Firma Paciente</button>
            <button type="button" name="button" class="btn btn-danger" id="LimpiarFirma">Limpiar Firma</button>
          </div>
        </div>
      </div>
      <div class="panel-footer">
        <div class="form-group" style="overflow:hidden;text-align:right; padding-right:60px;">
          <div class="col-sm-offset-2 col-sm-10">
            <?= $this->tag->linkTo(['paciente/', 'Consultar', 'class' => 'btn btn-primary']) ?>
            <?= $this->tag->submitButton(['Guardar', 'class' => 'btn btn-primary']) ?>
          </div>
        </div>
      </div>
    </div>
  </form>
</div>
</div>
<?= $this->assets->outputJs() ?>
<script type="text/javascript">
$("#idDepartamento").change(function(){
  var Departamento = $("#idDepartamento option:selected").attr("value");
  $.get("<?php echo $this->url->get('Paciente/consultarMunicipios'); ?>/", { "departamento": Departamento}, function(data){

    var municipios = "";
    var Datos = data;
    $.each(Datos, function(index, value){
      municipios += '<option value="'+value.idMunicipio+'">'+
      value.nombre+'</option>';
    });
    $('#municipios').html(municipios);
  });
});

$("#AgregarFirma").click(function(){
  signatureCapture();
  $("#canvas").show();
  $("#divboton").show();
});

$("#CargarFirma").click(function(e){
  e.preventDefault();
  var dataimage = document.getElementById("newSignature").toDataURL("image/png");
  $("#divfotofirma").show();
  $("#fotofirma").attr('src', dataimage);
  $("#codfirma").val(dataimage);
});

$("#LimpiarFirma").click(function(){
  var canvas = document.getElementById("newSignature");
  var ctx = canvas.getContext("2d");
  ctx.clearRect(0, 0, 1000, 180);
});
</script>
