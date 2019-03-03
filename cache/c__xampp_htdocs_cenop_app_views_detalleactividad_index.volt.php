<div class="container col-xs-12" style="margin-top:40px;">
  <div>
    <div class="panel panel-default">
      <div class="panel-heading">
        <center><h4>Registro de Actividades al Usuario</h4></center>
      </div>
      <div class="panel-body">
        <?= $this->getContent() ?>
        <div class="table-responsive col-md-10" style="border-radius: 5px;width: 100%;margin: 0px auto; float: none;">
          <table class="table table-bordered" id="mytable">
            <thead>
              <tr>
                <th>OP</th>
                <th>Nombre Paciente</th>
                <th>Código</th>
                <th>Versión</th>
                <th>Fecha</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <?php if (isset($listaactividad)) { ?>
              <?php foreach ($listaactividad as $actividad) { ?>
              <tr>
                <td class="filaorden"><span class="numeroorden"><?= $actividad->op ?></span></td>
                <td><?= $actividad->nombrePaciente ?></td>
                <td><?= $actividad->codigo ?></td>
                <td><?= $actividad->version ?></td>
                <td><?= $actividad->fecha ?></td>
                <td><?= $this->tag->linkTo(['detalleactividad/edit/' . $actividad->idActividad, '&#xE8B6;', 'class' => 'material-icons', 'style' => 'color:#757575; text-decoration: none;']) ?></td>
              </tr>
              <?php } ?>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
$(document).ready( function () {
  $('#mytable').DataTable({
    "language":{
      "url" :"//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
    },
    paging: false
  });
});
</script>
