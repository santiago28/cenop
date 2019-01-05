<div class="row">
    <nav>
        <ul class="pager">
            <li class="previous">{{ link_to("agenda", "Go Back") }}</li>
        </ul>
    </nav>
</div>

<div class="page-header">
    <h1>
        Edit agenda
    </h1>
</div>

{{ content() }}

{{ form("agenda/save", "method":"post", "autocomplete" : "off", "class" : "form-horizontal") }}

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


{{ hidden_field("id") }}

<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
        {{ submit_button('Send', 'class': 'btn btn-default') }}
    </div>
</div>

</form>
