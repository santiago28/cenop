<div class="container col-xs-12" style="margin-top:40px;">
  <div>
    <?= $this->tag->form(['Empresa/save', 'method' => 'post', 'autocomplete' => 'off', 'class' => 'form-horizontal']) ?>
    <?= $this->tag->hiddenField(['idEmpresa']) ?>
    <div class="panel panel-default">
      <div class="panel-heading">
        <center><h4>Editar Cliente</h4></center>
      </div>
      <div class="panel-body">
        <?= $this->getContent() ?>
        <div style="list-style:none; width:100%" class="col-md-12">
          <div class="col-md-6">
            <div class="form-group col-md-12">
              <label for="fieldNombre" class="">Nombre</label>
              <div>
                <?= $this->tag->textField(['nombre', 'size' => 30, 'class' => 'form-control', 'id' => 'fieldNombre']) ?>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group col-md-12">
              <label for="fieldNombre" class="">Nombre Interno</label>
              <div>
                <?= $this->tag->textField(['nombreInterno', 'size' => 30, 'class' => 'form-control', 'id' => 'fieldNombreInterno']) ?>
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
              <label for="fieldNombre" class="">Municipio</label>
              <div>
                <?= $this->tag->select(['idMunicipio', $municipios, 'class' => 'form-control']) ?>
              </div>
            </div>
          </div>
        </div>
        <div style="list-style:none; width:100%" class="col-md-12">
          <div class="col-md-6">
            <div class="form-group col-md-12">
              <label for="fieldNombre" class="">Teléfono</label>
              <div>
                <?= $this->tag->textField(['telefono', 'type' => 'numeric', 'class' => 'form-control', 'id' => 'fieldTelefono']) ?>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group col-md-12">
              <label for="fieldNombre" class="">Nit</label>
              <div>
                <?= $this->tag->textField(['nit', 'size' => 30, 'class' => 'form-control', 'id' => 'fieldNit']) ?>
              </div>
            </div>
          </div>
        </div>
        <div style="list-style:none; width:100%" class="col-md-12">
          <div class="col-md-6">
            <div class="form-group col-md-12">
              <label for="fieldNombre" class="">Cedula Representante Legal</label>
              <div>
                <?= $this->tag->textField(['cedulaRepresentante', 'size' => 30, 'class' => 'form-control', 'id' => 'fieldCedulaRepresentante']) ?>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group col-md-12">
              <label for="fieldNombre" class="">Nombre Representante Legal</label>
              <div>
                <?= $this->tag->textField(['representanteLegal', 'size' => 30, 'class' => 'form-control', 'id' => 'fieldRepresentantelegal']) ?>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="panel-footer">
        <div class="form-group" style="overflow:hidden;text-align:right; padding-right:60px;">
          <div class="col-sm-offset-2 col-sm-10">
            <?= $this->tag->linkTo(['empresa/', 'Consultar', 'class' => 'btn btn-primary']) ?>
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
  $.get("<?php echo $this->url->get('Empresa/consultarMunicipios'); ?>/", { "departamento": Departamento}, function(data){

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
