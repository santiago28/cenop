
{{ form("detalleactividad/create", "method":"post") }}

<table width="100%">
    <tr>
        <td align="left">{{ link_to("detalleactividad", "Go Back") }}</td>
        <td align="right">{{ submit_button("Save") }}</td>
    </tr>
</table>

{{ content() }}

<div align="center">
    <h1>Create detalleactividad</h1>
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
            <label for="nombreactividad">Nombreactividad</label>
        </td>
        <td align="left">
            {{ text_field("nombreactividad", "size" : 30) }}
        </td>
    </tr>
    <tr>
        <td align="right">
            <label for="dato">Dato</label>
        </td>
        <td align="left">
            {{ text_field("dato", "type" : "numeric") }}
        </td>
    </tr>
    <tr>
        <td align="right">
            <label for="observacion">Observacion</label>
        </td>
        <td align="left">
            {{ text_field("observacion", "size" : 30) }}
        </td>
    </tr>

    <tr>
        <td></td>
        <td>{{ submit_button("Save") }}</td>
    </tr>
</table>

</form>
