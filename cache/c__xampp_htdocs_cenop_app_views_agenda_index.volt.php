<div class="page-header">
    <h1>
        Search agenda
    </h1>
    <p>
        <?= $this->tag->linkTo(['agenda/new', 'Create agenda']) ?>
    </p>
</div>

<?= $this->getContent() ?>

<?= $this->tag->form(['agenda/search', 'method' => 'post', 'autocomplete' => 'off', 'class' => 'form-horizontal']) ?>

<div class="form-group">
    <label for="fieldIdagenda" class="col-sm-2 control-label">IdAgenda</label>
    <div class="col-sm-10">
        <?= $this->tag->textField(['IdAgenda', 'type' => 'numeric', 'class' => 'form-control', 'id' => 'fieldIdagenda']) ?>
    </div>
</div>

<div class="form-group">
    <label for="fieldIdpaciente" class="col-sm-2 control-label">IdPaciente</label>
    <div class="col-sm-10">
        <?= $this->tag->textField(['IdPaciente', 'type' => 'numeric', 'class' => 'form-control', 'id' => 'fieldIdpaciente']) ?>
    </div>
</div>

<div class="form-group">
    <label for="fieldIdortopedista" class="col-sm-2 control-label">IdOrtopedista</label>
    <div class="col-sm-10">
        <?= $this->tag->textField(['IdOrtopedista', 'type' => 'numeric', 'class' => 'form-control', 'id' => 'fieldIdortopedista']) ?>
    </div>
</div>

<div class="form-group">
    <label for="fieldFechacita" class="col-sm-2 control-label">FechaCita</label>
    <div class="col-sm-10">
        <?= $this->tag->textField(['FechaCita', 'type' => 'date', 'class' => 'form-control', 'id' => 'fieldFechacita']) ?>
    </div>
</div>

<div class="form-group">
    <label for="fieldHoracita" class="col-sm-2 control-label">HoraCita</label>
    <div class="col-sm-10">
        <?= $this->tag->textField(['HoraCita', 'size' => 30, 'class' => 'form-control', 'id' => 'fieldHoracita']) ?>
    </div>
</div>


<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
        <?= $this->tag->submitButton(['Search', 'class' => 'btn btn-default']) ?>
    </div>
</div>

</form>
