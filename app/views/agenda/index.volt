<div class="page-header">
    <h1>
        Search agenda
    </h1>
    <p>
        {{ link_to("agenda/new", "Create agenda") }}
    </p>
</div>

{{ content() }}

{{ form("agenda/search", "method":"post", "autocomplete" : "off", "class" : "form-horizontal") }}

<div class="form-group">
    <label for="fieldIdagenda" class="col-sm-2 control-label">IdAgenda</label>
    <div class="col-sm-10">
        {{ text_field("IdAgenda", "type" : "numeric", "class" : "form-control", "id" : "fieldIdagenda") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldIdpaciente" class="col-sm-2 control-label">IdPaciente</label>
    <div class="col-sm-10">
        {{ text_field("IdPaciente", "type" : "numeric", "class" : "form-control", "id" : "fieldIdpaciente") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldIdortopedista" class="col-sm-2 control-label">IdOrtopedista</label>
    <div class="col-sm-10">
        {{ text_field("IdOrtopedista", "type" : "numeric", "class" : "form-control", "id" : "fieldIdortopedista") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldFechacita" class="col-sm-2 control-label">FechaCita</label>
    <div class="col-sm-10">
        {{ text_field("FechaCita", "type" : "date", "class" : "form-control", "id" : "fieldFechacita") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldHoracita" class="col-sm-2 control-label">HoraCita</label>
    <div class="col-sm-10">
        {{ text_field("HoraCita", "size" : 30, "class" : "form-control", "id" : "fieldHoracita") }}
    </div>
</div>


<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
        {{ submit_button('Search', 'class': 'btn btn-default') }}
    </div>
</div>

</form>
