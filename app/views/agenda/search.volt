<div class="row">
    <nav>
        <ul class="pager">
            <li class="previous">{{ link_to("agenda/index", "Go Back") }}</li>
            <li class="next">{{ link_to("agenda/new", "Create ") }}</li>
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
                <th>IdAgenda</th>
            <th>IdPaciente</th>
            <th>IdOrtopedista</th>
            <th>FechaCita</th>
            <th>HoraCita</th>

                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        {% if page.items is defined %}
        {% for agenda in page.items %}
            <tr>
                <td>{{ agenda.IdAgenda }}</td>
            <td>{{ agenda.IdPaciente }}</td>
            <td>{{ agenda.IdOrtopedista }}</td>
            <td>{{ agenda.FechaCita }}</td>
            <td>{{ agenda.HoraCita }}</td>

                <td>{{ link_to("agenda/edit/"~agenda.IdAgenda, "Edit") }}</td>
                <td>{{ link_to("agenda/delete/"~agenda.IdAgenda, "Delete") }}</td>
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
                <li>{{ link_to("agenda/search", "First") }}</li>
                <li>{{ link_to("agenda/search?page="~page.before, "Previous") }}</li>
                <li>{{ link_to("agenda/search?page="~page.next, "Next") }}</li>
                <li>{{ link_to("agenda/search?page="~page.last, "Last") }}</li>
            </ul>
        </nav>
    </div>
</div>
