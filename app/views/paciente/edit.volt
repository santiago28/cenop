<div class="container col-xs-12" style="margin-top:40px;">
  <style media="screen">

  </style>
  <div>
    {{ form("paciente/save", "method":"post", "autocomplete" : "off", "class" : "form-horizontal") }}
    {{ hidden_field("idPaciente") }}
    <div class="panel panel-default">
      <div class="panel-heading">
        <center><h4>Editar Paciente</h4></center>
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
        <div style="list-style:none; width:100%" class="col-md-12">
          <div class="col-md-6">
            <div class="form-group col-md-12">
              <label for="fieldNombre" class="">Departamento</label>
              <div>
                {# <select id="idDepartamento" name="idDepartamento" class="form-control">
                {% for departamento in departamentos %}
                <option value="{{ departamento.idDepartamento }}">{{ departamento.nombre }}</option>
                {% endfor  %}
              </select> #}
              {{ select("idDepartamento", departamentos, "class" : "form-control") }}
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group col-md-12">
            <label for="fieldApellido">Municipio</label>
            {{ select("idMunicipio", municipios, "class" : "form-control") }}
          </div>
        </div>
      </div>
      <div style="list-style:none; width:100%" class="col-md-12">
        <div class="col-md-6">
          <div class="form-group col-md-12">
            <label for="fieldNombre" class="">Dirección</label>
            <div>
              {{ text_field("direccion", "size" : 30, "class" : "form-control", "id" : "fieldDireccion") }}
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group col-md-12">
            <label for="fieldApellido">Edad</label>
            <div>
              {{ text_field("edad", "type" : "numeric", "class" : "form-control", "id" : "fieldEdad") }}
            </div>
          </div>
        </div>
      </div>
      <div style="list-style:none; width:100%" class="col-md-12">
        <div class="col-md-6">
          <div class="form-group col-md-12">
            <label for="fieldNombre" class="">Estatura</label>
            <div>
              {{ text_field("estatura", "size" : 30, "class" : "form-control", "id" : "fieldEstatura") }}
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group col-md-12">
            <label for="fieldApellido">Peso</label>
            <div>
              {{ text_field("peso", "size" : 30, "class" : "form-control", "id" : "fieldPeso") }}
            </div>
          </div>
        </div>
        {% if firma != "" %}
        <div style="list-style:none; width:100%" class="col-md-12">
          <div class="col-md-6">
            <div class="form-group">
              <label>Foto Firma</label>
              <div class="">
                <img src="{{firma}}" class="col-md-6">
              </div>
            </div>
          </div>
        </div>
        {% endif %}
        <div class="col-md-6" style="display:none;">
          <div class="form-group col-md-12">
            <label>Firma</label>
            <div class="input-group">
              {{ text_field("firma", "class" : "form-control", "id" : "fieldFirma") }}
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
          <button type="button" name="button" class="btn btn-primary" id="DescargarFirma">Subir Firma Paciente</button>
          <button type="button" name="button" class="btn btn-danger" id="LimpiarFirma">Limpiar Firma</button>
        </div>
      </div>
    </div>
    <div class="panel-footer">
      <div class="form-group" style="overflow:hidden;text-align:right; padding-right:60px;">
        <div class="col-sm-offset-2 col-sm-10">
          {{ link_to("paciente/", "Consultar", "class": "btn btn-primary") }}
          {{ submit_button('Guardar', 'class': 'btn btn-primary') }}
        </div>
      </div>
    </div>
  </div>
</form>
</div>
</div>

<div id="ModalFirma" class="modal fade" role="dialog">
  <div class="modal-dialog" style="width:90%;">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Agregar Firma</h4>
      </div>
      <div class="modal-body">

      </div>
    </div>
  </div>
</div>
{{ assets.outputJs() }}
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

$("#AgregarFirma").click(function(){
  signatureCapture();
  $("#canvas").show();
  $("#divboton").show();
});

$("#LimpiarFirma").click(function(){
  var canvas = document.getElementById("newSignature");
  var ctx = canvas.getContext("2d");
  ctx.clearRect(0, 0, 1000, 180);
});

</script>
