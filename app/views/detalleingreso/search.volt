<div class="row">
    <nav>
        <ul class="pager">
            <li class="previous">{{ link_to("detalleingreso/index", "Go Back") }}</li>
            <li class="next">{{ link_to("detalleingreso/new", "Create ") }}</li>
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
                <th>IdDetalle</th>
            <th>NombreMaterial</th>
            <th>FechaIngreso</th>
            <th>Lote</th>
            <th>EstadoCalidad</th>
            <th>FechaCaducidad</th>
            <th>Na</th>
            <th>CantidadMateriales</th>
            <th>Certificado</th>
            <th>InformacionProveedor</th>
            <th>Referencia</th>
            <th>Recibe</th>
            <th>Observaciones</th>
            <th>IdIngreso</th>

                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        {% if page.items is defined %}
        {% for detalleingreso in page.items %}
            <tr>
                <td>{{ detalleingreso.idDetalle }}</td>
            <td>{{ detalleingreso.nombreMaterial }}</td>
            <td>{{ detalleingreso.fechaIngreso }}</td>
            <td>{{ detalleingreso.lote }}</td>
            <td>{{ detalleingreso.estadoCalidad }}</td>
            <td>{{ detalleingreso.fechaCaducidad }}</td>
            <td>{{ detalleingreso.na }}</td>
            <td>{{ detalleingreso.cantidadMateriales }}</td>
            <td>{{ detalleingreso.certificado }}</td>
            <td>{{ detalleingreso.informacionProveedor }}</td>
            <td>{{ detalleingreso.referencia }}</td>
            <td>{{ detalleingreso.recibe }}</td>
            <td>{{ detalleingreso.observaciones }}</td>
            <td>{{ detalleingreso.idIngreso }}</td>

                <td>{{ link_to("detalleingreso/edit/"~detalleingreso.idDetalle, "Edit") }}</td>
                <td>{{ link_to("detalleingreso/delete/"~detalleingreso.idDetalle, "Delete") }}</td>
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
                <li>{{ link_to("detalleingreso/search", "First") }}</li>
                <li>{{ link_to("detalleingreso/search?page="~page.before, "Previous") }}</li>
                <li>{{ link_to("detalleingreso/search?page="~page.next, "Next") }}</li>
                <li>{{ link_to("detalleingreso/search?page="~page.last, "Last") }}</li>
            </ul>
        </nav>
    </div>
</div>
