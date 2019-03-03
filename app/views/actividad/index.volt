
{{ content() }}

<div align="right">
    {{ link_to("actividad/new", "Create actividad") }}
</div>

{{ form("actividad/search", "method":"post", "autocomplete" : "off") }}

<div align="center">
    <h1>Search actividad</h1>
</div>

<table>
    <tr>
        <td align="right">
            <label for="idActividad">IdActividad</label>
        </td>
        <td align="left">
            {{ text_field("idActividad", "type" : "numeric") }}
        </td>
    </tr>
    <tr>
        <td align="right">
            <label for="idOrden">IdOrden</label>
        </td>
        <td align="left">
            {{ text_field("idOrden", "type" : "numeric") }}
        </td>
    </tr>
    <tr>
        <td align="right">
            <label for="codigo">Codigo</label>
        </td>
        <td align="left">
            {{ text_field("codigo", "size" : 30) }}
        </td>
    </tr>
    <tr>
        <td align="right">
            <label for="version">Version</label>
        </td>
        <td align="left">
            {{ text_field("version", "size" : 30) }}
        </td>
    </tr>
    <tr>
        <td align="right">
            <label for="fecha">Fecha</label>
        </td>
        <td align="left">
                {{ text_field("fecha", "type" : "date") }}
        </td>
    </tr>

    <tr>
        <td></td>
        <td>{{ submit_button("Search") }}</td>
    </tr>
</table>

</form>
