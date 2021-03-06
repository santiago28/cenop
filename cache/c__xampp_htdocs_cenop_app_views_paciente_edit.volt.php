<div class="container col-xs-12" style="margin-top:40px;">
  <div>
    <?= $this->tag->form(['paciente/save', 'method' => 'post', 'autocomplete' => 'off', 'class' => 'form-horizontal']) ?>
    <?= $this->tag->hiddenField(['idPaciente']) ?>
    <div class="panel panel-default">
      <div class="panel-heading">
        <center><h4>Editar Paciente</h4></center>
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
                
                <?= $this->tag->select(['idDepartamento', $departamentos, 'class' => 'form-control']) ?>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group col-md-12">
              <label for="fieldApellido">Municipio</label>
            <?= $this->tag->select(['idMunicipio', $municipios, 'class' => 'form-control']) ?>
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
    $('#idMunicipio').html(municipios);
  });
});
</script>
