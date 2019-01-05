<div class="container col-xs-12" style="margin-top:40px;">
  <div>
    <div class="panel panel-default">
      <div class="panel-heading">
        <center><h4>Información Cliente</h4></center>
      </div>
      <div class="panel-body">
        {{ content() }}
        <div class="table-responsive col-md-10" style="border-radius: 5px;width: 100%;margin: 0px auto; float: none;">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>Nombre</th>
                <th>Nombre Interno</th>
                <th>Nit</th>
                <th>Municipio</th>
                <th>Teléfono</th>
                <th>Número Ingreso</th>
                <th>Representante Legal</th>
                <th></th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              {% if empresas is defined %}
              {% for empresa in empresas %}
              <tr>
                <td>{{ empresa.nombre }}</td>
                <td>{{ empresa.nombreInterno }}</td>
                <td>{{ empresa.nit }}</td>
                <td>{{ empresa.getMunicipio() }}</td>
                <td>{{ empresa.telefono }}</td>
                <td>{{ empresa.cedulaRepresentante }}</td>
                <td>{{ empresa.representanteLegal }}</td>
                <td>{{ link_to("empresa/edit/"~empresa.idEmpresa, "&#xE254;", 'class':'material-icons', 'style': 'color:#757575; text-decoration: none;') }}</td>
                <td>{{ link_to("empresa/delete/"~empresa.idEmpresa, "&#xE872;", 'class':'material-icons', 'style': 'color:#757575; text-decoration: none;') }}</td>
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
            {{ link_to("empresa/new", "Registrar Cliente", "class": "btn btn-primary") }}
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
