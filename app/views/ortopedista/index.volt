
<div class="container col-xs-12" style="margin-top:40px;">
  <div>
    <div class="panel panel-default">
      <div class="panel-heading">
        <center><h4>Información Técnico - Ortopedista</h4></center>
      </div>
      <div class="panel-body">
        {{ content() }}
        <div class="table-responsive col-md-10" style="border-radius: 5px;width: 100%;margin: 0px auto; float: none;">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Tipo Documento</th>
                <th>Numero Documento</th>
                <th>Teléfono</th>
                <th>Celular</th>
                {# <th>Municipio</th> #}
                <th></th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              {% if ortopedistas is defined %}
              {% for ortopedista in ortopedistas %}
              <tr>
                <td>{{ ortopedista.nombre }}</td>
                <td>{{ ortopedista.apellido }}</td>
                <td>{{ ortopedista.getTipoDocumento() }}</td>
                <td>{{ ortopedista.numeroDocumento }}</td>
                <td>{{ ortopedista.telefono }}</td>
                <td>{{ ortopedista.celular }}</td>
                {# <td>{{ ortopedista.getMunicipio() }}</td> #}

                <td>{{ link_to("ortopedista/edit/"~ortopedista.idOrtopedista, "&#xE254;", 'class':'material-icons', 'style': 'color:#757575; text-decoration: none;') }}</td>
                <td>{{ link_to("ortopedista/delete/"~ortopedista.idOrtopedista, "&#xE872;", 'class':'material-icons', 'style': 'color:#757575; text-decoration: none;') }}</td>
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
            {{ link_to("ortopedista/new", "Registrar Ortopedista", "class": "btn btn-primary") }}
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
