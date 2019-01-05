<div class="page-header">
    <h1>
        Search Empresa
    </h1>
    <p>
        {{ link_to("Empresa/new", "Create Empresa") }}
    </p>
</div>

{{ content() }}

{{ form("Empresa/search", "method":"post", "autocomplete" : "off", "class" : "form-horizontal") }}

<div class="form-group">
    <label for="fieldIdempresa" class="col-sm-2 control-label">IdEmpresa</label>
    <div class="col-sm-10">
        {{ text_field("idEmpresa", "type" : "numeric", "class" : "form-control", "id" : "fieldIdempresa") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldNombre" class="col-sm-2 control-label">Nombre</label>
    <div class="col-sm-10">
        {{ text_field("nombre", "size" : 30, "class" : "form-control", "id" : "fieldNombre") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldNit" class="col-sm-2 control-label">Nit</label>
    <div class="col-sm-10">
        {{ text_field("nit", "size" : 30, "class" : "form-control", "id" : "fieldNit") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldIdmunicipio" class="col-sm-2 control-label">IdMunicipio</label>
    <div class="col-sm-10">
        {{ text_field("idMunicipio", "type" : "numeric", "class" : "form-control", "id" : "fieldIdmunicipio") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldTelefono" class="col-sm-2 control-label">Telefono</label>
    <div class="col-sm-10">
        {{ text_field("telefono", "type" : "numeric", "class" : "form-control", "id" : "fieldTelefono") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldRepresentantelegal" class="col-sm-2 control-label">RepresentanteLegal</label>
    <div class="col-sm-10">
        {{ text_field("representanteLegal", "size" : 30, "class" : "form-control", "id" : "fieldRepresentantelegal") }}
    </div>
</div>


<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
        {{ submit_button('Search', 'class': 'btn btn-default') }}
    </div>
</div>

</form>
