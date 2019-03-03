
{{ form("actividad/create", "method":"post") }}

<table width="100%">
    <tr>
        <td align="left">{{ link_to("actividad", "Go Back") }}</td>
        <td align="right">{{ submit_button("Save") }}</td>
    </tr>
</table>

{{ content() }}

<div align="center">
    <h1>Create actividad</h1>
</div>

<table>
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
        <td>{{ submit_button("Save") }}</td>
    </tr>
</table>

</form>
