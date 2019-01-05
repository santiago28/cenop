<div class="row">
    <nav>
        <ul class="pager">
            <li class="previous">{{ link_to("detalleingreso", "Go Back") }}</li>
        </ul>
    </nav>
</div>

<div class="page-header">
    <h1>
        Create detalleingreso
    </h1>
</div>

{{ content() }}

{{ form("detalleingreso/create", "method":"post", "autocomplete" : "off", "class" : "form-horizontal") }}

<div class="form-group">
    <label for="fieldNombrematerial" class="col-sm-2 control-label">NombreMaterial</label>
    <div class="col-sm-10">
        {{ text_field("nombreMaterial", "size" : 30, "class" : "form-control", "id" : "fieldNombrematerial") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldFechaingreso" class="col-sm-2 control-label">FechaIngreso</label>
    <div class="col-sm-10">
        {{ text_field("fechaIngreso", "type" : "date", "class" : "form-control", "id" : "fieldFechaingreso") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldLote" class="col-sm-2 control-label">Lote</label>
    <div class="col-sm-10">
        {{ text_field("lote", "size" : 30, "class" : "form-control", "id" : "fieldLote") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldEstadocalidad" class="col-sm-2 control-label">EstadoCalidad</label>
    <div class="col-sm-10">
        {{ text_field("estadoCalidad", "type" : "numeric", "class" : "form-control", "id" : "fieldEstadocalidad") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldFechacaducidad" class="col-sm-2 control-label">FechaCaducidad</label>
    <div class="col-sm-10">
        {{ text_field("fechaCaducidad", "type" : "date", "class" : "form-control", "id" : "fieldFechacaducidad") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldNa" class="col-sm-2 control-label">Na</label>
    <div class="col-sm-10">
        {{ text_field("na", "size" : 30, "class" : "form-control", "id" : "fieldNa") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldCantidadmateriales" class="col-sm-2 control-label">CantidadMateriales</label>
    <div class="col-sm-10">
        {{ text_field("cantidadMateriales", "type" : "numeric", "class" : "form-control", "id" : "fieldCantidadmateriales") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldCertificado" class="col-sm-2 control-label">Certificado</label>
    <div class="col-sm-10">
        {{ text_field("certificado", "size" : 30, "class" : "form-control", "id" : "fieldCertificado") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldInformacionproveedor" class="col-sm-2 control-label">InformacionProveedor</label>
    <div class="col-sm-10">
        {{ text_field("informacionProveedor", "size" : 30, "class" : "form-control", "id" : "fieldInformacionproveedor") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldReferencia" class="col-sm-2 control-label">Referencia</label>
    <div class="col-sm-10">
        {{ text_field("referencia", "size" : 30, "class" : "form-control", "id" : "fieldReferencia") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldRecibe" class="col-sm-2 control-label">Recibe</label>
    <div class="col-sm-10">
        {{ text_field("recibe", "size" : 30, "class" : "form-control", "id" : "fieldRecibe") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldObservaciones" class="col-sm-2 control-label">Observaciones</label>
    <div class="col-sm-10">
        {{ text_area("observaciones", "cols": "30", "rows": "4", "class" : "form-control", "id" : "fieldObservaciones") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldIdingreso" class="col-sm-2 control-label">IdIngreso</label>
    <div class="col-sm-10">
        {{ text_field("idIngreso", "type" : "numeric", "class" : "form-control", "id" : "fieldIdingreso") }}
    </div>
</div>


<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
        {{ submit_button('Save', 'class': 'btn btn-default') }}
    </div>
</div>

</form>
