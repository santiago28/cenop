
{{ content() }}

<table width="100%">
    <tr>
        <td align="left">
            {{ link_to("actividad/index", "Go Back") }}
        </td>
        <td align="right">
            {{ link_to("actividad/new", "Create ") }}
        </td>
    </tr>
</table>

<table class="browse" align="center">
    <thead>
        <tr>
            <th>IdActividad</th>
            <th>IdOrden</th>
            <th>Codigo</th>
            <th>Version</th>
            <th>Fecha</th>
         </tr>
    </thead>
    <tbody>
    {% if page.items is defined %}
    {% for actividad in page.items %}
        <tr>
            <td>{{ actividad.idActividad }}</td>
            <td>{{ actividad.idOrden }}</td>
            <td>{{ actividad.codigo }}</td>
            <td>{{ actividad.version }}</td>
            <td>{{ actividad.fecha }}</td>
            <td>{{ link_to("actividad/edit/"~actividad.idActividad, "Edit") }}</td>
            <td>{{ link_to("actividad/delete/"~actividad.idActividad, "Delete") }}</td>
        </tr>
    {% endfor %}
    {% endif %}
    </tbody>
    <tbody>
        <tr>
            <td colspan="2" align="right">
                <table align="center">
                    <tr>
                        <td>{{ link_to("actividad/search", "First") }}</td>
                        <td>{{ link_to("actividad/search?page="~page.before, "Previous") }}</td>
                        <td>{{ link_to("actividad/search?page="~page.next, "Next") }}</td>
                        <td>{{ link_to("actividad/search?page="~page.last, "Last") }}</td>
                        <td>{{ page.current~"/"~page.total_pages }}</td>
                    </tr>
                </table>
            </td>
        </tr>
    </tbody>
</table>
