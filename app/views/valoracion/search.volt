
{{ content() }}

<table width="100%">
    <tr>
        <td align="left">
            {{ link_to("valoracion/index", "Go Back") }}
        </td>
        <td align="right">
            {{ link_to("valoracion/new", "Create ") }}
        </td>
    </tr>
</table>

<table class="browse" align="center">
    <thead>
        <tr>
            <th>IdValoracion</th>
            <th>IdOrden</th>
            <th>Codigo</th>
            <th>Version</th>
            <th>Fechaversion</th>
            <th>Fecha</th>
            <th>Diagnostico</th>
            <th>Antpersonales</th>
            <th>Antfamiliares</th>
            <th>Fechaamputacion</th>
            <th>Lado</th>
            <th>Nivelactividad</th>
            <th>Causaamputacion</th>
            <th>Formulamedica</th>
            <th>Ayudaexterna</th>
            <th>Cualayuda</th>
            <th>Equilibrioestatico</th>
            <th>Equilibriodinamico</th>
            <th>IdOrtopedista</th>
         </tr>
    </thead>
    <tbody>
    {% if page.items is defined %}
    {% for valoracion in page.items %}
        <tr>
            <td>{{ valoracion.idValoracion }}</td>
            <td>{{ valoracion.idOrden }}</td>
            <td>{{ valoracion.codigo }}</td>
            <td>{{ valoracion.version }}</td>
            <td>{{ valoracion.fechaversion }}</td>
            <td>{{ valoracion.fecha }}</td>
            <td>{{ valoracion.diagnostico }}</td>
            <td>{{ valoracion.antpersonales }}</td>
            <td>{{ valoracion.antfamiliares }}</td>
            <td>{{ valoracion.fechaamputacion }}</td>
            <td>{{ valoracion.lado }}</td>
            <td>{{ valoracion.nivelactividad }}</td>
            <td>{{ valoracion.causaamputacion }}</td>
            <td>{{ valoracion.formulamedica }}</td>
            <td>{{ valoracion.ayudaexterna }}</td>
            <td>{{ valoracion.cualayuda }}</td>
            <td>{{ valoracion.equilibrioestatico }}</td>
            <td>{{ valoracion.equilibriodinamico }}</td>
            <td>{{ valoracion.idOrtopedista }}</td>
            <td>{{ link_to("valoracion/edit/"~valoracion.idValoracion, "Edit") }}</td>
            <td>{{ link_to("valoracion/delete/"~valoracion.idValoracion, "Delete") }}</td>
        </tr>
    {% endfor %}
    {% endif %}
    </tbody>
    <tbody>
        <tr>
            <td colspan="2" align="right">
                <table align="center">
                    <tr>
                        <td>{{ link_to("valoracion/search", "First") }}</td>
                        <td>{{ link_to("valoracion/search?page="~page.before, "Previous") }}</td>
                        <td>{{ link_to("valoracion/search?page="~page.next, "Next") }}</td>
                        <td>{{ link_to("valoracion/search?page="~page.last, "Last") }}</td>
                        <td>{{ page.current~"/"~page.total_pages }}</td>
                    </tr>
                </table>
            </td>
        </tr>
    </tbody>
</table>
