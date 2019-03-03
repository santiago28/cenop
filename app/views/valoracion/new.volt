
{{ form("valoracion/create", "method":"post") }}

<table width="100%">
    <tr>
        <td align="left">{{ link_to("valoracion", "Go Back") }}</td>
        <td align="right">{{ submit_button("Save") }}</td>
    </tr>
</table>

{{ content() }}

<div align="center">
    <h1>Create valoracion</h1>
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
            <label for="fechaversion">Fechaversion</label>
        </td>
        <td align="left">
                {{ text_field("fechaversion", "type" : "date") }}
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
        <td align="right">
            <label for="diagnostico">Diagnostico</label>
        </td>
        <td align="left">
            {{ text_field("diagnostico", "size" : 30) }}
        </td>
    </tr>
    <tr>
        <td align="right">
            <label for="antpersonales">Antpersonales</label>
        </td>
        <td align="left">
            {{ text_field("antpersonales", "size" : 30) }}
        </td>
    </tr>
    <tr>
        <td align="right">
            <label for="antfamiliares">Antfamiliares</label>
        </td>
        <td align="left">
            {{ text_field("antfamiliares", "size" : 30) }}
        </td>
    </tr>
    <tr>
        <td align="right">
            <label for="fechaamputacion">Fechaamputacion</label>
        </td>
        <td align="left">
                {{ text_field("fechaamputacion", "type" : "date") }}
        </td>
    </tr>
    <tr>
        <td align="right">
            <label for="lado">Lado</label>
        </td>
        <td align="left">
            {{ text_field("lado", "type" : "numeric") }}
        </td>
    </tr>
    <tr>
        <td align="right">
            <label for="nivelactividad">Nivelactividad</label>
        </td>
        <td align="left">
            {{ text_field("nivelactividad", "type" : "numeric") }}
        </td>
    </tr>
    <tr>
        <td align="right">
            <label for="causaamputacion">Causaamputacion</label>
        </td>
        <td align="left">
            {{ text_field("causaamputacion", "size" : 30) }}
        </td>
    </tr>
    <tr>
        <td align="right">
            <label for="formulamedica">Formulamedica</label>
        </td>
        <td align="left">
            {{ text_field("formulamedica", "size" : 30) }}
        </td>
    </tr>
    <tr>
        <td align="right">
            <label for="ayudaexterna">Ayudaexterna</label>
        </td>
        <td align="left">
            {{ text_field("ayudaexterna", "size" : 30) }}
        </td>
    </tr>
    <tr>
        <td align="right">
            <label for="cualayuda">Cualayuda</label>
        </td>
        <td align="left">
            {{ text_field("cualayuda", "size" : 30) }}
        </td>
    </tr>
    <tr>
        <td align="right">
            <label for="equilibrioestatico">Equilibrioestatico</label>
        </td>
        <td align="left">
            {{ text_field("equilibrioestatico", "size" : 30) }}
        </td>
    </tr>
    <tr>
        <td align="right">
            <label for="equilibriodinamico">Equilibriodinamico</label>
        </td>
        <td align="left">
            {{ text_field("equilibriodinamico", "size" : 30) }}
        </td>
    </tr>
    <tr>
        <td align="right">
            <label for="idOrtopedista">IdOrtopedista</label>
        </td>
        <td align="left">
            {{ text_field("idOrtopedista", "type" : "numeric") }}
        </td>
    </tr>

    <tr>
        <td></td>
        <td>{{ submit_button("Save") }}</td>
    </tr>
</table>

</form>
