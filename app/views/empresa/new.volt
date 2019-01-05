<div class="container col-xs-12" style="margin-top:40px;">
  <div>
    {{ form("Empresa/create", "method":"post", "autocomplete" : "off", "class" : "form-horizontal") }}
    <div class="panel panel-default">
      <div class="panel-heading">
        <center><h4>Datos Cliente</h4></center>
      </div>
      <div class="panel-body">
        {{ content() }}
        <div style="list-style:none; width:100%" class="col-md-12">
          <div class="col-md-6">
            <div class="form-group col-md-12">
              <label for="fieldNombre" class="">Nombre</label>
              <div>
                {{ text_field("nombre", "size" : 30, "class" : "form-control", "id" : "fieldNombre") }}
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group col-md-12">
              <label for="fieldNombre" class="">Nombre Interno</label>
              <div>
                {{ text_field("nombreInterno", "size" : 30, "class" : "form-control", "id" : "fieldNombreInterno") }}
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
                  {% for departamento in departamentos %}
                  <option value="{{ departamento.idDepartamento }}">{{ departamento.nombre }}</option>
                  {% endfor  %}
                </select>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group col-md-12">
              <label for="fieldNombre" class="">Municipio</label>
              <div>
                <select id="municipios" class="form-control" name="idMunicipio">

                </select>
              </div>
            </div>
          </div>
        </div>
        <div style="list-style:none; width:100%" class="col-md-12">
          <div class="col-md-6">
            <div class="form-group col-md-12">
              <label for="fieldNombre" class="">Teléfono</label>
              <div>
                {{ text_field("telefono", "type" : "numeric", "class" : "form-control", "id" : "fieldTelefono") }}
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group col-md-12">
              <label for="fieldNombre" class="">Nit</label>
              <div>
                {{ text_field("nit", "size" : 30, "class" : "form-control", "id" : "fieldNit") }}
              </div>
            </div>
          </div>
        </div>
        <div style="list-style:none; width:100%" class="col-md-12">
          <div class="col-md-6">
            <div class="form-group col-md-12">
              <label for="fieldNombre" class="">Cedula Representante Legal</label>
              <div>
                {{ text_field("cedulaRepresentante", "size" : 30, "class" : "form-control", "id" : "fieldCedulaRepresentante") }}
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group col-md-12">
              <label for="fieldNombre" class="">Nombre Representante Legal</label>
              <div>
                {{ text_field("representanteLegal", "size" : 30, "class" : "form-control", "id" : "fieldRepresentantelegal") }}
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="panel-footer">
        <div class="form-group" style="overflow:hidden;text-align:right; padding-right:60px;">
          <div class="col-sm-offset-2 col-sm-10">
            {{ link_to("empresa/", "Consultar", "class": "btn btn-primary") }}
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
  $.get("<?php echo $this->url->get('Empresa/consultarMunicipios'); ?>/", { "departamento": Departamento}, function(data){

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
