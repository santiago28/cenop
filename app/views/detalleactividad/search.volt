
{{ content() }}

<table width="100%">
    <tr>
        <td align="left">
            {{ link_to("detalleactividad/index", "Go Back") }}
        </td>
        <td align="right">
            {{ link_to("detalleactividad/new", "Create ") }}
        </td>
    </tr>
</table>

<table class="browse" align="center">
    <thead>
        <tr>
            <th>IdDetalle</th>
            <th>IdActividad</th>
            <th>Nombreactividad</th>
            <th>Dato</th>
            <th>Observacion</th>
         </tr>
    </thead>
    <tbody>
    {% if page.items is defined %}
    {% for detalleactividad in page.items %}
        <tr>
            <td>{{ detalleactividad.idDetalle }}</td>
            <td>{{ detalleactividad.idActividad }}</td>
            <td>{{ detalleactividad.nombreactividad }}</td>
            <td>{{ detalleactividad.dato }}</td>
            <td>{{ detalleactividad.observacion }}</td>
            <td>{{ link_to("detalleactividad/edit/"~detalleactividad.idDetalle, "Edit") }}</td>
            <td>{{ link_to("detalleactividad/delete/"~detalleactividad.idDetalle, "Delete") }}</td>
        </tr>
    {% endfor %}
    {% endif %}
    </tbody>
    <tbody>
        <tr>
            <td colspan="2" align="right">
                <table align="center">
                    <tr>
                        <td>{{ link_to("detalleactividad/search", "First") }}</td>
                        <td>{{ link_to("detalleactividad/search?page="~page.before, "Previous") }}</td>
                        <td>{{ link_to("detalleactividad/search?page="~page.next, "Next") }}</td>
                        <td>{{ link_to("detalleactividad/search?page="~page.last, "Last") }}</td>
                        <td>{{ page.current~"/"~page.total_pages }}</td>
                    </tr>
                </table>
            </td>
        </tr>
    </tbody>
</table>
