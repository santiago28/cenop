<div class="container col-xs-12" style="margin-top:40px;">
  <div>
    {{ form("ortopedista/save", "method":"post", "autocomplete" : "off", "class" : "form-horizontal") }}
    {{ hidden_field("idOrtopedista") }}
    <div class="panel panel-default">
      <div class="panel-heading">
        <center><h4>Editar Ortopedista</h4></center>
      </div>
      <div class="panel-body">
        {{ content() }}
        <div style="list-style:none; width:100%" class="col-md-12">
          <div class="col-md-6">
            <div class="form-group col-md-12">
              <label for="fieldNombre" class="">Nombres</label>
              <div>
                {{ text_field("nombre", "size" : 30, "class" : "form-control", "id" : "fieldNombre") }}
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group col-md-12">
              <label for="fieldApellido">Apellidos</label>
              <div>
                {{ text_field("apellido", "size" : 30, "class" : "form-control", "id" : "fieldApellido") }}
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
                {{ text_field("numeroDocumento", "size" : 30, "class" : "form-control", "id" : "fieldNumerodocumento") }}
              </div>
            </div>
          </div>
        </div>
        <div style="list-style:none; width:100%" class="col-md-12">
          <div class="col-md-6">
            <div class="form-group col-md-12">
              <label for="fieldNombre" class="">Teléfono</label>
              <div>
                {{ text_field("telefono", "size" : 30, "class" : "form-control", "id" : "fieldTelefono") }}
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group col-md-12">
              <label for="fieldApellido">Celular</label>
              <div>
                {{ text_field("celular", "size" : 30, "class" : "form-control", "id" : "fieldCelular") }}
              </div>
            </div>
          </div>
        </div>
        {# <div style="list-style:none; width:100%" class="col-md-12">
        <div class="col-md-6">
        <div class="form-group col-md-12">
        <label for="fieldNombre" class="">Departamento</label>
        <div>
        <select id="idDepartamento" name="idDepartamento" class="form-control">
        {% for departamento in departamentos %}
        <option value="{{ departamento.idDepartamento }}">{{ departamento.nombre }}</option>
        {% endfor  %}
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
</div> #}

<div style="list-style:none; width:100%" class="col-md-12">
  <div class="col-md-6">
    <div class="form-group col-md-12">
      <label for="fieldNombre" class="">Tipo Persona</label>
      <div>
        {{ select("tipoTecnico", tipotecnico, "class" : "form-control") }}
      </div>
    </div>
  </div>
  <div class="col-md-6">
    <div class="form-group col-md-12">
      <label for="fieldNombre" class="">Estado</label>
      <div>
        {{ select("estado", listaestado, "class" : "form-control") }}
      </div>
    </div>
  </div>
</div>
<div style="list-style:none; width:100%" class="col-md-12">
  <div class="col-md-6">
    <div class="form-group col-md-12">
      <label for="fieldNombre" class="">Contraseña</label>
      <div>
        {{ password_field("contrasena", "size" : 30, "class" : "form-control", "id" : "fieldContrasena") }}
      </div>
    </div>
  </div>
</div>
</div>
<div class="panel-footer">
  <div class="form-group" style="overflow:hidden;text-align:right; padding-right:60px;">
    <div class="col-sm-offset-2 col-sm-10">
      {{ link_to("ortopedista/", "Consultar", "class": "btn btn-primary") }}
      {{ submit_button('Guardar', 'class': 'btn btn-primary') }}
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
  $.get("<?php echo $this->url->get('ortopedista/consultarMunicipios'); ?>/", { "departamento": Departamento}, function(data){

    var municipios = "";
    var Datos = data;
    $.each(Datos, function(index, value){
      municipios += '<option value="'+value.idMunicipio+'">'+
      value.nombre+'</option>';
    });
    $('#municipios').html(municipios);
  });
});
</script>
