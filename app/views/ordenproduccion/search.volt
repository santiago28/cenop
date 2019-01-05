<div class="row">
    <nav>
        <ul class="pager">
            <li class="previous">{{ link_to("ordenproduccion/index", "Go Back") }}</li>
            <li class="next">{{ link_to("ordenproduccion/new", "Create ") }}</li>
        </ul>
    </nav>
</div>

<div class="page-header">
    <h1>Search result</h1>
</div>

{{ content() }}

<div class="row">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>IdOrden</th>
            <th>IdEmpresa</th>
            <th>IdPaciente</th>
            <th>DoctorRemite</th>
            <th>CodigoLicencia</th>
            <th>AutorizacionServicio</th>
            <th>Formula</th>
            <th>HistoriaClinica</th>
            <th>Cedula</th>
            <th>CedulaAcudiente</th>
            <th>Copa</th>
            <th>FechaAutorizacion</th>
            <th>VencimientoAutorizacion</th>
            <th>NroFactura</th>
            <th>Elaboro</th>
            <th>ResponsableAprobacion</th>
            <th>Recibe</th>
            <th>FechaRecibido</th>
            <th>IdMateriaPrima</th>
            <th>IdSeguimientoUsuario</th>
            <th>IdEntrenamiento</th>
            <th>HistoriaClinicaTexto</th>

                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        {% if page.items is defined %}
        {% for ordenproduccion in page.items %}
            <tr>
                <td>{{ ordenproduccion.idOrden }}</td>
            <td>{{ ordenproduccion.idEmpresa }}</td>
            <td>{{ ordenproduccion.idPaciente }}</td>
            <td>{{ ordenproduccion.doctorRemite }}</td>
            <td>{{ ordenproduccion.codigoLicencia }}</td>
            <td>{{ ordenproduccion.autorizacionServicio }}</td>
            <td>{{ ordenproduccion.formula }}</td>
            <td>{{ ordenproduccion.historiaClinica }}</td>
            <td>{{ ordenproduccion.cedula }}</td>
            <td>{{ ordenproduccion.cedulaAcudiente }}</td>
            <td>{{ ordenproduccion.copa }}</td>
            <td>{{ ordenproduccion.fechaAutorizacion }}</td>
            <td>{{ ordenproduccion.vencimientoAutorizacion }}</td>
            <td>{{ ordenproduccion.nroFactura }}</td>
            <td>{{ ordenproduccion.Elaboro }}</td>
            <td>{{ ordenproduccion.responsableAprobacion }}</td>
            <td>{{ ordenproduccion.recibe }}</td>
            <td>{{ ordenproduccion.fechaRecibido }}</td>
            <td>{{ ordenproduccion.idMateriaPrima }}</td>
            <td>{{ ordenproduccion.idSeguimientoUsuario }}</td>
            <td>{{ ordenproduccion.idEntrenamiento }}</td>
            <td>{{ ordenproduccion.historiaClinicaTexto }}</td>

                <td>{{ link_to("ordenproduccion/edit/"~ordenproduccion.idOrden, "Edit") }}</td>
                <td>{{ link_to("ordenproduccion/delete/"~ordenproduccion.idOrden, "Delete") }}</td>
            </tr>
        {% endfor %}
        {% endif %}
        </tbody>
    </table>
</div>

<div class="row">
    <div class="col-sm-1">
        <p class="pagination" style="line-height: 1.42857;padding: 6px 12px;">
            {{ page.current~"/"~page.total_pages }}
        </p>
    </div>
    <div class="col-sm-11">
        <nav>
            <ul class="pagination">
                <li>{{ link_to("ordenproduccion/search", "First") }}</li>
                <li>{{ link_to("ordenproduccion/search?page="~page.before, "Previous") }}</li>
                <li>{{ link_to("ordenproduccion/search?page="~page.next, "Next") }}</li>
                <li>{{ link_to("ordenproduccion/search?page="~page.last, "Last") }}</li>
            </ul>
        </nav>
    </div>
</div>
