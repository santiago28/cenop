<div class="page-header">
    <h1>
        Search ortopedista
    </h1>
    <p>
        {{ link_to("ortopedista/new", "Create ortopedista") }}
    </p>
</div>

{{ content() }}

{{ form("ortopedista/search", "method":"post", "autocomplete" : "off", "class" : "form-horizontal") }}

<div class="form-group">
    <label for="fieldIdortopedista" class="col-sm-2 control-label">IdOrtopedista</label>
    <div class="col-sm-10">
        {{ text_field("idOrtopedista", "type" : "numeric", "class" : "form-control", "id" : "fieldIdortopedista") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldNombre" class="col-sm-2 control-label">Nombre</label>
    <div class="col-sm-10">
        {{ text_field("nombre", "size" : 30, "class" : "form-control", "id" : "fieldNombre") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldApellido" class="col-sm-2 control-label">Apellido</label>
    <div class="col-sm-10">
        {{ text_field("apellido", "size" : 30, "class" : "form-control", "id" : "fieldApellido") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldTipodocumento" class="col-sm-2 control-label">TipoDocumento</label>
    <div class="col-sm-10">
        {{ text_field("tipoDocumento", "type" : "numeric", "class" : "form-control", "id" : "fieldTipodocumento") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldNumerodocumento" class="col-sm-2 control-label">NumeroDocumento</label>
    <div class="col-sm-10">
        {{ text_field("numeroDocumento", "size" : 30, "class" : "form-control", "id" : "fieldNumerodocumento") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldTelefono" class="col-sm-2 control-label">Telefono</label>
    <div class="col-sm-10">
        {{ text_field("telefono", "size" : 30, "class" : "form-control", "id" : "fieldTelefono") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldCelular" class="col-sm-2 control-label">Celular</label>
    <div class="col-sm-10">
        {{ text_field("celular", "size" : 30, "class" : "form-control", "id" : "fieldCelular") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldIdmunicipio" class="col-sm-2 control-label">IdMunicipio</label>
    <div class="col-sm-10">
        {{ text_field("idMunicipio", "type" : "numeric", "class" : "form-control", "id" : "fieldIdmunicipio") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldDireccion" class="col-sm-2 control-label">Direccion</label>
    <div class="col-sm-10">
        {{ text_field("direccion", "size" : 30, "class" : "form-control", "id" : "fieldDireccion") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldEdad" class="col-sm-2 control-label">Edad</label>
    <div class="col-sm-10">
        {{ text_field("edad", "type" : "numeric", "class" : "form-control", "id" : "fieldEdad") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldEstatura" class="col-sm-2 control-label">Estatura</label>
    <div class="col-sm-10">
        {{ text_field("estatura", "size" : 30, "class" : "form-control", "id" : "fieldEstatura") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldPeso" class="col-sm-2 control-label">Peso</label>
    <div class="col-sm-10">
        {{ text_field("peso", "size" : 30, "class" : "form-control", "id" : "fieldPeso") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldIdusuario" class="col-sm-2 control-label">IdUsuario</label>
    <div class="col-sm-10">
        {{ text_field("idUsuario", "type" : "numeric", "class" : "form-control", "id" : "fieldIdusuario") }}
    </div>
</div>


<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
        {{ submit_button('Search', 'class': 'btn btn-default') }}
    </div>
</div>

</form>
