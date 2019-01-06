
<div class="container col-xs-12" style="margin-top:40px;">
  <div>
    <div class="panel panel-default">
      <div class="panel-heading">
        <center><h4>Información Pacientes</h4></center>
      </div>
      <div class="panel-body">
        {{ content() }}
        <div class="table-responsive col-md-12">
          <table class="table table-bordered" id="mytable">
            <thead>
              <tr>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Tipo Documento</th>
                <th>Numero Documento</th>
                <th>Teléfono</th>
                <th>Celular</th>
                <th>Municipio</th>
                <th>Dirección</th>
                <th></th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              {% if pacientes is defined %}
              {% for paciente in pacientes %}
              <tr>
                <td>{{ paciente.nombre }}</td>
                <td>{{ paciente.apellido }}</td>
                <td>{{ paciente.getTipoDocumento() }}</td>
                <td>{{ paciente.numeroDocumento }}</td>
                <td>{{ paciente.telefono }}</td>
                <td>{{ paciente.celular }}</td>
                <td>{{ paciente.getMunicipio() }}</td>
                <td>{{ paciente.direccion }}</td>
                <td>{{ link_to("paciente/edit/"~paciente.idPaciente, "&#xE254;", 'class':'material-icons', 'style': 'color:#757575; text-decoration: none;') }}</td>
                <td>{{ link_to("paciente/delete/"~paciente.idPaciente, "&#xE872;", 'class':'material-icons', 'style': 'color:#757575; text-decoration: none;') }}</td>
              </tr>
              {% endfor %}
              {% endif %}
            </tbody>
          </table>
        </div>

      </div>
      <div class="panel-footer">
        <div class="form-group" style="overflow:hidden;text-align:right;">
          <div class="col-sm-offset-2 col-sm-10">
            {{ link_to("paciente/new", "Registrar Paciente", "class": "btn btn-primary") }}
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
$(document).ready( function () {
    $('#mytable').DataTable({
      "language":{
        "url" :"//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
      },
      paging: false
    });
});
</script>
